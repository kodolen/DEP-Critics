<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Team;
use App;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    function index(){
        //show all users for admin
        $users = User::get();
        dd($users);
    }

    function show($id){
        $user = User::findOrFail($id);
        $teams = Team::get()->pluck('name');

        if(Auth::user() == $user){
            return view('user', compact('user', 'teams'));
        } else {
            return redirect('/');
        }
    }

    function update($id){
        $user = User::findOrFail($id);

        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->favorite_team = request('favorite_team');

        $user->save();

        return redirect()->back();
    }

    function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/');
    }
}
