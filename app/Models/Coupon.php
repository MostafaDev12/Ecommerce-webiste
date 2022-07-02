<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['code', 'type', 'price', 'times', 'start_date','end_date','limited','user_id','photo','what'];
    public $timestamps = false;
    
    
    
     public function upload($name,$file,$oldname)
    {
                $file->move('assets/images/coupon/',$name);
                if($oldname != null)
                {
                    if (file_exists(public_path().'/assets/images/coupon/'.$oldname)) {
                        unlink(public_path().'/assets/images/coupon/'.$oldname);
                    }
                }  
    }
}
