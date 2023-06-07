@extends('layouts.app')

@section('title')
   Create Colorcode
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
               <!--  <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul> -->
            </div>
        @endif
        <div class="card">
            <div class="card-header" style="margin-left: 40%;">Create new frame
                 @can('colors-list')
                <span class="float-right">
                    <a class="btn btn-primary btn-radius" href="{{ route('colors.index') }}">See all Colors</a>
                </span>
                @endcan
            </div>

            <div class="row">
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-6" >
                    <div class="card-body">
                <form action="{{ route('colors.store') }}" method="POST" enctype="multipart/form-data">
                 @csrf

                    <div class="form-group">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                         @if($errors->has('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                   @endif
                    </div>
                    
                    <div class="row" style="">
                        <div class="col-md-5" style="margin-top: 5px; padding-left: 0px!important;">
                            <div class="row clearfix ">
                    <div class="form-group">
                <strong>Select your color:</strong>
          
                <input type="color" id="favcolor" name="colorcode" value="#ff0000">
                </div>
             
            
        </div>
                            
                        </div>
                        <div class="col-md-7" >
                            <div class="form-group">
                        <strong>Status:</strong>
                        <input data-id="" class="toggle-class" type="checkbox" data-onstyle="success" name="status" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" >
                    </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
                    
                </div>
                <div class="col-md-3">
                    
                </div>
                
            </div>

            
        </div>
    </div>
</div>


@endsection