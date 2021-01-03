<?php

namespace App\Http\Controllers;
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
    {if(Auth::user()->email!='admin@admin.com'){
        return redirect()->route('login');
    }
        return view('admin.news.create');
    }

    public function CreatePost(Request $request)
    {
        if(Auth::user()->email!='admin@admin.com'){
            return redirect()->route('login');
        }
        $post = new post([
            'title' => $request->input('title'),
            'explain' => $request->input('explain'),
            'content' => $request->input('content'),
            'writer' => $request->input('writer'),
            'category'=> $request->input('category'),
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
        return redirect()->route('addpost')->with('info', '  پست جدید ذخیره شد و نام آن' . $request->input('title'));
    }
}