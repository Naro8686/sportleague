<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = ['user_id', 'status', 'amount', 'token'];

    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }
}
