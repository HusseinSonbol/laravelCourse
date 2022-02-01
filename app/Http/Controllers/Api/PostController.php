<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{

public function index(){
    $allPosts = Post::with('user')->paginate(5);
    //return $allPosts;
    return  PostResource::collection($allPosts);
}

 public function show($postId)
{
    $post= Post::find($postId);
    return new PostResource($post);
}

public function store(Request $req , StorePostRequest $request){

    $post = new Post();
    $post->title = $req->title;
    $post->description = $req->description;
    $post->user_id = $req->user_id;
    $post->save();
    return new PostResource($post);;
 }




}
