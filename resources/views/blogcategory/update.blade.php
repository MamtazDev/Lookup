@extends('layouts.app')

@section('title')
   Update Blog Category
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
                    <a class="btn btn-primary btn-radius" href="{{ route('blogcategory.index') }}"><i class="fas fa-user-alt"></i> See all Blog Category</a>
                </span>
            </div>

            <div class="card-body">
                {!! Form::model($blogcategory, ['route' => ['blogcategory.update', $blogcategory->id],'method' => 'PATCH','enctype' => 'multipart/form-data']) !!}
                 
                 <div class="row">


                    <div class="col-md-9">
                        <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <div class=" ">
                                    <input type="text" placeholder="Category Name" class="form-control input-md" name="name" value="{{ $blogcategory->name }}" />
                                     @if($errors->has('name'))
                                    <div class="error">{{ $errors->first('name') }}</div>
                                   @endif
                                </div>
                            </div>


                            

                        </div>


                    </div>
                    </div>

                     
                 </div>
                            
                           
                               
                            

                           
                           

                            <div class="form-group">
                                <label class="control-label"></label>
                                
                                    <button type="submit" class="btn btn-primary" style="margin-left: 45%; margin-top: 40px;">Update</button>
                                
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

