@extends('layout.app')
@section('title', 'Users | Admin Panel')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left-side-bar')
        </div>
        <div class="col-9">
            <h2>Users Dashboard</h2>

            <table class="table table-stripped">
                <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class="text-center">
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at->toDateString()}}</td>
                        <td class="btn-group btn-group-sm " role="group" aria-label="Basic mixed styles example">
                            <a href="{{ route('users.show',$user) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('users.edit',$user) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$users->links()}}
        </div>
    </div>
@endsection
