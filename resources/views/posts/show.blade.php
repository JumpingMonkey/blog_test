@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <h1>
        {{$post->title}}
        @component('components.badge', ['show' => now()->diffInMinutes($post->created_at) < 30])
            New!
        @endcomponent
    </h1>
    <p>{{$post->content}}</p>

    @component('components.updated', ['date' => $post->created_at, 'name' => $post->user->name])

    @endcomponent

    @component('components.updated', ['date' => $post->updated_at])
        Updated
    @endcomponent



@endsection
