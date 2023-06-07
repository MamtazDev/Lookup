<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BannerModel;
use DB;


class LeavecommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:banner-list|leavecomment-create|leavecomment-edit|leavecomment-delete', ['only' => ['index','store']]);
         $this->middleware('permission:leavecomment-create', ['only' => ['create','store']]);
         $this->middleware('permission:leavecomment-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:leavecomment-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
       $customer = BannerModel::orderBy('id','DESC')->paginate(50);

       return view('leavecomment.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      return view('banner.create');

    }

    public function GetProductTypeandSub(Request $request)
    {
         
        $parent_id = $request->cat_id;


         
        $TypeByCatId = ProductCategoryModel::where('parentcatid',$parent_id)
                              ->with('children')
                              ->pluck( "id","categorytypeid");
                              return response()->json($TypeByCatId);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       dd($request->all());
        $this->validate($request, array(
            'title'=>'required|max:225',
            'subtitle'=>'required|max:225',
            'buttontext'=>'required|max:225',
            'link'=>'required|url',
            'image'=>'required',
          ));
          $slider = new BannerModel;
          $slider->title = $request->input('title');
          $slider->subtitle = $request->input('subtitle');
          $slider->link = $request->input('link');
          $slider->buttontext = $request->input('buttontext');
          if ($image = $request->file('image')) {
            $destinationPath = public_path('') .'/image/banners/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $featured = "$profileImage";
        }
        $slider->image = $featured;
          
          $slider->save();
          return redirect()->route('banner.index');
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
       
        $banner = BannerModel::find($id);
      return view('banner.update',compact('banner'));
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
        $this->validate($request, array(
            'title'=>'required|max:225',
            'subtitle'=>'required|max:225',
            'link'=>'required|url',
            
          ));

          $input = $request->all();

           if ($image = $request->file('image')) {
             $destinationPath = public_path('') .'/image/banners/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $frames = BannerModel::find($id);
        $frames->update($input);
           
        return redirect()->route('banner.index')
            ->with('success', 'Banner updated successfully.');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         BannerModel::find($id)->delete();

        return redirect()->route('banner.index')
            ->with('success', 'Banner deleted successfully.');
    }


     public function changeStatus(Request $request)
    {

        $user = BannerModel::find($request->user_id)->update(['status' => $request->status]);
       return response()->json(['success'=>'Status changed successfully.']);
    }

   
}
