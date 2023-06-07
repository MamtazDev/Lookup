@extends('layouts.app')

@section('title')
   Update Artist
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
                    <a class="btn btn-primary btn-radius" href="{{ route('artist.index') }}"><i class="fas fa-user-alt"></i> See all Artists</a>
                </span>
            </div>




            <div class="card-body">
                  {!! Form::model($customer, ['route' => ['artist.update', $customer->id],'method' => 'PATCH','enctype' => 'multipart/form-data']) !!}

                  <div class="row">
                    <div class="col-md-3">

                         <div class="row clearfix m-t-20">
                                <div class="form-group">
                            <strong>Image:</strong>
                                    <div class="">
                                     <input type="file" id="preview-img" name="image" class="form-control" value="{{ $customer->profileimage }}" placeholder="image">
                                      @if($errors->has('image'))
                                            <div class="error">{{ $errors->first('image') }}</div>
                                           @endif
                                     </div>
                            </div>
                          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <img height="120" width="150" class="img-thumbnail" src="{{url('/Artist/public/image/profile/'.$customer->profileimage)}}" id="preview" onerror="this.onerror=null;this.src='https://lakouphoto.ca/public/assets/images/lakouphoto.svg';">
                         </div>
                        
                         </div>


                          <div class="user-image mb-3 text-center" style="margin-top: 30px!important;">
                             <div class="imgPreview"> 
                                 @if(isset($customer->media) && !empty($customer->media))
                                  @php $imagesArr = explode("|",$customer->media)@endphp
                                  @foreach($imagesArr as $image)
                                      <img src="{{url('/'.$image)}}" onerror="this.onerror=null;this.src='https://lakouphoto.ca/public/assets/images/lakouphoto.svg';" />
                                  @endforeach
                                  @endif
                            </div>
                            </div> 


                         <div class="form-group">
                            <strong>Upload artist's artwork:</strong>
                            <div class="custom-file">
                                  <input type="file" name="media[]" multiple class="custom-file-input" id="images">
                                    <label class="custom-file-label" for="images">Choose image</label>
                            </div>
                         </div>
        



                        
                    </div>
                    <div class="col-md-9">

                        <div class="row">
                            <div class="col-md-6">

                                        <div class="form-group">
                                <strong>FirstName:</strong>
                                {!! Form::text('firstname', null, array('placeholder' => 'FirstName','class' => 'form-control')) !!}
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
                                <div class="row p-0 m-0" >
                                    
                                

                                <div class="col-md-3 p-0 m-0">

                                    <div class="form-group">
                                    <label for="phone">Country <span class="text-danger">*</span></label>
                                     <div class="input-group input-group-lg mb-3">
                                      <div class="input-group-prepend">
                                        
                                        <select name="countryid" class="btn dropdown-toggle" id="countryid" style="width: 100%; ">
                                             @foreach ($countries->all() as $country)
                                           <option value="{{$country->id}}" {{ $customer->countryid == $country->id ? 'selected' : '' }}>(+{{$country->phonecode}})</option>
                                        @endforeach
                                         
                                     </select>
                                       @if($errors->has('countryid'))
                                        <div class="error">{{ $errors->first('countryid') }}</div>
                                       @endif
                                         </div>
                                          </div>
                                    
                                        </div>



                                    
                                </div>

                                 <div class="col-md-9">


                                   <div class="form-group">
                                     <label for="phone">Phone <span class="text-danger">*</span></label>

                                
                                  <!-- /btn-group -->
                                  <input type="number" name="phone" class="form-control" value="{{ $customer->phone}}" style="width:70%">
                                    @if($errors->has('phone'))
                                    <div class="error">{{ $errors->first('phone') }}</div>
                                   @endif
                                
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



                        <div class="row">
                            <div class="col-md-6">


                                <div class="form-group">
                                <strong>Is FullTime Artist ?</strong>
                                    <div class="custom-file">
                                       
                                    <input type="radio" name="isfulltimeartist" value="yes" {{ $customer->isfulltimeartist == 'yes' ? 'checked' : ''}}> 
                                    
                                    <label for="choice-yes">Yes</label>
                                    <input type="radio" name="isfulltimeartist" value="no" {{ $customer->isfulltimeartist == 'no' ? 'checked' : ''}}>
                                    <label for="choice-no">No</label>
                                    </div>
                                     @if($errors->has('isfulltimeartist'))
                                            <div class="error">{{ $errors->first('isfulltimeartist') }}</div>
                                           @endif
                                </div>



                                 <div class="form-group">
                                    <strong>Is represented by another Online Art Gallery?</strong>
                                        <div class="custom-file">
                                           
                                        <input type="radio" name="isrepresentedgallary" value="yes" {{ $customer->isrepresentedgallary == 'yes' ? 'checked' : ''}}> 
                                        
                                        <label for="choice-yes">Yes</label>
                                        <input type="radio" name="isrepresentedgallary" value="no" {{ $customer->isrepresentedgallary == 'no' ? 'checked' : ''}}>
                                        <label for="choice-no">No</label>
                                        </div>
                                         @if($errors->has('isrepresentedgallary'))
                                                <div class="error">{{ $errors->first('isrepresentedgallary') }}</div>
                                               @endif
                                    </div>

                                     <div class="form-group">
                                    <strong>Have Online Portfolio ?</strong>
                                        <div class="custom-file">
                                           
                                        <input type="radio" name="onlineportfolio" value="yes" {{ $customer->onlineportfolio == 'yes' ? 'checked' : ''}}> 
                                        
                                        <label for="choice-yes">Yes</label>
                                        <input type="radio" name="onlineportfolio" value="no" {{ $customer->onlineportfolio == 'no' ? 'checked' : ''}}>
                                        <label for="choice-no">No</label>
                                        </div>
                                         @if($errors->has('onlineportfolio'))
                                                <div class="error">{{ $errors->first('onlineportfolio') }}</div>
                                               @endif
                                    </div>
                                        <div class="form-group">
                                                            <label class="control-label">Uploaded CV Link</label>
                                                            <div class="">
                                                                <input type="text" placeholder="Link" class="form-control input-md" value="{{$customer->updatedcvlink}}" name="updatedcvlink" />
                                                                @if($errors->has('updatedcvlink'))
                                                <div class="error">{{ $errors->first('updatedcvlink') }}</div>
                                               @endif
                                                            </div>
                                                        </div>


                                     <div class="form-group">
                                                    <strong> Category:</strong>
                                                     <select class="form-control" name="category" >
                                                    <option value="">Select Category</option>
                                                     @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id === $customer->categoryid ? 'selected' : '' }}>{{ $category->name }}
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
                                    <strong>Experience:</strong>
                                        <div class="custom-file">

                             <input type="text" id="experience" name="experience" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="{{ $customer->experience}}" >
                             
                                        </div>
                                    </div>
                                    @if($errors->has('experience'))
                                                <div class="error">{{ $errors->first('experience') }}</div>
                                               @endif

                                    <div class="form-group">
                                     <strong> Mediums:</strong>
                                      <select class="form-control js-example-basic-single" name="mediums[]" multiple="multiple" style="height: 111px!important;">
                                     @if(isset($customer->mediums) && !empty($customer->mediums))
                                                  @php $imagesArr = explode(",",$customer->mediums)@endphp
                                                  
                                             
                                                 
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
                                                    
                                               
                                               
                                                  @endif
                                         </select>
                                         @if($errors->has('mediums'))
                                                <div class="error">{{ $errors->first('mediums') }}</div>
                                               @endif
                                  </div>


                                  <div class="form-group">
                                        <strong>How many artworks have  sold in the past 12 months?</strong>
                                            <div class="custom-file">

                                 <input type="text" id="experience" value="{{$customer->soldartworksinlastyear}}" name="soldartworksinlastyear" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                                  @if($errors->has('soldartworksinlastyear'))
                                                    <div class="error">{{ $errors->first('soldartworksinlastyear') }}</div>
                                                   @endif
                                            </div>
                                        </div>


                                        <div class="form-group" style="margin-top: 24px!important;">
                                        <strong>How many artworks Produce each months?</strong>
                                            <div class="custom-file">

                                 <input type="text" id="experience" value="{{$customer->artworksproduceinmonth}}" name="artworksproduceinmonth" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" style="margin-top: 10px!important;" >
                                 @if($errors->has('artworksproduceinmonth'))
                                                    <div class="error">{{ $errors->first('artworksproduceinmonth') }}</div>
                                                   @endif
                                            </div>
                                        </div>




                            </div>                         

                        </div>

                        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" style="width:104%">
                                        <strong>Commission in Percentage:</strong>
                                        <input type="text" id="experience" name="Commission" value="{{$customer->commission}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                                        @if($errors->has('Commission'))
                                            <div class="error">{{ $errors->first('Commission') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="form-group" style="width:104%">
                                        <strong>Bio:</strong>
                                        {!! Form::textarea('bio', null, array('placeholder' => 'Enter Bio','class' => 'form-control')) !!}
                                        @if($errors->has('bio'))
                                    <div class="error">{{ $errors->first('bio') }}</div>
                                   @endif
                                 </div>

                                </div>
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