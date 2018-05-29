<?php $no_padding=true ?>

@extends('layouts.app')

@section('content')
    <section class="hero is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column">
                        <h1 class="title">
                            {{ __('app.welcome_title') }}
                        </h1>
                        <h2 class="subtitle">
                            {{ __('app.welcome_subtitle') }}
                        </h2>
                        <a href="{{ route('register') }}" class="button is-primary">{{ __('app.register') }}</a>
                        <a href="{{ route('home') }}" class="button is-">{{ __('app.login') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
