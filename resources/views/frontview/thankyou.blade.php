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


      <section class="placed-msg">
        <div class="container" >
          <div class="jumbotron text-center" style="background-color: #fff; margin-top: 50px;box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);">
            <div class="check-icon">
              <img src="{{url('public/assets/images/check.png')}}" style="width: 10%;">
            </div>
            @if ($message != '') 
            <h1 class="display-3">Thank you!</h1>
               <p class="lead">{{$message}}</p>
            @else
               <h1 class="display-3">Thank you for registration!</h1>
               <p class="lead">We will review your profile and provide the confirmation shortly. Thank you for your patience.</p> 
            @endif
            
          </div>
        </div>  
      </section>
@extends('frontview.layouts.footer')
@endsection
