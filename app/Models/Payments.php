<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = ['user_id', 'order_id', 'status', 'email', 'payer_id', 'full_name', 'amount', 'currency_code', 'invoice_url'];

    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }
}
