<?php $no_padding=true ?>

@extends('layouts.app')

@section('content')
    <section class="hero is-fullheight">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    {{ __('app.404_title') }}
                </h1>
                <h2 class="subtitle">
                    {{ __('app.404_subtitle') }}
                </h2>
                @guest
                    <a href="{{ url('/') }}" class="button is-light">{{ __('app.back_to_welcome') }}</a>
                @else
                    <a href="{{ route('home') }}" class="button is-light">{{ __('app.back_to_home') }}</a>
                @endguest
            </div>
        </div>
    </section>
@endsection
