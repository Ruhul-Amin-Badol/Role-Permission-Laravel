<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function __construct(){
        
        $this->middleware('permission:View role',['only'=>['index']]);
        $this->middleware('permission:Create role',['only'=>['create','store','addPermissionToRole','updatePermissionToRole']]);
        $this->middleware('permission:Update role',['only'=>['edit','update']]);
        $this->middleware('permission:Delete role',['only'=>['destroy']]);
    }
    public function index()
    {
        $roles = Role::get();//its spatie model 
        return view('role_permission.role.index', [
            'roles' => $roles
        ]);
    }
    public function create()
    {
        return view('role_permission.role.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name'
            ]
        ]);
        Role::create([
            'name' => $request->name
        ]);
        return redirect('roles')->with('status', 'Role  Created Successfully');
    }
    public function edit(Role $role)
    {

        return view('role_permission.role.edit', [
            'role' => $role
        ]);
    }


    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,' . $role->id
            ]
        ]);
        $role->update([
            'name' => $request->name,
        ]);
        return redirect('roles')->with('status', 'Role  Update Successfully');
    }



    public function destroy($roleId)
    {
        $roles = Role::find($roleId);
        $roles->delete();
        return redirect('roles')->with('status', 'Role Deleted Successfully');

    }

    public function addPermissionToRole($roleId)
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('role_permission.role.add-permissions', [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions,
        ]);
    }

    public function updatePermissionToRole(Request $request, $roleId)
    {
        $request->validate([
            'permission' => 'required',

        ]);
        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);
        return redirect()->back()->with('status', 'Permission Added to  Role');
    }
}
