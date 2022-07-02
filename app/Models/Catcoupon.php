<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catcoupon extends Model {
    
    protected $table = 'coupon_categories';
     protected $fillable = array('code_id','cat_id');
        public $timestamps = false;
    
    public static function findByCode($code){
        
        return self::where('code',$code)->first();
    }
    
   
 
}


