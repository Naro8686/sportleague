<?php
namespace App;

use App\Models\Clubs;
use App\Models\Payments;
use App\Models\Races;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\ResetPassword;
use Hash;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
*/
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $fillable = ['first_name', 'last_name', 'phone', 'email', 'race_category', 'password', 'remember_token'];
    
    
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
    
    
    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function club()
    {
        return $this->belongsToMany(Clubs::class, 'user_clubs','user_id', 'club_id');
    }

    public function races()
    {
        return $this->belongsToMany(Races::class, 'user_races','user_id', 'race_id')->withTimestamps();
    }

    public function payment()
    {
        return $this->belongsTo(Payments::class, 'id','user_id');
    }
    
}
