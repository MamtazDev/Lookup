@if(!Request::ajax())
@inject('mylibrary', 'App\Helpers\MyLibrary')
@extends('frontview.layouts.app')
@extends('frontview.layouts.header')
@section('content')


       
        <div class="artist-bg">
            <div class="container cart">
              <div class="row">
                <h2 class="page_title title">{{$data['CollectionName']}}</h2>
                <ul class="breadcrumb">
        <li><a href="{{url('/homepage')}}">home</a></li>
       
        <li><a href="">{{$data['CollectionName']}}</a></li>
       
      </ul>
              </div>
            </div>
        </div>

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
    
      <input type="hidden" name="artistlatter" id="artistlatter" value=""> 
      <div id="collection-products" class="container">    
        <div class="row">
    <div class="artists">
        
             @php 
                  $totalArtworks = count($relatedProducts)
             @endphp
    
        <div class="polaroids">
             
            <div class="list1" id="postdata">
              <p> {{$data['CollectionDesc']}}</p>
@endif

            @if(isset($relatedProducts) && !empty($relatedProducts))
            <h5> {{$totalArtworks}} Artworks</h5>
          <div class="related-products-block">
            <div class="box-content box">
              <div class="page-title"><h3>Collection Artworks</h3></div>
              <div class="block_box row">
                <div id="related-carousel" class="box-product product-carousel clearfix" data-items="4">
                @foreach($relatedProducts as $related)
                @php                   
                  $prodecturl = url('product-detail/'.$related->slug);
                @endphp 
                  <div class="product-layout col-xs-12">
                    <div class="product-thumb">
                      <div class="image">
                        
                        <a href="{{$prodecturl}}">
                          <img src="{{ url('public/image/products/'.$related->featuredimage) }}" alt="{{ $related->title }}" title="{{ $related->title }}" class="img-responsive" onerror="this.onerror=null;this.src='https://test.maquinistas.in/Lakou/public/assets/images/lakouphoto.svg';"/>
                          @if(isset($related['images']) && !empty($related['images']))
                            @php $imageArr = explode('|',$related['images']->mediaurl);@endphp
                                <img class="img-responsive hover-img" src="{{ url($imageArr[0]) }}" title="{{ $related->title }}" alt="{{ $related->title }}" onerror="this.onerror=null;this.src='https://test.maquinistas.in/Lakou/public/assets/images/lakouphoto.svg';"/>
                          @else
                                <img class="img-responsive hover-img" src="{{ url('public/image/products/'.$related->featuredimage) }}" title="{{ $related->title }}" alt="{{ $related->title }}"onerror="this.onerror=null;this.src='https://test.maquinistas.in/Lakou/public/assets/images/lakouphoto.svg';" />
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
                          <h4 class="product-title"><a href="{{$prodecturl}}">{{$related->title}}</a></h4>
                          <p class="price">
                            @if(isset($related->saleprice) &&!empty($related->saleprice) && $related->saleprice != '0.00')
                            <span class="price-new">{{ $mylibrary->currencyconverterallprice($related->saleprice) }}</span><span class="price-old">{{ $mylibrary->currencyconverterallprice($related->price) }}</span>
                            @else
                            <span class="price-new">{{ $mylibrary->currencyconverterallprice($related->price) }}</span>
                            @endif

                            <span class="price-tax">Ex Tax: $80.00</span>
                          </p>

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



             
                @if(!Request::ajax())
            </div>    
                 <!--  -->   
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
  b.setAttribute('onclick', 'artistFilter()');
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
       function filter(evt){
        var elm = evt.target;
        var query = elm.value.length > 0 ? tf.stOperator + elm.value : '';

        // set the column's filter value
        tf.setFilterValue(1, query);

        // filter the table
        tf.filter();

        // clear previously marked element
        if(tf.selectedLetter) {
            tf.selectedLetter.classList.remove('btn-primary');
        }

        // mark selected letter
        elm.classList.add('btn-primary');

        // keep reference of selected element
        tf.selectedLetter = elm;
    }

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

    var pageUrl = site_url+'/artist-list';

    /*if (pageUrl.includes("?")) {
        pageUrl = pageUrl + "&page=" + page;
    } else {
        pageUrl = pageUrl + "?page=" + page;
    }*/
    $.ajax({
        url: pageUrl,
        type: "post",
        data: {
            page: page
        },
        dataType: 'json',
    }).done(function (data) {
        // $("#overlay").css({"display": "none", "opacity": "0"});
       // $("#pgloader").css("display", "none");
        $('#postdata').html(data.html);
        $('#paginationdiv').html(data.pagination);
        $('#totalpage').html(data.totalpagecount);
        
        
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
           
   
@extends('frontview.layouts.footer')
@endsection
@endif