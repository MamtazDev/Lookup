@extends('layouts.app')

@section('title')
   Update Product Frame
@endsection

@section('main')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<style>
    .select2-container .select2-selection--single{
        height: 40px;
        background-color: inherit
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        color:#fff
    }
</style>
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
                 @can('frames-create')
                <span class="float-right">
                    <a class="btn btn-primary btn-radius" href="{{ route('frames.index') }}">See all Frames</a>
                </span>
                @endcan
            </div>
            <div class="card-body">
                 {!! Form::model($frames, ['route' => ['frames.update', $frames->id], 'method'=>'PATCH','enctype' => 'multipart/form-data']) !!}
              

               <div class="row">
                    <div class="col-md-3">
                        
                         <div class="row clearfix m-t-20">
                            <div class="form-group">
                            <strong>Image:</strong>
                        <div class="">
                         <input type="file" id="preview-img" name="image" class="form-control" value="{{$frames->image}}" placeholder="image">
                          @if($errors->has('image'))
                                <div class="error">{{ $errors->first('image') }}</div>
                               @endif
                         </div>
                         </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                  <img height="120" width="150" class="img-thumbnail" src="{{url('/image/frames/'.$frames->image)}}" id="preview">
                         </div>
                        
                    </div>

                    </div>
                    <div class="col-md-3">

                        <div class="form-group">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                         @if($errors->has('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                   @endif
                    </div>
                   

                        
                        
                    </div>
                    <div class="col-md-6">
                        <strong>Select product:</strong>
                        <select class="productSelector" name="product_id">
                            @foreach ($products as $product)
                            <option {{ $product->id == $frames->product_id ? "selected": "" }} value="{{ $product->id }}">{{ $product->title }}</option>
                            @endforeach
                        </select>
                    </div>
                      

                  </div>





                    
                  
                    <button type="submit" class="btn btn-primary" style="margin-left: 45%;">Submit</button>
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
    $('.productSelector').select2();
</script>

@endsection