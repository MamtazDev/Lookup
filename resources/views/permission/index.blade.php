@extends('layouts.app')

@section('title')
    Permissions
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
                        <a class="btn btn-primary" href="{{ route('permission.create') }}">New Permission</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('permission.show',$permission->id) }}"><i class="fas fa-eye"></i></a>
                                    @can('role-edit')
                                        <a class="btn btn-primary" href="{{ route('permission.edit',$permission->id) }}"><i class="fa fa-edit"></i></a>
                                    @endcan
                                    @can('role-delete')
                                     <form action="{{ route('permission.destroy', $permission->id)}}" method="post" style="display: inline-block">
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
                {{ $data->appends($_GET)->links() }}
            </div>
        </div>
    </div>
</div>
@endsection