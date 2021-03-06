@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-three-fifths is-offset-one-fifth">
                    <h1 class="title">{{ __('app.register') }}</h1>
                    <h2 class="subtitle">{{ __('app.register_subtitle') }}</h2>
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
                            <label for="name" class="label">{{ __('app.name') }}</label>
                            <div class="control">
                                <input class="input{{ $errors->has('name') ? ' is-danger' : '' }}" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>
                        <div class="field">
                            <label for="email" class="label">{{ __('app.email') }}</label>
                            <div class="control">
                                <input class="input{{ $errors->has('email') ? ' is-danger' : '' }}" id="email" type="email" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="field">
                            <label for="password" class="label">{{ __('app.password') }}</label>
                            <div class="control">
                                <input class="input{{ $errors->has('password') ? ' is-danger' : '' }}" id="password" type="password" name="password" required>
                            </div>
                        </div>
                        <div class="field">
                            <label for="password" class="label">{{ __('app.confirm_password') }}</label>
                            <div class="control">
                                <input class="input" id="password" type="password" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label class="checkbox">
                                    <input type="checkbox" name="privacy_policy" required>
                                    <a href="{{ route('privacy') }}">{{ __('app.accept_privacy_policy') }}</a>
                                </label>
                            </div>
                        </div>
                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link">
                                    {{ __('app.register') }}
                                </button>
                            </div>
                            <div class="control">
                                <a href="{{ route('login') }}" class="button is-text">
                                    {{ __('app.back_to_login') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
