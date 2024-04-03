@extends('layout.app')
@section('title', $user->name)
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-side-bar')
        </div>
        <div class="col-6">
            @include('shared.success-message')
            <div class="mt-3">
                @include('users.shared.user-card')
            </div>
            <hr>
            @forelse($ideas as $idea)
                <div class="mt-3">
                    @include('ideas.shared.idea-card')
                </div>
            @empty
                <div class="alert alert-info shadow-sm p-3 mb-5 bg-body rounded">
                    User has not posted any ideas yet.
                </div>
            @endforelse
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>

@endsection
