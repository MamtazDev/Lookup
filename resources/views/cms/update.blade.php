@extends('layouts.app')

@section('title')
   Update CMS
@endsection

@section('main')
<style type="text/css">
    a.btn.btn-danger {
    border-radius: 17px !IMPORTANT;
    padding: 4px 12px;
}

.form-group.status {
    display: flex;
    }
   .form-group.status label.control-label{
        margin-left: 10px;
        font-size: 15px;
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
                    <a class="btn btn-primary btn-radius" href="{{ route('cms.index') }}"><i class="fas fa-user-alt"></i> See all datas</a>
                </span>
            </div>

            <div class="card-body">
             
             <form action="{{route('cms.update',$data->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('put')               
         
                 <div class="row">
                        <div class="col-md-12">
                            <div class="forms">
                                <div class="row">
                                   <div class="form-group">
                                        <div class="">
                                        <label class="control-label">Page Name <span class="text-danger">*</span></label>
                                        <div class=" ">
                                            <input type="text" placeholder="Page Name" class="form-control input-md" name="pagename" value="{{ $data->page_name }}" />
                                             @if($errors->has('page_name'))
                                            <div class="error">{{ $errors->first('page_name') }}</div>
                                           @endif
                                        </div>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <div class="">
                                            <label class="control-label">Title <span class="text-danger">*</span></label>
                                            <div class=" ">
                                                <input type="text" placeholder="Title" class="form-control input-md" name="title" value="{{ $data->title }}" />
                                                 @if($errors->has('title'))
                                                <div class="error">{{ $errors->first('title') }}</div>
                                               @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                <label class="control-label">Slug <span class="text-danger">*</span></label>
                                <div class="">
                                    <input type="text" placeholder="Slug" class="form-control input-md" name="slug" value="{{ $data->slug }}" />
                                     @if($errors->has('slug'))
                                    <div class="error">{{ $errors->first('slug') }}</div>
                                   @endif
                                </div>
                            </div>
                                 </div>   
                             
                        </div>

                              <div class="form-group">
                                <label>Content <span class="text-danger">*</span></label>
                                <textarea class="ckeditor form-control input-md" name="content" >
                                  @php
                                    echo htmlspecialchars($data->content, ENT_QUOTES)
                                  @endphp
                                </textarea>
                            </div>
                           @if($errors->has('conent'))
                            <div class="error">{{ $errors->first('conent') }}</div>
                           @endif

                             <div class="form-group status">
                                
                                <div class="">
                                    <!-- <input type="checkbox" class="form-control input-md" name="status"   /> -->
                                  <input type="checkbox" name="status"  {{  ($data->status == '1' ? ' checked' : '0') }}/>
                                    @if($errors->has('status'))
                                    <div class="error">{{ $errors->first('status') }}</div>
                                   @endif
                                </div>
                                <label class="control-label">Status</label>
                            </div>
                        </div>
               
                  
                    </div>
                    <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a  href="{{route('cms.index')}}" class="btn btn-danger">Cancel</a>
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
<script type="text/javascript">

    $(document).ready(function() {

       $('.ckeditor').ckeditor();

    });

</script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>




@endsection

