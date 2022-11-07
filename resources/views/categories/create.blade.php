@extends('layouts.app')

@section('title', 'Create the category')

@section('content')
    <h1>Create Category</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        @include('categories.partials.form')
        <div class="d-grid gap-2">
            <input class="btn btn-primary mb-3" type="submit" value="Create">
        </div>
    </form>
@endsection
