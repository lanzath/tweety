<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAuthenticatedUser()
    {
      $this->attributes['user_id'] = auth()->id;
    }
}
