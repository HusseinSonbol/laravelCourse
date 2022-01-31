<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::paginate(2);
        return view('posts.index', ['allPosts' => $allPosts]);
    }

    public function create()
    {

        return view('posts.create');
    }

    public function edit(Request $req)
    {

        $data = Post::find($req->id);
        //dd($data);
        $data->title = $req->title;
        $data->description = $req->description;
        $data->save();
        return redirect()->route('posts.index')->with('status', 'post updated!');
    }

    public function show($postId)
    {
        $allPosts = Post::all()->where('id', '=', $postId);
        //dd($allPosts);
        return view('posts.show', ['Post' => $allPosts]);
    }

    public function put($postId)
    {
        $allPosts = Post::all()->where('id', '=', $postId);
        return view('posts.edit', ['Post' => $allPosts]);
    }

    public function store(Request $req){
       //dd($req->input());
       $post = new Post();
       $post->title = $req->title;
       $post->description = $req->description;
       $post->user_id = $req->user;
       $post->save();
        return redirect()->route('posts.index')->with('status', 'post inserted!');
    }

    public function destroy($postId)
    {
        $data=Post::find($postId);
        $data->delete();
        return redirect()->route('posts.index')->with('status', 'post deleted!');
    }
}
