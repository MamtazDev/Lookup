@extends('layouts.app')

@section('title')
    All Orders
@endsection

@section('main')

<div class="container">
    <div class="justify-content-center">
        <div class="card">
          
    
      <div class="card-body">
                <table class="table table-hover" id="datatable">
                    <thead class="thead-dark">
                        <tr>
                            <th width="">OrderId</th>
                           <!--  <th width="">Order Status</th> -->
                            <th width="">Date</th>
                            <!-- <th width="">Delivery Date</th> -->
                            <th width="">Phone</th>
                            <th width="">Email</th>
                            <th width="">Status</th>
                            <th width="">Total</th>
                           <!--  <th width="">Amount</th> -->
                           <!--  <th width="">Status</th> -->
                            <th width="150px">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($data as $order )
                            <tr>
                                <td>#{{ $order->order_id }} {{ $order->fullname }}</td>
                               <!--  <td>{{ $order->order_status }}</td> -->
                            <td>{{ $order->createddate }}</td>
                                <!-- <td>{{ $order->delivery_date }}</td> -->
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->email }}</td>
                                 <td>
                                    {{ $order->order_status }}
                                  
                                </td>
                                <td>{{ $order->order_amount }} {{ $order->order_currancy }}</td>
                              <!--   <td>{{ $order->amount }}</td> -->
                                <!-- <td class="">{{ $order->order_status }}</td> -->
                                <td>
                                    {{ Form::open(['route' => ['order.destroy', $order->id], 'method' => 'delete', 'style'=>'display:inline-block']) }}
                                    
                                    {{ Form::close() }}
                                    <a href="{{ route('order.edit',$order->order_id) }}" class="btn btn-sm btn-icon btn-warning"><i class="fa fa-edit"></i></a>
                                   
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
</div>
</div>
 </div>
<script>
        $(document).ready( function () {
            $.noConflict();
            $('#datatable').dataTable();
        });
    </script>

@endsection