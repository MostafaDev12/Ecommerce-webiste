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
                <h4 class="heading">{{ __('Shipment Settings') }}</h4>
                <ul class="links">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/main-settings') }}">Main Settings</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/shipment-settings') }}">{{ __('Shipment Settings') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="product-area px-2 py-5">
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('shipping_integration') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('integration shipping company') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-shipment-index') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Shipment Methods') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-zones-index') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Shipment Zones') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-shipment-price-index') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Shipment Price Methods') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-shipping-index') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Shipping Methods') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-package-index') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-box-open"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Packagings') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-pick-index') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-thumbtack"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Pickup Locations') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-country-index') }}" class="box-tab d-flex">
                    <div>
                        <i class="far fa-flag"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Country') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin-city-index') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-city"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('City') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>



@endsection    