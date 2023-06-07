<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\WalletModel;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     

    public function index()
    {
       $data = CustomerModel::orderBy('id','DESC')->paginate(50);
       return view('dashboard',compact('data'));
    }

    public function Counters()
    {
       $data = OrderModel::where('order_status','Pending')->get();
       $NewOrders = count($data);
       $ProductModel = ProductModel::where('artistid','0')->get();
       $ProductsUpload = count($ProductModel);
       $CustomerModel = CustomerModel::get();
       $userregistration = count($CustomerModel);
       $WalletModel = WalletModel::where('type','Credit')->sum('commission');
      // dd($WalletModel);
       // dd($data);
       return view('dashboard',compact('NewOrders','ProductsUpload','userregistration','WalletModel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
}
