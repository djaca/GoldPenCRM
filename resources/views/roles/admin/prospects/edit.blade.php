@extends('layouts.app')


@section('content')

<div class="container">


    @if(@!Auth::user())
        You do not have permission to access this content.


        @else
        <h1>Edit Prospect</h1>

        {!! Form::model($prospect, ['method'=>'PATCH', 'action' => ['ProspectController@update', $prospect->id]]) !!}

        <div class="form-group">
            {!! Form::label('funnel_id', 'Prospect Status:') !!}<br>
            {!! Form::select('funnel_id', [''=>'Select Status'] + $funnels, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('name_first', 'First Name:') !!}<br>
            {!! Form::text('name_first', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('name_last', 'Last Name:') !!}<br>
            {!! Form::text('name_last', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}<br>
            {!! Form::text('email', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('address1', 'Address 1:') !!}<br>
            {!! Form::text('address1', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('address2', 'Address 2:') !!}<br>
            {!! Form::text('address2', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('city', 'City:') !!}<br>
            {!! Form::text('city', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('state', 'State:') !!}<br>
            {!! Form::text('state', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('zip', 'Zip:') !!}<br>
            {!! Form::text('zip', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('phone', 'Phone:') !!}<br>
            {!! Form::text('phone', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('fax', 'Fax:') !!}<br>
            {!! Form::text('fax', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Prospect', ['class' => 'btn btn-primary col-sm-2']) !!}
        </div>

        {!! Form::close() !!}


        {!! Form::open(['method'=>'DELETE', 'action' => ['ProspectController@destroy', $prospect->id]]) !!}

        <div class="form-group">
            {!! Form::submit('Delete Prospect', ['class' => 'btn btn-danger col-sm-2 col-sm-offset-2']) !!}
        </div>

        {!! Form::close() !!}


    @endif


</div>






    @endsection
