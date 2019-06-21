<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;
use App\User;

use Response;
use Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return Response::json(array(
            'roles'      => collect($roles)->toArray()),
            200
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'manage_role_name' => 'required',
            'manage_role_desc' => 'required'
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'status'    => false,
                'message'   => 'Please provide all the details'),
                200
            );
        }

        $role                   = new Role;
        $role->display_name     = $request->manage_role_name;
        $role->description      = $request->manage_role_desc;
        $role->save();

        return Response::json(array(
            'status'    => true,
            'role'      => collect($role)->toArray()),
            200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);

        return Response::json(array(
            'role'      => collect($role)->toArray()),
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role                   = Role::find($id);

        $validator = Validator::make($request->all(), [
            'manage_role_name' => 'required',
            'manage_role_desc' => 'required'
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'status'    => false,
                'message'   => 'Please provide all the details'),
                200
            );
        }

        if($role->role_id == 1) {
            return Response::json(array(
                'user'      => collect($role)->toArray(),
                'status'    => false),
                200
            );
        }

        $role->display_name           = $request->manage_role_name;
        $role->description            = $request->manage_role_desc;
        $role->save();

        return Response::json(array(
            'user'      => collect($role)->toArray(),
            'status'    => true),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $user = User::where('role_id',$id)->get()->count();
        if($user > 0) {
            return Response::json(array(
                'status'    => false,
                'message'   => 'This role is in use. Please do not delete.'),
                200
            );
        }
        $role = Role::find($id);
        if($role->role_id == 1) {
            return Response::json(array(
                'status'    => false,
                'message'   => 'Admin roles cannot be deleted.'),
                200
            );
        }

        $role->delete();

        return Response::json(array(
            'status'    => true,
            'user' => $user),
            200
        );
 
    }
}
