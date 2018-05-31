<form  method="GET" action="{{ route('meal.search') }}">
    <div class="field has-addons">
        <div class="control is-expanded">
            <input class="input{{ $errors->has('name') ? ' is-danger' : '' }}" id="name" type="text" name="name" value="{{ \Illuminate\Support\Facades\Request::input('name') }}" placeholder="{{ __('app.search') }}" required autofocus>
        </div>
        <div class="control">
            <button class="button is-primary">
                {{ __('app.search') }}
            </button>
        </div>
    </div>
</form>
<br>
