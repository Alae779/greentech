<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show(Request $request){
        $user = $request->user();
        $users = User::all();
        return view('users.users', compact('users'));
    }
    public function edit($id){
        $users = User::findOrFail($id);
        return view('users.edit', compact('users'));
    }
    public function update($id){
        $users = User::findOrFail($id);
        $users->update(request()->all()); 
        return redirect('/users');
    }
    public function delete($id){
        $product = User::destroy($id);
        return redirect('/users');
    }
}
