@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-three-fifths is-offset-one-fifth">
                    <h1 class="title">{{ __('app.settings') }}</h1>
                    <h2 class="subtitle">{{ __('app.settings_subtitle') }}</h2>
                    @if($errors->any())
                        <div class="notification is-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form  method="POST" action="{{ route('user.update') }}">
                        @csrf
                        <div class="field">
                            <label for="name" class="label">{{ __('app.name') }}</label>
                            <div class="control">
                                <input class="input{{ $errors->has('name') ? ' is-danger' : '' }}" id="name" type="text" name="name" value="{{ old('name') }}" placeholder="{{ $user->name }}" autofocus>
                            </div>
                        </div>
                        <div class="field">
                            <label for="daily_sj_limit" class="label">{{ __('app.daily_sj_limit') }}</label>
                            <div class="control">
                                <input class="input{{ $errors->has('daily_sj_limit') ? ' is-danger' : '' }}" id="sj" type="number" step="0.01" name="daily_sj_limit" value="{{ old('daily_sj_limit') }}" placeholder="{{ $user->daily_sj_limit }}">
                            </div>
                        </div>
                        <div class="field">
                            <label for="password" class="label">{{ __('app.password') }}</label>
                            <div class="control">
                                <input class="input{{ $errors->has('password') ? ' is-danger' : '' }}" id="password" type="password" name="password">
                            </div>
                        </div>
                        <div class="field">
                            <label for="password" class="label">{{ __('app.confirm_password') }}</label>
                            <div class="control">
                                <input class="input" id="password" type="password" name="password_confirmation">
                            </div>
                        </div>
                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link">
                                    {{ __('app.settings_submit') }}
                                </button>
                            </div>
                            <div class="control">
                                <a href="{{ route('home') }}" class="button is-text">
                                    {{ __('app.back_to_home') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
