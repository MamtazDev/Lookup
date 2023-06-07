@if(!Request::ajax())
<!DOCTYPE html>

<html dir="ltr" lang="en">
   <!--  <meta http-equiv="content-type" content="text/html;charset=utf-8" /> -->
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-D24QE7W062"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-D24QE7W062');
</script>
        <meta charset="utf-8" />
        
        
        
        <?php  
            $indexing = App\Models\GlobleSeo::find(1);
        ?> 
        
        @if($indexing->status == 1)
            <meta name="robots" content="index, follow">
        @else
            <meta name="robots" content="noindex, follow">
        @endif
        
        
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>
            @yield('title','Lakouphoto-Best Website to sell Paintings online') 
        </title>
        <base />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
      <!--   <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
        <script src="{!! url('assets/js/jquery/jquery-2.1.1.min.js?v=1') !!}"></script>
    
        <meta name="_base_url" content="{{ url('/') }}">
        <script src="{{ url('assets/js/jquery-validation/js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery-validation/js/additional-methods.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery-validation/js/jquery.validate-function.js') }}"></script>
    <script src="{{ url('assets/js/jquery-validation/js/jquery.validate-function.js') }}"></script>
    <script src="{{ url('assets/js/signup.js') }}"></script>
    <link href="{{ url('assets/js/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" media="screen" />
    <script src="{{ url('assets/js/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- <link href="{{ url('assets/js/bootstrap/js/bootstrap.min.js') }}" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    
    <script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/f052fb1b67.js" crossorigin="anonymous"></script>
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>
    <script src="{{ url('assets/js/mahardhi/jquery.elevateZoom.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery/magnific/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('assets/js/mahardhi/owl.carousel.min.js') }}"></script>
    <script src="{{ url('assets/js/ion.rangeSlider-master/js/ion.rangeSlider.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/js/mahardhi/quickview.js') }}"></script>
    <link href="{{ url('assets/stylesheet/mahardhi/mahardhi-font.css')}}" rel="stylesheet" />
    <link href="{{ url('assets/stylesheet/mahardhi/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/stylesheet/mahardhi/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/stylesheet/mahardhi/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/js/jquery/magnific/magnific-popup.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://www.jqueryscript.net/demo/jQuery-Plugin-For-Country-Selecter-with-Flags-flagstrap/dist/css/flags.css">
    <link href="{{ url('css/front-custom.css') }}" rel="stylesheet" />
    <script type="text/javascript" src="{{ url('assets/js/mahardhi/slick.js') }}"></script>
    <link href="{{ url('assets/stylesheet/mahardhi/slick.css') }}" rel="stylesheet" />

    <script src="{{ url('assets/js/mahardhi/mahardhi_search.js') }}"></script>
        <style>
            :root {
                --primary-color: #222222;
                --primary-hover-color: #947259;
                --secondary-color: #ffffff;
                --secondary-light-color: #777777;
                --background-color: #faf6f3;
                --border-color: #e5e5e5;
            }

            #google_translate_element{
                user-select: none;
                -webkit-user-select: none;
                -webkit-touch-callout: none;
            }
            
        </style>
        <link href="{{ url('assets/css/stylesheet.css?v=534663') }}" rel="stylesheet" />
    <link href="{{ url('assets/js/jquery/swiper/css/swiper.min.css') }}" type="text/css" rel="stylesheet" media="screen" />
    <link href="{{ url('assets/js/jquery/swiper/css/opencart.css') }}" type="text/css" rel="stylesheet" media="screen" />
    <script src="{{ url('assets/js/jquery/swiper/js/swiper.jquery.js') }}"></script>
    <script src="{{ url('assets/js/mahardhi/tabs.js') }}"></script>
    <script src="{{ url('assets/js/mahardhi/jquery.cookie.js') }}"></script>
    <script src="{{ url('assets/js/common.js') }}"></script>  
    <script type="text/javascript" src="https://www.jqueryscript.net/demo/jQuery-Plugin-For-Country-Selecter-with-Flags-flagstrap/dist/js/jquery.flagstrap.js"></script>
    <script src="{{ url('assets/js/mahardhi/jquery-ui.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('assets/stylesheet/mahardhi/jquery-ui.min.css')}}" />
    <script src="{{ url('assets/js/mahardhi/custom.js') }}"></script>
    <link rel="shortcut icon" href="{{ url('assets/images/fevicon-512.png') }}" type="image/x-icon">
</head>
    <body class="common-home" id="google_translate_element" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
    <!-- <h1>Frontview</h1> -->
        <div class="loader"></div>
        
        @yield('header')
        @yield('content')
        @yield('footer')

        <script type="text/javascript">
    function googleTranslateElementInit() {
  new google.translate.TranslateElement({ pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false }, 'google_translate_element');

    $('.skiptranslate').hide();
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
$( document ).ready(function() {
    var lang = $.cookie("pageLanguage");
    if(lang != ""){
        translateLanguage(lang);
    }
    
});



function translateLanguage(lang) {
  googleTranslateElementInit();
  setCookie("pageLanguage", lang, 30)
  var $frame = $('.goog-te-menu-frame:first');
  if (!$frame.size()) {
    // alert("Error: Could not find Google translate frame.");
    return false;
  }
  $frame.contents().find('.goog-te-menu2-item span.text:contains(' + lang + ')').get(0).click();
  return false;
}
var site_url = "{{url('/')}}";
</script>
<!-- 
 <script type="text/javascript">
            $('.owl-carousel').owlCarousel({

                autoWidth:true,
              
            })
        </script> -->
           <a href="#" class="scrollToTop back-to-top" data-toggle="tooltip" title="Top"><i class="icon-paint-brush"></i></a>
    </body>
</html>
@endif