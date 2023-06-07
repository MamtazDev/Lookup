@extends('layouts.app')

@section('title')
    All Orientation
@endsection

@section('main')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<div class="card">
    
        <div class="card-header">
              
               @can('orientation-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('orientation.create') }}">Add new Orientation</a>
                    </span>
               @endcan
        </div>
               <div class="card-body">
                <table class="table table-hover" id="datatable">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                           <th>Status</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $type)
                            <tr>
                                <td>{{ $type->id }}</td>
                                <td>{{ $type->name }}</td>
                                <td><div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
      <img height="120" width="150" class="img-thumbnail" src="{{url('/public/image/orientations/'.$type->image)}}" id="preview">
             </div></td>
                                 <td>
                                   <div class="form-group">
                        <input data-id="{{$type->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $type->isactive ? 'checked' : '' }}>
                   </div>
                   @error('status')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                                </td>
                                <td>
                                  
                                    @can('orientation-edit')
                                        <a class="btn btn-primary" href="{{ route('orientation.edit',$type->id) }}"><i class="fa fa-edit"></i> </a>
                                    @endcan
                                    @can('orientation-delete')
                                    <form action="{{ route('orientation.destroy', $type->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->render() }}
            </div>
        </div>
<script>
    $(".toggle-class").change(function(){
   var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ route('orientationchangestatus') }}",
            data: { '_token': _token,'status': status, 'user_id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
});
   
</script>
<script>
        $(document).ready( function () {
            $.noConflict();
            $('#datatable').dataTable();
        });
    </script>
@endsection