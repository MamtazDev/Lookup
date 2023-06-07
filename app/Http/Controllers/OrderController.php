<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\CustomerModel;
use App\Helpers\OrderMails;
use App\Models\OrderItemsModel;
use App\Models\ProductModel;


class OrderController extends Controller
{
   
     function __construct()
    {
        $this->middleware('permission:order-list|order-create|order-edit|order-delete', ['only' => ['index','store']]);
         $this->middleware('permission:order-create', ['only' => ['create','store']]);
         $this->middleware('permission:order-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:order-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
    	$data = OrderModel::join('customermaster', 'ordermaster.customer_id', '=', 'customermaster.id')
               ->get(['ordermaster.*','ordermaster.created_at as createddate', 'customermaster.*']);
        return view('order.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = OrderModel::all();

       return view('order.create')->with([
        'categories'  => $categories
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $validatedData = $request->validate([
          'name' => 'required|unique:ordermaster,name',
       ]);

       $input = $request->all();


         $category = OrderModel::create([
            "name" => $request->name,
            "slug" => $request->name         
        ]);
         
        return redirect()->route('brand.index')
            ->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $orderid = $id;
       $data = [];
       if(isset($orderid) && !empty($orderid)){
         $orderdata = OrderModel::select('*')->where([['order_id',$orderid]])->first();
         $data["orderdata"] = $orderdata;
         $customerid = $data["orderdata"]['customer_id'];
         $customerdata = CustomerModel::select('fullname','email','phonecode','phone')->where([['id',$customerid]])->first();
         $data['customerdata'] =  $customerdata;
         return view('order.update',$data);
       }
  
    //     $datas = OrderModel::join('customermaster', 'ordermaster.customer_id', '=', 'customermaster.id')
    //     ->join('orderitemsmaster', 'ordermaster.id', '=', 'orderitemsmaster.order_id')
    //     ->join('productmaster', 'orderitemsmaster.productid', '=', 'productmaster.id')
    //     ->join('artistmaster', 'orderitemsmaster.artist_id', '=', 'artistmaster.id')->where('ordermaster.id',$id)
    //            ->get(['ordermaster.*', 'customermaster.fullname','customermaster.email','customermaster.phonecode','customermaster.phone','orderitemsmaster.*','artistmaster.firstname','artistmaster.lastname','productmaster.*','ordermaster.id as ordermasterid','ordermaster.order_id as ordermaser_orderid','customermaster.email as customer_email','ordermaster.created_at as ordercreated']);
              
    //            foreach ($datas as $data) {
    //     $values = array(
    //         'id' => $data->ordermasterid,
    //         'customerid' => $data->customer_id,
    //         'customername' => $data->fullname,
    //         'orderstatus' => $data->order_status,
    //         'address' => $data->shipping_address,
    //         'orderid' => $data->ordermaser_orderid,
    //         'customeremail' => $data->customer_email,
    //         'customerphone' => $data->phone,
    //         'artistid' => $data->artistid,
    //         'artistfirstname' => $data->firstname,
    //         'artistlastname' => $data->lastname,
    //         'paymentstatus' => $data->paypal_status,
    //         'paypal_email' => $data->paypal_email,
    //         'ordercreated' => $data->ordercreated
    //          );
    // }
    
               // echo "<pre>";print_r($data);die;
        // return view('order.update',compact('values','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
          'name' => 'required'
       ]);

       $input = $request->all();

       
      

         $category = OrderModel::find($id);
         $category->update($input);

     

        return redirect()->route('order.index')->withSuccess('You have successfully updated a order!');  
    }

    public function changeOrderStatus(Request $request)
    {
           
          
        $orderstatus = $request->order_status;
        
        $orderid = $request->order_id;
        $orderitemsid = $request->orderitems_id;

       
        $orderdata = OrderModel::select('*')->where([['order_id',$orderid]])->first();
         $data["orderdata"] = $orderdata;
         $customerid = $data["orderdata"]['customer_id'];
         $customerdata = CustomerModel::select('fullname','email','phonecode','phone')->where([['id',$customerid]])->first();
         $data['customerdata'] =  $customerdata;
         $data['orderitemData'] =  OrderModel::getorderitemsbyorderid($orderdata['id']);
         //  print_r($data['orderitemData']);die;
         // $orderitemOrderid = $data['orderitemData']->order_id;
         // print_r($orderitemOrderid);die;


        if($orderstatus == 'Processing')
        {
            OrderMails::OrderProcessing($data);
        }

        if($orderstatus == 'Cancelled')
        {
            OrderMails::OrderCancelled($data);
        }

        if($orderstatus == 'Refunded')
        {

            $input = $request->all();
            $pro_id  = $request->productid;


             foreach ($input['productid'] as $key => $value) {
             if(!empty($value)){

               $getoriginalquantity =   OrderItemsModel::where('productid',$value)->where('order_id', $orderitemsid)->get();
        
                $existingquantity = $getoriginalquantity['0']['quantity'];
                $newquantity = $input['quantity'][$key];
                $addquantity = $existingquantity - $newquantity;
                // print_r($addquantity);die;

                $productquantity =   ProductModel::where('id',$value)->get();
                $availablequantity = $productquantity['0']['stockquantity'];
                $updatedquantity = $availablequantity + $addquantity;


                $productupdate = ProductModel::where('id', $value)->update([
           'stockquantity' => $updatedquantity
             ]);
               


                $update = OrderItemsModel::where('order_id', $orderitemsid)->where('productid', $value)->update([
           'quantity' => $input['quantity'][$key]
             ]);
                
             }
       }
           

           

            OrderMails::OrderRefunded($data);
        }
        
        if($orderstatus == 'Completed')
        {
            
            OrderMails::OrderCompleted($data);
        }
      
        
        $update = OrderModel::where('order_id', $orderid)
       ->update([
           'order_status' => $orderstatus
        ]);

      return redirect()->route('order.index')->withSuccess('Order updated successfully');  
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OrderModel::find($id)->delete();

        return redirect()->route('brand.index')
            ->with('success', 'order deleted successfully.');
    }

    public function changeStatus(Request $request)
    {

        $user = OrderModel::find($request->user_id)->update(['isactive' => $request->status]);
       return response()->json(['success'=>'Status changed successfully.']);
    }
}
