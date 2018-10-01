@extends('layouts.admin')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Create a New User
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="col-md-8">
            {!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store', 'files' => true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', ['' => 'Chose Option']+ $roles, null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active', array('' => 'Chose Option', 1 => 'Active', 0 => 'Not Active'), null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Phoro:') !!}
                {!! Form::file('photo_id', ['class' => 'form-control-file']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
            
        </div>
            <!-- /.panel-body -->
    </div>
    @include('includes.from_error')
    
@endsection