@extends('layouts.app')

@section('title')
    Product 
@endsection

@section('main')
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                @can('products-create')
                    <span class="float-right">
                        <a class="btn btn-primary btn-radius" href="{{ route('product.create') }}">New Product</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover" id="datatable">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Featured Image</th>
                            <th>Is Featured</th>
                            <th>Is BestSeller</th>
                            <th>Status</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <?php if($category->uploadBy == 'Artist') {
                                            $url = env('ArtistProductUrl');
                                            $ProductImgUrl =  $url.$category->featuredimage;
                                                    }else{
                                                    $ProductImgUrl = url('/image/products/'.$category->featuredimage);
                                                    }
                                        ?>
                                    @if ($category->featuredimage)
                                    <img height="120" width="150" class="img-thumbnail" src="<?php echo $ProductImgUrl; ?>" id="preview">
                                    @else
                                    <img height="120" width="150" class="img-thumbnail" src="https://lakouphoto.ca/public/image/artist/default-artist.svg" id="preview">
                                    @endif
                                    </div>
                                </td>
                                <td style="vertical-align: inherit !important;"> 
                                    <?php
                                                            
                                $activeClass = "";
                                    $pid = $category->id;
                                                                                            
                                    if ($category->isFeatured =='Y'){
                                        $activeClass = 'active';
                                        $RemoveClass = 'remove_heart';
                                        $title = "Remove From Featured";
                                                } else {
                                                $activeClass = '';
                                                $RemoveClass = 'addfavorites';
                                                $title = 'Add To Featured';
                                                                }
                                                
                                                                        ?>
                                                            <!--  {{$category->isFeatured}} -->
                                        <button type="button" class="wishlist pid_{{ $pid }} {{ $activeClass }} {{ $RemoveClass }}" data-pid="{{$pid}}" data-toggle="tooltip" title="{{$title}}"><i class="fa fa-star" id="heart"></i></button>
                                </td>
                            <td  style="vertical-align: inherit !important;"> 

            <?php
                                                            
         $activeClass = "";
            $pid = $category->id;
                                                                    
             if ($category->isBestseller =='Y'){
                  $activeClass = 'active';
                   $RemoveClass = 'remove_best';
                 $title = "Remove From Best";
                           } else {
                           $activeClass = '';
                           $RemoveClass = 'addBestSeller';
                         $title = 'Add To Best';
                                         }
                         
                                                   ?>
                                                
                                       <!--  {{$category->isFeatured}} -->
                  <button type="button" class="wishlist bestpid_{{ $pid }} {{ $activeClass }} {{ $RemoveClass }}" data-pid="{{$pid}}" data-toggle="tooltip" title="{{$title}}"><i class="fa fa-star" id="heart"></i></button>
             </td>
               <td>
                     <div class="form-group">
                        <input data-id="{{$category->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $category->isactive ? 'checked' : '' }}>
                   </div>
                   @error('status')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </td>
                                <td>
                                    
                                    @can('products-edit')
                                        <a class="btn btn-primary" href="{{ route('product.edit',$category->id) }}"><i class="fa fa-edit"></i></a>
                                    @endcan
                                    @can('products-delete')
                                    <form method="POST" action="{{ route('product.destroy', $category->id) }}" style="display: inline-block">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                                
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->render() }}
            </div>
        </div>
    </div>
</div>
<script>
    $(".toggle-class").change(function(){
   var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ route('productchangestatus') }}",
            data: { '_token': _token,'status': status, 'user_id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
});
   
</script>
<style type="text/css">
    #heart {
  color: grey;  
  font-size: 50px;
}

/*#heart.red {
  color: red;
}*/
</style>
<script type="text/javascript">
    (function() {
  const heart = document.getElementById('heart');
  heart.addEventListener('click', function() {
    heart.classList.toggle('red');
  });
})();
</script>
<script type="text/javascript">
    $(document).on("click", '.addfavorites', function (event) {
       

    var pid = $(this).data("pid");
    if (pid != '') {
        $.ajax({
            url:   "{{ route('Addfeatured') }}",
            type: "POST",
            data: {"data": pid, "_token": $('meta[name="csrf-token"]').attr('content')},
            async: true,
            success: function (res) {
               
                $('#favalert_message').modal('toggle');
                if (res == 1) {
                    $("#heart_" + pid).addClass("active");
                    $(".pid_" + pid).addClass("remove_heart"); 
                    $(".pid_" + pid).removeClass("addfavorites");
                    $(".pid_" + pid).attr("data-original-title", "Remove From Featured");
                    if($(".pid_" + pid).hasClass("pro_wish")){
                    $("#productdwish").text("Remove From Featured");
                    $(".pid_" + pid).prop("title", "Remove From Featured");
                }
                    var wishlist = $('#wishlistcount').val();
                    var count = parseInt(wishlist) + 1;
                    $("#wishlistcount").val(count);
                    $("#wishlist-total").text('WishList ('+count+')');
                    $("#wishlist-total").prop("title", "WishList ("+count+")");
                    
                } else {
                    $("#heart_" + pid).removeClass("active");
                    $(".pid_" + pid).prop("title", "Add To Featured");
                }
            },
        });
    } else {
        window.location.href = site_url +"/userlogin";
    }
});
</script>
<script type="text/javascript">
    $(document).on("click", '.remove_heart', function (event) {

    var pid = $(this).data("pid");
    if (pid != '') {
        $.ajax({
            url:   "{{ route('Removefeatured') }}",
            type: "POST",
            data: {"data": pid, "_token": $('meta[name="csrf-token"]').attr('content')},
            async: true,
            success: function (res) {
                $('#favalert_message').modal('toggle');
                var url = $(location).attr('href');
            var parts = url.split("/").reverse()[0];
            if (res == 1) {
                if (parts == 'wish-list') {
                    location.reload();
                }
                $("#heart_" + pid).removeClass("active");
                $(".pid_" + pid).removeClass("remove_heart");
                $(".pid_" + pid).addClass("addfavorites");
                $(".pid_" + pid).attr("data-original-title", "Add To WishList");
                if($(".pid_" + pid).hasClass("pro_wish")){
                    $("#productdwish").text("Add To WishList");
                    $(".pid_" + pid).prop("title", "Add To WishList");
                }
                
                var wishlist = $('#wishlistcount').val();
                var count = parseInt(wishlist) - 1;
                $("#wishlistcount").val(count);
                $("#wishlist-total").text('WishList ('+count+')');
                $("#wishlist-total").prop("title", "WishList ("+count+")");
               // $(".pid_" + pid).prop("title", "Add To Favorites");
            } else {
                $(".pid_" + pid).removeClass("active");
                if (parts == 'wish-list') {
                    location.reload();
                }
            }
            },
        });
    } else {
        $('#loginmodal').modal('show');
    }
});

</script>
<style type="text/css">
    button.wishlist.remove_heart #heart {
    color: yellow;
}
button.wishlist.remove_best #heart {
    color: red;
}
</style>


<script type="text/javascript">
    $(document).on("click", '.addBestSeller', function (event) {
       

    var pid = $(this).data("pid");
    if (pid != '') {
        $.ajax({
            url:   "{{ route('addBestSeller') }}",
            type: "POST",
            data: {"data": pid, "_token": $('meta[name="csrf-token"]').attr('content')},
            async: true,
            success: function (res) {
               
                $('#favalert_message').modal('toggle');
                if (res == 1) {
                    $("#heart_" + pid).addClass("active");
                    $(".bestpid_" + pid).addClass("remove_best"); 
                    $(".bestpid_" + pid).removeClass("addBestSeller");
                    $(".bestpid_" + pid).attr("data-original-title", "Remove From Featured");
                    if($(".bestpid_" + pid).hasClass("pro_wish")){
                    $("#productdwish").text("Remove From Featured");
                    $(".bestpid_" + pid).prop("title", "Remove From Featured");
                }
                    var wishlist = $('#wishlistcount').val();
                    var count = parseInt(wishlist) + 1;
                    $("#wishlistcount").val(count);
                    $("#wishlist-total").text('WishList ('+count+')');
                    $("#wishlist-total").prop("title", "WishList ("+count+")");
                    
                } else {
                    $("#heart_" + pid).removeClass("active");
                    $(".bestpid_" + pid).prop("title", "Add To Featured");
                }
            },
        });
    } else {
        window.location.href = site_url +"/userlogin";
    }
});
</script>

<script type="text/javascript">
    $(document).on("click", '.remove_best', function (event) {

    var pid = $(this).data("pid");
    if (pid != '') {
        $.ajax({
            url:   "{{ route('removeBestSeller') }}",
            type: "POST",
            data: {"data": pid, "_token": $('meta[name="csrf-token"]').attr('content')},
            async: true,
            success: function (res) {
                $('#favalert_message').modal('toggle');
                var url = $(location).attr('href');
            var parts = url.split("/").reverse()[0];
            if (res == 1) {
                if (parts == 'wish-list') {
                    location.reload();
                }
                $("#heart_" + pid).removeClass("active");
                $(".bestpid_" + pid).removeClass("remove_best");
                $(".bestpid_" + pid).addClass("addBestSeller");
                $(".bestpid_" + pid).attr("data-original-title", "Add To WishList");
                if($(".bestpid_" + pid).hasClass("pro_wish")){
                    $("#productdwish").text("Add To WishList");
                    $(".bestpid_" + pid).prop("title", "Add To WishList");
                }
                
                var wishlist = $('#wishlistcount').val();
                var count = parseInt(wishlist) - 1;
                $("#wishlistcount").val(count);
                $("#wishlist-total").text('WishList ('+count+')');
                $("#wishlist-total").prop("title", "WishList ("+count+")");
               // $(".pid_" + pid).prop("title", "Add To Favorites");
            } else {
                $(".bestpid_" + pid).removeClass("active");
                if (parts == 'wish-list') {
                    location.reload();
                }
            }
            },
        });
    } else {
        $('#loginmodal').modal('show');
    }
});

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
<script>
        $(document).ready( function () {
            $.noConflict();
            $('#datatable').dataTable();
        });
    </script>
@endsection