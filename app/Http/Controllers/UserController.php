<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Team;
use App\Role;
use App;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    function index(){
        //show all users for admin
        if(Auth::user()->hasRole('admin')){
          $users = User::all();

            return view('users', [
                'users' => $users
            ]);
        }
        else {
            return redirect('/');
        }

    }

    function show($id){
        $user = User::findOrFail($id);
        $teams = Team::get()->pluck('name');
        $roles = Role::get()->pluck('name', 'id');
        $role = $user->roles->pluck('name')->first();
        $roleID = $user->roles->pluck('id')->first();

        if(Auth::id() === $user->id || Auth::user()->hasRole('admin')){
            return view('user', compact('user', 'teams', 'role', 'roles', 'roleID'));
        } else {
            return redirect('/');
        }
    }

    function update($id){
        $user = User::findOrFail($id);

        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->favorite_team = request('favorite_team');
        $user->roles()->sync(request('role'));


        $user->save();

        return redirect()->back();
    }

    function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/users');
    }
}
