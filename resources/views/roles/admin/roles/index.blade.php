@extends('layouts.app')


@section('content')

<div class="container">

    @if(@!Auth::user())
        You do not have permission to access this content.

        @elseif(Auth::user()->role_id == 1)
            Welcome, admin!


        <h1>Roles</h1>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
            </thead>
            <tbody>

            @if($roles)
                @foreach($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>


</div>

        @else
        You must be logged in with admin privileges to view this content.

    @endif



    @endsection
