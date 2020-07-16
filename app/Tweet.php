<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $guarded = [];

    /**
     * User database relationship
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
