@extends('layouts.app')


@section('content')

<div class="container">


    @if(@!Auth::user())
        You do not have permission to access this content.

    {{-- ADMIN ACCESS --}}cd
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
                <th>@sortablelink('updated_at', 'Updated')</th>
                <th>@sortablelink('funnel.id', 'Status ')</th>
            </tr>
            </thead>
            <tbody>

            @if($customers)

                @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer->id}}</td>
                        <td>{{$customer->user->name}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->updated_at ? $customer->created_at->diffForHumans() : "-"}}</td>

                        @if($customer->funnel->status == "Hot")
                            <td style="background-color:purple; color:white; text-transform:uppercase; text-align:center;">{{$customer->funnel->status}}</td>

                        @elseif($customer->funnel->status == "Warm")
                            <td style="background-color:orange; color:white; text-transform:uppercase; text-align:center;">{{$customer->funnel->status}}</td>

                        @elseif($customer->funnel->status == "Cold")
                            <td style="background-color:lightblue; color:white; text-transform:uppercase; text-align:center;">{{$customer->funnel->status}}</td>

                        @elseif($customer->funnel->status == "Dead")
                            <td style="background-color:#cfcfcf; color:#c3c3c3; text-transform:uppercase; text-align:center;">{{$customer->funnel->status}}</td>

                        @else
                            <td>-</td>

                        @endif
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
                <h1>Customers</h1>
            </div>

            <div class="col-md-2">
<a class="btn btn-success" href="{{ route('customers.create') }}">New Customer</a>

            </div>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>@sortablelink('name', 'Name')</th>
                <th>@sortablelink('email', 'Email')</th>
                <th>@sortablelink('phone', 'Phone')</th>
                <th>@sortablelink('funnel.id', 'Status ')</th>
            </tr>
            </thead>
            <tbody>

            @if($customers)
                @foreach($customers as $customer)
                    @if(Auth::user()->id == $customer->user_id)

                        <tr>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->phone}}</td>


                            @if($customer->funnel->status == "Hot")
                                <td style="background-color:purple; color:white; text-transform:uppercase; text-align:center;">{{$customer->funnel->status}}</td>

                            @elseif($customer->funnel->status == "Warm")
                                <td style="background-color:orange; color:white; text-transform:uppercase; text-align:center;">{{$customer->funnel->status}}</td>

                            @elseif($customer->funnel->status == "Cold")
                                <td style="background-color:lightblue; color:white; text-transform:uppercase; text-align:center;">{{$customer->funnel->status}}</td>

                            @elseif($customer->funnel->status == "Dead")
                                <td style="background-color:#cfcfcf; color:#c3c3c3; text-transform:uppercase; text-align:center;">{{$customer->funnel->status}}</td>

                            @else
                                <td>-</td>

                            @endif
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
