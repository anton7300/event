@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container_page_sidebar">
            <div class="sidebar sidebar_left">
                @include('parts.left-menu')
            </div>
            <div class="content">
                <form method="POST" action="{{ route('interest.store') }}">
                    @csrf

                    <input name="name" value="{{ old('name') }}" placeholder="name require" require>
                    @error('name')
                    {{ $message }}
                    @enderror

                    <select name="cat_id" value="{{ old('cat_id') }}">
                        <option @if (empty(old('cat_id'))) selected @endif value="">{{ __('Select') }}</option>
                        @foreach ($interestCats as $item)
                            <option value="{{ $item->id }}"  @if (old('cat_id') == $item->id) selected @endif>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('cat_id')
                    {{ $message }}
                    @enderror

                    <button type="submit">create</button>
                </form>
            </div>
            <div class="sidebar sidebar_right">
                <a href="{{ route('interest.create') }}">create</a>
            </div>
        </div>
    </div>
@endsection