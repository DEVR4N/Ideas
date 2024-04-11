<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ (Route::is('dashboard')) ? 'text-white bg-primary rounded' : ''}} nav-link"
                   href="{{route('dashboard')}}">
                    <i class="fa-solid fa-house"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ (Request::is('feed')) ? 'text-white bg-primary rounded' : ''}} nav-link"
                   href="{{url('feed')}}">
                    <i class="fa-solid fa-recycle"></i>
                    <span>Feed</span></a>
            </li>
            <li class="nav-item">
                <a class="{{ (Request::is('terms')) ? 'text-white bg-primary rounded' : ''}} nav-link"
                   href="{{url('terms')}}">
                    <i class="fa-regular fa-newspaper"></i>
                    <span>Terms</span></a>
            </li>

        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="btn btn-link btn-sm" href="{{route('lang','en')}}"> en </a>
        <a class="btn btn-link btn-sm" href="{{route('lang','fr')}}"> fr </a>
        <a class="btn btn-link btn-sm" href="{{route('lang','tr')}}"> tr </a>
    </div>
</div>
