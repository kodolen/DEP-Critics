<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RatingRequest;
use App\Player;
use App\Rating;
use App\Critic;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(RatingRequest $id)
    {
        $player = Player::findOrFail($id);
        $user = Auth::user();

//        dd($player);

        Rating::create([
            'rating' => $id->rating,
            'user_id' => Auth::id(),
            'player_id' => request('player_id')
        ]);


        return redirect()->back();
    }
}
