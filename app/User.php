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
        // include all of the user's tweets
        // as well as the tweets of everyone
        // they follow in descending order by date

        $friends = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id', $friends)
            ->orWhere('user_id', $this->id)
            ->latest()->get();
    }

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
     * Follow database Relationship, User can follow many users
     *
     * @return void
     */
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    /**
     * Use user name as key to browse through routes
     * @return String
     */
    public function getRouteKeyName()
    {
        return 'name';
    }
}
