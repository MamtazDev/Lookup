<?php 
use App\Models\SeoModel;
$seo = SeoModel::get()->where('id',5)->first();
?>

<meta name="title" content="{{$seo->title ?? ''}}">
<meta name="description" content="{{$seo->description ?? ''}}">
<meta name="keywords" content="{{$seo->keywords ?? ''}}"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="author" content="{{$seo->author ?? ''}}">
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

        <section class="contact-header">
            <div class="contact-head-img">
                <img src="{{ url('assets/images/679.png') }}">
            </div>
            <div class="head-text">
                <h2>Contact Us</h2>
                <ul class="breadcrumb1">
                    <li><a href="{{url('/homepage')}}">home /</a></li>
                    <li><a href="{{url('/contact-us')}} ">&nbsp;Contact Us</a></li>
                </ul>
            </div>
        </section>


        <section class="contact">
          <div class="container">
              <div class="contact-container">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="contact-left">
                              <h2>Get In Touch</h2>
                              <p>Having questions in mind ? Get in touch now, send an inquiry. Problems are solved with discussion. Call, Email, Reach or Send us messages now.</p>
                              <div class="address-icon">
                                  <i class="fa fa-paper-plane " aria-hidden="true"></i>
                                  <span> &nbsp;1398 McInnes Ave Kelowna B.C. V1Y5V9 Canada</span>
                              </div>
                              <div class="phone-icon">
                                <i class="fa fa-phone " aria-hidden="true"></i>
                                <span> &nbsp;
                                  +1 236 795-8121
                                </span>

                              </div>
                              <div class="emil-icon">
                                <i class="fa fa-envelope " aria-hidden="true"></i>

                                <!--<span> &nbsp;-->
                                <!--  Email us on:info@lakouphoto.com-->
                                <!--</span>-->
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="contact-right">
                              <h2>Drop A Message</h2>
                              @if(session()->has('signupmessage'))
                                    <div class="alert alert-success">
                                        {{ session()->get('signupmessage') }}
                                    </div>
                                @endif
                               {!! Form::open(['method' => 'post', 'url' => url('/contactus'), 'id'=>'contact-form', 'class'=>'contact-form']) !!} 
                                
                                  <div class="contact-form">
                                      <input type="name" name="name" class="c-name"  placeholder="Name">
                                       @if (isset($errors) && $errors->has('name'))
                                    <span class="error">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif  
                                  </div><br>
                                  <div class="contact-form">
                                      <input type="email" name="email"  class="c-email" placeholder="Email">
                                       @if (isset($errors) && $errors->has('email'))
                                    <span class="error">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif  
                                  </div><br>                                  
                                  <div class="contact-form">
                                      <input type="text" name="subject"  class="c-sub" placeholder="Subject">
                                       @if (isset($errors) && $errors->has('subject'))
                                    <span class="error">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                    @endif  
                                  </div><br>
                                  <div class="contact-form">
                                      <textarea name="message" aria-required="true" aria-invalid="false" placeholder="Write Message" spellcheck="false"></textarea>
                                       @if (isset($errors) && $errors->has('message'))
                                    <span class="error">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                    @endif  
                                  </div><br>
                                   <!--CAPTCHA-->
                                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                    <div class="form-group mt-5">
                                    <div class="g-recaptcha" data-sitekey="6LewFY4kAAAAAEkTQoAw2AAtQ39CxyH0wyl203C7">    </div>
                                    </div>
                                       @error('g-recaptcha-response')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                       @enderror
                                    <!--CAPTCHA END-->
                                    <br>
                                  <button  class="submit-btn">
                                        Send A Message
                                  </button>
                             {!!Form::close()!!}
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </section>
<script type="text/javascript" src="{{ url('public/assets/js/contactus.js?v=5765431') }}"></script>
@extends('frontview.layouts.footer')
@endsection