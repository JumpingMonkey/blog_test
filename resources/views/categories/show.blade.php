@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <h1>
        {{$category->name}}
        @component('components.badge', ['show' => now()->diffInMinutes($category->created_at) < 30])
            New!
        @endcomponent
    </h1>
    @component('components.status', ['object' => $category])
    @endcomponent

    @component('components.updated', ['date' => $category->updated_at])
        Updated
    @endcomponent

    @component('components.buttons',[
                        'routeObject' => 'categories',
                        'objectName' => 'category',
                        'object' => $category])
    @endcomponent

@endsection
