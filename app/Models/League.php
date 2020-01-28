<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    /**
     * Class League
     *
     * @package App\Models\League
     * @property string $start_date
     * @property string $end_date
     * @property string $price
     * @property string $min_users
     * @property string $max_users
     */

    protected $fillable = ['start_date', 'end_date', 'price', 'min_users', 'max_users'];
}
