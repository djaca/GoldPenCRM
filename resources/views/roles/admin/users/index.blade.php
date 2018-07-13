@extends('layouts.app')


@section('content')

<div class="container">

    @if(@!Auth::user())
        Welcome guest. You must be logged in to view this content.

        @elseif(Auth::user()->role_id == 1)
            Welcome, admin!


        <h1>Users</h1>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>

            @if($users)
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>
        {{ $users->links() }}

</div>

        @else
        You must be logged in with admin privileges to view this content.

    @endif



    @endsection
