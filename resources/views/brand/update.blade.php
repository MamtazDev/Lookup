@extends('layouts.app')

@section('title')
   Update Brand
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
                    <a class="btn btn-primary btn-radius" href="{{ route('brand.index') }}">Product Brand</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::model($categories, ['route' => ['brand.update', $categories->id],'method' => 'PATCH','enctype' => 'multipart/form-data']) !!}

                    <div class="row">

                        <div class="col-md-3">
                            

                        </div>

                        <div class="col-md-6">
                             <div class="form-group">
                                    <strong>Name:</strong>
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                     @if($errors->has('name'))
                                <div class="error">{{ $errors->first('name') }}</div>
                               @endif
                                </div>
                            

                        </div>

                        <div class="col-md-3">
                            

                        </div>
                        


                    </div>
                   
                    
                    
                    
                  
            <button type="submit" class="btn btn-primary" style="margin-left:43%; margin-top: 45px;"> Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection