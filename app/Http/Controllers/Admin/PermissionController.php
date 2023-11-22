<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index() {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create() {
        return view('admin.permissions.create');
    }

    public function store(Request $request){
        $formData = $request->validate([
            'name'=> 'required'
        ],[
            'name.required'=>'il campo permission name è obbligatorio'
        ]);

        Permission::create($formData)->with('message', 'Permission Created successfully');

        return to_route('admin.permissions.index');
    }

    public function edit(Permission $permission){
        $roles = Role::all();
        return view('admin.permissions.edit', compact('permission', 'roles'));
    }

    public function update(Request $request, Permission $permission){
        $formData = $request->validate([
            'name'=> 'required'
        ],[
            'name.required'=>'il campo permission name è obbligatorio'
        ]);

        $permission->update($formData);

        return to_route('admin.permissions.index')->with('message', 'Permission Updated successfully');
    }

    public function destroy(Permission $permission){
        $permission->delete();

        return back()->with('message', 'Permission Deletted successfully');
    }

    public function AssignRole(Request $request, Permission $permission) {
        if($permission->hasRole($request->role)){
            return back()->with('message', 'Role exists');
        };

        $permission->assignRole($request->role);
        return back()->with('message', 'Role Added');
    }

    public function removeRole(Permission $permission, Role $role) {
        if($permission->hasRole($role)){
            $permission->removeRole($role);
            return back()->with('message', 'Role Removed');
        };

        return back()->with('message', 'Role non exist');
    }
}
