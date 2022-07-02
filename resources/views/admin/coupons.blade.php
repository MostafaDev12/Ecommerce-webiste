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
                <h4 class="heading">{{ __('Coupons') }}</h4>
                <ul class="links">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.marketing-kit') }}">{{ __('Marketing kit') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.coupons-tabs') }}">{{ __('Coupons') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="product-area px-2 py-5">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin-coupon-index') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-link"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Set Coupons') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin-coupon-index-piece') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-link"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Buy One Take One Free') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin-coupon-index-free') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-link"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Take One Free') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            @if($features[1]->status == 1 && $features[1]->active == 1 )
            <div class="col-md-4">
                <a href="{{ route('admin-points-index') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-link"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Loyalty Program Coupons') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            @endif
        </div>
    </div>
</div>



@endsection    