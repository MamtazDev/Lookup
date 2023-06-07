@extends('layouts.app')

@section('title')
   Update   Product
@endsection

@section('main')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<div class="">
    <div class="justify-content-center">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                 @can('products-create')
                <span class="float-right">
                    <a class="btn btn-primary btn-radius" href="{{ route('product.index') }}">See all Products</a>
                </span>
                @endcan
            </div>
            <div class="card-body">
                {!! Form::model($categories, ['route' => ['product.update', $categories->id],'method' => 'PATCH','enctype' => 'multipart/form-data']) !!}

                <div class="row">
                    <div class="col-md-2">

                         <div class="row clearfix m-t-20">
                            <div class="form-group">
                        <strong>Featured Image:</strong>
                        <?php if($categories->uploadBy == 'Artist') {
                                      $url = env('ArtistProductUrl');
                                      $ProductImgUrl =  $url.$categories->featuredimage;
                                            }else{
                                            $ProductImgUrl = url('/image/products/'.$categories->featuredimage);
                                            }
                                                ?>
                                <div class="">
                                 <input type="file" id="preview-img" name="image" class="form-control" value="<?php echo $ProductImgUrl; ?>" placeholder="image">
                                 </div>
                        </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    @if($categories->featuredimage)
                                    <img height="120" width="150" class="img-thumbnail" src="<?php echo $ProductImgUrl; ?>" id="preview">
                                    @else
                                    <img height="120" width="150" class="img-thumbnail" src="image/artist/default-artist.svg" id="preview">
                                    @endif
                                </div>
                                
                            </div>


                               <div class="form-group">
                                 <strong>Product Gallary:</strong>
                              <div class="custom-file" style="width:130%!important;">
                                      <input type="file" name="media[]" multiple class="custom-file-input" id="images" >
                                        <label class="custom-file-label" for="images">Choose image</label>
                                    </div>
                                </div>

                                <div class="user-image mb-3 text-center">
                                    <div class="imgPreview">
                                    @if($media != "[]")
                                        @php $imagesArr = explode("|",$media[0]['mediaurl'])@endphp
                                            @foreach($imagesArr as $image)
                                                <img src="{{url('/'.$image)}}" alt="{{$image}}"  />
                                                
                                        
                                            @endforeach
                                    @endif
                                    </div>
                                </div> 
                     


                        

                    </div>
                     <div class="col-md-3">

                        <div class="form-group m3">
                            <strong class="">Title:</strong>
                            {!! Form::text('title', null, array('placeholder' => 'Enter Product Title','class' => 'form-control')) !!}
                         </div>

                         <div class="form-group m3">
                            <strong>Short Description:</strong>
                            {!! Form::textarea('shortdescription', null, array('placeholder' => 'Enter Short Description','class' => 'form-control')) !!}
                        </div>
                        <div class="form-group m3">
                            <strong>Long Description:</strong>
                            {!! Form::textarea('longdescription', null, array('placeholder' => 'Enter Long Description','class' => 'form-control')) !!}
                        </div>

                        <div class="row" >
                    
                            <div class="col-md-6" style="margin-left: -8px!important;" >

                                <div class="form-group m3" >
                                    <strong>Regular Price ($) :</strong>
                    <input type="text" name="price" onkeypress="return isNumberKey(event)"  class="form-control" value="{{ $categories->price}}" data-role="" placeholder="Price">
                                  
                                </div>
                               
                    
                                
                            </div>
                            <div class="col-md-6 " style="margin-left: -8px!important;" >

                                 <div class="form-group m3">
                                    <strong>Sale Price ($) :</strong>
                    <input type="text" name="saleprice" onkeypress="return isNumberKey(event)"  class="form-control"  data-role="" value="{{ $categories->saleprice}}" placeholder="Sale Price">
                                  
                                </div>
                                
                            </div>

                        </div>

                       <div class="form-group m3">
                              <strong>Orientation:</strong>
                              <br>
                    <div class="form-check form-check-inline">

                        @foreach ($orientation as $orient) 

                        <input class="form-check-input" type="radio" name="orientation" id="orientation1" value="{{ $orient->id }}" {{ $orient->id == $categories->orientationid ? 'checked' : '' }}>

                             <label class="form-check-label" for="orientation1">{{ $orient->name }}</label>
                             @endforeach
                     </div>
                                </div>



                       
                        
                        
                    </div>
                     <div class="col-md-4">

                        <div class="row">
                    
                            <div class="col-md-6">

                                 <div class="form-group">
                                    <strong>Availability:</strong>
                                     <select class="form-control" name="availability" id="size">

                                  <option value="">Select Product Availability</option>
                                      
                                  
                                      <option value="In stock" {{ $categories->availability === 'In stock' ? 'selected' : '' }}>In stock</option>
                                      <option value="Out of stock" {{ $categories->availability === 'Out of stock' ? 'selected' : '' }}>Out of stock</option>
                                  
                                </select>
                                </div>


                                 <div class="form-group">
                                    <strong> Collection:</strong>
                                     <select class="form-control" name="parentcolid" id="parentcolid">

                                        <option value="">Select Collection</option>
                                   
                                    @foreach ($collections as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $categories->parentcolid ? 'selected' : '' }}>{{ $category->name }}</option>
                                  
                                @endforeach
                                </select>
                                </div>


                                <div class="form-group">
                                        <label>Height(cm)</label>
                                        <br>
                                        <input type="text" name="height" class="form-control" onkeypress="return isNumberKey(event)" value="{{$categories->height}}" data-role="">
                                        <span class="error text-danger"></span>
                                    </div>

                                    <div class="form-group">
                                            <strong>Size:</strong>
                                             <select class="form-control" name="size" id="size">
                                            <option value="">Select size</option>
                                           
                                            @foreach ($sizes as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $categories->sizeid ? 'selected' : '' }}>{{ $category->name }}</option>
                                          
                                        @endforeach
                                           
                                        </select>
                                    </div>


                                     <div class="form-group">
                                     <strong>Colors:</strong>
                                     
                                     <div class="color">
                                         
                                         
                                  @php $colorarr = explode(",",$categories->colorid)@endphp
                                     

                                 @foreach ($colors as $color) 
                              <label class="whatever" style="background-color:<?php echo $color->colorcode ?> ">
                                <input type="checkbox" name="color[]" value="{{ $color->id }}" {{ $color->id == in_array($color->id,$colorarr) ? 'checked' : '' }} >
                                                            </label>
                                                             
                                                        
                              @endforeach
                              </div>
                                 
                                    
                   
                    

                    </div>
                              



                                
                            </div>


                            <div class="col-md-6">

                                 <div class="form-group">
                                   <strong>Stock Quantity:</strong>
                                   <input type="number" name="stockquantity" id="stockquantity" value="{{ $categories->stockquantity}}">
                                </div>

                                <div class="form-group">
                                    <strong> Sub Collection:</strong>
                                     <select class="form-control" name="subcolid" id="subcolid">
                                     </select>
                                </div>


                                <div class="form-group">
                                        <label>Width(cm)</label>
                                        <br>
                                        <input type="text" name="width" class="form-control" onkeypress="return isNumberKey(event)" value="{{$categories->width}}" data-role="">
                                        <span class="error text-danger"></span>
                                </div>


                              <div class="form-group">
                                <strong>Brand:</strong>
                                 <select class="form-control" name="brand" id="brand">
                                <option value="">Select brand</option>
                              
                               @foreach ($brands as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $categories->brandid ? 'selected' : '' }}>{{ $category->name }}</option>
                                  
                                @endforeach
                            </select>
                            </div>


                                
                            </div>



                        </div>


                        
                        
                    </div>
                     <div class="col-md-3">

                         <div class="form-group">
                        <strong>Parent Category:</strong>
                    
                     <select class="form-control" name="parentcatid" id="category">
                        <option value="">Select parent category</option>
                    
                        @foreach ($Procats as $cate)
                          @if(isset($categories->categoryid) && $categories->categoryid == $cate->id)
                          @php
                            $selected = 'selected';
                          @endphp
                          @else
                          @php
                            $selected = '';
                          @endphp
                          @endif

                          <option value="{{ $cate->id }}" {{$selected}}>{{ $cate->name }}</option>
                        @endforeach
                    </select>

                         
                    </div>
                    <div class="form-group">
                        <strong>Category Theme:</strong>
                       <select class="form-control" name="categorytype" id="categorytype">
                       </select>
                    </div>
                      <div class="form-group">
                        <strong>Category Style:</strong>
                       <select class="form-control" name="categorystyle" id="categorystyle">
                       </select>
                    </div>
                    <div class="form-group">
                        <strong>Category Techniques:</strong>
                       <select class="form-control" name="categorytechnique" id="categorytechnique">
                       </select>
                    </div>

                      <div class="blank-box" >

                        <div class="form-group" style="margin-top:15px!important; margin-left: 25px!important; ">
                        
                        @php
  
                       
                        $selectedarray = [];
                        $selectedpricearray = [];
                        @endphp
                        @foreach($proframes as $selectedframe)
                         @php
                         $selectedarray[] = $selectedframe->frameid;
                         $selectedpricearray[$selectedframe->frameid] = $selectedframe->frameprice;
                         @endphp
                        @endforeach
                          @foreach ($frames as $frames) 
                              
                          <div class="row" >
                         <div class="col-md-4" style="margin-bottom: 20px!important;">
                              <strong>Frames:</strong><br>
                            <label>
                                @if(in_array($frames->id,$selectedarray))
                                @php 
                                $framprice = $selectedpricearray[$frames->id];
                                $check = 'checked';
                                @endphp
                                @else
                                @php 
                                $framprice = '';
                                $check = '';
                                @endphp
                                @endif
         <input type="checkbox" name="frame[]" value="{{ $frames->id }}" {{$check}} > {{ $frames->name }}
          @if($errors->has('frame'))
                    <div class="error">{{ $errors->first('frame') }}</div>
                   @endif
                                                </label>
                                            </div>
                         <div class="col-md-8" >
                        <strong>Price:</strong>

        <input type="text" name="frameprice[]" onkeypress="return isNumberKey(event)"  class="form-control"  data-role="" placeholder="Price" style="width:70%; height: 30px; " value="{{$framprice}}">
         @if($errors->has('frameprice'))
                    <div class="error">{{ $errors->first('frameprice') }}</div>
                   @endif                            
                         </div>
                     </div>
                           @endforeach
                    </div>
                    
                   



                     </div>
                   
                    
                     
                        
                        
                    </div>
                    




                </div>



                 
                    
                   
                     
                   
                   
                    
                   
                  

                    

                    <button type="submit" class="btn btn-primary" style="margin-left:45%; margin-top: 35px;">Submit</button>
                {!! Form::close() !!}
            
        </div>
    </div>
</div>
<script type="text/javascript">
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

    $("#preview-img").change(function(){
        readURL(this);
    });
</script>
<script type="text/javascript">

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$(document).ready(function () {
    // var cat_id = e.target.value;
    var cat_id = <?php echo $categories->categoryid; ?>;
    var theme_id = <?php echo $categories->themeid; ?>;
    var style_id = <?php echo $categories->styleid; ?>;
    var Technique_id = <?php echo $categories->techniqueid; ?>;

$.ajax({
url:"{{ route('producttypebyidedit') }}",
type:"POST",
data: {
     "_token": "{{ csrf_token() }}",
"cat_id": cat_id,
"theme_id": theme_id,
"style_id": style_id,
"Technique_id": Technique_id
},
success:function (data) {
$('#categorytype').html(data['0']);
$('#categorystyle').html(data['1']);
$('#categorytechnique').html(data['2']);

}
})
}); 

$('#category').on('change',function(e) {

var cat_id = e.target.value;
$.ajax({
url:"{{ route('producttypebyid') }}",
type:"POST",
data: {
     "_token": "{{ csrf_token() }}",
"cat_id": cat_id
},
success:function (data) {
$('#categorytype').html(data['0']);
$('#categorystyle').html(data['1']);
$('#categorytechnique').html(data['2']);

}
})
});

</script>

<script type="text/javascript">

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$(document).ready(function () {
    // var cat_id = e.target.value;
    var cat_id = <?php echo $categories->parentcolid; ?>;
    var sub_colid = <?php echo $categories->collectionid; ?>;
$.ajax({
url:"{{ route('productcoledit') }}",
type:"POST",
data: {
     "_token": "{{ csrf_token() }}",
"cat_id": cat_id,
"sub_colid": sub_colid
},
success:function (data) {
$('#subcolid').html(data['0']);


}
})
}); 




$('#parentcolid').on('change',function(e) {
   
var col_id = e.target.value;   
$.ajax({
url:"{{ route('subcolbyparent') }}",
type:"POST",
data: {
    "_token": "{{ csrf_token() }}",
    "col_id": col_id
     },
    dataType: 'json',
success:function (data) {
    // console.log(data['0']);

$('#subcolid').html(data['0']);


}
})
});

</script>
 <script>
        $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });
        });    
    </script>
<style type="text/css">
    .whatever {
    background-color: red;
    display: inline-block;
    width: 30px;
    height: 30px;
    border: 1px solid black;
}
 .imgPreview img {
            padding: 8px;
            max-width: 100px;
        } 
</style>
@endsection