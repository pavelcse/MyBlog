@extends('layouts.admin')

@section('content')
    @if(Session::has('message'))
    <ul class="list-group">
        <li class="list-group-item alert alert-success">{{Session::get('message')}}</li>
    </ul>
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create a New Category 
                </div>
                <div class="panel-body">
                    {!! Form::open(['method' => 'POST', 'action' => 'AdminCategoryController@store']) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Category Name:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Category List
                </div>
                <div class="panel-body">
                    @if($categories)
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        <?php $sl = 0; ?>
                        @foreach($categories as $category)
                        <?php $sl++; ?>
                        <tr>
                            <td>{{ $sl }}</td>
                            <td>{{ $category->name }}</td>
                            <td><a class="btn btn-primary btn-sm" href="{{ route('category.edit', $category->id) }}">Edit</a></td>
                            <td>
                            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminCategoryController@destroy', $category->id]]) !!}

                            <div class="form-group">
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                        <table class="table table-hover table-bordered">
                            <tr>
                                <th colspan="4">No Category Available</th>
                            </tr>
                        </table>
                    @endif
                </div>
            </div>
        </div>
        </div>
@endsection