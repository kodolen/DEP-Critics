<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;

class Critic extends Model
{
//    use DatePresenter;

    protected $fillable = ['critic', 'user_id', 'player_id', 'hidden'];

    public function player()
    {
        return $this->belongsTo('App\Player');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
