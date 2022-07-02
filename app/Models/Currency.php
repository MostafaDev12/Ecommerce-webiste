<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['name','name_ar', 'sign', 'value'];
    public $timestamps = false;
}
