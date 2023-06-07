@extends('layouts.app')

@section('title')
    Roles
@endsection

@section('main')
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                @can('role-create')
                    <span class="float-right">
                        <a class="btn btn-primary btn-radius" href="{{ route('role.create') }}">New Role</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover" id="datatable">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                   
                                    @can('role-edit')
                                        <a class="btn btn-primary" href="{{ route('role.edit',$role->id) }}"><i class="fa fa-edit"></i></a>
                                    @endcan
                                    @can('role-delete')
                                    <form method="POST" action="{{ route('role.destroy', $role->id) }}" style="display: inline-block">
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
                {{ $data->render() }}
            </div>
        </div>
    </div>
</div>
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