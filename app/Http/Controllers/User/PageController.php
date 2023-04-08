<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Facades\Image;

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

    public function logoStore(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048|dimensions:min_width=1,min_height=1',
        ]);
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();

        $destinationPath = Auth::user()->username . "-storage";

        if(!Storage::disk('public')->exists($destinationPath)){
            Storage::disk('public')->makeDirectory($destinationPath);
        }
        $imagegallery = Image::make($image)->stream();
        Storage::disk('public')->put($destinationPath . '/'.$imageName, $imagegallery);

        $imagelink = Storage::url($imageName);

        
        // $imageUpload = new ImageUpload();
        // $imageUpload->filename = $imageName;
        // $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }

    public function logoDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        $destinationPath = Auth::user()->username . "-storage";

        // ImageUpload::where('filename',$filename)->delete();
        $path=public_path().'/'.$destinationPath.'/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;  
    }

}
