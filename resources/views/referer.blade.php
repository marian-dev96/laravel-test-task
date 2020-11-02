<ul class="referer-list" data-referer="{{ $id }}">
    @foreach($refers as $refer)
        <li>
            @if($refer->referrals->count() > 0 && $refer->checkLevelRef())
                <input type="checkbox" id="ref-{{ $refer->id }}" data-id="{{ $refer->id }}">
                <label for="ref-{{ $refer->id }}">{{ $refer->id }} | {{ $refer->name }} | {{ $refer->email }}</label>
            @else
                <p>{{ $refer->id }} | {{ $refer->name }} | {{ $refer->email }}</p>
            @endif
        </li>
    @endforeach
</ul>
