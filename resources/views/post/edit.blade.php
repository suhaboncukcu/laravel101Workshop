@extends('layouts.app')

@section('content')


<div class="container">
    @include('partials.error')
    <form action="{{ route('post.update', $post) }}" method="post" name="form">
        @csrf
        @method('patch')

        <div class="form-group">
            <a href="{{ route('post.index') }}" class="btn btn-outline-info btn-sm">list</a>
        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $post->content }}</textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection