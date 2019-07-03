@extends('layouts.app')

@section('content')

    <div class="container">
        <table class="table table-bordered table-sm table-striped">
            <thead>
                <th>id</th>
                <th>title</th>
                <th>tools</th>
            </thead>
            @foreach($posts as $post)
                <tr>
                    <td>
                        #{{ $post->id }}
                    </td>
                    <td>
                        <a href="{{ route('post.show', $post) }}">{{ $post->title }}</a>
                    </td>
                    <td>
                        <form action="{{ route('post.destroy', $post) }}" method="post" name="form">
                            @csrf
                            @method('delete')
                            <div class="btn-group-sm">
                                <a class="btn btn-outline-info" href="{{ route('post.edit', $post) }}">edit</a>
                                <button type="submit" class="btn btn-sm btn-outline-danger">delete</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="container">
        {{ $posts->links() }}
    </div>

@endsection