@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Edit Comment</h1>
        <form action="{{ route('comments.update', $comment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="content" class="form-label">Comment</label>
                <textarea name="content" class="form-control" id="content" rows="3">{{ $comment->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Comment</button>
        </form>
    </div>
@endsection
