@extends('layouts.load')

@section('content')
            <div class="content-area">

              <div class="add-product-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                        @include('includes.admin.form-error') 
                      <form id="geniusformdata" action="{{route('admin-sb-update',$data->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}


                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Current Featured Image') }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <div class="img-upload full-width-img">
                                <div id="image-preview" class="img-preview" style="background: url({{ $data->photo ? asset('assets/images/banners/'.$data->photo):asset('assets/images/noimage.png') }});">
                                    <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                                    <input type="file" name="photo" class="img-upload" id="image-upload">
                                  </div>
                                  <p class="text">{{ __('Prefered Size: (1280x600) or Square Sized Image') }}</p>
                            </div>

                          </div>
                        </div>


                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Link') }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="link" placeholder="{{ __('Link') }}" value="{{ $data->link }}">
                          </div>
                        </div>





                          

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('TITLE') }} *</h4>
                            </div>
                          </div>
                          	<div class="col-lg-7">
														<div class="text-editor">
															<textarea class="nic-edit-p" name="title">{{ $data->title }}</textarea>
														</div>
				      	</div>
                        </div>
                        
                        
                         <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('TITLE ARABIC') }} *</h4>
                            </div>
                          </div>
                         <div class="col-lg-7">
								<div class="text-editor">
									<textarea class="nic-edit-p" name="title_ar">{{ $data->title_ar }}</textarea>
								</div>
				      	</div>
                        </div>
                        
                        
                          <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('SUB TITLE') }} *</h4>
                            </div>
                          </div>
                        
                        <div class="col-lg-7">
								<div class="text-editor">
									<textarea class="nic-edit-p" name="subtitle">{{ $data->subtitle }}</textarea>
								</div>
				      	</div>
                      
                      
                        </div>
                        
                        
                         <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('SUB TITLE ARABIC') }} *</h4>
                            </div>
                          </div>
                         <div class="col-lg-7">
								<div class="text-editor">
									<textarea class="nic-edit-p" name="subtitle_ar">{{ $data->subtitle_ar }}</textarea>
								</div>
				      	</div>
                        </div>
                        
                        
                        
                           
                     <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('BUTTON') }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
								<div class="text-editor">
									<textarea class="nic-edit-p" name="button">{{ $data->button }}</textarea>
								</div>
				      	</div>
                        </div>
                        
                        
                         <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('BUTTON ARABIC') }} *</h4>
                            </div>
                          </div>
                         <div class="col-lg-7">
								<div class="text-editor">
									<textarea class="nic-edit-p" name="btn_ar">{{ $data->btn_ar }}</textarea>
								</div>
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