<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\FrontControllers;

use Request;
use App\Models\ProductModel;
use App\Models\ProductFrameModel;
use App\Models\CartModel;
use App\Models\CategoryTypeModel;
use App\Models\OrientationModel;
use App\Models\ColorCodeModel;
use App\Models\SizeModel;
use App\Helpers\MyLibrary;
use DB;
use Response;
use Session;


class CartController extends FrontController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct() {
        parent::__construct();
    }

    public function index()
    {

    }

    public function Addcart()
    {
        $prodectData = Request::all();
        if(!empty(Session::get('Front_user_id')) && !empty($prodectData)){
        
            $prodectid = $prodectData['product_id'];
            $prodecDataarr = ProductModel::getProdectsbyIdfororder($prodectid);
            
            $prodectQuantity = $prodectData['quantity'];
            if(isset($prodectData['frameid']) && !empty($prodectData['frameid'])){
                $frameid = $prodectData['frameid'];    
            }else{
                $frameid = 0;
            }
            
            $userId = Session::get('Front_user_id');
            $usercart = CartModel::select('quantity','id')->where([['customer_id',$userId],['productid',$prodectid]])->get();

            $allcart = 0;
            foreach ($usercart as $totalcart){
                $allcart = $allcart + $totalcart->quantity;
            }
 
           $checkqyt = $allcart+$prodectQuantity;

          if($prodecDataarr->stockquantity >= $checkqyt){
            $usercart = CartModel::select('quantity','id','frame_id')->where([['customer_id',$userId],['productid',$prodectid],['frame_id',$frameid]])->first();

            if(isset($usercart->quantity) && !empty($usercart->quantity)){
                $prodectQuantity = $prodectQuantity + $usercart->quantity;
                $cartData = array('quantity' => $prodectQuantity,'frame_id' => $frameid);
                CartModel::where('id', $usercart->id)
                       ->update($cartData);
            }else{
                $prodectQuantity = $prodectQuantity;
                $cartData = array('customer_id' => $userId,'productid' => $prodectid,'quantity' => $prodectQuantity,'frame_id' => $frameid);
                DB::table('cartmaster')->insert($cartData);

            }
            $usercartData = CartModel::select('id')->where('customer_id',$userId)->get();
            
            if(!empty($usercartData)){
                $usercart = CartModel::getcartbyuserid($userId);
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

                $menuUsercart = CartModel::getcartbyuseridformanu($userId);
                $menucarthtml = '';
                foreach($menuUsercart as $menucart){
                    $prourl = url('product-detail/'.$menucart['products']->slug);
                    $image = url('public/image/products/'.$menucart['products']->featuredimage);
                    $title = $menucart['products']->title;
                    $menucarthtml .= '<tr id="cartid_'.$menucart->id.'">
                                        <td class="col-artwork">
                                            <a href="'.$prourl.'" >
                                            <img src="'.$image.'" alt="'.$title.'" />
                                            </a>
                                        </td>
                                        <td class="col-desc">
                                            <h3 class="artwork-title">
                                                <a href="'.$prourl.'" >'.$title.'</a>
                                            </h3>
                                        <p class="btn dark prize">';

                                        if(isset($menucart->frame_id) && !empty($menucart->frame_id) && $menucart->frame_id != 0){
                                            $framepriceArr = ProductFrameModel::getProdectsFrameByid($menucart->frame_id);
                                            $price = $framepriceArr->frameprice;
                                        }else{
                                            if(isset($menucart['products']->saleprice) && !empty($menucart['products']->saleprice) && $menucart['products']->saleprice > 0){
                                                $price = $menucart['products']->saleprice;
                                            }else{
                                                $price = $menucart['products']->price;        
                                            }
                                        } 
                                        $menucarthtml .= MyLibrary::currencyconverterallprice($price);
                        $menucarthtml .='</p>
                                        </td>
                                        <td class="col-arrow">
                                            <a href="javascript:void(0);" 
                                                onclick=\'removefromcart("' . $menucart->id . '","menu")\'>
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        </td>
                                         </tr>';
                                                                       
                }
                $totalprice = MyLibrary::currencyconverterallprice($totalprice);
                $data = [];
                $data['totalprice'] = $totalprice;
                $data['totalcart'] = $totalcartitem;
                $data['menucarthtml'] =$menucarthtml;
                $data['availablety'] = 'Y';
                return Response::json($data);
                
            }
        }else{
            $data = [];
            $data['stockData'] = $prodecDataarr->stockquantity;
            $data['availablety'] = 'N';
            return Response::json($data);
        }

            

        }

    }
    public function RemoveFromCart()
    {
        $prodectData = Request::all();
        if(!empty(Session::get('Front_user_id')) && !empty($prodectData)){
        
            $cartid = $prodectData['cartid'];
            $userId = Session::get('Front_user_id');
            $res=CartModel::where([['id', '=', $cartid],['customer_id', '=', $userId]])->delete();
            
            $usercart = CartModel::getcartbyuserid($userId);
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
                $data = [];
                $totalprice = MyLibrary::currencyconverterallprice($totalprice);
                $data['totalprice'] = $totalprice;
                $data['totalcart'] = $totalcartitem;
                return Response::json($data);
        }

    }


    public static function getCartList(){
        $data = [];
        $userid = Session::get('Front_user_id');
        if(isset($userid) && !empty($userid)){
           $cartData = CartModel::getcartbyuserid($userid);
           $shoppingaddresArr = DB::table('shoppingaddressmaster')
            ->join('statemaster', 'shoppingaddressmaster.CStateId', '=', 'statemaster.id')
            ->join('countrymaster', 'shoppingaddressmaster.CCountryId', '=', 'countrymaster.id')
            ->join('customermaster', 'shoppingaddressmaster.customerid', '=', 'customermaster.id')
            ->where([['shoppingaddressmaster.customerid',$userid],['shoppingaddressmaster.isdeleted', '0'],['shoppingaddressmaster.isdefault', 'Y']])
            ->select('shoppingaddressmaster.*', 'statemaster.id as stateId','statemaster.name as stateName','countrymaster.id as countryId','countrymaster.countryname','customermaster.phone','customermaster.phonecode')
            ->orderBy('shoppingaddressmaster.created_at', 'desc')
            ->first(); 
           if(isset($shoppingaddresArr) && !empty($shoppingaddresArr)){
            $data['shoppingaddres'] = $shoppingaddresArr;
           }else{
            $shoppingaddresArr = DB::table('shoppingaddressmaster')
                ->join('statemaster', 'shoppingaddressmaster.CStateId', '=', 'statemaster.id')
                ->join('countrymaster', 'shoppingaddressmaster.CCountryId', '=', 'countrymaster.id')
                ->join('customermaster', 'shoppingaddressmaster.customerid', '=', 'customermaster.id')
                ->where([['shoppingaddressmaster.customerid',$userid],['shoppingaddressmaster.isdeleted', '0'],['shoppingaddressmaster.isdefault', 'N']])
                ->select('shoppingaddressmaster.*', 'statemaster.id as stateId','statemaster.name as stateName','countrymaster.id as countryId','countrymaster.countryname','customermaster.phone','customermaster.phonecode')
                ->orderBy('shoppingaddressmaster.created_at', 'desc')
                ->first(); 
            $data['shoppingaddres'] = $shoppingaddresArr;
           } 
            $totalprice = 0;
                foreach($cartData as $cart){
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
                }
        $stock = self::checkstock();
        $stock = json_decode ($stock->content(), true);
        if(isset($stock['outstockarr']) && !empty($stock['outstockarr']) && count($stock['outstockarr']) > 0){
            $outstock = 'Y';
        }else{
            $outstock = 'N';
        }
        $data['cartArrs'] = $cartData;
        $data ['totalamount'] = $totalprice;
        $data ['totalamount'] = $totalprice;
        $data['outstock'] = $outstock;
        return view('frontview.shopping-cart',$data);
        }else{
            return redirect('/userlogin');
        }
        
    }

  public static function updatequantitycartmin(){
        $cartData = Request::all();
        $session = Session::get('Front_user_id');
        $usercart = CartModel::select('quantity','id','frame_id')->where('id',$cartData['cartid'])->first();
        $usercrtqyt = $usercart->quantity-1;
           CartModel::where('id', $cartData['cartid'])
           ->update([
               'quantity' => $usercrtqyt
            ]);
           $session = Session::get('Front_user_id');
           $usercart = CartModel::getcartbyuserid($session);
            $totalprice = 0;
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
                }
                $usercart = CartModel::select('quantity','id','frame_id')->where([['id',$cartData['cartid']]])->first();
                $data = [];
                $totalprice = MyLibrary::currencyconverterallprice($totalprice);
                $data['totalprice'] = $totalprice;
                $data['gtotalprice'] = $totalprice;
                $data['qyt'] = $usercart->quantity;
                return Response::json($data);
  }  

    public static function updatequantitycart(){
        $cartData = Request::all();
        $session = Session::get('Front_user_id');
        $usercart = CartModel::select('quantity','id')->where([['customer_id',$session],['productid',$cartData['proid']]])->get();
        $prodecDataarr = ProductModel::getProdectsbyIdfororder($cartData['proid']);
            $allcart = 0;
            foreach ($usercart as $totalcart){
                $allcart = $allcart + $totalcart->quantity;
            }
           $checkqyt = $allcart+$cartData['quantity'];

          if($prodecDataarr->stockquantity >= $checkqyt){
             $usercart = CartModel::select('quantity','id','frame_id')->where([['id',$cartData['cartid']]])->first();
                $usercrtqyt = $usercart->quantity+$cartData['quantity'];
            
           CartModel::where('id', $cartData['cartid'])
           ->update([
               'quantity' => $usercrtqyt
            ]);
           $session = Session::get('Front_user_id');
           $usercart = CartModel::getcartbyuserid($session);
            $totalprice = 0;
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
                }
                $usercart = CartModel::select('quantity','id','frame_id')->where([['id',$cartData['cartid']]])->first();
                $data = [];
                $totalprice = MyLibrary::currencyconverterallprice($totalprice);
                $data['totalprice'] = $totalprice;
                $data['gtotalprice'] = $totalprice;
                $data['availablety'] = 'Y';
                $data['qyt'] = $usercart->quantity;
                return Response::json($data);
          }else{
            $usercart = CartModel::select('quantity','id','frame_id')->where([['id',$cartData['cartid']]])->first();
            $data = [];
            $data['stockData'] = $prodecDataarr->stockquantity;
            $data['availablety'] = 'N';
            return Response::json($data);
          }

       
    }
    public static function checkstock(){

         $session = Session::get('Front_user_id');
         $cartData = CartModel::getcartbyuserid($session);
         $outstockarr = [];
         $outstockarrsame = [];
         foreach($cartData as $cart){
            $countprodect = CartModel::select('quantity','id','productid')->where([['customer_id',$session],['productid',$cart->productid]])->count();
            if($countprodect > 1){
                $sameprodect = CartModel::select('quantity','id','productid')->where([['customer_id',$session],['productid',$cart->productid]])->get();
                $procount = 0; 
                foreach($sameprodect as $prodectqytcout){
                    $procount = $procount+$prodectqytcout->quantity;
                }  
                $prodecDataarr = ProductModel::getProdectsbyIdfororder($cart->productid);
                if($procount > $prodecDataarr->stockquantity && !in_array($cart->productid, $outstockarrsame)){

                    $outstockarrsame[] = $cart->productid;
                    $outstockarr[] = [
                        "proid" => $cart->productid,
                        "cartid" => $cart->id,
                        "qyt" => $prodecDataarr->stockquantity,
                    ];
                }
            }else{

                $prodecDataarr = ProductModel::getProdectsbyIdfororder($cart->productid);
                if($cart->quantity > $prodecDataarr->stockquantity){

                    $outstockarr[] = [
                        "proid" => $cart->productid,
                        "carti" => $cart->id,
                        "qyt" => $prodecDataarr->stockquantity,
                    ];

                }
            }
         }  
         $data = [];
         $data["outstockarr"] = $outstockarr;
         return Response::json($data);
    } 

}
