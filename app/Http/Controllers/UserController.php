<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Role;
use App\Expense;

use Response;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('getUserRole')->get();
        $roles = Role::all();

        return Response::json(
            array(
                'users'      => collect($users)->toArray(),
                'roles'      => collect($roles)->toArray()
            ),
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
            'manage_user_name' => 'required',
            'manage_user_email' => 'required',
            'manage_user_role' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        
        $user                   = new User;
        $user->name             = $request->manage_user_name;
        $user->email            = $request->manage_user_email;
        $user->role_id          = $request->manage_user_role;
        $user->password         = bcrypt('NEWACCOUNT');
        $user->api_token        = Str::random(60);
        $user->save();

        return Response::json( array(
                'user'      => collect($user)->toArray(),
                'status'    => true
            ),
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
        $user = User::find($id);


        return Response::json(array(
                'user'      => collect($user)->toArray()
            ),
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
        $user                   = User::find($id);

        $validator = Validator::make($request->all(), [
            'manage_user_name' => 'required',
            'manage_user_email' => 'required',
            'manage_user_role' => 'required',
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'status'    => false,
                'message'   => 'Please provide all the details'),
                200
            );
        }

        if ($user->role_id == 1 && $request->manage_user_role != 1) {
            return Response::json(
                array(
                    'user'      => collect($user)->toArray(),
                    'status'    => false
                ),
                200
            );
        }

        $user->name             = $request->manage_user_name;
        $user->email            = $request->manage_user_email;
        $user->role_id          = $request->manage_user_role;
        $user->save();

        return Response::json(array(
                'user'      => collect($user)->toArray(),
                'status'    => true
            ),
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

        $user = User::find($id);
        if ($user->role_id == 1) {
            return Response::json(array(
                'status'    => false,
                'message'   => 'This account is an administrator and cannot be deleted'),
                200
            );
        }

        $expense = Expense::where('user_id', $id)->get()->count();
        // Check first if user has expense
        if ($expense > 0) {
            Expense::where('user_id', $id)->delete();
        }

        $user->delete();

        return Response::json(array(
                'status'    => true
            ),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAccount(Request $request)
    {
        $user_id = Auth::user()->user_id;

        $validator = Validator::make($request->all(), [
            'manage_account_name' => 'required',
            'manage_account_email' => 'required'
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'status'    => false,
                'message'   => 'Please provide all the details'),
                200
            );
        }

        $user = User::find($user_id);
        $user->name     = $request->manage_account_name;
        $user->email    = $request->manage_account_email;

        if ($request->manage_account_password) {
            $user->password = bcrypt($request->manage_account_password);
        }

        $user->save();
        return redirect('/');
    }
}
