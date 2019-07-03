@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header">
                <a href="{{ route('post.index') }}" class="card-link">List</a>
            </div>
            <div class="card-title">
                <h3>{{ $post->title }}</h3>
            </div>
            <div class="card-body">
                {{ $post->content }}
            </div>
            <div class="card-footer">
                <form action="{{ route('post.destroy', $post) }}" method="post" name="form">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn-link btn">delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection