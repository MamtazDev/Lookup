<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrientationModel;
use DB;

class OrientationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:orientation-list|orientation-create|orientation-edit|orientation-delete', ['only' => ['index','store']]);
         $this->middleware('permission:orientation-create', ['only' => ['create','store']]);
         $this->middleware('permission:orientation-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:orientation-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data = OrientationModel::orderBy('id','DESC')->paginate(50);
        return view('orientation.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orientation.create');
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
            'name' => 'required|unique:orientationmaster,name',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
        
  
        if ($image = $request->file('image')) {
            $destinationPath = public_path('') .'/image/orientations/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        OrientationModel::create($input);
     
        return redirect()->route('orientation.index')
                        ->with('success','Orientation created successfully.');
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
        $frames = OrientationModel::find($id);
        return view('orientation.update',compact('frames'));
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
             $destinationPath = public_path('') .'/image/orientations/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $frames = OrientationModel::find($id);
        $frames->update($input);

    
        return redirect()->route('orientation.index')
                        ->with('success','Orientation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       OrientationModel::find($id)->delete();

        return redirect()->route('orientation.index')
            ->with('success', 'Orientation  deleted successfully.');
    }

    public function changeStatus(Request $request)
    {

        $user = OrientationModel::find($request->user_id)->update(['isactive' => $request->status]);
       return response()->json(['success'=>'Status changed successfully.']);
    }
}
