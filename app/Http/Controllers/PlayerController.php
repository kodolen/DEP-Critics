<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Player;
use App\Team;

class PlayerController extends Controller
{
    public function showPlayer($id, $player_id){
        $team = Team::findOrFail($id);
        $player = Player::findOrFail($player_id);

        return view('player', [
            'player' => $player,
            'team' => $team
        ]);
    }
}
