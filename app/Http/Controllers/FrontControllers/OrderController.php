<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\FrontControllers;

use Request;
use App\Models\ProductModel;
use App\Models\CartModel;
use App\Models\ProductFrameModel;
use App\Models\OrderModel;
use App\Models\OrientationModel;
use App\Models\ColorCodeModel;
use App\Models\SizeModel;
use App\Models\ArtistModel;
use App\Helpers\MyLibrary;
use App\Helpers\Email_sender;
use Carbon\Carbon;
use Redirect;
use Validator;
use DB;
use Response;
use Session;


class OrderController extends FrontController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct() {
        parent::__construct();
    }

     public static function addorder(){
      $response = false;
        $OrderData = Request::all();
        $Ordercount = OrderModel::with('paypal_transectionid')->where('paypal_transectionid',$OrderData['details']['id'])->count();
       if($Ordercount <= 0){
        $products = OrderModel::with('id')->count();
        $order_id = $products+1;
        
         $shoppingaddresArr = DB::table('shoppingaddressmaster')
            ->join('statemaster', 'shoppingaddressmaster.CStateId', '=', 'statemaster.id')
            ->join('countrymaster', 'shoppingaddressmaster.CCountryId', '=', 'countrymaster.id')
            ->join('customermaster', 'shoppingaddressmaster.customerid', '=', 'customermaster.id')
            ->where([['shoppingaddressmaster.id',$OrderData['shoppingadd']],['shoppingaddressmaster.isdeleted', '0'],['shoppingaddressmaster.isdefault', 'Y']])
            ->select('shoppingaddressmaster.*', 'statemaster.id as stateId','statemaster.name as stateName','countrymaster.id as countryId','countrymaster.countryname','customermaster.phone','customermaster.phonecode')
            ->orderBy('shoppingaddressmaster.created_at', 'desc')
            ->first(); 
            $phonecode = '';
       if(isset($shoppingaddresArr->phonecode) && !empty($shoppingaddresArr->phonecode)){ 
           $phonecode = $shoppingaddresArr->phonecode; 
         } 
         $phone = '';
      if(isset($shoppingaddresArr->phone) && !empty($shoppingaddresArr->phone)){
         $phone = $shoppingaddresArr->phone;
      }; 

        $shoppingaddress = $shoppingaddresArr->full_name.' '.$shoppingaddresArr->AddressType.'<br>'.$shoppingaddresArr->Street.',<br>'.$shoppingaddresArr->landmark.',<br>'.$shoppingaddresArr->sarea.',<br>'.$shoppingaddresArr->city.','.$shoppingaddresArr->stateName.' '.$shoppingaddresArr->pin.'<br>'.$shoppingaddresArr->countryname.'<br>Pone Number: '.$phonecode.' '.$phone;
        $deliverydate = Carbon::today()->addDays(7);
        $userid = Session::get('Front_user_id');
        $Orderid = OrderModel::create([
             'order_id' => $order_id,
             'order_status' => 'Pending',
             'order_amount' => $OrderData['details']['purchase_units']['0']['amount']['value'],
             'order_currancy' => $OrderData['details']['purchase_units']['0']['amount']['currency_code'],
             'shipping_address' => $shoppingaddress,
             'customer_id' => $userid,
             'paypal_status' => $OrderData['details']['status'], 
             'paypal_email' => $OrderData['details']['purchase_units']['0']['payee']['email_address'],
             'paypal_transectionid' => $OrderData['details']['id'],
             'paypal_respose' => json_encode($OrderData),
             'delivery_date' => date($deliverydate),
         ]);

        $usercart = CartModel::getcartbyuserid($userid);
        foreach($usercart as $cart){
        $prodectData = ProductModel::getProdectsbyIdfororder($cart->productid);

        if(isset($cart->frame_id) && !empty($cart->frame_id) && $cart->frame_id > 0){
            $framepriceArr = ProductFrameModel::getProdectsFrameByid($cart->frame_id);
            $price = $framepriceArr->frameprice;
        }else{
            if(isset($prodectData->saleprice) && !empty($prodectData->saleprice) && $prodectData->saleprice > 0){
             $price = $prodectData->saleprice;
            }else{
             $price = $prodectData->price;
            }
        }

        $price = MyLibrary::currencyconverter($OrderData['details']['purchase_units']['0']['amount']['currency_code'],$price);
       
         DB::table('orderitemsmaster')->insert([
                'order_id' => $Orderid->id,
                'productid' => $cart->productid,
                'frame_id' => $cart->frame_id,
                'artist_id' => $prodectData->artistid,
                'product_price' => $price,
                'product_size' => $prodectData->sizeid,
                'quantity' => $cart->quantity,
            ]);
         if(isset($prodectData->artistid) && !empty($prodectData->artistid) && $prodectData->artistid > 0){
         $ArtistData = ArtistModel::getArtistdetilesbyIdfororder($prodectData->artistid);
         $finalammount = $price*$cart->quantity;
         $commitn = $finalammount*$ArtistData->commission/100;
         $artistpay =$finalammount-$commitn;
         DB::table('artist_wallet')->insert([
                'userid' => $userid,
                'artistid' => $prodectData->artistid,
                'type' => 'Credit',
                'amount' => $finalammount,
                'commission' =>$artistpay
            ]);
         }
             $proqyt = $prodectData->stockquantity - $cart->quantity;
            $proUpdateData = array('stockquantity' => $proqyt);
                ProductModel::where('id', $cart->productid)
                       ->update($proUpdateData);
         $deleted = DB::table('cartmaster')->where('id',$cart->id)->delete();

          }
          $response = $Orderid->id;
        }

         return $response;
        
}


     public static function orderhistory(){
       $userid = Session::get('Front_user_id');
       $data = [];
       if(isset($userid) && !empty($userid)){
         $orderdata = OrderModel::select('*')->where('customer_id', $userid)->orderBy('created_at', 'desc')->get();
         $data["orderdata"] = $orderdata;
         return view('frontview.order-list',$data);
       }else{
         return redirect('/userlogin');
       }
      
     }

     public static function orderfilter(){
       $userid = Session::get('Front_user_id');
       $OrderData = Request::all();
       $data = [];
       if(isset($userid) && !empty($userid)){
         $orderdata = OrderModel::select('*')->where([['customer_id',$userid],['order_id',$OrderData['latter']]])->orderBy('created_at', 'desc')->get();
         $data["orderdata"] = $orderdata;
         $returnHTML = view('frontview.order-list',$data)->render();
         return $returnHTML;
       }
      
     }   

     public static function getOrderDetails($id){
      $userid = Session::get('Front_user_id');
       $data = [];
       if(isset($userid) && !empty($userid)){
         $orderdata = OrderModel::select('*')->where([['customer_id',$userid],['id',$id]])->first();
         $data["orderdata"] = $orderdata;
         return view('frontview.order-details',$data);
       }else{
         return redirect('/userlogin');
       }
    }


    public function ReturnRequest($id)
    {
       $userid = Session::get('Front_user_id');
       $data = [];
       if(isset($userid) && !empty($userid)){
         // $orderdata = OrderModel::select('*')->where([['customer_id',$userid],['id',$id]])->first();
         // $data["orderdata"] = $orderdata;
        $data['id'] = $id;
         return view('frontview.return-request',$data);
       }else{
         return redirect('/userlogin');
       }

    }

     public function ReturnMail()
    {
        $data = Request::all();
        $messages = [];
        $emailErrMsg = 'This email is already taken';
        $rules = [
            'r-name' => 'required|max:160',
            'r-email' => 'required|email|regex:[[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,4})]',
            'r-num' => 'required',
            'l-name' =>'required',
            'pin' => 'required',
            'returnAddress' => 'required',
            'city' => 'required',
            'state' => 'required',
            'num' => 'required',
            'q11_requestType' => 'required',
            'q10_reasonFor10' => 'required',
            'message' => 'required',
            
        ];

        $messsages = [
            'r-name.required' => 'FirstName field is required',
            'l-name.required' => 'LastName field is required',
            'r-email.required' => 'Email field is required',
            'r-email.required' => 'Email field is required',
            'r-email.email' => 'The email is not a valid email',
            'r-num.required' => 'Number field is required',
            'r-num.number' => 'Please provide valid number',
            'pin.required' => 'Pincode is required',
            'returnAddress.required' => 'This field is required',
            'city.required' => 'This field is required',
            'state.required' => 'This field is required',
            'num.required' => 'This field is required',
            'num.number' => 'Please provide valid number',
            'q11_requestType.required' => 'This field is required',
            'q10_reasonFor10.required'  => 'This field is required',
            'message.required' => 'This field is required',
     ];

        $validator = Validator::make($data, $rules, $messsages);
        if ($validator->passes()) {
              $UserData = $data;
              
              Email_sender::ReturnRefundMail($UserData);
               $thankyouMsg = 'Thank you your form has been successfully submitted';
              return redirect()->back()->with('returnrefundmessage', $thankyouMsg);
        } else {
            return Redirect::back()->withErrors($validator)->withInput();
        }

    }

}
