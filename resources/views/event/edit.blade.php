@extends('layouts.app')

@section('content')    <div class="container">
    <div class="container_page_sidebar">
        <div class="sidebar sidebar_left">
            @include('parts.left-menu')
        </div>
        <div class="content">
            <form method="POST" action="{{ route('event.update', ['event' => $event->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <input name="name" value="{{ $event->name }}" placeholder="name require" require>
                @error('name')
                {{ $message }}
                @enderror

                <input name="date" value="{{ $event->date }}" placeholder="date require" require>
                @error('date')
                {{ $message }}
                @enderror

                <input name="location" value="{{ $event->location }}" placeholder="location require" require>
                @error('location')
                {{ $message }}
                @enderror

                <input name="region" value="{{ $event->region }}" placeholder="region require" require>
                @error('region')
                {{ $message }}
                @enderror

                <input name="country" value="{{ $event->country }}" placeholder="country iso require" require>
                @error('country')
                {{ $message }}
                @enderror

                <input type="file" accept="image/jpeg,image/png" name="logo" value="{{ $event->logo }}">
                @error('logo')
                {{ $message }}
                @enderror

                <input name="description_short" value="{{ $event->description_short }}" placeholder="description_short">
                @error('description_short')
                {{ $message }}
                @enderror

                <input name="description" value="{{ $event->description }}" placeholder="description">
                @error('description')
                {{ $message }}
                @enderror

                <input name="age_from" value="{{ $event->age_from }}" placeholder="age_from">
                @error('age_from')
                {{ $message }}
                @enderror

                <input name="age_to" value="{{ $event->age_to }}" placeholder="age_to">
                @error('age_to')
                {{ $message }}
                @enderror

                <select name="gender" value="{{ $event->gender }}">
                    <option @if (empty($event->gender)) selected @endif value="">{{ __('Select') }}</option>
                    <option value="1"  @if ($event->gender == 1) selected @endif>{{ __('Men') }}</option>
                    <option value="2"  @if ($event->gender == 2) selected @endif>{{ __('Women') }}</option>
                </select>
                @error('gender')
                {{ $message }}
                @enderror

                <select name="interest_id" value="{{ $event->interest_id }}">
                    <option @if (empty($event->interest_id)) selected @endif value="">{{ __('Select') }}</option>
                    @foreach ($interestCats as $itemCat)
                        <option disabled data-cat="{{ $itemCat->id }}">{{ $itemCat->name }}</option>
                        @foreach ($interests as $item)
                            @if ($item->cat_id == $itemCat->id)
                                <option value="{{ $item->id }}"  @if ($event->interest_id == $item->id) selected @endif>{{ $item->name }}</option>
                            @endif
                        @endforeach
                    @endforeach
                </select>
                @error('interest_id')
                {{ $message }}
                @enderror

                <select name="type" value="{{ $event->type }}">
                    <option value="1"  @if ($event->type == 1) selected @endif>{{ __('Public') }}</option>
                    <option value="2"  @if ($event->type == 2) selected @endif>{{ __('Private') }}</option>
                </select>
                @error('type')
                {{ $message }}
                @enderror

                <select name="is_active" value="{{ $event->is_active }}">
                    <option value="1"  @if ($event->is_active == 1) selected @endif>{{ __('Active') }}</option>
                    <option value="0"  @if ($event->is_active == 0) selected @endif>{{ __('Not active') }}</option>
                </select>
                @error('is_active')
                {{ $message }}
                @enderror

                @foreach($event->tags as $tag)
                    <input name="tags[]" value="{{ $tag['name'] }}" placeholder="tag">
                @endforeach
                @error('tags')
                {{ $message }}
                @enderror

                <button type="submit">edit</button>
            </form>
        </div>
        <div class="sidebar sidebar_right">
            sidebar
        </div>
    </div>
</div>
@endsection
