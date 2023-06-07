@extends('layouts.app')

@section('title')
   Update Currency rate
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
                 {!! Form::model($currency, ['route' => ['currency.update', $currency->id],'method' => 'PATCH','enctype' => 'multipart/form-data']) !!}
              
                    <div class="row ">
                    
                    <div class="col-md-6 m-0 p-0">
                        <div class="form-group">
                        <strong>Currency code:</strong>
                         <input type="text" name="currencycode" class="form-control" value="{{$currency->Currency_code}}" >
                          </div>
                        
                    </div>
                    <div class="col-md-6 m-0 p-0" style="margin-top: 3px!important;">

                        <div class="form-group">
                            <strong>Currency rate:</strong>
                             <input type="number" name="currencyrate" class="form-control" value="{{$currency->currency_rate}}" onkeypress="return isNumberKey(event)"  data-role="">
                        </div>
                    
                    
                        
                    </div>

                    </div>


                 
                           
   
                    <button type="submit" class="btn btn-primary" style="margin-left: 45%; margin-top: 25px;">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection