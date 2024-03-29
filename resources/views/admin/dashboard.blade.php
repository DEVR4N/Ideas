@extends('layout.app')
@section('title', 'Admin Panel')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left-side-bar')
        </div>
        <div class="col-9">
            <h2>Admin Dashboard</h2>
        </div>
    </div>

@endsection
