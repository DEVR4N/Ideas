@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-side-bar')
        </div>
        <div class="col-6">
            {{-- Begin of Shared Views --}}
            @include('shared.success-message')
            @include('ideas.shared.submit-idea')

            <hr>
            @forelse($ideas as $idea)
                <div class="mt-3">
                    @include('ideas.shared.idea-card')
                </div>
            @empty
                <div class="alert alert-info">
                    No ideas found.
                </div>
            @endforelse

            {{-- Page pagination  --}}
            <div class="mt-3">
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
        {{-- End of Shared Views --}}
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>

@endsection
