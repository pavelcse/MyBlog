@extends('layouts.admin')
@section('content')

@if(Session::has('message'))
    <ul class="list-group">
        <li class="list-group-item alert alert-danger">{{Session::get('message')}}</li>
    </ul>
@endif
<div class="panel panel-default">
        <div class="panel-heading">
            All User List
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sl = 0;?>
                    @foreach ($users as $user)
                    <?php
                        $sl++;
                    ?>
                    <tr class="odd gradeX">
                        <td>{{ $sl }}</td>
                        @if($user->photo)
                        <td>
                            <img height="50px" width="50px" src="/images/{{ $user->photo ? $user->photo->photo : 'No Photo' }}" alt="">
                        </td>
                        @else
                        <td><img src="http://placehold.it/400x400" height="50px" width="50px" alt=""> </td>
                        @endif
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="center">{{ $user->role->name }}</td>
                        <td class="center">{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
                        <td class="center">
                            <a class="btn btn-sm btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a> 
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id], 'files' => true]) !!}

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