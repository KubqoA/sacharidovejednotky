<div class="box">
    <div class="level is-mobile">
        <div class="level-left">
            <div class="level-item">
                <div>
                    <small class="heading has-text-grey">{{ $entry->created_at->formatLocalized('%A %d %B %H:%M') }}</small>
                    <h5 class="title is-5">{{ $entry->name }}</h5>
                </div>
            </div>
        </div>
        <div class="level-right">
            <button class="delete is-small"></button>
            {{ $entry->sj }}SJ&nbsp;<span class="has-text-grey">/ {{ $entry->quantity }} {{ $entry->quantity_unit }}</span>
        </div>
    </div>
</div>
