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
        <h6 class="mt-4 mb-3">Comments</h6>
        @forelse($idea->comments as $comment)
            <div class="d-flex align-items-start">
                <img style="width: 35px; height: 35px;" class="me-2 avatar-sm rounded-circle"
                     src="{{ $comment->user->getImageUrl() }}"
                     alt="Luigi Avatar">
                <div class="w-100">
                    <input type="hidden" name="idea_id" value="{{ $idea->id }}">

                    <div class="d-flex justify-content-between">
                        <h6 class="mt-2">{{ $comment->user->name }} </h6>
                    </div>

                    <div class="d-flex flex-fill">
                        <p class="fs-6 mt-3 fw-light"> {{ $comment->content }} </p>

                        <div class="d-flex flex-fill justify-content-end">
                            @auth()
                                @csrf
                                <button type="submit" class="btn text-danger"><i class="fa fa-trash"></i></button>
                                <button type="submit" class="btn text-info"><i class="fa fa-pencil"></i></button>
                            @endauth()
                        </div>

                    </div>
                    <small class="fs-6 fw-light text-muted">
                        {{ $comment->created_at->diffForHumans() }}
                    </small>
                    <hr class="mt-1 mb-1"/>
                </div>
            </div>
        @empty
            <p class="fs-6 fw-light text-muted text-center">No comments yet</p>
        @endforelse
</div>
