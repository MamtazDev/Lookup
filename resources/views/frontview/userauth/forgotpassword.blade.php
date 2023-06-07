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

      <div class="forget-container">

        <div class="forget-bg">

          <img src="{{url('public/assets/images/dimitar-belchev-fRBpWLAcWIY-unsplash.jpg')}}">
          
        </div>

        <div class="img-form">

          <div class="forgot-pass-head">



            @if(Session::has('signupmessage'))

            <div class="alert alert-success" role="alert">

             {{ Session::get('signupmessage') }}

            </div>

            @endif

            <h3>Forgot Password?</h3>

            <p>Please register your email address, We will send instructions to help reset your password.</p>

  

              <form role="form" method="POST" action="{{ url('/resetpassword') }}" id="resetpassword">

               {{ csrf_field() }}

              <label>Email</label><br>

              <input type="email" name="email" id="emailadd" placeholder="Enter your email address ">

              <button type="submit" class="send-mail">

                SEND

              </button>

            </form>

            <div class="back-log">

              <a href="{{url('/userlogin')}}">Back to Login</a>

            </div>

          </div>

        </div>

      </div>

    </section>







@extends('frontview.layouts.footer')

@endsection

