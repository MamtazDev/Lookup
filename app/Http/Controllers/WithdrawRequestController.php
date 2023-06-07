<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WithdrawRequestModel;
use App\Models\WalletModel;
use App\Helpers\AdminApproveUser;
use Validator;
use Redirect,Response;
use DB;

class WithdrawRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['withdrawPending'] = WithdrawRequestModel::join('artistmaster', 'withdraw_request.artistid', '=', 'artistmaster.id')->where('status','Pending')->get(['withdraw_request.*', 'artistmaster.*','withdraw_request.created_at as date']);

    
         $data['withdrawAccepted'] = WithdrawRequestModel::join('artistmaster', 'withdraw_request.artistid', '=', 'artistmaster.id')->where('status','Accepted')->get(['withdraw_request.*', 'artistmaster.*']);

         $data['withdrawRejected'] = WithdrawRequestModel::join('artistmaster', 'withdraw_request.artistid', '=', 'artistmaster.id')->where('status','Rejected')->get(['withdraw_request.*', 'artistmaster.*']);

         return view('withdraw.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function MakeWithdrawRequest(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'amount' => 'required',
        //     'purpose' => 'required',
        // ]);
        $validatedData = $request->validate([
          'amount' => 'required',
          'purpose' =>  'required',
        ]);

         $input = $request->all();
         $artistid = auth()->user()->id;
         $withdraw = WithdrawRequestModel::create([
          'artistid' => $artistid,
          'amount' => $request->amount,
          'purpose' => $request->purpose,
         ]);
    
       return response()->json(['success'=>'Successfully']);

    }

    public function store(Request $request)
    {
        //
    }
    
     public function editwithdraw($id,$created_at)
    {
     
        $customer = WithdrawRequestModel::select("*")->where("artistid",$id)->where('created_at', '=', $created_at)->get();
        return Response::json($customer);
    }


    public function changeWithdrawStatus(Request $request)
    {
        $artistid= $request->id;
        $amount = $request->amount;
        $status = $request->isverified;
        if($status == 'Accepted')
        {


          $_ClientId = env('PAYPAL_CLIENT_ID');
          $_ClientSecret = env('PAYPAL_CLIENT_SECRET');
          
           // Get access token from PayPal client Id and secrate key
            // $ch = curl_init();

            // curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
            // curl_setopt($ch, CURLOPT_POST, 1);
            // curl_setopt($ch, CURLOPT_USERPWD, $_ClientId . ":" . $_ClientSecret);

            // $headers = array();
            // $headers[] = "Accept: application/json";
            // $headers[] = "Accept-Language: en_US";
            // $headers[] = "Content-Type: application/x-www-form-urlencoded";
            // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            // $results = curl_exec($ch);
            // $getresult = json_decode($results);


            // // PayPal Payout API for Send Payment from PayPal to PayPal account
            // curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/payments/payouts");
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            // $array = array('sender_batch_header' => array(
            //         "sender_batch_id" => time(),
            //         "email_subject" => "You have a payout!",
            //         "email_message" => "You have received a payout."
            //     ),
            //     'items' => array(array(
            //             "recipient_type" => "EMAIL",
            //     "receiver" => "sb-jidm412107271@personal.example.com",
            //             "note" => "POSPYO001",
            //             "sender_item_id" => "15240864065560",
            //             "amount" => array(
            //                 "value" => '1.00',
            //                 "currency" => "USD"
            //             ),
            //         ))
            // );
            // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($array));
            // curl_setopt($ch, CURLOPT_POST, 1);

            // $headers = array();
            // $headers[] = "Content-Type: application/json";
            // $headers[] = "Authorization: Bearer $getresult->access_token";
            // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            // $payoutResult = curl_exec($ch);
            // //print_r($result);
            // $getPayoutResult = json_decode($payoutResult);
            // if (curl_errno($ch)) {
            //     echo 'Error:' . curl_error($ch);
            // }
            // curl_close($ch);
            // print_r($getPayoutResult);

           DB::table('artist_wallet')->insert([
            'txnid' => '3453543564',
            'userid' => $artistid,
            'artistid' => $artistid,
             'type' => 'Debit',
             'amount' => $amount,
             'commission' => $amount,
         ]);
     $user = WithdrawRequestModel::where("artistid",$artistid)->where('created_at',$request->created_at)->update(['status' => $request->isverified]);
     // $artistid
     // $query = Artist::where('id',$artistid)->get();
     // print_r($query);die;
     //   AdminApproveUser::AcceptedWithdraw($UserData);

        }else{

            $user = WithdrawRequestModel::where("artistid",$artistid)->update(['status' => $request->isverified]);

        }
        
      return response()->json(['success'=>'Verification Status changed successfully.']);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
