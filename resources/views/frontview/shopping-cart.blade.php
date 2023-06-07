@extends('frontview.layouts.app')
@extends('frontview.layouts.header')
@section('content')
@inject('mylibrary', 'App\Helpers\MyLibrary')
@inject('artist','App\Models\ArtistModel')
@inject('framesData','App\Models\FramesModel')
@inject('catagory','App\Models\ProductCategoryModel')
@if(isset($_COOKIE['selectCurrancy']) && !empty($_COOKIE['selectCurrancy']))
@php $selectCurrancy = $_COOKIE['selectCurrancy']; @endphp
@else
@php $selectCurrancy = 'USD'; @endphp
@endif
        <script> 
            var toataamount = "{{ $mylibrary->currencyconverterwithoutsymbol($totalamount) }}";
            var chekstk = "{{ $outstock }}";
            var currency = "{{ $selectCurrancy }}";
            var relode = 'Y';
            
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

        <!-- SHOPPING_CART -->
        <section class="cart-head contact-header">
            <div class="cart-menu">
                <div class="main-img">
                    <img src="{{url('public/assets/images/OFFLINE_ABSTRACT_SHAPES_Mesa_de_trabajo_1.png')}}">
                </div>
                <div class="img-content">
                    <h1>Shopping Cart</h1>
                
                <ul class="breadcrumb1">
                    <li><a href="{{url('/homepage')}}">home /</a></li>
                    <li><a href="{{url('/shopping-cart')}}">&nbsp;Shopping Cart</a></li>
                </ul>
                </div>
                <!-- <div class="order-text">
                    <h1>Woo hoo! Let's complete your Order, shall we?</h1>
                </div> -->
            </div>
        </section>

        <section class="shopping-add" id="shopping-cart">

            <div class="container">
                <div class="selected-item">
                            <h4>Your Selections...</h4>
                        </div>
                <div class="row">
                    @if(isset($cartArrs) && !empty($cartArrs) && count($cartArrs) > 0)
                    <div class="col-md-8 col-sm-12">
                        
                        @foreach($cartArrs as $cart)
                        <div class="row" style="margin-top: 50px !important;">
                            <div class="col-md-4 col-sm-12">
                                <div class="order-add">
                                    <div class="item-img">
                                        @if($cart['products']->artistid == "0")
                                            <img src="{{ url('https://lakouphoto.ca/public/image/products/'.$cart['products']->featuredimage) }}" onerror="this.onerror=null;this.src='https://lakouphoto.ca/public/assets/images/lakouphoto.svg';">
                                        @else
                                            <img src="{{ url('https://lakouphoto.ca/Artist/public/image/products/'.$cart['products']->featuredimage) }}" onerror="this.onerror=null;this.src='https://lakouphoto.ca/public/assets/images/lakouphoto.svg';">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="order-add-content">
                                    <div class="add-name">
                                        @php
                                        $artistData = $artist->getArtistdetilesbyId($cart['products']->artistid);

                                        $artistName = '';
                                        @endphp
                                        @if(isset($artistData->firstname) &&!empty($artistData->firstname) && isset($artistData->lastname) &&!empty($artistData->lastname))
                                        @php $artistName = $artistData->firstname.' '.$artistData->lastname; @endphp
                                        @elseif(isset($artistData->firstname) &&!empty($artistData->firstname))
                                        @php $artistName = $artistData->firstname; @endphp
                                        @endif
                                        @if(isset($artistName) && !empty($artistName))
                                        <p>Artist: <strong>{{$artistName}}</strong></p>
                                        @endif
                                       
                                        <p class="painting-type"><strong>{{$cart['products']->title}}</strong></p>
                                        @if ($cart['products']->height || $cart['products']->width)
                                            <p>{{$cart['products']->height}}*{{$cart['products']->width}}cm,</p>
                                        @else
                                            <p>0 cm,</p>
                                        @endif
                                        @php
                                        $catagoryData = $catagory->getProductCategoryByIds($cart['products']->categoryid);
                                        @endphp
                                        
                                        @if(isset($catagoryData) && !empty($catagoryData))
                                        <p>{{$catagoryData->name}}</p>
                                        @endif
                                        @if(isset($cart->frame_id) && !empty($cart->frame_id) && $cart->frame_id > 0)
                                        <div class="frame-thumb">
                                            <a href="javascript:(0);">
                                                @php
                                                 $framesimage = $framesData->getProdectsFrameByid($cart['frame']->frameid);
                                                @endphp
                                                <!-- Frames:&nbsp; --><img src="{{url('https://lakouphoto.ca/public/image/frames/'.$framesimage->image) }}">
                                            </a>
                                        </div>
                                        @endif
                                        @if(isset($cart->frame_id) && !empty($cart->frame_id) && $cart->frame_id > 0)
                                         <p class="amount">{{ $mylibrary->currencyconverterallprice($cart['frame']->frameprice) }}</p>
                                        @else
                                        @if(isset($cart['products']->saleprice) && !empty($cart['products']->saleprice) && $cart['products']->saleprice > 0)
                                            <p class="amount">{{ $mylibrary->currencyconverterallprice($cart['products']->saleprice) }}</p>
                                        @else
                                            <p class="amount">{{ $mylibrary->currencyconverterallprice($cart['products']->price) }}</p>
                                        @endif
                                        @endif
                                        <div class="quantity adderr-{{$cart['products']->id}}" id="qty-{{$cart->id}}">
                                           <input type="button" value="-" class="qty-minus" data-prodectid="{{$cart['products']->id}}" data-cartid="{{$cart->id}}" data-total="{{$cart['products']->stockquantity}}">
                                           <input type="number" value="{{$cart->quantity}}" class="qty quntitisdata" data-prodectid="{{$cart['products']->id}}" data-total="{{$cart['products']->stockquantity}}" id="qtytotal_{{$cart->id}}" readonly>
                                           <input type="button" value="+" data-total="{{$cart['products']->stockquantity}}" class="qty-plus add-{{$cart['products']->id}}" data-cartid="{{$cart->id}}" data-prodectid="{{$cart['products']->id}}" id="plusdata-{{$cart->id}}">
                                        </div>
                                        <div class="add-remove-items">
                                            <div class="remove-item" onclick="removefromcart({{ $cart['id'] }})">
                                                <button class="button" id="del-button">
                                                    <div class="icon">
                                                        <svg class="top">
                                                            <use xlink:href="#top">
                                                        </svg>
                                                        <svg class="bottom">
                                                            <use xlink:href="#bottom">
                                                        </svg>
                                                    </div>
                                                    <span>Remove Item</span>
                                                </button>
                                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                                    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="top">
                                                        <path d="M15,4 C15.5522847,4 16,4.44771525 16,5 L16,6 L18.25,6 C18.6642136,6 19,6.33578644 19,6.75 C19,7.16421356 18.6642136,7.5 18.25,7.5 L5.75,7.5 C5.33578644,7.5 5,7.16421356 5,6.75 C5,6.33578644 5.33578644,6 5.75,6 L8,6 L8,5 C8,4.44771525 8.44771525,4 9,4 L15,4 Z M14,5.25 L10,5.25 C9.72385763,5.25 9.5,5.47385763 9.5,5.75 C9.5,5.99545989 9.67687516,6.19960837 9.91012437,6.24194433 L10,6.25 L14,6.25 C14.2761424,6.25 14.5,6.02614237 14.5,5.75 C14.5,5.50454011 14.3231248,5.30039163 14.0898756,5.25805567 L14,5.25 Z"></path>
                                                    </symbol>
                                                    <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="bottom">
                                                        <path d="M16.9535129,8 C17.4663488,8 17.8890201,8.38604019 17.9467852,8.88337887 L17.953255,9.02270969 L17.953255,9.02270969 L17.5309272,18.3196017 C17.5119599,18.7374363 17.2349366,19.0993109 16.8365446,19.2267053 C15.2243631,19.7422351 13.6121815,20 12,20 C10.3878264,20 8.77565288,19.7422377 7.16347932,19.226713 C6.76508717,19.0993333 6.48806648,18.7374627 6.46907425,18.3196335 L6.04751853,9.04540766 C6.02423185,8.53310079 6.39068134,8.09333626 6.88488406,8.01304774 L7.02377738,8.0002579 L16.9535129,8 Z M9.75,10.5 C9.37030423,10.5 9.05650904,10.719453 9.00684662,11.0041785 L9,11.0833333 L9,16.9166667 C9,17.2388328 9.33578644,17.5 9.75,17.5 C10.1296958,17.5 10.443491,17.280547 10.4931534,16.9958215 L10.5,16.9166667 L10.5,11.0833333 C10.5,10.7611672 10.1642136,10.5 9.75,10.5 Z M14.25,10.5 C13.8703042,10.5 13.556509,10.719453 13.5068466,11.0041785 L13.5,11.0833333 L13.5,16.9166667 C13.5,17.2388328 13.8357864,17.5 14.25,17.5 C14.6296958,17.5 14.943491,17.280547 14.9931534,16.9958215 L15,16.9166667 L15,11.0833333 C15,10.7611672 14.6642136,10.5 14.25,10.5 Z"></path>
                                                    </symbol>
                                                </svg>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                   
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="check-out">
                            <div class="check-out-summary">
                                <h2>ORDER SUMMARY</h2>
                            </div>
                            <div class="amount-detail">
                                <div class="price">
                                    <span class="paint-name">Sub Total</span>
                                    <span class="amount" id="subtotal">{{ $mylibrary->currencyconverterallprice($totalamount) }}</span>
                                </div>
                                <div class="total">
                                    <span class="total-word">Total Amount :</span>
                                    <span class="amount" id="gtotal">{{ $mylibrary->currencyconverterallprice($totalamount) }}</span>
                                </div>
                                @if(isset($shoppingaddres) && !empty($shoppingaddres))
                                <div class="check-out-btn" id="paypal-button-container">
                    
                                </div>
                                @else
                                <script type="text/javascript">
                                relode = 'N';    
                                </script>
                                
                                <p> Please enter delivery address first. </p>
                                @endif
                            </div>    
                        </div>
                        <div class="address-detail">
                            <div class="edit-address">
                            <div class="edit-add">
                                @if(isset($shoppingaddres) && !empty($shoppingaddres))
                                <input type="hidden" value="{{$shoppingaddres->id}}" id="shoppingadd">
                                    <div class="customer-detail">
                                        <h3>{{$shoppingaddres->full_name}} {{$shoppingaddres->AddressType}}</h3>
                                        <p class="customer-add">
                                           {{$shoppingaddres->Street}},<br>{{$shoppingaddres->landmark}},<br>{{$shoppingaddres->sarea}},<br>{{$shoppingaddres->city}}, {{$shoppingaddres->stateName}} {{$shoppingaddres->pin}}<br>{{$shoppingaddres->countryname}}<br>
                                            Phone Number: @if(isset($shoppingaddres->phonecode) && !empty($shoppingaddres->phonecode)) {{$shoppingaddres->phonecode}} @endif @if(isset($shoppingaddres->phone) && !empty($shoppingaddres->phone)) {{$shoppingaddres->phone}} @endif
                                        </p>
                                    </div>
                                    
                                    <div class="edit-remove">
                                        <a href="{{url('/shoppingaddress')}}">Change Address |</a>
                                        <a href="{{url($shoppingaddres->id.'/editshoppingaddress')}}">Edit |</a>
                                        <a href="javascript:void(0)" onclick="removeShoppingAddress('{{$shoppingaddres->id}}')">Remove</a>

                                    </div>
                                    @else
                                    <div class="icon-add">
                                        <a href="{{url('/addnewaddress')}}" class="link-to-text">
                                            <div class="plus-icon">
                                                <i class="fas fa-plus"></i>
                                            </div>
                                            <div class="type-address">
                                                <p>Add Address</p>
                                            </div>
                                        </a>    
                                    </div>
                                    @endif
                            </div>
                        </div>
                        </div>
                    </div>
                    @else
                    <script type="text/javascript">
                        relode = 'N';    
                    </script>
                    <p  style="    font-size: 20px;
    margin-top: 26px;">Your shopping cart is empty!</p>
                     <div class="empty-wish-img" style="text-align: center;">
                <img src="{{url('public/assets/images/empty add to cart icon (1).png') }}" style="width: 12%;margin-bottom: 20px;">
              </div>
                    @endif    
                </div>    
            </div>   
        </section>

<script type="text/javascript">
      
      var shoppingadd = $('#shoppingadd').val();
    
</script>
<!-- <script src="https://www.paypal.com/sdk/js?client-id=AdDP-MgtnLZZvKNHB9Ji-snwht2T86HJl5izFxXr7MtaWe3gC7lTcxLADJWcGekB4irzODwJi9Shm-Ec&locale=en_US"></script> -->

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script type="text/javascript">

var paypalActions;
    // Render the PayPal button
    paypal.Button.render({
      env: 'production', // sandbox | production
      commit: true, // Show Pay Now button

      style: {
        layout: 'horizontal',
         size: 'responsive',
         color: 'gold',
         shape: 'pill',
         label: 'buynow',
         tagline: 'false',
         height: 40,
      },

      client: {
        sandbox: 'AdDP-MgtnLZZvKNHB9Ji-snwht2T86HJl5izFxXr7MtaWe3gC7lTcxLADJWcGekB4irzODwJi9Shm-Ec',
        production: 'AduX3h-EzpD7TssjibNsuOuJG5_F3qvTQ8xcJt-beezjfv0ajCn88wia0uKADe5SvQk70HXwev55zgRL'
      },

      validate: function(actions) {
       // console.log("validate called");
       if(chekstk == 'Y'){
        actions.disable();
        }else{
        actions.enable();
        }
         // Allow for validation in onClick()
        paypalActions = actions; // Save for later enable()/disable() calls
      },

            // Called for every click on the PayPal button even if actions.disabled
      onClick: function() {
        paypalActions.disable();
                $.ajax({
                    url: site_url + '/checkstock',
                    type: 'post',
                    dataType: 'json',
                    beforeSend: function() {
                        //$('#cart > button').button('loading');
                    },
                    complete: function() {
                        //$('#cart > button').button('reset');
                    },
                    success: function(json) {
                        if (json.outstockarr.length === 0) {
                            paypalActions.enable();
                        }else{

                            $.each(json.outstockarr, function (key, val) {
                                $(".remove-"+val.proid).remove();
                                $(".adderr-"+val.proid).after('<span id="error-'+val.cartid+'" class="error remove-'+val.proid+'">'+val.qyt+ ' products available.</span>');
                            });

                            var isValid = true;
        
                            // Issue: fix to continue if valid, suppress popup if invalid
                            if (isValid) {

                              paypalActions.disable();
                            }
                             return false;
                        }
                       // paypalActions.disable();
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                });
      },

      // Buyer clicked the PayPal button.
      payment: function(data, actions) {
        console.log('payment called');
        return actions.payment.create({
          payment: {
            transactions: [{
              amount: {
                total: toataamount,
                currency: currency
              }
            }]
          }
        });
      },

      // Buyer logged in and authorized the payment
      onAuthorize: function(data, actions) {
            return actions.order.capture().then(function(details) {
              // This function shows a transaction success message to your buyer.
                $.ajax({
                    url: site_url + '/addorder',
                    type: 'post',
                     data: {details:details,shoppingadd:shoppingadd},
                    dataType: 'json',
                    beforeSend: function() {
                        //$('#cart > button').button('loading');
                    },
                    complete: function() {
                        //$('#cart > button').button('reset');
                    },
                    success: function(json) {
                        window.location.href = site_url + "/orderhistory";
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                });
              
            });
      },

      onCancel: function (data) {
                // Show a cancel page, or return to cart
                location.reload();
        },

      onError: function (err) {

            // For example, redirect to a specific error page
            if(relode == 'Y'){
            location.reload();     
            }
           
          }

    }, '#paypal-button-container');


</script>

        
        <!-- plus-minus -->
        <script type="text/javascript">
            $(document).on('click', '.qty-plus', function () {
               /*if($(this).data('total') >= )*/
               var totalqty = $(this).data('total');
               var cartid = $(this).data('cartid');
               var proid = $(this).data('prodectid');
               var qty = $('#qtytotal_'+cartid).val();

            if(cartid){
                $.ajax({
                        url: site_url + '/updatequantitycart',
                        type: 'post',
                        data: 'cartid=' + cartid + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1) +'&proid='+proid,
                        dataType: 'json',
                        success: function(json) {
                            if(json.availablety == 'Y'){
                                $("#totalprice").html(json.totalprice); 
                                $("#subtotal").html(json.totalprice);
                                $("#gtotal").html(json.totalprice);
                                toataamount = json.gtotalprice;
                                $("#qtytotal_"+cartid).val(json.qyt);
                                
                            }else{
                                $('#plusdata-'+cartid).prop( "disabled", true );
                                $("#error-"+cartid).remove();
                                $("#qty-"+cartid).after('<span id="error-'+cartid+'" class="error remove-'+proid+'">'+totalqty+ ' products available.</span>');
                            return false;
                            }
                        
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        }
                    });
                }
            });


    $(document).on('click', '.qty-minus', function () {
            var proid = $(this).data('prodectid');
            var cartid = $(this).data('cartid');
            $(".remove-"+proid).remove();
            $('.add-'+proid).prop( "disabled", false );
                    if(cartid && $(this).next().val() > 1 ){
                            $.ajax({
                            url: site_url + '/updatequantitycartmin',
                            type: 'post',
                            data: 'cartid=' + cartid,
                            dataType: 'json',
                        success: function(json) {
                                    $("#totalprice").html(json.totalprice); 
                                    $("#subtotal").html(json.totalprice);
                                    $("#gtotal").html(json.totalprice);
                                    toataamount = json.gtotalprice;
                                    $("#qtytotal_"+cartid).val(json.qyt);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                            }
                        });     
                    }
    });


             $(".quntitisdata").change(function(){
                var totalqty = $(this).data('total');
                var proid = $(this).data('prodectid');
                var qty = $(this).val();
                if(totalqty >= qty){
                    $('#plusdata-'+proid).prop( "disabled", false );
                    $("#error-"+proid).remove();
                  
                }else{
                    $('#plusdata-'+proid).prop( "disabled", true );
                     $("#error-"+proid).remove();
                    $("#qty-"+proid).after('<span id="error-'+proid+'" class="error">'+totalqty+ ' products available.</span>');
                    
                    return false;
                }
            });
        </script>
        <!-- plus minus ends -->

       



        <!-- REMOVE ITEMS -->
        <script type="text/javascript">
            document.querySelectorAll("#del-button").forEach((button) =>
                button.addEventListener("click", (e) => {
                    if (!button.classList.contains("delete")) {
                        button.classList.add("delete");

                        setTimeout(() => button.classList.remove("delete"), 2200);
                    }
                    e.preventDefault();
                })
            );
        </script>
        <!-- remove items ends -->


        <!-- heart icon -->
        <script type="text/javascript">
            // Favorite Button - Heart
            $('.favme').click(function() {
                $(this).toggleClass('active');
            });

            /* when a user clicks, toggle the 'is-animating' class */
            $(".favme").on('click touchstart', function(){
              $(this).toggleClass('is_animating');
            });

            /*when the animation is over, remove the class*/
            $(".favme").on('animationend', function(){
              $(this).toggleClass('is_animating');
            });
        </script>
        <!-- heart icon ends -->
@extends('frontview.layouts.footer')
@endsection