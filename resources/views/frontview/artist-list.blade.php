<?php 
use App\Models\SeoModel;
$seo = SeoModel::get()->where('id',3)->first();
?>

<meta name="title" content="{{$seo->title ?? ''}}">
<meta name="description" content="{{$seo->description ?? ''}}">
<meta name="keywords" content="{{$seo->keywords ?? ''}}"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="author" content="{{$seo->author ?? ''}}">
@if(!Request::ajax())

@extends('frontview.layouts.app')
@extends('frontview.layouts.header')
@section('content')


        <div class="artist-bg">
            <div class="container cart">
              <div class="row">
                <h2 class="page_title title">Our Artists</h2>
                <ul class="breadcrumb">
                <li><a href="home.html">home</a></li>
                <li><a href="">Our Artists</a></li>
              </ul>
              </div>
            </div>
        </div>

  <script><!--
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
    
      <input type="hidden" name="artistlatter" id="artistlatter" value="">      
    <div class="artists">
        <div class="alphabetic-pagination">
            <div class="container">
            <nav style="display: flex; align-items: center; justify-content: center;"> 
                <p style="margin: 0px 5px !important; font-size: 20px;
                font-weight: 600;">All&nbsp;Our&nbsp;Artists</p>
                <ul class="pagination" style="display:flex;"> 
                    <li><a href="javascript: void(0)" aria-label="Previous" onclick="artistlatterFilter('all')"><span aria-hidden="true">#</span></a></li>
                    @foreach( range('A', 'Z') as $elements) 
                        <li><a href="javascript: void(0)" onclick="artistlatterFilter('{{$elements}}')">{{$elements}}</a></li> 
                    @endforeach 
                </ul> 
            </nav>
        </div>
        </div>
        <div class="dropdown-menuss">
            <div class="custom-select artist-menu">
              <select id="artiestmediums">
                <option selected disabled >Painter</option>
                <option value="Painting">Painting</option>
                <option value="Sculpture">Sculpture</option>
                <option value="Photography">Photography</option>
                <option value="MIxed Media">MIxed Media</option>
                <option value="Textile">Textile</option>
                <option value="Drawing">Drawing</option>
                <option value="Installation">Installation</option>
                <option value="Video">Video</option>
                <option value="Other">Other</option>
              </select>
            </div>
             <!-- <div class="custom-select artist-menu">
              <select>
                <option selected disabled >Movement</option>
               
                <option >Link 1</option>
                <option >Link 2</option>
                <option >Link 3</option>
                
              </select>
            </div> -->
             <div class="custom-select artist-menu">
              <select id="artiestcountry">
                <option selected disabled >Nationality</option>
               @foreach($countryArr as $country)
                <option value="{{$country->id}}">{{$country->countryname}}</option>
               @endforeach 
              </select>
            </div>
            
            <div class="search">
                <input type="text" name="search" value="" id="artistsearch" placeholder="Search..." class="form-control input-lg ui-autocomplete-input" />
                <span class="btn-search input-group-btn">
                    <button type="button" onclick="artistFilter()" class="btn btn-default btn-lg"><i class="search-icon icon-search"></i><span class="hidden">Search</span></button>
                </span>
            </div>
        </div>        
    
        <div class="polaroids">
            <div class="list1" id="postdata">
@endif

              @if(isset($ArtistDataArr) && !empty($ArtistDataArr))
                @foreach($ArtistDataArr as $Artist)
                @php $artiesturl = url('/artist-details/'.$Artist->slug); @endphp
                <div class="polaroid">
                  @if($Artist->profileimage)
                  <a href="{{$artiesturl}}"><img src="{{url('/Artist/public/image/profile/'.$Artist->profileimage) }}">
                  @else
                    <a href="{{$artiesturl}}"><img src="{{url('/image/artist/default-artist.svg') }}">
                  @endif
                  <a href="{{$artiesturl}}">
                    <div class="overlay">
                        <div class="text"><i class="far fa-eye"></i></div>
                    </div>
                  </a>
                  <div class="polaroid-text">
                      <h2>{{$Artist->firstname}} {{$Artist->lastname}}</h2>
                      <div class="polaroid-head">{{$Artist->mediums}}</div>
                      @if(isset($Artist['country']->countryname) && !empty($Artist['country']->countryname))
                      <p>{{$Artist['country']->countryname}}</p>
                      @endif
                    </a>
                  </div>  
                </div>
                @endforeach
                @endif
                @if(!Request::ajax())
            </div>    
                   <div class="container">
                        <div class="pro_pagination clearfix">
                            <div class="col-sm-6 text-left" id="totalpage">Showing {{($ArtistDataArr->currentPage()-1)* $ArtistDataArr->perPage()+($ArtistDataArr->total() ? 1:0)}} to {{($ArtistDataArr->currentPage()-1)*$ArtistDataArr->perPage()+count($ArtistDataArr)}} of {{$ArtistDataArr->total()}} ({{$ArtistDataArr->currentPage()}} Pages)</div>
                                <div class="col-sm-6 text-right">
                                    <ul class="pagination" id="paginationdiv">
                                        {{ $ArtistDataArr->links('frontview.pagination.pagination') }}
                                    </ul>
                                </div>
                        </div>
                    </div>    
                </div>
            </div>    
        </div>       
    </div>
    <script>
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  b.setAttribute('onclick', 'artistFilter()');
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>


     <script type="text/javascript">
       function filter(evt){
        var elm = evt.target;
        var query = elm.value.length > 0 ? tf.stOperator + elm.value : '';

        // set the column's filter value
        tf.setFilterValue(1, query);

        // filter the table
        tf.filter();

        // clear previously marked element
        if(tf.selectedLetter) {
            tf.selectedLetter.classList.remove('btn-primary');
        }

        // mark selected letter
        elm.classList.add('btn-primary');

        // keep reference of selected element
        tf.selectedLetter = elm;
    }

    var uri = window.location.toString();

if (uri.indexOf("#") > 0) {
    var afterHash = window.location.hash.substr(1);

    if (afterHash == Number.NaN || afterHash <= 0) {
        var clean_uri = uri.substring(0, uri.indexOf("#"));
        window.history.replaceState({}, document.title, clean_uri);
    } else {
        getPosts(afterHash);
    }
}

$(window).on('hashchange', function () {
    if (window.location.hash) {
        var page = parseInt(window.location.hash.replace('#', ''));
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            getPosts(page);
        }
    }
});

$(document).on('click', '#paginationdiv a', function (e) {
    var page = $(this).attr('href').split('page=')[1];
    window.location.hash = page;
    e.preventDefault();
});

function getPosts(page) {

    var pageUrl = site_url+'/artist-list';

    /*if (pageUrl.includes("?")) {
        pageUrl = pageUrl + "&page=" + page;
    } else {
        pageUrl = pageUrl + "?page=" + page;
    }*/
    $.ajax({
        url: pageUrl,
        type: "post",
        data: {
            page: page
        },
        dataType: 'json',
    }).done(function (data) {
        // $("#overlay").css({"display": "none", "opacity": "0"});
       // $("#pgloader").css("display", "none");
        $('#postdata').html(data.html);
        $('#paginationdiv').html(data.pagination);
        $('#totalpage').html(data.totalpagecount);
        
        
    }).fail(function () {
        alert('Posts could not be loaded.');
    });
}

   /* var tf = new TableFilter(
        document.querySelector('#countries-codes'),
        {
            base_path: 'tablefilter/',
            start_with_operator: '←',
            paging: {
              length: 10
            },
            rows_counter: {
                text: 'Countries: '
            },
            col_types: [
              'string', 'string', 'string',
              'string', 'number'
            ],
            col_widths: [
                '75px','350px','350px',
                '75px','75px'
            ],

            // hide filters
            on_filters_loaded: function(tf) {
                tf.dom().rows[tf.getFiltersRowIndex()].style.display = 'none';
            },

            // sorting feature
            extensions: [{
                name: 'sort'
            }]
        }
    );
    tf.init();*/
    // keep reference of selected letter element
   // tf.selectedLetter = null;
     </script>

@extends('frontview.layouts.footer')
@endsection
@endif