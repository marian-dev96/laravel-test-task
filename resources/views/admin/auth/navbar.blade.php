<li>
    <select style="min-width: 110px;background: #fff;border-radius: 5px;padding: 0 5px;outline: none;" id="language">
        @foreach($languages as $language)
            <option value="{{ $language->id }}" {{ app()->getLocale() == $language->slug ? 'selected' : '' }}>{{ $language->name }}</option>
        @endforeach
    </select>
</li>

