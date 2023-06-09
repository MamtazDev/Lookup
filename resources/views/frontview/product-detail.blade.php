@inject('mylibrary', 'App\Helpers\MyLibrary')
@extends('frontview.layouts.app')
@extends('frontview.layouts.header')


@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>


    <script>
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
    <div id="product-page" class="container">
      <ul class="breadcrumb">
        <li><a href="{{url('/homepage')}}">home</a></li>
        @if(isset($ProductCategoryData) && !empty($ProductCategoryData))
        <li><a href="{{url('/product-cat/'.$ProductCategoryData['slug'])}}">{{$ProductCategoryData['name']}}</a></li>
        @endif
        <li><a href="javascript:void(0)">{{ $products['title'] }}</a></li>
      </ul>

      <div class="row">
        <div id="content" class="col-sm-12">
          <h2 class="page_title">{{ $products['title'] }}</h2>
          <div class="pro-deatil">
            <div class="row">
              <div class="col-sm-6 product-img">
                <div class="thumbnails">
                  <div class="product-additional">
                    <div class="pro-image">
                      @if($products['featuredimage'])
                        @if($products['artistid'] == '0')
                          <a href="{{url('https://lakouphoto.ca/public/image/products/'.$products['featuredimage'])}}" title="{{ $products['title'] }}" class="thumbnail">
                          <img src="{{url('https://lakouphoto.ca/public/image/products/'.$products['featuredimage'])}}" title="{{ $products['title'] }}" id="zoom" alt="Impasto" data-zoom-image="{{url('https://lakouphoto.ca/public/image/products/'.$products['featuredimage'])}}"/>
                        @else
                          <a href="{{url('https://lakouphoto.ca/Artist/public/image/products/'.$products['featuredimage'])}}" title="{{ $products['title'] }}" class="thumbnail">
                          <img src="{{url('https://lakouphoto.ca/Artist/public/image/products/'.$products['featuredimage'])}}" title="{{ $products['title'] }}" id="zoom" alt="Impasto" data-zoom-image="{{url('https://lakouphoto.ca/Artist/public/image/products/'.$products['featuredimage'])}}" />
                        @endif
                      </a>
                      @else
                      <a href="https://lakouphoto.ca/public/image/artist/default-artist.svg" title="{{ $products['title'] }}" class="thumbnail">
                        <img src="https://lakouphoto.ca/public/image/artist/default-artist.svg" title="{{ $products['title'] }}" id="zoom" alt="Impasto" data-zoom-image="https://lakouphoto.ca/public/image/artist/default-artist.svg" />
                      </a>
                      @endif
                    </div>

                  @if(isset($_COOKIE['selectedSize']) && !empty($_COOKIE['selectedSize']))
                    @php
                     $images = $mylibrary->SizeSelectedImage();
                    $imagesArr = explode("|",$images->mediaurl)
                    @endphp

              @endif

            


                    @if(isset($prodectimages) && !empty($prodectimages))
                    <div id="additional-carousel" class="owl-carousel product-carousel owl-theme clearfix">
                      @php $imagesArr = explode("|",$prodectimages->mediaurl)@endphp
                      <div class="image-additional item">
                        @if($products['artistid'] == '0')
                          <a href="{{url('https://lakouphoto.ca/public/image/products/'.$products['featuredimage'])}}" title="{{ $products['title'] }}" class="elevatezoom-gallery" data-image="{{url('https://lakouphoto.ca/public/image/products/'.$products['featuredimage'])}}" data-zoom-image="{{url('https://lakouphoto.ca/public/image/products/'.$products['featuredimage'])}}" >
                            <img src="{{url('https://lakouphoto.ca/public/image/products/'.$products['featuredimage'])}}" title="{{ $products['title'] }}" alt="{{ $products['title'] }}" width="80" height="100" class="img-width" />
                          </a>
                        @else
                          <a href="{{url('https://lakouphoto.ca/Artist/public/image/products/'.$products['featuredimage'])}}" title="{{ $products['title'] }}" class="elevatezoom-gallery" data-image="{{url('https://lakouphoto.ca/Artist/public/image/products/'.$products['featuredimage'])}}" data-zoom-image="{{url('https://lakouphoto.ca/Artist/public/image/products/'.$products['featuredimage'])}}" >
                            <img src="{{url('https://lakouphoto.ca/Artist/public/image/products/'.$products['featuredimage'])}}" title="{{ $products['title'] }}" alt="{{ $products['title'] }}" width="80" height="100" class="img-width" />
                          </a>
                        @endif
                      </div>
                      {{-- sub gallary --}}
                     @foreach($imagesArr as $image)
                        <div class="image-additional">
                          @if($products['artistid'] == '0')
                            <a href="{{asset($image)}}" title="{{ $products['title'] }}" class="elevatezoom-gallery" data-image="{{asset($image)}}" data-zoom-image="{{asset($image)}}">
                              <img src="{{asset($image)}}" title="{{ $products['title'] }}" alt="{{ $products['title'] }}" width="80" height="100" class="img-width" />
                            </a>
                          @else
                            <a href="{{asset($image)}}" title="{{ $products['title'] }}" class="elevatezoom-gallery" data-image="{{asset($image)}}" data-zoom-image="{{asset($image)}}">
                              <img src="{{asset($image)}}" title="{{ $products['title'] }}" alt="{{ $products['title'] }}" width="80" height="100" class="img-width" />
                            </a>
                          @endif
                        </div> 
                      @endforeach
                    </div>
                    @else
                    <div id="additional-carousel" class="owl-carousel product-carousel owl-theme clearfix">
                      <div class="image-additional item">
                        @if($products['artistid'] == '0')
                          <a href="{{url('https://lakouphoto.ca/public/image/products/'.$products['featuredimage'])}}" title="{{ $products['title'] }}" class="elevatezoom-gallery" data-image="{{url('https://lakouphoto.ca/public/image/products/'.$products['featuredimage'])}}" data-zoom-image="{{url('https://lakouphoto.ca/public/image/products/'.$products['featuredimage'])}}" >
                            <img src="{{url('https://lakouphoto.ca/public/image/products/'.$products['featuredimage'])}}" title="{{ $products['title'] }}" alt="{{ $products['title'] }}" width="80" height="100" class="img-width" />
                          </a>
                        @else
                          <a href="{{url('https://lakouphoto.ca/Artist/public/image/products/'.$products['featuredimage'])}}" title="{{ $products['title'] }}" class="elevatezoom-gallery" data-image="{{url('https://lakouphoto.ca/Artist/public/image/products/'.$products['featuredimage'])}}" data-zoom-image="{{url('https://lakouphoto.ca/Artist/public/image/products/'.$products['featuredimage'])}}">
                            <img src="{{url('https://lakouphoto.ca/Artist/public/image/products/'.$products['featuredimage'])}}" title="{{ $products['title'] }}" alt="{{ $products['title'] }}" width="80" height="100" class="img-width" />
                          </a>
                        @endif
                      </div>
                    </div>
                    @endif
                  </div>
                </div>
              </div>
              @php
                  function cmToIn($cm){
                      $in = $cm/2.54;
                        return round($in,2);
                    }
              @endphp   
              <div class="col-sm-6 right_info">
                <div class="right-info-inner">
                  <h1 class="">{{ $products['title'] }}</h1>
                  @isset($products->artists)
                  <div ><a href="{{  url('/artist-details/'.$products->artists->slug)  }}" style="margin-right:5px;display:inline-block; text-decoration:underline;font-weight:bold;font-size:18px" >{{ $products->artists->firstname ?? "" }} {{ $products->artists->lastname ?? ""}},</a> 
                    <span>{{ $country['countryname'] }},{{$products->artists->created_at->format('Y')  }}</span>
                  </div>
                  @endisset
                  <p style="margin-top:8px" > {{$products['shortdescription'] }} <span>{{cmToIn($products['width'])  }} </span>X<span> {{ cmToIn($products['height']) }}in</span></p> 
                  
                  <div class="rating">
                    <div class="product-rating">
                      @php $star1 = '-o'; @endphp
                      @if($RatingData >= 1)
                      @php $star1 = ''; @endphp 
                      @endif
                      <span class="fa fa-stack"><i class="fa fa-star{{$star1}} fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                      @php $star2 = '-o'; @endphp
                      @if($RatingData >= 2)
                      @php $star2 = ''; @endphp 
                      @endif
                      <span class="fa fa-stack"><i class="fa fa-star{{$star2}} fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                      @php $star3 = '-o'; @endphp
                      @if($RatingData >= 3)
                      @php $star3 = ''; @endphp 
                      @endif
                      <span class="fa fa-stack"><i class="fa fa-star{{$star3}} fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                      @php $star4 = '-o'; @endphp
                      @if($RatingData >= 4)
                      @php $star4 = ''; @endphp 
                      @endif
                      <span class="fa fa-stack"><i class="fa fa-star{{$star4}} fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                      @php $star5 = '-o'; @endphp
                      @if($RatingData >= 5)
                      @php $star5 = ''; @endphp 
                      @endif
                      <span class="fa fa-stack"><i class="fa fa-star{{$star5}} fa-stack-1x"></i><i class="fa fa-star{{$star5}} fa-stack-1x"></i></span>
                    </div>
                    <a href="#" class="reviews" onclick="$('a[href=\'#tab-review\']').trigger('click'); $('body,html').animate({scrollTop: $('.nav-tabs').offset().top}, 800); return false;">{{$ReviewCount}} reviews</a>
                    <a href="#" class="write-review" onclick="$('a[href=\'#tab-review\']').trigger('click'); $('body,html').animate({scrollTop: $('.nav-tabs').offset().top}, 800); return false;">
                      <i class="fa fa-pencil" aria-hidden="true"></i>Write a review
                    </a>
                  </div>

                        
                  <hr />
                  <ul class="list-unstyled">
                    <li><span class="disc">Brand:</span> {{--{{$productsbrands->name}}--}}</li>
                     <!--<li><span class="disc">Product Code:</span><span class="disc1"> Product 5</span></li>--> 
                    <li><span class="disc">Availability:</span><span class="disc1"> {{$products['availability']}}</span></li>
                  </ul>
                  <hr />
                  @php
           

                   if(isset($_COOKIE['selectCurrancy']) && !empty($_COOKIE['selectCurrancy'])){
                    $currencyCode = $_COOKIE['selectCurrancy'];
                  }else{
                    $currencyCode = 'USD';
                  }
                 @endphp
                  <ul class="list-unstyled">
                    <li>
                      @if(isset($products['saleprice']) && !empty($products['saleprice']) && $products['saleprice'] > 0)
                      <span class="pro_price">{{ $mylibrary->currencyconverterallpriceChange($products['saleprice']) }}</span><span class="pro_oldprice" style="text-decoration: line-through;">{{ $mylibrary->currencyconverterallprice($products['price']) }}</span>
                      @else
                      {{-- <span class="pro_price sign">{{ $mylibrary->currencyconverterallprice($products['price']) }}</span> --}}
                      <span class="pro_price sign">{{$mylibrary->currencyconverterallpriceChange($products['price'])}}</span>
                        <!-- Currrency -->
                        <!-- {{ substr($mylibrary->currencyconverterallpriceChange($products['price']),0,3) }} -->
                         <form style="margin-top: -20px;">
                      
              <select class="currency" style="margin-left: 150px;">
                  @foreach ($currencies as $currency)
                  <option value="{{ $currency['Currency_code'] }}" {{ $currencyCode === $currency['Currency_code'] ? "selected": "" }}>
                    {{ $currency['Currency_code'] }}
                  </option>
                  @endforeach
              </select>
              {{-- cmToIn --}}
              @php
                  if(isset($_COOKIE['selectedSize']) && !empty($_COOKIE['selectedSize'])){
                   $selectedSize = $_COOKIE['selectedSize'];
                  }
              @endphp
              <select class="product_sizes" name="product_sizes" >
                @foreach ($productSizes as $size)
                @php
                $array = array($size['width'], $size['height'],$size['productid']);
                $sizes = implode(",", $array);
                @endphp
                <option {{ $sizes === $selectedSize ? "selected" : "" }} value="{{ $sizes }}"> {{ cmToIn($size['width'])}}x{{cmToIn($size['height'] ) }} in</option>                    
                @endforeach
              </select>
    </form>
                              <!-- <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="color: white;">Currency
                              <span class="caret"></span></button>
                                                                        <ul class="dropdown-menu list-unstyled" >
                                                                        <li class="active">
                                                                            <button class="currency-select btn btn-link btn-block" type="button" onclick="changeCurrancy('EUR');" name="EUR">€ Euro</button>
                                                                        </li>
                                                                        <li class=""> 
                                                                            <a class="currency-select btn btn-link btn-block" type="button" onclick="changeCurrancy('GBP');" name="GBP">£ Pound Sterling</a>
                                                                        </li>
                                                                        <li class="">
                                                                            <button class="currency-select btn btn-link btn-block" type="button" onclick="changeCurrancy('USD');" name="USD">$ US Dollar</button>
                                                                        </li>
                                                                        <li class="">
                                                                            <button class="currency-select btn btn-link btn-block" type="button" onclick="changeCurrancy('CAD');" name="CAD">$ Canadian Dollars</button>
                                                                        </li>
                                                                        <li class="">
                                                                            <button class="currency-select btn btn-link btn-block" type="button" onclick="changeCurrancy('INR');" name="INR">₹ INR </button>
                                                                        </li>
                                                                  </ul>
                                                                </div> -->
                                                    

                      <!-- <span class="pro_price">
                        <select>
                          <option value="USD">USD</option>
                          <option value="INR">INR</option>
                          <option value="CAD">CAD</option>

                      </select> &nbsp;{{ ltrim($mylibrary->currencyconverterallprice($products['price']),'$' ) }}</span> -->
                      @endif
                    </li>
                    <!-- <li class="tax">Ex Tax: $90.00</li> -->
                  </ul>
                  <hr />

                  <!-- frames section -->
                  @if(isset($productsFrames) && !empty($productsFrames) && count($productsFrames) > 0)
                  <input type="hidden" name="frameid" id="frameid" value="">
                  <div class="farme-container">
                        <p>Select Frames</p>
                     <div class="grid-scroll">     
                      <div class="gridss">
                        <div class="boxz">

                          @if(isset($products['saleprice']) && !empty($products['saleprice']) && $products['saleprice'] > 0)
                            @php $Framesprice = $mylibrary->currencyconverterallprice($products['saleprice']); @endphp
                          @else
                           @php $Framesprice = $mylibrary->currencyconverterallprice($products['price']); @endphp
                          @endif
                            <a href="javascript:void(0)" onclick="selectFrames('', '{{$Framesprice}}')">
                              <img src="{{url('/public/assets/images/lakouphoto.svg')}}" class="chover shadow-6">
                              <p>No Frame</p>
                            </a>
                        </div>
                        @foreach($productsFrames as $FramesArr)
                        @if(isset($FramesArr['frame']) && !empty($FramesArr['frame']))
                          <div class="boxz">
                            @php 
                            $frameid = $FramesArr['frame']->id; 
                            $Framesprice = $mylibrary->currencyconverterallprice($FramesArr->frameprice);
                            @endphp
                            <a href="javascript:void(0)" onclick="selectFrames('{{$FramesArr->id}}', '{{$Framesprice}}')">
                              <img src="{{url('/public/image/frames/'.$FramesArr['frame']->image)}}" class="chover shadow-6" id="frame_{{$frameid}}">
                              <p>{{$FramesArr['frame']->name}}</p>
                            </a>
                          </div>
                        @endif
                        @endforeach
                      </div>
                    </div>
                  </div>
                  @endif
                  <!-- <hr /> -->
                  <!-- frames section -->
                  <div id="product" class="product-options">
                    @if(isset($products['availability']) && $products['availability'] && $products['availability'] == 'In stock')
                    <div class="form-group">
                      <div class="product-btn-quantity">
                        <label class="control-label qty" for="input-quantity">Qty</label>
                        <div class="minus-plus">
                          <button class="minus"><i class="fa fa-minus"></i></button>
                          <input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />
                          <button class="plus"><i class="fa fa-plus"></i></button>
                        </div>
                        @if(isset($Front_user_id) && !empty($Front_user_id))
                        
                         <button type="button" data-loading-text="Loading..." class="btn btn-primary btn-lg btn-block" onclick="detilesaddcart({{ $products['id']}})">+ Add to Cart</button>
                        @else
                          <a href="{{ url('/userlogin') }}" class="btn btn-primary btn-lg btn-block" title="Add to Cart">+ Add to Cart</a>
                        @endif
                        
                        
                      </div>
                    </div>
                    @endif
                    <div class="btn-group">
                     <?php
                        $activeClass = "";
                        $pid = $products['id'];
                        if (isset($Front_user_id) && !empty($Front_user_id)) {
                          if (in_array($pid, $Userwishlist)) {
                            $activeClass = 'active';
                            $RemoveClass = 'remove_heart';
                            $title = "Remove From WishList";
                          } else {
                            $activeClass = '';
                            $RemoveClass = 'addfavorites';
                            $title = 'Add To WishList';
                          }
                        } else {
                            $activeClass = '';
                            $RemoveClass = 'addfavorites';
                            $title = 'Add To WishList';
                        }
                      ?>
                      <button type="button" class="pro_wish pid_{{ $pid }} {{ $RemoveClass }}" data-pid="{{$pid}}" title="{{$title}}"><i class="fa fa-heart act_{{$pid}} {{ $activeClass }}" id="heart"></i><span id="productdwish">{{$title}}</span></button>

                      <!-- <button type="button" class="pro_comper" title="Add To Compare" onclick="compare.add('32');"><i class="icon-change"></i>Add To Compare</button> -->
                    </div>
                  </div>
                  <hr />
                  <!-- AddThis Button BEGIN -->
                  <div class="addthis_toolbox addthis_default_style" data-url="indexa17e.html?route=product/product&amp;product_id=32">
                    <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                    <a class="addthis_button_tweet"></a>
                    <a class="addthis_button_pinterest_pinit"></a>
                    <a class="addthis_counter addthis_pill_style"></a>
                  </div>
                  <!-- <script type="text/javascript" src="../../../s7.addthis.com/js/300/addthis_widget.js#pubid=ra-515eeaf54693130e"></script> -->
                  <!-- AddThis Button END -->
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="row propage-tab">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
                <li><a href="#tab-review" data-toggle="tab">Reviews ({{$ReviewCount}})</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab-description">
                    <h3 style="margin-bottom:20px">About the creation </h3>
                  <p>
                    {{ $products['longdescription'] }}
                  </p>
                  <h2  style="margin-bottom:25px">Specification Details </h2>
                    <ul>

                      @isset($products['shortdescription'])
                      <li style="display:flex;gap:100px;align-items:center;border-bottom:1px solid #eeeeee36;margin-bottom:20px "><p>Printing</p> <p> {{ $products['shortdescription'] }}</p>
                      </li>
                      @endisset               
                      <li style="display:flex;gap:100px;align-items:center;border-bottom:1px solid #eeeeee36 ;margin-bottom:20px"><p>Framing</p> <p> 
                        Framing on request</p>
                      </li>
                      <li style="display:flex;gap:100px;align-items:center;border-bottom:1px solid #eeeeee36;margin-bottom:20px "><p>Dimensions</p> <p> {{ cmToIn($products['width']) }}X{{ cmToIn($products['height']) }}in</p>
                      </li>
                    </ul>
                </div>

                <div class="tab-pane starsss" id="tab-review">
                    
                    {!! Form::open(['method' => 'post', 'id'=>'form-review', 'class'=>'form-horizontal']) !!} 
                    <div class="alert alert-success hide" role="alert" id="sussess-msg">
                      Your review successfully add in our records. Thank you.
                    </div>
                    <input type="hidden" name="prodectid" value="{{ $products['id']}}">
                    <div id="review"></div>
                    <h2>Write a review</h2>
                    <div class="form-group required">
                      <div class="col-sm-2">
                        <label class="control-label" for="input-name">Your Name</label>
                      </div>
                      <div class="col-sm-10">
                        {!! Form::text('name', old('name'), array('class'=>'form-control', 'id'=>'name', 'name'=>'name', 'maxlength'=>'60', 'onpaste'=>'return false;', 'ondrop'=>'return false;')) !!}
                        @if ($errors->has('name'))
                            <span class="error">{{ $errors->first('name') }}</span>
                        @endif
                        <?php /*<input type="text" name="name" value="" id="name" class="form-control" /> */?>
                      </div>
                    </div>
                    <div class="form-group required"> 
                      <div class="col-sm-2">
                        <label class="control-label" for="input-review">Your Review</label>
                      </div>
                      <div class="col-sm-10">
                        {!! Form::textarea('review', old('review'), array('class'=>'form-control', 'id'=>'review', 'name'=>'review', 'rows'=>'3', 'onpaste'=>'return false;', 'ondrop'=>'return false;')) !!}
                        @if ($errors->has('review'))
                          <span class="error">{{ $errors->first('review') }}</span>
                        @endif
                        <?php /* <textarea name="review" rows="5" id="review" class="form-control"></textarea> */?>
                       <!--  <div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div> -->
                      </div>
                    </div>
                    <div class="form-group required">
                      <div class="col-sm-2">
                        <label class="control-label">Rating</label>
                      </div>
                      <div class="col-sm-5 rating-center">
                        
                          <div class="rating">
                              <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
                              <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                              <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
                              <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                              <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
                          </div>
                       
                        <div class="col-sm-5"></div>
                      </div>
                    </div>

                    <div class="buttons clearfix">
                      <div class="pull-right">
                        <button type="submit" id="button-review" data-loading-text="Loading..." class="btn btn-primary">Continue</button>
                      </div>
                    </div>
                  {!!Form::close()!!}
                </div>
              </div>
            </div>
          </div>

                  {{-- Frames --}}
        @if(isset($products->Frames) && !empty($products->Frames))
        <div class="related-products-block frames">
          <div class="box-content box">
            <div class="page-title"><h3>Discover the creation in interiors
            </h3></div>
            <div class="block_box row">
              <div class="box-product frame-carousel owl-carousel clearfix" data-items="4">
              @foreach($products->Frames as $frame)
                <div class="product-layout col-xs-12 item">
                  <div class="product-thumb">
                    <div class="image">
                      <a class="image-popup" href="{{asset('image/frames/'.$frame['image'])}}">
                          <img src="{{ asset('image/frames/'.$frame['image']) }}" alt="{{$frame['name'] }}" title="{{ $frame['name'] }}" class="img-responsive" />
                      </a>
                    </div>
                  </div>
                </div>
              @endforeach
              </div>
            </div>
          </div>
        </div>
        @endif
        {{-- Frame --}}

          {{-- About Creator --}}
          <div class="about-the-creator-section mt-5">
            <div class="row">
              <div class="col-md-3">
                <h2>About the Creator</h2>
                <div class="creatorWrapper">
                  @isset($products->artists)
                  <a href="{{  url('/artist-details/'.$products->artists->slug) }}">
                    <img src="{{ url('image/profile/'.$products->artists->profileimage)}}" height="100" alt="creator">
                    <div class="creator_info">
                        <h3>{{  $products->artists->firstname ?? "" }} {{ $products->artists->lastname ?? ""}}</h3>
                        <p>{{ $country['countryname']  }}</p>
                    </div>
                  </a> 
                  @endisset
                </div>
                <div  class="creator-credentials">
                  <h3>Credentials</h3>
                  <ul>
                    <li>International Exposure  </li>
                    <li>Experienced Artist     </li>
                    <li>Works on commission  </li>
                </ul>
                </div>
              </div>
              <div class="col-md-5">
                  @isset($products->artists)
                  <p style="padding-top:20%"> {{ $products->artists->bio }}</p>
                  <a style="font-weight: bold;margin-top:30px" href="{{  url('/artist-details/'.$products->artists->slug) }}"> Go to {{  $products->artists->firstname ?? "" }} {{ $products->artists->lastname ?? ""}} Page </a>
                  @endisset
                  
            </div>
            @isset($products->artists)
            <div class="col-md-4">
              <img src="{{ url('image/artist/'.$products->artists->media)}}"  width="100%" alt="">
            </div>
            @endisset
          </div>
          {{-- About Creator --}}
          @if(isset($relatedProducts) && !empty($relatedProducts))
          <div class="related-products-block">
            <div class="box-content box">
              @isset($products->artists)
              <div class="page-title"><h3>Other Artworks by <a href="{{  url('/artist-details/'.$products->artists->slug) }}">
                {{  $products->artists->firstname ?? "" }} {{ $products->artists->lastname ?? ""}}
              </a>  </h3></div>
               @else
               <div class="page-title"><h3>Related Products </h3></div>
              @endisset
              
              <div class="block_box row">
                <div id="related-carousel" class="box-product product-carousel owl-carousel clearfix" data-items="4">
                @foreach($relatedProducts as $related)
                @php                   
                  $prodecturl = url('product-detail/'.$related->slug);
                @endphp 
                  <div class="product-layout col-xs-12 item">
                    <div class="product-thumb">
                      <div class="image">
                        <a href="{{$prodecturl}}">
                          @if($related->artistid == '0')
                            <img src="{{ url('https://lakouphoto.ca/public/image/products/'.$related->featuredimage) }}" alt="{{ $related->title }}" title="{{ $related->title }}" class="img-responsive" onerror="this.onerror=null;this.src='https://lakouphoto.ca/public/assets/images/lakouphoto.svg';"/>
                          @else
                            <img src="{{ url('https://lakouphoto.ca/Artist/public/image/products/'.$related->featuredimage) }}" alt="{{ $related->title }}" title="{{ $related->title }}" class="img-responsive" onerror="this.onerror=null;this.src='https://lakouphoto.ca/public/assets/images/lakouphoto.svg';"/>
                          @endif
                          @if(isset($related['images']) && !empty($related['images']))
                          @php $imageArr = explode('|',$related['images']->mediaurl);@endphp
                            @if($related->artistid == '0')
                              <img class="img-responsive hover-img" src="{{ url('https://lakouphoto.ca/'.$imageArr[0]) }}" title="{{ $related->title }}" alt="{{ $related->title }}"onerror="this.onerror=null;this.src='https://lakouphoto.ca/public/assets/images/lakouphoto.svg';" />
                            @else
                              <img class="img-responsive hover-img" src="{{ url('https://lakouphoto.ca/Artist/'.$imageArr[0]) }}" title="{{ $related->title }}" alt="{{ $related->title }}"onerror="this.onerror=null;this.src='https://lakouphoto.ca/public/assets/images/lakouphoto.svg';" />
                            @endif
                          @else
                                <img class="img-responsive hover-img" src="{{ url('https://lakouphoto.ca/public/image/products/'.$related->featuredimage) }}" title="{{ $related->title }}" alt="{{ $related->title }}"onerror="this.onerror=null;this.src='https://lakouphoto.ca/public/assets/images/lakouphoto.svg';" />
                          @endif
                        </a>
                        <div class="button-group">
                         <?php
                                                            
                                                                $activeClass = "";
                                                                $pid = $related->id;
                                                                if (isset($Front_user_id) && !empty($Front_user_id)) {
                                                                    

                                                                    if (in_array($pid, $Userwishlist)) {
                                                                        $activeClass = 'active';
                                                                        $RemoveClass = 'remove_heart';
                                                                        $title = "Remove From WishList";
                                                                    } else {
                                                                        $activeClass = '';
                                                                        $RemoveClass = 'addfavorites';
                                                                        $title = 'Add To WishList';
                                                                    }
                                                                } else {
                                                                    $activeClass = '';
                                                                    $RemoveClass = 'addfavorites';
                                                                    $title = 'Add To WishList';
                                                                }
                                                                ?>
                                                            
                         <button type="button" class="wishlist pid_{{ $pid }} {{ $activeClass }} {{ $RemoveClass }}" data-pid="{{$pid}}" data-toggle="tooltip" title="{{$title}}"><i class="fa fa-heart {{ $activeClass }} act_{{$pid}}" id="heart" ></i></button>
                           <button type="button"  data-toggle="tooltip" data-pid="{{$related->slug}}" class="quickview-button Click-here" title="Quickview"  >
                                                                <i class="icon-eye"></i>
                                                            </button>
                       
                          <!-- <button type="button" class="compare" data-toggle="tooltip" title="Add To Compare" onclick="compare.add('30');"><i class="icon-change"></i></button> -->
                        </div>
                      </div>
                      <div class="thumb-description">
                        <div class="caption">
                          <div class="rate-pri">
                          <h4 class="product-title"><a href="{{$prodecturl}}">{{$related->title}}</a></h4>
                             <div class="rating clearfix">
                                                              @php 
                                                              $star1 = '';
                                                               $RatingData = $mylibrary->getprodectreview($related->id) @endphp
                                                               @if($RatingData >= 1)
                                                                @php $star1 = '<i class="fa fa-star fa-stack-2x"></i>'; @endphp 
                                                               @endif
                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i>{!!$star1!!}</span>
                                                                @php $star2 = ''; @endphp
                                                                  @if($RatingData >= 2)
                                                                  @php $star2 = '<i class="fa fa-star fa-stack-2x"></i>'; @endphp 
                                                                  @endif
                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i>{!!$star2!!}</span>
                                                                 @php $star3 = ''; @endphp
                                                                  @if($RatingData >= 3)
                                                                  @php $star3 = '<i class="fa fa-star fa-stack-2x"></i>'; @endphp 
                                                                  @endif
                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i>{!!$star3!!}</span>
                                                                 @php $star4 = ''; @endphp
                                                              @if($RatingData >= 4)
                                                              @php $star4 = '<i class="fa fa-star fa-stack-2x"></i>'; @endphp 
                                                              @endif
                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i>{!!$star4!!}</span>
                                                                @php $star5 = ''; @endphp
                                                                  @if($RatingData >= 5)
                                                                  @php $star5 = '<i class="fa fa-star fa-stack-2x"></i>'; @endphp 
                                                                  @endif

                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i>{!!$star5!!}</span>
                                                              </div>
                          </div>
                          <p class="price">
                            @if(isset($related->saleprice) &&!empty($related->saleprice) && $related->saleprice != '0.00')
                            <span class="price-new">{{ $mylibrary->currencyconverterallprice($related->saleprice) }}</span><span class="price-old">{{ $mylibrary->currencyconverterallprice($related->price) }}</span>
                            @else
                            <span class="price-new">{{ $mylibrary->currencyconverterallprice($related->price) }}</span>
                            @endif

                            <span class="price-tax">Ex Tax: $80.00</span>
                          </p>

                                                                            

                          @if(isset($related->availability) && $related->availability == 'In stock')
                                                            @if(isset($Front_user_id) && !empty($Front_user_id))
                                                            <button type="button" class="addcart" title="Add to Cart" onclick="addcart({{ $related->id}})">+ Add to Cart</button>
                                                            @else
                                                            <a href="{{ url('/userlogin') }}" class="addcart" title="Add to Cart">+ Add to Cart</a>
                                                            @endif
                                                            @endif
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
                </div>
              </div>
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
    <div class="custom-model-main">
    <div class="custom-model-inner">        
    <div class="close-btn">×</div>
        <div class="custom-model-wrap">
           <div class="quickview-wrapper-inner container">
                <div class="quickview-container">
                    <div class="row pro-deatil">
                       <div class="col-sm-5 product-img">
                <div class="thumbnails">
                  <div class="product-additional">
                    
                    <div class="pro-image">
                      <a href="https://lakouphoto.ca/public/image/artist/default-artist.svg" title="Acrylic Painting" class="thumbnail pro-featuredimage">
                        <img
                          src="/lakouphoto-design/images/products/2-710x888.jpg"
                          title="Acrylic Painting"
                          id="zoom" class="pro-featuredimage"
                          alt="Acrylic Painting"
                          data-zoom-image="https://lakouphoto.ca/public/image/artist/default-artist.svg"
                        />
                      </a>
                    </div>

                    <div id="additional-carousel" class="owl-carousel owl-theme clearfix">
                      <!-- <div class="image-additional quick-img quick-img">
                        <a
                          href="https://lakouphoto.ca/public/image/artist/default-artist.svg"
                          title="Acrylic Painting"
                          class="elevatezoom-gallery"
                          data-image="https://lakouphoto.ca/public/image/artist/default-artist.svg"
                          data-zoom-image="https://lakouphoto.ca/public/image/artist/default-artist.svg"
                        >
                          <img src="https://lakouphoto.ca/public/image/artist/default-artist.svg" title="Acrylic Painting" alt="Acrylic Painting" width="80" height="100" />
                        </a>
                      </div>
                      <div class="image-additional quick-img">
                        <a
                          href="https://lakouphoto.ca/public/image/artist/default-artist.svg"
                          title="Acrylic Painting"
                          class="elevatezoom-gallery"
                          data-image="https://lakouphoto.ca/public/image/artist/default-artist.svg"
                          data-zoom-image="https://lakouphoto.ca/public/image/artist/default-artist.svg"
                        >
                          <img src="https://lakouphoto.ca/public/image/artist/default-artist.svg" title="Acrylic Painting" alt="Acrylic Painting" width="80" height="100" />
                        </a>
                      </div>
                      <div class="image-additional quick-img">
                        <a
                          href="https://lakouphoto.ca/public/image/artist/default-artist.svg"
                          title="Acrylic Painting"
                          class="elevatezoom-gallery"
                          data-image="https://lakouphoto.ca/public/image/artist/default-artist.svg"
                          data-zoom-image="https://lakouphoto.ca/public/image/artist/default-artist.svg"
                        >
                          <img src="https://lakouphoto.ca/public/image/artist/default-artist.svg" title="Acrylic Painting" alt="Acrylic Painting" width="80" height="100" />
                        </a>
                      </div>
                      <div class="image-additional quick-img">
                        <a
                          href="https://lakouphoto.ca/public/image/artist/default-artist.svg"
                          title="Acrylic Painting"
                          class="elevatezoom-gallery"
                          data-image="https://lakouphoto.ca/public/image/artist/default-artist.svg"
                          data-zoom-image="https://lakouphoto.ca/public/image/artist/default-artist.svg"
                        >
                          <img src="https://lakouphoto.ca/public/image/artist/default-artist.svg" title="Acrylic Painting" alt="Acrylic Painting" width="80" height="100" />
                        </a>
                      </div>
                      <div class="image-additional quick-img">
                        <a
                          href="https://lakouphoto.ca/public/image/artist/default-artist.svg"
                          title="Acrylic Painting"
                          class="elevatezoom-gallery"
                          data-image="https://lakouphoto.ca/public/image/artist/default-artist.svg"
                          data-zoom-image="https://lakouphoto.ca/public/image/artist/default-artist.svg"
                        >
                          <img src="https://lakouphoto.ca/public/image/artist/default-artist.svg" title="Acrylic Painting" alt="Acrylic Painting" width="80" height="100" />
                        </a>
                      </div>
                      <div class="image-additional quick-img">
                        <a
                          href="https://lakouphoto.ca/public/image/artist/default-artist.svg"
                          title="Acrylic Painting"
                          class="elevatezoom-gallery"
                          data-image="https://lakouphoto.ca/public/image/artist/default-artist.svg"
                          data-zoom-image="https://lakouphoto.ca/public/image/artist/default-artist.svg"
                        >
                          <img src="https://lakouphoto.ca/public/image/artist/default-artist.svg" title="Acrylic Painting" alt="Acrylic Painting" width="80" height="100" />
                        </a>
                      </div>
                      <div class="image-additional quick-img">
                        <a
                          href="https://lakouphoto.ca/public/image/artist/default-artist.svg"
                          title="Acrylic Painting"
                          class="elevatezoom-gallery"
                          data-image="https://lakouphoto.ca/public/image/artist/default-artist.svg"
                          data-zoom-image="https://lakouphoto.ca/public/image/artist/default-artist.svg"
                        >
                          <img src="https://lakouphoto.ca/public/image/artist/default-artist.svg" title="Acrylic Painting" alt="Acrylic Painting" width="80" height="100" />
                        </a>
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
                        <div class="col-sm-7">
                            <div class="quick-product-right right_info">
                                
                               <h2 class="page_title"></h2>

                                <div class="rating">
                                    <div class="product-rating">
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                    </div>
                                    <a href="#" class="reviews">1 reviews</a>
                                </div>

                                <hr />
                                <ul class="list-unstyled">
                                    <li><span class="disc">Brand::</span> <a class="disc1" id="pro-brand">Apple</a></li>
                                    
                                    <li><span class="disc">Availability:</span><span class="disc1" id="pro-availability"> In Stock</span></li>
                                </ul>
                                <hr />
                                <ul class="list-unstyled">
                                    <li><span class="pro_price" id="pro-saleprice">$110.00</span><span class="pro_oldprice" style="text-decoration: line-through;"  id="pro-price">$122.00</span></li>
                                    
                                </ul>
                                <hr />
                                <div id="product" class="product-options">
                                    <div class="form-group">
                                        <div class="product-btn-quantity">
                                            <label class="control-label qty" for="input-quantity">Qty</label>
                                            <div class="minus-plus">
                                                <button class="minus"><i class="fa fa-minus"></i></button>
                                                <input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />
                                                <button class="plus"><i class="fa fa-plus"></i></button>
                                            </div>
                                            <button type="button" id="quick-cart" data-loading-text="Loading..." class="btn btn-primary btn-lg btn-block">Add to Cart</button>
                                            <input type="hidden" name="product_id" value="32" />
                                        </div>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="pro_wish addfavorites" title="Add To WishList" onclick="addWishlist('32');">
                                            <i class="fa fa-heart" id="heart" aria-hidden="true"></i>
                                        Add To WishList
                                    </button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>  
    </div>  
    <div class="bg-overlay"></div>
</div> 

    <script>
      <!--
      $('select[name=\'recurring_id\'], input[name="quantity"]').change(function(){
        $.ajax({
          url: 'index.php?route=product/product/getRecurringDescription',
          type: 'post',
          data: $('input[name=\'product_id\'], input[name=\'quantity\'], select[name=\'recurring_id\']'),
          dataType: 'json',
          beforeSend: function() {
            $('#recurring-description').html('');
          },
          success: function(json) {
            $('.alert-dismissible, .text-danger').remove();

            if (json['success']) {
              $('#recurring-description').html(json['success']);
            }
          }
        });
      });
      //-->
    </script>
    <script>
      <!--
      $('#button-cart').on('click', function() {
        $.ajax({
          url: 'index.php?route=checkout/cart/add',
          type: 'post',
          data: $('#product input[type=\'text\'], #product input[type=\'hidden\'], #product input[type=\'radio\']:checked, #product input[type=\'checkbox\']:checked, #product select, #product textarea'),
          dataType: 'json',
          beforeSend: function() {
            $('#button-cart').button('loading');
          },
          complete: function() {
            $('#button-cart').button('reset');
          },
          success: function(json) {
            $('.alert-dismissible, .text-danger').remove();
            $('.form-group').removeClass('has-error');

            if (json['error']) {
              if (json['error']['option']) {
                for (i in json['error']['option']) {
                  var element = $('#input-option' + i.replace('_', '-'));

                  if (element.parent().hasClass('input-group')) {
                    element.parent().after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
                  } else {
                    element.after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
                  }
                }
              }

              if (json['error']['recurring']) {
                $('select[name=\'recurring_id\']').after('<div class="text-danger">' + json['error']['recurring'] + '</div>');
              }

              // Highlight any found errors
              $('.text-danger').parent().addClass('has-error');
            }

            if (json['success']) {
              $('#content').parent().before('<div class="alert alert-success alert-dismissible">' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');

              $('#cart > button').html('<span id="cart-total">' + json['total'] + '</span>');

              $('html, body').animate({ scrollTop: 0 }, 'slow');

              $('#cart > ul').load('index1e1c.html?route=common/cart/info%20ul%20li');
            }
          },
          error: function(xhr, ajaxOptions, thrownError) {
              alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
          }
        });
      });
      //-->
    </script>
    <script>
      <!--
      // jQuery5('.date').datetimepicker({
      //   language: 'en-gb',
      //   pickTime: false
      // });

      // $('.datetime').datetimepicker({
      //   language: 'en-gb',
      //   pickDate: true,
      //   pickTime: true
      // });

      // $('.time').datetimepicker({
      //   language: 'en-gb',
      //   pickDate: false
      // });

      $('button[id^=\'button-upload\']').on('click', function() {
        var node = this;

        $('#form-upload').remove();

        $('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>');

        $('#form-upload input[name=\'file\']').trigger('click');

        if (typeof timer != 'undefined') {
            clearInterval(timer);
        }

        timer = setInterval(function() {
          if ($('#form-upload input[name=\'file\']').val() != '') {
            clearInterval(timer);

            $.ajax({
              url: 'index.php?route=tool/upload',
              type: 'post',
              dataType: 'json',
              data: new FormData($('#form-upload')[0]),
              cache: false,
              contentType: false,
              processData: false,
              beforeSend: function() {
                $(node).button('loading');
              },
              complete: function() {
                $(node).button('reset');
              },
              success: function(json) {
                $('.text-danger').remove();

                if (json['error']) {
                  $(node).parent().find('input').after('<div class="text-danger">' + json['error'] + '</div>');
                }

                if (json['success']) {
                  alert(json['success']);

                  $(node).parent().find('input').val(json['code']);
                }
              },
              error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
              }
            });
          }
        }, 500);
      });
      //-->
    </script>
    <script>
      <!--
      $('#review').delegate('.pagination a', 'click', function(e) {
          e.preventDefault();

          $('#review').fadeOut('slow');

          $('#review').load(this.href);

          $('#review').fadeIn('slow');
      });

      //$('#review').load('index3b04.html?route=product/product/review&amp;product_id=32');


      //-->
    </script>
 

    <!-- M-Custom script -->
  <script>
      <!--

        // Additional images
        const direction = $('html').attr('dir');

        $('#additional-carousel').each(function () {
          if ($(this).closest('#column-left').length == 0 && $(this).closest('#column-right').length == 0) {
            $(this).addClass('owl-carousel owl-theme');
            const items = $(this).data('items') || 4;
            const sliderOptions = {
              loop: false,
              nav: true,
              navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
              dots: false,
              items: items,
              mouseDrag: false,
                touchDrag: false,
                pullDrag: false,
                rewind: false,
                autoplay: true,
              responsiveRefreshRate: 200,
              responsive: {
                0: { items: 1 },
                300: { items: ((items - 2) > 1) ? (items - 2) : 1 },
                376: { items: ((items - 1) > 1) ? (items - 1) : 1 },
                481: { items: items },
                768: { items: ((items - 1) > 1) ? (items - 1) : 1 },
                1200: { items: items }
              }
            };
            if (direction == 'rtl') sliderOptions['rtl'] = true;
            $(this).owlCarousel(sliderOptions);
          }
        });

        $(document).ready(function() {
          if($(window).width() > 991) {
            $("#zoom").elevateZoom({
              zoomType: "inner",
              cursor: "crosshair",
              gallery:'additional-carousel',
              galleryActiveClass: 'active'
            });

            var image_index = 0;
            $(document).on('click', '.thumbnail', function () {
              $('.thumbnails').magnificPopup('open', image_index);
              return false;
            });

            $('#additional-carousel a').click(function() {
              var smallImage = $(this).attr('data-image');
              var largeImage = $(this).attr('data-zoom-image');
              var ez = $('#zoom').data('elevateZoom');
              $('.thumbnail').attr('href', largeImage);
              ez.swaptheimage(smallImage, largeImage);
              image_index = $(this).index('#additional-carousel a');
              return false;
            });
          } else {
            $(document).on('click', '.thumbnail', function () {
              $('.thumbnails').magnificPopup('open', 0);
              return false;
            });
          }
        });

        $(document).ready(function() {
          $('.thumbnails').magnificPopup({
            type:'image',
            delegate: 'a.elevatezoom-gallery', // Mahardhi Edit
            gallery: {
              enabled: true
            }
          });
        });

      //-->
    </script>
    <script type="text/javascript">
      $(".shadow-6").on('click', function(){
          $(this).addClass('active');
      });
    </script>

<script type="text/javascript">
  (function () {
  const heart = document.getElementById("heart");
  heart.addEventListener("click", function () {
    heart.classList.toggle("active");
  });
})();
</script>
<script type="text/javascript">
  $(document).ready(function() {
      $(".Click-here").on('click', function() {
          var id = $(this).data('pid');
          console.log('click')
          var APP_URL = $('meta[name="_base_url"]').attr('content');
          var url = APP_URL + "/quickview/" + id + "/view";
          console.log(url);
          $.get(url, function(data) {
              $(".custom-model-main").addClass('model-open');
              $('.pro-deatil').html(data.html);
          });
      });
  });
$(".close-btn, .bg-overlay").click(function(){
  $(".custom-model-main").removeClass('model-open');
});


</script>
<script type="text/javascript">


function selectFrames(id,price){
  $('.pro_price').html(price);
  $("#frameid").val(id);
}
</script>
<script type="text/javascript">
  $(".mfp-img").click(function(){
    console.log("ijds");
  $(this).addClass("enlarge");
});
</script>
<script>
$(document).ready(function(){
    $("select.currency").change(function(){
        var selectedCountry = $(this).children("option:selected").val();
        // alert("You have selected the country - " + selectedCountry);
        changeCurrancy(selectedCountry);
    });

    $("select.product_sizes").change(function(){
        var selectedSize = $(this).children("option:selected").val();
        // alert("You have selected the country - " + selectedCountry);
        // changeCurrancy(selectedCountry);
        // console.log('selectedSize',selectedSize)
        changeSizes(selectedSize)
    });

});

$('.image-popup').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });
</script>
@extends('frontview.layouts.footer')
@endsection

