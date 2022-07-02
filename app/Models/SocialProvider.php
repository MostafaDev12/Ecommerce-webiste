<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialProvider extends Model
{
    protected $fillable = ['provider_id','provider','user_id'];


    function user()
    {
        return $this->belongsTo(User::class);
    }
}
