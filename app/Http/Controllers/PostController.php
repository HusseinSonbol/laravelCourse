<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = [
            ['id' => '1','title' => 'Post one ', 'posted_by'=> 'Hussein', 'created_at' => '2022-11-11'],
            ['id' => '2','title' => 'Post two ', 'posted_by'=> 'Noor', 'created_at' => '2022-11-12'],
            ['id' => '3','title' => 'Post three ', 'posted_by'=> 'Ahmed', 'created_at' => '2022-11-13'],
        ];

        return view('posts.index', [
            'allPosts' => $allPosts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        return redirect()->route('posts.index');
    }

    public function show($postId)
    {
        return view('posts.show');
    }

    public function put($postId)
    {
        return view('posts.edit');
    }

    public function destroy($postId)
    {
        return view('posts.delete', ['postid'=>$postId]);
    }
}
