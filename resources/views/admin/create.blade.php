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
                    <a class="btn btn-primary btn-radius" href="{{ route('adminusers.index') }}"><i class="fas fa-user-alt"></i> See all Users</a>
                </span>
            </div>
            <div class="row">
               

                 <div class="col-md-6 m-0 p-0" >

                     <div class="card-body">
                {!! Form::open(array('route' => 'adminusers.store','method'=>'POST')) !!}
                    <div class="form-group">
                        <strong>FirstName:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'FirstName','class' => 'form-control')) !!}
                         @if($errors->has('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                   @endif
                    </div>

                     <div class="form-group">
                        <strong>Password:</strong>
                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                        @if($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                   @endif
                    </div>
                    
                    <div class="form-group">
                        <strong>Email:</strong>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                          @if($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                   @endif
                    </div>
                   
                   
                    

                    
                
            </div>



                 </div>
                  <div class="col-md-6" style="margin-top: 20px!important;">

                    <div class="form-group">
                        <strong>LastName:</strong>
                        {!! Form::text('lastname', null, array('placeholder' => 'LastName','class' => 'form-control')) !!}
                         @if($errors->has('lastname'))
                    <div class="error">{{ $errors->first('lastname') }}</div>
                   @endif
                    </div>

                     <div class="form-group">
                        <strong>Confirm Password:</strong>
                        {!! Form::password('password_confirmation', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                    </div>


                    <div class="form-group m1" >
                        <strong style="">Role:</strong>
                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                    </div>


                  </div>
                  <div class="wd" style="margin-top: 40px; margin-left: 25px;">
                    <div class="create-sub">  
                        <button type="submit" class="btn btn-primary"> Submit</button>
                     </div>   
                     </div>
            </div>

           {!! Form::close() !!}
        </div>
    </div>
</div>


@endsection