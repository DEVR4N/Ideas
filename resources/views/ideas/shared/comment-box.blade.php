<div>
    @auth()
        <form action="{{ route('ideas.comments.store', $idea->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa-regular fa-comment"></i> Comment
                </button>
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
                        <div class="d-flex flex-fill">
                            @if($editing ?? false)
                                @include('ideas.shared.components.update-comment-form', ['idea' => $idea, 'comment' => $comment])
                            @else
                                <p class="fs-6 mt-3 fw-light">{{ $comment->content }}</p>
                                @include('ideas.shared.components.comment-action-buttons', ['idea' => $idea, 'comment' => $comment])
                            @endif
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('form[action*="comments.destroy"]').forEach(function (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
