<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function show(Request $request){
        // $user = $request->user();
        $roles = Role::all();
        return view('roles.roles', compact('roles'));
    }
    public function create(){
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }
    public function store(Request $request){
        $role = Role::create($request->all());
        $role->syncPermissions($request->permissions);
        return redirect('/');
    }
    public function edit($id){
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }
    public function update(Request $request, $id){
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $role->update(request()->all());
        $role->syncPermissions($request->permissions ?? []);
        return redirect()->route('show_roles');
    }
    public function delete($id){
        $role = Role::destroy($id);
        redirect('home');
    }
    public function affect($id){
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('roles.affect', compact('user', 'roles'));
    }
    public function assign(Request $request, $id){
        $user = User::find($id);
        $permissions = Permission::all();
        $roles = Role::findById($request->role);
        $user->syncRoles($roles);
        return redirect()->route('show_users');
    }
    public function assignRole(Request $request)
    {
        $request->validate([
            'role'=>'required',
        ]);

        $user = User::find($request->user_id);

        $user->syncRoles([$request->role]);

        return back()->with('success', 'Rôle affecté avec succès !');
    }
}
