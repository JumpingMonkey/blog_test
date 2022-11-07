@extends('layouts.app')

@section('title', 'Edit the user')

@section('content')
    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">

        @csrf
        @method('PUT')

        @include('users.partials.updateForm')

        <div class="d-grid gap-2"><input class="btn btn-primary mb-3" type="submit" value="Update"></div>
    </form>
@endsection
