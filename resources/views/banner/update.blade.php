@extends('layouts.app')

@section('title')
   Add Banner
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
                <span class="float-right">
                    <a class="btn btn-primary btn-radius" href="{{ route('banner.index') }}"><i class="fas fa-user-alt"></i> See all Banners</a>
                </span>
            </div>

            <div class="card-body">
                {!! Form::model($banner, ['route' => ['banner.update', $banner->id],'method' => 'PATCH','enctype' => 'multipart/form-data']) !!}
                 
                 <div class="row">

                    <div class="col-md-3" style="margin-top: 6px;">

                         <div class="row clearfix m-t-20">
                                <div class="form-group">
                            <strong>Image:</strong>
                        <div class="">
                         <input type="file" id="preview-img" name="image" class="form-control" value="{{ $banner->image }}" placeholder="image">
                          @if($errors->has('image'))
                                <div class="error">{{ $errors->first('image') }}</div>
                               @endif
                         </div>
                          </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                              <img height="120" width="150" class="img-thumbnail" src="{{url('/image/banners/'.$banner->image)}}" id="preview">
                         </div>
                        
                    </div>
                        

                    </div>

                    <div class="col-md-9">
                        <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="control-label">Title</label>
                                <div class=" ">
                                    <input type="text" placeholder="Title" class="form-control input-md" name="title" value="{{ $banner->title }}" />
                                     @if($errors->has('title'))
                                    <div class="error">{{ $errors->first('title') }}</div>
                                   @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Button Text</label>
                                <div class="">
                                    <input type="text" placeholder="Button Text" class="form-control input-md" name="buttontext"  value="{{ $banner->buttontext }}" />
                                      @if($errors->has('buttontext'))
                                    <div class="error">{{ $errors->first('buttontext') }}</div>
                                   @endif
                                 </div>
                            </div>

                            

                        </div>

                         <div class="col-md-6">


                             <div class="form-group">
                                <label class="control-label">Subtitle</label>
                                <div class="">
                                    <input type="text" placeholder="Subtitle" class="form-control input-md" name="subtitle" value="{{ $banner->subtitle }}" />
                                     @if($errors->has('subtitle'))
                                    <div class="error">{{ $errors->first('subtitle') }}</div>
                                   @endif
                                </div>
                            </div>

                             <div class="form-group">
                                <label class="control-label">Link</label>
                                <div class="">
                                    <input type="text" placeholder="Link" class="form-control input-md" name="link" value="{{ $banner->link }}" />
                                    @if($errors->has('link'))
                                    <div class="error">{{ $errors->first('link') }}</div>
                                   @endif
                                </div>
                            </div>
  

                            
                            
                        </div>
                        

                    </div>
                    </div>

                     
                 </div>
                            
                           
                               
                            

                           
                           

                            <div class="form-group">
                                <label class="control-label"></label>
                                
                                    <button type="submit" class="btn btn-primary" style="margin-left: 45%; margin-top: 40px;">Submit</button>
                                
                            </div>
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

