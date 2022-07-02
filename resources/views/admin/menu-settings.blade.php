<?php
  $features= App\Models\Feature::all();
  $l = DB::table('languages')->where('is_default','=',1)->first();
?>
@extends('layouts.admin') 
<style>
    .box-tab{
        border: 1px solid #ececec;
        margin-bottom: 20px;
        border-radius: 6px;
        padding: 18px 12px;
        min-height: 100px;
        transition: all .2s ease-in-out;
    }
    .box-tab:hover{
        border: 1px solid #ccc;
    }
    .box-tab h4{
        font-size: 15px;
        font-weight: 600;
    }
    .box-tab p{
        font-size: 13px;
        color: #777;
        line-height: 1.4;
    }
    .box-tab i{
        font-size: 28px;
        margin-right: 10px;
        color: #3e0000;
    }
    
</style>
@section('content') 

<div class="content-area">
    <div class="mr-breadcrumb">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading">{{ __('Menu Page Settings') }}</h4>
                <ul class="links">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/main-settings') }}">Main Settings</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/menu-settings') }}">{{ __('Menu Page Settings') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="product-area px-2 py-5">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin-faq-index') }}" class="box-tab d-flex">
                    <div>
                        <i class="far fa-question-circle"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('FAQ Page') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin-ps-contact') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-tty"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Contact Us Page') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin-page-index') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-angle-double-right"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Other Pages') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>



@endsection    