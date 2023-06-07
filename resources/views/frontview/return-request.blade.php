@extends('frontview.layouts.app')
@extends('frontview.layouts.header')
@section('content')
<body class="common-home expansion-alids-init" id="login223" data-new-gr-c-s-check-loaded="14.1049.0" data-gr-ext-installed="" cz-shortcut-listen="true">
        
       

       

        <section class="contact return">
          <div class="container">
              <div class="contact-container">
                <div class="return-order">
                   <h2> Fill the form to return your order </h2>
                </div>
                 @if(session()->has('returnrefundmessage'))
                                    <div class="alert alert-success">
                                        {{ session()->get('returnrefundmessage') }}
                                    </div>
                                @endif
                  {!! Form::open(['method' => 'post', 'url' => url('/return-email'), 'id'=>'return-form', 'class'=>'return-form']) !!} 
                    <div class="row first-name ">
                        <div class="col-md-6 col-sm-12">
                            <div class="profile-form margin">
                               <!--  <input type="hidden" name="orderid" value="{{$id}}"> -->
                                <label><strong>First Name</strong></label><br>
                                <input type="name" name="r-name" id="name" placeholder="Name">
                                 @if (isset($errors) && $errors->has('r-name'))
                                    <span class="error">
                                        <strong>{{ $errors->first('r-name') }}</strong>
                                    </span>
                                    @endif 
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-sm-12">    
                            <div class="profile-form">
                                <label><strong>Last Name</strong></label><br>
                                <input type="name" name="l-name" id="name" placeholder="Name">
                                 @if (isset($errors) && $errors->has('l-name'))
                                    <span class="error">
                                        <strong>{{ $errors->first('l-name') }}</strong>
                                    </span>
                                    @endif 
                            </div>
                        </div>    
                    </div> <br>
                    <div class="contact-form">
                        <label><strong>Email</strong></label><br>
                        <input type="email" name="r-email"  class="c-email" placeholder="Email">
                           @if (isset($errors) && $errors->has('r-email'))
                                    <span class="error">
                                        <strong>{{ $errors->first('r-email') }}</strong>
                                    </span>
                                    @endif 
                    </div><br>
                    <div class="contact-form">
                        <label><strong>Phone</strong></label><br>
                        <input type="number" name="r-num" class="c-email" placeholder="+91 123 456 7891">
                           @if (isset($errors) && $errors->has('r-num'))
                                    <span class="error">
                                        <strong>{{ $errors->first('r-num') }}</strong>
                                    </span>
                                    @endif 
                    </div><br>
                    <div class="contact-form">
                        <label><strong>Return Address</strong></label><br>
                        <input type="text" id="r-add" name="returnAddress" placeholder="Add Your Address">
                        @if (isset($errors) && $errors->has('returnAddress'))
                                    <span class="error">
                                        <strong>{{ $errors->first('returnAddress') }}</strong>
                                    </span>
                                    @endif 
                        
                    </div><br>
                    <div class="row first-name ">
                        <div class="col-md-6 col-sm-12">
                            <div class="contact-form margin">
                                <label><strong>City</strong></label><br>
                                <input type="text" name="city" id="city" placeholder="Enter Your City ">
                                 @if (isset($errors) && $errors->has('city'))
                                    <span class="error">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif 
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-sm-12">    
                            <div class="contact-form">
                                <label><strong>State</strong></label><br>
                                <input type="text" name="state" id="state" placeholder="Enter Your State " >
                                 @if (isset($errors) && $errors->has('state'))
                                    <span class="error">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @endif
                            </div>
                            </div>
                    </div><br>
                    <div class="row first-name ">
                        <div class="col-md-6 col-sm-12">
                             <div class="contact-form pincode margin">
                                <label><strong>Pincode</strong></label><br>
                                <input type="text" name="pin"  placeholder="Enter Your Pincode">
                                @if (isset($errors) && $errors->has('pin'))
                                    <span class="error">
                                        <strong>{{ $errors->first('pin') }}</strong>
                                    </span>
                                    @endif
                            </div>  
                        </div>
                        
                        <div class="col-md-6 col-sm-12">    
                            <div class="contact-form pincode">
                                <label><strong>Order ID</strong></label><br>
                                <input type="text" name="num"  value="{{$id}}" placeholder="Enter Order ID" readonly>
                            </div> 
                        </div>
                    </div><br>
                    <div class="row first-name ">
                        <div class="col-md-6 col-sm-12">
                             <div class="contact-form pincode margin">
                                <label><strong>Request Type</strong></label><br>
                                <select class="contact-form" id="input_11" name="q11_requestType" data-component="dropdown">
                                    <option value=""> Please Select </option>
                                    <option value="Return"> Return </option>
                                    <option value="Exchange"> Exchange </option></select>
                                     @if (isset($errors) && $errors->has('q11_requestType'))
                                    <span class="error">
                                        <strong>{{ $errors->first('q11_requestType') }}</strong>
                                    </span>
                                    @endif
                            </div>  
                        </div>
                        
                        <div class="col-md-6 col-sm-12">    
                            <div class="contact-form pincode">
                               <label><strong>Reason for Return/Exchange</strong></label><br>
                                <select class="form-dropdown" id="input_10" name="q10_reasonFor10" data-component="dropdown">
                                    <option value="" selected=""> Please Select </option>
                                    <option value="Not as described"> Not as described </option>
                                    <option value="Defective / Not Working"> Defective / Not Working </option>
                                    <option value="Physical Damage"> Physical Damage </option>
                                    <option value="Ordered wrong Item"> Ordered wrong Item </option>
                                    <option value="Received wrong item"> Received wrong item </option><option value="Other"> Other </option>
                                </select>
                                @if (isset($errors) && $errors->has('q10_reasonFor10'))
                                    <span class="error">
                                        <strong>{{ $errors->first('q10_reasonFor10') }}</strong>
                                    </span>
                                    @endif
                            </div> 
                        </div>
                    </div><br>
                         <div class="contact-form">
                             <label><strong>Please Describe</strong></label><br>
                              <textarea name="message" aria-required="true" aria-invalid="false" placeholder="Write Message"  spellcheck="false"></textarea>
                               @if (isset($errors) && $errors->has('message'))
                                    <span class="error">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                    @endif
                          </div>
                          <div class="r-submit">
                            <button type="submit" class="r-submit-btn">
                                Submit
                            </button>
                           </div> 
                    {!!Form::close()!!}</div> 

                  
              </div>
          
        </section>


       
        <!-- top scroll -->
        <a href="#" class="scrollToTop back-to-top" data-toggle="tooltip" title="" data-original-title="Top" style="display: none;"><i class="icon-paint-brush"></i></a>
        <!-- <script type="text/javascript" src="/lakouphoto-design/js/login.js?v=5765431"></script> -->

@extends('frontview.layouts.footer')
        <!-- plus-minus -->
        <script type="text/javascript">
            $(document).on('click', '.qty-plus', function () {
               $(this).prev().val(+$(this).prev().val() + 1);
            });
            $(document).on('click', '.qty-minus', function () {
               if ($(this).next().val() > 0) $(this).next().val(+$(this).next().val() - 1);
            });
        </script>
        <!-- plus minus ends -->


        <!-- REMOVE ITEMS -->
        <script type="text/javascript">
            document.querySelectorAll("#del-button").forEach((button) =>
                button.addEventListener("click", (e) => {
                    if (!button.classList.contains("delete")) {
                        button.classList.add("delete");

                        setTimeout(() => button.classList.remove("delete"), 2200);
                    }
                    e.preventDefault();
                })
            );
        </script>
        <!-- remove items ends -->


        <!-- heart icon -->
        <script type="text/javascript">
            // Favorite Button - Heart
            $('.favme').click(function() {
                $(this).toggleClass('active');
            });

            /* when a user clicks, toggle the 'is-animating' class */
            $(".favme").on('click touchstart', function(){
              $(this).toggleClass('is_animating');
            });

            /*when the animation is over, remove the class*/
            $(".favme").on('animationend', function(){
              $(this).toggleClass('is_animating');
            });
        </script>
        <!-- heart icon ends -->
    
</body>
@endsection