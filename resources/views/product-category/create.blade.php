@extends('layouts.app')

@section('title')
   Create Product Category
@endsection

@section('main')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    
<div class="container">
    <div class="justify-content-center">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                <!-- <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul> -->
            </div>
        @endif



        <div class="card">
            <div class="card-header">
                 @can('product-category-create')
                <span class="float-right">
                    <a class="btn btn-primary btn-radius" href="{{ route('product-category.index') }}">See all Categories</a>
                </span>
                @endcan
            </div>
 {!! Form::open(array('route' => 'product-category.store','method'=>'POST','files' => 'true')) !!}
                 <div class="row">

                <div class="col-md-3 " style="margin-top: 20px;">

                    <div class="row clearfix m-t-20">
                    <div class="form-group">
                <strong>Image:</strong>
            <div class="">
             <input type="file" id="preview-img paddingg" name="image" class="form-control" placeholder="image">
              @if($errors->has('image'))
                    <div class="error">{{ $errors->first('image') }}</div>
                   @endif
             </div>
             </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <?php $products['featuredimage'] = '404.png'; ?>
      <img height="120" width="150" class="img-thumbnail" src="#" id="preview" onerror="this.onerror=null;this.src='{{url('/public/image/'.$products['featuredimage'])}}'">
             </div>
            
              </div>
                    
                </div>



                <div class="col-md-9">

                    <div class="card-body">
               
                    <div class="form-group name-width">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                         @if($errors->has('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                   @endif
                    </div>
                    <div class="row" >
                        <div class="col-md-6" style="padding-left: 0!important;">
                            <div class="form-group">
                        <strong>Parent Category:</strong>
                         <select class="form-control" name="parentcatid" id="category"  style="width:100%!important;">
                        <option value="">Select Parent Category</option>

                        @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    </div>
                            
                        </div>
                        <div class="col-md-6" style="padding-left: 0!important;">
                            <div class="form-group">
                        <strong>Category Type:</strong>
                       <select class="form-control" name="categorytype" id="categorytype"  style="width:98.1%!important;">
                       </select>
                    </div>
                   
                            
                        </div>
                        

                    </div>
                     
                    <div class="" style="margin-top:140px; margin-left: 30%;"> 
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
                    
                </div>
         </div>


            
    </div>
</div>
<script type="text/javascript">
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$(document).ready(function () {
$('#category').on('change',function(e) {
var cat_id = e.target.value;
$.ajax({
url:"{{ route('cattypebyid') }}",
type:"POST",
data: {
    "_token": "{{ csrf_token() }}",
"cat_id": cat_id
},
success:function (data) {
$('#categorytype').empty();
 $("#categorytype").append('<option>Select Category Type</option>');
                            $.each(data, function(key, value) {
                                $("#categorytype").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });
}
})
});
});
</script>
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
@endsection