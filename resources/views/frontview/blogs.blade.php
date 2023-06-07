<?php 
use App\Models\SeoModel;
$seo = SeoModel::get()->where('id',6)->first();
?>

<meta name="title" content="{{$seo->title ?? ''}}">
<meta name="description" content="{{$seo->description ?? ''}}">
<meta name="keywords" content="{{$seo->keywords ?? ''}}"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="author" content="{{$seo->author ?? ''}}">
@inject('mylibrary', 'App\Helpers\MyLibrary')
@extends('frontview.layouts.app')
@extends('frontview.layouts.header')
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
            <div class="mblog mt-80" id="blogs">
                <div class="container">
                    <div class="section">
                        <div class="box-content">
                            <div class="page-title section"><h3>From Our Blog</h3></div>
                            <div class="row">
                                <div class="block_box">
                                    <div id="blogcarousel" class="blogs-block blog-carousel clearfix" data-items="3">
                                        <!-- <div class="product-layout col-md-4 col-xs-6">
                                            <div class="item">
                                                <div class="product-block blog-block">
                                                    <div class="blog-info">
                                                        <div class="image">
                                                            <a href="#">
                                                                <img src="/lakouphoto-design/images/blogs/blog1-490x392.jpg" alt="" title="The standard Lorem Ipsum" class="img-responsive" />
                                                            </a>
                                                            <div class="zoom-post">
                                                                <a class="hover-zoom" href="/lakouphoto-design/images/blogs/blog1-1140x912.jpg" data-lightbox="example-set" title="The standard Lorem Ipsum"></a>
                                                                <a class="hover-post" href=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="caption blog-description">
                                                        <div class="link_info">
                                                            <span class="block-date">April 01, 2021</span>
                                                            <h4><a href="#">The standard Lorem Ipsum</a></h4>
                                                            <div class="blog-text">
                                                                <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry... </span>
                                                            </div>
                                                            <a class="blog-read btn" href="" title="Read more">Read more</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-layout col-md-4 col-xs-6">
                                            <div class="item">
                                                <div class="product-block blog-block">
                                                    <div class="blog-info">
                                                        <div class="image">
                                                            <a href="#"><img src="/lakouphoto-design/images/blogs/blog2-490x392.jpg" alt="" title="Nam nec rhoncus est" class="img-responsive" /></a>
                                                            <div class="zoom-post">
                                                                <a class="hover-zoom" href="/lakouphoto-design/images/blogs/blog2-1140x912.jpg" data-lightbox="example-set" title="Nam nec rhoncus est"></a>
                                                                <a class="hover-post" href="#"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="caption blog-description">
                                                        <div class="link_info">
                                                            <span class="block-date">April 01, 2021</span>
                                                            <h4><a href="#">Nam nec rhoncus est</a></h4>
                                                            <div class="blog-text">
                                                                <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry... </span>
                                                            </div>
                                                            <a class="blog-read btn" href="" title="Read more">Read more</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-layout col-md-4 col-xs-6">
                                            <div class="item">
                                                <div class="product-block blog-block">
                                                    <div class="blog-info">
                                                        <div class="image">
                                                            <a href="#"><img src="/lakouphoto-design/images/blogs/blog3-490x392.jpg" alt="" title="Lorem Ipsum Dolo" class="img-responsive" /></a>
                                                            <div class="zoom-post">
                                                                <a class="hover-zoom" href="/lakouphoto-design/images/blogs/blog3-1140x912.jpg" data-lightbox="example-set" title="Lorem Ipsum Dolo"></a>
                                                                <a class="hover-post" href="#"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="caption blog-description">
                                                        <div class="link_info">
                                                            <span class="block-date">April 01, 2021</span>
                                                            <h4><a href="#">Lorem Ipsum Dolo</a></h4>
                                                            <div class="blog-text">
                                                                <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry... </span>
                                                            </div>
                                                            <a class="blog-read btn" href="" title="Read more">Read more</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-layout col-md-4 col-xs-6">
                                            <div class="item">
                                                <div class="product-block blog-block">
                                                    <div class="blog-info">
                                                        <div class="image">
                                                            <a href="#">
                                                                <img src="/lakouphoto-design/images/blogs/blog5-490x392.jpg" alt="" title="Consectetur adipiscing" class="img-responsive" />
                                                            </a>
                                                            <div class="zoom-post">
                                                                <a class="hover-zoom" href="/lakouphoto-design/images/blogs/blog5-1140x912.jpg" data-lightbox="example-set" title="Consectetur adipiscing"></a>
                                                                <a class="hover-post" href="#"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="caption blog-description">
                                                        <div class="link_info">
                                                            <span class="block-date">April 01, 2021</span>
                                                            <h4><a href="#">Consectetur adipiscing</a></h4>
                                                            <div class="blog-text">
                                                                <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry... </span>
                                                            </div>
                                                            <a class="blog-read btn" href="" title="Read more">Read more</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-layout col-md-4 col-xs-6">
                                            <div class="item">
                                                <div class="product-block blog-block">
                                                    <div class="blog-info">
                                                        <div class="image">
                                                            <a href="#">
                                                                <img src="/lakouphoto-design/images/blogs/blog4-490x392.jpg" alt="" title="Duis pulvinar augue nisi" class="img-responsive" />
                                                            </a>
                                                            <div class="zoom-post">
                                                                <a class="hover-zoom" href="/lakouphoto-design/images/blogs/blog4-1140x912.jpg" data-lightbox="example-set" title="Duis pulvinar augue nisi"></a>
                                                                <a class="hover-post" href="#"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="caption blog-description">
                                                        <div class="link_info">
                                                            <span class="block-date">April 01, 2021</span>
                                                            <h4><a href="#">Duis pulvinar augue nisi</a></h4>
                                                            <div class="blog-text">
                                                                <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry... </span>
                                                            </div>
                                                            <a class="blog-read btn" href="" title="Read more">Read more</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- test -->
                                        @foreach($blog as $key=>$blogs)
                                        @if($blogs->status==1)
                                        <div class="product-layout col-md-4 col-xs-6">
                                            <div class="item">
                                                <div class="product-block blog-block">
                                                    <div class="blog-info">
                                                        <div class="image">
                                                            <a href="{{ url('blog-detail',$blogs->id) }}">
                                                                <!-- <img src="/lakouphoto-design/images/blogs/blog1-490x392.jpg" alt="" title="The standard Lorem Ipsum" class="img-responsive" /> -->
                                                                <img src="{{asset('public/image/blog/'.$blogs->featureimage)}}" alt="" title="{{$blogs->title}}" onerror="this.onerror=null;this.src='https://test.maquinistas.in/Lakou/public/assets/images/lakouphoto.svg';" class="img-responsive" />

                                                                <!-- <img height="120" width="150" class="img-responsive" src="{{asset('public/image/blog/'.$blogs->featureimage)}}" > -->
                                                            </a>
                                                           <!--  <div class="zoom-post">
                                                                <a class="hover-zoom" href="/lakouphoto-design/images/blogs/blog1-1140x912.jpg" data-lightbox="example-set" title="The standard Lorem Ipsum"></a>
                                                                <a class="hover-zoom" href="{{asset('public/image/blog/'.$blogs->featureimage)}}" data-lightbox="example-set" title="The standard Lorem Ipsum"></a>
                                                                <a class="hover-post" href="{{asset('public/image/blog/'.$blogs->featureimage)}}"></a>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                    <div class="caption blog-description">
                                                        <div class="link_info">
                                                            <span class="block-date">@php 
                                                                echo date_format($blogs->created_at,"M d Y");
                                                            @endphp</span>
                                                            <h4><a href="{{asset('public/image/blog/'.$blogs->featureimage)}}">{{$blogs->title}}</a></h4>
                                                            <div class="blog-text">
                                                                <span>{{$blogs->slug}}</span>
                                                            </div>
                                                            <!-- <a class="blog-read btn" onclick="location.href = ('index158b.html?route=blog/article&amp;article_id=1');" title="Read more">Read more</a> -->
                                                 <a class="blog-read btn" href="{{ url('blog-detail',$blogs->id) }}" title="Read more">Read more</a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                        <!-- test end -->

                                        <!-- <div class="container">
                        <div class="pro_pagination clearfix">
                            <div class="col-sm-6 text-left" id="totalpage">Showing to of Pages</div>
                                <div class="col-sm-6 text-right">
                                   <ul class="pagination" id="paginationdiv">
                                         <li class="active"><span>1</span></li>
                                        <li><a href="#2">2</a></li>
                                                    
                                                  

                                    </ul>

                                </div>
                        </div>
                        
                    </div>  -->
                 
                      



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                              



          <!--   <script>
               
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


                
            </script> -->
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
                                                            <div>
                                                            <button class="btn btn-default subscribe-btn" type="submit">Subscribe</button>
                                                        </div>
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
        var id = $(this).data('pid');

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
