@extends('layouts.app')


@section('content')

<div class="container">


    @if(@!Auth::user())
        You do not have permission to access this content.

        @elseif(Auth::user()->role_id == 1)
            Welcome, admin!


        <h1>Companies</h1>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>City</th>
                <th>State</th>
                <th>Phone</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>

            @if($companies)
                @foreach($companies as $company)
                    <tr>
                        <td>{{$company->id}}</td>
                        <td>{{$company->name}}</td>
                        <td>{{$company->city}}</td>
                        <td>{{$company->state}}</td>
                        <td>{{$company->phone}}</td>
                        <td>{{$company->created_at->diffForHumans()}}</td>
                        <td>{{$company->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>
        {{ $companies->links() }}

</div>

        @else
        You must be logged in with admin privileges to view this content.

    @endif


    @endsection
