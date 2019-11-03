<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['rating', 'user_id', 'player_id'];

    public function player()
    {
        return $this->belongsTo('App\Player');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
