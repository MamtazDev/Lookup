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
            <div class="container shipping">
                <div class="shipping-head">
                    <h2>Shipping Address</h2>
                </div>
                <div class="shipping-form" style="background-color:#DDD4C7;">
                    
                        {!! Form::open(['method' => 'post', 'url' => url('/shopping-address/insert'), 'id'=>'shopping_address_form']) !!}

                        <input type="hidden" id="rcid" name="rcid" value="{{$shoppingaddresArr->id}}">
                        <div class="shipping-country">
                            <label>Country/Region :</label><br>
                            <select class="form-control valid" id="CCountryId" name="CCountryId" placeholder="Select country" aria-invalid="false">
                                <option value=""> Select country</option>
                                @foreach($contryArray as $contry)
                                @if(isset($shoppingaddresArr->CCountryId) && !empty($shoppingaddresArr->CCountryId) && $shoppingaddresArr->CCountryId == $contry->id)
                                @php $selected = 'selected' @endphp
                                @else
                                @php $selected = ''; @endphp
                                @endif
                                <option value="{{$contry->id}}" {{$selected}}> {{$contry->countryname}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('CCountryId'))
                                <span class="error">{{ $errors->first('CCountryId') }}</span>
                            @endif
                        </div>
                        <div class="shipping-country">
                            <label>Full Name (First Name & Last Name) :</label><br>
                            <input type="text" id="full_name" name="full_name" placeholder="Enter Your Full Name" value="{{$shoppingaddresArr->full_name}}">
                        </div>
                        <div class="shipping-country">
                            <label>Pin Code :</label><br>
                           <!-- <input type="text" id="spin" name="pin" pattern="[0-9]{6}" maxlength="6" placeholder="Enter Your City Pincode" value="{{$shoppingaddresArr->pin}}"> -->
                           <input type="text" id="spin" name="pin"  maxlength="6" placeholder="Enter Your City Pincode" value="{{$shoppingaddresArr->pin}}">
                        </div>
                        <div class="shipping-country">
                            <!-- <label>Flat, House No., Building, Company, Apartment :</label><br> -->
                            <label>Address Line 1 :</label><br>
                            <input type="text" aria-label="Street address" name="Street" id="sadd" placeholder="Enter Your House Details" value="{{$shoppingaddresArr->Street}}">
                        </div>
                        <div class="shipping-country">
                            <!-- <label>Area, Colony, Street, Sector, Village :</label><br> -->
                            <label>Address Line 2 :</label><br>
                             <input type="text" name="sarea" aria-label="Street address" id="sarea" placeholder="Enter Your Area" value="{{$shoppingaddresArr->sarea}}">
                        </div>
                        <div class="shipping-country">
                            <label>Landmark :</label><br>
                            <input type="text" name="landmark" id="sland" placeholder="Enter Landmark Around Your Place" value="{{$shoppingaddresArr->landmark}}">
                        </div>
                        <div class="shipping-country">
                            <label>Town/City :</label><br>
                            <input type="text" name="city" id="city" placeholder="Enter Your Town/City" value="{{$shoppingaddresArr->city}}">
                        </div>
                        <div class="shipping-country">
                            <label>State / Province / Region :</label><br>
                            <select id="CStateId" name="CStateId" required="" class="form-control valid" aria-required="true" aria-invalid="false">
                                <option value="">Select State / Province / Region</option>
                                @foreach($stateArr as $state)
                                @if(isset($shoppingaddresArr->CStateId) && !empty($shoppingaddresArr->CStateId) && $shoppingaddresArr->CStateId == $state->id)
                                @php $selected = 'selected' @endphp
                                @else
                                @php $selected = ''; @endphp
                                @endif
                                <option value="{{$state->id}}" {{$selected}}> {{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="instruct">
                            <h2>Add Delivery Instruction :</h2>
                            <p>Preferences are used to plan delivery. However your shipments can arrive early or later than planned.</p>
                        </div>
                        <div class="shipping-country">
                            <label>Address Type :</label><br>
                            <select id="AddressType" name="AddressType" required="" class="form-control valid" aria-required="true" aria-invalid="false">
                                <option value="" selected="">Select Address Type</option>
                                 @if(isset($shoppingaddresArr->AddressType) && !empty($shoppingaddresArr->AddressType) && $shoppingaddresArr->AddressType == 'Home')
                                 @php $homeselected = 'selected'; @endphp
                                 @else
                                 @php $homeselected = ''; @endphp
                                 @endif
                                <option value="Home" {{$homeselected}}>Home</option>
                                @if(isset($shoppingaddresArr->AddressType) && !empty($shoppingaddresArr->AddressType) && $shoppingaddresArr->AddressType == 'Office')
                                 @php $Officeselected = 'selected'; @endphp
                                 @else
                                 @php $Officeselected = ''; @endphp
                                 @endif
                                <option value="Office" {{$Officeselected}}>Office</option>
                            </select>
                        </div>
                        <div class="shipping-check">
                             @if(isset($shoppingaddresArr->isdefault) && !empty($shoppingaddresArr->isdefault) && $shoppingaddresArr->isdefault == 'Y')
                             @php $default = 'checked'; @endphp
                             @else
                             @php $default = ''; @endphp
                             @endif
                          <input type="checkbox" id="defultaddress" name="defultaddress" value="Y" {{$default}}>
                          <label for="defultaddress">Use as my default address.</label>
                        </div>
                        <button type="submit" class="shipping-btn">
                            Save Address
                        </button>
                    {!!Form::close()!!}
                </div>
            </div>
        </section>
        <script type="text/javascript">
            $("#CCountryId").change(function(){
                if ($(this).val() != '') {
                    $.ajax({
                        url: site_url + "/getStatelist",
                        type: "POST",
                        data: {"contry": $(this).val(), "_token": $('meta[name="csrf-token"]').attr('content')},
                        async: true,
                        success: function (res) {
                            $('#CStateId').html(res);
                        },
                    });
                }
                });
            
        </script>

@extends('frontview.layouts.footer')
@endsection