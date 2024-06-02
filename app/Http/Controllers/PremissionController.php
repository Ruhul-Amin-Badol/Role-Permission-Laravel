<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class PremissionController extends Controller
{
    public function __construct(){
        
        $this->middleware('permission:View permission',['only'=>['index']]);
        $this->middleware('permission:Create permission',['only'=>['create','store']]);
        $this->middleware('permission:Update permission',['only'=>['edit','update']]);
        $this->middleware('permission:Delete permission',['only'=>['destroy']]);
    }
    public function index()
    {
        $permissions = Permission::get();//its spatie model 
        return view('role_permission.permission.index',[
            'permission'=>$permissions
        ]);
    }
    public function create()
    {
        return view('role_permission.permission.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name'
            ]
        ]);
        Permission::create([
            'name' => $request->name
        ]);
        return redirect('permission')->with('status', 'Permission Created Successfully');
    }
    public function edit(Permission $permission)
    {
      
        return view('role_permission.permission.edit',[
            'permission'=> $permission
        ]);
    }


    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                 'unique:permissions,name,'.$permission->id
            ]
        ]);
            $permission->update([
                'name'=> $request->name,
            ]);
            return redirect('permission')->with('status', 'Permission Update Successfully');
    }
    


    public function destroy($permissionId)
    {
        $permission = Permission::find($permissionId);
        $permission->delete();
        return redirect('permission')->with('status', 'Permission Deleted Successfully');
       
    }
}
