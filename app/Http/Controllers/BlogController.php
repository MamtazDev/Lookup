<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BannerModel;
use App\Models\BlogModel;
use App\Models\BlogcategoryModel;
use DB;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:blog-list|blog-create|blog-edit|blog-delete', ['only' => ['index','store']]);
         $this->middleware('permission:blog-create', ['only' => ['create','store']]);
         $this->middleware('permission:blog-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:blog-delete', ['only' => ['destroy']]);
    }

    public function index()
    {

       $blogs = BlogModel::orderBy('id','DESC')->paginate(50);
       $blogcategorys = BlogcategoryModel::all();
       return view('blog.index', compact('blogs','blogcategorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = BlogcategoryModel::orderBy('id','DESC')->paginate(50);

      return view('blog.create',compact('categorys'));

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
            'title'=>'required',
            'slug'=>'required',
            'category'=>'required',
            'content'=>'required',
            'meta_title'=>'required',
            'meta_keyword'=>'required',
            'meta_description'=>'required',
            'image'=>'required',

          ));
          $blog = new BlogModel;
          $blog->title = $request->input('title');
          $blog->slug = $request->input('slug');
          $blog->category = $request->input('category');
          $blog->content = $request->input('content');
          $blog->meta_title = $request->input('meta_title');
          $blog->meta_keyword = $request->input('meta_keyword');
          $blog->meta_description = $request->input('meta_description');
          $blog->status = '1';
          
          if ($image = $request->file('image')) {
            $destinationPath = public_path('') .'/image/blog/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $featured = "$profileImage";
        }
        $blog->featureimage = $featured;
          
          // dd($blog);
          $blog->save();
          return redirect()->route('blog.index')->with('success', 'Blog save successfully.');;
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
        $data['categorys'] = BlogcategoryModel::orderBy('id','DESC')->paginate(50);

        $data['blog'] = BlogModel::find($id);
        // dd($data);
      return view('blog.update',$data);
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
        // dd($request->all());
        // $this->validate($request, array(
        //     'title'=>'required|max:225',
        //     'subtitle'=>'required|max:225',
        //     'link'=>'required|url',
            
        //   ));

        //   $input = $request->all();

        //    if ($image = $request->file('image')) {
        //      $destinationPath = public_path('') .'/image/banners/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['image'] = "$profileImage";
        // }else{
        //     unset($input['image']);
        // }

        // $frames = BannerModel::find($id);
        // $frames->update($input);
        $this->validate($request, array(
            'title'=>'required',
            'slug'=>'required',
            'category'=>'required',
            'content'=>'required',
            'meta_title'=>'required',
            'meta_keyword'=>'required',
            'meta_description'=>'required',
            // 'image'=>'required',

          ));
          $blog = BlogModel::find($id);
          $blog->title = $request->input('title');
          $blog->slug = $request->input('slug');
          $blog->category = $request->input('category');
          $blog->content = $request->input('content');
          $blog->meta_title = $request->input('meta_title');
          $blog->meta_keyword = $request->input('meta_keyword');
          $blog->meta_description = $request->input('meta_description');
          $blog->status = '1';
          
          $input = $request->all();

           if ($image = $request->file('image')) {
             $destinationPath = public_path('') .'/image/blog/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        $blog->featureimage = $input['image'];
        }else{
            unset($input['image']);
        }
          
          // dd($blog);
          $blog->save();
          return redirect()->route('blog.index')->with('success', 'Blog Update Successfully.');
           
        // return redirect()->route('banner.index')
            // ->with('success', 'Banner updated successfully.');
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
         BlogModel::find($id)->delete();

        return redirect()->route('blog.index')
            ->with('success', 'Blog deleted successfully.');
    }


     public function changeStatus(Request $request)
    {
        $user = BlogModel::find($request->user_id)->update(['status' => $request->status]);
       return response()->json(['success'=>'Status changed successfully.']);
    }

   
}
