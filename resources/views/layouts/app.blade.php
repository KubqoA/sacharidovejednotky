<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" @unless(isset($no_padding)) class="has-navbar-fixed-top" @endunless>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar is-transparent is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
        <a class="navbar-item" href="{{ url('/') }}">
            <img src="{{ asset('logo.svg') }}" alt="{{ config('app.name') }}">
        </a>

        <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
        <div id="navMenu" class="navbar-menu">
        <div class="navbar-end">
            @guest
                <a class="navbar-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                <a class="navbar-item" href="{{ route('register') }}">{{ __('Register') }}</a>
            @else
                <div class="navbar-item has-dropdown is-hoverable">
                    <a href="" class="navbar-link">
                        <span class="icon"><i data-feather="user"></i></span>&nbsp;
                        {{ Auth::user()->name }}
                    </a>
                    <div class="navbar-dropdown is-boxed is-right">
                        <a class="navbar-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </div>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </div>
    </div>
    </div>
</nav>
@yield('content')

<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
