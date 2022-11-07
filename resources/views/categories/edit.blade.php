@extends('layouts.app')

@section('title', 'Edit the category')

@section('content')
    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">

        @csrf
        @method('PUT')

        @include('categories.partials.form')

        <div class="d-grid gap-2"><input class="btn btn-primary mb-3" type="submit" value="Update"></div>
    </form>
@endsection
