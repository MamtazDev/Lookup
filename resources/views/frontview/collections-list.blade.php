<?php 
use App\Models\SeoModel;
$seo = SeoModel::get()->where('id',4)->first();
?>

<meta name="title" content="{{$seo->title ?? ''}}">
<meta name="description" content="{{$seo->description ?? ''}}">
<meta name="keywords" content="{{$seo->keywords ?? ''}}"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="author" content="{{$seo->author ?? ''}}">
@inject('Collection','App\Models\CollectionModel')
@if(!Request::ajax())

@extends('frontview.layouts.app')
@extends('frontview.layouts.header')
@section('content')


       
        <div class="artist-bg">
            <div class="container cart">
              <div class="row">
                <h2 class="page_title title">All Collections</h2>
                <ul class="breadcrumb">
        <li><a href="{{url('/homepage')}}">home</a></li>
       
        <li><a href="">All Collections</a></li>
       
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
        <div role="tabpanel" class="collection-nupur">
            <div class="navscroll">
              <ul class="nav nav-tabs navbar-nav breakscroll" role="tablist">
                  @foreach ($data as $item)
                    <li role="presentation" class="{{ $item->id == 1 ? 'active' : '' }}">
                      <a href="#home{{ $item->id }}" aria-controls="home" role="tab" data-toggle="tab">{{ $item->name }}</a>
                    </li>
                  @endforeach
              </ul>
            </div>  
      <div class="tab-content">
       @foreach ($category as $item)
            <div role="tabpanel" class="tab-pane {{ $item->id == 1 ? 'active' : '' }}" id="home{{ $item->id }}" class="active">
                  

                 <div class="row" style="padding-top: 7%;">
        <div class="col-md-8 col-sm-12">
            <div class="total-collections">
                 @php 
                   $SubCollection = $Collection->getSubCollection($item->id);

                @endphp
                   @php 
                  $totalcollection = count($SubCollection)
             @endphp
              <h2> {{$totalcollection}} collections</h2>
    
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="search-collection">
                <i class="fa fa-search" style="color: white;" aria-hidden="true"></i>
                <input type="search" name="c-search" id="search-data" placeholder="Search for a collection">
            </div>
        </div>
    </div>

             
              @php 
                   $SubCollection = $Collection->getSubCollection($item->id);

                @endphp
                <div class="contentzz polaroid panes breakscroll container">
             <div class="searched-data" id="searched-data">
                
              </div>
            <div class="contentzz polaroid" id="postdata">
             
              <ul class="slot">
                 @if(isset($SubCollection) && !empty($SubCollection))
                  @foreach ($SubCollection as $collection)
                @php $collectionurl = url('/collection-details/'.$collection->slug); @endphp
                <li class="icon">
                  @if(isset($collection->image) && !empty($collection->image))
                  <a href="{{$collectionurl}}"><img src="{{url('/image/collection/'.$collection->image) }}" onerror="this.onerror=null;this.src='https://test.maquinistas.in/Lakou/public/assets/images/lakouphoto.svg';" class="img-collect">
                  @else
                    <a href="{{$collectionurl}}"><img src="{{url('/image/collection/'.$collection->image) }}" onerror="this.onerror=null;this.src='https://test.maquinistas.in/Lakou/public/assets/images/lakouphoto.svg';" class="img-collect">
                  @endif
                  <a href="{{$collectionurl}}">
                    <div class="overlay">
                        <div class="text"><i class="far fa-eye"></i></div>
                    </div>
                  </a>
                  <div class="polaroid-text">
                     @php 
                   $ProductCollection = $Collection->getProductsByCollection($collection->id);
                   $totalartworks = count($ProductCollection);
                @endphp
                      <h2> {{$collection->name}}</h2>
                      <h4> {{$totalartworks}} Artwork</h4>
                    </a>
                  </li>  
             
              @endforeach
              @endif
              </ul>
             </div>
            </div> 
              
            </div>
       @endforeach
      </div>
    </div>
  
      
         
            
          
                </div>
            </div>    
        </div>       
    </div>


<script type="text/javascript">
 

  $(document).on('keyup','#search-data',function(){
      var value = $(this).val();
       var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        url:"{{url('/CollectionController/action')}}/"+value,
        method:'GET',
        data: { 'CSRF_TOKEN':CSRF_TOKEN,  'value' : value },
        dataType:'json',
        success:function(data)
        {

           $('#searched-data').html(data.table_data);
           $("#postdata").hide();
        },error:function()
        {
          $('#searched-data li.icon').remove();
          $("#postdata").show();
        }
      })
  });
  
</script>
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
  b.setAttribute('onclick', 'collectionFilter()');
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
           
 <script type="text/javascript" src="/Lakou/public/assets/js/swap.js"></script>  
@extends('frontview.layouts.footer')
@endsection
@endif