@extends('layouts.admin')

@section('content')
    @if(Session::has('message'))
    <ul class="list-group">
        <li class="list-group-item alert alert-success">{{Session::get('message')}}</li>
    </ul>
    @endif
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                Update Category 
            </div>
            <div class="panel-body">
                {!! Form::model($category, ['method' => 'PATCH', 'action' => ['AdminCategoryController@update', $category->id]]) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Category Name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Update Category', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection