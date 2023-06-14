@extends('layouts.app')

@section('title')
   Update   Product
@endsection

@section('main')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>
    .select2-container .select2-selection--single{
        height: 40px;
        background-color: inherit
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        color:#fff
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<div class="">
    <div class="justify-content-center">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                 @can('products-create')
                <span class="float-right">
                    <a class="btn btn-primary btn-radius" href="{{ route('productSize.index') }}">See all Products</a>
                </span>
                @endcan
            </div>
            <div class="card-body">
                {!! Form::model($productSize, ['route' => ['productSize.update', $productSize->id],'method' => 'PATCH','enctype' => 'multipart/form-data']) !!}

                <div class="row">
                    <div class="col-md-2">
                    <div class="form-group">
                        <strong>Product Gallary:</strong>
                    <div class="custom-file" style="width:130%!important;">
                            <input type="file" name="media[]" multiple class="custom-file-input" id="images" >
                            <label class="custom-file-label" for="images">Choose image</label>
                        </div>
                    </div>
                    <div class="user-image mb-3 text-center">
                        <div class="imgPreview">
                        @if($medias != "[]")
                        @php $imagesArr = explode("|",$medias)@endphp
                                @foreach($imagesArr as $image)
                                    <img src="{{asset($image)}}" alt="{{$image}}"  />
                                @endforeach
                        @endif
                        </div>
                    </div> 
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group box-mg">
                                <strong>Select product:</strong>
                                <select class="productSelector" name="product_id">
                                    @foreach ($products as $product)
                                    <option {{$productSize->product_id == $product->id ? "selected" : "" }} value="{{ $product->id }}">{{ $product->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group box-mg">
                            <strong >Height(cm):</strong>
                            {!! Form::number('height', null, array('placeholder' => 'Enter Short height','class' => 'form-control', 'value' => "{{ old('height') }}")) !!}
                             @if($errors->has('height'))
                                <div class="error">{{ $errors->first('height') }}</div>
                            @endif
                        </div>
                        <div class="form-group box-mg">
                            <strong >width(cm):</strong>
                            {!! Form::number('width', null, array('placeholder' => 'Enter Short width','class' => 'form-control', 'value' => "{{ old('width') }}")) !!}
                             @if($errors->has('width'))
                                <div class="error">{{ $errors->first('width') }}</div>
                            @endif
                        </div>
                    </div>
                    </div>

                </div>
    

                    <button type="submit" class="btn btn-primary" style="margin-left:45%; margin-top: 35px;">Submit</button>
                {!! Form::close() !!}
            
        </div>
    </div>
</div>

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
        $('.productSelector').select2();
            </script>
<style type="text/css">
    .whatever {
    background-color: red;
    display: inline-block;
    width: 30px;
    height: 30px;
    border: 1px solid black;
}
 .imgPreview img {
            padding: 8px;
            max-width: 100px;
        } 
</style>
@endsection