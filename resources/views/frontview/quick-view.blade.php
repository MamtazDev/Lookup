@inject('mylibrary', 'App\Helpers\MyLibrary')
 
 <div class="row pro-deatilss">
    <div class="col-sm-5 product-img">
<div class="thumbnails">
<div class="product-additional">
 
<div class="pro-image">
  @if($products->artistid == "0")
   <a href="{{url('/public/image/products/'.$products['featuredimage'])}}" title="Impasto" class="thumbnail">
     <img src="{{url('/public/image/products/'.$products['featuredimage'])}}" title="Impasto" id="zoom" alt="Impasto" data-zoom-image="{{url('/public/image/products/'.$products['featuredimage'])}}" onerror="this.onerror=null;this.src='https://lakouphoto.ca/public/assets/images/lakouphoto.svg';"/>
   </a>
  @else
   <a href="{{url('/Artist/public/image/products/'.$products['featuredimage'])}}" title="Impasto" class="thumbnail">
     <img src="{{url('/Artist/public/image/products/'.$products['featuredimage'])}}" title="Impasto" id="zoom" alt="Impasto" data-zoom-image="{{url('/Artist/public/image/products/'.$products['featuredimage'])}}" onerror="this.onerror=null;this.src='https://lakouphoto.ca/public/assets/images/lakouphoto.svg';"/>
   </a>
  @endif
 </div>

<div id="additional-carousel" class="owl-carousel owl-theme clearfix">
   @if(isset($prodectimages) && !empty($prodectimages))
   @php $imagesArr = explode("|",$prodectimages->mediaurl)@endphp
   @foreach($imagesArr as $image)
   <div class="image-additional">
    @if($products->artistid == "0")
     <a
       href="{{url('/'.$image)}}"
       title="Impasto"
       class="elevatezoom-gallery"
       data-image="{{url('/'.$image)}}"
       data-zoom-image="{{url('/'.$image)}}"
     >
       <img src="{{url('/'.$image)}}" title="Impasto" alt="Impasto" width="80" height="100" class="img-width" onerror="this.onerror=null;this.src='https://lakouphoto.ca/public/assets/images/lakouphoto.svg';"/>
     </a>
    @else
     <a
       href="{{url('Artist/'.$image)}}"
       title="Impasto"
       class="elevatezoom-gallery"
       data-image="{{url('Artist/'.$image)}}"
       data-zoom-image="{{url('Artist/'.$image)}}"
     >
       <img src="{{url('Artist/'.$image)}}" title="Impasto" alt="Impasto" width="80" height="100" class="img-width" onerror="this.onerror=null;this.src='https://lakouphoto.ca/public/assets/images/lakouphoto.svg';"/>
     </a>
    @endif
   </div>
   @endforeach
   @endif
 </div>
</div>
</div>
</div>
     <div class="col-sm-7">
         <div class="quick-product-right right_info">
             
            <h2 class=""> {{ $products['title'] }}</h2>

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
 
</div>

            <hr />
<ul class="list-unstyled">
@if($productsbrands)
  <li><span class="disc">Brand:</span>{{$productsbrands->name}}</li>
@else
  <li><span class="disc">Brand:</span></li>
@endif
  <!--<li><span class="disc">Product Code:</span><span class="disc1"> Product 5</span></li>--> 
 <li><span class="disc">Availability:</span><span class="disc1"> {{$products['availability']}}</span></li>
</ul>
<hr />
<ul class="list-unstyled">
 <li>
   @if(isset($products['saleprice']) && !empty($products['saleprice']) && $products['saleprice'] > 0)
   <span class="pro_price">{{ $mylibrary->currencyconverterallprice($products['saleprice']) }}</span><span class="pro_oldprice" style="text-decoration: line-through;">{{ $mylibrary->currencyconverterallprice($products['price']) }}</span>
   @else
   <span class="pro_price">{{ $mylibrary->currencyconverterallprice($products['price']) }}</span>
   @endif
 </li>
 <!-- <li class="tax">Ex Tax: $90.00</li> -->
</ul>
<hr />
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
      <button type="button" data-loading-text="Loading..." class="btn btn-primary btn-lg btn-block" onclick="detilesaddcart({{ $products['id']}})">Add to Cart</button>
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
   <button type="button" class="pro_wish pid_{{ $pid }} {{ $activeClass }} {{ $RemoveClass }}" data-pid="{{$pid}}" title="{{$title}}"><i class="fa fa-heart act_{{$pid}}" id="heart"></i><span id="productdwish">{{$title}}</span></button>

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
<style type="text/css">
button.pro_wish.remove_heart i.fa-heart {
color: red !important;
}
</style>