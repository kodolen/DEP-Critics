<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Player;
use App\Team;
use App\Rating;

class PlayerController extends Controller
{
    public function showPlayer($id, $player_id){
        $team = Team::findOrFail($id);
        $player = Player::findOrFail($player_id);
        $critics = $player->critics->where('hidden', 0)->all();
        $avgRating = 0;
        $finalRating = 0;

//        dd($critics);

        if(!count($player->ratings) == 0){
            for($i = 0; $i < count($player->ratings); $i++){
                $avgRating += $player->ratings[$i]->rating;
            }
            $finalRating = $avgRating / count($player->ratings);
        }

        return view('player', [
            'player' => $player,
            'team' => $team,
            'finalRating' => $finalRating,
            'critic' => $critics
        ]);
    }
}
