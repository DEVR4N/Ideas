<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-3 avatar-sm rounded-circle"
                     src="{{$user->getImageUrl()}}" alt="Mario Avatar">
                <div>
                    <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}</a></h3>
                    <span class="fs-6 text-muted">{{$user->email}}</span>
                </div>

            </div>

            @auth
                @if(Auth::id() === $user->id)
                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary btn-sm ms-3"> Edit </a>
                @endif
            @endauth
        </div>

        @if($editing ?? false)
            <div class="mt-4">
                <label>Profile Photo</label>
                <input name="image" type="file" class="form-control">
            </div>
        @endif

        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio : </h5>
            <div class="mb-3">
                {{ $user->bio }}
                @error('bio')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                                    </span> 120 Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                                    </span> {{$user->ideas()->count()}} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                                    </span> {{$user->comments()->count()}} </a>
            </div>
            @auth
                @if(Auth::id() !== $user->id)
                    <div class="mt-3">
                        @if(Auth::user()->follows($user))
                        <form action="{{ route('user.unfollow', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"> Unfollow</button>
                        </form>
                        @else
                        <form action="{{ route('user.follow', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm"> Follow</button>
                        </form>
                        @endif
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>
