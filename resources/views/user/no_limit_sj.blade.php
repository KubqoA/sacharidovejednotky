<p class="has-text-centered is-size-4">
    {{ __('app.no_limit_sj_message') }} <b>{{ $daily_sj }} {{ trans_choice('app.sj_amount', is_float($daily_sj) ? 5 : $daily_sj) }}</b>
</p>
<p class="has-text-centered">
    <br>{{ __('app.set_sj_limit') }}
</p>
<br>
<div class="has-text-centered">
    <a class="button is-gradient is-rounded" href="{{ route('user.edit') }}">
    <span class="icon"><i data-feather="edit-2"></i></span>&nbsp;
    {{ __('app.set_sj_limit_button') }}
</a>
</div>
