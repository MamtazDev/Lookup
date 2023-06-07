@extends('layouts.app')

@section('title')
   Create Currency rate
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
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                 @can('currency-create')
                <span class="float-right">
                    <a class="btn btn-primary btn-radius" href="{{ route('currency.index') }}">See all Currency rates</a>
                </span>
                @endcan
            </div>
            <div class="card-body">
                {!! Form::open(array('route' => 'currency.store','method'=>'POST','enctype' => 'multipart/form-data')) !!}
                
                    <div class="row">
                        <div class="col-md-6">

                             <div class="form-group">
                                 <strong>Currency code:</strong>
                                  {!! Form::text('currencycode', null, array('placeholder' => 'Enter currency code','class' => 'form-control')) !!}
                             </div>

                            
                        </div>
                        <div class="col-md-6">
                             <div class="form-group">
                                <strong>Currency rate:</strong>
                                <input type="number" name="currencyrate" class="form-control" onkeypress="return isNumberKey(event)"  data-role="">
                             </div>
                        </div>
                    </div>
                   
                
                    
                           
   
                    <button type="submit" class="btn btn-primary" style="margin-left: 48%;">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection