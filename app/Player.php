<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['name', 'position', 'nationality', 'team_id'];

    public function critics()
    {
        return $this->hasMany('App\Critic');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }

}
