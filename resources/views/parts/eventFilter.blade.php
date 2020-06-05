<form method="GET" action="{{ route('event.index') }}">
    <input name="name" value="{{ Request()->name }}" placeholder="name">
    @error('name')
    {{ $message }}
    @enderror

    <input name="date_from" value="{{ Request()->date_from }}" placeholder="date_from">
    @error('date_from')
    {{ $message }}
    @enderror

    <input name="date_to" value="{{ Request()->date_to }}" placeholder="date_to">
    @error('date_to')
    {{ $message }}
    @enderror

    <input name="location" value="{{ Request()->location }}" placeholder="location">
    @error('location')
    {{ $message }}
    @enderror

    @if (request()->routeIs('event.index'))
        <input name="age_from" value="{{ Request()->age_from }}" placeholder="age_from">
        @error('age_from')
        {{ $message }}
        @enderror

        <input name="age_to" value="{{ Request()->age_to }}" placeholder="age_to">
        @error('age_to')
        {{ $message }}
        @enderror

        <select name="gender" value="{{ Request()->gender }}">
            <option @if (empty(Request()->gender)) selected @endif value="">{{ __('Select') }}</option>
            <option value="1"  @if (Request()->gender == 1) selected @endif>{{ __('Men') }}</option>
            <option value="2"  @if (Request()->gender == 2) selected @endif>{{ __('Women') }}</option>
        </select>
        @error('gender')
        {{ $message }}
        @enderror
    @endif

    <select name="interest_id[]" multiple>
        <option value="">{{ __('Select') }}</option>
        @foreach ($interestCats as $itemCat)
            <option disabled data-cat="{{ $itemCat->id }}">{{ $itemCat->name }}</option>
            @foreach ($interests as $item)
                @if ($item->cat_id == $itemCat->id)
                    <option value="{{ $item->id }}"
                            @if (gettype(Request()->interest_id) === 'array' && in_array($item->id, Request()->interest_id))
                                selected
                            @endif
                    >{{ $item->name }}</option>
                @endif
            @endforeach
        @endforeach
    </select>
    @error('interest_id')
    {{ $message }}
    @enderror

    <button type="submit">find</button>
</form>