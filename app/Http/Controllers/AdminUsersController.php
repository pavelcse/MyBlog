<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;
use App\User;
use App\Role;
use App\Photo;

class AdminUsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index')
                ->with('users', $users);
    }


    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.create')
            ->with('roles', $roles);
    }

   
    public function store(UsersRequest $request)
    {
        if(trim($request->password) == ''){
            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        
        if($file = $request->file('photo_id')){
            $file_name = time().$file->getClientOriginalName();
            $file->move('images', $file_name);

            $photo = Photo::create(
                [
                    'photo' => $file_name
                ]
            );

            $input['photo_id'] = $photo->id;
            }

            User::create($input);
            
            return redirect()->route('users.index');
    }


    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.edit')
                ->with('user', $user)
                ->with('roles', $roles);
    }

 
    public function update(UsersEditRequest $request, $id)
    {
        $user = User::findOrFail($id);
        
        if(trim($request->password) == ''){
            $input = $request->except('password');
        }else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }


        if($file = $request->file('photo_id')){
            $file_name = time().$file->getClientOriginalName();
            $file->move('images', $file_name);

            $photo = Photo::create(
                [
                    'photo' => $file_name
                ]
            );

            $input['photo_id'] = $photo->id;
            }

         
            $user->update($input);
            
            return redirect()->route('users.index');
    }


    public function destroy($id)
    {
        //
    }
}
