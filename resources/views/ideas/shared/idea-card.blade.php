<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width: 50px; height: 50px;" class="me-2 avatar-sm rounded-circle"
                     src="{{ optional($idea->user)->getImageUrl() }}"
                     alt="{{ optional($idea->user)->name }}">
                <div>
                    <h5 class="card-title mb-0">
                        <a href="{{ route('users.show', $idea->user->id) }}">
                            {{ $idea->user->name }}
                        </a>
                    </h5>
                </div>
            </div>
            <div class="d-flex">
                <a href="{{ route('ideas.show',$idea->id) }}" class="btn btn-info btn-sm">
                    <i class="fa-regular fa-eye"></i>
                </a>
                @auth()
                    @can('update', $idea)
                        <a href="{{ route('ideas.edit',$idea->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <form id="delete-idea" method="POST" action="{{ route('ideas.destroy',$idea->id) }}">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-x"></i>
                            </button>
                        </form>
                    @endcan
                @endauth
            </div>
        </div>

        <div class="card-body">
            @if($editing ?? false)
                <form action="{{ route('ideas.update',$idea->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <textarea name="content" class="form-control" id="content"
                                  rows="3">{{ $idea->content }}</textarea>
                        @error('content')
                        <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="">
                        <button class="btn btn-dark mb-2"> Update</button>
                    </div>
                </form>
            @else
                <p class="fs-6 fw-light text-muted">
                    {{ $idea->content }}
                </p>
            @endif
            <div class="d-flex justify-content-between">
                @include('ideas.shared.like-button')
                <div>
                <span class="fs-6 fw-light text-muted">
                    <span class="fas fa-clock"> </span>
                    {{ $idea->created_at->diffForHumans() }}
                </span>
                </div>
            </div>
            @include('ideas.shared.comment-box')
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#delete-idea').submit(function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure ?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).unbind('submit').submit();
                    }
                });
            });
        });
    </script>
</div>
