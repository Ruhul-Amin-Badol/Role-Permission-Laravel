<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(){
        
        $this->middleware('permission:View user',['only'=>['index']]);
        $this->middleware('permission:Create user',['only'=>['create','store']]);
        $this->middleware('permission:Update user',['only'=>['edit','update']]);
        $this->middleware('permission:Delete user',['only'=>['destroy']]);
    }
    public function index(){
        $users = User::get();
        return view("role_permission.user.index",compact("users"));
    }
    public function create(){
        $roles=Role::pluck('name','name')->all();
        return view("role_permission.user.create",compact("roles"));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|max:20|min:8',
            'roles' => 'required',
            
        ]);
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);
        $user->syncRoles($request->roles);
        return redirect('/users')->with('success','User Created Successfuly With Role');
    }

    public function edit(User $user){
        $roles=Role::pluck('name','name')->all();
        $userRoles=$user->roles->pluck('name','name')->all();
        return view('role_permission.user.edit',compact('user','roles','userRoles'));
    }

    public function update(Request $request, User $user){
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|max:20|min:8',
            'roles'=>'required',
        ]);
        $data=[
            'name'=> $request->name,
            'email'=>$request->email,
        ];
        if(!empty($request->password)){
            $data +=['password'=> Hash::make($request->password)];
        }
        $user->update($data);
        $user->syncRoles($request->roles);
        return redirect('/users')->with('success','user update sucessfuly with role');
    }

    public function destroy($userId){
        $user = User::findOrFail($userId);
        $user->delete();
        return redirect('users')->with('success','Delete  Successfully User');
    }
}
