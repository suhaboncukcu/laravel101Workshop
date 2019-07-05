@extends('layouts.public')


@section('content')
    <div class="container mt-5">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{ $post->title }}</div>
                        <div class="card-body">
                            <p>{{ $post->content }}</p>
                        </div>
                        <div class="card-footer">
                            <blog-date-component
                                    v-bind:name="'{{ optional($post->user)->name }}'"
                                    v-bind:date-string="'{{ $post->created_at->format('d/m/Y H:i') }}'"
                            ></blog-date-component>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        {{ $posts->links() }}
    </div>
@endsection