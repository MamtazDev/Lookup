@extends('layouts.app')

@section('title')
   Update Customer
@endsection

@section('main')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<div class="container">
    <div class="justify-content-center">
       <!--  @if (count($errors) > 0)
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
                    <a class="btn btn-primary btn-radius" href="{{ route('adminusers.index') }}">Users</a>
                </span>
            </div>

            <div class="card-body">
                {!! Form::model($customer, ['route' => ['customer.update', $customer->id], 'method'=>'PATCH']) !!}
                <div class=" row">
                    <div class="col-md-12">
                        <div class="form-group">
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

                            <div class="form-group">
                        <strong>Email:</strong>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                        @if($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                   @endif
                    </div>

                    <div class="form-group">
                        <strong>Password:</strong>
                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                        @if($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                   @endif
                    </div>

                    </div>

                    <div class="col-md-6 m-0 p-0">
                        <div class="row " >

                        <div class="col-md-2">

                              <div class="form-group ">
                     <label for="phone">Phone <span class="text-danger">*</span></label>
                  <div class="input-group input-group-lg ">
                  <div class="input-group-prepend">
                    
                    <select name="phonecode" class=" btn dropdown-toggle m2" style="margin-top: -7px!important;" id="phonecode">
                        
                         @foreach ($countries->all() as $country)
                       <option value="{{$country->phonecode}}" {{ $customer->phonecode === $country->phonecode ? 'selected' : '' }}> (+{{$country->phonecode}})</option>
                    @endforeach
                     
                 </select>
                     </div>




                        </div>
                    </div>
                </div>

                        <div class="col-md-10">
                            

                            <input type="text" name="phone" value="{{ $customer->phone }}" class="form-control" style=" margin-left: 5%; max-width:74%; margin-top: 22px;">
                  @if($errors->has('phone'))
                    <div class="error">{{ $errors->first('phone') }}</div>
                   @endif
               


                        </div>

                        </div>




                        <div class="form-group wdt">
                        <strong>Confirm Password:</strong>
                        {!! Form::password('password_confirmation', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                    </div>
                        





                    </div>





                </div>

       

                            
                     


                

                            
                           



                  

                       




                     





                    </div>



                    


                </div>
                    
                    
                    
                    
                  <!-- /btn-group -->
                  
                   
                   
                   

                    <button  style="margin-left: 45%;" type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>



@endsection