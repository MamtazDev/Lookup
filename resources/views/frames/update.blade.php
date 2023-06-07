@extends('layouts.app')

@section('title')
   Update Product Frame
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
                    <div class="col-md-6">

                        <div class="form-group">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                         @if($errors->has('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                   @endif
                    </div>
                   

                        
                        
                    </div>
                    <div class="col-md-3">
                        
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
</script>

@endsection