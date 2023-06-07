<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\FrontControllers;

use Request;
use App\Models\UserLogin;
use App\Models\ProductCategoryModel;
use App\Models\CategoryTypeModel;
use App\Models\OrientationModel;
use App\Models\ColorCodeModel;
use App\Models\CountryModel;
use App\Models\SizeModel;
use App\Helpers\Email_sender;
use Validator;
use Session;
use Redirect;
use Hash;
use DB;


class UserLoginController extends FrontController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        parent::__construct();
    }

    public static function index(){
       
        return view('frontview.userauth.login');
    }

    public static function newregister(){
        $data = [];
        $data['newregister'] = 'Y';
         return view('frontview.userauth.login',$data);
    }

    public static function newSignup(){
        $data = Request::all();
        $messages = [];
        $emailErrMsg = 'This email is already taken';
        $rules = [
            'name' => 'required|max:160',
            //'email' => ['required', 'max:160', new Distinct_Field($id, 'email', $modelName, $emailErrMsg)],
            'email' => 'required|email|regex:[[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,4})]|unique:customermaster,email',
            'password' => 'required',
        ];

        $messsages = [
            'name.required' => 'Full name field is required.',
            'email.required' => 'Email field is required.',
            'email.email' => 'The email is not a valid email.',
            'email.unique' => "We're sorry, this email is already registered. Try submitting with a different email.",
            'password.required' => 'Password field is required.',
        
        ];

        $validator = Validator::make($data, $rules, $messsages);
        if ($validator->passes()) {
            // Available alpha caracters
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

            // generate a pin based on 2 * 7 digits + a random character
            $pin = mt_rand(1000000, 9999999)
                . mt_rand(1000000, 9999999)
                . $characters[rand(0, strlen($characters) - 1)];

            // shuffle the result
            $tokan = str_shuffle($pin);
            $UserData = UserLogin::updateOrCreate(
                            [
                                'fullname' => strip_tags(trim($data['name'])),
                                'email' => strip_tags(trim($data['email'])),
                                'password' => bcrypt($data['password']),
                                'isactive' => '0',
                                'verifytokan' => $tokan,
                            ]
            );

            //$MembersData = Members::getRecords()->publish()->deleted()->checkRecordId($lead->id);
            if ($UserData->count() > 0) {
                Email_sender::Signupverification($UserData);
                $thankyouMsg = 'The confirmation request email sent to your entered address.';
                return redirect()->back()->with('signupmessage', $thankyouMsg);
               // return Redirect::back()->with('message' => $thankyouMsg);
                
            }
        } else {
            return redirect('/newregister')->withErrors($validator)->withInput();
            //return redirect(url('/') . '#contact_form')->withErrors($validator)->withInput();
            //return Redirect::back()
        }
    }

    public static function newSignin(Request $request){
        $data = Request::all();
        $messages = [];
        $emailErrMsg = 'This email is already taken';
        $rules = [
           'lemail' => 'required|email|regex:[[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,4})]',
            'lpassword' => 'required',
        ];

        $messsages = [
           
            'lemail.required' => 'Email field is required.',
            'lemail.email' => 'The email is not a valid email.',
            'lpassword.required' => 'Password field is required.',
        
        ];
        $validator = Validator::make($data, $rules, $messsages);
        if ($validator->passes()) {
            $validemail = UserLogin::checkemailisvalidornot($data['lemail']);
            if(!empty($validemail)){
                $exitsUserPassword = UserLogin::where('email', '=', $data['lemail'])->first();
                $checkactive = UserLogin::CheckUserActive($exitsUserPassword['id']);
                if(isset($checkactive) && !empty($checkactive)){
                if (Hash::check( $data['lpassword'], $exitsUserPassword['password'])) {
                    Session::put('Front_user_id', $exitsUserPassword['id']);
                   
                    return redirect('/homepage');
                }else{
                return back()->withErrors(['lpassword' => ["The password that you've entered is incorrect."]]);
                }
            }else{
                return back()->withErrors(['lemail' => ["Please verify your email."]]);
            }
            }else{
                return back()->withErrors(['lemail' => ["The email that you've entered is incorrect."]]);
            }
        }else{
            return Redirect::back()->withErrors($validator)->withInput();
        }
    }

    public static function varifyemail(Request $request){
        $tokan = request()->segment(count(request()->segments()));
        $tokandata = explode('-',$tokan);
        if(count($tokandata) == 2){
            $varifyedtokan = UserLogin::Checktokan($tokandata);
            if(isset($varifyedtokan) && !empty($varifyedtokan)){
                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

            // generate a pin based on 2 * 7 digits + a random character
            $pin = mt_rand(1000000, 9999999)
                . mt_rand(1000000, 9999999)
                . $characters[rand(0, strlen($characters) - 1)];

            // shuffle the result
            $tokan = str_shuffle($pin);
                $updatedata = UserLogin::where('id', $varifyedtokan->id)
                       ->update([
                           'verifytokan' => $tokan,
                           'isactive' => '1',
                        ]);
                if(!empty($updatedata)){
                    Session::put('Front_user_id', $varifyedtokan->id);
                    return redirect('/homepage');
                }else{
                    abort(419);
                }       
                
            }else{
                abort(419);
            }
            
        }else{
            abort(404);
        }

    }

public static function logout(Request $request){
    Session::forget('Front_user_id');
    return redirect('/homepage');
}    
public static function Addwishlist(Request $request){
     $data = Request::all();
     
     $wishlistArr = array(
        'customer_id' => $data['userid'],
        'productid' => $data['data']
    );
      $wishId = DB::table('wishlistmaster')->insertGetId($wishlistArr);
      if(isset($wishId) && !empty($wishId)){
        $wish = '1';
      }else{
        $wish = '0';
      }
   return $wish;
}

public static function Removefromwishlist(Request $request){
     $data = Request::all();
     
     $wishlistArr = array(
        'customer_id' => $data['userid'],
        'productid' => $data['data']
    );
    $Removed = DB::table('wishlistmaster')->where([
    ['customer_id',$data['userid']],
    ['productid', $data['data']]])->delete();

    return $Removed;
}

public static function GetWishList(){
    $userid = Session::get('Front_user_id');
        if(isset($userid) && !empty($userid)){
           $Userwishlist = UserLogin::getUserwishlistbyuserId($userid);
           $data = [];
           $data['Userwishlist'] = $Userwishlist;
        return view('frontview.wish-list',$data);
        }else{
            return redirect('/userlogin');
        }
}

public static function ShoppingAddress(){
    $userid = Session::get('Front_user_id');
    if(isset($userid) && !empty($userid)){
        $data = [];
        $shoppingaddresList = DB::table('shoppingaddressmaster')//->where([['shoppingaddressmaster.customerid',$userid],['shoppingaddressmaster.isdeleted', '0']])->get();        
            ->join('statemaster', 'shoppingaddressmaster.CStateId', '=', 'statemaster.id')
            ->join('countrymaster', 'shoppingaddressmaster.CCountryId', '=', 'countrymaster.id')
            ->join('customermaster', 'shoppingaddressmaster.customerid', '=', 'customermaster.id')
            ->where([['shoppingaddressmaster.customerid',$userid],['shoppingaddressmaster.isdeleted', '0']])
            ->select('shoppingaddressmaster.*', 'statemaster.id as stateId','statemaster.name as stateName','countrymaster.id as countryId','countrymaster.countryname','customermaster.phone','customermaster.phonecode')
            ->orderBy('shoppingaddressmaster.created_at', 'desc')
            ->get(); 
        $data['shoppingaddresList'] = $shoppingaddresList;
        return view('frontview.shopping-address-list',$data);
    }else{
        return redirect('/userlogin');
    }
}

public static function AddNewAddressview(){
    $userid = Session::get('Front_user_id');
    if(isset($userid) && !empty($userid)){
    $data = [];
    $contryArray = CountryModel::getCountryList();
    $data['contryArray'] = $contryArray;
    $shoppingaddrescount = DB::table('shoppingaddressmaster')
            ->select('id')
            ->where([['customerid',$userid],['isdeleted', '0']])
            ->count();
    if($shoppingaddrescount < 3){
        return view('frontview.shopping-address-add',$data);
    }else{
        return redirect('/shoppingaddress');
    }      
    
    }else{
        return redirect('/userlogin');
    }
}

public static function getStatelist(){
    $data = Request::all();
    $stateArr = DB::table('statemaster')
            ->select('*')
            ->where('country_id',$data['contry'])
            ->get();
     $html = '';
     if(isset($stateArr) && !empty($stateArr)){
        $html .='<option value=" ">Select State / Province / Region</option>';
        foreach($stateArr as $state){
            
            $html .='<option value="'.$state->id.'">'.$state->name.'</option>';
        }
     }
     return $html;      
}

public static function InsertNewAddress(){
    $data = Request::all();
    // dd($data);
   // print_r($data);exit;
    $messsages = array(
            'CCountryId.required' => 'Please select country/region.',
            'full_name.required' => 'Please enter your full name.',
            'pin.required' => 'Enter PINCODE',
            'Street.required' => 'Email is required',
            // 'sarea.required' => 'Email is required',
            // 'landmark.required' => 'Email is required',
            'city.required' => 'Email is required',
            'CStateId.required' => 'Email is required',
            'AddressType.required' => 'Email is required',
        );

        $rules = array(
            'CCountryId' => ['required'],
            'full_name' => ['required'],
            'pin' => ['required'],
            'Street' => ['required'],
            // 'sarea' => ['required'],
            // 'landmark' => ['required'],
            'city' => ['required'],
            'CStateId' => ['required'],
            'AddressType' => ['required'],
        );
    $validator = Validator::make($data, $rules, $messsages);
    if ($validator->passes()) {
         $userid = Session::get('Front_user_id');
        if(isset($userid) && !empty($userid)){
        $addressData = [
            'full_name' => $data['full_name'],
            'customerid' => $userid,
            'CCountryId' => $data['CCountryId'],
            'pin' => $data['pin'],
            'Street' => $data['Street'],
            'sarea' => $data['sarea'],
            'landmark' => $data['landmark'],
            'city' => $data['city'],
            'CStateId' => $data['CStateId'],
            'AddressType' => $data['AddressType'],
            'isdeleted' => 0,
        ];
        if(isset($data['defultaddress']) && $data['defultaddress'] == 'Y'){
            $shoppingaddres = DB::table('shoppingaddressmaster')
                ->select('id')
                ->where([['customerid',$userid],['isdefault', 'Y'],['isdeleted', '0']])
                ->first();
            
            if(isset($shoppingaddres) && !empty($shoppingaddres)){
                    $affected = DB::table('shoppingaddressmaster')
                  ->where('id',$shoppingaddres->id)
                  ->update(['isdefault' => 'N']);
            }
            $addressData['isdefault'] = 'Y'; 
        } 
        if(isset($data['rcid']) && !empty($data['rcid'])){
           $id = DB::table('shoppingaddressmaster')
                  ->where('id',$data['rcid'])
                  ->update($addressData);
                  
        }else{

            $id = DB::table('shoppingaddressmaster')->insertGetId($addressData);
        }
        if(isset($id) && !empty($id)){
            return redirect('/shopping-cart');
        }else{
            return redirect('/addnewaddress');
        }


    }else{
        return redirect('/userlogin');
    }

    } else {
        return Redirect::route('/addnewaddress')->withErrors($validator)->withInput();
    } 
}

public static function removeShoppingAddress(){
    $userid = Session::get('Front_user_id');
    if(isset($userid) && !empty($userid)){
        $data = Request::all();
            $updateid = DB::table('shoppingaddressmaster')
              ->where('id',$data['addressid'])
              ->update(['isdeleted' => '1']);
        return $updateid ;
    }else{
        return redirect('/userlogin');
    }
}

public static function editshoppingaddress($id){
        $data = [];
    $contryArray = CountryModel::getCountryList();
    $shoppingaddresArr = DB::table('shoppingaddressmaster')
            ->select('*')
            ->where([['id',$id],['isdeleted', '0']])
            ->first();
     if(isset($shoppingaddresArr) && !empty($shoppingaddresArr)){      
             $stateArr = DB::table('statemaster')
                    ->select('*')
                    ->where('country_id',$shoppingaddresArr->CCountryId)
                    ->get();
            $data['stateArr'] = $stateArr;
            $data['contryArray'] = $contryArray;
            $data['shoppingaddresArr'] = $shoppingaddresArr;
         return view('frontview.shopping-address-edit',$data);
    }else{
        return redirect('/addnewaddress');
    }
}

public static function forgotpassword(){
return view('frontview.userauth.forgotpassword');

}

public function checkEmailExist() {

        $response = [];
        $data = request()->all();
        if ($data['email']) {
            $emailExistCheck = UserLogin::select('email')->where('email',$data['email'])->count();
            if (!$emailExistCheck) {
                $response = [
                        'message' => "We couldn’t find an account matching the email you entered. Please check your email and try again.",
                    ];
            }
        } else {
             $response = [
                'message' => "Email field is required.",
             ];
        }
        echo json_encode($response);
       // echo $response;
        exit;
    }


    public static function contactus(){
        $data = Request::all();
         request()->validate([
        'g-recaptcha-response' => 'required',
          ],
         [
              'g-recaptcha-response.required' => 'Captcha is Required',         
        ]);
        $messages = [];
        $emailErrMsg = 'This email is already taken';
        $rules = [
            'name' => 'required|max:160',
            'email' => 'required|email|regex:[[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,4})]',
            'subject' => 'required',
            'message' => 'required',
        ];

        $messsages = [
            'name.required' => 'Name field is required.',
            'email.required' => 'Email field is required.',
            'email.email' => 'The email is not a valid email.',
            'subject.required' => 'Subject field is required.',
            'message.required' => 'Message field is required.',

        
        ];

        $validator = Validator::make($data, $rules, $messsages);
        if ($validator->passes()) {
              $UserData = $data;
              
              Email_sender::ContactUsMail($UserData);
               $thankyouMsg = 'Thank you your form has been successfully submitted';
              return redirect()->back()->with('signupmessage', $thankyouMsg);
        } else {
            return Redirect::back()->withErrors($validator)->withInput();
        }
    }

    public static function profileChangepassword()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000000, 9999999)
                . mt_rand(1000000, 9999999)
                . $characters[rand(0, strlen($characters) - 1)];
        $tokan = str_shuffle($pin);
        $userid = Session::get('Front_user_id');
        $Userdata = DB::table('customermaster')
            ->select('*')
            ->where([['id',$userid],['isdeleted', '0']])->first();
        $tokan = $Userdata->verifytokan;
        $email = $Userdata->email;
        // $csrftoken = csrf_token();
        // print_r($csrftoken);die;
         return Redirect::route('change-password-route',array('tokan' => $tokan,'id' => $userid));
        

    }

 public static function resetpasswordemail()
 {
    $data = Request::all();
        $messages = [];
        $emailErrMsg = 'This email is already taken';
        $rules = [
            'email' => 'required|email|regex:[[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,4})]',
        ];

        $messsages = [
            'email.required' => 'Email field is required.',
            'email.email' => 'The email is not a valid email.',
        
        ];

        $validator = Validator::make($data, $rules, $messsages);
        if ($validator->passes()) {
            // Available alpha caracters
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

            // generate a pin based on 2 * 7 digits + a random character
            $pin = mt_rand(1000000, 9999999)
                . mt_rand(1000000, 9999999)
                . $characters[rand(0, strlen($characters) - 1)];

            // shuffle the result
            $tokan = str_shuffle($pin);
                $UserData = trim($data['email']);
                
                UserLogin::where('email',$data['email'])->update(['verifytokan' => $tokan]);
                $user = UserLogin::where('email',$data['email'])->select('id')->first();
                Email_sender::resetpasswordemail($tokan,$UserData,$user->id);
                $thankyouMsg = 'Please check your mail.';
                Session::flash('signupmessage', $thankyouMsg);
                return redirect()->back();
        } else {
            return Redirect::back()->withErrors($validator)->withInput();
        }
 }   
 
 public static function changepassword($tokan,$id){
$user = UserLogin::where('id',$id)->select('verifytokan')->first();
    if($user->verifytokan == $tokan){
        $data = [];
        $data['id'] = $id;
        return view('frontview.userauth.changepassword',$data);
    }else{
        abort(419);
    }

}
 public static function passwordchange(){
    $data = Request::all();
        $messages = [];
        
        $rules = [
            'password' => 'required',
        ];

        $messsages = [
            'password.required' => 'Password field is required.',
        
        ];

        $validator = Validator::make($data, $rules, $messsages);
        if ($validator->passes()) {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

            // generate a pin based on 2 * 7 digits + a random character
            $pin = mt_rand(1000000, 9999999)
                . mt_rand(1000000, 9999999)
                . $characters[rand(0, strlen($characters) - 1)];

            // shuffle the result
            $tokan = str_shuffle($pin);
            $datas = UserLogin::where('id',$data['customerId'])->update(['password' => bcrypt($data['password']),'verifytokan' => $tokan]);
            //if(!$datas){
                return redirect('/userlogin');
           // }
        }else {
            return Redirect::back()->withErrors($validator)->withInput();
        }


}




}
