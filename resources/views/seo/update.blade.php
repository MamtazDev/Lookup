@extends('layouts.app')

@section('title')
   Update SEO Settings
@endsection

@section('main')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
 
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
                    <a class="btn btn-primary btn-radius" href="{{ route('seo.index') }}"><i class="fas fa-user-alt"></i> See Seo Settings</a>
                </span>
            </div>  
            <div class="card-body">
                  {!! Form::model($customer, ['route' => ['seo.update', $customer->id],'method' => 'PATCH','enctype' => 'multipart/form-data']) !!}

                  <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <strong>Seo Title:</strong>
                                {!! Form::text('title', null, array('placeholder' => 'Enter Seo Title','class' => 'form-control')) !!}
                                @if($errors->has('title'))
                            <div class="error">{{ $errors->first('title') }}</div>
                           @endif
                            </div>  
                            </div> 
                            <div class="col-md-6"> 
                                 <div class="form-group">
                                    <strong>Seo Description:</strong>
                                    {!! Form::text('description', null, array('placeholder' => 'Enter Seo Description','class' => 'form-control')) !!}
                                     @if($errors->has('description'))
                                <div class="error">{{ $errors->first('description') }}</div>
                               @endif
                                </div> 
                            </div> 
                        </div> 
                        <div class="row"> 
                            <div class="col-md-6">  
                                <div class="form-group">
                                <strong>Keywords:</strong>
                                {!! Form::text('keywords', null, array('placeholder' => 'Separate with comma, Key1, Key2','class' => 'form-control')) !!}
                                 @if($errors->has('keywords'))
                                <div class="error">{{ $errors->first('keywords') }}</div>
                               @endif
                                </div> 
                            </div>
                            <div class="col-md-6">  
                                <div class="form-group">
                                <strong>Author Name:</strong>
                                {!! Form::text('author', null, array('placeholder' => 'Enter author name','class' => 'form-control')) !!}
                                 @if($errors->has('author'))
                                <div class="error">{{ $errors->first('author') }}</div>
                               @endif
                                </div> 
                            </div>        
                        </div>    
        <!--   <div class="form-group">
        <strong>Is Verified Artist ?</strong>
            <div class="custom-file">
               
            <input type="radio" name="isverified" value="Verified" {{ $customer->isverified == 'Verified' ? 'checked' : ''}}> 
            
            <label for="choice-yes">Verified</label>
            <input type="radio" name="isverified" value="Pending" {{ $customer->isverified == 'Pending' ? 'checked' : ''}}>
            <label for="choice-no">Pending</label>
            <input type="radio" name="isverified" value="Declined" {{ $customer->isverified == 'Declined' ? 'checked' : ''}}>
            <label for="choice-no">Declined</label>
            </div>
        </div> -->
        
                    <button type="submit" class="btn btn-primary" style="margin-left: 50%; margin-top: 40px;"><i class="fas fa-save"></i> Update</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script>

    CKEDITOR.replace('editor', {
  skin: 'moono',
  enterMode: CKEDITOR.ENTER_BR,
  shiftEnterMode:CKEDITOR.ENTER_P,
  toolbar: [{ name: 'basicstyles', groups: [ 'basicstyles' ], items: [ 'Bold', 'Italic', 'Underline', "-", 'TextColor', 'BGColor' ] },
             { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
             { name: 'scripts', items: [ 'Subscript', 'Superscript' ] },
             { name: 'justify', groups: [ 'blocks', 'align' ], items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
             { name: 'paragraph', groups: [ 'list', 'indent' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'] },
             { name: 'links', items: [ 'Link', 'Unlink' ] },
             { name: 'insert', items: [ 'Image'] },
             { name: 'spell', items: [ 'jQuerySpellChecker' ] },
             { name: 'table', items: [ 'Table' ] }
             ],
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
    
  .imgPreview img {
            padding: 8px;
            max-width: 100px;
        } 
</style>

@endsection