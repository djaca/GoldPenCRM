@extends('layouts.app')


@section('content')

<div class="container">


    @if(@!Auth::user())
        You do not have permission to access this content.


    @elseif(Auth::user()->role_id == 1)
        Welcome, Admin!
        <h1>Notes</h1>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
               {{-- <th>Prospect</th>--}}
                <th>Title</th>
                <th>Description</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>

            @if($notes)
                @foreach($notes as $note)
                    <tr>
                        <td>{{$note->id}}</td>
                        <td>{{$note->user->name}}</td>
                        {{--<td>{{$note->prospect->name}}</td>--}}
                        <td>{{$note->title}}</td>
                        <td>{{$note->description}}</td>
                        <td>{{$note->created_at->diffForHumans()}}</td>
                        <td>{{$note->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>

        {{ $notes->links() }}

        @elseif(Auth::user()->role_id == 2)
            Welcome, Manager!
            <h1>Notes</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    {{-- <th>Prospect</th>--}}
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
                </thead>
                <tbody>

                @if($notes)
                    @foreach($notes as $note)
                        @if(Auth::user()->id == $note->user_id)
                            <tr>
                                <td>{{$note->id}}</td>
                                <td>{{$note->user->name}}</td>
                                {{--<td>{{$note->prospect->name}}</td>--}}
                                <td>{{$note->title}}</td>
                                <td>{{$note->description}}</td>
                                <td>{{$note->created_at->diffForHumans()}}</td>
                                <td>{{$note->updated_at->diffForHumans()}}</td>
                            </tr>
                        @endif
                    @endforeach
                @endif

                </tbody>
            </table>

        {{ $notes->links() }}

    @endif


</div>






    @endsection