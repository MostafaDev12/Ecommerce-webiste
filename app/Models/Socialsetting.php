<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Socialsetting extends Model
{
    protected $fillable = ['facebook', 'twitter', 'gplus', 'linkedin', 'dribble','youtube','ystatus','f_status', 't_status', 'g_status', 'l_status','i_status','instagram', 'd_status','f_check','g_check','fclient_id','fclient_secret','fredirect','gclient_id','gclient_secret','gredirect'];
    public $timestamps = false;
}
