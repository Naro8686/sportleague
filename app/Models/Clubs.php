<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clubs extends Model
{
    protected $fillable = ['name', 'website', 'email', 'phone'];
}
