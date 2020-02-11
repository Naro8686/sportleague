<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = ['user_id', 'email', 'payer_id', 'first_name', 'last_name', 'country', 'invoice_number', 'amt', 'token'];

    public function payment()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }
}
