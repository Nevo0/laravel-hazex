<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(){

    }
    public function index(){
// https://youtu.be/MFh0Fd7BsjE?t=4246
        // dump(auth()->user());


        // $posts= Post::get();

        $posts = Post:: paginate(1);
        // dump($posts->links());

        return view('post.posts',['posts'=>$posts]);
    }
    public function store (Request $request){
        $this->validate($request,[
            'title'=> 'required',
            'body'=> 'required',
        ]);
        // Post::create([
        //     'user_id'=> auth()->user()->id,
        //     'user_id'=> auth()->id,
        //     'title'=> $request->title,
        //     'body'=> $request->body
        // ]);

        // $request->user()->posts()->create(
        //     [
        //         'title'=> $request->title,
        //     'body'=> $request->body
        //     ]
        // );
        $request->user()->posts()->create($request->only('title','body'));
return back();
    }
}
