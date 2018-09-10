@extends('layouts.app')


@section('content')

<div class="container">


    @if(@!Auth::user())
        You do not have permission to access this content.

    {{-- ADMIN ACCESS --}}
    @elseif(Auth::user()->role_id == 1)

        <div class="row">
            <div class="col-md-10">
                <h1>Customers</h1>
            </div>

            <div class="col-md-2">
                <a class="btn btn-success" href="{{ route('customers.create') }}">New Customer</a>
            </div>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('user.name', 'User')</th>
                <th>@sortablelink('name', 'Name')</th>
                <th>@sortablelink('created_at', 'Created')</th>
            </tr>
            </thead>
            <tbody>

            @if($customers)

                @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer->id}}</td>
                        <td>{{$customer->user->name}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->created_at ? $customer->created_at->diffForHumans() : "-"}}</td>

                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>

        {{--{{ $customers->links() }}--}}
        {{ $customers->appends(\Request::except('page'))->render() }}



    {{-- SUBSCRIBER, AGENT & MANAGER ACCESS --}}
    @elseif(Auth::user()->role_id != 1)

        <div class="row">
            <div class="col-md-10">
                <h1>customers</h1>
            </div>

            <div class="col-md-2">
<a class="btn btn-success" href="{{ route('customers.create') }}">New Customer</a>

            </div>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('user.name', 'User')</th>
                <th>@sortablelink('prospect.name_last', 'Last')</th>
                <th>@sortablelink('prospect.name_first', 'First')</th>
                <th>@sortablelink('title', 'Title')</th>
                <th>@sortablelink('description', 'Description')</th>
                <th>@sortablelink('created_at', 'Created')</th>
            </tr>
            </thead>
            <tbody>

            @if($customers)
                @foreach($customers as $user_customer)
@if(Auth::user()->id == $user_customer->user_id)

                        <tr>
                            <td>{{$user_customer->id}}</td>
                            <td>{{$user_customer->user->name}}</td>
                            <td>{{$user_customer->prospect->name_last}}</td>
                            <td>{{$user_customer->prospect->name_first}}</td>
                            <td>{{$user_customer->title}}</td>
                            <td>{{str_limit($user_customer->description, 60, ' ...')}}</td>
                            <td>{{$user_customer->created_at ? $user_customer->created_at->diffForHumans() : "-"}}</td>

                        </tr>
@endif

                @endforeach
            @endif

            </tbody>
        </table>


        {{ $customers->appends(\Request::except('page'))->render() }}

    @endif



</div>






    @endsection
