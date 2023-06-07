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
                <ul>
                   <!--  @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach -->
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <span class="float-right">
                    <a class="btn btn-primary btn-radius" href="{{ route('banner.index') }}"><i class="fas fa-user-alt"></i> See all Banners</a>
                </span>
            </div>
{!! Form::open(array('route' => 'banner.store','method'=>'POST','enctype' => 'multipart/form-data')) !!}
            <div class="row" style="margin-left:40px ;">
            <div class="col-md-2" style="margin-top: 20px;">
                <div class="row clearfix ">
                    <div class="form-group">
                <strong>Image:</strong>
            <div class="">
             <input type="file" id="preview-img" name="image" class="form-control" value="{{ old('image') }}" placeholder="image">
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

            </div class="col-md-10">
           
                

          

             <div class="card-body">
                  
                            <div class="form-group">
                                <label class="col-md-4 control-label">Title</label>
                                <div class="col-md-4 ">
                    <input type="text" placeholder="Title" class="form-control input-md" value="{{ old('title') }}" name="title" />
                                     @if($errors->has('title'))
                    <div class="error">{{ $errors->first('title') }}</div>
                   @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Subtitle</label>
                                <div class="col-md-4 ">
                                    <input type="text" placeholder="Subtitle" class="form-control input-md" value="{{ old('subtitle') }}" name="subtitle" />
                                    @if($errors->has('subtitle'))
                    <div class="error">{{ $errors->first('subtitle') }}</div>
                   @endif
                                </div>
                            </div>

                              <div class="form-group">
                                <label class="col-md-4 control-label">Button Text</label>
                                <div class="col-md-4 ">
                                    <input type="text" placeholder="Button Text" class="form-control input-md" value="{{ old('buttontext') }}" name="buttontext" />
                                    @if($errors->has('buttontext'))
                    <div class="error">{{ $errors->first('buttontext') }}</div>
                   @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Button Link</label>
                                <div class="col-md-4 ">
                                    <input type="text" value="{{ old('link') }}" placeholder="Link" class="form-control input-md" name="link" />
                                     @if($errors->has('link'))
                    <div class="error">{{ $errors->first('link') }}</div>
                   @endif
                                </div>
                            </div>
                            
   
                     </div>

                           

            <div >
                  
            </div>
            </div>
        </div>

           

                            <div class="form-group" style="margin-left: 30%;">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4 ">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>



                      {!! Form::close() !!}
            </div>
        </div style="">

        <div><strong style="font-size: 12px!important; color: red!important; margin-top: 5px; margin-bottom: 0px; ">The image resolution should be 1169 x 550 pixels. </strong></div>

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

