@extends('layouts.app')

@section('title')
   Add User
@endsection

@section('main')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<div class="container">
    <div class="justify-content-center">
      <!--   @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->
        <div class="card">
            <div class="card-header">
                <span class="float-right">
                    <a class="btn btn-primary" style="border-radius: 20px;" href="{{ route('customer.index') }}"><i class="fas fa-user-alt"></i> See all Users</a>
                </span>
            </div>

            <div class="card-body sect">
                <div class="row">
                    <div class="col-md-12">
                {!! Form::open(array('route' => 'customer.store','method'=>'POST')) !!}
                    <div class="form-group input-width" >
                        <strong>FullName:</strong>
                        {!! Form::text('fullname', null, array('placeholder' => 'FullName','class' => 'form-control')) !!}
                        @if($errors->has('fullname'))
                    <div class="error">{{ $errors->first('fullname') }}</div>
                   @endif
                    </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                                 <div class="form-group" >
                                    <strong>Email:</strong>
                                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                         @if($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                   @endif
                                 </div>
                                  <div class="form-group" >
                                        <strong>Password:</strong>
                                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                        @if($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                   @endif
                                  </div>
                            
                        </div>

                        <div class="col-md-6" >
                            
                            

                              
                            <div class="row">

                                <div class="col-md-3 p-0">
                                    <label for="phone">Phone <span class="text-danger"></span></label>
                                    <div class="form-group" style=" width:100%;">
                     
                  <div class="input-group input-group-lg mb-3 d-block">
                  <div class="input-group-prepend">
                    
                    <select name="phonecode" class="btn dropdown-toggle" id="phonecode">
                         @foreach ($countries->all() as $country)
                       <option value="{{$country->phonecode}}">(+{{$country->phonecode}})</option>
                    @endforeach
                     
                 </select>
                     </div>
                
                  <!-- /btn-group -->
                  
                 </div>
              <!--   @error('phone')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror -->
            </div>
                                    
                                </div>
                                <div class="col-md-9">
                                    <label for="phone"> <span class="text-danger"></span></label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                                     @if($errors->has('phone'))
                    <div class="error">{{ $errors->first('phone') }}</div>
                   @endif
                                </div>


                            </div>

                             <div class="form-group" style="width:105%!important">
                        <strong>Confirm Password:</strong>
                        {!! Form::password('password_confirmation', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                        
                    </div>
                            
                        </div>
                        
                   
                   
                    
                
                </div> <!-- row end -->


                 <div class="create-sub" style=" margin-top: 50px; "> 
                    <button type="submit" class="btn btn-primary" style="border-radius: 20px; padding: 8px!important; width: 100px!important; float: right;" > Submit</button>
                  </div>  
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


@endsection