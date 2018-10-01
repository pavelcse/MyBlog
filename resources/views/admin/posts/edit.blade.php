@extends('layouts.admin')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Update Post
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="col-md-8">
            {!! Form::model($post, ['method' => 'PATCH', 'action' => ['AdminPostsController@update', $post->id], 'files' => true]) !!}

                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('category_id', 'Category:') !!}
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
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
                    {!! Form::submit('Update Post', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
            </div>
            <div class="col-md-4">
                @if($post->photo)
                    <img src="/images/{{ $post->photo->photo }}" class="img-responsive img-rounded" alt="">
                    @else
                    <img src="http://placehold.it/400x400" class="img-responsive img-rounded" alt="">
                @endif
            </div>
        </div>
            <!-- /.panel-body -->
    </div>
    @include('includes.from_error')
    
@endsection