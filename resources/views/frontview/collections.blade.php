@if(!Request::ajax())
@inject('Collection','App\Models\CollectionModel')
@extends('frontview.layouts.app')
@extends('frontview.layouts.header')
@section('content')


       
        <div class="artist-bg">
            <div class="container cart">
              <div class="row">
                <h2 class="page_title title">{{$data['CollectionName']}}</h2>
                <ul class="breadcrumb">
        <li><a href="{{url('/homepage')}}">home</a></li>
       
        <li><a href="">{{$data['CollectionName']}}</a></li>
       
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
         

             
                <div class="panes breakscroll container">
            
            <div class="contentzz polaroid" id="postdata">
              <ul class="slot">
                 @if(isset($SubCollections) && !empty($SubCollections))
                  @foreach ($SubCollections as $collection)
                @php $collectionurl = url('/collection-details/'.$collection->slug); @endphp
                <li class="icon">
                  @if(isset($collection->image) && !empty($collection->image))
                  <a href="{{$collectionurl}}"><img src="{{url('/public/image/collection/'.$collection->image) }}" class="img-collect">
                  @else
                    <a href="{{$collectionurl}}"><img src="{{url('/public/image/collection/'.$collection->image) }}" class="img-collect">
                  @endif
                  <a href="{{$collectionurl}}">
                    <div class="overlay">
                        <div class="text"><!-- <i class="far fa-eye"></i> --></div>
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
           
   
@extends('frontview.layouts.footer')
@endsection
@endif