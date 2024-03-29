@extends('layout.app')
@section('title', 'Admin Panel')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left-side-bar')
        </div>
        <div class="col-9">
            <h2>Admin Dashboard</h2>

            <div class="row">
                <div class="col-sm-6 col-md-4">
                        @include('shared.widget', [
                            'icon' => 'fas fa-users',
                            'color' => 'bg-primary',
                            'title' => 'Total Users',
                            'value' => $totalUsers
                        ])
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                        @include('shared.widget', [
                            'icon' => 'fa fa-lightbulb',
                            'color' => 'bg-primary',
                            'title' => 'Total Ideas',
                            'value' => $totalIdeas
                        ])
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                        @include('shared.widget', [
                            'icon' => 'fas fa-comments',
                            'color' => 'bg-primary',
                            'title' => 'Total Comments',
                            'value' => $totalComments
                        ])
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
