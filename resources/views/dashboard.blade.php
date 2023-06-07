@extends('layouts.app')

@section('title')
   Dashboard
@endsection

@section('main')

<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box ">
              <div class="inner">
                <h3 style="color: #5c96f6!important; font-size: 45px!important;">0{{--{{$NewOrders}}--}}</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box ">
              <div class="inner">
                <h3 style="color: #ef5151!important;font-size: 45px!important;">{{$ProductsUpload}}<!-- <sup style="font-size: 20px">%</sup> --></h3>

                <p>Product Uploaded</p>
              </div>
              <div class="icon">
               <!--  <i class="ion ion-arrow-up-a"></i> -->
               <i class="fas fa-upload" style="font-size: 35px!important;"></i>

              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box ">
              <div class="inner">
                <h3 style="color: #f0a72d!important;font-size: 45px!important;">{{$userregistration}}</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box ">
              <div class="inner">
                <h3 style="color: #39de76!important;font-size: 45px!important;">0{{--{{$WalletModel}}--}}</h3>

                <p>Total Earnings</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
        </div>
@endsection
