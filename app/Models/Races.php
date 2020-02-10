<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Races extends Model
{
    protected $fillable = ['date', 'name', 'location', 'location_link', 'start_time', 'club_id', 'min_marshals', 'max_marshals'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_races','race_id', 'user_id')->withTimestamps();
    }

    public function club()
    {
        return $this->hasOne(Clubs::class, 'id','club_id');
    }

}
