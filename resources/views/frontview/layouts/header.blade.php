@section('header')
@inject('CategoryType','App\Models\CategoryTypeModel')
@inject('childCategory','App\Models\ProductCategoryModel')
@inject('mylibrary', 'App\Helpers\MyLibrary')

        <header>
            <div class="header-top">
                <div class="container">
                    <div class="header-inner">
                        <!-- start logo -->
                        <div id="logo">
                            <a href="{{url('/homepage')}}"><img src="{{ url('assets/images/lakouphoto.svg') }}" title="Your Store" alt="Your Store" class="img-responsive" /></a>
                        </div>
                        @php $user = ''; @endphp
                        @if(isset($Front_user_id) && !empty($Front_user_id))
                        @php $user = $Front_user_id; @endphp
                        @endif
                        <input type="hidden" name="Userid" id="Userid" value="{{$user}}">
                        <!-- start menu -->
                        <nav id="menu" class="navbar navbar_menu">
                            <div class="navbar-header">
                                <button type="button" class="btn btn-navbar navbar-toggle" id="btnMenuBar"><span class="addcart-icon"></span></button>
                            </div>
                            <div id="topCategoryList" class="main-menu menu-navbar clearfix" data-more="More">
                                <div class="menu-close hidden-lg hidden-md"><span id="category" class="">Menu</span><i class="icon-close"></i></div>
                                <ul class="nav navbar-nav">
                                    <li class="menulist home"><a id="home" href="{{url('/homepage')}}">Home</a></li>
                                    <li class="dropdown menulist ">
                                        <a href="{{url('/products-list')}}" class="dropdown-toggle" aria-expanded="false">Artwork</a>
                                        <div class="dropdown-menu navcol-menu item-column column-3" id="art" style="height: 270px;margin-top: 0px;margin-left: -862.016px;width:800px;">
                                              <div class="row" style="">
                                                  <div class="col-md-4" style="padding-right: 0px!important; padding-left: 0px !important;">
                                                      <ul class="sub-menu-lists ">
                                                        @foreach($ProductCategorymenu as $category)
                                                        
                                                          <li class="responsive-menu" id='artdata-{{$category->id}}' onmouseover="show_blocks('{{$category->id}}', 'artwork')">
                                                              <a class="ga" href="{{url('product-cat/'.$category->slug)}}" data-smenu="{{$category->name}}" data-ga-c="browse_painting"><i class="fas fa-chevron-right" aria-hidden="true"></i>{{$category->name}}</a><i class="fa fa-plus" aria-hidden="true"></i>
                                                          </li>
                                                         @endforeach
                                                          
                                                      </ul>
                                                  </div>
                                                  
                                                  @php $coun = 1; @endphp
                                                  @foreach($ProductCategorymenu as $category)
                                                  @if($coun == 1)
                                                  @php $style = ''; @endphp
                                                  @else
                                                  @php $style = 'display: none;'; @endphp
                                                  @endif
                                                  <div class="sub-sub-menu sub-sub-menu-lists sub-menu-wop artworkdata" id="artwork-{{$category->id}}" style="{{$style}}">
                                                    @php
                                                      $Category = $CategoryType->getCategoryTypeBycatid($category->id);
                                                    @endphp
                                                    @if(isset($Category) && !empty($Category))
                                                    @foreach($Category as $type)
                                                    @php
                                                      $childCategoryData = $childCategory->getProductChildCategorylist($category->id,$type->id);
                                                    @endphp
                                                    @if(isset($childCategoryData) && !empty($childCategoryData) && count($childCategoryData) > 0 )
                                                      <div class="col-md-6 col-white">
                                                          <div class="subtitle sub-responsive"> {{$type->name}}</div>
                                                          <ul class="sub-menu-list-items">
                                                            @php $i = 0; @endphp
                                                            @foreach($childCategoryData as $childData)
                                                              <li class="sub-list-respo">
                                                                  <a href="{{url('product-cat/'.$childData->slug)}}" class="ga" data-ga-c="browse_work_on_paper" data-ga-l="{{$childData->name}}">{{$childData->name}}</a>
                                                              </li>
                                                              @php $i++; @endphp
                                                            @endforeach  
                                                          </ul>
                                                      </div>

                                                      @endif
                                                      @endforeach
                                                    @endif
                                                  </div>
                                                  @php $coun++; @endphp
                                                  @endforeach
                                                  <div class="sub-sub-menu sub-sub-menu-lists sub-menu-other hidden">
                                                      <div class="col-md-6 col-white">
                                                          <div class="subtitle">
                                                              <a class="ga" href="/en/print" data-ga-c="browse_print">
                                                                  Prints
                                                              </a>
                                                          </div>
                                                          <ul class="sub-menu-list-items">
                                                              <li>
                                                                  <a href="/en/print/abstract" class="ga" data-ga-c="browse_print" data-ga-l="abstract">Abstract</a>
                                                              </li>
                                                              <li>
                                                                  <a href="/en/print/figurative" class="ga" data-ga-c="browse_print" data-ga-l="figurative">Figurative</a>
                                                              </li>
                                                              <li>
                                                                  <a href="/en/print/landscape" class="ga" data-ga-c="browse_print" data-ga-l="landscape">Landscape</a>
                                                              </li>
                                                              <li>
                                                                  <a href="/en/print/portrait" class="ga" data-ga-c="browse_print" data-ga-l="portrait">Portrait</a>
                                                              </li>
                                                          </ul>
                                                      </div>
                                                      <div class="col-md-6 col-white">
                                                          <div class="subtitle">
                                                              <a class="ga" href="/en/other-media" data-ga-c="browse_other">
                                                                  Other
                                                              </a>
                                                          </div>
                                                          <ul class="sub-menu-list-items">
                                                              <li>
                                                                  <a href="/en/digital" class="ga" data-ga-c="browse_digital" data-ga-l="digital">Digital</a>
                                                              </li>
                                                              <li>
                                                                  <a href="/en/other-media" class="ga" data-ga-c="browse_other" data-ga-l="other">Other media</a>
                                                              </li>
                                                              <li>
                                                                  <a href="/en/textile" class="ga" data-ga-c="browse_textile" data-ga-l="textile">Textile</a>
                                                              </li>
                                                          </ul>
                                                      </div>
                                                  </div>

                                                  <div class="sub-sub-menu sub-menu-explore hidden">
                                                      <div class="col-md-4">
                                                          <div class="sub-menu-full-filter higher">
                                                              <i class="icon icon-top icon-icon-image-size"></i>
                                                              <div class="subtitle">Explore by size</div>
                                                              <ul class="sub-menu-explore-size">
                                                                  <li>
                                                                      <a href="/en/painting?size=small" class="ga" data-ga-c="browse_small">Smaller than 50 cm</a>
                                                                  </li>
                                                                  <li>
                                                                      <a href="/en/painting?size=medium" class="ga" data-ga-c="browse_medium">50 cm - 150 cm</a>
                                                                  </li>
                                                                  <li>
                                                                      <a href="/en/painting?size=large" class="ga" data-ga-c="browse_large">Larger than 150 cm</a>
                                                                  </li>
                                                              </ul>
                                                          </div>
                                                      </div>
                                                      <div class="col-md-4">
                                                          <div class="sub-menu-full-filter higher">
                                                              <i class="icon icon-top icon-ico-menu-price"></i>
                                                              <div class="subtitle">Explore by price</div>
                                                              <ul class="sub-menu-explore-price">
                                                                  <li>
                                                                      <a href="/en/painting?maxPrice=50000" class="ga" data-ga-c="browse_price_low">Less than 50 000 ₹</a>
                                                                  </li>
                                                                  <li>
                                                                      <a href="/en/painting?minPrice=50000&amp;maxPrice=250000" class="ga" data-ga-c="browse_price_med">From 50 000 to 250 000 ₹</a>
                                                                  </li>
                                                                  <li>
                                                                      <a href="/en/painting?minPrice=250000&amp;maxPrice=500000" class="ga" data-ga-c="browse_price_high">From 250 000 to 500 000 ₹</a>
                                                                  </li>
                                                                  <li>
                                                                      <a href="/en/painting?minPrice=500000" class="ga" data-ga-c="browse_price_vhigh">More than 500 000 ₹</a>
                                                                  </li>
                                                              </ul>
                                                          </div>
                                                      </div>
                                                  </div>

                                                  <div class="sub-sub-menu sub-menu-date hidden">
                                                      <div class="col-md-6">
                                                          <div class="sub-menu-full-block" style="background-image: url('https://d17h7hjnfv5s46.cloudfront.net/assets/build/images/menu/new_paint.20018309.jpg');">
                                                              <div class="shadow"></div>

                                                              <a href="/en/painting?orderBy=date" class="ga" data-ga-c="browse_date" rel="nofollow">
                                                                  <div class="content"><div class="title">Our latest paintings</div></div>
                                                                  <div class="icon-link"><i class="icon icon-ico-arrow-circle"></i></div>
                                                              </a>
                                                          </div>
                                                      </div>
                                                      <div class="col-md-4">
                                                          <div class="sub-menu-full-block" style="background-image: url('https://d17h7hjnfv5s46.cloudfront.net/assets/build/images/menu/new_photos.b098a937.jpg');">
                                                              <div class="shadow"></div>

                                                              <a href="/en/photography?orderBy=date" class="ga" data-ga-c="browse_photography_date" rel="nofollow">
                                                                  <div class="content"><div class="title">Our latest photographs</div></div>
                                                                  <div class="icon-link"><i class="icon icon-ico-arrow-circle"></i></div>
                                                              </a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>

                                </li>
                                <!-- Mobile menu -->

                           



                                <!-- Mobile menu end -->

                                          <li class="dropdown menulist">
                                              <a href="{{url('/artist-list')}}" class="dropdown-toggle" aria-expanded="false">Artist</a>
                                              <div class="dropdown-menu navcol-menu item-column column-3" style="   overflow-x: hidden; height: 346px; overflow-y: hidden; margin-top: 0px;margin-left: -862.016px;width: -webkit-fill-available;    left: 449%;  display: none;" class="shadow megaMenu mt-0" id="arty" >
                                                  <div class="container" style="padding-right: 0px !important; overflow: hidden; padding-left: 0px !important;">
                                                      <!-- <h4>Artwork Categories</h4> -->
                                                      <div class="row">
                                                          <div class="col-sm-4" style="  padding: 30px 20px 0px;background-color: #F9EFDF;height: 340px;">
                                                            @foreach($ArtistMenus as $ArtistMenu)
                                                            @php $artistUrl= url('/artist-details/'.$ArtistMenu->slug) @endphp
                                                              <div class="col-sm-12 heading-effects"  onmouseover="show_blocks('{{$ArtistMenu->id}}', 'artist')" onmouseout="hide_blocks('{{$ArtistMenu->id}}')" id="link-{{$ArtistMenu->id}}">
                                                                  <h6 class="artist-name">
                                                                      <a style=" display: flex; padding: 0px 18px;" href="{{$artistUrl}}">
                                                                          <i class="fas fa-chevron-right" aria-hidden="true"></i>
                                                                          <div style="    max-width: 180px;text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
                                                                          {{$ArtistMenu->firstname}} {{$ArtistMenu->lastname}}</div>
                                                                      </a>
                                                                  </h6>
                                                                  <p></p>
                                                              </div>
                                                            @endforeach

                                                              <div class="col-sm-12" id="0"></div>
                                                              <a style="position: relative; margin: 1px 0px 4px 15px !important;" class="button secondary artistbtn" data-ga-c="menu_artists_cta" href="{{url('/artist-list')}}">All our artists</a>
                                                          </div>

                                                          <div class="col-sm-8 responsive-menu p-0">
                                                            @foreach($ArtistMenus as $ArtistMenu)
                                                              <div style="position: relative;top: 0px;
                                                                left: -5%;width: 50%;    padding-left: 20px !important;" class="col-sm-12 block_container block_height " id="div-{{$ArtistMenu->id}}">
                                                                  <div class="col-sm-12 block_height" style="padding-left: 0px !Important;padding-right: 0px !Important;">
                                                                     @if(isset($ArtistMenu->profileimage) && file_exists(public_path().'/image/artist/'.$ArtistMenu->profileimage) && !empty($ArtistMenu->profileimage))
                                                                      <img src="{{url('image/artist/'.$ArtistMenu->profileimage)}}">
                                                                      @else
                                                                        <img class="default-image-menu" src="{{url('/image/artist/default-artist.svg') }}">
                                                                      @endif  
                                                                      <h6>
                                                                          <a style="color: white !important;" href="{{url('public/image/artist/'.$ArtistMenu->profileimage)}}">
                                                                              <!--  <i class="fas fa-chevron-right"></i> -->
                                                                              {{$ArtistMenu->firstname}} {{$ArtistMenu->lastname}}
                                                                          </a>
                                                                      </h6>
                                                                      
                                                                  </div>
                                                              </div>
                                                              @endforeach

                                                              <div class="col-sm-12" id="div-0" style="display: none;"></div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>

                                          </li>
                                          <!-- <li class="dropdown menulist">
                                              <a href="index1647.html?route=product/category&amp;path=25" class="dropdown-toggle" aria-expanded="false">Collections</a>
                                              <div class="dropdown-menu navcol-menu column-1">
                                                  <div class="dropdown-inner">
                                                      <ul class="list-unstyled childs_1">
                                                          <li class="">
                                                              <a href="index955a.html?route=product/category&amp;path=25_32" class="dropdown-toggle" aria-expanded="false">Divisionism</a>
                                                          </li>
                                                          <li class="">
                                                              <a href="indexc219.html?route=product/category&amp;path=25_29" class="dropdown-toggle" aria-expanded="false">Easel Painting</a>
                                                          </li>
                                                          <li class="">
                                                              <a href="index68a7.html?route=product/category&amp;path=25_30" class="dropdown-toggle" aria-expanded="false">Foreshortening</a>
                                                          </li>
                                                          <li class="">
                                                              <a href="indexf3db.html?route=product/category&amp;path=25_31" class="dropdown-toggle" aria-expanded="false">Graffiti</a>
                                                          </li>
                                                          <li class="dropdown-submenu sub-menu-item">
                                                              <a href="indexe177.html?route=product/category&amp;path=25_28" class="dropdown-toggle" aria-expanded="false">Pencil Grading</a>
                                                              <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                              <ul class="list-unstyled sub-menu">
                                                                  <li>
                                                                      <a href="indexf6ce.html?route=product/category&amp;path=28_36">Grisaille</a>
                                                                  </li>
                                                                  <li>
                                                                      <a href="index43ee.html?route=product/category&amp;path=28_35">Impasto</a>
                                                                  </li>
                                                              </ul>
                                                          </li>
                                                      </ul>
                                                  </div>
                                              </div>
                                          </li> -->
                                         <li class="dropdown menulist collections">
                                          <a href="{{url('/collections-list')}}">Collections</a>
                                          <div class="dropdown-menu navcol-menu item-column column-3" style="background-color: #F9EFDF;">
                                           
                                  <div class="menu__collections">
                                      @foreach($CollectionMenu as $CollectionMenu)

                                                            @php $collectionUrl= url('/collection/'.$CollectionMenu->slug) @endphp
                                      <div class="menu__collection-item">
                                          <a class="menu-card ga" href="{{$collectionUrl}}">
                                            <img class="lzy entered loaded menu-card__img" alt="Collection" src="{{url('/image/collection/'.$CollectionMenu->image)}}">
                                                  
                                              
                                              <div class="h3 menu-card__title">{{$CollectionMenu->name}}</div>
                                          </a>
                                      </div>
                                      @endforeach
                                    
                                      <div class="menu__collection-item">
                                       
                                          <a class="card-link ga text-center" href="{{url('/collections-list')}}" data-ga-c='"menu_collections_cta"'>
                                              <i class="fa fa-arrow-right"></i>
                                              <div class="h3 card-link__title">All collections</div>
                                          </a>
                                      </div>
                                  </div>


                                          </div>
                                         </li>
                                          <li class="blog"><a href="{{url('/contact-us')}}">Contact Us</a></li>
                                      </ul>
                                  </div>
                              </nav>

                                                    
                                                    <div class="header-right header-links">

                                                        <!-- lang -->
                                                        <div class="dropdown">
                                                              <div class="language-box1">
                                                                      <button class="btn btn-link dropdown-toggle dropdown" title="Language" id="language-hover" >
                                                                          <i class="fa fa-language"></i>
                                                                      </button>
                                                                        <ul class="language-dropdown lang" id="lang-pop" >
                                                                            <li>
                                                                                <button class="btn btn-link btn-block languFage-select" type="button" name="en-gb" onclick="translateLanguage('English');"><img src="{{url('/image/en-gb/en-gb.png') }}" alt="English" title="English" /> English</button>
                                                                            </li>
                                                                            <li>
                                                                                <button class="btn btn-link btn-block language-select" onclick="translateLanguage('Arabic');" type="button" name="ar"><img src="{{url('/assets/images/langues%20icon/arabic%20flag.png') }}" alt="Arbic" title="Arbic" /> Arabic</button>
                                                                            </li>
                                                                            <li>
                                                                                <button class="btn btn-link btn-block language-select" onclick="translateLanguage('German');" type="button" name="de"><img src="{{url('/assets/images/langues%20icon/deutch.png') }}" alt="Deutsch" title="Deutsch" /> Deutsch</button>
                                                                            </li>
                                                                            <li>
                                                                                <button class="btn btn-link btn-block language-select" onclick="translateLanguage('French');" type="button" name="fr"><img src="{{url('/assets/images/langues%20icon/francais.png') }}" alt="Français" title="Français" /> Français</button>
                                                                            </li>
                                                                            <li>
                                                                                <button class="btn btn-link btn-block language-select" onclick="translateLanguage('German');" type="button" name="es"><img src="{{url('/assets/images/langues%20icon/Esapanol.png') }}" alt="Español" title="Español" /> Español</button>
                                                                            </li>
                                                                            <li>
                                                                                <button class="btn btn-link btn-block language-select" onclick="translateLanguage('Italian');" type="button" name="it"><img src="{{url('/assets/images/langues%20icon/Italiano.png') }}" alt="Italiano" title="Italiano" /> Italiano</button>
                                                                            </li>
                                                                            <li>
                                                                                <button class="btn btn-link btn-block language-select" onclick="translateLanguage('Chinese (Simplified)');" type="button" name="it"><img src="{{url('/assets/images/langues%20icon/简体中文.png') }}" alt="简体中文" title="简体中文" /> 简体中文</button>
                                                                            </li>
                                                                            <li>
                                                                                <button class="btn btn-link btn-block language-select" onclick="translateLanguage('Chinese (Traditional)');" type="button" name="it"><img src="{{url('/assets/images/langues%20icon/繁體中文.png') }}" alt="繁體中文" title="繁體中文" /> 繁體中文</button>
                                                                            </li>

                                                                            <li>
                                                                                <button class="btn btn-link btn-block language-select" onclick="translateLanguage('Japanese');" type="button" name="it"><img src="{{url('/assets/images/langues%20icon/日本語.png') }}" alt="日本語" title="日本語" /> 日本語</button>
                                                                            </li>
                                                                            <li>
                                                                                <button class="btn btn-link btn-block language-select" onclick="translateLanguage('Korean');" type="button" name="it"><img src="{{url('/assets/images/langues%20icon/한국어.png') }}" alt="한국어" title="한국어" /> 한국어</button>
                                                                            </li>

                                                                             
                                                                        </ul>
                                                              </div>
                                                        </div>


                                                        

                                                        <!-- start search -->
                                                        <div class="btn_search">
                                                            <a class="search-btn">
                                                                <i class="icon-search"></i>
                                                            </a>
                                                            <div class="search-down">
                                                                <div id="mahardhiSearch" class="input-group mahardhi-search">
                                                                    <input type="text" name="search" id="serchprodects" value="" placeholder="Search..." class="form-control input-lg ui-autocomplete-input" />
                                                                    <span class="btn-search input-group-btn">
                                                                        <button type="button" onclick="Searchprodect()" class="btn btn-default btn-lg"><i class="search-icon icon-search"></i><span class="hidden">Search</span></button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- start account -->
                                                        <div id="header_ac" class="dropdown ">
                                                            <a href="wish-list.html?route=account/account" title="My Account" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> </a>
                                                            <ul class="dropdown-menu drop-bg dropdown-menu-right account-link-toggle">
                                                                @if(!isset($Front_user_id) && empty($Front_user_id))
                                                                <li><a href="{{url('/newregister')}}">Register</a></li>
                                                                <li><a href="{{url('/userlogin')}}">User Login</a></li>
                                                                <li><a href="https://lakouphoto.ca/Artist">Artist Login</a></li>
                                                                @else
                                                                <li><a href="{{url('/userlogout')}}">Logout</a></li>
                                                                @endif
                                                                @if(isset($wishlistcount) && !empty($wishlistcount))
                                                                @php $count = $wishlistcount; @endphp
                                                                @else
                                                                @php $count = 0; @endphp 
                                                                @endif
                                                                 <li><a href="{{url('/newartist/signup')}}">Artist Register</a></li>
                                                                 <li><a href="{{route('myaccount.index')}}">My Account</a></li>
                                                                 <li><a href="{{url('/orderhistory')}}">Order History</a></li>
                                                                <input type="hidden" name="wishlistcount" id="wishlistcount" value="{{$count}}">
                                                                <li class="wishlist-header"><a href="{{url('/wish-list')}}" id="wishlist-total" title="WishList ({{$count}})">WishList ({{$count}})</a></li>
                                                                

                                                            </ul>
                                                        </div>


                                                         <!-- Currrency -->
                                                        <div class="dropdown">
                                                          <div class="currency">
                                                            <div class="currency-box">
                                                                    <button class=" btn-link dropdown-toggle" title="Currency" id="currency-drop" data-toggle="dropdown">
                                                                        <p>₹</p>
                                                                        <!-- <p>₹</p> -->

                                                                     
                                                                       {{-- @if(substr($mylibrary->currencyconverterallprice($products['price']),0,3)=='INR')

                                                                        <!-- <p>{{'₹',substr($mylibrary->currencyconverterallprice($products['price']),0,3)}}</p> -->
                                                                        <p>{{'INR',substr($mylibrary->currencyconverterallprice($products['price']),0,3)}}</p>
                                                                        @elseif(substr($mylibrary->currencyconverterallprice($products['price']),0,3)=='USD')
                                                                        <!-- <p>{{'$',substr($mylibrary->currencyconverterallprice($products['price']),0,3)}}</p> -->
                                                                        <p>{{'USD',substr($mylibrary->currencyconverterallprice($products['price']),0,3)}}</p>
                                                                        @elseif(substr($mylibrary->currencyconverterallprice($products['price']),0,3)=='EUR')
                                                                        <!-- <p>{{'€',substr($mylibrary->currencyconverterallprice($products['price']),0,3)}}</p> -->
                                                                        <p>{{'EUR',substr($mylibrary->currencyconverterallprice($products['price']),0,3)}}</p>
                                                                        @elseif(substr($mylibrary->currencyconverterallprice($products['price']),0,3)=='GBP')
                                                                        <!-- <p>{{'£',substr($mylibrary->currencyconverterallprice($products['price']),0,3)}}</p> -->
                                                                        <p>{{'GBP',substr($mylibrary->currencyconverterallprice($products['price']),0,3)}}</p>
                                                                        @else
                                                                        <!-- <p>$</p> -->
                                                                        <p>USD</p>
                                                                        @endif
                                                                    --}}
                                                                       
                                                                    </button>
                                                                    <ul class="currency-dropdown curr"
                                                                    id="currency-open">
                                                                        <li class="">
                                                                            <button class="currency-select btn btn-link btn-block" type="button" onclick="changeCurrancy('EUR');" name="EUR">€ Euro</button>
                                                                        </li>
                                                                        <li class=""> 
                                                                            <a class="currency-select btn btn-link btn-block" type="button" onclick="changeCurrancy('GBP');" name="GBP">£ Pound Sterling</a>
                                                                        </li>
                                                                        <li class="">
                                                                            <button class="currency-select btn btn-link btn-block" type="button" onclick="changeCurrancy('USD');" name="USD">$ US Dollar</button>
                                                                        </li>
                                                                        <li class="">
                                                                            <button class="currency-select btn btn-link btn-block" type="button" onclick="changeCurrancy('CAD');" name="CAD">$ Canadian Dollars</button>
                                                                        </li>
                                                                        <li class="">
                                                                            <button class="currency-select btn btn-link btn-block" type="button" onclick="changeCurrancy('INR');" name="INR">₹ INR </button>
                                                                        </li>
                                                                       
                                                                    </ul>
                                                                  
                                                            </div>
                                                          </div>
                                                        </div> 

                                                        <!-- start cart -->
                                                        <div class="header_cart">
                                                            <div id="cart" class="btn-group btn-block">
                                                              @if(isset($Front_user_id) && !empty($Front_user_id))
                                                                <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="btn btn-inverse btn-block btn-lg dropdown-toggle" id="show-list">
                                                        
                                                                    <span id="cart-total"><span class="cart-item" id="totalitem">{{$totalcart}}</span><span class="hidden-sm hidden-xs" id="totalprice">{{$totalprice}}</span></span>
                                                                    
                                                                </button>
                                                                @else
                                                                @php $loginurl = url('/userlogin'); @endphp
                                                                <button type="button" data-toggle="dropdown" data-loading-text="Loading..." class="btn btn-inverse btn-block btn-lg dropdown-toggle" id="show-list" onclick="window.location.href = '{{$loginurl}}';">
                                                                    <span id="cart-total"><span class="cart-item" id="totalitem">0</span><span class="hidden-sm hidden-xs" id="totalprice">$0.00</span></span>
                                                                  </button>
                                                                @endif
                                                                <!-- <ul class="dropdown-menu header-cart-toggle pull-right">
                                                                    <li>
                                                                        <p class="text-center product-cart-empty">Your shopping cart is empty!</p>
                                                                    </li>$menuUsercart
                                                                </ul> -->
                                                                @if(isset($Front_user_id) && !empty($Front_user_id))
                                                                <div class="wishlist-menu dropdown-menu pull-right" id="toggle-pop">
                                                                  <div id="close-btn">
                                                                    
                                                                    <div class="fav-title ">My Carts</div>
                                                                    <div id="close">
                                                                      <i class="fas fa-times"></i>
                                                                    </div>
                                                                  </div>  
                                                                  <hr />
                                                                  <table>
                                                                      <tbody id="menucartData">
                                                                        @if(isset($menuUsercart) && !empty($menuUsercart) && count($menuUsercart) > 0)
                                                                        @foreach($menuUsercart as $Usercart)
                                                                        
                                                                        @php                   
                                                                          $prourl = url('product-detail/'.$Usercart['products']->slug);
                                                                        @endphp
                                                                          <tr id="cartid_{{$Usercart->id}}">
                                                                              <td class="col-artwork">
                                                                                  <a href="{{$prourl}}" >
                                                                                    @if($Usercart['products']->artistid == "0")
                                                                                      <img src="{{ url('/image/products/'.$Usercart['products']->featuredimage) }}" alt="{{$Usercart['products']->title}}"  onerror="this.onerror=null;this.src='assets/images/lakouphoto.svg';" />
                                                                                    @else
                                                                                        <img src="{{ url('/Artist/public/image/products/'.$Usercart['products']->featuredimage) }}" alt="{{$Usercart['products']->title}}"  onerror="this.onerror=null;this.src='assets/images/lakouphoto.svg';" />
                                                                                    @endif
                                                                                  </a>
                                                                              </td>
                                                                              <td class="col-desc">
                                                                                  <h3 class="artwork-title">
                                                                                      <a href="{{$prourl}}" >
                                                                                          {{$Usercart['products']->title}}
                                                                                      </a>
                                                                                  </h3>
                                                                                  
                                                                                  <p class="btn dark prize">
                                                                                    @if(isset($Usercart['products']->saleprice) && !empty($Usercart['products']->saleprice) && $Usercart['products']->saleprice > 0)
                                                                                    {{ $mylibrary->currencyconverterallprice($Usercart['products']->saleprice) }}
                                                                                      @else
                                                                                      {{ $mylibrary->currencyconverterallprice($Usercart['products']->price) }}
                                                                                      @endif
                                                                                  </p>
                                                                              </td>
                                                                              <td class="col-arrow">
                                                                                  <a href="javascript:void(0);" onclick="removefromcart('{{$Usercart->id}}','menu')">
                                                                                      <i class="fas fa-trash-alt"></i>
                                                                                  </a>
                                                                              </td>
                                                                          </tr>
                                                                         @endforeach
                                                                        @else
                                                                        <p> Your cart is empty!</p>
                                                                        @endif
                                                                      </tbody>
                                                                  </table>
                                                                  <div class="fav-footer">
                                                                      <a href="{{url('/shopping-cart')}}">View all of my Carts</a>
                                                                  </div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                         
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                                 


        </header>
        <script type="text/javascript">

  function show_blocks($id, type=''){

  var id = $id;

  if(type == 'artist'){
  $('#arty .block_container').css('display', 'none');
  document.getElementById("div-"+id).style.display = "block";
  }else if(type == "artwork"){
    //$('#collect .block_container').css('display', 'none'); 
    $('#art .artworkdata').css('display', 'none');
    document.getElementById("artwork-"+id).style.display = "block";
    //document.getElementById("artwork-"+id).style.display = "block"; 
  }
  //$('#collect .block_container').css('display', 'none');  
  // document.getElementById("div-"+id).nextElementSibling.style.display = 'none';
  // document.getElementById("div-"+id).previousElementSibling.style.display = 'none';
}

function hide_blocks($id){
  // alert($id);

  var id = $id;

}
</script>
<script>
  jQuery(document).ready(function(){
    jQuery( "ul.sub-menu-lists li" ).hover(
        function() {
            $(this).addClass('active');
        },
        function() {return false;});
});

</script>
<script type="text/javascript">
  (function () {
  const heart = document.getElementById("cart");
  heart.addEventListener("click", function () {
    heart.classList.toggle("active");
  });
})();
</script>
<script type="text/javascript">
  $(document).ready(function() {
     $("#show-list").click(function() {
         $("#toggle-pop").toggle();
     });

     $("#close").click(function() {
         $("#toggle-pop").hide();
     });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
  $("#language-hover").click(function(){
    $("#lang-pop").toggle();
  });
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
  $("#currency-drop").click(function(){
    $("#currency-open").toggle();
  });
});

function Searchprodect(){
  
  if($("#serchprodects").val() != ""){
    var url = site_url +'/search-list/'+$("#serchprodects").val();
    window.location.href = url; 
  }
}

</script>
<script type="text/javascript">
      $(".currency-open li").on('click', function(){
         alert();
          $(this).addClass('active');
      });
    </script>

    <!-- Menu -->
    <script type="text/javascript">
      <?php if(!empty($category->id)){ ?>
      $("'show_blocks('{{$category->id}}', 'artwork')").on('click', function() {

        $('artwork-{{$category->id}}').css('display','block');
      });
      <?php } ?>
    </script>
@endsection 

