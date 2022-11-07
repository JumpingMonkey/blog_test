@extends('layouts.app')

@section('title', 'Users')

@section('content')

    <h1>Users</h1>
    @can('user')
        <a class="btn btn-success mb-3" href="{{route('users.create')}}">
            <i class="fa-solid fa-plus"></i>
            @if(isset($label))
                {{$label}}
            @else
                Add User
            @endif
        </a>
    @endcan
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        @forelse($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td><a href="{{ route('users.show', ['user' => $user->id]) }}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>

                <td>
                    @can('user')
                        @component('components.buttons',[
                            'routeObject' => 'users',
                            'objectName' => 'user',
                            'object' => $user])
                        @endcomponent
                    @endcan
                </td>
            </tr>
        @empty
            <div>Not found!</div>
        @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $users->links("pagination::bootstrap-5") }}
    </div>

@endsection
