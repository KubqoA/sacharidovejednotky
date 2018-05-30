<a href="{{ route('mealCategory.show', ['id' => $mealCategory]) }}">
    <div class="box">
        <div class="level is-mobile">
            <div class="level-left">
                <div class="level-item">
                    <div>
                        <h6 class="title is-6">{{ $mealCategory->name }} <span class="has-text-grey">({{ $mealCategory->meals_count }})</span></h6>
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
