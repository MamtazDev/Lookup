<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrencyModel;


class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware('permission:category-type-list|category-type-create|category-type-edit|category-type-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:category-type-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:category-type-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:category-type-delete', ['only' => ['destroy']]);
    // }

    public function index()
    {
        $data = CurrencyModel::orderBy('id','DESC')->paginate(50);
        return view('currency.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       

       return view('currency.create');
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
          'currencycode' => 'required|unique:currencyrate,Currency_code',
          'currencyrate' => 'required'
       ]);

       $input = $request->all();

       

         $category = CurrencyModel::create([
            "Currency_code" => $request->currencycode,
            "currency_rate" => $request->currencyrate
          
           
        ]);
         

        // $ProductCategory = ProductCategoryModel::create($input);
        return redirect()->route('currency.index')
            ->with('success', 'Currency created successfully.');
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
        $currency = CurrencyModel::find($id);
        return view('currency.update',compact('currency'));
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
          'currencycode' => 'required',
          'currencyrate' => 'required'
       ]);

      
       $input['Currency_code'] = $request->currencycode;
       $input['currency_rate'] = $request->currencyrate;
       

          $currency = CurrencyModel::find($id);
          $currency->update($input);

        
        return redirect()->route('currency.index')
            ->with('success', 'Currency updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       CurrencyModel::find($id)->delete();

          return redirect()->route('currency.index')
            ->with('success', 'Currency type deleted successfully.');
    }

    // public function changeStatus(Request $request)
    // {

    //     $user = CurrencyModel::find($request->user_id)->update(['isactive' => $request->status]);
    //    return response()->json(['success'=>'Status changed successfully.']);
    // }
}
