<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategoryModel;
use App\Models\CategoryTypeModel;
use Illuminate\Support\Facades\Route;
use Response;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:product-category-list|product-category-create|product-category-edit|product-category-delete', ['only' => ['index','store']]);
         $this->middleware('permission:product-category-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-category-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
       $data = ProductCategoryModel::orderBy('id','DESC')->get();

       return view('product-category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $categories = ProductCategoryModel::with('children')->whereNull('parentcatid')->where('isactive', '=', 1)->get();

       return view('product-category.create')->with([
        'categories'  => $categories
      ]);

    }

    public function GetCatTypes(Request $request)
    {
         
        $parent_id = $request->cat_id;
        $TypeByCatId = CategoryTypeModel::where('categoryid',$parent_id)
                              ->with('children')
                              ->pluck("name", "id");

                              return response()->json($TypeByCatId);
       
    }

    public function GetCatTypeEdit(Request $request)
    {

        
        $parent_id = $request->parentcatid;
        if(isset($parent_id) && (!empty($parent_id))){
             $parent_id =$parent_id;
        }else{
            $parent_id = '';
        }
       
         $theme_id = $request->theme_id;
        if(isset($theme_id) && (!empty($theme_id))){
             $theme_id =$theme_id;
        }else{
            $theme_id = '';
        }

        $TypeByCatId = CategoryTypeModel::where('categoryid',$parent_id)->with('children')->get();
        $data = [];
       
        foreach($TypeByCatId as $catagoryIds){
                $html =  '';
                if(isset($catagoryIds->id) && !empty($catagoryIds->id)){
                  if(isset($theme_id) && $theme_id == $catagoryIds->id)
                            {
                                $select = 'selected';
                            }
                            else{
                                $select = '';
                            }
                        
                   $html .= '<option '.$select.' value="'.$catagoryIds->id.'">'.$catagoryIds->name.'</option>';
                    $data[] = $html;
                    
                }
            }

            return Response::json($data);


      
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
          'name' => 'required|unique:productcategorymaster,name',
          'parentcatid' => 'sometimes|nullable|numeric',
          'categorytype' => 'sometimes|nullable|numeric',
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          // 'slug' =>  'required',
          // 'parent_category' => 'required',
          // 'category_type' => 'required',
       ]);

       $input = $request->all();
       
        if ($image = $request->file('image')) {
            $destinationPath = public_path('') .'/image/product-categories/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    

         $category = ProductCategoryModel::create([
            "name" => $request->name,
            "image" => $input['image'],
            "slug" => $request->name,
            "parentcatid" => $request->parentcatid,
            "categorytypeid" => $request->categorytype           
        ]);
         

        // $ProductCategory = ProductCategoryModel::create($input);
        return redirect()->route('product-category.index')
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
        $categories = ProductCategoryModel::find($id);
        $cat = ProductCategoryModel::with('children')->whereNull('parentcatid')->where('isactive', '=', 1)->get();
      return view('product-category.update',compact('categories','id','cat'));
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
          'name' => 'required',
          'parentcatid' => 'sometimes|nullable|numeric'
          // 'slug' =>  'required',
          // 'parent_category' => 'required',
          // 'category_type' => 'required',
       ]);

       $input = $request->all();

       if ($image = $request->file('image')) {
             $destinationPath = public_path('') .'/image/product-categories/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

       
         $input['categorytypeid'] = $request->categorytype;

         $category = ProductCategoryModel::find($id);
         $category->update($input);

     

        return redirect()->route('product-category.index')->withSuccess('You have successfully updated a Category!');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         ProductCategoryModel::find($id)->delete();

        return redirect()->route('product-category.index')
            ->with('success', 'Category deleted successfully.');
    }
    
     public function changeStatus(Request $request)
    {

        $user = ProductCategoryModel::find($request->user_id)->update(['isactive' => $request->status]);
       return response()->json(['success'=>'isactive changed successfully.']);
    }
}
