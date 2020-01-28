<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Races extends Model
{
    protected $fillable = ['date', 'name', 'location', 'start_time', 'max_marshals'];
}
