@extends('layouts.app')

@section('title') show @endsection

@section('content')
<div class="card">
    <div class="card-header">
      Post Info
    </div>
    <div class="card-body">
        @foreach ($Post as $post)
      <h5 class="card-title">Title: {{$post->title}} </h5>
      <p class="card-text">Discription:- {{$post->description}}  </p>

    </div>
  </div>
  <br>
  <div class="card">
    <div class="card-header">
      Post Info
    </div>
    <div class="card-body">
      <h5 class="card-title">Name:- {{ isset($post->user) ? $post->user->name : 'Not Found' }}</h5>
      <h5 class="card-title">Email:- {{ isset($post->user) ? $post->user->email : 'Not Found' }}</h5>
      <h5 class="card-title">Created At:- {{date('d-m-Y', strtotime($post->created_at));}}</h5>
      @endforeach
    </div>
  </div>
@endsection
