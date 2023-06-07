<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\BannerModel;
use DB;
use App\Models\CmsModel;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:cms-list|cms-create|cms-edit|cms-delete', ['only' => ['index','store']]);
         $this->middleware('permission:cms-create', ['only' => ['create','store']]);
         $this->middleware('permission:cms-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:cms-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
       $cms = CmsModel::orderBy('id','DESC')->paginate(50);

       return view('cms.index',['data'=>$cms]);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create()
    {

      return view('cms.create');

    }

    // public function GetProductTypeandSub(Request $request)
    // {
         
    //     $parent_id = $request->cat_id;


         
    //     $TypeByCatId = ProductCategoryModel::where('parentcatid',$parent_id)
    //                           ->with('children')
    //                           ->pluck( "id","categorytypeid");
    //                           return response()->json($TypeByCatId);
       
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function store(Request $request)
    {
       
       // dd($request->all());
        // $this->validate($request, array(
        //     'pagename'=>'required',
        //     'title'=>'required',
        //     'slug'=>'required',
        //     'content'=>'required',
        //     'status'=>'required',
        //   ));
        //   $cms = new CmsModel;
        //   $cms->page_name = $request->input('pagename');
        //   $cms->title = $request->input('title');
        //   $cms->slug = $request->input('slug');
        //   $cms->content = $request->input('content');
        //   $status = $request->status;
        
        //   if($status)
        //     {
        //         $cms->status =  '1';
        //     }else{
        //         $cms->status =  '0';
        //     }
          
        //   $cms->save();
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('images'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image successfully uploaded'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
          return redirect()->route('cms.index')->with('success', 'CMS created successfully.');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit($id)
    {
       
        $data = CmsModel::find($id);
      return view('cms.update',compact('data'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, $id)
    {
        dd($request->all());
        $this->validate($request, array(
            'pagename'=>'required',
            'title'=>'required',
            'slug'=>'required',
            'content'=>'required',
            
            
          ));
        //   $input = $request->all();

        //    if ($image = $request->file('image')) {
        //      $destinationPath = public_path('') .'/image/banners/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['image'] = "$profileImage";
        // }else{
        //     unset($input['image']);
        // }
      
       // dd($request->all());
        $cms = CmsModel::find($id);
        $cms->page_name = $request->pagename;
        $cms->title = $request->title;
        $cms->slug = $request->slug;
        $cms->content = $request->content;
        $status = $request->status;
        if($status)
        {
            $cms->status =  '1';
        }else{
            $cms->status =  '0';
        }
        // $cms->status = $request->status;
        $cms->save();
           
        return redirect()->route('cms.index')
            ->with('success', 'CMS updated successfully.');
        }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
         CmsModel::find($id)->delete();

        return redirect()->route('cms.index')
            ->with('success', 'CMS deleted successfully.');
    }


    //  public function changeStatus(Request $request)
    // {

    //     $user = BannerModel::find($request->user_id)->update(['status' => $request->status]);
    //    return response()->json(['success'=>'Status changed successfully.']);
    // }

   
}
