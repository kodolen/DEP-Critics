<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{

    protected $fillable = ['name', 'description', 'user_id', 'player_id'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
