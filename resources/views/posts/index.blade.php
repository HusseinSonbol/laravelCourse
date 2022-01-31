@extends('layouts.app')

@section('title')Index @endsection

@section('content')
        <div class="text-center">
            <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
        </div>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                {{-- <?php// $i=0; ?> --}}
             @foreach ($allPosts as $post)
              <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ date('d,M,Y',strtotime($post->created_at))}}</td>
                <td>
                    <a href="{{route('posts.show',$post->id) }}" class="btn btn-success">View</a>
                    <a href="{{route('posts.update',$post->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{route('posts.destroy',$post->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          {{ $allPosts->links()}}
@endsection
