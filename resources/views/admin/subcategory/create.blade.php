@extends('layouts.load')

@section('content')

@include('includes.admin.form-error')  
<form id="geniusformdata" action="{{route('admin-subcat-create')}}" method="POST" enctype="multipart/form-data" class="inp-50">
    {{csrf_field()}}
    <div class="row">
        <div class="col-lg-12">
            <label>{{ __("Category") }}</label>
            <select  name="category_id" class="form-select" required="">
                <option value="">{{ __("Select Category") }}</option>
                @foreach($cats as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>English Name</label>
            <input type="text" class="form-control" name="name" placeholder="English Name" required="" value="">
        </div>
        <div class="col-md-6">
            <label>Arabic Name</label>
            <input type="text" class="form-control" name="name_ar" placeholder="Arabic Name" required="" value="">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="text-editor">
                <label>English Description</label>
                <textarea class="ckeditor form-control" name="details"></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-editor">
                <label>Arabic Description</label>
                <textarea class="ckeditor form-control" name="details_ar"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>English Slug</label>
            <input type="text" class="form-control" name="slug" placeholder="English Slug" required="" value="">
        </div>
        <div class="col-md-6">
            <label>Arabic Slug</label>
            <input type="text" class="form-control" name="slug_ar" placeholder="Arabic Slug" required="" value="">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>English Title</label>
            <input type="text" class="form-control" name="title" placeholder="English Title"  value="">
        </div>
        <div class="col-md-6">
            <label>Arabic Title</label>
            <input type="text" class="form-control" name="title_ar" placeholder="Arabic"  value="">
        </div>
    </div> 
    <div class="row">
        <div class="col-md-12">
            <label>Meta Tags</label>
            <ul id="metatags" class="myTags"></ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="text-editor">
                <label>English Meta Description</label>
                <textarea name="meta_description" class="ckeditor form-control" placeholder="English Meta Description"></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-editor">
                <label>Arabic Meta Description</label>
                <textarea name="meta_description_ar" class="ckeditor form-control" placeholder="Arabic Meta Description"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6" >
            <label>English Tags</label>
            <ul id="tags" class="myTags"></ul>
        </div>
        <div class="col-md-6" >
            <label>Arabic Tags</label>
            <ul id="atags" class="myTags"></ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="img-upload">
                <div id="image-preview" class="img-preview" style="background: url({{ asset('assets/admin/images/upload.png') }});">
                    <label for="image-upload" class="img-label" id="image-label"><i class="icofont-upload-alt"></i>{{ __('Upload Image') }}</label>
                    <input type="file" name="photo" class="img-upload" id="image-upload">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mt-4 text-end">
            <button class="main-dark-btn py-3" type="submit">{{ __("Create") }}</button>
        </div>
    </div>
</form>
                      

@endsection


@section('scripts')




<script type="text/javascript">

{{-- TAGIT --}}

          $("#metatags").tagit({
          fieldName: "meta_tag[]",
          allowSpaces: true 
          });

          $("#tags").tagit({
          fieldName: "tags[]",
          allowSpaces: true 
        });
       
        $("#tags_ar").tagit({
          fieldName: "tags_ar[]",
          allowSpaces: true 
        });

{{-- TAGIT ENDS--}}
</script>

<script src="{{asset('assets/admin/js/product.js')}}"></script>
<script src="{{asset('assets/admin/js/jscolor.js')}}"></script>




<script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
       
    });
</script>
@endsection