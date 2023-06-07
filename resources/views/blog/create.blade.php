@extends('layouts.app')

@section('title')
   Add Blog 
@endsection

@section('main')
<style type="text/css">
    .form-group.submit2 {
    display: flex;
    justify-content: center;
}
    .seo{
    
    margin-top: -2.5%;

}
    input#preview-img {
    padding: 3px 7px;
    width: 90% !important;
}
.card textarea.form-control {
    width: 90%;
}
</style>
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
                    <a class="btn btn-primary btn-radius" href="{{ route('blog.index') }}"><i class="fas fa-user-alt"></i> See All Blog</a>
                </span>
            </div>
{!! Form::open(array('route' => 'blog.store','method'=>'POST','enctype' => 'multipart/form-data')) !!}
            <div class="row" style="margin-left:40px ;">
             <div class="card-body">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                    <label class=" control-label">Name</label>
                    <div class=" ">
                    <input type="text" placeholder="Name" class="form-control input-md" value="{{ old('name') }}" name="title" />
                                     @if($errors->has('title'))
                    <div class="error">{{ $errors->first('title') }}</div>
                   @endif
                                </div>
                            </div>

                     <div class="form-group">
                    <label class=" control-label">Slug</label>
                    <div class=" ">
                    <input type="text" placeholder="Slug" class="form-control input-md" value="{{ old('slug') }}" name="slug" />
                                     @if($errors->has('slug'))
                    <div class="error">{{ $errors->first('slug') }}</div>
                   @endif
                                </div>
                            </div>


                     <div class="form-group">
                    <label class=" control-label">Category</label>
                    <div class=" ">
                    <select class="form-control" name="category">
                        <option>Select</option>

                        @foreach($categorys as $key=>$category)
                          @if($category->status==1)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                         @endif
                        @endforeach
                    </select>
                    </div></div>

                    <div class="form-group">
                    <label class=" control-label">Description</label>
                    <div class=" ">
                        <textarea name="content" placeholder="Description" class="form-control input-md" ></textarea>
                        @if($errors->has('content'))
                    <div class="error">{{ $errors->first('content') }}</div>
                   @endif</div>
                            </div>
                        <div class="form-group">
                                    <strong>Fetature Image:</strong>
                                <div class="">
                                 <input type="file" id="preview-img" name="image" class="form-control" value="{{ old('image') }}" placeholder="image">
                                  @if($errors->has('image'))
                                        <div class="error">{{ $errors->first('image') }}</div>
                                       @endif
                                 </div>

                                 
                        </div>
                      </div>
                      <div class="col-md-6 seo">
                           <label style="font-size: 18px !important;">Seo Information</label>

                                                
                     <div class="form-group">
                    <label class=" control-label">Meta Title</label>
                    <div class=" ">
                    <input type="text" placeholder="Meta Title" class="form-control input-md" value="{{ old('meta_title') }}" name="meta_title" />
                                     @if($errors->has('meta_title'))
                    <div class="error">{{ $errors->first('meta_title') }}</div>
                   @endif
                                </div>
                            </div>

                     <div class="form-group">
                                        <label class=" control-label">Meta Tag</label>
                                        <div class=" ">
                                        <input type="text" placeholder="Meta Tag" class="form-control input-md" value="{{ old('meta_keyword') }}" name="meta_keyword" />
                                                         @if($errors->has('meta_keyword'))
                                        <div class="error">{{ $errors->first('meta_keyword') }}</div>
                                       @endif
                                                    </div>
                                                </div>

                                                <div class="form-group">
                    <label class=" control-label">Meta Description</label>
                    <div class=" ">
                        <textarea name="meta_description" placeholder="Meta Description" class="form-control input-md" ></textarea>
                        @if($errors->has('meta_description'))
                    <div class="error">{{ $errors->first('meta_description') }}</div>
                   @endif</div>
                            </div>
                    
                      </div>
                  </div>
                    




                           
                            </div>
                            
   
                     </div>

                           

            <div >
                  
            </div>
            </div>
        </div>

           

                            <div class="form-group submit2">
                                <label class=" control-label"></label>
                                <div class=" ">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>



                      {!! Form::close() !!}
            </div>
        </div style="">


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

