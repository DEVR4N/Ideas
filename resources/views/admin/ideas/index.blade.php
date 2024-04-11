@extends('layout.app')
@section('title', 'Ideas | Admin Panel')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left-side-bar')
        </div>
        <div class="col-9">
            <h2>Ideas Dashboard</h2>

            <table class="table table-stripped">
                <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>User</th>
                    <th>Content</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ideas as $idea)
                    <tr class="text-center">
                        <td>{{$idea->id}}</td>
                        <td>
                            <a href="{{route('users.show',$idea->user)}}">
                                {{$idea->user->name}}
                            </a>
                        </td>
                        <td>{{$idea->content}}</td>
                        <td>{{$idea->created_at->toDateString()}}</td>
                        <td class="btn-group btn-group-sm " role="group" aria-label="Basic mixed styles example">
                            <a href="{{route('ideas.show',$idea)}}" class="btn btn-info btn-sm">
                                <i class="fa-regular fa-eye fa-lg"></i>
                            </a>
                            <a href="{{route('ideas.edit',$idea)}}" class="btn btn-warning btn-sm">
                                <i class="fa-regular fa-pen-to-square fa-lg"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-x fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$ideas->links()}}
        </div>
    </div>
@endsection
