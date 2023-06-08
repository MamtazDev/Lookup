@extends('layouts.app')

@section('title')
   Create Artist
@endsection

@section('main')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
 <script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
 
<div class="" style=" margin-left: 40px;" >
    <div class="justify-content-center">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
               <!--  <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul> -->
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <span class="float-right">
                    <a class="btn btn-primary btn-radius" href="{{ route('artist.index') }}"><i class="fas fa-user-alt"></i> See all Artists</a>
                </span>
            </div>
{!! Form::open(array('route' => 'artist.store','method'=>'POST','enctype' => 'multipart/form-data')) !!}
                      @csrf
            <div class="row">
                <div class="col-md-3">

                    <div class="row clearfix m-t-20" style="margin-top: 20px;">
                    <div class="form-group">
                <strong>Image:</strong>
            <div class="">
             <input type="file" id="preview-img" name="image" class="form-control" placeholder="image">
               @if($errors->has('image'))
                    <div class="error">{{ $errors->first('image') }}</div>
                   @endif
             </div>
    </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                  <?php $products['featuredimage'] = '404.png'; ?>
      <img height="200" width="400" class="img-thumbnail" src="#" id="preview" onerror="this.onerror=null;this.src='{{url('/public/image/'.$products['featuredimage'])}}'">
             </div>
            
        </div>

        <div class="field" align="left">
  <h3>Upload artist's artwork:</h3>
  <input type="file" id="files" name="media[]" multiple />
</div>

        <!-- <div class="row" style="margin-top:40px;">
            <div>
            <strong>Upload artist's artwork:</strong>
            </div>
            <div style="padding-top: 20px; text-align: left!important;">
            <div class="user-image mb-3 text-center">
                <div class="imgPreview" style="text-align: left;"> </div>
                </div> 
                </div>
                 <div class="form-group">
                    
                    <div class="custom-file">
                         
                          <input type="file" name="media[]" multiple class="custom-file-input" id="images">

                            <label class="custom-file-label" for="images">Choose image</label>
                    </div>
                 </div>
        
            
        </div> -->
          @if($errors->has('media'))
                    <div class="error">{{ $errors->first('media') }}</div>
                   @endif
                    
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                        <strong>FirstName:</strong>
                        {!! Form::text('firstname', null, array('placeholder' => 'FirstName','class' => 'form-control','value' => '{{ old("firstname") }}')) !!}
                         @if($errors->has('firstname'))
                    <div class="error">{{ $errors->first('firstname') }}</div>
                   @endif
                    </div>

                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                                <strong>LastName:</strong>
                                {!! Form::text('lastname', null, array('placeholder' => 'LastName','class' => 'form-control')) !!}
                                @if($errors->has('lastname'))
                    <div class="error">{{ $errors->first('lastname') }}</div>
                   @endif
                             </div>

                        </div>
                        

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <strong>Email:</strong>
                                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                @if($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                   @endif
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-3 p-0" >

                                 <div class="form-group">
                                    <label for="phone">Country <span class="text-danger">*</span></label>
                                     <div class="input-group input-group-lg mb-3">
                                      <div class="input-group-prepend">
                                        
                                        <select name="countryid" class="btn dropdown-toggle" id="countryid" style="width:100%!important;">
                                             @foreach ($countries->all() as $country)
                                           <option value="{{$country->id}}"> (+{{$country->phonecode}})</option>
                                        @endforeach
                                         
                                     </select>
                                      @if($errors->has('countryid'))
                    <div class="error">{{ $errors->first('countryid') }}</div>
                   @endif
                                         </div>
                                          </div>
                                      </div>
                
                                
                            </div>
                            <div class="col-md-9 p-0">

                                 <div class="form-group" style="margin-left:5px;">
                                     <label for="phone">Phone <span class="text-danger">*</span></label>

                                
                                  <!-- /btn-group -->
                                  <div style="width:100%!important">
                                  <input type="number" name="phone" class="form-control" value="{{ old('phone') }}"  style="width:80%!important; ;">
                                    @if($errors->has('phone'))
                    <div class="error">{{ $errors->first('phone') }}</div>
                   @endif
                                  </div>
                              <!--   @error('phone')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror -->
                                 
                                  
                                </div>
                                
                            </div>
                            </div>



                                </div>



                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Password:</strong>
                                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                         @if($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                   @endif
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    
                                     <div class="form-group">
                                        <strong>Confirm Password:</strong>
                                        {!! Form::password('password_confirmation', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                                    </div>
                                   

                                </div>
                            </div>

                        <div class=" row">
                            <div class="col-md-6">

                                 <div class="form-group">
                                    <strong>Is FullTime Artist ?</strong>
                                        <div class="custom-file">
                                            <input type="radio" name="isfulltimeartist" value="yes" id="choice-yes"> 
                                            <label for="choice-yes">Yes</label>
                                            <input type="radio" name="isfulltimeartist" value="no" id="choice-no">
                                            <label for="choice-no">No</label>
                                        </div>
                                         @if($errors->has('isfulltimeartist'))
                    <div class="error">{{ $errors->first('isfulltimeartist') }}</div>
                   @endif
                                 </div>
                                  <div class="form-group">
                                    <strong>Is represented by another Online Art Gallery?</strong>
                                        <div class="custom-file">
                                        <input type="radio" name="isrepresentedgallary" value="yes" id="choice-yes"> 
                                        <label for="choice-yes">Yes</label>
                                        <input type="radio" name="isrepresentedgallary" value="no" id="choice-no">
                                        <label for="choice-no">No</label>
                                        </div>
                                         @if($errors->has('isrepresentedgallary'))
                    <div class="error">{{ $errors->first('isrepresentedgallary') }}</div>
                   @endif
                                    </div>

                                    <div class="form-group">
                                    <strong>Have Online Portfolio ?</strong>
                                        <div class="custom-file">
                                        <input type="radio" name="onlineportfolio" value="yes" id="choice-yes"> 
                                        <label for="choice-yes">Yes</label>
                                        <input type="radio" name="onlineportfolio" value="no" id="choice-no">
                                        <label for="choice-no">No</label>
                                        </div>
                                        @if($errors->has('onlineportfolio'))
                    <div class="error">{{ $errors->first('onlineportfolio') }}</div>
                   @endif
                                    </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Experience:</strong>
                                        <div class="custom-file">

                             <input type="text" id="experience" value="{{ old('experience') }}" name="experience" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                               
                                        </div>
                                    </div>
                                    @if($errors->has('experience'))
                                        <div class="error">{{ $errors->first('experience') }}</div>
                                    @endif

                                    <div class="form-group">
                                     <strong> Mediums:</strong>
                                       <select class="form-control js-example-basic-single" name="mediums[]" multiple="multiple">
                                        <option value="">Select Mediums</option>
                                        <option value="Painting">Painting</option>
                                        <option value="Sculpture">Sculpture</option>
                                        <option value="Photography">Photography</option>
                                        <option value="MIxed Media">MIxed Media</option>
                                        <option value="Textile">Textile</option>
                                        <option value="Drawing">Drawing</option>
                                        <option value="Installation">Installation</option>
                                        <option value="Video">Video</option>
                                        <option value="Other">Other</option>
                                      </select>
                                      @if($errors->has('mediums'))
                    <div class="error">{{ $errors->first('mediums') }}</div>
                   @endif
                                  </div>

                                

                            </div>
                            
                            
                            

                        </div>
                        
                        <div class="row" >
                            <div class="col-md-6">
                                
                                 <div class="form-group" style="margin-top:31px;" >
                                <label class="control-label">Uploaded CV Link</label>
                                <div class=" ">
                                    <div style="width:100%!important">
                                    <input type="text" placeholder="Link" class="form-control input-md" value="{{ old('updatedcvlink') }}" name="updatedcvlink"  />
                                    @if($errors->has('updatedcvlink'))
                    <div class="error">{{ $errors->first('updatedcvlink') }}</div>
                   @endif
                                    </div>
                                </div>
                            </div>

                 
                             <div class="form-group ">
                                    <strong> Category:</strong>
                                     <select class="form-control" name="category">
                                    <option value="">Select Category</option>
                                     @foreach ($categories as $category)
                        <option value="{{ $category->id }}" >{{ $category->name }}
                        </option>
                    @endforeach
                                </select>
                                 @if($errors->has('category'))
                    <div class="error">{{ $errors->first('category') }}</div>
                   @endif
                                </div> 

                            </div>
                            
                            <div class="col-md-6">
                                
                                 <div class="form-group">
                                    <strong>How many artworks have  sold in the past 12 months?</strong>
                                        <div class="custom-file">

                             <input type="text" id="experience" name="soldartworksinlastyear" value="{{ old('soldartworksinlastyear') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                             
                                        </div>
                                    </div>
@if($errors->has('soldartworksinlastyear'))
                    <div class="error">{{ $errors->first('soldartworksinlastyear') }}</div>
                   @endif

                                    <div class="form-group">
                                    <strong>How many artworks Produce each months?</strong>
                                        <div class="custom-file">

                             <input type="text" id="experience" name="artworksproduceinmonth" value="{{ old('artworksproduceinmonth') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                              
                                        </div>
                                    </div>

                    @if($errors->has('artworksproduceinmonth'))
                        <div class="error">{{ $errors->first('artworksproduceinmonth') }}</div>
                    @endif
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                                <strong>Commission in Percentage</strong>
                                <div class="custom-file">
                                    <input type="text" id="experience" name="Commission" value="{{ old('Commission') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                                </div>
                                </div>
                                @if($errors->has('Commission'))
                                    <div class="error">{{ $errors->first('Commission') }}</div>
                                @endif
                            </div>
                            </div>
                            <div class="col-md-12">

                            <strong>Bio</strong>
                                <textarea class="" name="bio" style="background:red; width: 90%!important;" name="" id="editor" cols="30" rows="10">
                                 </textarea>
                                 <div class="error">{{ $errors->first('bio') }}
                                  <div>

                                  
                           

                                <!--  <div class="form-group d2">
                                    <strong>Bio:</strong>
                                    {!! Form::textarea('bio', null, array('placeholder' => 'Enter Bio','class' => 'form-control','value' => '{{ old("bio") }}')) !!}
                                    @if($errors->has('bio'))
                    
                       </div>

                </div>
                   @endif
                                 </div> -->






                                

                            </div>
                        </div>
                        <div class="col-md-1"></div>



                    </div>

                    
                </div> <!-- end col-md -10 end -->

            </div> <!-- row end -->

            
       <!--   <div class="form-group">
        <strong>Is Verified Artist ?</strong>
            <div class="custom-file">
               
            <input type="radio" name="isverified" value="Verified"> 
            
            <label for="choice-yes">Verified</label>
            <input type="radio" name="isverified" value="Pending">
            <label for="choice-no">Pending</label>
            <input type="radio" name="isverified" value="Declined">
            <label for="choice-no">Declined</label>
            </div>
        </div> -->
                <div class="create-sub" style="margin-left: 10%;">
                    <button type="submit" class="btn btn-primary" > Submit</button>
                </div>    
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
    $(document).ready(function() {
  if (File && FileList && FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
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

        input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
</style>
<script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>

@endsection