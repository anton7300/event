@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container_page_sidebar">
            <div class="sidebar sidebar_left">
                @include('parts.left-menu')
            </div>
            <div class="content">
                <form method="POST" action="{{ route('event.store') }}" enctype="multipart/form-data">
                    @csrf

                    <input name="name" value="{{ old('name') }}" placeholder="name require" require>
                    @error('name')
                    {{ $message }}
                    @enderror

                    <input name="date" value="{{ old('date') }}" placeholder="date require" require>
                    @error('date')
                    {{ $message }}
                    @enderror

                    <input name="location" value="{{ old('location') }}" placeholder="location require" require>
                    @error('location')
                    {{ $message }}
                    @enderror

                    <input name="region" value="{{ old('region') }}" placeholder="region require" require>
                    @error('region')
                    {{ $message }}
                    @enderror

                    <input name="country" value="{{ old('country') }}" placeholder="country iso require" require>
                    @error('country')
                    {{ $message }}
                    @enderror

                    <input type="file" accept="image/jpeg,image/png" name="logo" value="{{ old('logo') }}">
                    @error('logo')
                    {{ $message }}
                    @enderror

                    <input name="description_short" value="{{ old('description_short') }}" placeholder="description_short">
                    @error('description_short')
                    {{ $message }}
                    @enderror

                    <input name="description" value="{{ old('description') }}" placeholder="description">
                    @error('description')
                    {{ $message }}
                    @enderror

                    <input name="age_from" value="{{ old('age_from') }}" placeholder="age_from">
                    @error('age_from')
                    {{ $message }}
                    @enderror

                    <input name="age_to" value="{{ old('age_to') }}" placeholder="age_to">
                    @error('age_to')
                    {{ $message }}
                    @enderror

                    <select name="gender" value="{{ old('gender') }}">
                        <option @if (empty(old('gender'))) selected @endif value="">{{ __('Select') }}</option>
                        <option value="1"  @if (old('gender') == 1) selected @endif>{{ __('Men') }}</option>
                        <option value="2"  @if (old('gender') == 2) selected @endif>{{ __('Women') }}</option>
                    </select>
                    @error('gender')
                    {{ $message }}
                    @enderror

                    <input name="count_users" value="{{ old('count_users') }}" placeholder="count_users">
                    @error('count_users')
                    {{ $message }}
                    @enderror

                    <select name="interest_id" value="{{ old('interest_id') }}">
                        <option @if (empty(old('interest_id'))) selected @endif value="">{{ __('Select') }}</option>
                        @foreach ($interestCats as $itemCat)
                            <option disabled data-cat="{{ $itemCat->id }}">{{ $itemCat->name }}</option>
                            @foreach ($interests as $item)
                                @if ($item->cat_id == $itemCat->id)
                                    <option value="{{ $item->id }}"  @if (old('interest_id') == $item->id) selected @endif>{{ $item->name }}</option>
                                @endif
                            @endforeach
                        @endforeach
                    </select>
                    @error('interest_id')
                    {{ $message }}
                    @enderror

                    <select name="type" value="{{ old('type') }}">
                        <option value="1"  @if (old('type') == 1) selected @endif>{{ __('Public') }}</option>
                        <option value="2"  @if (old('type') == 2) selected @endif>{{ __('Private') }}</option>
                    </select>
                    @error('type')
                    {{ $message }}
                    @enderror

                    <button type="submit">create</button>
                </form>
            </div>
            <div class="sidebar sidebar_right">
                sidebar
            </div>
        </div>
    </div>
@endsection