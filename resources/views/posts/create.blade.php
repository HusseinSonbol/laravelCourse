@extends('layouts.app')

@section('title') Create @endsection

@section('content')
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
                <select class="form-control" name="user_id">
                    @foreach ($creators as $creator)
                    <option value="{{$creator->id}}">{{$creator->name}}</option>
                    @endforeach

                </select>
            </div>

            <button class="btn btn-success">Create Post</button>
        </form>
@endsection
