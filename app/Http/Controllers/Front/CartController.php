<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Currency;
use App\Models\Coupon;
use App\Models\Free;
use App\Models\Color;
use App\Models\Procoupon;


use App\Models\Catcoupon;
use App\Models\Subcatcoupon;
use App\Models\Childcatcoupon;
use App\Models\Brandcoupon;


use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Subcategory;
use App\Models\Brand;




use App\Models\Profree;
use App\Models\UserCart;
use App\Models\UserDelete;
use App\Models\Piece;
use App\Models\Propiece;
use App\Models\Referral;
use App\Models\Generalsetting;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class CartController extends Controller
{

    public function cart($lang)
    {
        
         $id = DB::table('languages')->where('sign','=',$lang)->first();
    	  if($id){
    	    Session::put('language', $id->id);
    	   }else{
    	         $data = DB::table('languages')->where('is_default','=',1)->first();
    	         Session::put('language', $data->id);
    	    }
    	    
        $this->code_image();
        if (!Session::has('cart')) {
            return view('front.cart',$lang);
        }
        if (Session::has('already')) {
            Session::forget('already');
        }
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        
         if (Session::has('free_shipping')) {
            Session::forget('free_shipping');
        }
        if (Session::has('coupon_total')) {
            Session::forget('coupon_total');
        }
        if (Session::has('coupon_total1')) {
            Session::forget('coupon_total1');
        }
        if (Session::has('coupon_percentage')) {
            Session::forget('coupon_percentage');
        }
        /* free product coupon*/
        if (Session::has('coupon_free')) {
            Session::forget('coupon_free');
        } 
        
                if (Session::has('coupon_piece')) {
             $oldCart = Session::has('cart') ? Session::get('cart') : null;
               $cart = new Cart($oldCart);
                 foreach($cart->items as $key => $prod)
            {
                if($prod['item']['id'] ==  Session::get('coupon_pro')){
                   $itemid = $prod['item']['id'].$prod['size'].$prod['color'] ;
                
               $cart->items[$itemid]['qty'] -=  Session::get('coupon_take'); 
               $cart->totalQty -=  Session::get('coupon_take') ; 
            
               Session::put('cart',$cart);
                break;
            }
        } 
             
            Session::forget('coupon_piece');
        }
        if (Session::has('coupon_pro')) {
            Session::forget('coupon_pro');
        }
        if (Session::has('coupon_free_color')) {
            Session::forget('coupon_free_color');
        } 
        
        if (Session::has('coupon_free_size')) {
            Session::forget('coupon_free_size');
        }
        if (Session::has('coupon_product')) {
            Session::forget('coupon_product');
        }
         if (Session::has('coupon_take')) {
            Session::forget('coupon_take');
        }
      if (Session::has('coupon_get')) {
            Session::forget('coupon_get');
        }
    
        
        
        $gs = Generalsetting::findOrFail(1);
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $totalPrice = $cart->totalPrice;
        $mainTotal = $totalPrice;
        $tx = $gs->tax;
        if($tx != 0)
        {
            $tax = ($totalPrice / 100) * $tx;
            $mainTotal = $totalPrice + $tax;
        }

        return view('front.cart', compact('products','totalPrice','mainTotal','tx')); 
    }

    public function cart_34($lang)
    {
        
         $id = DB::table('languages')->where('sign','=',$lang)->first();
    	  if($id){
    	    Session::put('language', $id->id);
    	   }else{
    	         $data = DB::table('languages')->where('is_default','=',1)->first();
    	         Session::put('language', $data->id);
    	    }
    	    
        $this->code_image();
        if (!Session::has('cart')) {
            return view('front.f-cart',['lang' => $lang]);
        }
        if (Session::has('already')) {
            Session::forget('already');
        }
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        
         if (Session::has('free_shipping')) {
            Session::forget('free_shipping');
        }
        if (Session::has('coupon_total')) {
            Session::forget('coupon_total');
        }
        if (Session::has('coupon_total1')) {
            Session::forget('coupon_total1');
        }
        if (Session::has('coupon_percentage')) {
            Session::forget('coupon_percentage');
        }
        /* free product coupon*/
        if (Session::has('coupon_free')) {
            Session::forget('coupon_free');
        } 
        
                if (Session::has('coupon_piece')) {
             $oldCart = Session::has('cart') ? Session::get('cart') : null;
               $cart = new Cart($oldCart);
                 foreach($cart->items as $key => $prod)
            {
                if($prod['item']['id'] ==  Session::get('coupon_pro')){
                   $itemid = $prod['item']['id'].$prod['size'].$prod['color'] ;
                
               $cart->items[$itemid]['qty'] -=  Session::get('coupon_take'); 
               $cart->totalQty -=  Session::get('coupon_take') ; 
            
               Session::put('cart',$cart);
                break;
            }
        } 
             
            Session::forget('coupon_piece');
        }
        if (Session::has('coupon_pro')) {
            Session::forget('coupon_pro');
        }
        if (Session::has('coupon_free_color')) {
            Session::forget('coupon_free_color');
        } 
        
        if (Session::has('coupon_free_size')) {
            Session::forget('coupon_free_size');
        }
        if (Session::has('coupon_product')) {
            Session::forget('coupon_product');
        }
         if (Session::has('coupon_take')) {
            Session::forget('coupon_take');
        }
      if (Session::has('coupon_get')) {
            Session::forget('coupon_get');
        }
    
        
        
        $gs = Generalsetting::findOrFail(1);
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $totalPrice = $cart->totalPrice;
        $mainTotal = $totalPrice;
        $tx = $gs->tax;
        if($tx != 0)
        {
            $tax = ($totalPrice / 100) * $tx;
            $mainTotal = $totalPrice + $tax;
        }

        return view('front.f-cart', compact('products','totalPrice','mainTotal','tx')); 
    }


    public function cartview($lang)
    {
         $id = DB::table('languages')->where('sign','=',$lang)->first();
    	  if($id){
    	    Session::put('language', $id->id);
    	   }else{
    	         $data = DB::table('languages')->where('is_default','=',1)->first();
    	         Session::put('language', $data->id);
    	    }
        return view('load.cart'); 
    }
    
  public function cart2view($lang)
    {
         $id = DB::table('languages')->where('sign','=',$lang)->first();
    	  if($id){
    	    Session::put('language', $id->id);
    	   }else{
    	         $data = DB::table('languages')->where('is_default','=',1)->first();
    	         Session::put('language', $data->id);
    	    }
        return view('load.cart2'); 
    }

   public function addtocart($lang,$id)
    {
        
    
       
        $id2 = DB::table('languages')->where('sign','=',$lang)->first();
    	  if($id2){
    	    Session::put('language', $id2->id);
    	   }else{
    	         $data = DB::table('languages')->where('is_default','=',1)->first();
    	         Session::put('language', $data->id);
    	    }
        $prod = Product::where('id','=',$id)->first(['id','user_id','slug','name','name_ar','photo','erp_id','free_ship','feature','trial_period','subscription_period','subscription_type','size','size_qty','size_price','color','price','stock','type','file','link','license','license_qty','measure','scale','whole_sell_qty','whole_sell_discount','attributes']);

        // Set Attrubutes

        $keys = '';
        $values = '';
          $var = ''; 
           
        if(!empty($prod->license_qty))
        {
        $lcheck = 1;
            foreach($prod->license_qty as $ttl => $dtl)
            {
                if($dtl < 1)
                {
                    $lcheck = 0;
                }
                else
                {
                    $lcheck = 1;
                    break;
                }                    
            }
                if($lcheck == 0)
                {
                    return 0;            
                }
        }


        // Set Size

        $size = '';
        $size_qty = '';
         $color = ''; 
          $size_price = 0;
        if(!empty($prod->size))
        { 
        $size = trim($prod->size[0]);
        $size_qty = !empty($prod->size_qty) ? $prod->size_qty[0] : null ;
        }   
        if(!empty($prod->color))
        {    
        $color = $prod->color[0];
         $size_price = $prod->size_price[0];
        $color = str_replace('#','',$color);
        }
        
        $co = Color::where('product_id',$id)->where('size_qty','>',0)->first();
    

        // Set Color

         if(!empty($co))
        { 
        $size =  $co->size ; 
        $size_qty = $co->size_qty ;
         $size_price = $co->size_price ;
        $var = $co->erp_var_id;  
        $color = str_replace('#','',$co->colors); 
         
        } 
        


        if($prod->user_id != 0){
        $gs = Generalsetting::findOrFail(1);
        $prc = $prod->price + $gs->fixed_commission + ($prod->price/100) * $gs->percentage_commission ;
        $prod->price = round($prc,2);
        }

        // Set Attribute


            if (!empty($prod->attributes))
            {
                $attrArr = json_decode($prod->attributes, true);

                $count = count($attrArr);
                $i = 0;
                $j = 0; 
                      if (!empty($attrArr))
                      {
                          foreach ($attrArr as $attrKey => $attrVal)
                          {

                            if (is_array($attrVal) && array_key_exists("details_status",$attrVal) && $attrVal['details_status'] == 1) {
                                if($j == $count - 1){
                                    $keys .= $attrKey;
                                }else{
                                    $keys .= $attrKey.',';
                                }
                                $j++;

                                foreach($attrVal['values'] as $optionKey => $optionVal)
                                {
                                    
                                    $values .= $optionVal . ',';

                                    $prod->price += $attrVal['prices'][$optionKey];
                                    break;
                                     
                                    
                                }

                            }
                          }

                      }

                }
                $keys = rtrim($keys, ',');
                $values = rtrim($values, ',');


         $prod->price += $size_price;
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $cart->add($prod, $prod->id, $size,$size_qty ,$color,$var, $keys, $values);
        if($cart->items[$id.$size.$color.str_replace(str_split(' ,'),'',$values)]['dp'] == 1)
        {
            return redirect()->route('front.cart',$lang);
        }
        if($cart->items[$id.$size.$color.str_replace(str_split(' ,'),'',$values)]['stock'] < 0)
        {
            return redirect()->route('front.cart',$lang);
        }
        if(!empty($cart->items[$id.$size.$color.str_replace(str_split(' ,'),'',$values)]['size_qty']))
        {
            if($cart->items[$id.$size.$color.str_replace(str_split(' ,'),'',$values)]['qty'] > $cart->items[$id.$size.$color.str_replace(str_split(' ,'),'',$values)]['size_qty'])
            {
                return redirect()->route('front.cart',$lang);
            }           
        }

        $cart->totalPrice = 0;
        foreach($cart->items as $data)
        $cart->totalPrice += $data['price'];
        Session::put('cart',$cart);
        
         if(Auth::check()) {
             
             $usrid = Auth::guard('web')->user()->id;
              $this->storeCart($usrid);
         
             
         }
         
         
        
         return redirect()->route('front.cart',$lang);
         
         
    }  

   public function addcart($id)
   {
        $prod = Product::where('id','=',$id)->first(['id','user_id','slug','name','name_ar','erp_id','photo','free_ship','feature','trial_period','subscription_period','subscription_type','size','size_qty','size_price','color','price','stock','type','file','link','license','license_qty','measure','scale','whole_sell_qty','whole_sell_discount','attributes']);

        // Set Attrubutes

        $keys = '';
        $values = '';
          $var = ''; 
        if(!empty($prod->license_qty))
        {
        $lcheck = 1;
            foreach($prod->license_qty as $ttl => $dtl)
            {
                if($dtl < 1)
                {
                    $lcheck = 0;
                }
                else
                {
                    $lcheck = 1;
                    break;
                }                    
            }
                if($lcheck == 0)
                {
                    return 0;            
                }
        }

        // Set Size

        $size = '';
        $size_qty = '';
         $color = ''; 
            $size_price = 0;
        if(!empty($prod->size))
        { 
        $size = trim($prod->size[0]);
        $size_qty = !empty($prod->size_qty) ? trim($prod->size_qty[0]) : null ;
        }   
        if(!empty($prod->color))
        {    
        $color = $prod->color[0];
         $size_price = $prod->size_price[0];
        $color = str_replace('#','',$color);
        }
        
        $co = Color::where('product_id',$id)->where('size_qty','>',0)->first();
    

        // Set Color

         if(!empty($co))
        { 
        $size =  $co->size ; 
        $size_qty = $co->size_qty ;
         $size_price = $co->size_price ;
          $var = $co->erp_var_id;  
        $color = str_replace('#','',$co->colors); 
         
        } 
        
        // Vendor Comission

        if($prod->user_id != 0){
        $gs = Generalsetting::findOrFail(1);
        $prc = $prod->price + $gs->fixed_commission + ($prod->price/100) * $gs->percentage_commission;
        $prod->price = round($prc,2);
        }


        // Set Attribute


            if (!empty($prod->attributes))
            {
                $attrArr = json_decode($prod->attributes, true);

                $count = count($attrArr);
                $i = 0;
                $j = 0; 
                      if (!empty($attrArr))
                      {
                          foreach ($attrArr as $attrKey => $attrVal)
                          {

                            if (is_array($attrVal) && array_key_exists("details_status",$attrVal) && $attrVal['details_status'] == 1) {
                                if($j == $count - 1){
                                    $keys .= $attrKey;
                                }else{
                                    $keys .= $attrKey.',';
                                }
                                $j++;

                                foreach($attrVal['values'] as $optionKey => $optionVal)
                                {
                                    
                                    $values .= $optionVal . ',';

                                    $prod->price += $attrVal['prices'][$optionKey];
                                    break;
                                     
                                    
                                }

                            }
                          }

                      }

                }
                $keys = rtrim($keys, ',');
                $values = rtrim($values, ',');




          $prod->price += $size_price;
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $cart->add($prod, $prod->id,$size,$size_qty,$color,$var,$keys,$values);
        if($cart->items[$id.$size.$color.str_replace(str_split(' ,'),'',$values)]['dp'] == 1)
        {
            return 'digital';
        }
        if($cart->items[$id.$size.$color.str_replace(str_split(' ,'),'',$values)]['stock'] < 0)
        {
            return 0;
        }
        if(!empty($cart->items[$id.$size.$color.str_replace(str_split(' ,'),'',$values)]['size_qty']))
        {
            if($cart->items[$id.$size.$color.str_replace(str_split(' ,'),'',$values)]['qty'] > $cart->items[$id.$size.$color.str_replace(str_split(' ,'),'',$values)]['size_qty'])
            {
                return 0;
            }           
        }
        $cart->totalPrice = 0;
        foreach($cart->items as $data)
        $cart->totalPrice += $data['price'];
        Session::put('cart',$cart);
        
        
        
         if(Auth::check()) {
             
              
                 $usrid = Auth::guard('web')->user()->id;
                 $this->storeCart($usrid);
         
             
         }
        
             $data[0] = count($cart->items); 

           return response()->json($data);  
             
             
             
       
    }

    public function addnumcart($lang)
    {
        
        $id2 = DB::table('languages')->where('sign','=',$lang)->first();
    	  if($id2){
    	    Session::put('language', $id2->id);
    	   }else{
    	         $data = DB::table('languages')->where('is_default','=',1)->first();
    	         Session::put('language', $data->id);
    	    }
    	    
    	    
        $id = $_GET['id'];
        $qty = $_GET['qty'];
        $size = trim($_GET['size']);
        $color = $_GET['color'];
        $size_qty = $_GET['size_qty'];
        $size_price = (double)$_GET['size_price'];
        $size_key = $_GET['size_key'];
        $keys =  $_GET['keys'];
        $values = $_GET['values'];
        $prices = $_GET['prices'];
        $keys = $keys == "" ? '' :implode(',',$keys);
        $values = $values == "" ? '' : implode(',',$values );
          $var = ''; 
        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        }
        else {
            $curr = Currency::where('is_default','=',1)->first();
        }


        $size_price = ($size_price / $curr->value);
        $prod = Product::where('id','=',$id)->first(['id','user_id','slug','name','name_ar','photo','size','erp_id','free_ship','feature','trial_period','subscription_period','subscription_type','size_qty','size_price','color','price','stock','type','file','link','license','license_qty','measure','whole_sell_qty','whole_sell_discount','attributes']);

        $colors = Color::where('product_id',$id)->where('size','=',$size)->where('size_qty','>',0)->first();
        $first = Color::where('product_id',$id)->where('size_qty','>',0)->first();
     
        $for_var = Color::where('product_id',$id)->where('colors',$color)->where('size','=',$size)->first();
        $var = !empty($for_var) ? $for_var->erp_var_id : '';

        if($prod->user_id != 0){
        $gs = Generalsetting::findOrFail(1);
        $prc = $prod->price + $gs->fixed_commission + ($prod->price/100) * $gs->percentage_commission ;
        $prod->price = round($prc,2);
        }
        if(!empty($prices))
        {
         foreach($prices as $data){
            $prod->price += ($data / $curr->value);
        }
            
        }


        if(!empty($prod->license_qty))
        {
        $lcheck = 1;
            foreach($prod->license_qty as $ttl => $dtl)
            {
                if($dtl < 1)
                {
                    $lcheck = 0;
                }
                else
                {
                    $lcheck = 1;
                    break;
                }                    
            }
                if($lcheck == 0)
                {
                    return 0;            
                }
        }
        if(empty($size))
        {
            if(!empty($prod->size))
            { 
            $size = trim($prod->size[0]);
             $size_qty = !empty($prod->size_qty) ? trim($prod->size_qty[0]) : null ;
            }    
         if(!empty($first)){
          $colors = Color::where('product_id',$id)->where('size_qty','>',0)->first();   
            $size =  $colors->size;
            $var = $colors->erp_var_id;  
         }
          
            
            
        }
      
        if(empty($color))
        {
            if(!empty($prod->color))
            { 
            $color = $prod->color[0];
                    
            }elseif(!empty($colors)){
               $color = $colors->colors ;
               $size_qty = $colors->size_qty ;
                 $var = $colors->erp_var_id;  
            }            
        }
        
        if(empty($size_price)){
           if(!empty($colors)){
               $size_price = $colors->size_price ;
             
            } 
        }
          $prod->price += $size_price;
        $color = str_replace('#','',$color);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        
      
        
        $cart->addnum($prod, $prod->id, $qty, $size,$color,$var,$size_qty,$size_price,$size_key,$keys,$values);
        if($cart->items[$id.$size.$color.str_replace(str_split(' ,'),'',$values)]['dp'] == 1)
        {
            return 'digital';
        }
        if($cart->items[$id.$size.$color.str_replace(str_split(' ,'),'',$values)]['stock'] < 0)
        {
            return 0;
        }
        if(!empty($cart->items[$id.$size.$color.str_replace(str_split(' ,'),'',$values)]['size_qty']))
        {
            if($cart->items[$id.$size.$color.str_replace(str_split(' ,'),'',$values)]['qty'] > $cart->items[$id.$size.$color.str_replace(str_split(' ,'),'',$values)]['size_qty'])
            {
                return 0;
            }           
        }

           
         $cart->totalPrice = 0;
        foreach($cart->items as $data)
        $cart->totalPrice += $data['price'];        
        Session::put('cart',$cart);
        $data[0] = count($cart->items);   
        return response()->json($data);            
    }  

    public function addbyone($lang)
    {
        
        $id = DB::table('languages')->where('sign','=',$lang)->first();
    	  if($id){
    	    Session::put('language', $id->id);
    	   }else{
    	         $data = DB::table('languages')->where('is_default','=',1)->first();
    	         Session::put('language', $data->id);
    	    }
    	    
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
           if (Session::has('free_shipping')) {
            Session::forget('free_shipping');
        }
        $gs = Generalsetting::findOrFail(1);
        if (Session::has('currency')) 
        {
            $curr = Currency::find(Session::get('currency'));
        }
        else
        {
            $curr = Currency::where('is_default','=',1)->first();
        }
        $id = $_GET['id'];
        $itemid = $_GET['itemid'];
        $size_qty = $_GET['size_qty'];
        $size_price = $_GET['size_price'];
        $prod = Product::where('id','=',$id)->first(['id','user_id','slug','name','name_ar','photo','size','erp_id','size_qty','free_ship','size_price','color','price','stock','type','file','link','license','license_qty','measure','whole_sell_qty','whole_sell_discount','attributes']);

        if($prod->user_id != 0){
        $gs = Generalsetting::findOrFail(1);
        
   
    
    
        $prc = $prod->price + $gs->fixed_commission + ($prod->price/100) * $gs->percentage_commission ;
        $prod->price = round($prc,2);
        }

            if (!empty($prod->attributes))
            {
                $attrArr = json_decode($prod->attributes, true);
                $count = count($attrArr);
                $j = 0; 
                      if (!empty($attrArr))
                      {
                          foreach ($attrArr as $attrKey => $attrVal)
                          {

                            if (is_array($attrVal) && array_key_exists("details_status",$attrVal) && $attrVal['details_status'] == 1) {

                                foreach($attrVal['values'] as $optionKey => $optionVal)
                                {
                                    $prod->price += $attrVal['prices'][$optionKey];
                                    break;
                                }

                            }
                          }

                      }

                }



        if(!empty($prod->license_qty))
        {
        $lcheck = 1;
            foreach($prod->license_qty as $ttl => $dtl)
            {
                if($dtl < 1)
                {
                    $lcheck = 0;
                }
                else
                {
                    $lcheck = 1;
                    break;
                }                    
            }
                if($lcheck == 0)
                {
                    return 0;            
                }
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        
       
      $cart->adding($prod, $itemid,$size_qty,$size_price);
        
      //     dd($cart);
        if($cart->items[$itemid]['stock'] < 0)
        {
            return 0;
        }
        if(!empty($size_qty))
        {
            if($cart->items[$itemid]['qty'] > $cart->items[$itemid]['size_qty'])
            {
                return 0;
            }            
        }
        $cart->totalPrice = 0;
        foreach($cart->items as $data)
        $cart->totalPrice += $data['price'];        
        Session::put('cart',$cart);
        $data[0] = $cart->totalPrice;

        $data[3] = $data[0];
        $tx = $gs->tax;
        if($tx != 0)
        {
            $tax = ($data[0] / 100) * $tx;
            $data[3] = $data[0] + $tax;
        }  


      //  dd($cart->items[$itemid]['qty']);
        $data[1] = $cart->items[$itemid]['qty']; 
        $data[2] = $cart->items[$itemid]['price'];
        $data[0] = round($data[0] * $curr->value,2);
        $data[2] = round($data[2] * $curr->value,2);
        $data[3] = round($data[3] * $curr->value,2);
        if($gs->currency_format == 0){
            $data[0] = $curr->sign.$data[0];
            $data[2] = $curr->sign.$data[2];
            $data[3] = $curr->sign.$data[3];
        }
        else{
            $data[0] = $data[0].$curr->sign;
            $data[2] = $data[2].$curr->sign;
            $data[3] = $data[3].$curr->sign;
        }     
        return response()->json($data);          
    }  

    public function reducebyone($lang)
    {
        
         $id = DB::table('languages')->where('sign','=',$lang)->first();
    	  if($id){
    	    Session::put('language', $id->id);
    	   }else{
    	         $data = DB::table('languages')->where('is_default','=',1)->first();
    	         Session::put('language', $data->id);
    	    }
    	    
    	    
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        
         if (Session::has('free_shipping')) {
            Session::forget('free_shipping');
        }
        
        
        $gs = Generalsetting::findOrFail(1);
        if (Session::has('currency')) 
        {
            $curr = Currency::find(Session::get('currency'));
        }
        else
        {
            $curr = Currency::where('is_default','=',1)->first();
        }
        $id = $_GET['id'];
        $itemid = $_GET['itemid'];
        $size_qty = $_GET['size_qty'];
        $size_price = $_GET['size_price'];
        $prod = Product::where('id','=',$id)->first(['id','user_id','slug','name','name_ar','photo','size','erp_id','size_qty','free_ship','size_price','color','price','stock','type','file','link','license','license_qty','measure','whole_sell_qty','whole_sell_discount','attributes']);
        if($prod->user_id != 0){
        $gs = Generalsetting::findOrFail(1);
        $prc = $prod->price + $gs->fixed_commission + ($prod->price/100) * $gs->percentage_commission ;
        $prod->price = round($prc,2);
        }

        
            if (!empty($prod->attributes))
            {
                $attrArr = json_decode($prod->attributes, true);
                $count = count($attrArr);
                $j = 0; 
                      if (!empty($attrArr))
                      {
                          foreach ($attrArr as $attrKey => $attrVal)
                          {

                            if (is_array($attrVal) && array_key_exists("details_status",$attrVal) && $attrVal['details_status'] == 1) {

                                foreach($attrVal['values'] as $optionKey => $optionVal)
                                {
                                    $prod->price += $attrVal['prices'][$optionKey];
                                    break;
                                }

                            }
                          }

                      }

                }

        
        if(!empty($prod->license_qty))
        {
        $lcheck = 1;
            foreach($prod->license_qty as $ttl => $dtl)
            {
                if($dtl < 1)
                {
                    $lcheck = 0;
                }
                else
                {
                    $lcheck = 1;
                    break;
                }                    
            }
                if($lcheck == 0)
                {
                    return 0;            
                }
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reducing($prod, $itemid,$size_qty,$size_price);
        $cart->totalPrice = 0;
        foreach($cart->items as $data)
        $cart->totalPrice += $data['price'];    
        
        Session::put('cart',$cart);
        $data[0] = $cart->totalPrice;

        $data[3] = $data[0];
        $tx = $gs->tax;
        if($tx != 0)
        {
            $tax = ($data[0] / 100) * $tx;
            $data[3] = $data[0] + $tax;
        }  

        $data[1] = $cart->items[$itemid]['qty']; 
        $data[2] = $cart->items[$itemid]['price'];
        $data[0] = round($data[0] * $curr->value,2);
        $data[2] = round($data[2] * $curr->value,2);
        $data[3] = round($data[3] * $curr->value,2);
        if($gs->currency_format == 0){
            $data[0] = $curr->sign.$data[0];
            $data[2] = $curr->sign.$data[2];
            $data[3] = $curr->sign.$data[3];
        }
        else{
            $data[0] = $data[0].$curr->sign;
            $data[2] = $data[2].$curr->sign;
            $data[3] = $data[3].$curr->sign;
        }       
        return response()->json($data);        
    }  

    public function upcolor()
    {
         $id = $_GET['id'];
         $color = $_GET['color'];
        $prod = Product::where('id','=',$id)->first(['id','user_id','slug','name','name_ar','photo','size','erp_id','size_qty','size_price','free_ship','color','price','stock','type','file','link','license','license_qty','measure','whole_sell_qty','whole_sell_discount','attributes']);
         $oldCart = Session::has('cart') ? Session::get('cart') : null;
         $cart = new Cart($oldCart);
         $cart->updateColor($prod,$id,$color);  
         Session::put('cart',$cart);
    } 


    public function removecart($id)
    {
        $gs = Generalsetting::findOrFail(1);
        if (Session::has('currency')) 
        {
            $curr = Currency::find(Session::get('currency'));
        }
        else
        {
            $curr = Currency::where('is_default','=',1)->first();
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        
        $cart = new Cart($oldCart);
        
        
        $cart->removeItem($id);
        
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
                $data[0] = $cart->totalPrice;
                $data[3] = $data[0];
                    $tx = $gs->tax;
                    if($tx != 0)
                    {
                        $tax = ($data[0] / 100) * $tx;
                        $data[3] = $data[0] + $tax;
                    } 

                if($gs->currency_format == 0){
                    $data[0] = $curr->sign.round($data[0] * $curr->value,2);
                    $data[3] = $curr->sign.round($data[3] * $curr->value,2);
            
                }
                else{
                    $data[0] = round($data[0] * $curr->value,2).$curr->sign;
                    $data[3] = round($data[3] * $curr->value,2).$curr->sign;
                }
            
            $data[1] = count($cart->items); 
            
             if(Auth::check()) {
             
              
                 $dtid = 0;
                  foreach($oldCart->items as $key=> $itm) {
        
                          if($key == $id) {
                              $dtid =  $itm['item']['id'];
                          }
                          
                         
                          
                }
                 $usrid = Auth::guard('web')->user()->id;
                 $this->updateCutomerCart($usrid,$dtid);
         
             
         }
            
            
            return response()->json($data);  
        } else {
            Session::forget('cart');
            Session::forget('already');
            Session::forget('coupon');
             Session::forget('free_shipping');
            Session::forget('coupon_total');
            Session::forget('coupon_total1');
            Session::forget('coupon_percentage');
            
             if(Auth::check()) {
             
              
                 $dtid = 0;
                  foreach($oldCart->items as $key=> $itm) {
        
                          if($key == $id) {
                              $dtid =  $itm['item']['id'];
                          }
                          
                         
                          
                }
                 $usrid = Auth::guard('web')->user()->id;
                 $this->updateCutomerCart($usrid,$dtid);
         
             
         }

            $data = 0;
            return response()->json($data); 
        }          
    } 
/* not used*/
    public function coupon()
    {
        $gs = Generalsetting::findOrFail(1);
        $code = $_GET['code'];
        $total = (float)preg_replace('/[^0-9\.]/ui','',$_GET['total']);;
        $fnd = Coupon::where('code','=',$code)->get()->count();
        if($fnd < 1)
        {
        return response()->json(0);              
        }
        else{
        $coupon = Coupon::where('code','=',$code)->first();
            if (Session::has('currency')) 
            {
              $curr = Currency::find(Session::get('currency'));
            }
            else
            {
                $curr = Currency::where('is_default','=',1)->first();
            }
        if($coupon->times != null)
        {
            if($coupon->times == "0")
            {
                return response()->json(0);                
            }
        }
        
       /*$order = Session::has('cart') ? App\Models\Product::convertPrice($totalPrice) : '0.00' ;
        $limit = $coupon->limited;*/
        $today = date('Y-m-d');
        $from = date('Y-m-d',strtotime($coupon->start_date));
        $to = date('Y-m-d',strtotime($coupon->end_date));
        if($from <= $today && $to >= $today  )
        {
            if($coupon->status == 1  )
            {
                $oldCart = Session::has('cart') ? Session::get('cart') : null;
                $val = Session::has('already') ? Session::get('already') : null;
                if($val == $code)
                {
                    return response()->json(2); 
                }
                $cart = new Cart($oldCart);
                if($coupon->type == 0)
                {
                    Session::put('already', $code);
                    $coupon->price = (int)$coupon->price;
                    $val = $total / 100;
                    $sub = $val * $coupon->price;
                    $total = $total - $sub;
                    $data[0] = round($total,2);
                    if($gs->currency_format == 0){
                        $data[0] = $curr->sign.$data[0];
                    }
                    else{
                        $data[0] = $data[0].$curr->sign;
                    }
                    $data[1] = $code;      
                    $data[2] = round($sub, 2);
                    Session::put('coupon', $data[2]);
                    Session::put('coupon_code', $code);
                    Session::put('coupon_id', $coupon->id);
                    Session::put('coupon_total', $data[0]);
                    $data[3] = $coupon->id;
                    $data[4] = $coupon->price."%";
                    $data[5] = 1;

                    Session::put('coupon_percentage', $data[4]);

                    return response()->json($data);   
                }
                else{
                    Session::put('already', $code);
                    $total = $total - round($coupon->price * $curr->value, 2);
                    $data[0] = round($total,2);
                    $data[1] = $code;
                    $data[2] = round($coupon->price * $curr->value, 2);
                    Session::put('coupon', $data[2]);
                    Session::put('coupon_code', $code);
                    Session::put('coupon_id', $coupon->id);
                    Session::put('coupon_total', $data[0]);
                    $data[3] = $coupon->id;
                if($gs->currency_format == 0){
                    $data[4] = $curr->sign.$data[2];
                    $data[0] = $curr->sign.$data[0];
                }
                else{
                    $data[4] = $data[2].$curr->sign;
                    $data[0] = $data[0].$curr->sign;
                }
                    

                    Session::put('coupon_percentage', 0);

                    $data[5] = 1;
                    return response()->json($data);              
                }
            }
            else{
                    return response()->json(0);   
            }              
        }
        else{
        return response()->json(0);             
        }
        }         
    } 
/* not used*/   
    

   public function couponcheck()
    {
        $gs = Generalsetting::findOrFail(1);
        $code = $_GET['code'];
        $total = $_GET['total'];
        $id = Auth::guard('web')->user()->id;
   /*     $fnd = Coupon::where('code','=',$code)->where('user_id',Auth::guard('web')->user()->id)->get()->count();*/
        
        
        $fnd = Coupon::where('status',1)
        ->where(function ($query) use ($code) {
               $query->where('code', '=', $code);
            
            })->where(function ($query) use ($id)  {
              $query->where('user_id', '=', $id)
                  ->orWhere('user_id', '=', null);
            })->get()->count();
        $fr = Free::where('code','=',$code)->get()->count();
        $pi = Piece::where('code','=',$code)->get()->count();
      //  $ref = Referral::where('code','=',$code)->get()->count();
        if($fnd < 1 && $fr < 1 && $pi < 1  )
        {
            
          
        return response()->json(0);              
        }
        elseif($fnd > 0 ){
        /*$coupon = Coupon::where('code','=',$code)->where('user_id',Auth::guard('web')->user()->id)->first();*/
         $coupon = Coupon::where('status',1)
             ->where(function ($query) use ($code) {
               $query->where('code', '=', $code);
            
            })->where(function ($query) use ($id)  {
              $query->where('user_id', '=', $id)
                  ->orWhere('user_id', '=', null);
            })->first();
            
            if (Session::has('currency')) 
            {
              $curr = Currency::find(Session::get('currency'));
            }
            else
            {
                $curr = Currency::where('is_default','=',1)->first();
            }
        if($coupon->times != null)
        {
            if($coupon->times == "0")
            {
                return response()->json(0);                
            }
        } 
        if(($coupon->limited * $curr->value ) > $total)
        {
           
               if($coupon->what == 'free_shipping') {
                     return response()->json(11);
               }else {
                return response()->json(0);
               }
            
        }
        
      //  dd($total);
        $today = date('Y-m-d');
          /*$order = Session::has('cart') ? App\Models\Product::convertPrice($totalPrice) : '0.00' ;
        $limit = $coupon->limited;*/
        $from = date('Y-m-d',strtotime($coupon->start_date));
        $to = date('Y-m-d',strtotime($coupon->end_date));
        if($from <= $today && $to >= $today )
        {
            if($coupon->status == 1 )
            {
                $oldCart = Session::has('cart') ? Session::get('cart') : null;
                $val = Session::has('already') ? Session::get('already') : null;
                if($val == $code)
                {
                    
                    return response()->json(2); 
                
                    
                }
                $cart = new Cart($oldCart);
              
              if($coupon->what == "free_shipping") {
                  
               //     dd($cart->totalPrice);
                  Session::put('already', $code);
                   
                Session::put('free_shipping','Free Shipping');
            
                 if($cart->totalPrice < $coupon->limited) {
                       
                                
                         return response()->json(11);
                   
                    }else {
                         return response()->json(12);
                    }
                  
                 
                  
              }  else { 
                if($coupon->type == 0)
                 {
                    
                    
                    
                    
                    Session::put('already', $code);
                    $coupon->price = (int)$coupon->price;
                      $sub = 0;
                      $d = 0;
                    $subs = 0;
                    $subss = 0;
                    $oldCart = Session::get('cart');
                    $cart = new Cart($oldCart);
                    $piece = Procoupon::where('code_id','=',$coupon->id)->get();
                      
                    $ccats =    Catcoupon::where('code_id','=',$coupon->id)->get();
                    
                    $csubcats = Subcatcoupon::where('code_id','=',$coupon->id)->get();
                     
                    $cchildcats = Childcatcoupon::where('code_id','=',$coupon->id)->get();
                      
                    $cbrands = Brandcoupon::where('code_id','=',$coupon->id)->get();
                      
                      
                    $totals = $_GET['total'];
                    
                  
                  
                
        
      if(count($ccats) > 0){
          
             $cc =0;
              foreach($cart->items as $key => $prod)
              {
                  
                     $data = Product::where('id',$prod['item']['id'])->first(); 
                    foreach($ccats as $p){
                     
                       if($data->category_id ==  $p->cat_id ){
                 

                    $val = $prod['item']['price'] / 100;
                    $subs = $val * $coupon->price;
                     $d += ($val * $coupon->price);
                    $subss += $subs;
                    $totals -= $subs;
                    
                        $cc++;
                    
                    }else{
                
                 $subss -= 0;
                 
            }
            
                  }
            
            
          }





              if($cc == 0) {
                       return response()->json(9);    
              }
                        $sub = $subss;
                       $total = $totals ;

                }
        else if(count($csubcats) > 0){
            
            $ss = 0;
              foreach($cart->items as $key => $prod)
              {
                  
                     $data = Product::where('id',$prod['item']['id'])->first(); 
                  foreach($csubcats as $p){
                  if( $data->subcategory_id ==  $p->subcat_id ){
                   

                    $val = $prod['item']['price'] / 100;
                    $subs = $val * $coupon->price;
                    $d += ($val * $coupon->price);
                    $subss += $subs;
                    $totals -= $subs;
                    
                 
                       $ss++;
                    
                    }else{
                
                 $subss -= 0;
                 
            }
            
                  }
            
            
          }

                      if($ss == 0) {
                       return response()->json(9);    
              }
                        $sub = $subss;
                       $total = $totals ;

                }
         else if(count($cchildcats) > 0){
             
               $ch = 0;
               
              foreach($cart->items as $key => $prod)
              {
                  
                  
                  foreach($cchildcats as $p){
                  
                     if( $data->childcategory_id ==  $p->childcat_id ){
                   

                    $val = $prod['item']['price'] / 100;
                    $subs = $val * $coupon->price;
                    $d += ($val * $coupon->price);
                    $subss += $subs;
                    $totals -= $subs;
                    
                     $ch++;
                    
                    }else{
                
                 $subss -= 0;
                 
            }
            
                  }
            
            
          }



                     if($ch == 0) {
                       return response()->json(9);    
                     }
                 
                        $sub = $subss;
                       $total = $totals ;

                }
        else if(count($cbrands) > 0){
            
               $bb = 0;
              foreach($cart->items as $key => $prod)
              {
                  
                     $data = Product::where('id',$prod['item']['id'])->first(); 
                  foreach($cbrands as $p){
                  if($data->brand_id ==  $p->brand_id ){
                   

                    $val = $prod['item']['price'] / 100;
                    $subs = $val * $coupon->price;
                    $subss += $subs;
                    $d += ($val * $coupon->price);
                    $totals -= $subs;
                    
                      $bb++;
                    
                    }else{
                
                 $subss -= 0;
                 
            }
            
                  }
            
            
          }

                        if($bb == 0) {
                       return response()->json(9);    
                     }
                      
                        $sub = $subss;
                       $total = $totals ;

                }
        else if(count($piece) > 0){
              
                 $pp=0;
              
              foreach($cart->items as $key => $prod)
              {
                  foreach($piece as $p){
                  if($prod['item']['id'] ==  $p->product_id ){
                   

                    $val = $prod['item']['price'] / 100;
                    $subs = $val * $coupon->price;
                    $subss += $subs;
                    $d += ($val * $coupon->price);
                    $totals -= $subs;
                    
                    $pp++;
                    
                    }else{
                
                 $subss -= 0;
                 
            }
            
                  }
            
            
          }
                     if($pp == 0) {
                       return response()->json(9);    
                    }
                        $sub = $subss;
                       $total = $totals ;

                }else{
                    
                    $total = $total - $_GET['shipping_cost'];
                    $val = $total / 100;
                    $sub = $val * $coupon->price;
                    $total = $total - $sub;
                    $total = $total + $_GET['shipping_cost'];
                    
                }
                    

                       
                    $data[0] = round($total,2);
                    $data[1] = $code;      
                  //  $data[2] = round($d, 2);
                    $data[2] = round($d, 2);
                  
                    if($gs->currency_format == 0){
                        $data[0] = $curr->sign.$data[0];
                    }
                    else{
                        $data[0] = $data[0].$curr->sign;
                    }
                    Session::put('coupon', $data[2]);
                    Session::put('coupon_code', $code);
                    Session::put('coupon_id', $coupon->id);
                    Session::put('coupon_total1', $data[0]);
                  
                    Session::forget('coupon_total');
                    $data[0] = round($total,2);
                    $data[1] = $code;      
                    $data[2] = round($d, 2);
                    $data[3] = $coupon->id;
                    $data[4] = $coupon->price."%";
                    $data[5] = 1;

                    Session::put('coupon_percentage', $data[4]);


                    return response()->json($data);  
                    
                  
                }
                
                
                // if coupon type not %
                else{
                    
                    
                    
                    
                    
                    
                    Session::put('already', $code);
                    $dis = 0;
                    
                    $d =0 ;
                   $piece = Procoupon::where('code_id','=',$coupon->id)->get();
                   
                     $ccats = Catcoupon::where('code_id','=',$coupon->id)->get();
         
                      $csubcats = Subcatcoupon::where('code_id','=',$coupon->id)->get();
                     
                    $cchildcats = Childcatcoupon::where('code_id','=',$coupon->id)->get();
                      
                    $cbrands = Brandcoupon::where('code_id','=',$coupon->id)->get();
         
           
         
                   
               if(count($ccats) > 0){
                   
                   
                   $cc = 0;
              foreach($cart->items as $key => $prod)
              {
                  foreach($ccats as $p){
                      
               
                   $data = Product::where('id',$prod['item']['id'])->first(); 
                      
                  if($data->category_id ==  $p->cat_id ){
                    
                       $cc++;

                    $total = $total - round($coupon->price * $curr->value, 2);
                    $dis = round($coupon->price * $curr->value, 2);
                    $d += (round($coupon->price * $curr->value, 2));
                         break;
                 
                      
                      
                  }
            
                  }
            
            
          }
          
              if($cc == 0) {
                  
                     return response()->json(9);
              }
              
              

                }   
                
                
                  else if(count($csubcats) > 0){
                      
                      $ss =0;
              foreach($cart->items as $key => $prod)
              {
                  foreach($csubcats as $p){
                      
               
                   $data = Product::where('id',$prod['item']['id'])->first(); 
                      
                  if($data->subcategory_id ==  $p->subcat_id ){
                   

                    $total = $total - round($coupon->price * $curr->value, 2);
                    $dis = round($coupon->price * $curr->value, 2);
                     $d += (round($coupon->price * $curr->value, 2));
                      $ss++;
                 break;
                 }
            
                  }
            
            
          }

                              if($ss == 0) {
                                 return response()->json(9);
                          }
                }  
                
                    else if(count($cchildcats) > 0){
                        
                        $ch =0 ;
              foreach($cart->items as $key => $prod)
              {
                  foreach($cchildcats as $p){
                      
               
                   $data = Product::where('id',$prod['item']['id'])->first(); 
                      
                  if($data->childcategory_id ==  $p->childcat_id ){
                   

                    $total = $total - round($coupon->price * $curr->value, 2);
                    $dis = round($coupon->price * $curr->value, 2);
                      $d += (round($coupon->price * $curr->value, 2));
                    $ch++;
                 break;
                 }
            
                  }
            
            
          }


                    if($ch == 0) {
                     return response()->json(9);
              }
              
                }  
                
                  else if(count($cbrands) > 0){
                      
                      $bb =0;
              foreach($cart->items as $key => $prod)
              {
                  foreach($cbrands as $p){
                      
               
                   $data = Product::where('id',$prod['item']['id'])->first(); 
                      
                  if($data->brand_id ==  $p->brand_id ){
                   

                    $total = $total - round($coupon->price * $curr->value, 2);
                    $dis = round($coupon->price * $curr->value, 2);
                      $d += (round($coupon->price * $curr->value, 2));
                    $bb++;
                 break;
                 }
            
                  }
            
            
          }
          
                   if($bb == 0) {
                     return response()->json(9);
              }

                }  
         
         else if(count($piece) > 0){
             
                $pp=0;
              foreach($cart->items as $key => $prod)
              {
                  
                
                  foreach($piece as $p){
                  if($prod['item']['id'] ==  $p->product_id ){
                   

                    $total = $total - round($coupon->price * $curr->value, 2);
                    $dis = round($coupon->price * $curr->value, 2);
                      $d += (round($coupon->price * $curr->value, 2));
                      $pp++;
                 break;
                 }
            
                  }
               
                   if($pp == 0) {
                     return response()->json(9);
              }
            
          }

                }else{
                
                 $total = $total - round($coupon->price * $curr->value, 2);   
                  $dis = round($coupon->price * $curr->value, 2);
                }
                      
                    
                    $data[0] = round($total,2);
                    $data[1] = $code;
                //    $data[2] = $dis;
                  $data[2] = $d;
                    $data[3] = $coupon->id;
                if($gs->currency_format == 0){
                    $data[4] = 0;
                    $data[0] = $curr->sign.' '.$data[0];
                }
                else{
                    $data[4] = 0;
                    $data[0] = $data[0].' '.$curr->sign;
                }
                    Session::put('coupon', $data[2]);
                    Session::put('coupon_code', $code);
                    Session::put('coupon_id', $coupon->id);
                    Session::put('coupon_total1', $data[0]);
                    Session::forget('coupon_total');
                    $data[0] = round($total,2);
                    $data[1] = $code;
                  //  $data[2] = $dis;
                  
                      $data[2] = $d;
                    $data[3] = $coupon->id;                  
                    $data[5] = 1;

                    Session::put('coupon_percentage', $data[4]);

                    return response()->json($data);              
             
                
                
             
             
             
             
                }  // end second else 
                
            }
                
                
                
            }
            else{
                    return response()->json(0);   
            }              
        }
        else{
        return response()->json(0);             
        }
        
        
        
        
        
        
       
       
       
        //i add this   
        
        
        
        
        }elseif( $fr > 0){
            
           /* return response()->json(2); */
            $coupon = Free::where('code','=',$code)->first();
            $free = Profree::where('code_id','=',$coupon->id)->first();
        
            if (Session::has('currency')) 
            {
              $curr = Currency::find(Session::get('currency'));
            }
            else
            {
                $curr = Currency::where('is_default','=',1)->first();
            }
            
            
             if($coupon->times != null)
                {
            if($coupon->times == "0")
                    {
                return response()->json(0);                
                    }
              } 
              
                
        if(($coupon->user_id != Auth::guard('web')->user()->id ) && $coupon->user_id != "")
        {
           
                return response()->json(0);                
           
        } 
        

        
      //  dd($total);
        $today = date('Y-m-d');
          /*$order = Session::has('cart') ? App\Models\Product::convertPrice($totalPrice) : '0.00' ;
        $limit = $coupon->limited;*/
        $from = date('Y-m-d',strtotime($coupon->start_date));
        $to = date('Y-m-d',strtotime($coupon->end_date));
        if($from <= $today && $to >= $today )
        {
            if($coupon->status == 1 )
            {
                $oldCart = Session::has('cart') ? Session::get('cart') : null;
                $val = Session::has('already') ? Session::get('already') : null;
                if($val == $code)
                {
                    return response()->json(2); 
                }
                
                
                
                $cart = new Cart($oldCart);
               
                   
                   
                     Session::put('already', $code);
                    
                    $data[0] = round($total,2);
                    $data[1] = $code;
                    $data[2] = 0;
                    $data[3] = $coupon->id;
                    $data[6] = $free->product_id;
                    $data[7] = 3;
                if($gs->currency_format == 0){
                    $data[4] = 0;
                    $data[0] = $curr->sign.$data[0];
                }
                else{
                    $data[4] = 0;
                    $data[0] = $data[0].$curr->sign;
                }
                    Session::put('coupon', $data[2]);
                    Session::put('coupon_code', $code);
                    Session::put('coupon_id', $coupon->id);
                   // Session::put('coupon_total1', $data[0]);
                    Session::put('coupon_pro', $data[6]);
                    Session::put('coupon_free', $code);
                    Session::put('coupon_free_color', $free->color);
                    Session::put('coupon_free_size', $free->size);
                    
                    $data[0] = round($total,2);
                    $data[1] = $code;
                    $data[2] = 0 ;
                    $data[3] = $coupon->id;                  
                    $data[5] = 1;
                    $data[6] = $free->product_id;
                    $data[7] = 3;

                    Session::put('coupon_product', "Free Product");
                    

                    return response()->json($data); 
                
                
            }
            else{
                    return response()->json(0);   
            }              
        }
        else{
            
          
        return response()->json(0);             
        }
            
        
            
        }elseif( $pi > 0){
            
           /* return response()->json(2); */
            $coupon = Piece::where('code','=',$code)->first();
            $piece = Propiece::where('code_id','=',$coupon->id)->first();
        
            if (Session::has('currency')) 
            {
              $curr = Currency::find(Session::get('currency'));
            }
            else
            {
                $curr = Currency::where('is_default','=',1)->first();
            }
            
            
         if($coupon->times != null)
                {
            if($coupon->times == "0")
                    {
                return response()->json(0);                
                    }
              } 
              
                
        if(($coupon->user_id != Auth::guard('web')->user()->id ) && $coupon->user_id != "")
        {
           
                return response()->json(0);                
           
        } 
        

        
      //  dd($total);
        $today = date('Y-m-d');
          /*$order = Session::has('cart') ? App\Models\Product::convertPrice($totalPrice) : '0.00' ;
        $limit = $coupon->limited;*/
        $from = date('Y-m-d',strtotime($coupon->start_date));
        $to = date('Y-m-d',strtotime($coupon->end_date));
        if($from <= $today && $to >= $today )
        {
            if($coupon->status == 1 )
            {
                $oldCart = Session::has('cart') ? Session::get('cart') : null;
                $val = Session::has('already') ? Session::get('already') : null;
                if($val == $code)
                {
                    return response()->json(2); 
                }
                $cart = new Cart($oldCart);
                 foreach($cart->items as $key => $prod)
        {
                if($prod['item']['id'] ==  $piece->product_id && $prod['qty'] >= $coupon->buy ){
                   $itemid = $prod['item']['id'].$prod['size'].$prod['color'] ;
                
               $cart->items[$itemid]['qty'] += $coupon->take ; 
               $cart->totalQty += $coupon->take ; 
            
               Session::put('cart',$cart);
                break;
            }
        }
               
               
               
                     Session::put('already', $code);
                    
                    $data[0] = round($total,2);
                    $data[1] = $code;
                    $data[2] = 0;
                    $data[3] = $coupon->id;
                    $data[6] = $piece->product_id;
                    $data[7] = 3;
                if($gs->currency_format == 0){
                    $data[4] = 0;
                    $data[0] = $curr->sign.$data[0];
                }
                else{
                    $data[4] = 0;
                    $data[0] = $data[0].$curr->sign;
                }
                    Session::put('coupon', $data[2]);
                    Session::put('coupon_code', $code);
                    Session::put('coupon_id', $coupon->id);
                   // Session::put('coupon_total1', $data[0]);
                    Session::put('coupon_pro', $data[6]);
                    Session::put('coupon_piece', $code);
                    Session::put('coupon_piece_color', $piece->color);
                    Session::put('coupon_piece_size', $piece->size);
                    Session::put('coupon_get', $coupon->buy);
                    Session::put('coupon_take', $coupon->take);
                    
                    $data[0] = round($total,2);
                    $data[1] = $code;
                    $data[2] = 0 ;
                    $data[3] = $coupon->id;                  
                    $data[5] = 1;
                    $data[6] = $piece->product_id;
                    $data[7] = 3;

                    Session::put('coupon_product', "Take Product Free");
                    

                    return response()->json($data); 
                
                
            }
            else{
                    return response()->json(0);   
            }              
        }
        else{
        return response()->json(0);             
        }
            
        }          
    
        
        
        
    } 


    // Capcha Code Image
    private function  code_image()
    {
        $actual_path = str_replace('project','',base_path());
        $image = imagecreatetruecolor(200, 50);
        $background_color = imagecolorallocate($image, 255, 255, 255);
        imagefilledrectangle($image,0,0,200,50,$background_color);

        $pixel = imagecolorallocate($image, 0,0,255);
        for($i=0;$i<500;$i++)
        {
            imagesetpixel($image,rand()%200,rand()%50,$pixel);
        }

        $font = $actual_path.'assets/front/fonts/NotoSans-Bold.ttf';
        $allowed_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $length = strlen($allowed_letters);
        $letter = $allowed_letters[rand(0, $length-1)];
        $word='';
        //$text_color = imagecolorallocate($image, 8, 186, 239);
        $text_color = imagecolorallocate($image, 0, 0, 0);
        $cap_length=6;// No. of character in image
        for ($i = 0; $i< $cap_length;$i++)
        {
            $letter = $allowed_letters[rand(0, $length-1)];
            imagettftext($image, 25, 1, 35+($i*25), 35, $text_color, $font, $letter);
            $word.=$letter;
        }
        $pixels = imagecolorallocate($image, 8, 186, 239);
        for($i=0;$i<500;$i++)
        {
            imagesetpixel($image,rand()%200,rand()%50,$pixels);
        }
        session(['captcha_string' => $word]);
        imagepng($image, $actual_path."assets/images/capcha_code.png");
    }
  public function  end()
    {
        Session::forget('cart');
        
    }
    
    
    
    
    public function storeCart($usrid) {
        
        
         $Cartdta = Session::has('cart') ? Session::get('cart') : null;
       //  dd($Cartdta);
       
       
       
       $info = UserCart::where('user_id',$usrid)->first();
       
       if(!empty($info)) {
           $info->delete();
       }
       
       
       $data = [
          'cart'              =>  utf8_encode(bzcompress(serialize($Cartdta), 9)),
          'user_id'           =>  $usrid
           
         ];
         
         
        if($Cartdta != null) { 
         
         
              UserCart::create($data);
        
            
        }
        
        
    }
    
    
    public function updateCutomerCart($usrid , $dtid) 
    {
    
       $Cartdta = Session::has('cart') ? Session::get('cart') : null;
       $info = UserCart::where('user_id',$usrid)->first();
       
       if(!empty($info)) {
           $info->delete();
       }
       
       
       $data = ['cart' => utf8_encode(bzcompress(serialize($Cartdta), 9)),'user_id' => $usrid];
        
        if($Cartdta != null) { 
          UserCart::create($data);
        }
       
        $cinfo = UserDelete::where('user_id',$usrid)->first();   
        if(empty($cinfo->deleted_items)) {
                   
          $arr = array($dtid);
          $serializedArr = serialize($arr);
                     
                     
          $data = ['deleted_items' => $serializedArr,'user_id' => $usrid];
                   
            UserDelete::create($data);
                     
        } else {
                   
               $arr2 = unserialize($cinfo->deleted_items);
               $c = count($arr2);
                      
                   $arr2[$c] = $dtid;
                   
                   $cinfo->deleted_items  = serialize($arr2);
                   $cinfo->update();
        }
               
       $cinfo->update();
        
    }
    
   /* public function updateCutomerCart($usrid , $dtid) {
        
           
               $Cartdta = Session::has('cart') ? Session::get('cart') : null;
               //  dd($Cartdta);
       
       
       
              $cartinfo =  UserCart::where('user_id',$usrid)->first();   
              $cinfo = UserDelete::where('user_id',$usrid)->first();   
               if(empty($cinfo->deleted_items)) {
                   
                     $arr = array($dtid);
                     $serializedArr = serialize($arr);
                     
                  //   $cinfo->deleted_items  = $serializedArr;
                     
                     $data = [
                       
                        'deleted_items' =>     $serializedArr,  
                        
                        'user_id'      => $usrid
                         
                   ];
                   
                   
                       UserDelete::create($data);
                     
               }else {
                   
                       $arr2  = unserialize($cinfo->deleted_items);
                       
                       $c     =  count($arr2);
                      
                       $arr2[$c]  =  $dtid;
                       
                     
                       $cinfo->deleted_items  = serialize($arr2);
                       $cinfo->update();
                      
               }
        
        
             $cartinfo->cart  = utf8_encode(bzcompress(serialize($Cartdta), 9));
        
               
              $cartinfo->update();
            
        
    }
    
    */
    
    
    
    
    
    
    
    

}
