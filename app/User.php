<?php

namespace App;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    /**
     * Tweet database relationship, User can have many Tweets
     *
     * @return void
     */
    public function tweet()
    {
        return $this->hasMany(Tweet::class);
    }

    /**
     * Follow database Relationship, User can follow many users
     *
     * @return void
     */
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    /**
     * Method to create a new relationship (Follow)
     *
     * @param  User $user
     * @return void
     */
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    /**
     * Get avatar URL
     *
     * @return string
     */
    public function getAvatarAttribute()
    {
        return 'https://i.pravatar.cc/40?u=' . $this->email;
    }

    /**
     * Return tweets ordered by latests created_at
     *
     * @return array
     */
    public function timeline()
    {
        return Tweet::where('user_id', $this->id)->latest()->get();
    }
}
