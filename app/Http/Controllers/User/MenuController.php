<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\menuProduct;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Facades\Image;

use Auth;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('subscribed')->except('guest');
    }

    public function createProduct(Request $request){
        
        $this->validate($request, [
            'pTitle' => ['bail','required', 'string', 'max:255'],
            'pPrice' => ['bail','required', 'integer'],
            'img' => 'required|bail|image|mimes:jpg,jpeg,png|mimetypes:image/png,image/jpeg|max:2048|dimensions:min_width=1,min_height=1',
        ]);

        $image = $request->file('img');
        $imageName = uniqid().'.'.$image->extension();

        $destinationPath = Auth::user()->username;

        if(!Storage::disk('public')->exists($destinationPath)){
            Storage::disk('public')->makeDirectory($destinationPath);
        }

        $imageFinal = Image::make($image)->stream();

        Storage::disk('public')->put($destinationPath . '/'.$imageName, $imageFinal);

        $imagelink = Storage::url($destinationPath.'/'.$imageName);


        $product = menuProduct::create([
            'title' => $request->pTitle,
            'price' => $request->pPrice,
            'img'     => $imageName,
            'page_id' => Auth::user()->page->id
        ]);

        return response()->json([
        
            'tp' => 'success',
            'm' => ['success' => __('concept.success') ],
            
        ]);

    }

    public function deleteProduct(Request $request){

        $this->validate($request, [
            'id' => ['bail', 'integer','required','exists:menu_products,id'],
        ]);

        $product = menuProduct::where('id',$request->id)->where('page_id',Auth::user()->page->id)->first();

        $product->delete();
        

        return response()->json([
            'tp' => 'success',
            'm' => ['success' => __('concept.success') ],
            
        ]);
    }



    public function guest(){

    }


}
