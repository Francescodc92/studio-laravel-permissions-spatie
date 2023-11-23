<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//models
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function show(User $user){
     
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.role', compact('user', 'roles','permissions'));
    }

    public function AssignRole(Request $request, User $user) {
        if($user->hasRole($request->role)){
            return back()->with('message', 'Role exists');
        };

        $user->assignRole($request->role);
        return back()->with('message', 'Role Added');
    }

    public function removeRole(User $user, Role $role) {
        if($user->hasRole($role)){
            $user->removeRole($role);
            return back()->with('message', 'Role Removed');
        };

        return back()->with('message', 'Role non exist');
    }

    public function givePermission(Request $request , User $user){
        if($user->hasPermissionTo($request->permission)){
            return back()->with('message', 'Permission exists');
        };

        $user->givePermissionTo($request->permission);
        return back()->with('message', 'Permission Added');
    }

    public function revokePermission(User $user, Permission $permission){
        if($user->hasPermissionTo($permission)){
            $user->revokePermissionTo($permission);
            return back()->with('message', 'Permission Revoked');
        };

        return back()->with('message', 'Permission not exists');
    }

    public function destroy(User $user){
        if($user->hasRole('admin')){
            return back()->with('message', 'can delete admin accont');
        }
        $user->delete();
        return back()->with('message', 'user deletted successflly');
    }

}
