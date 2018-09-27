@extends('layouts.admin')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Update User
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="col-md-8">
            {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}

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
                {!! Form::select('role_id',  $roles, null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Phoro:') !!}
                {!! Form::file('photo_id', ['class' => 'form-control-file']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update User', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-md-4">
            @if($user->photo)
            <img src="/images/{{ $user->photo->photo }}" class="img-responsive img-rounded" alt="">
            @else
            <img src="http://placehold.it/400x400" class="img-responsive img-rounded" alt="">
            @endif
        </div>
            
        </div>
            <!-- /.panel-body -->
    </div>
    @include('includes.from_error')
    
@endsection