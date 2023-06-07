       @section('footer')
        <footer class="mt-30">
            <div class="container">
                <div class="row">
                    <div class="footer-top">
                        <div class="col-sm-3">
                            <div class="position-footer-left">
                                <h5 class="toggled title">contact info</h5>
                                <ul class="list-unstyled">
                                    <li>
                                        <div class="site">
                                            <div class="contact_title">address:</div>
                                            <div class="contact_site">  1398 McInnes Ave Kelowna B.C. V1Y5V9 Canada</div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="phone">
                                            <div class="contact_title">phone:</div>
                                            <div class="contact_site">  
                                              +1 236 795-8121
                                            </div>
                                        </div>
                                    </li>
                                   <!--  <li>
                                        <div class="fax">
                                            <div class="contact_title">fax:</div>
                                            <div class="contact_site">0123-456-789</div>
                                        </div>
                                    </li> -->
                                <!--    <li>-->
                                <!--        <div class="email">-->
                                <!--            <div class="contact_title">email:</div>-->
                                <!--            <div class="contact_site"><a href="mailto: info@lakouphoto.com">  -->
                                <!--  info@lakouphoto.com-->
                                <!--</a></div>-->
                                <!--        </div>-->
                                <!--    </li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="footer-content">
                                <h5>Information</h5>
                                <ul class="list-unstyled">
                                    <li><a href="{{url('/about-us')}}">About Us</a></li>
                                    <li><a href="{{url('/blogs')}}">Blogs</a></li>

                                    <li><a href="{{url('/privacy-policy')}}">Privacy Policy</a></li>
                                    <li><a href="{{url('/terms-conditions')}}">Terms &amp; Conditions</a></li>
                                    <li><a href="{{url('/contact-us')}}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="footer-content">
                                <h5>My Account</h5>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('myaccount.index')}}">My Account</a></li>
                                    <li><a href="{{url('/orderhistory')}}">Order History</a></li>
                                    <li><a href="{{url('/wish-list')}}">Wish List</a></li>
                                    

                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="footer-content">
                                <h5>Extras</h5>
                                <ul class="list-unstyled">
                                    <li><a href="{{url('/products-list')}}">Artwork</a></li>
                                    <li><a href="{{url('/artist-list')}}">Artists </a></li>
                                    <li><a href="{{url('/collections-list')}}">Collections</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="position-footer-right">
                                <div class="footer_aboutus">
                                    <a href="{{url('/homepage')}}"> <img alt="" src="{{ url('/assets/images/lakouphoto.svg') }}" /> </a>
                                    <!-- <div class="footer-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div> -->
                                    <div class="social-media">
                                        <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-youtube-play"></i></a> <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"> <i class="fa fa-pinterest-p"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <p class="powered">Powered By <a href="{{url('/homepage')}}">Lakouphoto</a> &copy; 2022</p>
                        </div>
                        <div class="col-md-4 col-sm-12"  style="text-align: center;">
                            <p class="develop" style="float:none;">Developed By <a href="https://softskillers.ca/">Softskillers</a></p>
                        </div>
                        <div class="col-md-4 col-sm-12"> 
                            <div class="position-footer-bottom">
                                <div class="payment-link"><img src="{{ url('/assets/images/payment.png') }}" alt="" /></div>
                            </div>
                        </div>
                         
                    </div>    
                </div>
            </div>
        </footer>
        <script type="text/javascript">
            $('.owl-carousel.product-carousel').owlCarousel({
    margin:10,
    loop:true,
    autoWidth:true,
    items:4
})
        </script>
        @endsection