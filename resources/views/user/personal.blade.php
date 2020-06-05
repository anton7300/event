@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container_page_sidebar">
            <div class="sidebar sidebar_left">
                @include('parts.left-menu')
            </div>
            <div class="content">
                <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <input name="name" value="{{ $user->name }}" placeholder="name require" require>
                    @error('name')
                    {{ $message }}
                    @enderror

                    <input name="email" value="{{ $user->email }}" placeholder="email require" require>
                    @error('email')
                    {{ $message }}
                    @enderror

                    <input name="phone" value="{{ $user->phone }}" placeholder="phone require" require>
                    @error('phone')
                    {{ $message }}
                    @enderror

                    <input type="file" accept="image/jpeg,image/png" name="logo" value="{{ $user->logo }}">
                    @error('logo')
                    {{ $message }}
                    @enderror

                    <input name="location" value="{{ $user->location }}" placeholder="location">
                    @error('location')
                    {{ $message }}
                    @enderror

                    <input name="age" value="{{ $user->age }}" placeholder="age" require>
                    @error('age')
                    {{ $message }}
                    @enderror

                    <select name="gender" value="{{ $user->gender }}">
                        <option @if (empty($user->gender)) selected @endif value="">{{ __('Select') }}</option>
                        <option value="1"  @if ($user->gender == 1) selected @endif>{{ __('Men') }}</option>
                        <option value="2"  @if ($user->gender == 2) selected @endif>{{ __('Women') }}</option>
                    </select>
                    @error('gender')
                    {{ $message }}
                    @enderror

                    <select name="interest_id[]" multiple>
                        <option @if (empty($user->interest_id))) selected @endif value="">{{ __('Select') }}</option>
                        @foreach ($interestCats as $itemCat)
                            <option disabled data-cat="{{ $itemCat->id }}">{{ $itemCat->name }}</option>
                            @foreach ($interests as $item)
                                @if ($item->cat_id == $itemCat->id)
                                    <option value="{{ $item->id }}"
                                            @if (gettype($user->interest_id) === 'array' && in_array($item->id, $user->interest_id))
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

                    <input type="password" name="password" placeholder="password">
                    @error('password')
                    {{ $message }}
                    @enderror

                    <input type="password" name="password_confirmation" placeholder="password confirmation">

                    <button type="submit">edit</button>
                </form>
            </div>
            <div class="sidebar sidebar_right">
                sidebar
            </div>
        </div>
    </div>
@endsection