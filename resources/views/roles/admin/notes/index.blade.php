@extends('layouts.app')


@section('content')

<div class="container">


    @if(@!Auth::user())
        You do not have permission to access this content.

    {{-- ADMIN ACCESS --}}
    @elseif(Auth::user()->role_id == 1)
        <h1>Notes</h1>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>

            @if($notes)
                @foreach($notes as $note)
                    <tr>
                        <td>{{$note->id}}</td>
                        <td>{{$note->user->name}}</td>
                        <td>{{$note->title}}</td>
                        <td>{{str_limit($note->description, 80, ' ...')}}</td>
                        <td>{{$note->created_at ? $note->created_at->diffForHumans() : "-"}}</td>

                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>

        {{ $notes->links() }}


    {{-- SUBSCRIBER, AGENT & MANAGER ACCESS --}}
    @elseif(Auth::user()->role_id == 4 || Auth::user()->role_id == 3 || Auth::user()->role_id == 2)
        <h1>Notes</h1>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>

            @if($usr_notes)
                @foreach($usr_notes as $user_note)
                    @if(Auth::user()->id == $user_note->user_id)
                        <tr>
                            <td>{{$user_note->id}}</td>
                            <td>{{$user_note->title}}</td>
                            <td>{{str_limit($user_note->description, 80, ' ...')}}</td>
                            <td>{{$user_note->created_at ? $user_note->created_at->diffForHumans() : "-"}}</td>

                        </tr>
                    @endif
                @endforeach
            @endif

            </tbody>
        </table>

        {{ $usr_notes->links() }}

    @endif


</div>






    @endsection
