<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::where('post_id', NULL)->orderBy('id','dsc')->get();
        return view('posts.index',['posts' => $posts ]);
    }

    public function show()
    {

    }

    public function new()
    {
        return view('posts.new');
    }

    public function create(Request $request)
    {

    }

    public function delete(Request $request)
    {

    }


}
