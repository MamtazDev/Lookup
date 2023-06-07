<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BannerModel;
use App\Models\BlogcategoryModel;
use DB;


class BlogcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:blogcategory-list|blogcategory-create|blogcategory-edit|blogcategory-delete', ['only' => ['index','store']]);
         $this->middleware('permission:blogcategory-create', ['only' => ['create','store']]);
         $this->middleware('permission:blogcategory-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:blogcategory-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
       $blogcategorys = BlogcategoryModel::orderBy('id','DESC')->paginate(50);

       return view('blogcategory.index', compact('blogcategorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      return view('blogcategory.create');

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
        // dd($request->all());
       
        $this->validate($request, array(
            'name'=>'required|unique:blog_categories',
            // 'status'=>'required',
          ));
          $blogcategory = new BlogcategoryModel;
          $blogcategory->name = $request->input('name');
          $blogcategory->status = '1';//$request->input('status');
          
          $blogcategory->save();
          return redirect()->route('blogcategory.index')->with('success', 'Blog Category Save Successfully.');

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
       
        $blogcategory = BlogcategoryModel::find($id);
      return view('blogcategory.update',compact('blogcategory'));
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
        // dd($id);
        // $this->validate($request, array(
        //     'name'=>'required',
            
        //   ));

         

        $blogcategory = BlogcategoryModel::find($id);
        $blogcategory->name = $request->name;
        $blogcategory->save();
           
        return redirect()->route('blogcategory.index')
            ->with('success', 'Blog Category  updated successfully.');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
         BlogcategoryModel::find($id)->delete();

        return redirect()->route('blogcategory.index')
            ->with('success', 'Blog Category  deleted successfully.');
    }


     public function changeStatus(Request $request)
    {

        $user = BlogcategoryModel::find($request->user_id)->update(['status' => $request->status]);
       return response()->json(['success'=>'Status changed successfully.']);
    }

   
}
