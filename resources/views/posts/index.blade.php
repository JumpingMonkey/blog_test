@extends('layouts.app')

@section('title', 'Posts')

@section('content')

    <h1>Posts</h1>
    <a class="btn btn-success mb-3" href="{{route('posts.create')}}">
        <i class="fa-solid fa-plus"></i>
        @if(isset($label))
            {{$label}}
        @else
            Add Post
        @endif
    </a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td><a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a></td>
                <td>{{ $post->categories->first()->name ?? 'no category' }}</td>
                <td>
                    @component('components.status', ['object' => $post])
                    @endcomponent
                </td>
                <td>
                    @component('components.buttons',[
                        'routeObject' => 'posts',
                        'objectName' => 'post',     
                        'object' => $post])
                    @endcomponent
                </td>
            </tr>
        @empty
            <div>Not found!</div>
        @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $posts->links("pagination::bootstrap-5") }}
    </div>

@endsection
