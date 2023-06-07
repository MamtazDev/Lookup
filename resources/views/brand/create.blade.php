@extends('layouts.app')

@section('title')
   Create Product Brand
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
            <div class="card-header">
                 @can('brand-create')
                <span class="float-right">
                    <a class="btn btn-primary btn-radius" href="{{ route('brand.index') }}">See all Brands</a>
                </span>
                @endcan
            </div>
            <div class="row">
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                {!! Form::open(array('route' => 'brand.store','method'=>'POST')) !!}
                    <div class="form-group">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                         @if($errors->has('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                   @endif
                    </div>
                    
                   <div class="create-sub">
                    <button type="submit" class="btn btn-primary">Submit</button>
                   </div> 
                {!! Form::close() !!}
            </div>
                    
                </div>
                <div class="col-md-3">
                    
                </div>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$(document).ready(function () {
$('#category').on('change',function(e) {
var cat_id = e.target.value;
$.ajax({
url:"{{ route('cattypebyid') }}",
type:"POST",
data: {
    "_token": "{{ csrf_token() }}",
"cat_id": cat_id
},
success:function (data) {
$('#categorytype').empty();
 $("#categorytype").append('<option>Select Category Type</option>');
                            $.each(data, function(key, value) {
                                $("#categorytype").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });
}
})
});
});
</script>

@endsection