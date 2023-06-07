<?php

namespace App\Http\Controllers\FrontControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\ProductFrameModel;
use App\Models\ProductCategoryModel;
use App\Models\UserLogin;
use App\Models\CartModel;
use App\Models\ArtistModel;
use App\Models\CollectionModel;
use App\Helpers\MyLibrary;
use App\Helpers\Email_sender;
use Auth;
use Session;
use Validator;
use DB;

class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {  
        $this->middleware(function ($request, $next) {
            $session = Session::get('Front_user_id');
            $userData = UserLogin::CheckUserActive($session);
            if(!empty($userData)){
                $usercart = CartModel::getcartbyuserid($session);
                $totalprice = 0;
                $totalcartitem = 0;
                foreach($usercart as $cart){
                    $prodectprice = ProductModel::getProdectsPricebyId($cart->productid);
                    if(isset($prodectprice) && !empty($prodectprice)){
                         if(isset($cart->frame_id) && !empty($cart->frame_id) && $cart->frame_id != 0){
                            $framepriceArr = ProductFrameModel::getProdectsFrameByid($cart->frame_id);
                            $price = $framepriceArr->frameprice*$cart->quantity;
                        }else{
                            if(isset($prodectprice->saleprice) && !empty($prodectprice->saleprice) && $prodectprice->saleprice > 0){
                                    $price = $prodectprice->saleprice*$cart->quantity;
                                }else{
                                    $price = $prodectprice->price*$cart->quantity;        
                                }
                        }          
                    $totalprice = $totalprice+$price;
                }
                    $totalcartitem++;
                }

                $Userwishlist = UserLogin::getUserwishlistDatabyuserId($session);
                $wishlist = [];
                foreach($Userwishlist as $wish){
                    $wishlist[] = $wish->productid;
                }
                $wishlistcount = count($Userwishlist);
                $menuUsercart = CartModel::getcartbyuseridformanu($session);
                $totalprice = MyLibrary::currencyconverterallprice($totalprice);
                view()->share('totalprice', $totalprice);
                view()->share('totalcart', $totalcartitem);
                view()->share('Front_user_id', $session);
                view()->share('Userwishlist', $wishlist);
                view()->share('menuUsercart', $menuUsercart);
                view()->share('wishlistcount', $wishlistcount);
            }else{
                Session::forget('Front_user_id');
            }
                
                return $next($request);

            });

        $this->shareData();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function shareData() {
    
        $shareData = [];
        $shareData['isbanner'] = 'Y';
        $shareData['mediaUrl'] = "https://maquinistas.in/LakouMedia/";
        $ArtistMenu = ArtistModel::getLetestArtistformenu();
        $CollectionMenu = CollectionModel::with('children')->whereNull('parentcolid')->where('isactive', '=', 1)->get();

        $ProductCategorymenu = ProductCategoryModel::getParentProductCategorylistformenu();
        //$ProductCategory = ProductCategoryModel::getProductCategorylist();
        $shareData['CollectionMenu'] = $CollectionMenu;
        $shareData['ArtistMenus'] = $ArtistMenu;
        $shareData['ProductCategorymenu'] = $ProductCategorymenu;
        view()->share($shareData);
    }


    public static function checkEmailExistSubscribe(){
        $response = [];
        $data = request()->all();
        if ($data['email']) {
            $emailExistCheck = DB::table('Newsletter_lead')
            ->select('email')
            ->where([['email',$data['email']],['chrSubscribe','Y']])
            ->count();

            if ($emailExistCheck > 0) {
                $response = [
                        'message' => "Entered Email is alredy Subscribe.",
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

    public static function NewsletterInsert(){
        $data = request()->all();  
        
        // request()->validate([
        // 'g-recaptcha-response' => 'required',
        //   ],
        //  [
        //       'g-recaptcha-response.required' => 'Captcha is Required',         
        // ]);
 
        
        $messages = [];
        $emailErrMsg = 'This email is already taken';
        if(isset($data['newsletter_usr_popup_email']) && !empty($data['newsletter_usr_popup_email'])){
             $email = $data['newsletter_usr_popup_email'];
        $rules = [
            'newsletter_usr_popup_email' => 'required|email|regex:[[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,4})]',
        ];

        $messsages = [
            'newsletter_usr_popup_email.required' => 'Email field is required.',
            'newsletter_usr_popup_email.email' => 'The email is not a valid email.',
        
        ];
        }else{
            $email = $data['newsletter_usr_email'];
         $rules = [
            'newsletter_usr_email' => 'required|email|regex:[[_A-Za-z0-9-]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,4})]',
        ];

        $messsages = [
            'newsletter_usr_email.required' => 'Email field is required.',
            'newsletter_usr_email.email' => 'The email is not a valid email.',
        
        ];   
        }

        $validator = Validator::make($data, $rules, $messsages);
        if ($validator->passes()) {
                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

                // generate a pin based on 2 * 7 digits + a random character
                $pin = mt_rand(1000000, 9999999)
                    . mt_rand(1000000, 9999999)
                    . $characters[rand(0, strlen($characters) - 1)];

                // shuffle the result
                $tokan = str_shuffle($pin);
                $Useremail= trim($email);
                $values = array('email' => trim($email),'tokan' => $tokan);
                $userid = DB::table('Newsletter_lead')->insertGetId($values);
                Email_sender::newsletterSubscribe($Useremail,$userid,$tokan);
                $thankyouMsg = 'We have sent email entered email. Please Confirm your subscription.';
                return redirect()->route('thank-you')->with(['form_submit' => true, 'message' => $thankyouMsg]);
 
        } else {
            return Redirect::back()->withErrors($validator)->withInput();
        }
 } 

    public static function Newslettersubscribe($tokan,$id){
        $user = DB::table('Newsletter_lead')->where('id',$id)->select('*')->first();
        if($user->tokan == $tokan){
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

                // generate a pin based on 2 * 7 digits + a random character
                $pin = mt_rand(1000000, 9999999)
                    . mt_rand(1000000, 9999999)
                    . $characters[rand(0, strlen($characters) - 1)];

                // shuffle the result
                $tokan = str_shuffle($pin);
           DB::table('Newsletter_lead')
                ->where('id', $id)  // find your user by their email
                ->update(array('chrSubscribe' => 'Y','tokan' => $tokan));
            Email_sender::newsletterSubscribeconform($user);
            $thankyouMsg = 'Your subscription has successfully Confirmed.';
            return redirect()->route('thank-you')->with(['form_submit' => true, 'message' => $thankyouMsg]);
        }else{
            abort(419);
        }  
 }   


}
