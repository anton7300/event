@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container_page_sidebar">
            <div class="sidebar sidebar_left">
                @include('parts.left-menu')
            </div>
            <div class="content">
                <form method="POST" action="{{ route('interest.update', ['interest' => $interest->id]) }}">
                    @method('PUT')
                    @csrf

                    <input name="name" value="{{ $interest->name }}" placeholder="name require" require>
                    @error('name')
                    {{ $message }}
                    @enderror

                    <select name="cat_id" value="{{ $interest->cat_id }}">
                        <option @if (empty($interest->cat_id)) selected @endif value="">{{ __('Select') }}</option>
                        @foreach ($interestCats as $item)
                            <option value="{{ $item->id }}"  @if ($interest->cat_id == $item->id) selected @endif>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('cat_id')
                    {{ $message }}
                    @enderror

                    <button type="submit">edit</button>
                </form>
            </div>
            <div class="sidebar sidebar_right">
                <a href="{{ route('interest.create') }}">create</a>
            </div>
        </div>
    </div>
@endsection