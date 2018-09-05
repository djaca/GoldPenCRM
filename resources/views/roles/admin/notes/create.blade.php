@extends('layouts.app')


@section('content')

<div class="container">


    @if(@!Auth::user())
        You do not have permission to access this content.


        @else
        <h1>New Note</h1>
        {!! Form::open(['method'=>'POST', 'action'=>'NoteController@store']) !!}

        <div class="form-group">
            {!! Form::label('funnel_id', 'Prospect Status:') !!}<br>
            {!! Form::select('funnel_id', [''=>'Select Status'] + $funnels, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('prospect_id', 'Prospect Name') !!}<br>
            {!! Form::select('prospect_id', [''=>'Select Prospect'] + $prospects, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}<br>
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}<br>
            {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Create Note', ['class'=>"btn btn-primary"]) !!}
        </div>

        {!! Form::close() !!}

    @endif


</div>






    @endsection
