@extends('layout.app')
@section('title', 'Comments | Admin Panel')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left-side-bar')
        </div>
        <div class="col-9">
            <h2>Comments Dashboard</h2>
            @include('shared.success-message')
            <table class="table table-stripped">
                <thead>
                <tr class="text-center">
                    <th>Comment ID</th>
                    <th>User</th>
                    <th>Idea</th>
                    <th>Content</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr class="text-center">
                        <td>{{$comment->id}}</td>
                        <td>
                            <a href="{{route('users.show',$comment->user)}}">
                                {{$comment->user->name}}
                            </a>
                        </td>
                        <td>
                            <a href="{{route('users.show',$comment->idea)}}">
                                {{$comment->idea->id}}
                            </a>
                        </td>
                        <td>{{$comment->content}}</td>
                        <td>{{$comment->created_at->toDateString()}}</td>

                        <td class="btn-group btn-group-sm " role="group" aria-label="Basic mixed styles example">
                            {{--                                <a href="{{route('comments.show',$comment->user)}}" class="btn btn-info btn-sm">Show</a>--}}
                            {{--                                <a href="{{route('comments.edit',$comment->user)}}" class="btn btn-warning btn-sm">Edit</a>--}}
                            <form action="{{route('admin.comments.destroy',$comment)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$comments->links()}}
        </div>
    </div>
@endsection
