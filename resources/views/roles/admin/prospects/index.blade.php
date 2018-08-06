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
                <th>ID</th>
                <th>Created By</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Fax</th>
                <th>Updated</th>
                <th>Status</th>
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
                            <td style="background-color:purple; color:white; text-transform:uppercase;">{{$prospect->funnel->status}}</td>

                        @elseif($prospect->funnel->status == "Warm")
                            <td style="background-color:orange; color:white; text-transform:uppercase;">{{$prospect->funnel->status}}</td>

                        @elseif($prospect->funnel->status == "Cold")
                            <td style="background-color:lightblue; color:white; text-transform:uppercase;">{{$prospect->funnel->status}}</td>

                        @elseif($prospect->funnel->status == "Dead")
                            <td style="background-color:#cfcfcf; color:#c3c3c3; text-transform:uppercase;">{{$prospect->funnel->status}}</td>

                        @else
                            <td>-</td>

                        @endif
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>

        {{ $prospects->links() }}


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
                <th>ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Fax</th>
                <th>Updated</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>

            @if($usr_pros)
                @foreach($usr_pros as $usr_pro)
                    @if(Auth::user()->id == $usr_pro->user_id)
                        <tr>
                            <td>{{$usr_pro->id}}</td>
                            <td>{{$usr_pro->name_last ? $usr_pro->name_last : "-"}}</td>
                            <td>{{$usr_pro->name_first}}</td>
                            <td>{{$usr_pro->email ? $usr_pro->email : "-"}}</td>
                            <td>{{$usr_pro->phone ? $usr_pro->phone : "-"}}</td>
                            <td>{{$usr_pro->fax ? $usr_pro->fax : "-"}}</td>
                            <td>{{$usr_pro->updated_at ? $usr_pro->updated_at->diffForHumans() : "-"}}</td>

                            @if($usr_pro->funnel->status == "Hot")
                                <td style="background-color:red; color:white">{{$usr_pro->funnel->status}}</td>

                                @elseif($usr_pro->funnel->status == "Warm")
                                <td style="background-color:green; color:white">{{$usr_pro->funnel->status}}</td>

                                @elseif($usr_pro->funnel->status == "Cold")
                                    <td style="background-color:yellow; color:darkgrey">{{$usr_pro->funnel->status}}</td>

                            @elseif($usr_pro->funnel->status == "Dead")
                                <td style="background-color:silver; color:grey"><i class="fas fa-dizzy"></i>{{$usr_pro->funnel->status}}</td>

                            @else
                                <td>Nothing to show</td>

                            @endif
                        </tr>
                    @endif
                @endforeach
            @endif

            </tbody>
        </table>

        {{ $usr_pros->links() }}

    @endif


</div>






    @endsection
