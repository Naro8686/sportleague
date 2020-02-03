<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Clubs extends Model
{
    protected $fillable = ['name', 'website', 'person', 'email', 'phone'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_clubs','club_id', 'user_id');
    }
}
