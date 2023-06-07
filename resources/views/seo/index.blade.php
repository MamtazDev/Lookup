@extends('layouts.app')

@section('title')
    All SEO Settings
@endsection

@section('main')

 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
      <meta name="csrf-token" content="{{ csrf_token() }}">
  
@if ($message = Session::get('success'))

<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<div class="card">


    
    <div class="card-header">
               
               <!--@can('artist-create')-->
               <!--  <span class="float-right">-->
               <!--         <a class="btn btn-primary btn-radius" href="{{ route('artist.create') }}">Add Artist</a>-->
               <!--     </span>-->
               <!--@endcan-->
              </div>
               <div class="card-body">
                <?php
                $indexing = App\Models\GlobleSeo::get()->where('id',1)->first()->status; 
                $sitemap = App\Models\GlobleSeo::get()->where('id',2)->first()->status; 
                ?> 
                
                {!! Form::open(array('route' => 'globle.seoupdate','method'=>'POST','enctype' => 'multipart/form-data')) !!}
                
                <label>check if you want to index site on google </label>   
                <input type="checkbox" id="indexing" name="indexing" @if($indexing==1) checked  @endif/><br>
                
                <label>check if you want to enable sitemaping </label>   
                <input type="checkbox" id="sitemap" name="sitemap" @if($sitemap==1) checked @endif/>
                <br>
                
                <button type="submit" class="btn btn-primary mt-2 mb-3"><i class="fas fa-save"></i> Update</button>
                 {!! Form::close() !!}
                
                <table class="table table-hover" id="datatable">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Page</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Keywords</th>
                            <th>Author</th>
                             <!--<th>Is Verified</th>-->
                            <!--<th>Status</th>-->
                            <th width="200px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($artist as $key => $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->page }}</td>
                                <td>{{ $user->title }}</td>
                                <td>{{ $user->description }}</td>
                                <td>{{ $user->keywords }}</td>
                                <td>{{ $user->author }}</td>
                                <!--<th id="tr{{ $user->id }}"><span class="isverified-status {{ $user->isverified }}">{{ $user->isverified }}</span></th>-->
                                <!--<td>-->
                                    <!--<div class="form-group">-->
                                    <!--    <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->isactive ? 'checked' : '' }}>-->
                                    <!--</div>-->
                                    <!--@error('status')-->
                                    <!--<div class="alert alert-danger">{{$message}}</div>-->
                                    <!--@enderror-->
                                <!--</td>-->
                                <td>
                                    @can('user-edit')
                                    <!--<a href="javascript:void(0)" class="btn btn-warning edit-customer" isdata="{{$user->isverified}}" id="ter{{ $user->id }}" data-toggle="modal" data-id="{{ $user->id }}" title='Verify'><i class="fa fa-flag"></i>  </a>-->
                                     <!-- <button class="btn btn-warning verify-popup" data-id="{{$user->id}}" data-toggle="modal" data-target="#verify-modal" data-status="{{$user->isverified}}" title='Verify'><i class="fa fa-flag"></i> </button> -->
                                    <a class="btn btn-primary" href="{{ route('seo.edit',$user->id) }}"><i class="fa fa-edit"></i> </a>
                                    @endcan
                                    <!--@can('user-delete')-->
                                    <!--<form method="POST" action="{{ route('artist.destroy', $user->id) }}" style="display: inline-block">-->
                                    <!--    @csrf-->
                                    <!--    <input name="_method" type="hidden" value="DELETE">-->
                                    <!--    <button type="submit" class="btn  btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash" aria-hidden="true"></i></button>-->
                                    <!--</form>-->
                                    <!--@endcan-->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $artist->render() }}
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
            url: "{{ route('artistchangestatus') }}",
            data: { '_token': _token,'status': status, 'user_id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
});
   
</script>
<script>
    /* Edit customer */
    $(document).ready(function(){
      $(document).on('click','.edit-customer',function () {
        $('#dataid').val();
        var id = $(this).attr('data-id');
        var isdata = $(this).attr('isdata');
        $('#dataid').val(id);
        console.log(isdata);
        if(isdata !== "Verified"){
          $('#verify-modal').modal('show');
        }
      });
  });

$('#commission').keyup(function(){
  if($(this).val() === ""){
    $('#commissionErrorMsg').text("The commission field is required.");
  }else{
    $('#commissionErrorMsg').text("");
  }
});

$(document).ready(function(){
  $("#btnVerify").on('click',function(){
    var id =  $('#dataid').val();
    var isverified = $('#StatusVerify').val();
    var commission = $('#commission').val();
    if(isverified === "Verified" && commission === ""){
      $('#commissionErrorMsg').text("The commission field is required.");
    }
    $('#btnVerify').attr("disabled", "disabled");
    let _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "{{ route('artistisverified') }}",
      data: { '_token': _token,'isverified': isverified, 'id': id, 'commission' : commission},
      success: function(data){
        console.log(data);
        // $("#ter"+id).removeAttr('isdata');
        $("#ter"+id).attr('isdata',data.isverify);
        $("#tr"+id).html('');
        $('#dataid').val();
        $('#commissionErrorMsg').text('');
        $("#tr"+id).append("<span class='isverified-status "+ data.isverify +"'>"+ data.isverify +"</span>");
        $('#verify-modal').modal('hide');
        $('#btnVerify').removeAttr("disabled");
      },
        error: function(response) {
          $('#commissionErrorMsg').text(response.responseJSON.errors.commission);
          $('#btnVerify').removeAttr("disabled");
      },
    });
  });
});

// })
// });
</script>
<div class="modal fade" id="verify-modal"  aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update verification status</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <!-- <form> -->
          <input type="hidden" name="dataid" id="dataid">
     
          <div class="row clearfix m-t-20">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-control-label">
                           <label for="Status">Status</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <div class="form-line">
                            <select id="StatusVerify" name="StatusVerify" required class="form-control show-tick optVerify" onchange="changeFunc();">
                              <option value="Pending">Pending</option>
                              <option value="Verified">Verified</option>
                              <option value="Declined">Declined</option>    
                            </select>
                                </div>
                                <label id="Status-error" class="error" for="Status"></label>
                            </div>
                            <div style="display: none" id="textboxes">
                            <div class="form-group">
                                 <label for="Status">Commission in Percentage</label>
                                 <input name="commission" id="commission" placeholder="Add Commission for this artist" class="form-control" type="number"  required>
                                 <span class="text-danger" id="commissionErrorMsg"></span> 
                            </div>
                            </div>
                        </div>
                    </div>


        <div class="form-group text-center">
          <button class="btn btn-primary" id="btnVerify" type="submit">Update Status</button>
        </div>
<!-- </form> -->
     
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

<script type="text/javascript">
function changeFunc() {
var selectBox = document.getElementById("StatusVerify");
var selectedValue = selectBox.options[selectBox.selectedIndex].value;
if (selectedValue=="Verified"){
$('#textboxes').show();
}
else {

$('#textboxes').hide();
}
}
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



