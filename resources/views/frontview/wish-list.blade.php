@inject('artist','App\Models\ArtistModel')
@inject('Country','App\Models\CountryModel')
@inject('mylibrary', 'App\Helpers\MyLibrary')
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
    

    <section>
      <div class="wish-container">
        <div class="wish-bg">
          <img src="{{url('/image/banner_wishlist_no_connect.cbbca931.jpg')}}">
        </div>
        <div class="fav-content">
          <div class="like-icon">
            <i class="fas fa-heart"></i>
          </div>
          <div class="favorites">
            <h1>My Favorites</h1>
          </div>
        </div>  
      </div>
      <div class="wishlist">
        <div class="container wish">
          <div class="item1">
            <div class="row">
              @if(isset($Userwishlist) && !empty($Userwishlist) && count($Userwishlist) > 0)
              @foreach($Userwishlist as $wishlist)
              <div class="col-md-4 col-sm-12 responsive-margin" style="margin-bottom: 30px;">
                <div class="product">
                  <div class="painter-name">
                      <div class="painting-detail">
                        <a href="">{{ $wishlist->title }}</a>
                        <p>{{$wishlist->height}}x{{$wishlist->width}}cm</p>
                      </div>
                      <div class="trash">
                        <a href="javascript:void(0)" class="remove_heart pid_{{ $wishlist->productid }}" data-pid="{{$wishlist->productid}}"><i class="fas fa-trash-alt"></i></a>
                      </div>
                    </div>
                  <div class="painting-pic">
                    <a href="{{url('/product-detail/'.$wishlist->slug)}}">
                      <!-- <img src="{{ url('https://lakouphoto.ca/Artist/public/image/products/'.$wishlist->featuredimage) }}"></a> -->
                      <img src="{{ url('https://lakouphoto.ca/public/image/products/'.$wishlist->featuredimage) }}"></a>
                  </div>
                  <div class="add-price">
                   
                    <div class="paint-price">
                      @if(isset($wishlist->saleprice) && !empty($wishlist->saleprice) && $wishlist->saleprice > 0)
                        {{ $mylibrary->currencyconverterallprice($wishlist->saleprice) }}
                      @else
                        {{ $mylibrary->currencyconverterallprice($wishlist->price) }}
                      @endif
                      
                    </div>
                     <button type="button" class="addcart1" onclick="addcart({{ $wishlist->productid}})" title="Add to Cart" >+ Add to Cart</button>
                  </div>  
                  @if(isset($wishlist->artistid) && !empty($wishlist->artistid) && $wishlist->artistid > 0)
                  @php
                    $artistData = $artist->getArtistdetilesbyId($wishlist->artistid);
                    $artistName = '';
                  @endphp
                  
                  @if(isset($artistData->firstname) &&!empty($artistData->firstname) && isset($artistData->lastname) &&!empty($artistData->lastname))
                   @php $artistName = $artistData->firstname.' '.$artistData->lastname; @endphp
                  @elseif(isset($artistData->firstname) &&!empty($artistData->firstname))
                  @php $artistName = $artistData->firstname; @endphp
                  @endif
                  @php $artistUrl= url('/artist-details/'.$artistData->slug) @endphp
                  <div class="painter-profile">
                    
                    
               
                  </div>
                  @endif
                </div>  
              </div>
              @endforeach
              @else
              <p style="font-size: 25px;">Your Wishlist is empty!</p>
              <div class="empty-wish-img" style="text-align: center;">
                <img src="{{url('/assets/images/wish2.png') }}" style="width: 25%;margin-bottom: 20px;">
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </section>

@extends('frontview.layouts.footer')
@endsection

{{--<div class="painter-pic">
                      <img src="{{ url('public/image/artist/'.$artistData->profileimage) }}">
                      <a href="{{$artistUrl}}">
                        @if(isset($artistName) && !empty($artistName))
                          {{$artistName}}
                        @endif
                       
                       @php
                          $countryData = $Country->getCountrybyId($artistData->countryid);
                        @endphp
                        @if(isset($artistData->bio) && !empty($artistData->bio))
                        @if(strlen($artistData->bio) > 40)
                        @php $dec = substr($artistData->bio, 0, 40) . '...'; @endphp
                        <p>{{$dec}}</p>
                        @else
                        <p>{{$artistData->bio}}</p>
                        @endif
                          
                          
                          @endif
                          <br>
                          <span>{{$artistData->mediums}}, {{$countryData->countryname}}</span>
                        </a>
                      </div>--}}