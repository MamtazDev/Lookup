@inject('orderitem','App\Models\OrderModel')
@inject('Product','App\Models\ProductModel')
@inject('artist','App\Models\ArtistModel')
@inject('catagory','App\Models\ProductCategoryModel')
@inject('framesData','App\Models\ProductFrameModel')
@extends('frontview.layouts.app')
@extends('frontview.layouts.header')
@section('content')

    <script>
      <!--
        $(document).ready(function(){
          var headerfixed = 1;
          if (headerfixed == 1) {
            $(window).scroll(function () {
              if ($(window).width() > 991) {
                if ($(this).scrollTop() > 160) {
                  $('header').addClass('header-fixed');
                    } else {
                  $('header').removeClass('header-fixed');
                }
              }
              else{
                $('header').removeClass('header-fixed');
              }
            });
          }
          else{
            $('header').removeClass('header-fixed');
          }
        });
    </script>

  <div class="oreders">
    <div class="order container">
      <div class="">
        <div class=" row-m-p">
          <div class="col-md-12">
            <h3 style="vertical-align: center;">
              <b>Order Details</b>
            </h3>
          </div>
          <div class="row  row-m-p" style="margin-bottom:15px!important;">
            <div class="col-md-4">
              @php
                  $originalDate = $orderdata['created_at'];
                  $newDate = date("d F Y", strtotime($originalDate)); 
                @endphp  
              <h4 style="vertical-align: center; color: white !important;">Ordered on {{$newDate}}</h4>
            </div>
            <div class="col-md-4">
              <h4 style="vertical-align: center; color: white !important; ">Order # {{$orderdata['order_id']}}</h4>
            </div>
            <div class="col-md-4"></div>
          </div>
          <div class="row order-form row-p-m">
            <div class="order-header">
              <div class="row row-p-m bg-color1 " style="padding-bottom: 35px;">
                <div class="col-md-4 col-sm-12" style="text-align: left;">
                  <div class="data-details">
                    <h3>
                      <b>Shipping Address <b>
                    </h3>
                    <br>
                    <h4 class="order-height">{!!$orderdata['shipping_address']!!}</h4>
                  </div>
                </div>
                <div class="col-md-4 com-sm-12">
                  <div class="data-details">
                    <h3>
                      <b>Payment Method</b>
                    </h3>
                    <br>
                    <h4> Online <h4>
                  </div>
                </div>
                @if($orderdata['order_currancy'] == "EUR")
                  @php $sign = '€'; @endphp
                  @elseif($orderdata['order_currancy'] == "GBP")
                  @php $sign = '£'; @endphp
                  @else
                  @php $sign = '$'; @endphp
                  @endif
                <div class="col-md-4 col-sm-12">
                  <div class="data-details">
                    <h3>
                      <b>ORDER# Summary</b>
                    </h3>
                    <br>
                    <h4 class="-ordertitle">Item(s) Subtotal : <span class="order-space"> {{$sign}}{{$orderdata['order_amount']}}</span>
                    </h4>
                    <h4 class="-ordertitle">
                      <b> Grand Total:</b>
                   
                    
                      <b>{{$sign}}{{$orderdata['order_amount']}}</b>
                    </h4>
                  </div>
                </div>
              </div>
              <div class="row row-p-m content-img" style="background: white; margin-bottom: 20px;  ">
                <div class="row-p-m border-top">
                  <h3 class="deliver-text" style="margin-top:15px; text-align: left;">
                @php
                  $originalDate = $orderdata['delivery_date'];
                  $newDate = date("d F Y", strtotime($originalDate)); 
                @endphp
                    <b>Delivered {{$newDate}}</b>
                  </h3>
                </div>
                @php
                $orderitemData = $orderitem->getorderitemsbyorderid($orderdata['id']);
                @endphp
                @foreach($orderitemData as $iteam)
                @php 
                   $ProductData = $Product->getProdectsbyIdfororder($iteam->productid);
                @endphp
                <div class="row row-p-m">
                  <div class="col-md-3  ">
                    <div class="order-img ">
                      <img src="{{ url('/public/image/products/'.$ProductData->featuredimage) }}">
                    </div>
                  </div>
                 
                  <div class="col-md-4 details-style" style="text-align: left;">
                     @php
                    $artistData = $artist->getArtistdetilesbyId($iteam->artist_id);
                    $artistName = '';
                  @endphp
                    @if(isset($artistData->firstname) &&!empty($artistData->firstname) && isset($artistData->lastname) &&!empty($artistData->lastname))
                      @php $artistName = $artistData->firstname.' '.$artistData->lastname; @endphp
                    @elseif(isset($artistData->firstname) &&!empty($artistData->firstname))
                      @php $artistName = $artistData->firstname; @endphp
                    @endif
                    @if(isset($artistName) && !empty($artistName))
                    <p class="detail-colour">Artist: <b>{{$artistName}}</b>
                       @endif
                      <!-- <br> -->
                      <b class="productdata">{{$ProductData->title}}</b>
                      @php
                        $catagoryData = $catagory->getProductCategoryByIds($ProductData->categoryid);
                    @endphp
                      <br> {{$ProductData->height}}*{{$ProductData->width}} cm, <br> 
                      @if(isset($catagoryData) && !empty($catagoryData))
                          {{$catagoryData->name}}
                    @endif 
                    <br>
                    @if(isset($iteam->frame_id) && !empty($iteam->frame_id) && $iteam->frame_id > 0)
                    @php
                      $frames = $framesData->getProdectsFrameFororderByid($iteam->frame_id);
                    @endphp
                    @if(isset($frames) && !empty($frames))
                    <div class="frame-thumb-detail">
                        <a href="javascript:(0);">
                          <img src="{{url('public/image/frames/'.$frames['frame']->image)}}">
                        </a>
                    </div>
                    @endif
                    @endif
                      <b>{{$sign}}{{$iteam->product_price}}</b><br>
                      <b>Quantity:</b> {{$iteam->quantity}}
                      
                    </p>
                  </div>
                  <div class="col-md-5"></div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
          <br>
          <br>
        </div>
      </div>
    </div>
  </div>
  </div>

@extends('frontview.layouts.footer')
@endsection