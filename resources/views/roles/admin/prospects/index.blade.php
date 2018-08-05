@extends('layouts.app')


@section('content')

<div class="container">


    @if(@!Auth::user())
        You do not have permission to access this content.

    {{-- ADMIN ACCESS --}}
    @elseif(Auth::user()->role_id == 1)
        Welcome, Admin!
        <h1>Prospects</h1>
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
                        <td>{{$prospect->updated_at ? $prospect->updated_at->diffForHumans() : "unknown date"}}</td>
                        <td>{{$prospect->updated_at ? $prospect->updated_at->diffForHumans() : "unknown date"}}</td>

                        @if($prospect->funnel->status == "Hot")
                            <td style="background-color:red; color:white">{{$prospect->funnel->status}}</td>

                        @elseif($prospect->funnel->status == "Warm")
                            <td style="background-color:green; color:white">{{$prospect->funnel->status}}</td>

                        @elseif($prospect->funnel->status == "Cold")
                            <td style="background-color:yellow; color:darkgrey">{{$prospect->funnel->status}}</td>

                        @elseif($prospect->funnel->status == "Dead")
                            <td style="background-color:silver; color:grey">{{$prospect->funnel->status}}</td>

                        @else
                            <td>Nothing to show</td>

                        @endif
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>

        {{ $prospects->links() }}


        {{-- MANAGER ACCESS --}}

        @elseif(Auth::user()->role_id == 2)
            Welcome, {{ Auth::user()->name }}
            <h1>Prospects</h1>
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

                @if($prospects)
                    @foreach($prospects as $prospect)
                        @if(Auth::user()->id == $prospect->user_id)
                            <tr>
                                <td>{{$prospect->id}}</td>
                                <td>{{$prospect->name_last ? $prospect->name_last : "-"}}</td>
                                <td>{{$prospect->name_first}}</td>
                                <td>{{$prospect->email ? $prospect->email : "-"}}</td>
                                <td>{{$prospect->phone ? $prospect->phone : "-"}}</td>
                                <td>{{$prospect->fax ? $prospect->fax : "-"}}</td>
                                <td>{{$prospect->updated_at ? $prospect->updated_at->diffForHumans() : "unknown date"}}</td>
                                <td>{{$prospect->updated_at ? $prospect->updated_at->diffForHumans() : "unknown date"}}</td>

                                @if($prospect->funnel->status == "Hot")
                                    <td style="background-color:red; color:white">{{$prospect->funnel->status}}</td>

                                @elseif($prospect->funnel->status == "Warm")
                                    <td style="background-color:green; color:white">{{$prospect->funnel->status}}</td>

                                @elseif($prospect->funnel->status == "Cold")
                                    <td style="background-color:yellow; color:darkgrey">{{$prospect->funnel->status}}</td>

                                @elseif($prospect->funnel->status == "Dead")
                                    <td style="background-color:silver; color:grey">{{$prospect->funnel->status}}</td>

                                @else
                                    <td>Nothing to show</td>

                                @endif
                            </tr>
                        @endif
                    @endforeach
                @endif

                </tbody>
            </table>

        {{ $prospects->links() }}



    {{-- SUBSCRIBER ACCESS --}}
    @elseif(Auth::user()->role_id == 4)
        Welcome, {{ Auth::user()->name }}
        <h1>Prospects</h1>
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

            @if($prospects)
                @foreach($prospects as $prospect)
                    @if(Auth::user()->id == $prospect->user_id)
                        <tr>
                            <td>{{$prospect->id}}</td>
                            <td>{{$prospect->name_last ? $prospect->name_last : "-"}}</td>
                            <td>{{$prospect->name_first}}</td>
                            <td>{{$prospect->email ? $prospect->email : "-"}}</td>
                            <td>{{$prospect->phone ? $prospect->phone : "-"}}</td>
                            <td>{{$prospect->fax ? $prospect->fax : "-"}}</td>
                            <td>{{$prospect->updated_at ? $prospect->updated_at->diffForHumans() : "unknown date"}}</td>

                            @if($prospect->funnel->status == "Hot")
                                <td style="background-color:red; color:white">{{$prospect->funnel->status}}</td>

                                @elseif($prospect->funnel->status == "Warm")
                                <td style="background-color:green; color:white">{{$prospect->funnel->status}}</td>

                                @elseif($prospect->funnel->status == "Cold")
                                    <td style="background-color:yellow; color:darkgrey">{{$prospect->funnel->status}}</td>

                            @elseif($prospect->funnel->status == "Dead")
                                <td style="background-color:silver; color:grey">{{$prospect->funnel->status}}</td>

                            @else
                                <td>Nothing to show</td>

                            @endif
                        </tr>
                    @endif
                @endforeach
            @endif

            </tbody>
        </table>

        {{ $prospects->links() }}

    @endif


</div>






    @endsection
