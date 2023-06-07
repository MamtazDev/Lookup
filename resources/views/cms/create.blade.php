@extends('layouts.app')

@section('title')
   Add CMS
@endsection

@section('main')
<style type="text/css">
    a.btn.btn-danger {
    padding: 4px 12px;
    border-radius: 25px !important;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<div class="container">
    <div class="justify-content-center">
       
        <div class="card">
            <div class="card-header">
                <span class="float-right">
                    <a class="btn btn-primary btn-radius" href="{{ route('cms.index') }}"><i class="fas fa-user-alt"></i> See all CMS</a>
                </span>
            </div>
<!-- {!! Form::open(array('route' => 'cms.store','method'=>'POST','enctype' => 'multipart/form-data')) !!} -->
<form action="{{route('cms.store')}}" method="post" enctype="multipart/form-data">
@csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                                    <div class="form-group">
                                            <label class=" control-label">Page Name <span class="text-danger">*</span></label>
                                            <div class=" ">
                                                <input type="text" placeholder="Page Name" class="form-control input-md" value="{{ old('pagename') }}" name="pagename" />
                                                 @if($errors->has('pagename'))
                                <div class="error">{{ $errors->first('pagename') }}</div>
                               @endif
                                            </div>
                                        </div>

                                <div class="form-group">
                                            <label class=" control-label">Title <span class="text-danger">*</span></label>
                                            <div class=" ">
                                <input type="text" placeholder="Title" class="form-control input-md" value="{{ old('title') }}" name="title" />
                                                 @if($errors->has('title'))
                                <div class="error">{{ $errors->first('title') }}</div>
                               @endif
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label class=" control-label">Slug <span class="text-danger">*</span></label>
                                            <div class=" ">
                                                <input type="text" placeholder="Slug" class="form-control  input-md" value="{{ old('slug') }}" name="slug" />
                                                @if($errors->has('slug'))
                                <div class="error">{{ $errors->first('slug') }}</div>
                               @endif
                                            </div>
                                        </div>

                        </div>                

                            
                            <div class="form-group">
                                <label class="col-ms-6 control-label">Content  <span class="text-danger">*</span></label>
                                <textarea class="ckeditor form-control input-md" name="content" ></textarea>
                                 @if($errors->has('content'))
                                    <div class="error">{{ $errors->first('content') }}</div>
                                 @endif
                            </div>
                          
                           <div class="form-group">
                            
                                
                            
                                <input type="checkbox" name="status" value="checked">
                                 @if($errors->has('status'))
                                    <div class="error">{{ $errors->first('status') }}</div>
                                 @endif
                            
                           <label class=" control-label">Status</label>
                           </div> 


                     
                            <div class="form-group mt-5">
                                <div class="col-md-4 ">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a  href="{{route('cms.index')}}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                    </div>
                </div>
                     </div>
                      </form>
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
<!-- <script type="text/javascript">

    $(document).ready(function() {

       $('.ckeditor').ckeditor();

    });

</script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
 -->
<!-- <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script> -->
<script src="//cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('editor1', {
        filebrowserUploadUrl: "{{route('cms.store', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });

</script>

 
@endsection

