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
    public function GetManagePost(Request $request)
    {
        $posts = post::orderBy('created_at', 'desc')->get();
        return view('dashboard.admin.news.manage', ['posts' => $posts]);
    }

    public function DeletePost($id){
        $post = post::find($id);
        $post->delete();
        return redirect()->route('dashboard.admin.news.manage')->with('info', 'پست پاک شد');
    }

    public function GetEditPost($id)
    { 
        $post = post::find($id);
        return view('dashboard.admin.news.updatepost', ['post' => $post, 'id' => $id]);
    }

    public function UpdatePost(Request $request)
    {
        $post = post::find($request->input('id'));
        if (!is_null($post)) {
            $post->title = $request->input('title');
            $post->explain = $request->input('explain');
            $post->writer = $request->input('writer');
            $post->content = $request->input('content');
            $post->save();
        }
        return redirect()->route('dashboard.admin.voip.updatepost',$post->id)->with('info', 'شماره ویرایش شد');
    }
}