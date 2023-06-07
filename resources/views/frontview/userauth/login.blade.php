@extends('frontview.layouts.app')
@extends('frontview.layouts.header')
<style type="text/css">
    #password-error"{
        display: none;
    }
</style>
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


        <!-- LOGIN -->
        <section class="login-container">
            <div class="login-page">
                <div class="container login-bg">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 login-border">
                            <div class="login-img">
                                <img src="{{url('assets/images/pawel-czerwinski-qztBRIrU1FM-unsplash.jpg') }}">
                                <div class="login-logo" style="height: 70%">
                                    <a href="{{url('/homepae')}}">
                                        <img src="{{url('assets/images/lakouphoto.svg')}}">
                                    </a>
                                    <div class="login-text">
                                        <h1>WELCOME</h1>
                                    </div>
                                </div>
                                
                                <!-- <div class="sign-in">
                                    <p>Already have an Account?</p>
                                    <a href="">SIGN IN</a>
                                </div> -->
                            </div>
                            <div class="register-img">
                                <img src="{{url('assets/images/pawel-czerwinski-qztBRIrU1FM-unsplash.jpg') }}">
                                <div class="login-logo" style="height: 70%">
                                    <a href="home.html">
                                        <img src="{{url('assets/images/lakouphoto.svg') }}">
                                    </a>
                                    <div class="login-text">
                                        <h1>WELCOME</h1>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            @if(isset($newregister) && $newregister == 'Y')
                            @php $loginclass = ''; @endphp
                            @php $regclass = 'active'; 
                                  $regstyle = "display: block;";
                                  $logstyle = "display: none;"; 
                            @endphp
                            @else
                            @php $loginclass = 'active'; @endphp
                            @php $regclass = ''; 
                                $regstyle = "display: none;";
                                  $logstyle = "display: block;";

                            @endphp
                            @endif  
                            
                            <div class="sign-in-btn {{$loginclass}}">
                                <a href="{{url('/userlogin')}}" class="icon-lock" >
                                    <i class="fas fa-user-lock"></i>
                                    <p class="lock-text">SIGN IN</p>
                                </a>
                            </div>
                            <div class="sign-up-btn {{$regclass}}">
                                <a href="{{url('/newregister')}}" class="icon-lock ">
                                    <i class="fas fa-user-plus" aria-hidden="true"></i>
                                    <p class="lock-text">SIGN UP</p>
                                </a>
                            </div>
                            <div class="sing-in-form" style="{{$logstyle}}">
                                <div class="sign-in-text">
                                    <p>SIGN IN</p>
                                </div>
                                {!! Form::open(['method' => 'post', 'url' => url('/user/signin'), 'id'=>'signin_in', 'class'=>'login-form']) !!} 
                                    <i class="fas fa-envelope mail-box"></i>
                                    <input type="email" name="lemail" id="email" placeholder="Your Email ID Here..">
                                    @if (isset($errors) && $errors->has('lemail'))
                                    <br>
                                    <span class="error">
                                        <strong>{{ $errors->first('lemail') }}</strong>
                                    </span>
                                    @endif  
                                    <br>
                                    <i class="fas fa-lock lock"></i>
                                    <input type="password" name="lpassword" id="password" placeholder="Your Password Here..">
                                    @if (isset($errors) && $errors->has('lpassword'))
                                    <br>
                                    <span class="error">
                                        <strong>{{ $errors->first('lpassword') }}</strong>
                                    </span>
                                    @endif  
                                    <div class="checkbox">
                                        <div class="check-flex">
                                            <input type="checkbox" name="checkbox" checked="">
                                            <p>Remember me</p>
                                        </div>    
                                        <a href="{{url('/forgotpassword')}}">Forgot Password?</a>
                                    </div>
                                    <button class="submit login">
                                        SIGN IN
                                    </button>
                                {!!Form::close()!!}
                            </div> 

                            <div class="sing-up-form" style="{{$regstyle}}">
                                <div class="sign-in-text">
                                    <p>SIGN UP</p>
                                </div>
                                @if(session()->has('signupmessage'))
                                    <div class="alert alert-success">
                                        {{ session()->get('signupmessage') }}
                                    </div>
                                @endif
                                <!-- <form action="" method="post" class="login-form"> -->
                                {!! Form::open(['method' => 'post', 'url' => url('/user/signup'), 'id'=>'signup_form', 'class'=>'login-form']) !!} 
                                    <i class="fas fa-user user-box"></i>
                                    <input type="text" name="name" id="name" placeholder="Your Full Name Here..">
                                    @if (isset($errors) && $errors->has('name'))
                                    <span class="error">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif  
                                    <br>
                                    <i class="fas fa-envelope mail-box"></i>
                                    <input type="email" name="email" id="email" placeholder="Your Email ID Here.." >
                                    @if (isset($errors) && $errors->has('email'))
                                    <br>
                                        <span class="error">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif 
                                    
                                    <div class="pass-log">

                                        <i class="fas fa-lock lock"></i>
                                        <input type="password" name="password" id="password" placeholder="Your Password Here..">
                                        @if (isset($errors) && $errors->has('password'))
                                        <span class="error">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>    
                                    <div class="checkbox-signup">
                                        <!-- <input type="checkbox" name="checkbox" checked="">
                                        <p>Remember me</p>
                                        <a href="">Forgot Password?</a> -->
                                    </div>
                                    <button class="submit login">
                                        SIGN UP
                                    </button>
                                {!!Form::close()!!}
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </section>
<script type="text/javascript" src="{{ url('public/assets/js/login.js?v=5765431') }}"></script>
@extends('frontview.layouts.footer')
@endsection



