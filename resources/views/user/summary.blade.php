@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-three-fifths is-offset-one-fifth">
                    <h1 class="title">{{ __('app.weekly_summary') }}</h1>
                    <hr>
                    @foreach($dates as $date)
                        <h4 class="is-size-4">{{ $date->formatLocalized('%A %d %B') }}</h4>
                        <br>
                        <?php $maxDate = (clone $date)->endOfDay(); $i=0; ?>
                        @foreach($entries->filter(function ($entry) use ($date, $maxDate) {
                            return ($entry->created_at > $date) && ($entry->created_at < $maxDate);
                        }) as $entry)
                            @include('entry.preview')
                            <?php $i++; ?>
                        @endforeach
                        @if($i==0)
                            {{ __('app.no_entries') }}
                        @endif
                        <hr>
                    @endforeach
                    <a class="button is-light has-text-primary" href="{{ route('home') }}">
                        <span class="icon"><i data-feather="chevron-left"></i></span>&nbsp;
                        {{ __('app.back_to_home') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
