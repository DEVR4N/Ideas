<form action="{{ route('ideas.comments.update', [$idea->id, $comment->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <textarea name="content" class="form-control" rows="1">{{ $comment->content }}</textarea>
        @error('content')
        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
        @enderror
    </div>
    <div class="">
        <button class="btn btn-dark btn-sm">Update</button>
    </div>
</form>
