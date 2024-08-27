<div class="d-flex flex-fill justify-content-end">
    @auth()
        @if($comment && $idea && (auth()->id() === $comment->user_id || auth()->user()->is_admin || auth()->id() === $idea->user_id))
            <form action="{{ route('ideas.comments.destroy', [$idea->id, $comment->id]) }}" method="POST"
                  class="d-inline">
                @csrf
                @method('DELETE')
                @can('delete', $comment)
                    <button class="btn text-danger"><i class="fa fa-trash"></i></button>
                @endcan
            </form>
        @endif
    @endauth()
</div>
