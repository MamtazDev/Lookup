@inject('orderitem','App\Models\OrderModel')
@inject('Product','App\Models\ProductModel')
@inject('artist','App\Models\ArtistModel')
@inject('catagory','App\Models\ProductCategoryModel')
@extends('layouts.app')

@section('title')
   Update Order
@endsection

@section('main')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<div class="container">
    <div class="justify-content-center">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header"><!-- Update order -->
               @can('order-list') 
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('order.index') }}">See all Orders</a>
                </span>
                @endcan 
            </div>
            <div class="card-body">
                  
 @php $orderid = $orderdata['order_id']; @endphp
     {{ Form::open(['route' => ['orderstatusupdate'], 'method' => 'POST', 'style'=>'display:inline-block']) }} 
             
                <!-- Html static   -->
                @php
                  $originalDate = $orderdata['created_at'];
                  $newDate = date("d F Y", strtotime($originalDate)); 
                @endphp 
              <div class="oreders">
                  <div class="order">
                    <div class="detail-title" >
                      <h3 class="order-clr">Order Details</h3>
                    </div>
                    <div class="row">
                      <div class="col-md-6 col-sm-12">
                         <h4 style="vertical-align: center;" id="title-order">Ordered on {{$newDate}}</h4> 
                           @php
                  $originalDate = $orderdata['delivery_date'];
                  $newDate = date("d F Y", strtotime($originalDate)); 
                @endphp
                    <b>Delivery date {{$newDate}}</b>
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <h4 style="vertical-align: center;" id="title-order">Order # {{$orderdata['order_id']}}</h4>
                      </div>
                    </div>
                  </div>
                  <div class="order-history">
                    <table class="basic-table table-headers table table-hover order-table">
                      <thead>
                        <tr>
                          <th>Shipping Address</th>
                          <th>Customer Detail</th>
                          <th>Order Summary</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>  
                          <!--    <h4>Jlm Garry</h4> -->
                             <h4>{!!$orderdata['shipping_address']!!}</h4>
                           
                          </td>
                          <td> <h4 >Name:- {{ $customerdata['fullname']  }}</h4>
                <h4>Phone:- {{ $customerdata['phone']  }}</h4>
                <h4>Email:- {{ $customerdata['email']  }}</h4>
                 <h4>Payment Method:- Online</h4>
                <h4>Paypal Email:- {{ $orderdata['paypal_email']  }}</h4>
                <h4>Paypal TransactionID:- {{ $orderdata['paypal_transectionid']  }}</h4></td>
                          <td>
                            <h4 class="order-title">Item(s) Subtotal :
                            <span > ${{$orderdata['order_amount']}}</span></h4>
                            <!-- <h4 class="order-title"> Shipping: <span>Rs. 5,000</h4>
                            <h4 class="order-title">Total:<span> Rs. 1,10,000</h4>
                            <h4 class="order-title">Promotion Applied:<span>-Rs. 5,000</h4> -->
                            <h4 class="order-title-total"><b> Grand Total:</b><span><b>${{$orderdata['order_amount']}}</b></h4>
                          </td>
                          
                        </tr>
                        
                      </tbody>
                  </table>
                  </div>
                  <div class="order-details">
                  <table class="basic-table table-headers table table-hover order-table">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Product Image</th>
                          <th>Artist Name</th>
                          <th>Product Name</th>
                          <th>Size</th>
                          <th>Quantity</th>
                          <th>Category</th>
                          <th>price</th>
                        </tr>
                        
                      </thead>
                      <tbody>
                          @php
                $orderitemData = $orderitem->getorderitemsbyorderid($orderdata['id']);
                @endphp
                @foreach($orderitemData as $iteam)
                @php 
                   $ProductData = $Product->getProdectsbyIdfororder($iteam->productid);

                @endphp
                        <tr>
                        <?php 
                                    $ProductImgUrl = url('/public/image/products/'.$ProductData->featuredimage);
                                    
                                        ?>
                        <td>
                       <input type="checkbox" id="selected" name="selected[]" value="{{$ProductData->id}}">                     
                       </td>
                          <td>
                            <img  src="<?php echo $ProductImgUrl; ?>" class="product-img"></td>
                          @php
                    $artistData = $artist->getArtistdetilesbyId($iteam->artist_id);
                    $artistName = '';
                  @endphp
                    @if(isset($artistData->firstname) &&!empty($artistData->firstname) && isset($artistData->lastname) &&!empty($artistData->lastname))
                      @php $artistName = $artistData->firstname.' '.$artistData->lastname; @endphp
                    @elseif(isset($artistData->firstname) &&!empty($artistData->firstname))
                      @php $artistName = $artistData->firstname; @endphp
                    @endif
                    
                  
                     <td><?php if(isset($artistName) && !empty($artistName)) {
                      echo $artistName;
                    } ?></td>

                           @php
                        $catagoryData = $catagory->getProductCategoryByIds($ProductData->categoryid);
                    @endphp
                          <td>{{$ProductData->title}} </td>
                          <td>{{$ProductData->height}}*{{$ProductData->width}} cm</td>
                          <td>{{$iteam->quantity}}</td>
                          <td>@if(isset($catagoryData) && !empty($catagoryData))
                          {{$catagoryData->name}}
                    @endif </td>
                          <td>${{$iteam->product_price}}</td>
                        </tr>
                        @endforeach
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td> Total : ${{$orderdata['order_amount']}}</td>
                        </tr>
                      </tbody>
                  </table>
                  </div>
              </div>
              <!-- Html static   -->


         
        

            
     <input type="hidden" name="order_id" value="{{$orderid}}">
     <label>Order Status:- </label><br>
<select class="btn dropdown-toggle" id="orderstatus" name="order_status">
     <option value="{{$orderdata['order_status']}}">{{$orderdata['order_status']}}</option>
           <option value="Processing">Processing</option>
            <option value="Cancelled">Cancelled</option>
          <option value="Refunded">Refunded</option>
            <option value="Completed">Completed</option>
                   </select> <br>
<button style="margin-top: 10%;" type="submit" class="btn btn-primary">Submit</button>
{{ Form::close() }}
       
  </div>
              
        </div>
        </div>
    </div>
  


<script type="text/javascript">
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

    $("#preview-img").change(function(){
        readURL(this);
    });
</script>

@endsection