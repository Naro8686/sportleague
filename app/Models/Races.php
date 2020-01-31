<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Races extends Model
{
    protected $fillable = ['date', 'name', 'location', 'start_time', 'max_marshals'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_races','race_id', 'user_id');
    }
}
