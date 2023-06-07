
<?php 
use App\Models\SeoModel;
$seo = SeoModel::get()->where('id',2)->first();
?>

<meta name="title" content="{{$seo->title ?? ''}}">
<meta name="description" content="{{$seo->description ?? ''}}">
<meta name="keywords" content="{{$seo->keywords ?? ''}}"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="author" content="{{$seo->author ?? ''}}">

@inject('mylibrary', 'App\Helpers\MyLibrary')
@if(!Request::ajax())
@extends('frontview.layouts.app')

@extends('frontview.layouts.header')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
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
    <!-- FILTER SEARCH -->
    <section class="searchV2 filters">
      <h4>My search</h4>
        @if(isset($catagoryId) && !empty($catagoryId))
        <input type="hidden" name="searchurl" id="searchurl" value="{{ url('/product-cat/'.$CurrentpageUrl)}}">
        @else
        <input type="hidden" name="searchurl" id="searchurl" value="{{ url('/products-list')}}">
        @endif
      @if(isset($CurrentpageUrl) && !empty($CurrentpageUrl))
      @php $prcat = $CurrentpageUrl; @endphp
      @else
      @php $prcat = ''; @endphp
      @endif

  <input type="hidden" name="paranecatid" id="paranecatid" value="{{$prcat}}">
      @if(isset($seaech) && !empty($seaech))
      @php $seaechData = $seaech; @endphp
      @else
      @php $seaechData = ''; @endphp
      @endif
  <input type="hidden" name="seaech" id="seaechdata" value="{{$seaechData}}">
      @if(isset($artist_id) && !empty($artist_id))
      @php $artistId = $artist_id; @endphp
      @else
      @php $artistId = ''; @endphp
      @endif
  <input type="hidden" name="artist_id" id="artist_id" value="{{$artistId}}">
  @if(isset($cat_slug) && !empty($cat_slug))
      @php $cat_slug = $cat_slug; @endphp
      @else
      @php $cat_slug = ''; @endphp
      @endif
  <input type="hidden" name="cat_slug" id="cat_slug" value="{{$cat_slug}}">

  
  
  <section class="filters-primary js-categorization-desktop">
    <div class="filters-primary-categories">
      <div class="container">
        <div class="row">
          @if(isset($parantcatList) && !empty($parantcatList))
          <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="custom-select">
              <span class="checked"><i class="fas fa-check" aria-hidden="true"></i></span>
              <select id="paranetcat">
                <option selected disabled >Medium</option>
                @foreach($parantcatList as $paranetcat)
                @if(isset($catagoryId) && !empty($catagoryId) && $catagoryId == $paranetcat->id)
                @php $selectedcat = 'selected'; @endphp
                @else
                @php $selectedcat = ''; @endphp
                @endif
                <option value="{{$paranetcat->slug}}" {{$selectedcat}}>{{$paranetcat->name}}</option>
                @endforeach
                
                
              </select>
            </div>
          </div>
          @endif
          @if(isset($catdata) && !empty($catdata) && count($catdata) > 0)
        
          
          <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="custom-select">
              <span class="checked"><i class="fas fa-check" aria-hidden="true"></i></span>
              <select id="ThemesData">
                <option selected disabled >Themes</option>
                @if(isset($catdata[0]) && !empty($catdata[0]) && count($catdata[0]) > 0)
                @foreach($catdata[0] as $theme)
                <option value="{{$theme->id}}">{{$theme->name}}</option>
                @endforeach
                 @endif
              </select>
            </div>
          </div>
         
         
          <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="custom-select">
              <span class="checked"><i class="fas fa-check" aria-hidden="true"></i></span>
              <select id="StylesData">
                <option selected disabled >Styles</option>
                 @if(isset($catdata[1]) && !empty($catdata[1]) && count($catdata[1]) > 0)
                @foreach($catdata[1] as $Styles)
                <option value="{{$Styles->id}}">{{$Styles->name}}</option>
                @endforeach
                @endif
              </select>
            </div>
          </div>
          
          
          <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="custom-select">
              <span class="checked"><i class="fas fa-check" aria-hidden="true"></i></span>
              <select id="TechniquesData">
                <option selected disabled >Techniques</option>
                @if(isset($catdata[2]) && !empty($catdata[2]) && count($catdata[2]) > 0)
                @foreach($catdata[2] as $Techniques)
                <option value="{{$Techniques->id}}">{{$Techniques->name}}</option>
                @endforeach
                @endif
              </select>
            </div>
          </div>
          
          @endif
        </div>
      </div>
    </div>
  </section>
  <section class="filter-second">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info">
            <div class="title">Price</div>
            <div class="labelHolder" id="labelHolder ">
              <input type="text" id="amount" style="border: 0; font-weight: bold;" />
            </div>
          </div>

          <div class="slider-wrapper slider-gaia">
              <input class="input-range" id="priceRange" type="text" data-slider-step="100" data-slider-value="49, 20000" data-slider-min="49" data-slider-max="20000" data-slider-range="true" data-slider-tooltip_split="true" data-slider-tooltip="always" />
          </div>

        </div>
        <input type="hidden" name="orientation" id="orientationids" value="">
        <div class="col-md-2 filter-orientation" id="table-filters">
          <div class="title">Orientation</div>
          <ul style="margin: 0px 38px;">
            @foreach($Orientation as $orien)
            <li onclick="selectOrientation('{{$orien->id}}')">
              <i class="{{$orien->name}}" id="ori-{{$orien->id}}"  rel="tooltip" title="{{$orien->name}}" data-toggle="tooltip" data-placement="top" data-orientation="{{$orien->name}}"><span class="{{$orien->name}}"></span></i>
            </li>
            @endforeach
           
          </ul>
        </div>
        <input type="hidden" name="size" id="size" value="">
        <div class="col-md-2 filter-size" id="table-size">
          <div class="title">Size</div>
          <ul>
            @foreach($Size as $sizedata)
            <li onclick="selectsize('{{$sizedata->id}}')"><i class="far fa-image {{strtolower($sizedata->name)}}" rel="tooltip" id="size-{{$sizedata->id}}" title="{{strtolower($sizedata->name)}}" data-toggle="tooltip" data-placement="top" data-size="{{strtolower($sizedata->name)}}" aria-hidden="true"></i></li>
            @endforeach
          </ul>
        </div>
        <div class="col-md-2 filter-height">
          <div class="info info">
            <div class="title">Height</div>
            <!-- <div class="labelHolder" id="labelHolder">
              <input type="text" id="height" style="border: 0; font-weight: bold;" />
            </div> -->
          </div>

          <div class="slider-wrapper slider-gaia">
              <input class="input-range" id="height-range" type="text" data-slider-step="10" data-slider-value="9, 999" data-slider-min="9" data-slider-max="1000" data-slider-range="true" data-slider-tooltip_split="true" data-slider-tooltip="always" />
          </div>
        </div>
        <div class="col-md-2 filter-width">
          <div class="info">
            <div class="title">Width</div>
            <div class="labelHolder" id="labelHolder">
              <input type="text" id="width" style="border: 0; font-weight: bold;" />
            </div>
          </div>

           <div class="slider-wrapper slider-gaia">
              <input class="input-range" id="width-range" type="text" data-slider-step="10" data-slider-value="9, 999" data-slider-min="9" data-slider-max="1000" data-slider-range="true" data-slider-tooltip_split="true" data-slider-tooltip="always" />
          </div>
        </div>
        <div class="col-md-1">
          <div class="filter-colors">
            <div class="title">Colour</div>
            <div class="color-selector">
              <img src="{{url('assets/images/color-wheel (1).png')}}" width="33" alt="Colour" />
              <span class="caret"></span>
            </div>
            <input type="hidden" name="colorcode" id="colorcode" value="">
            <div class="color-palet">
              <div class="close"><i class="fa fa-close" aria-hidden="true"></i></div>
              <div class="subtitle">Select one or more colors</div>
              <ul>
                @foreach($ColorCode as $Color)
                <li><a style="background-color: {{$Color->colorcode}};" onclick="selectColor('{{$Color->id}}')" data-c="{{$Color->colorcode}}" data-color-id="{{$Color->id}}"></a></li>
                @endforeach
              </ul>
              <div class="buttons">
                <a id="resetColors" onclick="ResetColor()" class="button secondary rounded">Reset</a>
                <a id="applyColors" disabled="" onclick="ApplyColor()" class="off button primary rounded">Apply</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>
    <div id="product-category" class="container">
      <ul class="breadcrumb">
        <li><a href="{{url('/homepage')}}">home</a></li>
        @if(isset($catagoryId) && !empty($catagoryId))
        <li><a href="{{ url('/product-cat/'.$CurrentpageUrl)}}">{{$Currentpagename}}</a></li>
        @else
        <li><a href="{{ url('/products-list')}}">{{$Currentpagename}}</a></li>
        @endif
      </ul>
          <script>
            <!--
            if($('#banner0 .swiper-slide').length > 1) {
            	$('#banner0').swiper({
            		effect: 'fade',
            		autoplay: 2500,
            		autoplayDisableOnInteraction: false
            	});
            }
            -->
          </script>



    <!-- MOBILE MENU     -->
    <div class="container demo">
      <div class="text-center">
        <button type="button" class="btn btn-demo" data-toggle="modal" data-target="#myModal2">
          <div class="text-center">
            <a href="#" class="modal-filters__toggle" data-toggle="modal" data-target="#modal-filter" rel="nofollow">Show filters <i class="fas fa-cog" aria-hidden="true"></i></a>
          </div>
        </button>
      </div>

      <!-- Modal -->
      <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-filters__container" role="document">
          <div class="modal-filters__header js-header">
            <div class="modal-filters__title">Filter</div>
            <div class="modal-filters__close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times" aria-hidden="true"></i></div>
          </div>
          <div class="modal-filters__content">
            <div class="row">
              <div class="col-xs-12">
                <form class="form-filters" action="" id="form-search-mobile">
                  <div class="container">
                    @if(isset($parantcatList) && !empty($parantcatList))
                     <div class="custom-select">
                        <span class="checked"><i class="fas fa-check" aria-hidden="true"></i></span>
                        <select id="paranetcatmob">
                          <option selected disabled >Medium</option>
                          @foreach($parantcatList as $paranetcat)
                          @if(isset($catagoryId) && !empty($catagoryId) && $catagoryId == $paranetcat->id)
                          @php $selectedcat = 'selected'; @endphp
                          @else
                          @php $selectedcat = ''; @endphp
                          @endif
                          <option value="{{$paranetcat->slug}}" {{$selectedcat}}>{{$paranetcat->name}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                    @endif  
                    <div class="custom-class">
                     <div class="custom-select">
                        <span class="checked"><i class="fas fa-check" aria-hidden="true"></i></span>
                       <select id="Themesdatamob">
                          <option selected disabled >Themes</option>
                          @if(isset($catdata[0]) && !empty($catdata[0]) && count($catdata[0]) > 0)
                          @foreach($catdata[0] as $theme)
                          <option value="{{$theme->id}}">{{$theme->name}}</option>
                          @endforeach
                           @endif
                        </select>
                      </div>
                    <div class="filter-ruler ruler-height">
                        <div class="filter-infos" style="display: flex; justify-content: space-between;">
                          <div class="title">Price</div>
                         <!--  <div class="labelHolder" id="labelHolder ">
                          <input type="text" id="amount" style="border: 0; font-weight: bold;" />
                        </div> -->
                      </div>

                      <div class="slider-wrapper slider-gaia">
                          <input class="input-range" id="mobilepriceRange" type="text" data-slider-step="100" data-slider-value="49, 20000" data-slider-min="49" data-slider-max="20000" data-slider-range="true" data-slider-tooltip_split="true" data-slider-tooltip="always" />
                      </div>     
                    </div>
                   <div class="custom-select">
                    <span class="checked"><i class="fas fa-check" aria-hidden="true"></i></span>
                    <select id="StylesDatamob">
                      <option selected disabled >Styles</option>
                      @if(isset($catdata[1]) && !empty($catdata[1]) && count($catdata[1]) > 0)
                      @foreach($catdata[1] as $Styles)
                      <option value="{{$Styles->id}}">{{$Styles->name}}</option>
                      @endforeach
                      @endif
                      
                    </select>
                      </div>
                     <div class="custom-select">
                      <span class="checked"><i class="fas fa-check" aria-hidden="true"></i></span>
                      <select id="TechniquesDatamob">
                        <option selected disabled >Techniques</option>
                        @if(isset($catdata[2]) && !empty($catdata[2]) && count($catdata[2]) > 0)
                        @foreach($catdata[2] as $Techniques)
                        <option value="{{$Techniques->id}}">{{$Techniques->name}}</option>
                        @endforeach
                        @endif
                      </select>
                    </div>
                    <div class="form-filters__buttons-list" id="table-filtersmob">
                      <div class="title">Orientation</div>
                    
                        <ul>
                       @foreach($Orientation as $orien)
                          <li onclick="selectOrientationmob('{{$orien->id}}')">
                            <button type="button" class="js-button-orientation" id="orimob-{{$orien->id}}" data-orientation="{{$orien->name}}"><span class="{{$orien->name}}"></span></button>
                          </li>
                          @endforeach

                      </ul>
                    </div>
                    <div class="form-filters__buttons-list" id="table-sizemob">
                      <div class="title">Size</div>
                      <ul>
                        @foreach($Size as $sizedata)
                        <li onclick="selectsizemob('{{$sizedata->id}}')">
                          <button type="button" class="js-button-size" id="sizemob-{{$sizedata->id}}" data-size="{{strtolower($sizedata->name)}}"><span class="{{strtolower($sizedata->name)}}-size far fa-image" aria-hidden="true"></span></button>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="form-filters__slider">
                      <div class="filter-ruler ruler-height">
                        <div class="filter-infos" style="display: flex; justify-content: space-between;">
                          <div class="title">Height</div>
                          <!-- <div class="input-ruler-values">
                            <span>0</span> -
                            <span>350</span>
                            cm
                          </div> -->
                        </div>
                        <div class="slider-wrapper slider-gaia">
                          <input class="input-range" id="mobile-height-range" type="text" data-slider-step="10" data-slider-value="9, 999" data-slider-min="9" data-slider-max="1000" data-slider-range="true" data-slider-tooltip_split="true" data-slider-tooltip="always" />
                      </div>
                      </div>
                    </div>
                    <div class="form-filters__slider width">
                      <div class="filter-ruler ruler-width">
                        <div class="filter-infos" style="display: flex; justify-content: space-between;">
                          <div class="title">Width</div>
                        </div>
                      <div class="slider-wrapper slider-gaia">
                          <input class="input-range" id="mobile-width-range" type="text" data-slider-step="10" data-slider-value="9, 999" data-slider-min="9" data-slider-max="1000" data-slider-range="true" data-slider-tooltip_split="true" data-slider-tooltip="always" />
                      </div>

                      </div>
                    </div>
                    <div class="form-filters__buttons-list">
                      <div class="title">Colour</div>
                      <ul>
                        @foreach($ColorCode as $Color)
                        <li onclick="selectColor('{{$Color->id}}')">
                          <button type="button" class="color-block js-color-button"  data-c="{{$Color->colorcode}}"><span style="background-color: {{$Color->colorcode}};"></span></button>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                      <!--                     <div class="">
                      <label class="form-filters__label" for="fsm-order">Sort by</label>
                      <div class="custom-select">
                          <span class="checked"><i class="fas fa-check" aria-hidden="true"></i></span>
                          <select>
                            <option selected disabled>Select</option>
                            <option >Revelance</option>
                            <option >Most Recent</option>
                            
                          </select>
                        </div>
                    </div> -->
                  </div>
                  <div class="filters-primary-my-search hidden">
                    <div class="title">Enter key words</div>
                    <div class="bootstrap-tagsinput"><input type="text" placeholder="" /></div>
                    <input type="text" autocomplete="off" class="ac-tags-mobile" style="display: none;" />
                  </div>
                  
                
              </div>
              <div class="form-filters__actions modal-filters__footer">
                    <button type="button" onclick="ClearAll()" class="white button button--fix button--form delete" id="mobile-filters-clear">Clear all</button>
                    <button class="secondary button button--fix button--form cta" onclick="refinesearch()" type="button">See results</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- MOBILE MENU END -->


        <div id="content" class="col-sm-12">
          <h2 class="page_title">{{$Currentpagename}}</h2>
          
          <div class="cat_info">
            <div class="row">
              <div class="col-sm-2 col-xs-5 cat_list_gird">
                <div class="btn-group btn-group-sm">
                  <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="icon-grid"></i></button>
                  <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i class="icon-list"></i></button>
                </div>
              </div>
              
            </div>
          </div>
          
         
          <div class="row category-row" id="postdata">
            @endif
             @if(isset($productsArr) && !empty($productsArr) && count($productsArr) > 0)
            @foreach($productsArr as $products)
            @php                                                         
            $prodecturl = url('product-detail/'.$products->slug);
            @endphp 
            <div class="product-layout product-list col-xs-12">
              <div class="product-thumb">
                <div class="image">
                  <!-- <a href="{{$prodecturl}}">
                    @if($products->featuredimage)
                    <img src="{{ url('image/products/'.$products->featuredimage) }}" alt="{{ $products->title }}" title="{{ $products->title }}" class="img-responsive"onerror="this.onerror=null;this.src='https://test.maquinistas.in/Lakou/public/assets/images/lakouphoto.svg';" />
                    @else
                    <img src="https://lakouphoto.ca/public/image/artist/default-artist.svg" alt="{{ $products->title }}" title="{{ $products->title }}" class="img-responsive"onerror="this.onerror=null;this.src='https://test.maquinistas.in/Lakou/public/assets/images/lakouphoto.svg';" />
                    @endif
                    @if(isset($products['images']) && !empty($products['images']))
                      @php $imageArr = explode('|',$products['images']->mediaurl); @endphp
                        <img class="img-responsive hover-img" src="{{ url($imageArr[0]) }}" title="{{ $products->title }}" alt="{{ $products->title }}"onerror="this.onerror=null;this.src='https://test.maquinistas.in/Lakou/public/assets/images/lakouphoto.svg';" />
                    @else
                        <img class="img-responsive hover-img" src="{{ url('public/image/products/'.$products->featuredimage) }}" title="{{ $products->title }}" alt="{{ $products->title }}"onerror="this.onerror=null;this.src='https://test.maquinistas.in/Lakou/public/assets/images/lakouphoto.svg';" />
                    @endif
                  </a> -->
                   <a href="{{$prodecturl}}">
                    @if($products['featuredimage'])
                        @if($products['artistid'] == '0')
                          <img src="{{ url('image/products/'.$products->featuredimage) }}" alt="{{ $products->title }}" title="{{ $products->title }}" class="img-responsive"onerror="this.onerror=null;this.src='https://test.maquinistas.in/Lakou/public/assets/images/lakouphoto.svg';" />
                          @else
                          <img src="{{url('https://lakouphoto.ca/Artist/public/image/products/'.$products['featuredimage'])}}" title="{{ $products['title'] }}" id="zoom" alt="Impasto" data-zoom-image="{{url('https://lakouphoto.ca/Artist/public/image/products/'.$products['featuredimage'])}}" />
                        @endif


                        @if(isset($products['images']) && !empty($products['images']))
                          @php $imageArr = explode('|',$products['images']->mediaurl); @endphp
                            <img class="img-responsive hover-img" src="{{url('https://lakouphoto.ca/Artist/public/image/products/'.$products['featuredimage'])}}" title="{{ $products->title }}" alt="{{ $products->title }}"onerror="this.onerror=null;this.src='https://test.maquinistas.in/Lakou/public/assets/images/lakouphoto.svg';" />
                        @else
                            <img class="img-responsive hover-img" src="{{ url('image/products/'.$products->featuredimage) }}" title="{{ $products->title }}" alt="{{ $products->title }}"onerror="this.onerror=null;this.src='https://test.maquinistas.in/Lakou/public/assets/images/lakouphoto.svg';" />
                        @endif
                  
                      @else
                     
                      
                      @endif
                  </a>

                  <div class="button-group">
                                                                                <?php
                                                            
                                                                $activeClass = "";
                                                                $pid = $products->id;
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
                     <button type="button"  data-toggle="tooltip" data-pid="{{$products->slug}}" class="quickview-button Click-here" title="Quickview"  >
                   
                                                                <i class="icon-eye"></i>
                                                            </button>
                    <!-- <button type="button" class="compare" data-toggle="tooltip" title="Add To Compare" onclick="compare.add('41');"><i class="icon-change"></i></button> -->
                  </div>
                </div>

                <div class="thumb-description clearfix">
                  <div class="caption">
                    <h4 class="product-title"><a href="{{$prodecturl}}">{{ $products->title }}</a></h4>
                    <p class="price">

                     @if(isset($products->saleprice) && !empty($products->saleprice) && $products->saleprice > 0)
                     <span class="price-new">{{ $mylibrary->currencyconverterallprice($products->saleprice) }}</span>
                     <span class="price-old">{{ $mylibrary->currencyconverterallprice($products->price) }}</span>
                     @else
                       <span class="price-new">{{ $mylibrary->currencyconverterallprice($products->price) }}</span>
                     @endif
                    </p>

                <div class="rating clearfix">
                                                              @php 
                                                              $star1 = '';
                                                               $RatingData = $mylibrary->getprodectreview($products->id) @endphp
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
                    <p class="description">
                      Just when you thought iMac had everything, now there´s even more. More powerful Intel Core 2 Duo processors. And more memory standard. Combine this with Mac OS X Leopard and iLife ´08, and it´s more a adgrawsgrw..
                    </p>
                     @if(isset($products->availability) && $products->availability == 'In stock')
                     @if(isset($Front_user_id) && !empty($Front_user_id))
                    <button type="button" class="addcart" title="Add to Cart" onclick="addcart({{ $products->id}})">+ Add to Cart</button>
                    @else
                    <a href="{{ url('/userlogin') }}" class="addcart" title="Add to Cart">+ Add to Cart</a>
                    @endif
                    @endif

                    <!-- <div class="button-group btn-list">
                      <button type="button" class="addcart-list" title="Add to Cart" onclick="addcart({{ $products->id}})">Add to Cart</button>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            @endif
            @if(!Request::ajax())
          </div>
          <div class="pro_pagination clearfix">
            <div class="col-sm-6 text-left" id="totalpage">Showing {{($productsArr->currentPage()-1)* $productsArr->perPage()+($productsArr->total() ? 1:0)}} to {{($productsArr->currentPage()-1)*$productsArr->perPage()+count($productsArr)}} of {{$productsArr->total()}} ({{$productsArr->currentPage()}} Pages)</div>
            <div class="col-sm-6 text-right">
              <ul class="pagination" id="paginationdiv">
                
                 {{ $productsArr->links('frontview.pagination.pagination') }}
              </ul>
            </div>
          </div>
          
        </div>
      </div>
   
    <!-- top scroll -->
    <a href="#" class="scrollToTop back-to-top" data-toggle="tooltip" title="Top"><i class="icon-paint-brush"></i></a>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<!-- <script src="/lakouphoto-design/js/jquery-ui.js"></script> -->
 <div class="custom-model-main">
    <div class="custom-model-inner">        
    <div class="close-btn">×</div>
        <div class="custom-model-wrap">
           <div class="quickview-wrapper-inner container">
                <div class="quickview-container">
                    <div class="row pro-deatils">
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


var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;

for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  b.setAttribute('onclick', 'refinesearch()');
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);

      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>

<script type="text/javascript">
  $('.filter-colors .color-selector').click(function(){
  $('.color-palet').toggleClass('open');
});
$('.color-palet ul li').click(function(){


  $(this).find('a').toggleClass('active');
  var count = $('.color-palet ul li').filter(function(){return $(this).find('a').hasClass("active");});

  if(count.length){
    $('#applyColors').removeClass('off');
    $('#applyColors').attr('disabled', '');
  }else{
    $('#applyColors').addClass('off');
    $('#applyColors').attr('disabled', 'disabled');
  }

})
$('.color-palet .close').click(function(){


  $('.color-palet').removeClass('open');
});


$( "#amount" ).val( xx.format($( "#slider-range" ).slider( "values", 0 )) +
 " - " + xx.format($( "#slider-range" ).slider( "values", 1 )) );

$('#amount').focusout(function(){
 var sliderVal = $(this).val();
 var splitSliderVal = sliderVal.replace(/\$/g, '').split('-');
 $( "#slider-range" ).slider({
  values: [ parseInt(splitSliderVal[0]), parseInt(splitSliderVal[1]) ]
});
});





</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>

<script type="text/javascript">
  (function ($) {
  $(document).ready(function () {
    $("#priceRange").each(function () {
      var slidervalue = $(this).attr("data-slider-value");
      var separator = slidervalue.indexOf(",");
      if (separator !== -1) {
        slidervalue = slidervalue.split(",");
        slidervalue.forEach(function (item, i, arr) {
          arr[i] = parseFloat(item);
        });
      } else {
        slidervalue = parseFloat(slidervalue);
      }

      $(this).slider({
        formatter: function (slidervalue) {
          return "$" + slidervalue;
        },
        min: parseFloat($(this).attr("data-slider-min")),
        max: parseFloat($(this).attr("data-slider-max")),
        range: $(this).attr("data-slider-range"),
        value: slidervalue,
        tooltip_split: $(this).attr("data-slider-tooltip_split"),
        tooltip: $(this).attr("data-slider-tooltip"),
        tooltip_position: "bottom"
      });

      $("#priceRange").change(function() {
        refinesearch();
      });
    });
  });
})(jQuery);

</script>
<script type="text/javascript">
  (function ($) {
  $(document).ready(function () {
    $("#height-range").each(function () {
      var slidervalue = $(this).attr("data-slider-value");
      var separator = slidervalue.indexOf(",");
      if (separator !== -1) {
        slidervalue = slidervalue.split(",");
        slidervalue.forEach(function (item, i, arr) {
          arr[i] = parseFloat(item);
        });
      } else {
        slidervalue = parseFloat(slidervalue);
      }

      $(this).slider({
        formatter: function (slidervalue) {
           return slidervalue;
        },
         min: parseFloat($(this).attr("data-slider-min")),
         max: parseFloat($(this).attr("data-slider-max")),
         range: $(this).attr("data-slider-range"),
        value: slidervalue,
         tooltip_split: $(this).attr("data-slider-tooltip_split"),
         tooltip: $(this).attr("data-slider-tooltip"),
         tooltip_position: "bottom"
      });
      $("#height-range").change(function() {
        refinesearch();
      });
     
      //Onchange function checkbox on/off
    });

   
  });
})(jQuery);
</script>

<script type="text/javascript">
  (function ($) {
  $(document).ready(function () {
    $("#width-range").each(function () {
      var slidervalue = $(this).attr("data-slider-value");
      var separator = slidervalue.indexOf(",");
      if (separator !== -1) {
        slidervalue = slidervalue.split(",");
        slidervalue.forEach(function (item, i, arr) {
          arr[i] = parseFloat(item);
        });
      } else {
        slidervalue = parseFloat(slidervalue);
      }

      $(this).slider({
        formatter: function (slidervalue) {
           return slidervalue;
        },
         min: parseFloat($(this).attr("data-slider-min")),
         max: parseFloat($(this).attr("data-slider-max")),
         range: $(this).attr("data-slider-range"),
         value: slidervalue,
         tooltip_split: $(this).attr("data-slider-tooltip_split"),
         tooltip: $(this).attr("data-slider-tooltip"),
         tooltip_position: "bottom"
      });
      $("#width-range").change(function() {
        refinesearch();
      });
     
      //Onchange function checkbox on/off
    });

   
  });
})(jQuery);
</script>

<!-- mobile script -->
<script type="text/javascript">
  (function ($) {
  $(document).ready(function () {
    $("#mobilepriceRange").each(function () {
      var slidervalue = $(this).attr("data-slider-value");
      var separator = slidervalue.indexOf(",");
      if (separator !== -1) {
        slidervalue = slidervalue.split(",");
        slidervalue.forEach(function (item, i, arr) {
          arr[i] = parseFloat(item);
        });
      } else {
        slidervalue = parseFloat(slidervalue);
      }

      $(this).slider({
        formatter: function (slidervalue) {
          return "$" + slidervalue;
        },
        min: parseFloat($(this).attr("data-slider-min")),
        max: parseFloat($(this).attr("data-slider-max")),
        range: $(this).attr("data-slider-range"),
        value: slidervalue,
        tooltip_split: $(this).attr("data-slider-tooltip_split"),
        tooltip: $(this).attr("data-slider-tooltip"),
        tooltip_position: "bottom"
      });

      //Onchange function checkbox on/off
    });

  
  });
})(jQuery);

</script>

<script type="text/javascript">
  (function ($) {
  $(document).ready(function () {
    $("#mobile-height-range").each(function () {
      var slidervalue = $(this).attr("data-slider-value");
      var separator = slidervalue.indexOf(",");
      if (separator !== -1) {
        slidervalue = slidervalue.split(",");
        slidervalue.forEach(function (item, i, arr) {
          arr[i] = parseFloat(item);
        });
      } else {
        slidervalue = parseFloat(slidervalue);
      }

      $(this).slider({
        formatter: function (slidervalue) {
           return slidervalue;
        },
         min: parseFloat($(this).attr("data-slider-min")),
         max: parseFloat($(this).attr("data-slider-max")),
         range: $(this).attr("data-slider-range"),
        value: slidervalue,
        tooltip_split: $(this).attr("data-slider-tooltip_split"),
        tooltip: $(this).attr("data-slider-tooltip"),
        tooltip_position: "bottom"
      });

     
      //Onchange function checkbox on/off
    });

   
  });
})(jQuery);
</script>


<script type="text/javascript">
  (function ($) {
  $(document).ready(function () {
    $("#mobile-width-range").each(function () {
      var slidervalue = $(this).attr("data-slider-value");
      var separator = slidervalue.indexOf(",");
      if (separator !== -1) {
        slidervalue = slidervalue.split(",");
        slidervalue.forEach(function (item, i, arr) {
          arr[i] = parseFloat(item);
        });
      } else {
        slidervalue = parseFloat(slidervalue);
      }

      $(this).slider({
        formatter: function (slidervalue) {
          return slidervalue;
        },
        min: parseFloat($(this).attr("data-slider-min")),
        max: parseFloat($(this).attr("data-slider-max")),
        range: $(this).attr("data-slider-range"),
        value: slidervalue,
        tooltip_split: $(this).attr("data-slider-tooltip_split"),
        tooltip: $(this).attr("data-slider-tooltip"),
        tooltip_position: "bottom"
      });

     
      //Onchange function checkbox on/off
    });

   
  });
})(jQuery);



var uri = window.location.toString();

if (uri.indexOf("#") > 0) {
    var afterHash = window.location.hash.substr(1);

    if (afterHash == Number.NaN || afterHash <= 0) {
        var clean_uri = uri.substring(0, uri.indexOf("#"));
        window.history.replaceState({}, document.title, clean_uri);
    } else {
        getPosts(afterHash);
    }
}

$(window).on('hashchange', function () {
    if (window.location.hash) {
        var page = parseInt(window.location.hash.replace('#', ''));
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            getPosts(page);
        }
    }
});

$(document).on('click', '#paginationdiv a', function (e) {
    var page = $(this).attr('href').split('page=')[1];
    window.location.hash = page;
    e.preventDefault();
});

function getPosts(page) {

    var ThemesData = $("#ThemesData").val();
    if(ThemesData == null && ThemesData != ""){
     ThemesData = $("#Themesdatamob").val();
    }
    var StylesData = $("#StylesData").val();
    if(StylesData == null && StylesData != ""){
     StylesData = $("#StylesDatamob").val();
    }
    
    var TechniquesData = $("#TechniquesData").val();
    if(TechniquesData == null && TechniquesData != ""){
     TechniquesData = $("#TechniquesDatamob").val();
    }
    var searchurl = $("#searchurl").val();
    var svlidervalue = $('#priceRange').val();
    var slidersvalue = svlidervalue.split(",");
    var minprice = slidersvalue['0'];
    var maxprice = slidersvalue['1'];
    if(minprice == 49 && maxprice == 20000){
      var svlidermobvalue = $('#mobilepriceRange').val();
      var slidersmobvalue = svlidermobvalue.split(",");
       minprice = slidersmobvalue['0'];
       maxprice = slidersmobvalue['1'];
    }
    var orientation = $("#orientationids").val();
    var size = $("#size").val();
    var heightslidervalue = $('#height-range').val();
    var heightsvalue = heightslidervalue.split(",");
    var minheight = heightsvalue['0'];
    var maxheight = heightsvalue['1'];
    if(minheight == 9 && maxheight == 999){
      var heightslidervaluemob = $('#mobile-height-range').val();
      var heightsvaluemob = heightslidervaluemob.split(",");
       minheight = heightsvaluemob['0'];
       maxheight = heightsvaluemob['1'];
    }
    var widthslidervalue = $('#width-range').val();
    var widthsvalue = widthslidervalue.split(",");
    var minwidth = widthsvalue['0'];
    var maxwidth = widthsvalue['1'];
    if(minheight == 9 && maxheight == 999){
      var widthslidervaluemob = $('#mobile-width-range').val();
      var widthsvaluemob = widthslidervaluemob.split(",");
       minwidth = widthsvaluemob['0'];
       maxwidth = widthsvaluemob['1'];
    }

    var color = $("#colorcode").val();
    var seaech = $("#seaechdata").val();
    var artist_id = $("#artist_id").val();
    var cat_slug = $("#cat_slug").val();
    $.ajax({
        url: searchurl,
        type: "post",
        data: {
            ThemesData: ThemesData,
            StylesData:StylesData,
            TechniquesData:TechniquesData,
            minprice:minprice,
            maxprice:maxprice,
            orientation:orientation,
            size:size,
            minheight:minheight,
            maxheight:maxheight,
            minwidth:minwidth,
            maxwidth:maxwidth,
            color:color,
            seaech:seaech,
            artist_id:artist_id,
            cat_slug:cat_slug,
            page: page
        },
        dataType: 'json',
    }).done(function (data) {
        // $("#overlay").css({"display": "none", "opacity": "0"});
       // $("#pgloader").css("display", "none");
        $('#postdata').html(data.html);
        $('#paginationdiv').html(data.pagination);
        $('#totalpage').html(data.totalpagecount);

      var cols = $('#column-right, #column-left').length;

      if (cols == 2) {
        $('#content .product-list').attr('class', 'product-layout product-grid col-lg-6 col-md-6 col-sm-4 col-xs-4');
      } else if (cols == 1) {
        $('#content .product-list').attr('class', 'product-layout product-grid col-lg-4 col-md-4 col-sm-4 col-xs-4');
      } else {
        $('#content .product-list').attr('class', 'product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-4');
      }

      $('#list-view').removeClass('active');
      $('#grid-view').addClass('active');

      localStorage.setItem('display', 'grid');
        
        
    }).fail(function () {
        alert('Posts could not be loaded.');
    });
}

</script>
<script type="text/javascript">
    $(".Click-here").on('click', function() {
        var id = $(this).data('pid');
        var APP_URL = $('meta[name="_base_url"]').attr('content');
        var url = APP_URL+"/quickview/"+id+"/view";

         $.get(url, function (data) {

               
               
     $(".custom-model-main").addClass('model-open');
     $('.pro-deatils').html(data.html);
   
     
    
 });
}); 
$(".close-btn, .bg-overlay").click(function(){
  $(".custom-model-main").removeClass('model-open');
});


</script>

</div>
@extends('frontview.layouts.footer')
@endsection
@endif
