<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use App\User;

class User extends Authenticatable
{
    use Notifiable;

    public function contacts()
    {
        return $this->belongsToMany(User::class, 'contacts_users', 'user_id', 'contact_id');
    }
    public function phones()
    {
        return $this->hasMany('App\Phone');
    }


    // Same table, self referencing, but change the key order
    // public function theFriends()
    // {
    // return $this->belongsToMany('User', 'friend_user', 'friend_id', 'user_id');
    // }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','address','username'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
