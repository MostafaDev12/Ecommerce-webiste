@extends('layouts.load')

@section('styles')

<link href="{{asset('assets/admin/css/jquery-ui.css')}}" rel="stylesheet" type="text/css">

@endsection


@section('content')

            <div class="content-area">

              <div class="add-product-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                        @include('includes.admin.form-error')  
                      <form id="geniusformdata" action="{{route('admin-city-create')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                     <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('country') }} *</h4>
                              
                            </div>
                          </div>
                          <div class="col-lg-7">
                               <select name="country_id">
                               @foreach (DB::table('countries')->where('status',1)->get() as $dat)
                            	<option value="{{ $dat->id}}" >{{ $dat->country_name }}</option>
                            	
                            	@endforeach
                              </select>
                          
                          </div> 
                   
                        </div>  
                            <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('City Name') }} *</h4>
                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="name" placeholder="{{ __('Enter name') }}" required="" value="">
                          </div>
                        </div> 
                     <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('City Name') }} *</h4>
                                <p class="sub-heading">{{ __('(Arabic)') }}</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="name_ar" placeholder="{{ __('Enter Arabic name') }}"  value="">
                          </div>
                        </div>
                      
           
                       <!-- <div class="row">
                                      <div class="col-lg-4">
                                        <div class="left-area">
                                            <h4 class="heading"> {{ __('Coupon Image') }} *</h4>
                                            <small>{{ __('(Preferred SIze: 285 X 410 Pixel)') }}</small>
                                        </div>
                                      </div>
                                      <div class="col-lg-7">
                                        <div class="img-upload">
                                            <div id="image-preview" class="img-preview" style="background: url({{ asset('assets/images/noimage.png') }});">
                                                <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                                <input type="file" name="photo" class="img-upload" id="image-upload">
                                              </div>

                                        </div>
                                      </div>
                                    </div>-->
                        <br>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <button class="addProductSubmit-btn" type="submit">{{ __('Create City') }}</button>
                          </div>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection

@section('scripts')



<script type="text/javascript">
    var dateToday = new Date();
    var dates =  $( "#from,#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
        minDate: dateToday,
        onSelect: function(selectedDate) {
        var option = this.id == "from" ? "minDate" : "maxDate",
          instance = $(this).data("datepicker"),
          date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
          dates.not(this).datepicker("option", option, date);
    }
});
</script>

@endsection

