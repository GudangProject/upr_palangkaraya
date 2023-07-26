<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Exception;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    public function index()
    {
        return view('admin.users.index');
    }


    public function create()
    {
        $data['roles'] = Role::all();

        return view('admin.users.create', [
            'data' => $data,
        ]);
    }


    public function store(Request $request)
    {
        // dd($request);
        try {
            $input                  = $request->except(['_token', 'role', 'password']);
            $user                   = new User();
            $user->username         = Str::slug($request->name);
            $user->password         = Hash::make('Prosiding123oke');
            $user->remember_token   = Str::random(8);
            $user->fill($input)->save();

            if($request->role == 0){
                $user->assignRole('writer');
            }else{
                $user->assignRole($request->role);
            }

            Alert::success('Success', 'User added successfully');
            return redirect()->route('users.index');
        } catch (Exception $error) {
            Alert::error('Error', $error->getMessage());
            return redirect()->route('users.index');
        }

    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        return view('admin.users.edit', [
            'data' => User::findOrFail($id),
            'roles' => Role::all()
        ]);

    }


    public function update(Request $request, $id)
    {
        // dd($request->role);
        try {
            $input  = $request->except(['_token', 'role', 'password']);
            $user = User::findOrFail($id);
            $user->fill($input)->save();

            if($request->role != 0){
                $user->syncRoles($request->role);
            }

            Alert::success('Success', 'User added successfully');
            return redirect()->route('users.index');
        } catch (Exception $error) {
            Alert::error('Error', $error->getMessage());
            return redirect()->route('users.index');
        }
    }


    public function destroy($id)
    {
        dd($id);
    }

    public function showTrashed(){
        return view('admin.users.trashed');
        // dd(User::onlyTrashed()->get());
    }
}
