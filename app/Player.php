<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['name', 'nationality', 'position', 'team_id', 'shirt', 'shirtNumber'];

    public function critics()
    {
        return $this->hasMany('App\Critic');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }
}
