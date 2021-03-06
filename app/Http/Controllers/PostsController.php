<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePost;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        // $posts = Post::where('post_id', NULL)->orderBy('id','dsc')->get();
        $posts = Post::orderBy('id','dsc')->get();
        return view('posts.index',['posts' => $posts ]);
    }

    public function show()
    {

    }

    public function new()
    {
        return view('posts.new');
    }

    public function create($id, CreatePost $request)
    {
        $user = \Auth::user();

        $post = new Post;
        if ( $user ){
            $post->user_id = $user->id;
        } else {
            $post->user_id = 1;
        }

        $post->comment = $request->comment;
        $post->article_id = "1";

        if( is_numeric($id) ){
            $post->post_id = $id;
        } else {
            $post->post_id = NULL;
        }
        $post->fixed_id = substr(md5( $_SERVER["REMOTE_ADDR"]), 0, 7);
        $post->save();
        return redirect('/index');
    }


    public function delete($id)
    {
        if( Post::find($id)->user_id == \Auth::user()->id ){
            $post = Post::find($id);
            $post->delete();
        }
        return redirect('/index');
    }


}
