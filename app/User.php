<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;
    use LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     *
     * Boot the model.
     *
     */

    public static function boot()

    {
        parent::boot();
        static::creating(function ($user) {

            $user->token = str_random(40);
        });

    }

    /**
    * Confirm the user.
     *
     * @return void
     */

    public function confirmEmail()

    {
        $this->confirmed = true;
        $this->token = null;
        $this->save();
    }
    
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
