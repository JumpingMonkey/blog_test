@extends('layouts.app')

@section('title', 'Create user')

@section('content')
    <h1>Create User</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        @include('users.partials.form')
        <div class="d-grid gap-2">
            <input class="btn btn-primary mb-3" type="submit" value="Create">
        </div>
    </form>
@endsection
