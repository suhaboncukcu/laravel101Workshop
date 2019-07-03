@extends('layouts.app')

@section('content')


    <div class="container">
        @include('partials.error')

        <form action="{{ route('post.store') }}" method="post" name="form">
            @csrf
            @method('post')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection