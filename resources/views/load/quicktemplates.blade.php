@php
$slang = Session::get('language');
$lang  = DB::table('languages')->where('is_default','=',1)->first();

@endphp

<div class="product-single-container product-single-default product-quick-view container">
    <div class="row">
        <div class="col-lg-6 col-md-6 product-single-gallery">
            <div class="product-slider-container product-item">
                <div class="product-single-carousel owl-carousel owl-theme">
                   <div class="product-item">
                        <img class="product-single-image" src="{{filter_var($product->photo, FILTER_VALIDATE_URL) ?$product->photo:asset('assets/images/products/'.$product->photo)}}" data-zoom-image="{{filter_var($product->photo, FILTER_VALIDATE_URL) ?$product->photo:asset('assets/images/products/'.$product->photo)}}"
                        
                          @if(!$slang)
                                                              @if($lang->id == 2)
                                                               
                                                              alt="{{$product->alt_ar}}"        
                                                              @else 
                                                               alt="{{$product->alt}}"    
                                                              @endif 
                                                              @else  
                                                              @if($slang == 2) 
                                                                  alt="{{$product->alt_ar}}"    
                                                              @else
                                                                   alt="{{$product->alt}}"    
                                                              @endif
                                                               @endif
                        />
                    </div>  
                   
                    @foreach($product->galleries as $gal)
                    <div class="product-item">
                        <img class="product-single-image" src="{{asset('assets/images/galleries/'.$gal->photo)}}" data-zoom-image="{{asset('assets/images/galleries/'.$gal->photo)}}"
                          @if(!$slang)
                                                              @if($lang->id == 2)
                                                               
                                                              alt="{{$product->alt_ar}}"        
                                                              @else 
                                                               alt="{{$product->alt}}"    
                                                              @endif 
                                                              @else  
                                                              @if($slang == 2) 
                                                                  alt="{{$product->alt_ar}}"    
                                                              @else
                                                                   alt="{{$product->alt}}"    
                                                              @endif
                                                               @endif
                        
                        />
                    </div>
                    @endforeach
                
                </div>
                </div>
      
               <div class="prod-thumbnail row owl-dots" id='carousel-custom-dots'>
                    <div class="col-3 owl-dot">
                    <img src="{{filter_var($product->photo, FILTER_VALIDATE_URL) ?$product->photo:asset('assets/images/products/'.$product->photo)}}"  style="height:100px;" 
                      @if(!$slang)
                                                              @if($lang->id == 2)
                                                               
                                                              alt="{{$product->alt_ar}}"        
                                                              @else 
                                                               alt="{{$product->alt}}"    
                                                              @endif 
                                                              @else  
                                                              @if($slang == 2) 
                                                                  alt="{{$product->alt_ar}}"    
                                                              @else
                                                                   alt="{{$product->alt}}"    
                                                              @endif
                                                               @endif
                    
                    />
                     </div>
                    @foreach($product->galleries as $gal)
                    <div class="col-3 owl-dot">
                    <img src="{{asset('assets/images/galleries/'.$gal->photo)}}"  style="height:100px;" />
                     </div>
                    @endforeach
                 </div>
                 </div>
                 
                 
              
        <div class="col-lg-6 col-md-6">
            <div class="product-single-details">
                <h1 class="product-title">
                    
                 
                    
                      @if(!$slang)
                                             @if($lang->id == 2)
                                           
                                                {{ $product->name_ar }}
                                                
                                            @else 
                                              
                                               {{ $product->name }}
            
                                             @endif 
                                             @else   
                                               @if($slang == 2) 
                                               
                                                  {{ $product->name_ar }}
            
                                               @else
                                                {{ $product->name }}

                                              @endif
                                      @endif    
                    
                </h1>
                
                <br>

                <div class="ratings-container">
                    <div class="product-ratings">
                        <span class="ratings" style="{{App\Models\Rating::ratings($product->id)}}%"></span><!-- End .ratings -->
                    </div><!-- End .product-ratings -->

                </div><!-- End .product-container -->

                <div class="price-box">
                    <span class="old-price">{{ $product->showPreviousPrice() }}</span>
                    <span class="product-price">{{ $product->showPrice() }}</span>
                </div><!-- End .price-box -->

                <div class="product-desc">
                    
                <p> @if(!$slang)
                                             @if($lang->id == 2)
                                           
                                                {!! substr($product->details_ar,0,376) !!}
                                                
                                            @else 
                                              
                                                {!! substr($product->details,0,376) !!}
            
                                             @endif 
                                             @else   
                                               @if($slang == 2) 
                                               
                                                 {!! substr($product->details_ar,0,376) !!}
            
                                               @else
                                                {!! substr($product->details,0,376) !!}

                                              @endif
                                      @endif    </p>
                 
                </div><!-- End .product-desc -->
                @if(!empty($product->color))
                <div class="product-filters-container">
                    <div class="product-single-filter">
                       
                        <ul class="config-swatch-list">
                             @php
                                 $is_first = true;
                              @endphp
                              @foreach($product->color as $key => $data1)
                              <li class="{{ $is_first ? 'active' : '' }}">
                                  
                              <span class="box"  data-color="{{ $product->color[$key] }}" style="background-color: {{ $product->color[$key] }}"></span>
                              
                              </li>
                             @php
                              $is_first = false;
                             @endphp
                             @endforeach
                      
                        </ul>
                    </div><!-- End .product-single-filter -->
                </div><!-- End .product-filters-container -->
                 @endif
                <div class="product-action">
                    
                    <div class="product-single-qty">
                        <input class="horizontal-quantity form-control" type="text">
                    </div>

                    <a href="{{ route('product.cart.quickadd',['id' => $product->id , 'lang' => $sign ]) }}" class="paction add-cart" title="{{$langg->lang56}}">
                        <span>{{$langg->lang56}}</span>
                    </a>
                    
                    @if(Auth::guard('web')->check())
                    
                    <a href="javascript:;" data-href="{{ route('user-wishlist-add',$product->id) }}" class="paction add-wishlist add-to-wish" title="{{$langg->lang54}}">
                        <span>{{$langg->lang54}}</span>
                    </a>
                     @endif
                     
                    
                    
                     
                     
                     
                </div><!-- End .product-action -->

                <div class="product-single-share">
                    <label>{{$langg->lang91}}:</label>
                    <!-- www.addthis.com share plugin-->
                    <div class="addthis_inline_share_toolbox"></div>
                </div><!-- End .product single-share -->
            </div><!-- End .product-single-details -->
        </div><!-- End .col-lg-5 -->
    </div><!-- End .row -->
</div><!-- End .product-single-container -->



<script src="{{asset('assets/front/js/quicksetup.js')}}"></script>
<script type="text/javascript">
  
             $("li.sizes").click(function(){
               $("ul.color-lists").addClass("color-list");
             @if(!empty($colors->id))  
          
            
               $("li.hide").hide();
               
               

              
               @endif
              
               $("ul.show").remove();
              var idd= $(".pro_id").val();
              var size = this.id ;
               var url = "{{ route('colorss')}}";
            //    alert("clicked:" + size );
               var token = $("input[name='_token']").val();
               
               $.ajax({
                  url: url,
                  method: 'POST',
                  data: {idd:idd , size:size , _token:token},
                  success: function(data) {
                   
                    $("ul.color-lists").html('');
                    $("ul.color-lists").html(data.option);
                    $("li.click").click();
                   
                  
                     
                  },
                  
                 
                });
               
              
             /* 
              
              
              
              */
              });  
               $(document).on('click', '.click', function(){
              
            
               $("li.hide").show();
               

              });  
              
           
        
           
           
</script>
<script type="text/javascript">

//   magnific popup activation
$('.video-play-btn').magnificPopup({
type: 'video'
});


var sizes = "";
var size_qty = "";
var size_price = "";
var size_key = "";
 
var colors = "";

var mtotal = "";
var mstock = $('.product-stock').val();
var keys = "";
var values = "";
var prices = "";

$('.mproduct-attr').on('change',function(){

var total;
total = mgetAmount()+mgetSizePrice();
total = total.toFixed(2);
var pos = $('#mcurr_pos').val();
var sign = $('#mcurr_sign').val();
if(pos == '0')
{
$('#msizeprice').html(sign+total);
}
else {
$('#msizeprice').html(total+sign);
}
});



function mgetSizePrice()
{

var total = 0;
if($('.mproduct-size .siz-list li').length > 0)
{
total = parseFloat($('.mproduct-size .siz-list li.active').find('.msize_price').val());
}
return total;
}


function mgetAmount()
{
var total = 0;
var value = parseFloat($('#mproduct_price').val());
var datas = $(".mproduct-attr:checked").map(function() {
return $(this).data('price');
}).get();

var data;
for (data in datas) {
total += parseFloat(datas[data]);
}
total += value;
return total;
}


// Product Details Product Size Active Js Code
$('.mproduct-size .siz-list .box').on('click', function () {

$('.modal-total').html('1');
var parent = $(this).parent();
size_qty = $(this).find('.msize_qty').val();
size_price = $(this).find('.msize_price').val();
size_key = $(this).find('.msize_key').val();
sizes = $(this).find('.msize').val();
      $('.mproduct-size .siz-list li').removeClass('active');
      parent.addClass('active');
total = mgetAmount()+parseFloat(size_price);
stock = size_qty;
total = total.toFixed(2);
var pos = $('#mcurr_pos').val();
var sign = $('#mcurr_sign').val();
if(pos == '0')
{
$('#msizeprice').html(sign+total);
}
else {
$('#msizeprice').html(total+sign);
}

});

// Product Details Product Color Active Js Code
$('.mproduct-color .color-list .box').on('click', function () {
colors = $(this).data('color');
var parent = $(this).parent();
$('.mproduct-color .color-list li').removeClass('active');
parent.addClass('active');

});

$('.modal-minus').on('click', function () {
var el = $(this);
var $tselector = el.parent().parent().find('.modal-total');
total = $($tselector).text();
if (total > 1) {
  total--;
}
$($tselector).text(total);
});

$('.modal-plus').on('click', function () {
var el = $(this);
var $tselector = el.parent().parent().find('.modal-total');
total = $($tselector).text();
if(mstock != "")
{
  var stk = parseInt(mstock);
  if(total < stk)
  {
      total++;
      $($tselector).text(total);
  }
}
else {
  total++;
}
$($tselector).text(total);
});

$("#maddcrt").on("click", function(){
var qty = $('.modal-total').html();
var pid = $(this).parent().parent().parent().parent().find("#mproduct_id").val();

if($('.mproduct-attr').length > 0)
{
values = $(".mproduct-attr:checked").map(function() {
return $(this).val();
}).get();

keys = $(".mproduct-attr:checked").map(function() {
return $(this).data('key');
}).get();


prices = $(".mproduct-attr:checked").map(function() {
return $(this).data('price');
}).get();

}



$.ajax({
  type: "GET",
  url:mainurl+"/addnumcart",
  data:{id:pid,qty:qty,size:sizes,color:colors,size_qty:size_qty,size_price:size_price,size_key:size_key,keys:keys,values:values,prices:prices},
  success:function(data){
      if(data == 'digital') {
          toastr.error(langg.already_cart);
      }
      else if(data == 0) {
          toastr.error(langg.out_stock);
      }
      else {
          $("#cart-count").html(data[0]);
          $("#cart-items").load(mainurl+'/carts/view');
          toastr.success(langg.add_cart);
      }
  }
});
});

</script>
