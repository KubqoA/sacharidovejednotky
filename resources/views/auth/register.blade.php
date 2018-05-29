@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-three-fifths is-offset-one-fifth">
                    <h1 class="title">{{ __('Register') }}</h1>
                    <h2 class="subtitle">Register to use the app</h2>
                    @if($errors->any())
                        <div class="notification is-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form  method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="field">
                            <label for="name" class="label">{{ __('Name') }}</label>
                            <div class="control">
                                <input class="input{{ $errors->has('name') ? ' is-danger' : '' }}" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>
                        <div class="field">
                            <label for="email" class="label">{{ __('E-Mail Address') }}</label>
                            <div class="control">
                                <input class="input{{ $errors->has('email') ? ' is-danger' : '' }}" id="email" type="email" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="field">
                            <label for="password" class="label">{{ __('Password') }}</label>
                            <div class="control">
                                <input class="input{{ $errors->has('password') ? ' is-danger' : '' }}" id="password" type="password" name="password" required>
                            </div>
                        </div>
                        <div class="field">
                            <label for="password" class="label">{{ __('Confirm Password') }}</label>
                            <div class="control">
                                <input class="input" id="password" type="password" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            <div class="control">
                                <a href="{{ route('login') }}" class="button is-text">
                                    {{ __('Back to Login Page') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
