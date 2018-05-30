<div class="box">
    <div class="level is-mobile">
        <div class="level-left">
            <div class="level-item">
                <div>
                    <small class="heading has-text-grey">{{ $entry->created_at->formatLocalized('%A %d %B %H:%M') }}</small>
                    <h6 class="title is-6">{{ $entry->name }}</h6>
                </div>
            </div>
        </div>
        <div class="level-right">
            {{ $entry->sj }}SJ&nbsp;<span class="has-text-grey">/ {{ $entry->quantity }} {{ $entry->quantity_unit }}</span>&nbsp;
            <a class="delete is-small" onclick="event.preventDefault(); document.getElementById('delete-entry-{{ $entry->id }}').submit();"></a>
        </div>
        <form id="delete-entry-{{ $entry->id }}" action="{{ route('entry.destroy', ['entry' => $entry]) }}" method="POST" style="display: none;">
            @csrf
            @method('delete')
        </form>
    </div>
</div>
