@inject('mylibrary', 'App\Helpers\MyLibrary')
@extends('frontview.layouts.app')
@extends('frontview.layouts.header') 

<?php 
use App\Models\SeoModel;
$seo = SeoModel::get()->where('id',1)->first();
?>

<meta name="title" content="{{$seo->title ?? ''}}">
<meta name="description" content="{{$seo->description ?? ''}}">
<meta name="keywords" content="{{$seo->keywords ?? ''}}"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="author" content="{{$seo->author ?? ''}}">

@section('content')
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

        
        <div id="common-home">
            <div class="slideshow">
                <div class="container-inner">
                    <div class="swiper-viewport">
                        <div id="slideshow0" class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($bannerData as $banner)
                                
                                <div class="swiper-slide text-center Main-banner1 overlay-div">
                                    <a href="#"><img src="{{url('/image/banners/'.$banner->image) }}" alt="{{$banner->title}}" title="{{$banner->title}}" class="img-responsive" /></a>
                                    <div class="banner-text">
                                        @if(isset($banner->subtitle) && !empty($banner->subtitle))
                                   <p class="big-text">{{$banner->subtitle}}</p>
                                   @endif
                                   @if(isset($banner->title) && !empty($banner->title))
                                   <p>{{$banner->title}}</p>
                                   @endif
                                   
                                   @if(isset($banner->buttontext) && !empty($banner->buttontext))
                                   <button class="buy" onclick="window.location.href = '{{$banner->link}}';">
                                       {{$banner->buttontext}}
                                   </button>
                                   @endif
                               </div>
                                </div>
                                @endforeach
                               
                            </div>
                        </div>
                        <div class="swiper-pagination slideshow0"></div>
                        <div class="swiper-pager">
                            <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                            <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                <!--
                $('#slideshow0').swiper({
                    mode: 'horizontal',
                    slidesPerView: 1,
                    pagination: '.slideshow0',
                    paginationClickable: true,
                    nextButton: '.swiper-button-next',
                    prevButton: '.swiper-button-prev',
                    watchActiveIndex: true,
                    spaceBetween: 0,
                    autoplay: 5000,
                    autoplayDisableOnInteraction: true,
                    loop: true
                });
                -->
            </script>

            <div class="product-tab-block mt-80">
                <div class="container">
                    <div class="main-tab box">
                        <div class="product-tabs box-content clearfix">
                            <div class="page-title toggled"><h3>Trending Products</h3></div>
                                <div class="box-shadoww">
                                    <div id="tabs" class="mahardhi-tabs section">
                                        <ul class="nav nav-tabs">
                                            <li>
                                                <a href="#tab-featured" data-toggle="tab" class="selected"><span>Featured</span></a>
                                            </li>
                                            <li>
                                                <a href="#tab-latest" data-toggle="tab"><span>Latest</span></a>
                                            </li>
                                            <li>
                                                <a href="#tab-bestseller" data-toggle="tab"><span>Bestseller</span></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-content block_box">
                                        <div class="row">
                                            <div id="tab-featured" class="tab-pane">
                                                <div id="featuredTabCarousel" class="box-product product-carousel owl-carousel clearfix" data-items="4">
                                                
                                                    @if(isset($prodectsArr) && !empty($prodectsArr))
                                                    @foreach($prodectsArr as $prodects)
                                                    
                                                    <div class="product-layout col-xs-12 item">
                                                        <div class="product-thumb transition">
                                                            <div class="image">
                                                                <!-- <div class="sale-text"><span class="section-sale">-10%</span></div> -->
                                                                @php                   
                                                                
                                                                $prodecturl = url('product-detail/'.$prodects->slug);
                                                                @endphp 
                                                                <a href="{{$prodecturl}}">
                                                                    @if($prodects->featuredimage)
                                                                        @if ($prodects->artistid == "0")
                                                                            <img src="{{ url('https://lakouphoto.ca/public/image/products/'.$prodects->featuredimage) }}" alt="{{ $prodects->title }}" title="{{ $prodects->title }}" class="img-responsive" />
                                                                        @else
                                                                            <img src="{{ url('https://lakouphoto.ca/Artist/public/image/products/'.$prodects->featuredimage) }}" alt="{{ $prodects->title }}" title="{{ $prodects->title }}" class="img-responsive" />
                                                                        @endif
                                                                    @else
                                                                        <img src="https://lakouphoto.ca/public/image/artist/default-artist.svg" alt="{{ $prodects->title }}" title="{{ $prodects->title }}" class="img-responsive" />
                                                                    @endif
                                                                    @if(isset($prodects['images']) && !empty($prodects['images']))
                                                                    @php $imageArr = explode('|',$prodects['images']->mediaurl); 
                                                                    
                                                                    @endphp
                                                                        @if($prodects->artistid == "0")
                                                                            <img class="img-responsive hover-img" src="{{ url($imageArr[0]) }}" title="{{ $prodects->title }}" alt="{{ $prodects->title }}" />
                                                                        @else
                                                                            <img class="img-responsive hover-img" src="{{ url('Artist/'.$imageArr[0]) }}" title="{{ $prodects->title }}" alt="{{ $prodects->title }}" />
                                                                        @endif
                                                                    @else
                                                                        @if($prodects->featuredimage)
                                                                            @if($prodects->artistid == "0")
                                                                                <img class="img-responsive hover-img" src="{{ url('https://lakouphoto.ca/public/image/products/'.$prodects->featuredimage) }}" title="{{ $prodects->title }}" alt="{{ $prodects->title }}" />
                                                                            @else
                                                                                <img class="img-responsive hover-img" src="{{ url('https://lakouphoto.ca/Artist/public/image/products/'.$prodects->featuredimage) }}" title="{{ $prodects->title }}" alt="{{ $prodects->title }}" />
                                                                            @endif
                                                                        @else
                                                                        <img class="img-responsive hover-img" src="https://lakouphoto.ca/public/image/artist/default-artist.svg" title="{{ $prodects->title }}" alt="{{ $prodects->title }}" />
                                                                        @endif
                                                                    @endif
                                                                </a>

                                                                <div class="button-group">
                                                                    <?php
                                                                    
                                                                        $activeClass = "";
                                                                        $pid = $prodects->id;
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
                                                                    
                                                                    <button type="button" class="wishlist pid_{{ $pid }} {{ $activeClass }} {{ $RemoveClass }}" data-pid="{{$pid}}" data-toggle="tooltip" title="{{$title}}"><i class="fa fa-heart {{ $activeClass }} act_{{ $pid }}" id="heart" ></i></button>

                                                                    <button type="button"  data-toggle="tooltip" data-pid="{{$prodects->slug}}" class="quickview-button Click-here" title="Quickview"  >
                                                                        <i class="icon-eye"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="thumb-description">
                                                                <div class="caption">
                                                                    <div class="rate-pri">
                                                                        <h4 class="product-title"><a href="{{$prodecturl}}">{{ $prodects->title }}</a></h4>
                                                                        <div class="rating clearfix">
                                                                      @php 
                                                                      $star1 = '';
                                                                       $RatingData = $mylibrary->getprodectreview($prodects->id) @endphp
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
                                                                        @if(isset($prodects->saleprice) && !empty($prodects->saleprice) && $prodects->saleprice > 0)
                                                                        <span class="price-new">{{ $mylibrary->currencyconverterallprice($prodects->saleprice) }}</span><span class="price-old">{{ $mylibrary->currencyconverterallprice($prodects->price) }}</span>
                                                                        @else
                                                                        <span class="price-new">{{ $mylibrary->currencyconverterallprice($prodects->price) }}</span>
                                                                        @endif
                                                                  

                                                                        <span class="price-tax">Without tax: $90.00</span>
                                                                    </p>

                                                                    
                                                                    @if(isset($prodects->availability) && $prodects->availability == 'In stock')
                                                                    @if(isset($Front_user_id) && !empty($Front_user_id))
                                                                    <button type="button" class="addcart" title="Add to Cart" onclick="addcart({{ $prodects->id}})">+ Add to Cart</button>
                                                                    @else
                                                                    <a href="{{ url('/userlogin') }}" class="addcart" title="Add to Cart">+ Add to Cart</a>
                                                                    @endif
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                    

                                                </div>
                                            </div>

                                            <div id="tab-latest" class="tab-pane">
                                                <div id="latestTabCarousel" class="box-product product-carousel owl-carousel clearfix" data-items="4">
                                                    @if(isset($ProdectLatestDataArr) && !empty($ProdectLatestDataArr))
                                                    @foreach($ProdectLatestDataArr as $ProdectLatest)
                                                    <div class="product-layout col-xs-12 item">
                                                        <div class="product-thumb transition">
                                                            <div class="image">
                                                                @php                   
                                                                $prodectLatesturl = url('product-detail/'.$ProdectLatest->slug);
                                                                @endphp
                                                                <a href="{{$prodectLatesturl}}">
                                                                    @if($ProdectLatest->featuredimage)
                                                                        @if($ProdectLatest->artistid == "0")
                                                                            <img src="{{ url('https://lakouphoto.ca/public/image/products/'.$ProdectLatest->featuredimage) }}" alt="{{ $ProdectLatest->title }}" title="{{ $ProdectLatest->title }}" class="img-responsive" />
                                                                        @else
                                                                            <img src="{{ url('https://lakouphoto.ca/Artist/public/image/products/'.$ProdectLatest->featuredimage) }}" alt="{{ $ProdectLatest->title }}" title="{{ $ProdectLatest->title }}" class="img-responsive" />
                                                                        @endif
                                                                    @else
                                                                        <img src="https://lakouphoto.ca/public/image/artist/default-artist.svg" alt="{{ $ProdectLatest->title }}" title="{{ $ProdectLatest->title }}" class="img-responsive" />
                                                                    @endif
                                                                    @if(isset($ProdectLatest['images']) && !empty($ProdectLatest['images']))
                                                                    @php $imageArr = explode('|',$ProdectLatest['images']->mediaurl); 
                                                                    
                                                                    @endphp
                                                                        @if($ProdectLatest->artistid == "0")
                                                                            <img class="img-responsive hover-img" src="{{ url($imageArr[0]) }}" title="{{ $ProdectLatest->title }}" alt="{{ $ProdectLatest->title }}" />
                                                                        @else
                                                                            <img class="img-responsive hover-img" src="{{ url('Artist/'.$imageArr[0]) }}" title="{{ $ProdectLatest->title }}" alt="{{ $ProdectLatest->title }}" />
                                                                        @endif
                                                                    @else
                                                                        @if($ProdectLatest->featuredimage)
                                                                            @if($ProdectLatest->artistid == "0")
                                                                                <img class="img-responsive hover-img" src="{{ url('https://lakouphoto.ca/public/image/products/'.$ProdectLatest->featuredimage) }}" alt="{{ $ProdectLatest->title }}" title="{{ $ProdectLatest->title }}" />
                                                                            @else
                                                                                <img class="img-responsive hover-img" src="{{ url('https://lakouphoto.ca/Artist/public/image/products/'.$ProdectLatest->featuredimage) }}" alt="{{ $ProdectLatest->title }}" title="{{ $ProdectLatest->title }}" />
                                                                            @endif
                                                                        @else
                                                                            <img class="img-responsive hover-img" src="https://lakouphoto.ca/public/image/artist/default-artist.svg" title="{{ $ProdectLatest->title }}" alt="{{ $ProdectLatest->title }}" />
                                                                        @endif
                                                                    @endif
                                                                </a>

                                                                <div class="button-group">
                                                                     <?php
                                                                    
                                                                        $activeClass = "";
                                                                        $pid = $ProdectLatest->id;
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
                                                                    
                                                                    <button type="button" class="wishlist pid_{{ $pid }} {{ $activeClass }} {{ $RemoveClass }}" data-pid="{{$pid}}" data-toggle="tooltip" title="{{$title}}"><i class="fa fa-heart {{ $activeClass }} act_{{ $pid }}" id="heart" ></i></button>
                                                                    <button type="button" data-toggle="tooltip"  data-pid="{{$ProdectLatest->slug}}" class="quickview-button Click-here" title="Quickview">
                                                                        <i class="icon-eye"></i>
                                                                    </button>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="thumb-description">
                                                                <div class="caption">
                                                                    <div class="rate-pri">
                                                                        <h4 class="product-title"><a href="{{$prodectLatesturl}}">{{ $ProdectLatest->title }}</a></h4>
                                                                        <div class="rating clearfix">
                                                                      @php 
                                                                      $star1 = '';
                                                                       $RatingData = $mylibrary->getprodectreview($ProdectLatest->id) @endphp
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
                                                                    @if(isset($ProdectLatest->saleprice) && !empty($ProdectLatest->saleprice) && $ProdectLatest->saleprice > 0)
                                                                        <span class="price-new">{{ $mylibrary->currencyconverterallprice($ProdectLatest->saleprice) }}</span><span class="price-old">{{ $mylibrary->currencyconverterallprice($ProdectLatest->price) }}</span>
                                                                        @else
                                                                        <span class="price-new">{{ $mylibrary->currencyconverterallprice($ProdectLatest->price) }}</span>
                                                                        @endif
                                                                  
                                                                        <span class="price-tax">Without tax: $199.99</span>
                                                                    </p>

                                                                    
                                                                    @if(isset($ProdectLatest->availability) && $ProdectLatest->availability == 'In stock')
                                                                    @if(isset($Front_user_id) && !empty($Front_user_id))
                                                                    <button type="button" class="addcart" title="Add to Cart" onclick="addcart({{ $ProdectLatest->id}})">+ Add to Cart</button>
                                                                    @else
                                                                    <a href="{{ url('/userlogin') }}" class="addcart" title="Add to Cart">+ Add to Cart</a>
                                                                    @endif
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            @if(isset($prodectbestseller) && !empty($prodectbestseller) && count($prodectbestseller) > 0)
                                            <div id="tab-bestseller" class="tab-pane">
                                                <div id="bestsellerTabCarousel" class="box-product product-carousel owl-carousel clearfix" data-items="4">
                                                    @foreach($prodectbestseller as $bestseller)
                                                    <div class="product-layout col-xs-12 item">
                                                        <div class="product-thumb transition">
                                                            <div class="image">
                                                                @php                   
                                                                $prodectbetsturl = url('product-detail/'.$bestseller->slug);
                                                                @endphp
                                                                <a href="{{$prodectbetsturl}}">
                                                                    @if($bestseller->featuredimage)
                                                                        @if($bestseller->artistid == '0')
                                                                            <img src="{{ url('public/image/products/'.$bestseller->featuredimage) }}" alt="{{ $bestseller->title }}" title="{{ $bestseller->title }}" class="img-responsive" />
                                                                        @else
                                                                            <img src="{{ url('Artist/public/image/products/'.$bestseller->featuredimage) }}" alt="{{ $bestseller->title }}" title="{{ $bestseller->title }}" class="img-responsive" />
                                                                        @endif
                                                                    @else
                                                                        <img src="https://lakouphoto.ca/public/image/artist/default-artist.svg" alt="{{ $bestseller->title }}" title="{{ $bestseller->title }}" class="img-responsive" />
                                                                    @endif
                                                                    @if(isset($bestseller['images']) && !empty($bestseller['images']))
                                                                    @php $imageArr = explode('|',$bestseller['images']->mediaurl); 
                                                                    
                                                                    @endphp
                                                                        @if($bestseller->artistid == '0')
                                                                            <img class="img-responsive hover-img" src="{{ url($imageArr[0]) }}" title="{{ $bestseller->title }}" alt="{{ $bestseller->title }}" />
                                                                        @else
                                                                            <img class="img-responsive hover-img" src="{{ url('Artist/'.$imageArr[0]) }}" title="{{ $bestseller->title }}" alt="{{ $bestseller->title }}" />
                                                                        @endif
                                                                    @else
                                                                        @if($bestseller->featuredimage)
                                                                            @if($bestseller->artistid == '0')
                                                                                <img class="img-responsive hover-img" src="{{ url('public/image/products/'.$bestseller->featuredimage) }}" title="{{ $bestseller->title }}" alt="{{ $bestseller->title }}" />
                                                                            @else
                                                                                <img class="img-responsive hover-img" src="{{ url('Artist/public/image/products/'.$bestseller->featuredimage) }}" title="{{ $bestseller->title }}" alt="{{ $bestseller->title }}" />
                                                                            @endif
                                                                        @else
                                                                            <img class="img-responsive hover-img" src="https://lakouphoto.ca/public/image/artist/default-artist.svg" title="{{ $bestseller->title }}" alt="{{ $bestseller->title }}" />
                                                                        @endif
                                                                    @endif
                                                                </a>

                                                                <div class="button-group">
                                                                    <?php
                                                                    
                                                                        $activeClass = "";
                                                                        $pid = $bestseller->id;
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
                                                                    
                                                                    <button type="button" class="wishlist pid_{{ $pid }} {{ $activeClass }} {{ $RemoveClass }}" data-pid="{{$pid}}" data-toggle="tooltip" title="{{$title}}"><i class="fa fa-heart {{ $activeClass }} act_{{ $pid }}" id="heart"></i></button>
                                                                    <button type="button" data-toggle="tooltip" data-pid="{{$bestseller->slug}}" class="quickview-button Click-here" title="Quickview">
                                                                        <i class="icon-eye"></i>
                                                                    </button>
                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="thumb-description">
                                                                <div class="caption">
                                                                    <div class="rate-pri">
                                                                        
                                                                         <h4 class="product-title"><a href="{{$prodectbetsturl}}">{{ $bestseller->title }}</a></h4>
                                                                          <div class="rating clearfix">
                                                                      @php 
                                                                      $star1 = '';
                                                                       $RatingData = $mylibrary->getprodectreview($bestseller->id) @endphp
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
                                                                        @if(isset($bestseller->saleprice) && !empty($bestseller->saleprice) && $bestseller->saleprice > 0)
                                                                        <span class="price-new">{{ $mylibrary->currencyconverterallprice($bestseller->saleprice) }}</span><span class="price-old">{{ $mylibrary->currencyconverterallprice($bestseller->price) }}</span>
                                                                        @else
                                                                        <span class="price-new">{{ $mylibrary->currencyconverterallprice($bestseller->price) }}</span>
                                                                        @endif
                                                                        <span class="price-tax">Without tax: $249.00</span>
                                                                    </p>

                                                                   
                                                                    @if(isset($bestseller->availability) && $bestseller->availability == 'In stock')
                                                                    @if(isset($Front_user_id) && !empty($Front_user_id))
                                                                    <button type="button" class="addcart" title="Add to Cart" onclick="addcart({{ $bestseller->id}})">+ Add to Cart</button>
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
                                            @endif
                                        </div>
                                    </div>
                                </div>    
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $("#tabs a").tabs();
            </script>
            <div class="banner-outer html1 mt-80">
                <div class="container">
                    <div class="html1-inner row">
                        @if(isset($ProductCategoryArr) && !empty($ProductCategoryArr))
                        @php $i=1; @endphp
                        @foreach($ProductCategoryArr as $ProductCategory)
                        @if($i % 2 != 0)
                        <div class="col-xs-4">
                        @endif
                            <div class="banner{{$i}} banner">
                                <div class="inner1">
                                    <a href="{{url('/product-cat/'.$ProductCategory->slug)}}"><img src="{{url('image/product-categories/'.$ProductCategory->image) }}" alt="" class="img-responsive" /></a>
                                </div>
                                <div class="inner2"> h
                                    <div class="promo-text-box"><button class="promo-btn">{{$ProductCategory->name}}</button></div>
                                </div>
                            </div>
                        @if($i % 2 == 0)
                        </div>
                        @endif
                        @php $i++; @endphp
                        @endforeach
                        @endif

                    </div>
                </div>
            </div>
            <div class="box all-products mt-80">
                <div class="box-heading container">
                    <div class="box-content special">
                        <div class="page-title toggled"><h3>Limited Edition</h3></div>
                        <div class="row">
                            <div class="block_box box-shadoww">
                                <div id="special-carousel" class="box-product product-carousel clearfix owl-carousel" data-items="4">
                                    @if(isset($SpecialProductsArr) && !empty($SpecialProductsArr))
                                    @foreach($SpecialProductsArr as $SpecialProducts)
                                    {{$SpecialProducts->uploadBy}}
                                    @php                  
                                        $prodecturl = url('product-detail/'.$SpecialProducts->slug);
                                    @endphp
                                    <div class="product-layout col-xs-12 item">
                                        <div class="product-thumb transition clearfix">
                                            <div class="image">
                                                <!-- <div class="sale-text"><span class="section-sale">({{$SpecialProducts->artistid}})</span></div> -->
                                                <a href="{{$prodecturl}}">
                                                @if ($SpecialProducts->featuredimage)
                                                    @if ($SpecialProducts->artistid == "0")
                                                        <img src="{{ url('/image/products/'.$SpecialProducts->featuredimage) }}" alt="{{$SpecialProducts->title}}" title="{{$SpecialProducts->title}}" class="img-responsive" />
                                                    @else
                                                        <img src="{{ url('https://lakouphoto.ca/Artist/public/image/products/'.$SpecialProducts->featuredimage) }}" alt="{{$SpecialProducts->title}}" title="{{$SpecialProducts->title}}" class="img-responsive" />
                                                    @endif
                                                @else
                                                <img src="https://lakouphoto.ca/public/image/artist/default-artist.svg" alt="{{$SpecialProducts->title}}" title="{{$SpecialProducts->title}}" class="img-responsive" />
                                                @endif
                                                    
                                                    @if(isset($SpecialProducts['images']) && !empty($SpecialProducts['images']))
                                                            @php $imageArr = explode('|',$SpecialProducts['images']->mediaurl); @endphp
                                                            @if ($SpecialProducts->artistid == "0")
                                                                <img class="img-responsive hover-img" src="{{ url($imageArr[0]) }}" title="{{ $SpecialProducts->title }}" alt="{{ $SpecialProducts->title }}" />
                                                            @else
                                                                <img class="img-responsive hover-img" src="{{ url('Artist/'.$imageArr[0]) }}" title="{{ $SpecialProducts->title }}" alt="{{ $SpecialProducts->title }}" />
                                                            @endif
                                                            @else
                                                                @if($SpecialProducts->featuredimage)
                                                                    @if ($SpecialProducts->artistid == "0")
                                                                        <img class="img-responsive hover-img" src="{{ url('public/image/products/'.$SpecialProducts->featuredimage) }}" title="{{ $SpecialProducts->title }}" alt="{{ $SpecialProducts->title }}" />
                                                                    @else
                                                                        <img class="img-responsive hover-img" src="{{ url('Artist/public/image/products/'.$SpecialProducts->featuredimage) }}" title="{{ $SpecialProducts->title }}" alt="{{ $SpecialProducts->title }}" />
                                                                    @endif
                                                                @else
                                                                <img class="img-responsive hover-img" src="https://lakouphoto.ca/public/image/artist/default-artist.svg" title="{{ $SpecialProducts->title }}" alt="{{ $SpecialProducts->title }}" />
                                                                @endif
                                                            @endif
                                                </a>

                                                <div class="button-group">
                                                    <?php
                                                            
                                                                $activeClass = "";
                                                                $pid = $SpecialProducts->id;
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
                                                            
                                                    <button type="button" class="wishlist pid_{{ $pid }} {{ $activeClass }} {{ $RemoveClass }}" data-pid="{{$pid}}" data-toggle="tooltip" title="{{$title}}"><i class="fa fa-heart {{ $activeClass }} act_{{ $pid }}" id="heart"></i></button>

                                                    <button type="button" data-toggle="tooltip" data-pid="{{$SpecialProducts->slug}}" class="quickview-button Click-here" title="Quickview">
                                                        <i class="icon-eye"></i>
                                                    </button>
                                                    
                                                </div>
                                            </div>
                                            <div class="thumb-description">
                                                <div class="caption">
                                                    <div class="rate-pri">
                                                        <h4 class="product-title"><a href="{{$prodecturl}}">{{$SpecialProducts->title}}</a></h4>
                                                        <div class="rating clearfix">
                                                              @php 
                                                              $star1 = '';
                                                               $RatingData = $mylibrary->getprodectreview($SpecialProducts->id) @endphp
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
                                                        @if(isset($SpecialProducts->saleprice) && !empty($SpecialProducts->saleprice) && $SpecialProducts->saleprice > 0)
                                                                <span class="price-new">{{ $mylibrary->currencyconverterallprice($SpecialProducts->saleprice) }}</span><span class="price-old">{{ $mylibrary->currencyconverterallprice($SpecialProducts->price) }}</span>
                                                                @else
                                                                <span class="price-new">{{ $mylibrary->currencyconverterallprice($SpecialProducts->price) }}</span>
                                                                @endif

                                                        
                                                    </p>

                                                   
                                                    @if(isset($SpecialProducts->availability) && $SpecialProducts->availability == 'In stock')
                                                    @if(isset($Front_user_id) && !empty($Front_user_id))
                                                        <button type="button" class="addcart" title="Add to Cart" onclick="addcart({{ $SpecialProducts->id}})">+ Add to Cart</button>
                                                    @else
                                                        <a href="{{ url('/userlogin') }}" class="addcart" title="Add to Cart">+ Add to Cart</a>
                                                    @endif
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div class="carousel brand mt-80">
                <div class="container">
                    <div class="row">
                        <div class="page-title">
                            <h3>Artist Profile</h3>
                        </div>
                        <div class="swiper-viewport margin5">
                            <div id="carousel0" class="swiper-container swiper-container-horizontal">
                                <div class="swiper-wrapper" style="transform: translate3d(-2535px, 0px, 0px); transition-duration: 0ms;">
                                    @foreach($ArtistDataArr as $artist)
                                    <div class="swiper-slide col-sm-12" data-swiper-slide-index="1" style="width: 195px;">
                                        <a href="{{url('/artist-details/'.$artist->slug)}}">
                                            <div class="text-center">
                                                @if($artist->profileimage)
                                                <img src="{{ url('https://lakouphoto.ca/Artist/public/image/profile/'.$artist->profileimage) }}" alt="{{$artist->firstname}} {{$artist->lastname}}" class="img-responsive m-auto" />
                                                @else
                                                <img src="{{url('/image/artist/default-artist.svg') }}" alt="{{$artist->firstname}} {{$artist->lastname}}" class="img-responsive m-auto" />
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                    
                                    
                                </div>
                            </div>
                            <div class="swiper-pagination carousel0"></div>
                            <div class="swiper-pager">
                                <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                                <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="services-html2 mt-80"><div class="container">
              <div class="row box-shadoww1  ">
                <div class="service-box col-sm-6">
                    <div class="promo-item row">
                      <div class="service-item col-xs-6">
                        <div class="service">
                          <div class="service-icon icon-plane1"></div>
                          <div class="service-content">
                            <h4 class="promo-title">Free Shipping Worldwide</h4>
                            <div class="promo-desc">On order over $150</div>
                          </div>
                        </div>
                      </div>
                      <div class="service-item col-xs-6">
                        <div class="service">
                          <div class="service-icon icon-wallet"></div>
                          <div class="service-content">
                            <h4 class="promo-title">Cash On Delivery</h4>
                            <div class="promo-desc">100% money back guarantee</div>
                          </div>
                        </div>
                      </div>
                      <div class="service-item col-xs-6">
                        <div class="service">
                          <div class="service-icon icon-gift"></div>
                          <div class="service-content">
                            <h4 class="promo-title">Special Gift Card</h4>
                            <div class="promo-desc">Offer Special bonuses With Gift</div>
                          </div>
                        </div>
                      </div>
                      <div class="service-item col-xs-6">
                        <div class="service">
                          <div class="service-icon icon-support"></div>
                          <div class="service-content">
                            <h4 class="promo-title">24/7 Customer Service</h4>
                            <div class="promo-desc">Call us at 123-456-789</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="banner-outer html2 col-sm-6">
                    <div class="html2-inner">
                      <div class="banner7 banner">
                        <div class="inner1">
                          <!-- <a href="#"><img src="https://maquinistas.in/Lakou/public/image/banners/banner7.jpg" alt="" class="img-responsive"></a> -->
                          <a href="#"><img src="{{asset('image/banners/banner7.jpg')}}" alt="" class="img-responsive"></a>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
                </div>
            </div>
            <div class="testimonial-block mt-80">
                <div class="container">
                    <div class="testimonial-container box-module">
                        <div class="page-title"><h3>Customer Reviews</h3></div>
                        <div class="row">
                            <div class="owl-container">
                                <div class="block-content">
                                    <div class="slideTestimonial owl-carousel owl-theme">
                                        <div class="row-items col-xs-12">
                                            <div class="testimonial-images">
<!--                                                 <img src="https://maquinistas.in/Lakou/public/assets/images/testimonial/1-150x150.jpg" alt="John Deo" class="m-image-auto m-auto" /> -->

<img src="{{asset('/assets/images/testimonial/1-150x150.jpg')}}" alt="John Deo" class="m-image-auto m-auto" />
                                            </div>

                                            <div class="testimonial-content">
                                                <div class="testimonial-text">
                                                    <p>
                                                       Thank you for delivering the painting in such good condition, I love your store, this is my second purchase and you have the most extensive collection of art I’ve seen among all Indian online stores! 
                                                    </p>
                                                </div>
                                                <div class="testimonial-author">John Deo</div>
                                                <!-- <div class="testimonial-customer">Customer</div> -->
                                            </div>
                                        </div>

                                        <div class="row-items col-xs-12">
                                            <div class="testimonial-images">
                                               <!--  <img src="https://maquinistas.in/Lakou/public/assets/images/testimonial/2-150x150.jpg" alt="Luies Charles" class="m-image-auto m-auto" /> -->
                                                <img src="{{asset('/assets/images/testimonial/2-150x150.jpg')}}" alt="Luies Charles" class="m-image-auto m-auto" />
                                            </div>

                                            <div class="testimonial-content">
                                                <div class="testimonial-text">
                                                    <p>
                                                       So glad my search for paintings ended on lakou photo as I was spoilt for choice to choose from thousands of paintings! Best part was that they're customizable in multiple ways in terms of size and frames!  
                                                    </p>
                                                </div>
                                                <div class="testimonial-author">Luies Charles</div>
                                                <!-- <div class="testimonial-customer">Artist</div> -->
                                            </div>
                                        </div>

                                        <div class="row-items col-xs-12">
                                            <div class="testimonial-images">
                                                <!-- <img src="https://maquinistas.in/Lakou/public/assets/images/testimonial/3-150x150.jpg" alt=" Michael Jack" class="m-image-auto m-auto" /> -->
                                                <img src="{{asset('assets/images/testimonial/3-150x150.jpg')}}" alt=" Michael Jack" class="m-image-auto m-auto" />
                                            </div>

                                            <div class="testimonial-content">
                                                <div class="testimonial-text">
                                                    <p>
                                                        The quality of the print of the Paintings was of top quality and the framing was also very good. 
                                                        gave a very aesthetic look to my living area and changed the overall ethos and decor for the better. 
                                                         
                                                    </p>
                                                </div>
                                                <div class="testimonial-author">Michael Jack</div>
                                                <!-- <div class="testimonial-customer">Customer</div> -->
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                <!--
                $(document).ready(function() {
                    setTestimonialCarousel();
                });
                function setTestimonialCarousel() {
                    const direct = $('html').attr('dir');
                    const items = 2;
                    $(".slideTestimonial").each(function (){
                        const sliderOptions = {
                            loop: false,
                            nav:  true ,
                            navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                            dots:  false ,
                            items: items,
                            autoplay:  true ,
                            autoplayTimeout: 3000,
                            responsiveRefreshRate: 200,
                            responsive: {
                                0: { items: 1 },
                                1201: { items: 2 }
                            }
                        };

                        if (direct == 'rtl') sliderOptions['rtl'] = true;
                        $(this).owlCarousel(sliderOptions);
                    });
                }
                //-->
            </script>
           

            <script>
                <!--
                $(document).ready(function() {
                    $('#carousel0').swiper({
                        mode: 'horizontal',
                        slidesPerView: 6,
                        paginationClickable: false,
                        nextButton: '.swiper-button-next',
                        prevButton: '.swiper-button-prev',
                        loop: true,
                        autoplay: 5000,
                        autoplayDisableOnInteraction: true,
                        breakpoints: {
                            1199: {
                                slidesPerView: 5,
                                spaceBetween: 0
                            },
                            991: {
                                slidesPerView: 4,
                                spaceBetween: 0
                            },
                            600: {
                                slidesPerView: 3,
                                spaceBetween: 0
                            },
                            480: {
                                slidesPerView: 2,
                                spaceBetween: 0
                            },
                            319: {
                                slidesPerView: 1,
                                spaceBetween: 0
                            }
                        }
                    });
                });
                -->
            </script>
            <div class="mblog mt-80">
                <div class="container">
                    <div class="section">
                        <div class="box-content">
                            <div class="page-title section"><h3>From Our Blog</h3></div>
                            <div class="row">
                                <div class="block_box">
                                    <div id="blogcarousel" class="blogs-block blog-carousel clearfix" data-items="3">
                                        
                                        <!-- test -->
                                        @foreach($blog as $key=>$blogs)
                                        <div class="product-layout col-xs-12">
                                            <div class="item">
                                                <div class="product-block blog-block">
                                                    <div class="blog-info">
                                                        <div class="image">
                                                            <a href="{{ url('blog-detail',$blogs->id) }}">
                                                                <!-- <img src="/lakouphoto-design/images/blogs/blog1-490x392.jpg" alt="" title="The standard Lorem Ipsum" class="img-responsive" /> -->
                                                                <img src="{{asset('/image/blog/'.$blogs->featureimage)}}" alt="" title="{{$blogs->title}}" class="img-responsive" />

                                                                <!-- <img height="120" width="150" class="img-responsive" src="{{asset('/image/blog/'.$blogs->featureimage)}}" > -->
                                                            </a>
                                                            <div class="zoom-post">
                                                                <!-- <a class="hover-zoom" href="/lakouphoto-design/images/blogs/blog1-1140x912.jpg" data-lightbox="example-set" title="The standard Lorem Ipsum"></a> -->
                                                                <a class="hover-zoom" href="{{asset('/image/blog/'.$blogs->featureimage)}}" data-lightbox="example-set" title="The standard Lorem Ipsum"></a>
                                                                <a class="hover-post" href="{{asset('/image/blog/'.$blogs->featureimage)}}"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="caption blog-description">
                                                        <div class="link_info">
                                                            <span class="block-date">@php 
                                                                echo date_format($blogs->created_at,"M d Y");
                                                            @endphp</span>
                                                            <h4><a href="{{asset('/image/blog/'.$blogs->featureimage)}}">{{$blogs->title}}</a></h4>
                                                            <div class="blog-text">
                                                                <span>{{$blogs->slug}}</span>
                                                            </div>
                                                            <!-- <a class="blog-read btn" onclick="location.href = ('{{ url('blog-detail',$blogs->id) }}');" title="Read more">Read more</a> -->
                                                 <a class="blog-read btn" href="{{ url('blog-detail',$blogs->id) }}" title="Read more">Read more</a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- test end -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                <!--
                // set slider
                $(document).ready(function() {
                    setBlogCarousel();
                });
                function setBlogCarousel() {
                    const direc = $('html').attr('dir');

                    $('.blog-carousel').each(function () {
                        if ($(this).closest('#column-left').length == 0 && $(this).closest('#column-right').length == 0) {
                            $(this).addClass('owl-carousel owl-theme');
                                const items = $(this).data('items') || 3;
                                const sliderOptions = {
                                    loop: false,
                                    nav: true,
                                    navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                                    dots: false,
                                    items: items,
                                    responsiveRefreshRate: 200,
                                    responsive: {
                                    0: { items: 1 },
                                    541: { items: 2 },
                                    1200: { items: items }
                                }
                            };
                            if (direc == 'rtl') sliderOptions['rtl'] = true;
                            $(this).owlCarousel(sliderOptions);
                        }
                    });
                }


                //-->
            </script>
            <div class="news mt-80">
                <div class="container">
                    <div class="newsletterblock row">
                        <div class="newsletter-form block-content">
                            <div class="col-md-7">
                                <div class="news-info">
                                    <i class="icon-mail"></i>
                                    <div class="news-dec">
                                        <div class="title-text"><h4>Subscribe Newsletter</h4></div>
                                        <div class="news-description">Stay up to date with new collection and exclusive offers.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <!-- newsletter box -->
                                {!! Form::open(['method' => 'post','url' => url('/Newslette/insert'), 'id'=>'frmnewsletterfooter']) !!} 
                                    <div class="subscribe-form">
                                        <input type="email" name="newsletter_usr_email" id="newsletter_usr_email" placeholder="Enter e-mail here..." class="form-control input-lg inputNew txtemail" required />

                                        <button type="submit" class="subscribe-btn"><i class="icon-plane"></i></button>
                                    </div>
                                    <!-- newsletter notofication -->
                                    <div class="newsletter-message"></div>
                                    <!-- newsletter notofication -->
                                {!!Form::close()!!}
                                <!-- newsletter box -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                <!--
                //add
                function subscribe(){
                    $.ajax({
                        type: 'post',
                        url: 'index.php?route=extension/module/mahardhi_newsletter/subscribe',
                        dataType: 'html',
                        data:$("#frmnewsletter").serialize(),
                        success: function (html) {
                            try {
                                eval(html);
                            }
                            catch (e) {
                            }
                        }
                    });
                }

                // check for validation
                $(document).ready(function() {
                    $('#newsletter_usr_email').keypress(function(e) {
                        if(e.which == 13) {
                            e.preventDefault();
                            subscribe();
                        }
                    });
                });
                //-->
            </script>
  <!-- <div class="container">
                <div class="row">
                    <div id="content" class="col-sm-12"> -->
            <div class="">
                <div class="">
                    <div id="" class="">
                        <div class="modal fade newsletter-popup" id="newsletter-popup">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="newsletter-wrap clearfix">
                                            <div class="newsletter-image">
                                                <div class="newsletter-content">
                                                    <div class="newsletter-content-innner">
                                                        <div class="news-logo"></div> 
                                                        <h3>Join Our Newsletter</h3>
                                                        <p>Subscribe and get notified at first on the latest update and offers!</p>
                                                        
                                                        {!! Form::open(['method' => 'post','url' => url('/Newslette/insert'), 'id'=>'frmnewsletterpopup', 'class'=>'form-horizontal']) !!}     
                                                        <input type="email" class="newsletter_usr_popup_email" name="newsletter_usr_popup_email" id="newsletter_usr_popup_email" name="popupemail" placeholder="Enter e-mail here..." />
                                                        
                                                        <!--CAPTCHA-->
                                                        <!--<script src="https://www.google.com/recaptcha/api.js" async defer></script>-->
                                                        <!--<div style="justify-content:center;display: flex;" class="form-group mt-5">-->
                                                        <!--<div class="g-recaptcha" data-sitekey="6LewFY4kAAAAAEkTQoAw2AAtQ39CxyH0wyl203C7">    </div>-->
                                                        <!--</div>-->
                                                        <!--   @error('g-recaptcha-response')-->
                                                        <!--            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>-->
                                                        <!--   @enderror-->
                                                        <!--CAPTCHA END-->
                                                        
                                                        <div>
                                                            <button class="btn btn-default subscribe-btn" type="submit">Subscribe</button>
                                                        </div>
                                                        <br>
                                                         @foreach ($errors->all() as $error)
                                                            <p style="color:red">{{ $error }}</p><br>
                                                          @endforeach
                                                        {!!Form::close()!!}
                                                        <!-- newsletter notofication -->
                                                        <div class="newsletter-popup-message"></div>
                                                        <!-- newsletter notofication -->
                                                        <div class="newsletter-content-bottom">
                                                            <input type="checkbox" id="popup_dont_show_again" />
                                                            <label for="popup_dont_show_again">Don't show this popup again!</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="newsletter-btn-close close" data-dismiss="modal" aria-label="Close"><i class="icon-close"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            <!--
                            function subscribe_popup(){
                                $.ajax({
                                        type: 'post',
                                        url: 'index.php?route=extension/module/mahardhi_newsletter/subscribepopup',
                                        dataType: 'html',
                                        data:$("#frmnewsletterpopup").serialize(),
                                        success: function (html) {
                                            try {
                                                eval(html);
                                            }
                                            catch (e) {
                                            }
                                        }});
                            }
                            //-->
                        </script>
                        <script>
                            <!--
                            // check for validation
                            $(document).ready(function() {
                                $('#newsletter_usr_popup_email').keypress(function(e) {
                                    if(e.which == 13) {
                                        e.preventDefault();
                                        subscribe_popup();
                                    }
                                });

                                //transition effect
                                    if($.cookie("showpopup") != 1){
                                        $('#newsletter-popup').modal('show');
                                    }
                                    $('#popup_dont_show_again').on('change', function(){
                                        if($.cookie("showpopup") != 1){
                                            $.cookie("showpopup",'1')
                                        }else{
                                            $.cookie("showpopup",'0')
                                        }
                                    });
                            });
                            //-->
                        </script>
                    </div>
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
                      <a href="/lakouphoto-design/images/products/2-800x1000.jpg" title="Acrylic Painting" class="thumbnail pro-featuredimage">
                        <img
                          src="/lakouphoto-design/images/products/2-710x888.jpg"
                          title="Acrylic Painting"
                          id="zoom" class="pro-featuredimage"
                          alt="Acrylic Painting"
                          data-zoom-image="https://opencart.mahardhi.com/MT04/artiem/image/cache/catalog/products/2-800x1000.jpg"
                        />
                      </a>
                    </div>

                    <div id="additional-carousel" class="owl-carousel owl-theme clearfix">
                      <div class="image-additional quick-img quick-img">
                        <a
                          href="/lakouphoto-design/images/products/2-800x1000.jpg"
                          title="Acrylic Painting"
                          class="elevatezoom-gallery"
                          data-image="https://opencart.mahardhi.com/MT04/artiem/image/cache/catalog/products/2-710x888.jpg"
                          data-zoom-image="https://opencart.mahardhi.com/MT04/artiem/image/cache/catalog/products/2-800x1000.jpg"
                        >
                          <img src="/lakouphoto-design/images/products/2-710x888.jpg" title="Acrylic Painting" alt="Acrylic Painting" width="80" height="100" />
                        </a>
                      </div>
                      <div class="image-additional quick-img">
                        <a
                          href="/lakouphoto-design/images/products/3-800x1000.jpg"
                          title="Acrylic Painting"
                          class="elevatezoom-gallery"
                          data-image="https://opencart.mahardhi.com/MT04/artiem/image/cache/catalog/products/3-710x888.jpg"
                          data-zoom-image="https://opencart.mahardhi.com/MT04/artiem/image/cache/catalog/products/3-800x1000.jpg"
                        >
                          <img src="/lakouphoto-design/images/products/3-710x888.jpg" title="Acrylic Painting" alt="Acrylic Painting" width="80" height="100" />
                        </a>
                      </div>
                      <div class="image-additional quick-img">
                        <a
                          href="/lakouphoto-design/images/products/1-710x888.jpg2-800x1000.jpg"
                          title="Acrylic Painting"
                          class="elevatezoom-gallery"
                          data-image="https://opencart.mahardhi.com/MT04/artiem/image/cache/catalog/products/2-710x888.jpg"
                          data-zoom-image="https://opencart.mahardhi.com/MT04/artiem/image/cache/catalog/products/2-800x1000.jpg"
                        >
                          <img src="/lakouphoto-design/images/products/2-710x888.jpg" title="Acrylic Painting" alt="Acrylic Painting" width="80" height="100" />
                        </a>
                      </div>
                      <div class="image-additional quick-img">
                        <a
                          href="/lakouphoto-design/images/products/11-800x1000.jpg"
                          title="Acrylic Painting"
                          class="elevatezoom-gallery"
                          data-image="https://opencart.mahardhi.com/MT04/artiem/image/cache/catalog/products/11-710x888.jpg"
                          data-zoom-image="https://opencart.mahardhi.com/MT04/artiem/image/cache/catalog/products/11-800x1000.jpg"
                        >
                          <img src="/lakouphoto-design/images/products/11-710x888.jpg" title="Acrylic Painting" alt="Acrylic Painting" width="80" height="100" />
                        </a>
                      </div>
                      <div class="image-additional quick-img">
                        <a
                          href="/lakouphoto-design/images/products/10-800x1000.jpg"
                          title="Acrylic Painting"
                          class="elevatezoom-gallery"
                          data-image="https://opencart.mahardhi.com/MT04/artiem/image/cache/catalog/products/10-710x888.jpg"
                          data-zoom-image="https://opencart.mahardhi.com/MT04/artiem/image/cache/catalog/products/10-800x1000.jpg"
                        >
                          <img src="/lakouphoto-design/images/products/10-710x888.jpg" title="Acrylic Painting" alt="Acrylic Painting" width="80" height="100" />
                        </a>
                      </div>
                      <div class="image-additional quick-img">
                        <a
                          href="/lakouphoto-design/images/products/1-800x1000.jpg"
                          title="Acrylic Painting"
                          class="elevatezoom-gallery"
                          data-image="https://opencart.mahardhi.com/MT04/artiem/image/cache/catalog/products/1-710x888.jpg"
                          data-zoom-image="https://opencart.mahardhi.com/MT04/artiem/image/cache/catalog/products/1-800x1000.jpg"
                        >
                          <img src="/lakouphoto-design/images/products/1-710x888.jpg" title="Acrylic Painting" alt="Acrylic Painting" width="80" height="100" />
                        </a>
                      </div>
                      <div class="image-additional quick-img">
                        <a
                          href="/lakouphoto-design/images/products/5-800x1000.jpg"
                          title="Acrylic Painting"
                          class="elevatezoom-gallery"
                          data-image="https://opencart.mahardhi.com/MT04/artiem/image/cache/catalog/products/5-710x888.jpg"
                          data-zoom-image="https://opencart.mahardhi.com/MT04/artiem/image/cache/catalog/products/5-800x1000.jpg"
                        >
                          <img src="/lakouphoto-design/images/products/5-710x888.jpg" title="Acrylic Painting" alt="Acrylic Painting" width="80" height="100" />
                        </a>
                      </div>
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
                        300: { items: 2 },
                        376: { items: 2 },
                        481: { items: 2 },
                        768: { items: ((items - 1) > 1) ? (items - 1) : 1 },
                        1200: { items: 3 }
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
    $(".Click-here").on('click', function() {
        console.log('click Call');
        var id = $(this).data('pid');
        console.log('id---',id);
        $.get('quickview/'+id+'/view', function (data) {
            $(".custom-model-main").addClass('model-open');
            $('.pro-deatil').html(data.html);
            // $('#pro-id').text(data['products'].id);
            // $('#pro-title').text(data['products'].title);
            // $('#pro-price').text(data['products'].price);
            // $('#pro-saleprice').text(data['products'].saleprice);
            // $('#pro-brand').text(data['productsbrands'].name);
            // $('#pro-availability').text(data['products'].availability);
            // $('#pro-featuredimage').text(data['products'].featuredimage);
        });
    }); 
    $(".close-btn, .bg-overlay").click(function(){
        $(".custom-model-main").removeClass('model-open');
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
@extends('frontview.layouts.footer')
@endsection
