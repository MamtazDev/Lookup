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

        <section class="faq-bg" >
            <div class="faq-container">
                <div class="top-border">
                    <div class="container">
                        <div class="personal-detail-container">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <div class="fold-paper personal active" id="personal-detiles">
                                        <a href="">
                                            <div class="person-detail">
                                                <div class="faq-user">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <div class="faq-details">
                                                    Personal Details
                                                </div>
                                            </div>
                                        </a>    
                                    </div>
                                </div>    
                                <div class="col-md-4 text-center">
                                    <div class="fold-paper artistic" id="Artistic-exp">
                                       <a href="">
                                            <div class="person-detail">
                                                <div class="faq-user">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <div class="faq-details">
                                                    Artistic Experience
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="fold-paper artwork" id="artwork-exp">
                                        <a href="">
                                            <div class="person-detail">
                                                <div class="faq-user">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <div class="faq-details">
                                                    Artwork Detail
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="faq">
                    <div class="row" style="overflow: hidden;">

                        <form action="{{url('/artist-form/insert')}}" id="ArtistSignUp" method="post" class="faq-form" enctype="multipart/form-data"> 
                            {!! Form::token() !!}
                            <input type="hidden" value="2" name="tabid" id="tabid">
                        <!-- PERSONAL DETAILS -->
                        <div class="container form1" id="parsnal-from">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="faq-img">
                                    <img src="{{url('image/a17bc86d4e73516ed13759e9bb760809-removebg-preview.png') }}">
                                </div>
                                <div class="back-btn">
                                    <a href="">
                                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                        Back to User Sign In
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                              <div class="detail-form">
                                  
                                    <div class="form-detail">
                                        <label>What is your <strong>First Name?*</strong></label><br>
                                        <i class="fas fa-user user-box" aria-hidden="true"></i>
                                        <input type="name" name="firstname" id="firstname" placeholder="Type your answer here...">
                                    </div>    
                                        <br>
                                    <div class="form-detail">
                                        <label>What is your <strong>Last Name?*</strong></label><br>
                                        <i class="fas fa-user user-box" aria-hidden="true"></i>

                                        <input type="name" name="lastname" id="lastname" placeholder="Type your answer here..." >
                                    </div> 
                                    <br>
                                    <div class="form-detail">
                                        <label>What is your <strong>Email Adress?*</strong></label><br>
                                        <i class="fas fa-envelope mail-box"></i>
                                        <input type="email" name="email" id="email" placeholder="name@gmail.com" >
                                    </div> 
                                    <br>
                                    <div class="form-detail">
                                        <label>What is your <strong>Phone Number?*</strong></label><br>
                                        <i class="fas fa-phone-alt fone"></i>
                                        <input type="tel" name="phone" id="phone" placeholder="(+91) 123 456 7890" >
                                    </div> 
                                    <br>
                                    <!--  <div class="form-detail">
                                        <label>What is your <strong>Country of Residence?*</strong></label><br>
                                        
                                        <div class="select-country" id="advanced" data-input-name="country" name="countrycode" data-selected-country="IN"> -->
                                            <!-- <input type="country" name="country" placeholder="Type or select option"></input> -->
                                      <!--   </div>
                                        
                                    </div> -->
                                  <!--   @if($errors->has('countrycode'))
                                        <div class="error">{{ $errors->first('countrycode') }}</div>
                                         <span id="countrycode-error" class="error">Country field is required.</span>
                                    @endif -->
                                    <div class="form-detail">
                                        <label>What is your <strong>Country of Residence?*</strong></label><br>
                                        
                                       
                                      <i class="fa fa-flag"></i>
                                        <select class="select-country" name="country" id="country">
                                            <option value="">Select</option>
                                            @foreach($countrys as $country)
                                            <option value="{{$country->flagicon}}">{{$country->countryname}}</option>
                                            @endforeach
                                        </select>
                                      </div>

                                    

                                    <br>    
                                    <div class="form-detail">
                                        <label>What is your <strong>Preferred Language?*</strong></label><br>
                                        <i class="fas fa-envelope mail-box"></i>
                                        <input type="name" name="lang" id="lang" lang="" placeholder="Type or select option" >
                                    </div> 
                                    <br>
                                    <div class="nxy-btn"><button type="submit" class="next-btn">NEXT</button></div>
                                    
                              </div>  
                            </div>
                        </div>   


                        <!-- ARTISTIC EXPERIENCE -->
                        <div class="container form2" id="exp-from">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="faq-img">
                                    <img src="{{url('image/b566df4b00453a8c8a5b2b67f40b33dd-removebg-preview.png') }}">
                                    <div class="back-btn">
                                    <a href="">
                                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                        Back to User Sign In
                                    </a>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                              <div class="detail-form" >
                                   
                                    <div class="form-detail" id="yn-btn">
                                        <label>Are you a <strong>Full Time Professional Artist?*</strong></label><br>
                                        <div class="selection-option">
                                            <div class="check-yes-btn">
                                               <label for="yes" class="yesss">Yes</label>
                                                <label class="radio">
                                                    <input class="checkbox-input" type="radio" name="Professionaltype" id="yes" value="Y">
                                                    <span class="checkbox-checkmark-box">
                                                    
                                                      <span class="checkbox-checkmark"></span>
                                                    </span>
                                                </label>
                                                <!-- <input type="radio" name="Professionaltype" id="yes" value="Y"> -->
                                             </div><br>
                                             <div class="check-yes-btn">
                                                <label for="no" class="yesss">No</label>
                                                <label class="radio">
                                                    <input class="checkbox-input" type="radio"  name="Professionaltype" id="no" value="N">
                                                    <span class="checkbox-checkmark-box">
                                                        
                                                      <span class="checkbox-checkmark"></span>
                                                    </span>
                                                </label>
                                                <!-- <input type="checkbox" name="Professionaltype" id="no" value="N"> -->
                                            </div>
                                        </div>
                                        <!-- <div class="check-yes-btn">
                                            <button class="n-btn">
                                                <a href=""><img src="{{url('image/image_2021_12_24T05_39_39_582Z.png')}}"></a> 
                                            </button> 
                                        </div> --> 
                                    </div>       
                                        <br>
                                    <div class="form-detail">
                                        <label>Since how many <strong>Years?*</strong></label><br>
                                        <input type="Number" name="SinceYears" id="SinceYears" placeholder="Type your answer here..." >
                                    </div> 
                                    <br>
                                    <div class="form-detail">
                                        <label>Are you represented by another <strong>Online Art Gallery?*</strong></label><br>
                                         <div class="selection-option">
                                            <!-- <div class="check-yes-btn">
                                                <button class="y-btn">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T05_38_43_242Z.png"></a> 
                                                </button> -->
                                                <!-- <i class="fas fa-check"></i> -->
                                              <!--   <input type="name" name="gallertypeyes" id="y-name" placeholder="Yes" pattern="[Yy]es|[Nn]o"  readonly="">
                                            </div>
                                            <div class="check-yes-btn">
                                                <button class="n-btn">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T05_39_39_582Z.png"></a> 
                                                </button> -->
                                                <!-- <i class="fas fa-check"></i> -->
                                                <!-- <input type="name" name="gallertypeno" id="y-name" placeholder="No" pattern="[Yy]es|[Nn]o" readonly="">
                                            </div>     -->  
                                            <div class="check-yes-btn">
                                               <label for="Galleryyes" class="yesss">Yes</label>
                                                <label class="radio">
                                                    <input class="checkbox-input" type="radio"name="anotherGallery" id="Galleryyes" value="Y">
                                                    <span class="checkbox-checkmark-box">
                                                    
                                                      <span class="checkbox-checkmark"></span>
                                                    </span>
                                                </label>
                                                <!-- <input type="radio" name="anotherGallery" id="Galleryyes" value="Y"> -->
                                            </div> <br>
                                            <div class="check-yes-btn">
                                                <label for="Galleryno" class="yesss">No</label>
                                                <!-- <input type="radio" name="anotherGallery" id="Galleryno" value="N"> -->
                                                <label class="radio">
                                                    <input class="checkbox-input" type="radio" name="anotherGallery" id="Galleryno" value="N">
                                                    <span class="checkbox-checkmark-box">
                                                        
                                                      <span class="checkbox-checkmark"></span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div> 
                                    </div> 
                                    <br>
                                    <div class="form-detail">
                                        <label>Do you have any <strong>Online Portfolio?*</strong></label><br>
                                         <div class="selection-option">
                                            <div class="check-yes-btn">
                                             <label for="Portfolioyes" class="yesss">Yes</label>
                                               <label class="radio">
                                                    <input class="checkbox-input" type="radio"name="Portfolio" id="Portfolioyes" value="Y">
                                                    <span class="checkbox-checkmark-box">
                                                    
                                                      <span class="checkbox-checkmark"></span>
                                                    </span>
                                                </label>
                                            </div><br>
                                                <!-- <input type="radio" name="Portfolio" id="Portfolioyes" value="Y"> -->
                                             
                                            <div class="check-yes-btn">
                                                <label for="Portfoliono" class="yesss">No</label>
                                                <!-- <input type="radio" name="Portfolio" id="Portfoliono" value="N"> -->
                                                <label class="radio">
                                                    <input class="checkbox-input" type="radio" name="Portfolio" id="Portfoliono" value="N">
                                                    <span class="checkbox-checkmark-box">
                                                        
                                                      <span class="checkbox-checkmark"></span>
                                                    </span>
                                                </label>
                                            </div>   
                                          <!--   <div class="check-yes-btn">
                                                <button class="y-btn">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T05_38_43_242Z.png"></a> 
                                                </button> -->
                                                <!-- <i class="fas fa-check"></i> -->
                                           <!--      <input type="name" name="portfoliotypeyes" id="y-name" placeholder="Yes" pattern="[Yy]es|[Nn]o"  readonly="">
                                            </div>
                                            <div class="check-yes-btn">
                                                <button class="n-btn">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T05_39_39_582Z.png"></a> 
                                                </button> -->
                                                <!-- <i class="fas fa-check"></i> -->
                                             <!--    <input type="name" name="portfoliotypeno" id="y-name" placeholder="No" pattern="[Yy]es|[Nn]o"  readonly="">
                                            </div>  -->     
                                        </div> 
                                    </div> 
                                    <!-- <br>
                                     <div class="form-detail">
                                        <p><strong>Artistic Experience</strong> plays a major rolein our selection process. Please provide us with your most completed CV (main solo or collective exhibition prizes,art fairs,etc...)</p><br>
                                        <input type="button" value="continue">     
                                    </div> -->
                                    <br>    
                                    <!-- <div class="form-detail cv">
                                        <p>We will check your resume, so we would like you to list here (for eg: what are your most important exhibitions, awards/prizes, etc).<br>Please provide us with the name, the year and the place of each experience. incomplete information will not be taken into consideration. </p><br>
                                    </div> 
                                    <br>
                                    <div class="form-detail">
                                        <p>If you have, Please upload your CV through a URL link here*</p><br>
                                    </div> -->
                                        <input type="hidden" name="cvlink" value="cvlink" id="cvlink" placeholder="https://" >
                                        <input type="hidden" name="ans1" value="ans1" id="ans1" placeholder="Type your answer here..." >
                                    <br>
                                    <div class="nxy-btn"><button type="submit" class="next-btn">NEXT
                                    </button>
                                    
                              </div>  
                            </div>
                            </div> 
                        </div>

                        <!-- ARTWORK DETAILS -->
                        <div class="container form3" id="work-from">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="faq-img">
                                    <img src="{{url('image/2d1eff1324d6bec164eb41e214d07ac6.jpg') }}">
                                    <div class="back-btn">
                                    <a href="">
                                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                        Back to User Sign In
                                    </a>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="detail-form" >
                                  
                                    <div class="form-detail" id="mediums">
                                        <label>What are your <strong>Main Mediums?*</strong></label>
                                        <br>
                                        <div class="selection-option">
                                            <div class="mediums-btn">
                                                <!-- <input type="checkbox" id="Painting" name="Mediums[]" value="Painting" class="answer_check"> -->
                                                <div class="check-yes-btn" >
                                                    <label class="checkbox" style="left: -32px;">
                                                        <input class="checkbox-input answer_check" type="checkbox" id="Painting" name="Mediums[]" value="Painting">
                                                        <span class="checkbox-checkmark-box">
                                                            
                                                          <span class="checkbox-checkmark"></span>
                                                        </span>
                                                    </label>
                                                    <label for="Painting" class="yesss"> Painting</label><br>
                                                </div>    
                                                <!-- <button class="mediums-btn1">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_17_26_445Z.png"></a> -->
                                                    <!-- <input type="checkbox" id="yes">  -->
                                                <!-- </button> -->
                                                 <!-- <i class="fas fa-check"></i> -->
                                                <!-- <input type="name" name="mediums-option" id="mediums-option" placeholder="Painting" readonly=""> -->
                                            </div><br>
                                            <div class="mediums-btn">
                                                <!-- <input type="checkbox" id="Sculpture" name="Mediums[]" value="Sculpture"class="answer_check"> -->
                                            <div class="check-yes-btn">  
                                                <label class="checkbox">
                                                        <input class="checkbox-input answer_check" type="checkbox" id="Sculpture" name="Mediums[]" value="Sculpture">
                                                        <span class="checkbox-checkmark-box">
                                                            
                                                          <span class="checkbox-checkmark"></span>
                                                        </span>
                                                </label>
                                                <label for="Sculpture" class="yesss"> Sculpture</label><br>
                                            </div>
                                                <!-- <button class="mediums-btn2">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_17_47_803Z.png"></a> 
                                                </button> -->
                                                <!-- <i class="fas fa-check"></i> -->
                                               <!--  <input type="name" name="mediums-optionno" id="mediums-option" placeholder="Sculpture"  readonly=""> -->
                                            </div>      
                                        </div><br>
                                        <div class="selection-option">
                                            <div class="mediums-btn">
                                                 <!-- <input type="checkbox" id="Photography" name="Mediums[]" value="Photography" class="answer_check"> -->
                                               <div class="check-yes-btn">  
                                                <label class="checkbox" id="c-btn">
                                                    <input class="checkbox-input answer_check" type="checkbox" id="Photography" name="Mediums[]" value="Photography">
                                                    <span class="checkbox-checkmark-box">
                                                        
                                                      <span class="checkbox-checkmark"></span>
                                                    </span>
                                                </label>

                                                <label for="Photography" class="yesss"> Photography</label>
                                               </div> 
                                               <!--  <button class="mediums-btn3">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_18_15_358Z.png"></a> -->
                                                    <!-- <input type="checkbox" id="yes">  -->
                                                <!-- </button> -->
                                                 <!-- <i class="fas fa-check"></i> -->
                                                <!-- <input type="name" name="mediums-option" id="mediums-option" placeholder="Photography" readonly=""> -->
                                            </div><br>
                                            <div class="mediums-btn">
                                                <!-- <input type="checkbox" id="MIxed-Media" name="Mediums[]" value="MIxed Media" class="answer_check"> -->
                                                <div class="check-yes-btn" id="op-d" >
                                                    <label class="checkbox" id="d-btn">
                                                        <input class="checkbox-input answer_check" type="checkbox" id="MIxed-Media" name="Mediums[]" value="MIxed Media">
                                                        <span class="checkbox-checkmark-box">
                                                          
                                                          <span class="checkbox-checkmark"></span>
                                                        </span>
                                                    </label>
                                                    <label for="MIxed-Media" class="yesss"> MIxed Media</label>
                                                </div>    
                                                <!-- <button class="mediums-btn4">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_18_35_702Z.png"></a> 
                                                </button> -->
                                                <!-- <i class="fas fa-check"></i> -->
                                                <!-- <input type="name" name="mediums-option" id="mediums-option" placeholder="MIxed Media"  readonly=""> -->
                                            </div>      
                                        </div><br>
                                        <div class="selection-option">
                                            <div class="mediums-btn">
                                                 <!-- <input type="checkbox" id="Textile" name="Mediums[]" value="Textile" class="answer_check"> -->
                                                 <div class="check-yes-btn">
                                                     <label class="checkbox" style="left: -19px;">
                                                        <input class="checkbox-input answer_check" type="checkbox" id="Textile" name="Mediums[]" value="Textile">
                                                        <span class="checkbox-checkmark-box">
                                                           
                                                          <span class="checkbox-checkmark"></span>
                                                        </span>
                                                    </label>
                                                    <label for="Textile" class="yesss"> Textile</label>
                                                  </div>  
                                                <!-- <button class="mediums-btn5">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_19_55_202Z.png"></a> -->
                                                    <!-- <input type="checkbox" id="yes">  -->
                                                <!-- </button> -->
                                                 <!-- <i class="fas fa-check"></i> -->
                                               <!--  <input type="name" name="mediums-option" id="mediums-option" placeholder="Textile"  readonly=""> -->
                                            </div><br>
                                            <div class="mediums-btn">
                                                 <!-- <input type="checkbox" id="Drawing" name="Mediums[]" value="Drawing" class="answer_check"> -->
                                                 <div class="check-yes-btn">
                                                    <label class="checkbox" style="left: -33px;">
                                                        <input class="checkbox-input answer_check" type="checkbox" id="Drawing" name="Mediums[]" value="Drawing">
                                                        <span class="checkbox-checkmark-box">
                                                           
                                                          <span class="checkbox-checkmark"></span>
                                                        </span>
                                                    </label>
                                                    <label for="Drawing" class="yesss"> Drawing</label>
                                                </div>    
                                               <!--  <button class="mediums-btn6">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_20_13_319Z.png"></a> 
                                                </button> -->
                                                <!-- <i class="fas fa-check"></i> -->
                                                <!-- <input type="name" name="mediums-option" id="mediums-option" placeholder="Drawing"  readonly=""> -->
                                            </div>      
                                        </div><br>
                                        <div class="selection-option">
                                            <div class="mediums-btn">
                                                 <!-- <input type="checkbox" id="Installation" name="Mediums[]" value="Installation" class="answer_check"> -->
                                                 <div class="check-yes-btn">
                                                    <label class="checkbox" style="    left: -53px;">
                                                        <input class="checkbox-input answer_check" type="checkbox" id="Installation" name="Mediums[]" value="Installation">
                                                        <span class="checkbox-checkmark-box">
                                                          
                                                          <span class="checkbox-checkmark"></span>
                                                        </span>
                                                    </label>
                                                    <label for="Installation" class="yesss"> Installation</label>
                                                </div>    
                                                <!-- <button class="mediums-btn7">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_21_10_298Z.png"></a> -->
                                                    <!-- <input type="checkbox" id="yes">  -->
                                               <!--  </button> -->
                                                 <!-- <i class="fas fa-check"></i> -->
                                                <!-- <input type="name" name="mediums-option" id="mediums-option" placeholder="Installation" readonly=""> -->
                                            </div><br>
                                            <div class="mediums-btn">
                                                <!-- <input type="checkbox" id="Video" name="Mediums[]" value="Video" class="answer_check"> -->
                                                <div class="check-yes-btn">
                                                    <label class="checkbox" style="    left: -13px;">
                                                        <input class="checkbox-input answer_check" type="checkbox" id="Video" name="Mediums[]" value="Video">
                                                        <span class="checkbox-checkmark-box">
                                                           
                                                          <span class="checkbox-checkmark"></span>
                                                        </span>
                                                    </label>
                                                    <label for="Video" class="yesss"> Video</label>
                                                </div>    
                                               <!--  <button class="mediums-btn8">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_21_41_593Z.png"></a> 
                                                </button> -->
                                                <!-- <i class="fas fa-check"></i> -->
                                             <!--    <input type="name" name="mediums-option" id="mediums-option" placeholder="Video"  readonly=""> -->
                                            </div>      
                                        </div><br>
                                        <div class="selection-option">
                                            <div class="mediums-btn-i">
                                                 <!-- <input type="checkbox" id="Other" name="Mediums[]" value="Other" class="answer_check"> -->
                                                 <div class="check-no-btn">
                                                    <label class="checkbox">
                                                        <input class="checkbox-input answer_check" type="checkbox" id="Other" name="Mediums[]" value="Other">
                                                        <span class="checkbox-checkmark-box">
                                                           
                                                          <span class="checkbox-checkmark"></span>
                                                        </span>
                                                    </label>
                                                    <label for="Other" class="yesss"> Other</label>
                                                </div>    
                                                <!-- <button class="mediums-btn9">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_23_11_200Z.png"></a> -->
                                                    <!-- <input type="checkbox" id="yes">  -->
                                                <!-- </button> -->
                                                 <!-- <i class="fas fa-check"></i> -->
                                               <!--  <input type="name" name="mediums-option" id="mediums-option" placeholder="Other" readonly=""> -->
                                            </div>
                                                  
                                        </div><br>
                                         
                                    </div>       
                                        <br>
                                    <div class="form-detail">
                                        <label>Please select your <strong>Artwork selling prize range?*</strong></label><br>
                                        <div class="selection-option">
                                            <div class="mediums-btn" id="optionsss">

                                                 <!-- <input type="checkbox" id="pricerang250" name="pricerang[]" value="< 250" class="pricerangcheck"> -->
                                               <div class="check-yes-btn">  
                                                 <label class="checkbox">
                                                        <input class="checkbox-input pricerangcheck" type="checkbox" id="pricerang250" name="pricerang[]" value="< 250">
                                                        <span class="checkbox-checkmark-box">
                                                            
                                                          <span class="checkbox-checkmark"></span>
                                                        </span>
                                                    </label>
                                                    <label for="pricerang250" class="yesss"> < 250</label>
                                                </div>    

                                                <!-- <button class="mediums-btn1">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_17_26_445Z.png"></a> -->
                                                    <!-- <input type="checkbox" id="yes">  -->
                                               <!--  </button> -->
                                                 <!-- <i class="fas fa-check"></i> -->
                                              <!--   <input type="name" name="pricerang" id="mediums-option" placeholder="< 250"  readonly=""> -->
                                            </div><br>
                                            <div class="mediums-btn">
                                               <!--  <button class="mediums-btn2">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_17_47_803Z.png"></a> 
                                                </button> -->
                                                <!-- <i class="fas fa-check"></i> -->
                                                <!-- <input type="name" name="pricerang" id="mediums-option" placeholder="250 - 1000"  readonly=""> -->
                                                <!-- <input type="checkbox" id="pricerang250-1000" name="pricerang[]" value="250 - 1000" class="pricerangcheck"> -->
                                                <div class="check-yes-btn">
                                                    <label class="checkbox" style="left:-65px;">
                                                            <input class="checkbox-input pricerangcheck" type="checkbox"  id="pricerang250-1000" name="pricerang[]" value="250 - 1000">
                                                            <span class="checkbox-checkmark-box">
                                                                
                                                              <span class="checkbox-checkmark"></span>
                                                            </span>
                                                    </label>
                                                    <label for="pricerang250-1000" class="yesss"> 250 - 1000</label>
                                                </div>    
                                            </div>      
                                        </div><br>
                                        <div class="selection-option" id="cd-btn">
                                            <div class="mediums-btn">
                                               <!--  <button class="mediums-btn3">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_18_15_358Z.png"></a> -->
                                                    <!-- <input type="checkbox" id="yes">  -->
                                              <!--   </button> -->
                                                 <!-- <i class="fas fa-check"></i> -->
                                               <!--  <input type="name" name="pricerang" id="mediums-option" placeholder="1000 - 2500"  readonly=""> -->

                                               <!-- <input type="checkbox" id="pricerang1000-2500" name="pricerang[]" value="1000 - 2500" class="pricerangcheck"> -->
                                               <div class="check-yes-btn">
                                                   <label class="checkbox">
                                                            <input class="checkbox-input pricerangcheck" type="checkbox" id="pricerang1000-2500" name="pricerang[]" value="1000 - 2500">
                                                            <span class="checkbox-checkmark-box">
                                                                
                                                              <span class="checkbox-checkmark"></span>
                                                            </span>
                                                        </label>
                                                    <label for="pricerang1000-2500" class="yesss"> 1000 - 2500</label>
                                                </div>    
                                            </div><br>
                                            <div class="mediums-btn">
                                                <!-- <button class="mediums-btn4">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_18_35_702Z.png"></a> 
                                                </button> -->
                                                <!-- <i class="fas fa-check"></i> -->
                                                <!-- <input type="name" name="pricerang" id="mediums-option" placeholder="2500 - 5000"  readonly=""> -->
                                                <!-- <input type="checkbox" id="pricerang2500-5000" name="pricerang[]" value="2500 - 5000" class="pricerangcheck"> -->
                                                <div class="check-yes-btn">
                                                    <label class="checkbox">
                                                            <input class="checkbox-input pricerangcheck" type="checkbox"  id="pricerang2500-5000" name="pricerang[]" value="2500 - 5000" >
                                                            <span class="checkbox-checkmark-box">
                                                              
                                                              <span class="checkbox-checkmark"></span>
                                                            </span>
                                                    </label>
                                                    <label for="pricerang2500-5000" class="yesss"> 2500 - 5000</label>
                                                </div>    
                                            </div>      
                                        </div><br>
                                        <div class="selection-option" >
                                            <div class="mediums-btn">
                                                <!-- <button class="mediums-btn5">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_19_55_202Z.png"></a> -->
                                                    <!-- <input type="checkbox" id="yes">  -->
                                                <!-- </button> -->
                                                 <!-- <i class="fas fa-check"></i> -->
                                                <!-- <input type="name" name="pricerang" id="mediums-option" placeholder="5000 - 10000" readonly=""> -->
                                                <!-- <input type="checkbox" id="pricerang5000-10000" name="pricerang[]" value="5000 - 10000" class="pricerangcheck"> -->
                                                <div class="check-yes-btn">
                                                    <label class="checkbox" style="left:-102px;">
                                                            <input class="checkbox-input pricerangcheck" type="checkbox" id="pricerang5000-10000" name="pricerang[]" value="5000 - 10000">
                                                            <span class="checkbox-checkmark-box">
                                                               
                                                              <span class="checkbox-checkmark"></span>
                                                            </span>
                                                        </label>
                                                    <label for="pricerang5000-10000" class="yesss"> 5000 - 10000</label>
                                                </div>    
                                            </div><br>
                                            <div class="mediums-btn">
                                               <!--  <button class="mediums-btn6">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_20_13_319Z.png"></a> 
                                                </button> -->
                                                <!-- <i class="fas fa-check"></i> -->
                                               <!--  <input type="name" name="pricerang" id="mediums-option" placeholder="> 10000"  readonly=""> -->
                                                <!-- <input type="checkbox" id="pricerang10000" name="pricerang[]" value="> 10000" class="pricerangcheck"> -->
                                                <div class="check-yes-btn">
                                                    <label class="checkbox">
                                                            <input class="checkbox-input pricerangcheck" type="checkbox"  id="pricerang10000" name="pricerang[]" value="> 10000" >
                                                            <span class="checkbox-checkmark-box">
                                                               
                                                              <span class="checkbox-checkmark"></span>
                                                            </span>
                                                    </label>
                                                    <label for="pricerang10000" class="yesss"> > 10000</label>
                                                </div>    
                                            </div>      
                                        </div>  
                                    </div> 
                                    <br>
                                    <div class="form-detail">
                                        <label>How many artworks have you <strong>sold</strong> inthe past 12 months?*</label><br>
                                         <input type="Number" name="solditeam" id="solditeam" placeholder="Type your answer here...">
                                    </div> 
                                    <br>
                                    <div class="form-detail">
                                        <label>How many artworks do you <strong>Produce</strong> each months?*</label><br>
                                         <input type="Number" name="solditeammonth" id="solditeammonth" placeholder="Type your answer here...">
                                    </div> 
                                    <br>
                                    <div class="form-detail upload">
                                        <p>Feel free to upload here a selection of artwork picture you would like to present on <strong>Lakouphoto*</strong></p><br>
                                        <input type="file" id="myFile" name="filename[]" accept=".png, .jpg, .jpeg" multiple>  
                                        <!-- <div class="file-text"> 
                                            <img src="/lakouphoto-design/images/PngItem_4071043.png">
                                            <p>Choose file or drag here<br>
                                                    Size limit: 10MB</p>
                                        </div>   -->
                                    </div>
                                    <br>    
                                    <div class="form-detail cv">
                                        <label>Why you think Lakouphoto would need to select you?*</label><br>
                                        <div class="selection-option">
                                            <div class="mediums-btn">
                                                <!-- <button class="mediums-btn1">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_17_26_445Z.png"></a> -->
                                                    <!-- <input type="checkbox" id="yes">  -->
                                              <!--   </button> -->
                                                 <!-- <i class="fas fa-check"></i> -->
                                                <!-- <input type="name" name="q1" id="mediums-option" placeholder="I am an experienced artist." readonly=""> -->
                                                <div class="check-yes-btn">
                                                    <label class="checkbox">
                                                        <input class="checkbox-input quscheck" type="checkbox" id="q1" name="ques[]" value="1">
                                                        <span class="checkbox-checkmark-box">
                                                            
                                                          <span class="checkbox-checkmark"></span>
                                                        </span>
                                                    </label>
                                                    <!-- <input type="checkbox" id="q1" name="ques[]" value="1" class="quscheck"> -->
                                                    <label for="q1" class="yesss"> I am an experienced artist.</label>
                                                </div>    
                                            </div><br>
                                            <div class="mediums-btn">
                                               <!--  <button class="mediums-btn2">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_17_47_803Z.png"></a> 
                                                </button> -->
                                                <!-- <i class="fas fa-check"></i> -->
                                                <!-- <input type="name" name="q2" id="mediums-option" placeholder="I am an emerging artist." readonly=""> -->
                                                <div class="check-yes-btn">
                                                    <label class="checkbox">
                                                        <input class="checkbox-input quscheck" type="checkbox" id="q2" name="ques[]" value="2">
                                                        <span class="checkbox-checkmark-box">
                                                            
                                                          <span class="checkbox-checkmark"></span>
                                                        </span>
                                                    </label>
                                                <!-- <input type="checkbox" id="q2" name="ques[]" value="2" class="quscheck"> -->
                                                    <label for="q2" class="yesss"> I am an emerging artist.</label>
                                                </div>    
                                            </div><br>     
                                            <div class="mediums-btn">
                                                <!-- <button class="mediums-btn3">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_18_15_358Z.png"></a> -->
                                                    <!-- <input type="checkbox" id="yes">  -->
                                                <!-- </button> -->
                                                 <!-- <i class="fas fa-check"></i> -->
                                                <!-- <input type="name" name="q3" id="mediums-option" placeholder="I have participated in many fairs worldwide." readonly=""> -->
                                                <div class="check-yes-btn">
                                                    <label class="checkbox">
                                                        <input class="checkbox-input quscheck" type="checkbox" id="q3" name="ques[]" value="3">
                                                        <span class="checkbox-checkmark-box">
                                                            
                                                          <span class="checkbox-checkmark"></span>
                                                        </span>
                                                    </label>
                                                    <!-- <input type="checkbox" id="q3" name="ques[]" value="3" class="quscheck"> -->
                                                    <label for="q3" class="yesss"> I have participated in many fairs worldwide.</label>
                                                </div>    
                                            </div><br>
                                            <div class="mediums-btn">
                                                <!-- <button class="mediums-btn4">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_18_35_702Z.png"></a> 
                                                </button> -->
                                                <!-- <i class="fas fa-check"></i> -->
                                                <!-- <input type="name" name="q4" id="mediums-option" placeholder="My works are present in many private collections." readonly=""> -->
                                                <div class="check-yes-btn">
                                                    <label class="checkbox">
                                                        <input class="checkbox-input quscheck" type="checkbox" id="q4" name="ques[]" value="4">
                                                        <span class="checkbox-checkmark-box">
                                                          
                                                          <span class="checkbox-checkmark"></span>
                                                        </span>
                                                    </label>
                                                    <!-- <input type="checkbox" id="q4" name="ques[]" value="4" class="quscheck"> -->
                                                    <label for="q4" class="yesss"> My works are present in many private collections.</label>
                                                </div>    
                                            </div> <br>
                                            <div class="mediums-btn">
                                                <!-- <button class="mediums-btn5">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_19_55_202Z.png"></a> -->
                                                    <!-- <input type="checkbox" id="yes">  -->
                                                <!-- </button> -->
                                                 <!-- <i class="fas fa-check"></i> -->
                                               <!--  <input type="name" name="q5" id="mediums-option" placeholder="I have participated to a biennal." readonly=""> -->
                                                <div class="check-yes-btn">
                                                    <label class="checkbox">
                                                        <input class="checkbox-input quscheck" type="checkbox" id="q5" name="ques[]" value="5">
                                                        <span class="checkbox-checkmark-box">
                                                           
                                                          <span class="checkbox-checkmark"></span>
                                                        </span>
                                                    </label>
                                                   <!-- <input type="checkbox" id="q5" name="ques[]" value="5" class="quscheck"> -->
                                                    <label for="q5" class="yesss"> I have participated to a biennal.</label>
                                                </div>    
                                            </div><br>
                                            <div class="mediums-btn">
                                                <!-- <button class="mediums-btn6">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_20_13_319Z.png"></a> 
                                                </button> -->
                                                <!-- <i class="fas fa-check"></i> -->
                                                <!-- <input type="name" name="q6" id="mediums-option" placeholder="My works are present in many public collections." readonly=""> -->
                                                <div class="check-yes-btn">
                                                    <label class="checkbox">
                                                        <input class="checkbox-input quscheck" type="checkbox" id="q6" name="ques[]" value="6">
                                                        <span class="checkbox-checkmark-box">
                                                           
                                                          <span class="checkbox-checkmark"></span>
                                                        </span>
                                                    </label>
                                                    <!-- <input type="checkbox" id="q6" name="ques[]" value="6" class="quscheck"> -->
                                                    <label for="q6" class="yesss"> My works are present in many public collections.</label>
                                                </div>    
                                            </div><br>

                                            <div class="mediums-btn">
                                                <!-- <button class="mediums-btn7">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_21_10_298Z.png"></a> -->
                                                    <!-- <input type="checkbox" id="yes">  -->
                                                <!-- </button> -->
                                                 <!-- <i class="fas fa-check"></i> -->
                                                <!-- <input type="name" name="q7" id="mediums-option" placeholder="I have many followers on social media." readonly=""> -->
                                                <div class="check-yes-btn">
                                                    <label class="checkbox">
                                                        <input class="checkbox-input quscheck" type="checkbox" id="q7" name="ques[]" value="7">
                                                        <span class="checkbox-checkmark-box">
                                                          
                                                          <span class="checkbox-checkmark"></span>
                                                        </span>
                                                    </label>
                                                    <!-- <input type="checkbox" id="q7" name="ques[]" value="7" class="quscheck"> -->
                                                    <label for="q7" class="yesss"> I have many followers on social media.</label>
                                                </div>    
                                            </div><br>
                                            <div class="mediums-btn">
                                                <!-- <button class="mediums-btn8">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_21_41_593Z.png"></a> 
                                                </button> -->
                                                <!-- <i class="fas fa-check"></i> -->
                                                <!-- <input type="name" name="q8" id="mediums-option" placeholder="I am passionate about art and want to share work." readonly=""> -->
                                                <div class="check-yes-btn">
                                                    <label class="checkbox">
                                                        <input class="checkbox-input quscheck" type="checkbox" id="q8" name="ques[]" value="8">
                                                        <span class="checkbox-checkmark-box">
                                                           
                                                          <span class="checkbox-checkmark"></span>
                                                        </span>
                                                    </label>
                                                    <!-- <input type="checkbox" id="q8" name="ques[]" value="8" class="quscheck"> -->
                                                    <label for="q8" class="yesss"> I am passionate about art and want to share work.</label>
                                                </div>    
                                            </div><br>
                                            <div class="mediums-btn-i">
                                                <!-- <button class="mediums-btn9">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T09_23_11_200Z.png"></a> -->
                                                    <!-- <input type="checkbox" id="yes">  -->
                                                <!-- </button> -->
                                                 <!-- <i class="fas fa-check"></i> -->
                                               <!--  <input type="name" name="q9" id="mediums-option" placeholder="Other"  readonly=""> -->
                                               <div class="check-no-btn">
                                                    <label class="checkbox">
                                                        <input class="checkbox-input quscheck" type="checkbox" id="q9" name="ques[]" value="9">
                                                        <span class="checkbox-checkmark-box">
                                                           
                                                          <span class="checkbox-checkmark"></span>
                                                        </span>
                                                    </label>
                                                    <!-- <input type="checkbox" id="q9" name="ques[]" value="9" class="quscheck"> -->
                                                    <label for="q9" class="yesss"> Other</label>
                                                </div>    
                                            </div>   
                                        </div>    
                                    </div> 
                                    <br>
                                    <div class="form-detail confirmation">
                                        <label>I confirm that the information given in this form is true, complete and accurate.</label><br>
                                        <div class="selection-option">
                                            <div class="check-yes-btn">
                                                <label class="radio">
                                                    <input class="checkbox-input" type="radio" name="confomaply" id="confomaplyyes" value="Y">
                                                    <span class="checkbox-checkmark-box">
                                                    
                                                      <span class="checkbox-checkmark"></span>
                                                    </span>
                                                </label>
                                                <label for="confomaplyyes" class="yesssc">Yes</label>
                                            </div>  <br>  
                                              <!-- <input type="radio" name="confomaply" id="confomaplyyes" value="Y"> -->
                                             
                                                <div class="check-yes-btn">
                                                    <label class="radio">
                                                        <input class="checkbox-input" type="radio"  name="confomaply" id="confomaplyno" value="N">
                                                        <span class="checkbox-checkmark-box">
                                                            
                                                          <span class="checkbox-checkmark"></span>
                                                        </span>
                                                    </label>
                                                    <label for="confomaplyno" class="yesssc">No</label>
                                                </div>    
                                                <!-- <input type="radio" name="confomaply" id="confomaplyno" value="N"> -->
                                            <!-- <div class="check-yes-btn">
                                                <button class="y-btn">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T05_38_43_242Z.png"></a> 
                                                </button> -->
                                                <!-- <i class="fas fa-check"></i> -->
                                                <!-- <input type="name" name="confomaply" id="y-name" placeholder="Yes" pattern="[Yy]es|[Nn]o"  readonly="">
                                            </div>
                                            <div class="check-yes-btn">
                                                <button class="n-btn">
                                                    <a href=""><img src="/lakouphoto-design/images/image_2021_12_24T05_39_39_582Z.png"></a> 
                                                </button> -->
                                                <!-- <i class="fas fa-check"></i> -->
                                               <!--  <input type="name" name="confomaplyno" id="y-name" placeholder="No" pattern="[Yy]es|[Nn]o" readonly="">
                                            </div>      --> 
                                        </div>
                                    </div>
                                    <br>
                                    <div class="nxy-btn"><button type="submit" class="next-btn">NEXT</button></div>
                                    
                                </div>  
                            </div>
                        
                        </form>    
                    </div>    
                </div>
            </div>
        </section> 

        <!-- top scroll -->
        <a href="#" class="scrollToTop back-to-top" data-toggle="tooltip" title="Top"><i class="icon-paint-brush"></i></a>
        <script type="text/javascript" src="{{ url('public/assets/js/login.js?v=5765431') }}"></script>
        <script type="text/javascript">
            $('#basic').flagStrap();

            $('.select-country').flagStrap({
                countries: {
                    "IN": "",
                    "US": "",
                    "AU": "",
                    "CA": "",
                    "SG": "",
                    "GB": "",
                },
                buttonSize: "btn-sm",
                buttonType: "btn-info",
                labelMargin: "10px",
                scrollable: false,
                scrollableHeight: "350px",
                onSelect: function (value, element) {
                    alert(value);
                    console.log(element);
                }
            });
         

            $('#advanced').flagStrap({
                buttonSize: "btn-lg",
                buttonType: "btn-primary",
                labelMargin: "20px",
                scrollable: false,
                scrollableHeight: "350px"
            });
        </script>
        <script type="text/javascript" src="{{url('assets/js/artist-login.js?v=123443234')}}"></script>
@extends('frontview.layouts.footer')
@endsection
