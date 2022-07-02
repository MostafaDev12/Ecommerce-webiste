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
    .box-tab img{
        width: 60px;
        margin-right: 25px;
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
                <h4 class="heading">{{ __('Payment Settings') }}</h4>
                <ul class="links">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/main-settings') }}">Main Settings</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/payment-settings') }}">{{ __('Payment Settings') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="product-area px-2 py-5">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin-gs-payments') }}" class="box-tab d-flex">
                    <div>
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Payment Information') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin-payment-index') }}" class="box-tab d-flex">
                    <div>
                        <i class="far fa-credit-card"></i>
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{ __('Payment Gateways') }}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{route('admin-gs-bankmasr')}}" class="box-tab d-flex">
                    <div>
                        <img src="{{asset('assets/admin/images/payment/masr.png')}}">
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{__('Bank  Masr Payment')}}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{route('admin-gs-nbe')}}" class="box-tab d-flex">
                    <div>
                        <img src="{{asset('assets/admin/images/payment/nbe.jpg')}}">
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{__('Nbe Payment')}}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{route('admin-gs-accept')}}" class="box-tab d-flex">
                    <div>
                        <img src="{{asset('assets/admin/images/payment/accept.png')}}">
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{__('Accept Payment')}}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{route('admin-gs-thawani')}}" class="box-tab d-flex">
                    <div>
                        <img src="{{asset('assets/admin/images/payment/thawani.jpg')}}">
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{__('Thawani Payment')}}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{route('admin-gs-fatora')}}" class="box-tab d-flex">
                    <div>
                        <img src="{{asset('assets/admin/images/payment/fatora.jpg')}}">
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{__('Fatora Payment')}}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{route('admin-gs-paypalpaymentt')}}" class="box-tab d-flex">
                    <div>
                        <img src="{{asset('assets/admin/images/payment/paypal.svg')}}">
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{__('Paypal Payment')}}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{route('admin-gs-vapulus')}}" class="box-tab d-flex">
                    <div>
                        <img src="{{asset('assets/admin/images/payment/vapulus.png')}}">
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{__('Vapulus Payment')}}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{route('admin-gs-fawry')}}" class="box-tab d-flex">
                    <div>
                        <img src="{{asset('assets/admin/images/payment/fawry.jpg')}}">
                    </div>
                    <div class="boxt-tab-info">
                        <h4>{{__('Fawry Payment')}}</h4>
                        <p class="mb-0">Main setting for your store</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>



@endsection    