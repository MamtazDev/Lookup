@extends('layouts.app')

@section('title')
    Manage CMS
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
               @can('cms-create')
                 <span class="float-right">
                        <a class="btn btn-primary btn-radius" href="{{ route('cms.create') }}">Add CMS</a>
                    </span>
               @endcan
             </div>
             <div class="card-body">
                <table class="table table-hover" id="datatable">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Page Name</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                     <tbody>
                        @foreach ($data as $key => $cms)
                            <tr class="set-font">
                                <td>{{ $key+1 }}</td>
                                <td>{{ $cms->page_name }}</td>
                                <td>{{ $cms->title }}</td>
                                <td>{{ $cms->slug }}</td>
                                <td>
                           <div class="form-group">
                            @if($cms->status=='1')
                              {{'Active'}}
                              @else
                              {{'Deactive'}}
                            @endif
                           
                         </div>
                         @error('status')
                          <div class="alert alert-danger">{{$message}}</div>
                          @enderror
                </td>
                <td>
                  @can('cms-edit')
                        <a class="btn btn-primary" href="{{ route('cms.edit',$cms->id) }}"><i class="fa fa-edit"></i> </a>
                  @endcan
                  @can('cms-delete')
                        <form method="POST" action="{{ route('cms.destroy', $cms->id) }}" style="display: inline-block">
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
                
            </div>
        </div>
<script>
    
   
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



