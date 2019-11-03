<?php

namespace App\Http\Controllers;

use App\Http\Requests\CriticRequest;
use App\Player;
use App\Critic;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CriticController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    public function store(CriticRequest $id)
    {
        $player = Player::findOrFail($id);
        $user = Auth::user();

        if($user->hasRole("user") && count($user->critics) >= 2){
            $user->roles()->sync(2);
            $user->save();
        }


        Critic::create([
            'critic' => $id->critic,
            'user_id' => Auth::id(),
            'player_id' => $player[0]->id
        ]);

        return redirect()->back();
    }

    public function destroy($id){
        $critic = Critic::findOrFail($id);
        $critic->delete();
        return redirect()->back();
    }

    public function action(Request $request){

        if($request->ajax()){
            $checkbox_value = $request->get('checkbox_value');
            $critic_id = $request->get('critic_id');

            $critic = Critic::findOrFail($critic_id);
            $critic->hidden = $checkbox_value;
            $critic->save();
        }

    }
}
