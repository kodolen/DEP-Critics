<?php

namespace App\Http\Controllers;

use App\Http\Requests\CriticRequest;
use App\Player;
use App\Critic;
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
//        $number = $player[0]->id;

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
}
