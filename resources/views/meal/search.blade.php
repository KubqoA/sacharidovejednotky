@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-three-fifths is-offset-one-fifth">
                    <a class="button is-light has-text-primary" href="{{ route('mealCategory.index') }}">
                        <span class="icon"><i data-feather="chevron-left"></i></span>&nbsp;
                        {{ __('app.back_to_meal_categories') }}
                    </a>
                    <hr>
                    <h1 class="title">{{ __('app.search_results') }}</h1>
                    @foreach($meals as $meal)
                        @include('meal.preview')
                    @endforeach
                    {{ $meals->links('vendor.pagination.bulma') }}
                </div>
            </div>
        </div>
    </section>
@endsection
