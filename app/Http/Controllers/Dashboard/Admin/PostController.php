<?php

namespace App\Http\Controllers\Dashboard\Admin;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Session\Store;
use App\User;
use Illuminate\Auth\Access\Gate; 
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function GetCreatePost()
    {
        return view('dashboard.admin.news.create');
    }

    public function CreatePost(Request $request)
    {
        $post = new post([
            'title' => $request->input('title'),
            'explain' => $request->input('explain'),
            'content' => $request->input('content'),
            'writer' => $request->input('writer'),
            'special'=> $request->input('special'),
        ]);
    //--------------
        $uploadedFile = $request->file('img');
     $filename = $uploadedFile->getClientOriginalName();

    Storage::disk('local')->putFileAs('/images/'.$filename, $uploadedFile, $filename);
           $post->pic = $filename;
           
         //-------------
         
         $uploadedFilee = $request->file('file');  
         
        if ($uploadedFilee != NULL) {
   
     $filenamee = $uploadedFilee->getClientOriginalName();

    Storage::disk('local')->putFileAs('/file/'.$filenamee, $uploadedFilee, $filenamee);
           $post->file = $filenamee;
          }
        $post->save();
        return redirect()->route('dashboard.admin.news.create')->with('info', '  پست جدید ذخیره شد و نام آن' . $request->input('title'));
    }
}