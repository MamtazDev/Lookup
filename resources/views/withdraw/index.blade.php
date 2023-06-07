@extends('layouts.app')

@section('title')
    All Withdraw requests
@endsection

@section('main')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
   <link rel="stylesheet" hrśef="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
 <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    
    <section>
      
      <div class="container">
     <!--  <h4 class="mt-5 ">Custom Content Above</h4> -->
      <ul class="nav nav-tabs mt-5" id="custom-content-above-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home"style="border-radius: 20px!important;" aria-selected="true">Pending</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" style="border-radius: 20px!important;" aria-selected="false">Accepted</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-messages-tab" data-toggle="pill" href="#custom-content-above-messages" role="tab" aria-controls="custom-content-above-messages"style="border-radius: 20px!important;"  aria-selected="false">Rejected</a>
              </li>
            </ul>
            <div class="tab-custom-content">
             
            </div>
            <div class="tab-content" id="custom-content-above-tabContent">
              <div class="tab-pane fade active show" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                     <div class="card">
    
    
               <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Request Amount</th>
                            <th>Wallet Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($withdrawPending as $key => $type)
                            <tr>
                                <td>{{ $type->id }}</td>
                                <td>{{$type->firstname}} {{$type->lastname}}</td>
                                 <td>{{$type->email}}</td>
                                  <td>{{$type->phone}}</td>
                                <td>₹{{ $type->amount }}</td>
                                <td>₹{{ $type->amount }}</td>
                                <td><span class="isverified-status {{ $type->status }}">{{ $type->status }}</span></td>
                                <td> <a href="javascript:void(0)" class="btn btn-warning" id="edit-customer" data-toggle="modal" data-id="{{ $type->id }}" data-created-id="{{ $type->date }}" title='Verify'><i class="fa fa-flag"></i>  </a></td>
                                <td>{{ $type->date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              
            </div>
        </div> 
              </div>
              <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                     <div class="card">
    
    
               <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Request Amount</th>
                            <th>Wallet Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($withdrawAccepted as $key => $type)
                            <tr>
                                <td>{{ $type->id }}</td>
                                <td>{{$type->firstname}} {{$type->lastname}}</td>
                                 <td>{{$type->email}}</td>
                                  <td>{{$type->phone}}</td>
                                <td>₹{{ $type->amount }}</td>
                                <td>{{ $type->amount }}</td>
                                <td><span class="isverified-status {{ $type->status }}">{{ $type->status }}</span></td>
                                <td>{{ $type->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              
            </div>
        </div> 
              </div>
              <div class="tab-pane fade" id="custom-content-above-messages" role="tabpanel" aria-labelledby="custom-content-above-messages-tab">
                <div class="card">
    
    
               <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Request Amount</th>
                            <th>Wallet Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($withdrawRejected as $key => $type)
                            <tr>
                                <td>{{ $type->id }}</td>
                                <td>{{$type->firstname}} {{$type->lastname}}</td>
                                 <td>{{$type->email}}</td>
                                  <td>{{$type->phone}}</td>
                                <td>₹{{ $type->amount }}</td>
                                <td>{{ $type->amount }}</td>
                                <td><span class="isverified-status {{ $type->status }}">{{ $type->status }}</span></td>
                                <td>{{ $type->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              
            </div>
        </div> 
              </div>
             
            </div>
          </div>
    </section>

       
<style type="text/css">
  span.isverified-status.Pending {
    color: #fff;
    padding: 0.2em 0.6em 0.3em;
    background-color: #ff9600;
}
span.isverified-status.Accepted {
    color: #fff;
    padding: 0.2em 0.6em 0.3em;
    background-color: #2b982b;
}
span.isverified-status.Rejected {
    color: #fff;
    padding: 0.2em 0.6em 0.3em;
    background-color: #fb483a;
}
</style>
<script>
    /* Edit customer */
$('body').on('click', '#edit-customer', function () {
var id = $(this).data('id');
var created_at = $(this).data('created-id');

 $.get('editwithdraw/'+id+'/'+created_at+'/edit', function (data) {

$('#verify-modal').modal('show');
$('#amount').val(data['0'].amount);
$('#StatusVerify').val(data['0'].status);

$("#btnVerify").click(function(){
   var isverified = $('#StatusVerify').val();
   var amount = $('#amount').val();
   var id = data[0].artistid;
        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ route('withdrawstatus') }}",
            data: { '_token': _token,'isverified': isverified, 'id': id, 'created_at': created_at, 'amount': amount},
            success: function(data){
              console.log(data.success)
            }
        });
});

})
});
</script>
<div class="modal fade" id="verify-modal"  aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update withdraw request status</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <form>
        <input type="hidden" name="VID" id="VID">
     
<div class="row clearfix m-t-20">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 form-control-label">
                            <input type="hidden" name="amount" id="amount">
                           <label for="Status">Status</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <div class="form-line">
                                    <select id="StatusVerify" name="StatusVerify" required class="form-control show-tick optVerify">
            <option value="Pending">Pending</option>
            <option value="Accepted">Accepted</option>
            <option value="Rejected">Rejected</option>    
          </select>
                                </div>
                                <label id="Status-error" class="error" for="Status"></label>
                            </div>
                        </div>
                    </div>


        <div class="form-group text-center">
          <button class="btn btn-primary" id="btnVerify" type="button">Update Status</button>
        </div>
</form>
     
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endsection