@extends('layouts.public')


@section('content')
    <div class="container">
        @foreach($posts as $post)
            <h4>{{ $post->title }}</h4>
            <p>{{ $post->content }}</p>
            <p>{{ optional($post->user)->name }}</p>
            <hr>
        @endforeach
    </div>

    <div class="container">
        {{ $posts->links() }}
    </div>
@endsection