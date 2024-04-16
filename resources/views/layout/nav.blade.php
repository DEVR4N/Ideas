<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
     data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain me-1"> </span> {{ config('app.name') }} </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="{{ (Route::is('login')) ? 'active' : '' }} nav-link" aria-current="page"
                           href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{ (Route::is('register')) ? 'active' : '' }} nav-link"
                           href="{{route('register')}}">Register</a>
                    </li>
                @endguest

                @auth()
                    @if(Auth::user()->is_admin)
                        <li class="nav-item">
                            <a class="{{ (Route::is('admin.dashboard')) ? 'active' : '' }} nav-link"
                               href="{{route('admin.dashboard')}}">Admin Dashboard</a>
                        </li>
                    @endif
                        <li class="nav-item">
                            <a class="{{ (Route::is('profile')) ? 'active' : '' }} nav-link"
                               href="{{route('profile')}}">{{ Auth::user()->name }}</a>
                        </li>
                    <li class="nav-item">
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm">
                                Logout  <i class="fa-solid fa-person-walking-arrow-right"></i>
                            </button>

                        </form>
                    </li>
                @endauth
            </ul>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css" rel="stylesheet">
        <script>
            $(document).ready(function () {
                $('#logout').submit(function (e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Hey you !',
                        text: "Are you sure you want to logout?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, logout!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(this).unbind('submit').submit();
                        }
                    });
                });
            });
        </script>
    </div>
</nav>
