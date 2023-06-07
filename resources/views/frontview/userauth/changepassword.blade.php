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

    



    <section class="confirmation">

      <div class="forget-container">

        <div class="forget-bg">

          <img src="{{url('public/assets/images/dimitar-belchev-fRBpWLAcWIY-unsplash.jpg')}}">

        </div>

        <div class="img-form">

          <div class="forgot-pass-head">

            <h3>Forgot Password?</h3>

            <!-- <p>Please register your email address, We will send instructions to help reset your password.</p> -->

            <form role="form" method="POST" action="{{ url('/passwordchange') }}" id="changepass">

               {{ csrf_field() }}

               <input type="hidden" name="customerId" id="customerId" value="{{$id}}">

              <div class="confirm-form">

                <label>New Password :</label><br>

                <input type="Password" name="password" id="password" placeholder="Password ">

              </div>  

              <div class="confirm-form">

                <label>Confirm Password :</label><br>

                <input type="Password" name="confirm-password" placeholder="Confirm Password ">

              </div> 

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

