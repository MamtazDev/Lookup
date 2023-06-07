@extends('layouts.app')

@section('title')
   Create Orientation
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
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                 @can('sizes-list')
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('orientation.index') }}">See all Orientations</a>
                </span>
                @endcan
            </div>
            <div class="row">
                <div class="col-md-3">
                  

              </div>
              <div class="col-md-9">

                 <div class="card-body">
                <form action="{{ route('orientation.store') }}" method="POST" enctype="multipart/form-data">
                 @csrf


                    <div class="form-group" style="width:53%!important">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                    <div class="row clearfix m-t-20">
                    <div class="form-group">
                <strong>Image:</strong>
            <div class="">
             <input type="file" id="preview-img" name="image" class="form-control" placeholder="image">
             </div>
    </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <?php $products['featuredimage'] = '404.png'; ?>
      <img height="120" width="150" class="img-thumbnail" src="#" id="preview" onerror="this.onerror=null;this.src='{{url('/public/image/'.$products['featuredimage'])}}'">
             </div>
            
        </div>
                    
                    <button type="submit" class="btn btn-primary" style="margin-top: 40px;">Submit</button>
                </form>
            </div>
                  
              </div>
              <div class="col-md-3">
                  
              </div>
                
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

@endsection