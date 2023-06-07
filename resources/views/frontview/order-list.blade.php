@inject('orderitem','App\Models\OrderModel')
@inject('Product','App\Models\ProductModel')
@inject('artist','App\Models\ArtistModel')
@inject('catagory','App\Models\ProductCategoryModel')
@inject('mylibrary', 'App\Helpers\MyLibrary')
@inject('framesData','App\Models\ProductFrameModel')
@if(!Request::ajax())
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
          <div class="col-md-4">
            <h3 style="vertical-align: center;">
              <b>My Orders</b>
            </h3>
          </div>
          <div class="col-md-2"></div>
          <div class="order-details col-md-6 row-p-m">
            <form class="form-example" action="#">
              <input type="text" class="input-sear" id="serchinput" placeholder="Search all orders" name="search">
              <button class="search-btn">
                <a href="javascript:void(0);" onclick="searchorder()">SEARCH</a>
              </button>
              <label for="stuff" class="fa fa-search input-icon"></label>
            </form>
          </div>
        </div>
        <div class="row  row-m-p" style="margin-bottom:15px!important;">
          <div class="col-md-2">
            <h3 style="vertical-align: center;">
              <h3>Orders</h3>
          </div>
          
          <div class="col-md-2"></div>
        </div>
        <div id="postData">
          @endif
        @foreach($orderdata as $order)

        <div class="row order-form row-p-m">
          <div class="order-header">
            <div class="row row-p-m bg-color1">
              <div class="col-md-3">
                <div class="data-details">
                  <h4>ORDER PLACED</h4>
                @php
                  $originalDate = $order->created_at;
                  $newDate = date("d F Y", strtotime($originalDate)); 
                @endphp                  
                  <h4>{{$newDate}}</h4>
                </div>
              </div>
              <div class="col-md-3">
                <div class="data-details price-flex">
                  <h4 style="font-weight: bold;">Total :</h4>
                  @if($order->order_currancy == "EUR")
                  @php $sign = '€'; @endphp
                  @elseif($order->order_currancy == "GBP")
                  @php $sign = '£'; @endphp
                  @else
                  @php $sign = '$'; @endphp
                  @endif
                  <h4>&nbsp;{{$sign}}{{$order->order_amount}}<h4>
                </div>
              </div>
              
              <div class="col-md-3">
            <h3 style="font-weight: bold;"><a href="{{url('return-request/'.$order->id)}}">Returns and Refunds</a></h3>
         </div>
              <!-- <div class="col-md-1"></div> -->
              <!-- <div class="col-md-2"></div> -->
              <div class="col-md-3">
                <div class="data-details">
                  <h4>ORDER#{{$order->order_id}}</h4>
                  <h4>ORDER STATUS: {{$order->order_status}}</h4>
                  <h4>
                    <a href="{{url('order-details/'.$order->id)}}"><b>View order details</b></a>
                  </h4>
                  
                </div>
              </div>
            </div>
            <div class="row row-p-m content-img" style="background: none; margin-bottom: 20px;  ">
              @if(isset($order->order_status) && !empty($order->order_status) && $order->order_status == 'Pending')
              <div class="row-p-m border-top">
                <h3 class="deliver-text" style="margin-top:15px">
                   @php
                  $originalDate = $order->delivery_date;
                  $newDate = date("d F Y", strtotime($originalDate)); 
                @endphp  
                  <b>Delivered {{$newDate}}</b>
                </h3>
              </div>
              @endif
              @php
                $orderitemData = $orderitem->getorderitemsbyorderid($order->id);
              @endphp
              @foreach($orderitemData as $iteam)
              @php 
                 $ProductData = $Product->getProdectsbyIdfororder($iteam->productid);
              @endphp
              @if(isset($ProductData) && !empty($ProductData))
              <div class="row row-p-m">
                <div class="col-md-3  ">
                  <div class="order-img ">
                    <img src="{{ url('/public/image/products/'.$ProductData->featuredimage) }}">
                  </div>
                </div>
                <div class="col-md-4">
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
                      <!-- <p class="detail-colour1">Artist: <b>{{$artistName}}</b> -->
                    @endif
                    <p class="detail-colour">
                    
                    <b>{{$ProductData->title}}</b>
                    @php
                        $catagoryData = $catagory->getProductCategoryByIds($ProductData->categoryid);
                    @endphp
                    <br> {{$ProductData->height}}*{{$ProductData->width}} cm, <br> 
                    @if(isset($catagoryData) && !empty($catagoryData))
                          {{$catagoryData->name}}
                    @endif 
                    <br>
                    <b>{{$sign}}{{$iteam->product_price}}</b>
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
                    <br>
                    @endif
                    @endif
                    
                      <b>Quantity:</b> {{$iteam->quantity}}
                    </p>
                  </p>
                </div>
                <div class="col-md-5"></div>
              </div><br>
              @endif
              @endforeach
            </div>

          </div>
        </div>
        <br>
        <br>
        @endforeach
        @if(!Request::ajax())
      </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <script type="text/javascript">
    function searchorder(){
      var latter = $('#serchinput').val();
    if(latter != ''){
            $.ajax({
              url: site_url + "/orderfilter",
              type: "POST",
              data: {"latter": latter,"_token": $('meta[name="csrf-token"]').attr('content')},
              async: true,
              success: function (res) {
                $('#postData').html(res);
                
              },
          });
    }
  }
  </script>

@extends('frontview.layouts.footer')
@endsection
@endif