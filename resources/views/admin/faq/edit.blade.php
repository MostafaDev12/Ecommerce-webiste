@extends('layouts.load')
@section('content')

            <div class="content-area">

              <div class="add-product-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                        @include('includes.admin.form-error') 
                      <form id="geniusformdata" action="{{route('admin-faq-update',$data->id)}}" method="POST">
                        {{csrf_field()}}



                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Title') }} *</h4>
                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="title" placeholder="{{ __('Title') }}" value="{{$data->title}}" required="">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Arabic Title') }} *</h4>
                                <p class="sub-heading">{{ __('(Arabic)') }}</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="title_ar" placeholder="{{ __('Arabic Title') }}" value="{{$data->title_ar}}" required="">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">
                                   {{ __('Description') }} *
                              </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <textarea class="ckeditor form-control" name="details" placeholder="{{ __('Description') }}">{{ $data->details }}</textarea> 
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">
                                   {{ __('Arabic Description') }} *
                              </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <textarea class="ckeditor form-control" name="details_ar" placeholder="{{ __('Arabic Description') }}">{{ $data->details_ar }}</textarea> 
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">
                                   {{ __('mobile Description') }} *
                              </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <textarea name="mobile_details" class="ckeditor form-control" placeholder="{{ __('Description') }}">{{ $data->mobile_details }}</textarea> 
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">
                                   {{ __('mobile Arabic Description') }} *
                              </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <textarea  name="mobile_details_ar" class="ckeditor form-control" placeholder="{{ __('Arabic Description') }}">{{ $data->mobile_details_ar }}</textarea> 
                          </div>
                        </div>




                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <button class="addProductSubmit-btn" type="submit">{{ __('Save') }}</button>
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


 <script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
       
    });
</script>

@endsection