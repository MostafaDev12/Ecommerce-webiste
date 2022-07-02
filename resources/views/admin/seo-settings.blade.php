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
                <h4 class="heading">{{ __('SEO Tools') }}</h4>
                <ul class="links">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/main-settings') }}">Main Settings</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/email-settings') }}">{{ __('SEO Tools') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="product-area px-2 py-5">
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('admin-prod-popular',30) }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-boxes"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Popular Products') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-seotool-keywords') }}" class="box-tab d-flex">
                    <div>
                        <i class="far fa-arrow-alt-circle-up"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('ِAll Website Meta') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-product-header') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-heading"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Product Page Header') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-category-header') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-th"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Category Page Header') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-subcategory-header') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-th-large"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('SubCategory Page Header') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-childcategory-header') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-box"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('ChildCategory Page Header') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-offer-header') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-percent"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Offer Page Header') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-brand-header') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-tag"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Brand Page Header') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>



@endsection    