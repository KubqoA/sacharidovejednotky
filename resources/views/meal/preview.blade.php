<a href="{{ route('meal.show', ['meal' => $meal]) }}">
    <div class="box">
        <div class="level is-mobile">
            <div class="level-left">
                <div class="level-item">
                    <div>
                        <h6 class="title is-6">{{ $meal->name }}</h6>
                    </div>
                </div>
            </div>
            <div class="level-right">
                <span class="icon"><i data-feather="chevron-right"></i></span>
            </div>
        </div>
    </div>
</a>
<br>
