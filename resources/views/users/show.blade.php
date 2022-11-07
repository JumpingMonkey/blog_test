@extends('layouts.app')

@section('title', $user->name)

@section('content')
    <h1>
        {{$user->name}}
        @component('components.badge', ['show' => now()->diffInMinutes($user->created_at) < 30])
            New!
        @endcomponent
    </h1>

    <p>
        {{ $user->email }}
    </p>

    @component('components.updated', ['date' => $user->updated_at])
        Updated
    @endcomponent
    @can('user')
        @component('components.buttons',[
                            'routeObject' => 'users',
                            'objectName' => 'user',
                            'object' => $user])
        @endcomponent
    @endcan
@endsection
