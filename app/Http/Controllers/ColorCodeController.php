<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ColorCodeModel;
use DB;

class ColorCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:colors-list|colors-create|colors-edit|colors-delete', ['only' => ['index','store']]);
         $this->middleware('permission:colors-create', ['only' => ['create','store']]);
         $this->middleware('permission:colors-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:colors-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
       $data = ColorCodeModel::orderBy('id','DESC')->paginate(50);
       return view('colorcode.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('colorcode.create');
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
            'name' => 'required|unique:colorsmaster,name',
            'colorcode' => 'required',
        ]);
  
        $input = $request->all();
        
    
        ColorCodeModel::create($input);
     
        return redirect()->route('colors.index')
                        ->with('success','Color created successfully.');
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
        $frames = ColorCodeModel::find($id);
        return view('colorcode.update',compact('frames'));
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
            'name' => 'required',
            'colorcode' => 'required',
        ]);
  
        $input = $request->all();

        

        $frames = ColorCodeModel::find($id);
        $frames->update($input);

    
        return redirect()->route('colors.index')
                        ->with('success','Color updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ColorCodeModel::find($id)->delete();

        return redirect()->route('colors.index')->with('success', 'Color  deleted successfully.');
    }

    public function changeStatus(Request $request)
    {

        $user = ColorCodeModel::find($request->user_id)->update(['isactive' => $request->status]);
       return response()->json(['success'=>'Status changed successfully.']);
    }
}
