<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryTypeModel;
use App\Models\ProductCategoryModel;


class CategoryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:category-type-list|category-type-create|category-type-edit|category-type-delete', ['only' => ['index','store']]);
         $this->middleware('permission:category-type-create', ['only' => ['create','store']]);
         $this->middleware('permission:category-type-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:category-type-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data = CategoryTypeModel::orderBy('id','DESC')->paginate(50);
        return view('category-type.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories = ProductCategoryModel::with('children')->whereNull('parentcatid')->where('isactive', '=', 1)->get();

       return view('category-type.create')->with([
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
          'name' => 'required|unique:productcategorytype,name',
          'category' => 'sometimes|required|numeric'
          // 'slug' =>  'required',
          // 'parent_category' => 'required',
          // 'category_type' => 'required',
       ]);

       $input = $request->all();

       

         $category = CategoryTypeModel::create([
            "name" => $request->name,
            "slug" => $request->name,
            "categoryid" => $request->category
          
           
        ]);
         

        // $ProductCategory = ProductCategoryModel::create($input);
        return redirect()->route('category-type.index')
            ->with('success', 'Category created successfully.');
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
        $categories = CategoryTypeModel::find($id);
        $cat = ProductCategoryModel::with('children')->whereNull('parentcatid')->where('isactive', '=', 1)->get();
        return view('category-type.update',compact('categories','id','cat'));
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
        // print_r($_POST);die;
        $validatedData = $request->validate([
          'name' => 'required',
          'category' => 'sometimes|numeric'
          // 'slug' =>  'required',
          // 'parent_category' => 'required',
          // 'category_type' => 'required',
       ]);

       $input = $request->all();
       $input['categoryid'] = $request->category;
       

          $category = CategoryTypeModel::find($id);
          $category->update($input);

        
        return redirect()->route('category-type.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       CategoryTypeModel::find($id)->delete();

          return redirect()->route('category-type.index')
            ->with('success', 'Category type deleted successfully.');
    }

    public function changeStatus(Request $request)
    {

        $user = CategoryTypeModel::find($request->user_id)->update(['isactive' => $request->status]);
       return response()->json(['success'=>'Status changed successfully.']);
    }
}
