@extends('layouts.admin')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Create a New User
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="col-md-8">
                {!! Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store', 'files' => true]) !!}

                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('category_id', 'Category:') !!}
                    {!! Form::select('category_id', ['' => 'Chose Option'] + $categories, null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('body', 'Description:') !!}
                    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('photo_id', 'Photo:') !!}
                    {!! Form::file('photo_id', ['class' => 'form-control-file']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
            <!-- /.panel-body -->
    </div>
    @include('includes.from_error')
    
@endsection