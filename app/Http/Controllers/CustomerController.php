<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;
use Illuminate\Support\Arr;
use App\Models\CountryModel;
use DB;
use Hash;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete', ['only' => ['index','store']]);
         $this->middleware('permission:customer-create', ['only' => ['create','store']]);
         $this->middleware('permission:customer-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:customer-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
       $customer = CustomerModel::orderBy('id', 'desc')->paginate(50);
       return view('customer.index',compact('customer'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = CountryModel::all();
        return view('customer.create',compact('countries'));
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
          'fullname' => 'required',
        //   'email' => 'required|email|unique:customermaster,email',
        //   'password' => 'required|confirmed',
        //   'phonecode' => 'required',
        //   'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:customermaster,phone',
       ]);

       $input = $request->all();
        if ($request->password){
           $password = Hash::make($request->password);
        }else{   
            $password = '';
        }
        $customer = CustomerModel::create([
          'fullname' => $request->fullname,
          'email' => $request->email,
          'password' => $password,
          'phonecode' => $request->phonecode,
          'phone' => $request->phone,

       ]);
    
        return redirect()->route('customer.index')
            ->with('success', 'Customer created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = CountryModel::all();
        $customer = CustomerModel::find($id);
        return view('customer.update',compact('customer','id','countries'));
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
                 
       $this->validate($request, [
            'fullname' => 'required',
            // 'email' => 'required|email|unique:customermaster,email,'.$id,
            // 'password' => 'confirmed',
            // 'phonecode' => 'required',
            // 'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);

       $input = $request->all();
    
        $input['password'] = $request->password;
        $input['phonecode'] = $request->phonecode; 
        $input['phone'] = $request->phone;
        if(!empty($input['password'])) { 
            $input['password'] = Hash::make($input['password']);
            
        } else {
            $input = Arr::except($input, array('password'));    
        }
     
         $user = CustomerModel::find($id);
         $user->update($input);

         return redirect()->route('customer.index')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CustomerModel::find($id)->delete();

        return redirect()->route('customer.index')
            ->with('success', 'customer deleted successfully.');

     

    }

    public function changeStatus(Request $request)
    {

        $user = CustomerModel::find($request->user_id)->update(['isactive' => $request->status]);
       return response()->json(['success'=>'isactive changed successfully.']);
    }
}
