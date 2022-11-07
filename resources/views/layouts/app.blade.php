<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <title>Blog Ascensor - @yield('title')</title>
</head>
<body>
<div class = "d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm mb-3">
    <h5 class="my-0 me-md-auto font-weight-normal">Blog Ascensor</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="{{ route('posts.index') }}">Posts</a>
        <a class="p-2 text-dark disabled" href="{{ route('categories.index') }}">Category</a>
        <a class="p-2 text-dark disabled" href="{{ route('users.index') }}">Users</a>

        @guest
            @if (\Illuminate\Support\Facades\Route::currentRouteName() != 'auth.showRegistrationForm')
                <a class="p-2 text-dark" href="{{ route('auth.showRegistrationForm') }}">Register</a>
            @endif
            @if(\Illuminate\Support\Facades\Route::currentRouteName() != 'auth.showLoginForm')
                <a class="p-2 text-dark" href="{{ route('auth.showLoginForm') }}">Login</a>
            @endif

        @else
            <a class="p-2 text-dark" href="{{ route('auth.logout') }}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit()"
            >Logout ({{ \Illuminate\Support\Facades\Auth::user()->name }})</a>
            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
    </nav>
</div>
<div class="container">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @yield('content')
</div>
</body>
</html>
