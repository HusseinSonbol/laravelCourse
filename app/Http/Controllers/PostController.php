<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Symfony\Component\Console\Input\Input;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::with('user')->paginate(5);
        return view('posts.index', ['allPosts' => $allPosts]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', ['creators'=>$users]);
    }

    public function edit(Request $req,StorePostRequest $request)
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

    public function store(Request $req , StorePostRequest $request){
       //dd($req->input());
       $post = new Post();
       $post->title = $req->title;
       $post->description = $req->description;
       $post->user_id = $req->user_id;
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
