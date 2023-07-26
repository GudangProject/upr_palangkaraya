<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.role-permission');
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

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissionId = $role->permissions->pluck('id');
        return view('admin.settings.edit-role-permission', [
            'role' => $role,
            'currentPermission' => Permission::whereIn('id', $permissionId)->get(),
            'dataPermission' => Permission::whereNotIn('id', $permissionId)->get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $permission = Permission::whereIn('id', $request->permission)->pluck('name');
            // dd($permission);
            $role = Role::where('id', $id)->first();
            $role->syncPermissions($permission);

            Alert::toast('Role Permission berhasil diupdate...', 'success');
            return redirect()->route('role-permission.index');
        } catch (Exception $error) {
            Alert::toast($error->getMessage(), 'success');
            return back();
        }
    }


    public function destroy($id)
    {
        //
    }

    public function createPermission(){
        return view('admin.settings.permission');
    }
}
