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







        <section class="address-section">

            <div class="container">

                <div class="address-text">

                   <h2> Your Addresses </h2>

                </div>

                <div class="row">

                    @if(isset($shoppingaddresList) && !empty($shoppingaddresList) && count($shoppingaddresList) < 3)

                    <div class="col-md-4 col-sm-6">

                        <div class="add-address">

                            <div class="icon-add">

                                <a href="{{url('/addnewaddress')}}" class="link-to-text">

                                    <div class="plus-icon">

                                        <i class="fas fa-plus"></i>

                                    </div>

                                    <div class="type-address">

                                        <p>Add Address</p>

                                    </div>

                                </a>    

                            </div>

                        </div>

                    </div>

                    @endif

                    @foreach($shoppingaddresList as $shoppingaddres)
                    
                    <div class="col-md-4 col-sm-6">

                        <div class="edit-address">

                            <div class="edit-add">

                                    <div class="customer-detail">

                                        <h3>{{$shoppingaddres->full_name}} {{$shoppingaddres->AddressType}}</h3>

                                        <p class="customer-add">

                                            {{$shoppingaddres->Street}},<br>{{$shoppingaddres->landmark}},<br>{{$shoppingaddres->sarea}},<br>{{$shoppingaddres->city}}, {{$shoppingaddres->stateName}} {{$shoppingaddres->pin}}<br>{{$shoppingaddres->countryname}}<br>

                                            Pone Number: @if(isset($shoppingaddres->phonecode) && !empty($shoppingaddres->phonecode)) {{$shoppingaddres->phonecode}} @endif @if(isset($shoppingaddres->phone) && !empty($shoppingaddres->phone)) {{$shoppingaddres->phone}} @endif

                                        </p>

                                    </div>

                                    

                                    <div class="edit-remove">

                                        <a href="{{url($shoppingaddres->id.'/editshoppingaddress')}}">Edit |</a>

                                        <a href="javascript:void(0)" onclick="removeShoppingAddress('{{$shoppingaddres->id}}')">Remove</a>

                                    </div>

                            </div>

                        </div>

                    </div>
                   
                    @endforeach

                </div>

            </div>

        </section>

        

@extends('frontview.layouts.footer')

@endsection