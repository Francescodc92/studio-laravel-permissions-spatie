<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//models
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function destroy(User $user){
        $user->delete();
        return back()->with('message', 'user deletted successflly');
    }
}
