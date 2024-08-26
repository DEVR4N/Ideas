<div class="d-flex flex-fill justify-content-end">
    @auth()
        @if(auth()->id() === $comment->user_id || auth()->user()->hasRole('admin'))
            <form action="{{ route('ideas.comments.edit', [$idea->id, $comment->id]) }}" method="GET" class="d-inline">
                @csrf
                <button class="btn text-info"><i class="fa fa-pencil"></i></button>
            </form>
            <form action="{{ route('ideas.comments.destroy', [$idea->id, $comment->id]) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn text-danger"><i class="fa fa-trash"></i></button>
            </form>
        @endif
    @endauth()
</div>
