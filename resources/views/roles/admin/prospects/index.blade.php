@extends('layouts.app')


@section('content')

<div class="container">


    @if(@!Auth::user())
        You do not have permission to access this content.

    {{-- ADMIN ACCESS --}}
    @elseif(Auth::user()->role_id == 1)
        <div class="row">
            <div class="col-md-10">
                <h1>Prospects</h1>
            </div>

            <div class="col-md-2">
                    <a class="btn btn-success" href="{{ route('prospects.create') }}">New Prospect</a>
            </div>
        </div>


        <table class="table">
            <thead>
            <tr>
                <th></th>
                <th>@sortablelink('user.name', 'User')</th>
                <th>@sortablelink('name_last', 'Last')</th>
                <th>@sortablelink('name_first', 'First')</th>
                <th>@sortablelink('email', 'Email')</th>
                <th>@sortablelink('phone', 'Phone')</th>
                <th>@sortablelink('fax', 'Fax')</th>
                <th>@sortablelink('updated_at', 'Updated')</th>
                <th>@sortablelink('funnel.id', 'Status ')</th>
            </tr>
            </thead>
            <tbody>

            @if($prospects)
                @foreach($prospects as $prospect)
                    <tr>
                        <td>{{$prospect->id}}</td>
                        <td>{{$prospect->user->name}}</td>
                        <td>{{$prospect->name_last ? $prospect->name_last : "-"}}</td>
                        <td>{{$prospect->name_first}}</td>
                        <td>{{$prospect->email ? $prospect->email : "-"}}</td>
                        <td>{{$prospect->phone ? $prospect->phone : "-"}}</td>
                        <td>{{$prospect->fax ? $prospect->fax : "-"}}</td>
                        <td>{{$prospect->updated_at ? $prospect->updated_at->diffForHumans() : "-"}}</td>

                        @if($prospect->funnel->status == "Hot")
                            <td style="background-color:purple; color:white; text-transform:uppercase; text-align:center;">{{$prospect->funnel->status}}</td>

                        @elseif($prospect->funnel->status == "Warm")
                            <td style="background-color:orange; color:white; text-transform:uppercase; text-align:center;">{{$prospect->funnel->status}}</td>

                        @elseif($prospect->funnel->status == "Cold")
                            <td style="background-color:lightblue; color:white; text-transform:uppercase; text-align:center;">{{$prospect->funnel->status}}</td>

                        @elseif($prospect->funnel->status == "Dead")
                            <td style="background-color:#cfcfcf; color:#c3c3c3; text-transform:uppercase; text-align:center;">{{$prospect->funnel->status}}</td>

                        @else
                            <td>-</td>

                        @endif
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>

        {{ $prospects->appends(\Request::except('page'))->render() }}


    {{-- SUBSCRIBER, AGENT & MANAGER ACCESS --}}
    @elseif(Auth::user()->role_id == 4 || Auth::user()->role_id == 3 || Auth::user()->role_id == 2)
        <div class="row">
            <div class="col-md-10">
                <h1>Prospects</h1>
            </div>

            <div class="col-md-2">
                <a class="btn btn-success" href="{{ route('prospects.create') }}">New Prospect</a>
            </div>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th></th>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('name_last', 'Last')</th>

                <th>@sortablelink('name_first', 'First')</th>
                <th>@sortablelink('email', 'Email')</th>
                <th>@sortablelink('phone', 'phone')</th>
                <th style="text-align:center;">@sortablelink('funnel.id', 'Status ')</th>
            </tr>
            </thead>
            <tbody>

            @if($prospects)
                @foreach($prospects as $usr_pro)
                    @if(Auth::user()->id == $usr_pro->user_id)
                        <tr>
                            <td><a href="{{route('prospects.edit', $usr_pro->id)}}">EDIT</a></td>
                            <td>{{ $usr_pro->id }}</td>
                            <td>{{$usr_pro->name_last ? $usr_pro->name_last : "-"}}</td>
                            <td>{{$usr_pro->name_first}}</td>
                            <td>{{$usr_pro->email ? $usr_pro->email : "-"}}</td>
                            <td>{{$usr_pro->phone ? $usr_pro->phone : "-"}}</td>

                            @if($usr_pro->funnel->status == "Hot")
                                <td style="background-color:purple; color:white; text-transform:uppercase; text-align:center;">{{$usr_pro->funnel->status}}</td>

                                @elseif($usr_pro->funnel->status == "Warm")
                                <td style="background-color:orange; color:white; text-transform:uppercase; text-align:center;">{{$usr_pro->funnel->status}}</td>

                                @elseif($usr_pro->funnel->status == "Cold")
                                    <td style="background-color:lightblue; color:white; text-transform:uppercase; text-align:center;">{{$usr_pro->funnel->status}}</td>

                            @elseif($usr_pro->funnel->status == "Dead")
                                <td style="background-color:silver; color:grey; text-transform:uppercase; text-align:center;">{{$usr_pro->funnel->status}}</td>

                            @else
                                <td>Nothing to show</td>

                            @endif
                        </tr>
                    @endif
                @endforeach
            @endif

            </tbody>
        </table>

        {{ $prospects->appends(\Request::except('page'))->render() }}

    @endif


</div>






    @endsection
