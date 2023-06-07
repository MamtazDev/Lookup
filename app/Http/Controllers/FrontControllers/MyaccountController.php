<?php
namespace App\Http\Controllers\FrontControllers;
use Illuminate\Http\Request;

use App\Models\CustomerModel;
use Validator;
use Session;
use Redirect;
use Hash;
use DB;


class MyaccountController extends FrontController {


	public function index()
	{
	   $id = Session::get('Front_user_id');
      if(isset($id) && !empty($id)){
        $customer = CustomerModel::find($id);
       return view('frontview.user-profile',compact('customer','id'));
       }else{
         return redirect('/userlogin');
       }
	   
	}


	public function update(Request $request, $id)
    {
       $input = $request->all();
        
      
       if ($image = $request->file('profileimage')) {
            $destinationPath = public_path('') .'/image/customer/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['profileimage'] = "$profileImage";
        }
         $user = CustomerModel::find($id);
            $user->zipcode = $input['zipcode'];
             
         $user->update($input);

         return redirect()->route('myaccount.index')
            ->with('success', 'Profile updated successfully.');
    }

}