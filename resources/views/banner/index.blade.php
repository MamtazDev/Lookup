@extends('layouts.app')

@section('title')
    All Banners
@endsection

@section('main')


 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<div class="card">
    
    <div class="card-header">
               
               @can('banner-create')
                 <span class="float-right">
                        <a class="btn btn-primary btn-radius" href="{{ route('banner.create') }}">Add Banner</a>
                    </span>
               @endcan
              </div>
               <div class="card-body">
                <table class="table table-hover" id="datatable">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Button Text</th>
                            <th>Button Link</th>
                            <th>Banner</th>
                            <th>Status</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer as $key => $user)
                            <tr class="set-font">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->title }}</td>
                                <td>{{ $user->subtitle }}</td>
                                <td>{{ $user->buttontext }}</td>
                                <td>{{ $user->link }}</td>
                                  <td>
      <img style="width:80px!important; height: 80px!important;" class="img-thumbnail" src="{{url('/image/banners/'.$user->image)}}" id="preview">
            </td>

                               <td>
                     <div class="form-group">
                        <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->status ? 'checked' : '' }}>
                   </div>
                   @error('status')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </td>
                        
                                <td>
                                    @can('banner-edit')
                                        <a class="btn btn-primary" href="{{ route('banner.edit',$user->id) }}"><i class="fa fa-edit"></i> </a>
                                    @endcan
                                    @can('banner-delete')
                                    <form method="POST" action="{{ route('banner.destroy', $user->id) }}" style="display: inline-block">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $customer->render() }}
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
            url: "{{ route('bannerchangestatus') }}",
            data: { '_token': _token,'status': status, 'user_id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
});
   
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
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



