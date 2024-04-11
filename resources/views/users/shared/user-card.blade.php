<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width: 50px; height: 50px;" class="me-3 avatar-sm rounded-circle"
                     src="{{$user->getImageUrl()}}" alt="{{ $user->name }}">
                <div>
                    <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}</a></h3>
                    <span class="fs-6 text-muted">{{$user->email}}</span>
                </div>

            </div>
            @can('update', $user)
                <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary btn-sm ms-3">
                    Edit <i class="fa-solid fa-pen "></i>
                </a>
            @endcan
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
                {{ $user->bio ?? 'No bio provided'}}
                @error('bio')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>
            @include('users.shared.user-stats')
            @auth
                @if(Auth::user()->isNot($user))
                    <div class="mt-3">
                        @if(Auth::user()->follows($user))
                            <form action="{{ route('user.unfollow', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-user-minus"></i> Unfollow
                                </button>
                            </form>
                        @else
                            <form action="{{ route('user.follow', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fa fa-user-plus"></i> Follow
                                </button>
                            </form>
                        @endif
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>
