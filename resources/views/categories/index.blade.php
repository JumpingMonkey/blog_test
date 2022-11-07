@extends('layouts.app')

@section('title', 'Categories')

@section('content')

    <h1>Categories</h1>
    <a class="btn btn-success mb-3" href="{{route('categories.create')}}">
        <i class="fa-solid fa-plus"></i>
        @if(isset($label))
            {{$label}}
        @else
            Add Category
        @endif
    </a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td><a href="{{ route('categories.show', ['category' => $category->id]) }}">{{ $category->name }}</a></td>
                <td>
                    @component('components.status', ['object' => $category])
                    @endcomponent
                </td>
                <td>
                    @component('components.buttons',['routeObject' => 'categories', 'objectName' => 'category', 'object' => $category])
                    @endcomponent
                </td>
            </tr>
        @empty
            <div>Not found!</div>
        @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $categories->links("pagination::bootstrap-5") }}
    </div>

@endsection
