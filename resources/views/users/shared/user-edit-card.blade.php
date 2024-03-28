<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" action="{{route('users.update', $user->id)}}" method="POST">
            @csrf
            @method('PUT')
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-3 avatar-sm rounded-circle"
                     src="{{$user->getImageUrl()}}" alt="Mario Avatar">
                <div>
                    <input name="name" type="text" value="{{$user->name}}" class="form-control">
                    @error('name')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>


            </div>

            @auth
                @if(Auth::id() === $user->id)
                    <a href="{{route('users.show',$user->id)}}" class="btn btn-primary btn-sm ms-3"> View </a>
                @endif
            @endauth
        </div>
        <div class="mt-4">
            <label>Profile Photo</label>
            <input name="image" type="file" class="form-control">
            @error('image')
                <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio : </h5>
            <div class="mb-3">
                <textarea name="bio" class="form-control" id="bio" rows="3">{{ $user->bio }}</textarea>
                @error('bio')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                @enderror
            </div>

            <input class="btn btn-success btn-sm mb-3" type="submit" value="Update">
            @include('users.shared.user-stats')
        </div>
        </form>
    </div>
</div>
