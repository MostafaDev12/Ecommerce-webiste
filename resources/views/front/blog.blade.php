@extends('layouts.front')

@php 

$slang = Session::get('language');
$lang  = DB::table('languages')->where('is_default','=',1)->first();

@endphp
@section('content')


  <!-- Breadcrumb Area Start -->
  <div class="breadcrumb-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <ul class="pages">

          {{-- Category Breadcumbs --}}

          @if(isset($bcat))
                
              <li>
                <a href="{{ route('front.index',$sign) }}">
                  {{ $langg->lang17 }}
                </a>
              </li>
              <li>
                <a href="{{ route('front.blog',$sign) }}">
                  {{ $langg->lang18 }}
                </a>
              </li>
              <li>
                <a href="{{ route('front.blogcategory',['slug' => $bcat->slug , 'lang' => $sign ]) }}">
                  @if(!$slang)
                                                      @if($lang->id == 2)
                                                      {{ $bcat->name_ar }}
                                                      @else 
                                                      {{ $bcat->name }}
                                                      @endif 
                                                  @else  
                                                      @if($slang == 2) 
                                                      {{ $bcat->name_ar }}
                                                      @else
                                                      {{ $bcat->name }}
                                                      @endif
                                                  @endif 
                </a>
              </li>

          @elseif(isset($slug))

              <li>
                <a href="{{ route('front.index',$sign) }}">
                  {{ $langg->lang17 }}
                </a>
              </li>
              <li>
                <a href="{{ route('front.blog',$sign) }}">
                  {{ $langg->lang18 }}
                </a>
              </li>
              <li>
                <a href="{{ route('front.blogtags',['slug' => $slug , 'lang' => $sign ]) }}">
                  {{ $langg->lang35 }}: {{ $slug }}
                </a>
              </li>

          @elseif(isset($search))
                
              <li>
                <a href="{{ route('front.index',$sign) }}">
                  {{ $langg->lang17 }}
                </a>
              </li>
              <li>
                <a href="{{ route('front.blog',$sign) }}">
                  {{ $langg->lang18 }}
                </a>
              </li>
              <li>
                <a href="Javascript:;">
                  {{ $langg->lang36 }}
                </a>
              </li>
              <li>
                <a href="Javascript:;">
                  {{ $search }}
                </a>
              </li>

          @elseif(isset($date))
                
              <li>
                <a href="{{ route('front.index',$sign) }}">
                  {{ $langg->lang17 }}
                </a>
              </li>
              <li>
                <a href="{{ route('front.blog',$sign) }}">
                  {{ $langg->lang18 }}
                </a>
              </li>
              <li>
                <a href="Javascript:;">
                  {{ $langg->lang37 }}: {{ date('F Y',strtotime($date)) }}
                </a>
              </li>

          @else
                
              <li>
                <a href="{{ route('front.index',$sign) }}">
                  {{ $langg->lang17 }}
                </a>
              </li>
              <li>
                <a href="{{ route('front.blog',$sign) }}">
                  {{ $langg->lang18 }}
                </a>
              </li>
          @endif

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumb Area End -->

  <!-- Blog Page Area Start -->
  <section class="blogpagearea">
    <div class="container">
      <div id="ajaxContent">

      <div class="row row-reverse-sm">

        @foreach($blogs as $blogg)
        <div class="col-md-7 col-lg-8">
              <div class="blog-box">
                <div class="blog-images">
                    <div class="img">
                    <img src="{{ $blogg->photo ? asset('assets/images/blogs/'.$blogg->photo):asset('assets/images/noimage.png') }}" class="img-fluid" 
                    
                     @if(!$slang)
                                      @if($lang->id == 2)
                                       
                                      alt="{{$blogg->alt_ar}}"        
                                      @else 
                                       alt="{{$blogg->alt}}"    
                                      @endif 
                                      @else  
                                      @if($slang == 2) 
                                          alt="{{$blogg->alt_ar}}"    
                                      @else
                                           alt="{{$blogg->alt}}"    
                                      @endif
                           @endif
                           
                           
                    
                    >
                    <div class="date d-flex justify-content-center">
                      <div class="box align-self-center">
                        <p>{{date('d', strtotime($blogg->created_at))}}</p>
                        <p>{{date('M', strtotime($blogg->created_at))}}</p>
                      </div>
                    </div>
                    </div>
                </div>
                <div class="details">
                    <a href="{{route('front.blogshow',['id' => $blogg->id ,'lang' => $sign ])}}">
                      <h4 class="blog-title">
                        @if(!$slang)
                                                      @if($lang->id == 2)
                                                      {{strlen($blogg->title_ar) > 50 ? substr($blogg->title_ar,0,50)."...":$blogg->title_ar}}
                                                      @else 
                                                      {{strlen($blogg->title) > 50 ? substr($blogg->title,0,50)."...":$blogg->title}}
                                                      @endif 
                                                  @else  
                                                      @if($slang == 2) 
                                                      {{strlen($blogg->title_ar) > 50 ? substr($blogg->title_ar,0,50)."...":$blogg->title_ar}}
                                                      @else
                                                      {{strlen($blogg->title) > 50 ? substr($blogg->title,0,50)."...":$blogg->title}}
                                                      @endif
                                                  @endif 
                      </h4>
                    </a>
                  <p class="blog-text">
                   @if(!$slang)
                                                      @if($lang->id == 2)
                                                     {{substr(strip_tags($blogg->details_ar),0,120)}}
                                                      @else 
                                                      {{substr(strip_tags($blogg->details),0,120)}}
                                                      @endif 
                                                  @else  
                                                      @if($slang == 2) 
                                                      {{substr(strip_tags($blogg->details_ar),0,120)}}
                                                      @else
                                                      {{substr(strip_tags($blogg->details),0,120)}}
                                                      @endif
                                                  @endif  
                  </p>
                  <a class="read-more-btn" href="{{route('front.blogshow',['id' => $blogg->id ,'lang' => $sign ])}}">{{ $langg->lang38 }}</a>
                </div>
            </div>
              <hr class="my-5">
        </div>
        @endforeach
        
        <div class="col-md-5 col-lg-4">
            <div class="featured-blogs">
                <h5>FEATURED POSTS</h5>
                <ul class="list-unstyled">
                    <li><a href="#"><i class="fas fa-link"></i> How to design effective arts?</a></li>
                    <li><a href="#"><i class="fas fa-link"></i> How to design effective arts?</a></li>
                    <li><a href="#"><i class="fas fa-link"></i> How to design effective arts?</a></li>
                    <li><a href="#"><i class="fas fa-link"></i> How to design effective arts?</a></li>
                    <li><a href="#"><i class="fas fa-link"></i> How to design effective arts?</a></li>
                </ul>
            </div>
        </div>
      </div>

        <div class="page-center">
          {!! $blogs->links() !!}               
        </div>
</div>

    </div>
  </section>
  <!-- Blog Page Area Start -->




@endsection


@section('scripts')

<script type="text/javascript">
  

    // Pagination Starts

    $(document).on('click', '.pagination li', function (event) {
      event.preventDefault();
      if ($(this).find('a').attr('href') != '#' && $(this).find('a').attr('href')) {
        $('#preloader').show();
        $('#ajaxContent').load($(this).find('a').attr('href'), function (response, status, xhr) {
          if (status == "success") {
            $("html,body").animate({
              scrollTop: 0
            }, 1);
            $('#preloader').fadeOut();


          }

        });
      }
    });

    // Pagination Ends

</script>


@endsection