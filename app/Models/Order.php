<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = ['user_id', 'cart', 'method','shipping', 'pickup_location', 'totalQty', 'shipping_price', 'shipping_tax','wallet','order_completed', 'pay_amount', 'txnid','shipment_id', 'charge_id', 'order_number', 'payment_status','customer_country','currency_sign', 'customer_email', 'customer_name', 'customer_phone', 'customer_address', 'customer_city', 'customer_zip','shipping_name', 'shipping_email', 'shipping_phone', 'shipping_address', 'shipping_city', 'shipping_zip', 'order_note', 'status'];

    public function vendororders()
    {
        return $this->hasMany('App\Models\VendorOrder');
    }

    public function tracks()
    {
        return $this->hasMany('App\Models\OrderTrack','order_id');
    }  
    
    public function carts()
    {
      return  unserialize(bzdecompress(utf8_decode($this->cart)));
       
       
       
        
    }
      public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function   shipment(){
        return $this->belongsTo('App\Models\Shipment', 'shipment_id');        
    }
  

}
