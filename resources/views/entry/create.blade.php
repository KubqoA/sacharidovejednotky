@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-three-fifths is-offset-one-fifth">
                    <h1 class="title">{{ __('app.add_a_meal') }}</h1>
                    <h2 class="subtitle">{{ __('app.add_a_meal_subtitle') }}</h2>
                    <a class="button is-light has-text-primary" href="{{ route('mealCategory.index') }}">{{ __('app.choose_from_meals') }}</a>
                    @if($errors->any())
                        <div class="notification is-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form  method="POST" action="{{ route('entry.store') }}">
                        @csrf
                        <br>
                        <div class="field">
                            <label for="name" class="label">{{ __('app.meal_name') }}</label>
                            <div class="control">
                                <input class="input{{ $errors->has('name') ? ' is-danger' : '' }}" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>
                        <label for="amount" class="label">{{ __('app.quantity') }}</label>
                        <div class="field has-addons">
                            <p class="control is-expanded">
                                <input class="input{{ $errors->has('quantity') ? ' is-danger' : '' }}" id="amount" type="number" step="0.01" name="quantity" value="{{ old('quantity') }}" required>
                            </p>
                            <p class="control">
                                <span class="select">
                                  <select name="quantity_unit" required>
                                    <option @if(old('quantity_unit') == 'g') selected @endif>g</option>
                                    <option @if(old('quantity_unit') == 'ml') selected @endif>ml</option>
                                    <option @if(old('quantity_unit') == 'ks') selected @endif>ks</option>
                                  </select>
                                </span>
                            </p>
                        </div>
                        <div class="field">
                            <label for="sj" class="label">{{ __('app.sj') }}</label>
                            <div class="control">
                                <input class="input{{ $errors->has('sj') ? ' is-danger' : '' }}" id="sj" type="number" step="0.01" name="sj" value="{{ old('sj') }}" required>
                            </div>
                            <p class="help">{{ __('app.sj_help') }}</p>
                        </div>
                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link">
                                    {{ __('app.add') }}
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
