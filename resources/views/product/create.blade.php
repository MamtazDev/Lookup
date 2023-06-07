@inject('CategoryType','App\Models\CategoryTypeModel')
@inject('childCategory','App\Models\ProductCategoryModel')
@inject('mylibrary', 'App\Helpers\MyLibrary')
@extends('layouts.app')

@section('title')
   Create Product
@endsection

@section('main')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<div class="">
    <div class="justify-content-center">
        {{--@if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                               <!--  <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul> -->
                            </div>
                        @endif--}}
        <div class="card">
            <div class="card-header">
                 @can('products-create')
                <span class="float-right">
                    <a class="btn btn-primary btn-radius" href="{{ route('product.index') }}">See all Products</a>
                </span>
                @endcan
            </div>

             <div class="card-body">
                {!! Form::open(array('route' => 'product.store','method'=>'POST','enctype' => 'multipart/form-data')) !!}
                

            <div class="row " style="margin-left: 15px;">
                <div class="col-md-2">
                     <div class="row clearfix m-t-20">
                    <div class="form-group box-mg">
                            <strong>Featured Image:</strong>
                         <div class="">
                         <input type="file" id="preview-img" name="image" class="form-control" placeholder="image" style="width:90%!important">
                          @if($errors->has('image'))
                         
                    <div class="error" >{{ $errors->first('image') }}</div>
                   @endif
                         
                         </div>
                    </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <?php $products['featuredimage'] = '404.png'; ?>
                             <img height="120" width="150" class="img-thumbnail" src="#" id="preview" onerror="this.onerror=null;this.src='{{url('/public/image/'.$products['featuredimage'])}}'" >
                         
                        </div>
                    </div>


         
                    <div class="form-group" style="margin-top: 61px;">
                     <strong>Product Gallary:</strong>
                    <div class="custom-file">
                     <input type="file" name="media[]" multiple class="custom-file-input" id="images">
                        <label class="custom-file-label" for="images" style="width: 94%";>Choose image</label>
                    </div>

                    </div>
                     @if($errors->has('media'))
                         
                    <div class="error" >{{ $errors->first('media') }}</div>
                   @endif

                    <div class="user-image mb-3 text-center">
                         <div class="imgPreview"> </div>
                    </div>   

                    
                </div>

                <div class="col-md-3" style="">
                     <div class="form-group box-mg">

                        <strong >Title:</strong>
                        
                        {!! Form::text('title', null, array('placeholder' => 'Enter Product Title','class' => 'form-control', 'value' => "{{ old('buttontext') }}")) !!}
                         @if($errors->has('title'))
                         
                    <div class="error" >{{ $errors->first('title') }}</div>
                   @endif
                    </div>


                    <div class="form-group box-mg">
                        <strong >Short Description:</strong>
                        {!! Form::textarea('shortdescription', null, array('placeholder' => 'Enter Short Description','class' => 'form-control', 'value' => "{{ old('shortdescription') }}")) !!}
                         @if($errors->has('shortdescription'))
                    <div class="error">{{ $errors->first('shortdescription') }}</div>
                   @endif
                    </div>


                    <div class="form-group box-mg">
                        <strong>Long Description:</strong>
                        {!! Form::textarea('longdescription', null, array('placeholder' => 'Enter Long Description','class' => 'form-control', 'value' => "{{ old('longdescription') }}")) !!}
                        @if($errors->has('longdescription'))
                    <div class="error">{{ $errors->first('longdescription') }}</div>
                   @endif
                    </div>




                              <div class="form-group box-mg">
                                 <strong>Regular Price ($) :</strong>
                                 <input type="text" name="price" onkeypress="return isNumberKey(event)"  class="form-control"  value="{{ old('price') }}" data-role="" placeholder="Price" >
                                  @if($errors->has('price'))
                              <div class="error">{{ $errors->first('price') }}</div>
                            @endif
                      
                             </div>

                              

                            
                       
                            <div class="form-group box-mg">
                                <strong>Sale Price ($) :</strong>
                                 <input type="text" name="saleprice" onkeypress="return isNumberKey(event)"  class="form-control"  value="{{ old('saleprice') }}"  data-role="" placeholder="Sale Price">
                                  @if($errors->has('saleprice'))
                                  <div class="error">{{ $errors->first('saleprice') }}</div>
                                  @endif
                      
                                </div>


                                 


                                    
                            
                      

                        <div class="form-group box-mg">

                                  <strong>Orientation:</strong>
                                   <br>
                                        <div class="form-check form-check-inline">
                                            @foreach ($orientation as $orient) 
                                            <input class="form-check-input" type="radio" name="orientation" id="orientation1" value="{{ $orient->id }}" checked="">

                                                 <label class="form-check-label" for="orientation1">{{ $orient->name }}</label>
                                                 @endforeach
                                         </div>
                                         @if($errors->has('orientation'))
                                         <div class="error">{{ $errors->first('orientation') }}</div>
                                             @endif
                                         </div>          


                        


                   
                        








                </div>

                <div class="col-md-4">
                    <div class="row">

                    <div class="col-md-6">
                         <div class="form-group">
                        <strong>Availability:</strong>
                         <select class="form-control" name="availability" id="size">
                        <option value="">Select Product Availability</option>

                      
                          <option value="In stock" selected>In stock</option>
                          <option value="Out of stock">Out of stock</option>
                      
                         </select>
                             @if($errors->has('availability'))
                         <div class="error">{{ $errors->first('availability') }}</div>
                              @endif 
                          </div>

                           <div class="form-group">
                        <strong> Collection:</strong>
                         <select class="form-control" name="parentcolid" id="parentcolid">
                        <option value="">Select  Collection</option>

                        @foreach ($collections as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                     @if($errors->has('parentcolid'))
                    <div class="error">{{ $errors->first('parentcolid') }}</div>
                   @endif
                    </div>

                    <div class="form-group">
                      <label>Height(cm)</label>
                         <br>
                             <input type="text" name="height" class="form-control" onkeypress="return isNumberKey(event)" value="100" data-role="" style="width: 92%!important" value="{{ old('height') }}" >
                                @if($errors->has('height'))
                                  <div class="error">{{ $errors->first('height') }}</div>
                                   @endif 
                                     <span class="error text-danger"></span>
                    </div>


                      <div class="form-group">
                        <strong>Size:</strong>
                         <select class="form-control" name="size" id="size">
                        <option value="">Select size</option>

                        @foreach ($sizes as $size)
                          <option value="{{ $size->id }}">{{ $size->name }}</option>
                        @endforeach
                    </select>
                     @if($errors->has('size'))
                    <div class="error">{{ $errors->first('size') }}</div>
                   @endif 
                    </div>

                    <div class="form-group">
                        <strong>Colors:</strong>
                         
                         <div class="color">
                          @foreach ($colors as $color) 
                         <label class="whatever" style="background-color:<?php echo $color->colorcode ?> ">
                          <input type="checkbox" name="color[]" value="{{ $color->id }}">
                         </label>
                        @endforeach
                         </div>
                      @if($errors->has('color'))
                        <div class="error">{{ $errors->first('color') }}</div>
                       @endif
                              
                    </div>


                
                    </div>
                    <div class="col-md-6">

                         <div class="form-group">
                       <strong>Stock Quantity:</strong><br>
                       <input type="number" name="stockquantity" id="stockquantity" value="{{ old('stockquantity') }}">
                         @if($errors->has('stockquantity'))
                    <div class="error">{{ $errors->first('stockquantity') }}</div>
                   @endif 
                    </div>

                    <div class="form-group">
                        <strong> Sub Collection:</strong>
                         <select class="form-control" name="subcolid" id="subcolid">
                       
                    </select>
                     @if($errors->has('subcolid'))
                    <div class="error">{{ $errors->first('subcolid') }}</div>
                   @endif
                    </div>


                     <div class="form-group">
                                        <label>Width(cm)</label>
                                        <br>
                                        <input type="text" name="width" class="form-control" value="{{ old('width') }}" onkeypress="return isNumberKey(event)" value="100" data-role=""
                                        style="width: 92%!important">
                                         @if($errors->has('width'))
                    <div class="error">{{ $errors->first('width') }}</div>
                   @endif 
                                        <span class="error text-danger"></span>
                    </div>
                     <div class="form-group">
                        <strong>Brand:</strong>
                         <select class="form-control" name="brand" id="brand">
                        <option value="">Select brand</option>

                        @foreach ($brands as $brand)
                          <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('brand'))
                    <div class="error">{{ $errors->first('brand') }}</div>
                   @endif 
                    </div>

                        
                    </div>



                </div>
                    </div> 


                      <div class="col-md-3">
                      <div class="form-group">
                        <strong> Category:</strong>
                         <select class="form-control" name="parentcatid" id="category">
                        <option value="">Select  Category</option>

                        @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('parentcatid'))
                    <div class="error">{{ $errors->first('parentcatid') }}</div>
                   @endif
                    </div>


                       <div class="form-group">
                        <strong>Category Theme:</strong>
                       <select class="form-control" name="categorytype" id="categorytype">
                       </select>
                        @if($errors->has('categorytype'))
                    <div class="error">{{ $errors->first('categorytype') }}</div>
                   @endif
                    </div>


                     <div class="form-group">
                        <strong>Category Style:</strong>
                       <select class="form-control" name="categorystyle" id="categorystyle">
                       </select>
                       @if($errors->has('categorystyle'))
                    <div class="error">{{ $errors->first('categorystyle') }}</div>
                   @endif
                    </div>
                    <div class="form-group">
                        <strong>Category Techniques:</strong>
                       <select class="form-control" name="categorytechnique" id="categorytechnique">
                       </select>
                       @if($errors->has('categorytechnique'))
                    <div class="error">{{ $errors->first('categorytechnique') }}</div>
                   @endif
                    </div>


                     <div class="blank-box" >

                        <div class="form-group" style="margin-top:15px!important; margin-left: 25px!important; ">
                        
                          @foreach ($frames as $frames) 
                          <div class="row" >
                         <div class="col-md-4" style="margin-bottom: 20px!important;">
                              <strong>Frames:</strong><br>
                            <label>
         <input type="checkbox" name="frame[]" value="{{ $frames->id }}" > {{ $frames->name }}
         
                                                </label>
                                            </div>
                         <div class="col-md-8" >
                        <strong>Price:</strong>
        <input type="text" name="frameprice[]" onkeypress="return isNumberKey(event)"  class="form-control"  data-role="" placeholder="Price" style="width:70% !important; height: 30px; ">
         @if($errors->has('frameprice'))
                    <div class="error">{{ $errors->first('frameprice') }}</div>
                   @endif                            
                         </div>
                     </div>
                           @endforeach
                    </div>
                    
                   



                     </div>
 @if($errors->has('frame'))
                    <div class="error">{{ $errors->first('frame') }}</div>
                   @endif


                    

                </div>  <!-- row end -->

                </div> <!-- col-md-6-end -->

              
                





            </div>





           
                  
                  
                 
                     
                   
                    
                   
                    
                   
                    
                     
   
 <!-- <div class="form-group">
<label>Wall Images</label>
<input type="image"  name="images" class="form-control" multiple>
</div> -->
                   
                            </div>
                  

                    
                    
                    <button type="submit" class="btn btn-primary" style="margin-left: 44%;">Submit</button>
                {!! Form::close() !!}
            </div>
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
});
</script>



<script type="text/javascript">
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$(document).ready(function () {
$('#category').on('change',function(e) {
  // alert('vfxd'); return false;
var cat_id = e.target.value;
// alert($(this).val());   
$.ajax({
url:"{{ route('producttypebyid') }}",
type:"POST",
data: {
    "_token": "{{ csrf_token() }}",
    "cat_id": cat_id
     },
    dataType: 'json',
success:function (data) {
    // console.log(data['0']);

$('#categorytype').html(data['0']);
$('#categorystyle').html(data['1']);
$('#categorytechnique').html(data['2']);

// $('#categorytype').empty();
//  $("#categorytype").append('<option>Select Category Type</option>');
//                             $.each(data, function(key, value) {
//                                 $("#categorytype").append('<option value="' + key + '">' + value.name +
//                                     '</option>');
//                             });
// $('#categorystyle').empty();
//  $("#categorystyle").append('<option>Select Category style</option>');
//                             $.each(data, function(key, value) {
//                                 $("#categorystyle").append('<option value="' + key + '">' + value.name +
//                                     '</option>');
//                             });
// $('#categorytechnique').empty();
//  $("#categorytechnique").append('<option>Select Category technique</option>');
//                             $.each(data, function(key, value) {
//                                 $("#categorytechnique").append('<option value="' + key + '">' + value.name +
//                                     '</option>');
//                             });
}
})
});
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