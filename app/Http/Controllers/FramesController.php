<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FramesModel;
use DB;

class FramesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function __construct()
    {
        $this->middleware('permission:frames-list|frames-create|frames-edit|frames-delete', ['only' => ['index','store']]);
         $this->middleware('permission:frames-create', ['only' => ['create','store']]);
         $this->middleware('permission:frames-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:frames-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
       $data = FramesModel::orderBy('id','DESC')->paginate(50);
       return view('frames.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frames.create');
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
            'name' => 'required|unique:framemaster,name',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
        
  
        if ($image = $request->file('image')) {
            $destinationPath = public_path('') .'/image/frames/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        FramesModel::create($input);
     
        return redirect()->route('frames.index')
                        ->with('success','Frame created successfully.');
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
         $frames = FramesModel::find($id);
         return view('frames.update',compact('frames'));
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
             $destinationPath = public_path('') .'/image/frames/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

       

        $frames = FramesModel::find($id);
        $frames->update($input);

    
        return redirect()->route('frames.index')
                        ->with('success','Frames updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FramesModel::find($id)->delete();

          return redirect()->route('frames.index')
            ->with('success', 'Frame  deleted successfully.');
    }

    public function changeStatus(Request $request)
    {

        $user = FramesModel::find($request->user_id)->update(['isactive' => $request->status]);
       return response()->json(['success'=>'Status changed successfully.']);
    }
}
