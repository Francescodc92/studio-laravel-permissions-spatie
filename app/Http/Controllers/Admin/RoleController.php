<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create() {
        return view('admin.roles.create');
    }

    public function store(Request $request){
        $formData = $request->validate([
            'name'=> 'required|min:3'
        ],[
            'name.required'=> 'il campo role name è obbligatorio',
            'name.min'=> 'il campo role name deve ricevere almeno 3 caratteri'
        ]);
        
        Role::create($formData)->with('message', 'Role Created successfully');

        return to_route('admin.roles.index');
    }

    public function edit(Role $role){
        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role){
        $formData = $request->validate([
            'name'=> 'required|min:3'
        ],[
            'name.required'=> 'il campo role name è obbligatorio',
            'name.min'=> 'il campo role name deve ricevere almeno 3 caratteri'
        ]);

        $role->update($formData);
        return to_route('admin.roles.index')->with('message', 'Role Updated successfully');
    }

    public function destroy(Role $role){
        $role->delete();

        return to_route('admin.roles.index')->with('message', 'Role Deletted successfully');
    }
}
