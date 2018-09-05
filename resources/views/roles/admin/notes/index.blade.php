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
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('prospect.name_last', 'Prospect')</th>
                <th>@sortablelink('user.name', 'User')</th>
                <th>@sortablelink('title', 'Title')</th>
                <th>@sortablelink('description', 'Description')</th>
                <th>@sortablelink('created_at', 'Created')</th>
            </tr>
            </thead>
            <tbody>

            @if($notes)

                @foreach($notes as $note)
                    <tr>
                        <td>{{$note->id}}</td>
                        <td>{{$note->prospect->name_last}}</td>
                        <td>{{$note->user->name}}</td>
                        <td>{{str_limit($note->title, 10, ' ...')}}</td>
                        <td>{{str_limit($note->description, 80, ' ...')}}</td>
                        <td>{{$note->created_at ? $note->created_at->diffForHumans() : "-"}}</td>

                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>

        {{--{{ $notes->links() }}--}}
        {{ $notes->appends(\Request::except('page'))->render() }}



    {{-- SUBSCRIBER, AGENT & MANAGER ACCESS --}}
    @elseif(Auth::user()->role_id != 1)
        <h1>Notes</h1>
        <table class="table">
            <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('prospect', 'Prospect')</th>
                <th>@sortablelink('user.name', 'User')</th>
                <th>@sortablelink('title', 'Title')</th>
                <th>@sortablelink('description', 'Description')</th>
                <th>@sortablelink('created_at', 'Created')</th>
            </tr>
            </thead>
            <tbody>

            @if($notes2)
                @foreach($notes2 as $user_note)
                    @if(Auth::user()->id == $user_note->user_id)
                        <tr>
                            <td>{{$user_note->id}}</td>
                            <td>{{$user_note->prospect->name_last}}</td>
                            <td>{{$user_note->user->name}}</td>
                            <td>{{$user_note->title}}</td>
                            <td>{{str_limit($user_note->description, 60, ' ...')}}</td>
                            <td>{{$user_note->created_at ? $user_note->created_at->diffForHumans() : "-"}}</td>

                        </tr>
                    @endif
                @endforeach
            @endif

            </tbody>
        </table>


        {{ $notes2->appends(\Request::except('page'))->render() }}


    @endif


</div>






    @endsection
