@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <input name="nickname" value="{{ old('nickname') }}" placeholder="nickname require" required>
                        @error('nickname')
                        {{ $message }}
                        @enderror

                        <input name="name" value="{{ old('name') }}" placeholder="name require">
                        @error('name')
                        {{ $message }}
                        @enderror

                        <input name="email" value="{{ old('email') }}" placeholder="email require" required>
                        @error('email')
                        {{ $message }}
                        @enderror

                        <input name="phone" value="{{ old('phone') }}" placeholder="phone require" required>
                        @error('phone')
                        {{ $message }}
                        @enderror

                        <input name="age" value="{{ old('age') }}" placeholder="age" required>
                        @error('age')
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

                        <input name="location" value="{{ old('location') }}" placeholder="location">
                        @error('location')
                        {{ $message }}
                        @enderror

                        <select name="interest_id[]" multiple>
                            <option @if (empty(old('interest_id')))) selected @endif value="">{{ __('Select') }}</option>
                            @foreach ($interestCats as $itemCat)
                                <option disabled data-cat="{{ $itemCat->id }}">{{ $itemCat->name }}</option>
                                @foreach ($interests as $item)
                                    @if ($item->cat_id == $itemCat->id)
                                        <option value="{{ $item->id }}"
                                                @if (gettype(old('interest_id')) === 'array' && in_array($item->id, old('interest_id')))
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

                        <input type="password" name="password" placeholder="password" required>
                        @error('password')
                        {{ $message }}
                        @enderror

                        <input type="password" name="password_confirmation" placeholder="password confirmation" required>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
