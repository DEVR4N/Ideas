<div>
    @auth()
        <form action="{{ route('ideas.comments.store', $idea->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-sm"> Post Comment</button>
            </div>
            @endauth
        </form>
        <hr>
        <h6 class="mt-3">Comments</h6>
        @forelse($idea->comments as $comment)
            <div class="d-flex align-items-start">
                <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                     src="{{ $comment->user->getImageUrl() }}"
                     alt="Luigi Avatar">
                <div class="w-100">
                    <input type="hidden" name="idea_id" value="{{ $idea->id }}">

                    <div class="d-flex justify-content-between">
                        <h6 class="">{{ $comment->user->name }}
                        </h6>
                        <small class="fs-6 fw-light text-muted">
                            {{ $comment->created_at->diffForHumans() }}
                        </small>
                    </div>
                    <p class="fs-6 mt-3 fw-light">
                        {{ $comment->content }}
                    </p>
                </div>
            </div>
        @empty
            <p class="fs-6 fw-light text-muted text-center">No comments yet</p>
        @endforelse
</div>
