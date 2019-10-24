<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
//        $request->user()->authorizeRoles(['user', 'prem_user' , 'moderator', 'admin']);

        $roles = Role::all();

        if($roles->isEmpty()){
            Role::create([
                'name' => 'user',
                'description' => 'basic access',
            ]);

            Role::create([
                'name' => 'prem_user',
                'description' => 'premium access',
            ]);

            Role::create([
                'name' => 'moderator',
                'description' => 'premium access and can edit/delete critics',
            ]);

            Role::create([
                'name' => 'admin',
                'description' => 'godmode acces',
            ]);
        }

        return view('home');
    }
}
