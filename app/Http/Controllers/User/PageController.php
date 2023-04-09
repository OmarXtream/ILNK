<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Facades\Image;

use App\Models\Page;

use Auth;
class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('subscribed');
    }

    public function index(){
        return view('page.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'bgColor' => ['bail', 'string', 'max:255','nullable'],
            'des' => ['bail', 'string', 'max:255','nullable'],
            'menuType' => ['bail','required', 'integer','between:1,2'],
            'menuTitle' => ['bail', 'string', 'max:255','nullable'],
            'menuLink' => ['bail', 'url', 'max:255','nullable'],

        ]);


        $newPage = Page::updateOrCreate([
            'user_id'   => Auth::id(),
        ],[
            'bgColor' => $request->bgColor,
            'des' => $request->des,
            'menuType' => $request->menuType,
            'menuTitle' => $request->menuTitle,
            'menuLink' => $request->menuLink,
        ]);

        return redirect()->route('home');
    }



    public function logoStore(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|bail|image|mimes:jpg,jpeg,png,gif|mimetypes:image/png,image/jpeg,image/gif|max:2048|dimensions:min_width=1,min_height=1',
        ]);
        $image = $request->file('file');
        $imageName = uniqid().'.'.$image->extension();

        $destinationPath = Auth::user()->username;

        if(!Storage::disk('public')->exists($destinationPath)){
            Storage::disk('public')->makeDirectory($destinationPath);
        }
        if($image->extension() != 'gif'){
        $imageFinal = Image::make($image)->stream();
        }else{
        $imageFinal = File::get($image);
        }
        Storage::disk('public')->put($destinationPath . '/'.$imageName, $imageFinal);

        $imagelink = Storage::url($destinationPath.'/'.$imageName);

        $newPage = Page::updateOrCreate([
            'user_id'   => Auth::id(),
        ],[
            'logo'     => $imageName,
        ]);


        return response()->json([
        
            'tp' => 'success',
            'm' => ['success' => __('concept.success') ],
            
        ]);
    }


    public function bgStore(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|bail|image|mimes:jpg,jpeg,png,gif|mimetypes:image/png,image/jpeg,image/gif|max:2048|dimensions:min_width=1,min_height=1',
        ]);
        $image = $request->file('file');
        $imageName = uniqid().'.'.$image->extension();

        $destinationPath = Auth::user()->username;

        if(!Storage::disk('public')->exists($destinationPath)){
            Storage::disk('public')->makeDirectory($destinationPath);
        }
        if($image->extension() != 'gif'){
        $imageFinal = Image::make($image)->stream();
        }else{
        $imageFinal = File::get($image);
        }
        Storage::disk('public')->put($destinationPath . '/'.$imageName, $imageFinal);

        $imagelink = Storage::url($destinationPath.'/'.$imageName);

        $newPage = Page::updateOrCreate([
            'user_id'   => Auth::id(),
        ],[
            'bgImg'     => $imageName,
        ]);


        return response()->json([
        
            'tp' => 'success',
            'm' => ['success' => __('concept.success') ],
            
        ]);
        }

    public function logoDestroy(Request $request)
    {
        $pageLogo = Auth::user()->page()->first()->logo;

        Storage::delete(Auth::user()->username."/".$pageLogo);
        

        $page = Page::updateOrCreate([
            'user_id'   => Auth::id(),
        ],[
            'logo'     => null,
        ]);

        return $pageLogo;  
    }


    public function bgDestroy(Request $request)
    {
        $pageBG = Auth::user()->page()->first()->bgImg;

        Storage::delete(Auth::user()->username."/".$pageBG);
        

        $page = Page::updateOrCreate([
            'user_id'   => Auth::id(),
        ],[
            'bgImg'     => null,
        ]);

        return $pageBG;  
    }

}
