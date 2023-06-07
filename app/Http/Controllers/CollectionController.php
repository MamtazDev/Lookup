<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CollectionModel;
use Illuminate\Support\Facades\Route;
use Response;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:product-category-list|product-category-create|product-category-edit|product-category-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:product-category-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:product-category-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:product-category-delete', ['only' => ['destroy']]);
    // }

    public function index()
    {

       $data = CollectionModel::orderBy('id','DESC')->paginate(50);

       return view('collection.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $categories = CollectionModel::with('children')->whereNull('parentcolid')->where('isactive', '=', 1)->get();

       return view('collection.create')->with([
        'categories'  => $categories
      ]);

    }

    public function GetCatTypes(Request $request)
    {
         
        $parent_id = $request->cat_id;
        $TypeByCatId = CollectionModel::where('categoryid',$parent_id)
                              ->with('children')
                              ->pluck("name", "id");

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
      
        $validatedData = $request->validate([
          'name' => 'required|unique:collectionmaster,name',
          'parentcatid' => 'sometimes|nullable|numeric',
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          // 'slug' =>  'required',
          // 'parent_category' => 'required',
          // 'category_type' => 'required',
       ]);

       $input = $request->all();
       
        if ($image = $request->file('image')) {
            $destinationPath = public_path('') .'/image/collection/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    

         $category = CollectionModel::create([
            "name" => $request->name,
            "image" => $input['image'],
            "slug" => $request->name,
            "parentcolid" => $request->parentcatid
                 
        ]);
         
        return redirect()->route('collections.index')
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
        $categories = CollectionModel::find($id);
        $cat = CollectionModel::with('children')->whereNull('parentcolid')->where('isactive', '=', 1)->get();
      return view('collection.update',compact('categories','cat'));
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
             $destinationPath = public_path('') .'/image/collection/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

       
         $input['parentcolid'] = $request->parentcatid;

         $category = CollectionModel::find($id);
         $category->update($input);

     

        return redirect()->route('collections.index')->withSuccess('You have successfully updated a Collection!');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         CollectionModel::find($id)->delete();

        return redirect()->route('collections.index')
            ->with('success', 'Category deleted successfully.');
    }
    
     public function changeStatus(Request $request)
    {

        $user = CollectionModel::find($request->user_id)->update(['isactive' => $request->status]);
       return response()->json(['success'=>'isactive changed successfully.']);
    }
}
