@extends('frontview.layouts.app')
@extends('frontview.layouts.header')
@section('content')
@inject('Country','App\Models\CountryModel')
@inject('mylibrary', 'App\Helpers\MyLibrary')
        <div class="artist-profile-bg">
        <div class="container cart">
          <div class="row">
            <h2 class="page_title title">{{$ArtistDataArr->firstname}} {{$ArtistDataArr->lastname}}</h2>
            <ul class="breadcrumb">
              <p>{{$ArtistDataArr->mediums}}</p>
              @php
               $countryData = $Country->getCountrybyId($ArtistDataArr->countryid);
              @endphp
              <p>{{$countryData->countryname}}</p>
    
              @if(isset($ArtistDataArr->BornYear) && !empty($ArtistDataArr->BornYear))
              <p>Born in {{$ArtistDataArr->BornYear}}</p>
              @endif
            </ul>
            </div>
        </div>
      </div>
      <div class="artist-detail">
        <div class="container">
          <div class="row">
              <div class="col-md-4 col-sm-12">
                  <div class="artist-detail-img">
                    @if($ArtistDataArr->profileimage)
                      <img src="{{url('https://lakouphoto.ca/Artist/public/image/profile/'.$ArtistDataArr->profileimage) }}" onerror="this.onerror=null;this.src='https://lakouphoto.ca/public/assets/images/lakouphoto.svg';">
                    @else
                      <img src="{{url('https://lakouphoto.ca/public/image/artist/default-artist.svg') }}"onerror="this.onerror=null;this.src='https://lakouphoto.ca/public/assets/images/lakouphoto.svg';">
                    @endif  
                  </div>
              </div>
              <div class="col-md-8 col-sm-12">
                <div class="profile-text">
                  <!-- <h3>A Few word about me</h3> -->
                  <!-- <h3>"Art is not what you see,but what you make other see"</h3> -->
                  <p>{{strip_tags($ArtistDataArr->bio)}}</p>
                </div>  
              </div>
          </div>
         </div> 
      </div>

      @if(isset($catalist) && !empty($catalist) && count($catalist) > 0)
      <div class="artist-art">
          <div class="art-head">
              <h3 style="text-align: center; color: white;font-weight: bold;font-size: 25px;">Artworks by {{$ArtistDataArr->firstname}} {{$ArtistDataArr->lastname}}</h3>
          </div>

         @foreach($catalist as $catData)
         
          <div class="art-works">
            <h3 style="text-align: center;margin-bottom: 22px;font-size: 22px;font-weight: bold;">{{$catData->name}}</h3>
              @if(isset($RelatedProdects) && !empty($RelatedProdects) && count($RelatedProdects))
              
              <div class="row">
                <div class="container"> 
                @foreach($RelatedProdects as $relatedpro)
                @if($relatedpro->categoryid == $catData->id)
                @php                   
                  $prodecturl = url('product-detail/'.$relatedpro->slug);
                @endphp 
                <a  href="{{$prodecturl}}">
                  <div class="col-md-3 col-sm-12 p-0">
                    <div class="art1">
                        <!-- <img src="{{ url('https://lakouphoto.ca/public/image/products/'.$relatedpro->featuredimage) }}"onerror="this.onerror=null;this.src='https://lakouphoto.ca/public/assets/images/lakouphoto.svg';"> -->
                        <img src="{{ url('https://lakouphoto.ca/Artist/public/image/products/'.$relatedpro->featuredimage) }}"onerror="this.onerror=null;this.src='https://lakouphoto.ca/public/assets/images/lakouphoto.svg';">
                        <a href="{{$prodecturl}}">
                      <div class="overlay">
                          <div class="text"><i class="far fa-eye"></i></div>
                      </div>
                    </a>
                        <div class="art-detail">
                            <p style="margin: -7px 0px !important;">{{$relatedpro->title}}</p>
                            <p style="font-weight: bold;margin: 10px 0px;">{{$relatedpro->height}}*{{$relatedpro->width}}cm, 
                              @if(isset($relatedpro->saleprice) && !empty($relatedpro->saleprice) && $relatedpro->saleprice > 0)
                             <strong>{{ $mylibrary->currencyconverterallprice($relatedpro->saleprice) }}</strong>
                             @else
                               {{ $mylibrary->currencyconverterallprice($relatedpro->price) }}
                             @endif
                            </p>
                        </div>
                    </div> 

                    </div>
                </a>
                  @endif
                @endforeach 
                </div> 
              </div>
              @endif
              @php 
              $caturl = url('artist-products/'.$ArtistDataArr['slug'].'/'.$catData->slug); @endphp
                <div class="view-more">
                    <button class="view-btn" onclick="window.location.href = '{{$caturl}}';"><i class="fas fa-plus" style="padding: 0px 12px 0px 0px;"></i>View More</button>
                </div>
          </div>
          @endforeach
       </div>
       @endif
          



  <script><!--
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
    
@extends('frontview.layouts.footer')
@endsection