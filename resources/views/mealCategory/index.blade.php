@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-three-fifths is-offset-one-fifth">
                    <a class="button is-light has-text-primary" href="{{ route('entry.create') }}">
                        <span class="icon"><i data-feather="chevron-left"></i></span>&nbsp;
                        {{ __('app.back_to_entry') }}
                    </a>
                    <hr>
                    <h1 class="title">{{ __('app.meal_or_drink_categories') }}</h1>
                    @foreach($mealCategories as $mealCategory)
                        @include('mealCategory.preview')
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
