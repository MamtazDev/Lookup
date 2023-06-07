@extends('layouts.app')

@section('title')
   Add Blog Category
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
                    <a class="btn btn-primary btn-radius" href="{{ route('blogcategory.index') }}"><i class="fas fa-user-alt"></i> See All Blog Category</a>
                </span>
            </div>
{!! Form::open(array('route' => 'blogcategory.store','method'=>'POST','enctype' => 'multipart/form-data')) !!}
            <div class="row" style="margin-left:40px ;">
             <div class="card-body">
                  
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category Name</label>
                                <div class="col-md-4 ">
                    <input type="text" placeholder="Category Name" class="form-control input-md" value="{{ old('name') }}" name="name" />
                                     @if($errors->has('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                   @endif
                                </div>
                            </div>
<!-- 
                            <div class="form-group">
                                <label class="col-md-4 control-label">Status</label>
                                <div class="col-md-4 ">
                                    <input data-id="" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" >
                                </div>
                            </div> -->


                            
   
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

