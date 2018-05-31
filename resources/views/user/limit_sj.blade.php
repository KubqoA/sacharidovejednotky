<p class="has-text-centered is-size-4">
    {{ __('app.no_limit_sj_message') }} <b>{{ $daily_sj }} {{ trans_choice('app.sj_amount', is_float($daily_sj) ? 5 : $daily_sj) }}</b> {{ __('app.limit_sj') }} {{ Auth::user()->daily_sj_limit }}.
</p>
<br>
<progress class="progress is-gradientish" value="{{ $daily_sj }}" max="{{ Auth::user()->daily_sj_limit }}">{{ $daily_sj/Auth::user()->daily_sj_limit*100 }}%</progress>
<br>
<div class="has-text-centered">
    <a class="button is-gradient is-rounded" href="{{ route('user.summary') }}">
        <span class="icon"><i data-feather="activity"></i></span>&nbsp;
        {{ __('app.view_weekly_summary') }}
    </a>
</div>
