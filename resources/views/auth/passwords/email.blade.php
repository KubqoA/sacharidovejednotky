@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-three-fifths is-offset-one-fifth">
                    <h1 class="title">{{ __('app.email_password') }}</h1>
                    <h2 class="subtitle">{{ __('app.email_password_subtitle') }}</h2>
                    @if($errors->any())
                        <div class="notification is-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="notification is-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form  method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="field">
                            <label for="email" class="label">{{ __('app.email') }}</label>
                            <div class="control">
                                <input class="input{{ $errors->has('email') ? ' is-danger' : '' }}" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                        </div>
                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link">
                                    {{ __('app.email_password') }}
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
