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
                <h4 class="heading">{{ __('Home Page Settings') }}</h4>
                <ul class="links">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/main-settings') }}">Main Settings</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/home-settings') }}">{{ __('Home Page Settings') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="product-area px-2 py-5">
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('admin-sl-index') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-sliders-h"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Sliders') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-service-index') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-hand-holding"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Services') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-ps-best-seller') }}" class="box-tab d-flex">
                    <div>
                        <i class="far fa-image"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Right Side Banner1') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-ps-big-save') }}" class="box-tab d-flex">
                    <div>
                        <i class="far fa-image"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Right Side Banner2') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-fixx') }}" class="box-tab d-flex">
                    <div>
                        <i class="far fa-image"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>Fixed Banners</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-sb-index') }}" class="box-tab d-flex">
                    <div>
                        <i class="far fa-image"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Top Small Banners') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-sb-large') }}" class="box-tab d-flex">
                    <div>
                        <i class="far fa-image"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Large Banners') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-sb-bottom') }}" class="box-tab d-flex">
                    <div>
                        <i class="far fa-image"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Bottom Small Banners') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-review-index') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Reviews') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-partner-index') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Partners') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-ps-customize') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-dice-d6"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Home Page Customization') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>



@endsection    