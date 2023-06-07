@extends('layouts.app')

@section('title')
   Create Role
@endsection

@section('main')
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
                <span class="float-right">
                    <a class="btn btn-primary btn-radius" href="{{ route('role.index') }}">See all Roles</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::open(array('route' => 'role.store','method'=>'POST')) !!}
                    <div class="form-group">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Permission:</strong>
                        <br/>
                        <!-- @foreach($permission as $value)
                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                            {{ $value->name }}</label>
                        <br/>
                        @endforeach -->
                    </div>

                    <!-- Akash copy code -->

                    <div class="form-group roles">
                    <div class="table-responsive">
                    <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Create</th>
                              <th>Update</th>
                              <th>View</th>
                              <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                        <tr>
                    
                     <td>
                        @foreach($permission as $value)
                          @if((substr($value->name,-6)=='create') && !(substr($value->name,-6)=='delete') && !(substr($value->name,-4)=='edit')&& !(substr($value->name,-4)=='list'))
                          
                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                            {{ $value->name }}</label><br>
                          @endif
                        
                        @endforeach  
                        </td>
                        <td>
                           @foreach($permission as $key=>$value)
                            @if((substr($value->name,-4)=='edit') && !(substr($value->name,-6)=='delete') && !(substr($value->name,-6)=='create')&& !(substr($value->name,-4)=='list'))
                             <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                            {{ $value->name }}</label><br>
                          @endif
                        @endforeach
                        </td>
                        <td>
                          @foreach($permission as $key=>$value)
                             @if((substr($value->name,-4)=='list') && !(substr($value->name,-6)=='delete') && !(substr($value->name,-4)=='edit')&& !(substr($value->name,-4)=='create'))
                              <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                            {{ $value->name }}</label><br>
                       @endif
                       @endforeach
                        </td>
                        <td>
                           @foreach($permission as $key=>$value)
                             @if((substr($value->name,-6)=='delete') && !(substr($value->name,-6)=='create') && !(substr($value->name,-4)=='edit')&& !(substr($value->name,-4)=='list'))
                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                            {{ $value->name }}</label><br>
                           @endif
                           @endforeach
                        </td>
                      </tr>
                          </tbody>
                          <!-- <tbody>
                            <tr>
                              <td>Users</td>
                              <td>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input selectAll" id="selectAll1">
                                  <label class="custom-control-label" for="selectAll1">&nbsp;</label></div>
                              </td>
                              <td>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch1" value="createUser">
                                  <label class="custom-control-label" for="customSwitch1">&nbsp;</label></div>
                              </td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch2" value="updateUser"><label class="custom-control-label" for="customSwitch2">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch3" value="viewUser"><label class="custom-control-label" for="customSwitch3">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch4" value="deleteUser"><label class="custom-control-label" for="customSwitch4">&nbsp;</label></div></td>

                            </tr>
                            <tr>
                              <td>Roles &amp; Rights</td>
                              <td>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input selectAll" id="selectAll2">
                                  <label class="custom-control-label" for="selectAll2">&nbsp;</label></div>
                              </td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch5" value="createRole"><label class="custom-control-label" for="customSwitch5">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch6" value="updateRole"><label class="custom-control-label" for="customSwitch6">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch7" value="viewRole"><label class="custom-control-label" for="customSwitch7">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch8" value="deleteRole"><label class="custom-control-label" for="customSwitch8">&nbsp;</label></div></td>
                              
                            </tr>
                            <tr>
                              <td>Consultant</td>
                              <td>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input selectAll" id="selectAll3">
                                  <label class="custom-control-label" for="selectAll3">&nbsp;</label></div>
                              </td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch9" value="createConsultant"><label class="custom-control-label" for="customSwitch9">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch10" value="updateConsultant"><label class="custom-control-label" for="customSwitch10">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch11" value="viewConsultant"><label class="custom-control-label" for="customSwitch11">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch12" value="deleteConsultant"><label class="custom-control-label" for="customSwitch12">&nbsp;</label></div></td>
                              
                            </tr>
                            
                            <tr>
                              <td>Admin</td>
                              <td>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input selectAll" id="selectAll4">
                                  <label class="custom-control-label" for="selectAll4">&nbsp;</label></div>
                              </td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch13" value="createAdmin"><label class="custom-control-label" for="customSwitch13">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch14" value="updateAdmin"><label class="custom-control-label" for="customSwitch14">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch15" value="viewAdmin"><label class="custom-control-label" for="customSwitch15">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch16" value="deleteAdmin"><label class="custom-control-label" for="customSwitch16">&nbsp;</label></div></td>
                              
                            </tr>

                            <tr>
                              <td>Static Page</td>
                              <td>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input selectAll" id="selectAll5">
                                  <label class="custom-control-label" for="selectAll5">&nbsp;</label></div>
                              </td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch17" value="createPage"><label class="custom-control-label" for="customSwitch17">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch18" value="updatePage"><label class="custom-control-label" for="customSwitch18">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch19" value="viewPage"><label class="custom-control-label" for="customSwitch19">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch20" value="deletePage"><label class="custom-control-label" for="customSwitch20">&nbsp;</label></div></td>
                              
                            </tr>

                             <tr>
                              <td>Category</td>
                              <td>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input selectAll" id="selectAll6">
                                  <label class="custom-control-label" for="selectAll6">&nbsp;</label></div>
                              </td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch21" value="createCategory"><label class="custom-control-label" for="customSwitch21">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch22" value="updateCategory"><label class="custom-control-label" for="customSwitch22">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch23" value="viewCategory"><label class="custom-control-label" for="customSwitch23">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch24" value="deleteCategory"><label class="custom-control-label" for="customSwitch24">&nbsp;</label></div></td>
                              
                            </tr>


                             <tr>
                              <td>Degree</td>
                              <td>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input selectAll" id="selectAll7">
                                  <label class="custom-control-label" for="selectAll7">&nbsp;</label></div>
                              </td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch25" value="createDegree"><label class="custom-control-label" for="customSwitch25">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch26" value="updateDegree"><label class="custom-control-label" for="customSwitch26">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch27" value="viewDegree"><label class="custom-control-label" for="customSwitch27">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch28" value="deleteDegree"><label class="custom-control-label" for="customSwitch28">&nbsp;</label></div></td>
                              
                            </tr> 

                           
                             <tr>
                              <td>Blog</td>
                              <td>
                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input selectAll" id="selectAll8">
                                  <label class="custom-control-label" for="selectAll8">&nbsp;</label></div>
                              </td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch29" value="createBlog"><label class="custom-control-label" for="customSwitch29">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch30" value="updateBlog"><label class="custom-control-label" for="customSwitch30">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch31" value="viewBlog"><label class="custom-control-label" for="customSwitch31">&nbsp;</label></div></td>
                              <td><div class="custom-control custom-checkbox"><input type="checkbox" name="permission[]" class="custom-control-input tblChkBx" id="customSwitch32" value="deleteBlog"><label class="custom-control-label" for="customSwitch32">&nbsp;</label></div></td>
                              
                            </tr> 

                                                 </tbody> -->
                        </table>
                        </div>
                </div>






                    <!-- Akash copy end -->

                    <div class="create-sub">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>    
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


@endsection