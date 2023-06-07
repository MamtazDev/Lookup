<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrandModel;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:brand-list|brand-create|brand-edit|brand-delete', ['only' => ['index','store']]);
         $this->middleware('permission:brand-create', ['only' => ['create','store']]);
         $this->middleware('permission:brand-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:brand-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data = BrandModel::orderBy('id','DESC')->paginate(50);
        return view('brand.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BrandModel::all();

       return view('brand.create')->with([
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
          'name' => 'required|unique:brandmaster,name',
       ]);

       $input = $request->all();


         $category = BrandModel::create([
            "name" => $request->name,
            "slug" => $request->name         
        ]);
         
        return redirect()->route('brand.index')
            ->with('success', 'Brand created successfully.');
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
        $categories = BrandModel::find($id);
        return view('brand.update',compact('categories'));
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

       
      

         $category = BrandModel::find($id);
         $category->update($input);

     

        return redirect()->route('brand.index')->withSuccess('You have successfully updated a brand!');  
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BrandModel::find($id)->delete();

        return redirect()->route('brand.index')
            ->with('success', 'Brand deleted successfully.');
    }

    public function changeStatus(Request $request)
    {

        $user = BrandModel::find($request->user_id)->update(['isactive' => $request->status]);
       return response()->json(['success'=>'Status changed successfully.']);
    }
}
