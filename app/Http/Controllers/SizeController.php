<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SizeModel;
use DB;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:sizes-list|sizes-create|sizes-edit|sizes-delete', ['only' => ['index','store']]);
         $this->middleware('permission:sizes-create', ['only' => ['create','store']]);
         $this->middleware('permission:sizes-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:sizes-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
       $data = SizeModel::orderBy('id','DESC')->paginate(50);
       return view('size.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|unique:sizesmaster,name',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
       
  
        if ($image = $request->file('image')) {
            $destinationPath = public_path('') .'/image/sizes/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        SizeModel::create($input);
     
        return redirect()->route('size.index')
                        ->with('success','Size created successfully.');
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
        $frames = SizeModel::find($id);
        return view('size.update',compact('frames'));
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
         $request->validate([
            'name' => 'required'
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
             $destinationPath = public_path('') .'/image/sizes/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

       

        $frames = SizeModel::find($id);
        $frames->update($input);

    
        return redirect()->route('size.index')
                        ->with('success','Size updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         SizeModel::find($id)->delete();

         return redirect()->route('size.index')
            ->with('success', 'Size  deleted successfully.');
    }

     public function changeStatus(Request $request)
    {

        $user = SizeModel::find($request->user_id)->update(['isactive' => $request->status]);
       return response()->json(['success'=>'Status changed successfully.']);
    }
}
