@extends('layouts.app')

@section('title') edit @endsection

@section('content')

@foreach ($Post as $post )
        <form method="POST" action="{{ route('posts.edit') }}">
            @csrf



            <input type="text" name="id" id="id" value="{{$post->id}}" hidden>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{$post->title}}">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$post->description}}</textarea>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
                <select class="form-control">
                    <option value="1">{{$post->user->name}}</option>
                </select>
            </div>
            @endforeach
            <button class="btn btn-success">Update Post</button>
        </form>
@endsection
