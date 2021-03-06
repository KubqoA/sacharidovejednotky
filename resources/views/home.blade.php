@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-three-fifths is-offset-one-fifth">
                    <div class="has-text-centered">
                        <a class="button is-gradient is-rounded" href="{{ route('entry.create') }}">
                            <span class="icon"><i data-feather="plus"></i></span>&nbsp;
                            {{ __('app.add_a_meal') }}
                        </a>
                    </div>
                    <hr>
                    @if(is_null(Auth::user()->daily_sj_limit))
                        @include('user.no_limit_sj')
                    @else
                        @include('user.limit_sj')
                    @endif
                    <hr>
                    @foreach($entries as $entry)
                        @include('entry.preview')
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
