@extends('layouts.admin')
@section('content')

@if(Session::has('message'))
    <ul class="list-group">
        <li class="list-group-item alert alert-danger">{{Session::get('message')}}</li>
    </ul>
@endif
<div class="panel panel-default">
        <div class="panel-heading">
            All Post List
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>User</th>
                        <th>Photo</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sl = 0;?>
                    @foreach ($posts as $post)
                    <?php
                        $sl++;
                    ?>
                    <tr class="odd gradeX">
                        <td>{{ $sl }}</td>
                        <td class="center">{{ $post->user->name }}</td>
                        @if($post->photo_id)
                        <td class="text-center">
                            <img height="50px" width="100px" src="/images/{{ $post->photo ? $post->photo->photo : 'No Photo' }}" alt="">
                        </td>
                        @else
                        <td class="text-center"><img src="http://placehold.it/400x400" height="50px" width="50px" alt=""> </td>
                        @endif
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->title }}</td>
                        <td class="center">{{ str_limit($post->body, 30) }}</td>
                        <td class="center">
                            <a class="btn btn-sm btn-primary" href="{{ route('posts.edit', $post->id) }}">Edit</a> 
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}

                            <div class="form-group">
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>

@endsection()