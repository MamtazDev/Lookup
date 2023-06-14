<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Route;
use App\Models\ProductCategoryModel;
use App\Models\CategoryTypeModel;
use App\Models\OrientationModel;
use App\Models\ColorCodeModel;
use App\Models\SizeModel;
use App\Models\FramesModel;
use App\Models\ProductStyleModel;
use App\Models\ProductTechniqueModel;
use App\Models\ProductColorModel;
use App\Models\ProductFrameModel;
use App\Models\ProductMediaModel;
use App\Models\CollectionModel;
use App\Models\BrandModel;
use DB;
use Response;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:product-list|products-create|products-edit|products-delete', ['only' => ['index','store']]);
         $this->middleware('permission:products-create', ['only' => ['create','store']]);
         $this->middleware('permission:products-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:products-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
       $data = ProductModel::orderBy('id','DESC')->paginate(50);

       return view('product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $orientation = OrientationModel::where('isactive', '=', 1)->get();
      $colors = ColorCodeModel::where('isactive', '=', 1)->get();
      $sizes = SizeModel::where('isactive', '=', 1)->get();
      $brands = BrandModel::where('isactive', '=', 1)->get();
      $frames = FramesModel::where('isactive', '=', 1)->get();
      $collections = CollectionModel::with('children')->whereNull('parentcolid')->where('isactive', '=', 1)->get();
      $categories = ProductCategoryModel::with('children')->whereNull('parentcatid')->where('isactive', '=', 1)->get();

      return view('product.create',compact('categories','orientation','colors','sizes','frames','brands','collections'));

    }
   
   
    public function GetProductColSub(Request $request)
    {
         
        $parent_id = $request->col_id;
       
        $data = [];

        
                $html =  '';
                if(isset($request->col_id) && !empty($request->col_id)){
                    $subcategory = CollectionModel::with('children')->where('parentcolid',$parent_id)->where('isactive', '=', 1)->get();
                    foreach($subcategory as $subcat){
                        if(isset($subcat->id) && !empty($subcat->id)){
                           $html .= '<option value="'.$subcat->id.'">'.$subcat->name.'</option>';
                        }

                    }
                    
                    $data[] = $html;
                    
                }
            

            return Response::json($data);
       
    }

    public function GetProductColSubUpdate(Request $request)
    {
        
        $parent_id = $request->cat_id;
        $subcol_id = $request->sub_colid;

        if(isset($parent_id) && (!empty($parent_id))){
             $parent_id =$parent_id;
        }else{
            $parent_id = '';
        }

        $subcol_id = $request->sub_colid;
        if(isset($subcol_id) && (!empty($subcol_id))){
             $subcol_id =$subcol_id;
        }else{
            $subcol_id = '';
        }

       
        
        $data = [];
       
       
                $html =  '';
                if(isset($request->sub_colid) && !empty($request->sub_colid)){
                    $subcategory = CollectionModel::with('children')->where('parentcolid',$parent_id)->where('isactive', '=', 1)->get();
                    
                    foreach($subcategory as $subcat){
                        if(isset($subcat->id) && !empty($subcat->id)){

                            
                        if(isset($subcol_id) && $subcol_id == $subcat->id)
                            {
                                $select = 'selected';
                            }
                            else{
                                $select = '';
                            }
                        }
                            
                           $html .= '<option '.$select.' value="'.$subcat->id.'">'.$subcat->name.'</option>';
                        }

                    }
                  
                    $data[] = $html;
                   
                    
                
           

            return Response::json($data);
       
    }




    public function GetProductTypeandSub(Request $request)
    {
         
        $parent_id = $request->cat_id;
        $TypeByCatId = CategoryTypeModel::where('categoryid',$parent_id)->with('children')->get();
        $data = [];

        foreach($TypeByCatId as $catagoryIds){
                $html =  '';
                if(isset($catagoryIds->id) && !empty($catagoryIds->id)){
                    $subcategory = ProductCategoryModel::with('children')->where('parentcatid',$parent_id)->where('categorytypeid',$catagoryIds->id)->where('isactive', '=', 1)->get();
                    $html .= '<optgroup label="'.$catagoryIds->name.'">';
                    foreach($subcategory as $subcat){
                        if(isset($subcat->id) && !empty($subcat->id)){
                           $html .= '<option value="'.$subcat->id.'">'.$subcat->name.'</option>';
                        }

                    }
                    $html .= '</optgroup>';
                    $data[] = $html;
                    
                }
            }

            return Response::json($data);
       
    }


      public function GetProductTypeandSubUpdate(Request $request)
    {
        
        $parent_id = $request->cat_id;
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

        $style_id = $request->style_id;
        if(isset($style_id) && (!empty($style_id))){
             $style_id =$style_id;
        }else{
            $style_id = '';
        }

        $Technique_id = $request->Technique_id;
        if(isset($Technique_id) && (!empty($Technique_id))){
             $Technique_id =$Technique_id;
        }else{
            $Technique_id = '';
        }
       
        $theme_id = $request->theme_id;
        $style_id = $request->style_id;
        $Technique_id = $request->Technique_id;
        $TypeByCatId = CategoryTypeModel::where('categoryid',$parent_id)->with('children')->get();
        $data = [];
        $i = 1;
        foreach($TypeByCatId as $catagoryIds){
                $html =  '';
                if(isset($catagoryIds->id) && !empty($catagoryIds->id)){
                    $subcategory = ProductCategoryModel::with('children')->where('parentcatid',$parent_id)->where('categorytypeid',$catagoryIds->id)->where('isactive', '=', 1)->get();
                    $html .= '<optgroup label="'.$catagoryIds->name.'">';
                    foreach($subcategory as $subcat){
                        if(isset($subcat->id) && !empty($subcat->id)){

                            if($i == 1)
                            {
                                if(isset($theme_id) && $theme_id == $subcat->id)
                            {
                                $select = 'selected';
                            }
                            else{
                                $select = '';
                            }
                        }elseif($i == 2)
                        {
                             if(isset($style_id) && $style_id == $subcat->id)
                            {
                                $select = 'selected';
                            }
                            else{
                                $select = '';
                            }

                        }elseif($i == 3)
                        {
                             if(isset($Technique_id) && $Technique_id == $subcat->id)
                            {
                                $select = 'selected';
                            }
                            else{
                                $select = '';
                            }

                        }
                            
                           $html .= '<option '.$select.' value="'.$subcat->id.'">'.$subcat->name.'</option>';
                        }

                    }
                    $html .= '</optgroup>';
                    $data[] = $html;
                    $i++;
                    
                }
            }

            return Response::json($data);


        // $categorychild = ProductCategoryModel::where('parentcatid',$parent_id)->whereIn('categorytypeid',$catagoryArr)->get();
        
                              // return $html;
       
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
          'title' => 'required|unique:productmaster,title',
          //'image' => 'required',
          // 'media' => 'required',
          // 'media.*' => 'max:1024',
          // 'parentcatid' => 'required',
          // 'categorytype' => 'required',
          // 'categorystyle' => 'required',
          // 'categorytechnique' => 'sometimes|nullable',
          // 'shortdescription' => 'required',
          // 'longdescription' => 'required',
          // 'price' => 'required',
          // 'saleprice' => 'required',
          // 'orientation' => 'required',
          // 'availability' => 'required',
          // 'stockquantity' => 'required',
          //'color' => 'required',
          // 'height' => 'required',
          // 'width' => 'required',
          // 'size' => 'required',
          // 'brand' => 'required',
          // 'parentcolid' => 'required',
          //'frame' => 'required',
          // 'subcolid' => 'required'
          // 'slug' =>  'required',
          // 'parent_category' => 'required',
          // 'category_type' => 'required',
       ]);

      $input = $request->all();





        if ($image = $request->file('image')) {
            $destinationPath = public_path('') .'/image/products/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $featured = "$profileImage";
        }else{
            $featured = "";

        }

        if($request->color){
            $color_add = implode(',',$request->color);
        }else{
            $color_add = "";
        }
     

         $category = ProductModel::create([
            "title" => $request->title,
            "slug" => $request->title,
            "featuredimage" => $featured,
            "categoryid" => $request->parentcatid,
            "themeid" => $request->categorytype,
            'availability' => $request->availability,
            'stockquantity' => $request->stockquantity,
            "shortdescription" => $request->shortdescription,
            "longdescription" => $request->longdescription,
            "price" => $request->price,
            "saleprice" => $request->saleprice,
            "height" => $request->height,
            "width" => $request->width,
            "sizeid" => $request->size,
            "brandid" => $request->brand,
            "orientationid" => $request->orientation,
            "artistid" => 0,
            'parentcolid' => $request->parentcolid,
            "collectionid" => $request->subcolid,
            "techniqueid" => $request->categorytechnique,
            "styleid" => $request->categorystyle,
            "colorid" => $color_add,
            "uploadBy" => 'Admin'
           
           
        ]);
         $lastInsertedId= $category->id;
        if($request->frame){
         foreach ($input['frame'] as $key => $value) {
             if(!empty($value)){
                $attribute = new ProductFrameModel;
                $attribute->productid = $lastInsertedId;
                $attribute->frameid = $value;
                $attribute->frameprice = $input['frameprice'][$key];
                $attribute->save();
                
             }
        }
       }
        

         

          if($request->hasFile("media")){
                $files=$request->file("media");
                foreach($files as $file){
                    $imageName=time().'_'.$file->getClientOriginalName();
                    $request['productid']=$lastInsertedId;
                    $upload_path = 'public/image/products/';
                     $file->move(\public_path("/image/products"),$imageName);
                    $mediaurl = $upload_path.$imageName;
                    $imgData[] = $mediaurl;

                }

                $request['mediaurl'] = implode('|', $imgData);
                    $request['filetype'] = 1;
                    $request['mediatype'] = 1;
                   
                    ProductMediaModel::create($request->all());
            }

         
        
         
        return redirect()->route('product.index')
            ->with('success', 'Product created successfully.');
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
        $categories = ProductModel::find($id);
        $orientation = OrientationModel::where('isactive', '=', 1)->get();
        $colors = ColorCodeModel::where('isactive', '=', 1)->get();
        $sizes = SizeModel::where('isactive', '=', 1)->get();
        $brands = BrandModel::where('isactive', '=', 1)->get();
        $media = ProductMediaModel::where('productid',$id)->get();
        $Procats = ProductCategoryModel::with('children')->whereNull('parentcatid')->where('isactive', '=', 1)->get();
        $collections = CollectionModel::with('children')->whereNull('parentcolid')->where('isactive', '=', 1)->get();
        $frames = FramesModel::where('isactive', '=', 1)->get();
        $proframes = ProductFrameModel::where('productid',$id)->get();
      
      return view('product.update',compact('categories','id','Procats','orientation','colors','sizes','brands','media','collections','frames','proframes'));
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
        
       //   $validatedData = $request->validate([
       //    'title' => 'required',
       //    'parentcatid' => 'required',
       //    'categorytype' => 'sometimes|nullable',
       //    'categorystyle' => 'sometimes|nullable',
       //    'categorytechnique' => 'sometimes|nullable',
       //    'shortdescription' => 'required',
       //    'longdescription' => 'required',
       //    'availability' => 'required',
       //    'price' => 'required',
       //    'orientation' => 'required',
       //    'color' => 'required',
       //    'height' => 'required',
       //    'width' => 'required',
       //    'stockquantity' => 'required',
       //    'size' => 'required',
       //    'brand' => 'required',
       //    'parentcolid' => 'required',
       //    'subcolid' => 'required'
       //    'slug' =>  'required',
       //    'parent_category' => 'required',
       //    'category_type' => 'required',
       // ]);
        $input = $request->all();

        if ($image = $request->file('image')) {
             $destinationPath = public_path('') .'/image/products/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['featuredimage'] = "$profileImage";
        }else{
            unset($input['featuredimage']);
        }
      
       $input['parentcolid'] = $request->parentcolid;
       $input['collectionid'] = $request->subcolid;
       $input['availability'] = $request->availability;
       $input['categoryid'] = $request->parentcatid;
       $input['themeid'] = $request->categorytype;
       $input['stockquantity'] = $request->stockquantity;
       $input['sizeid'] = $request->size;
       $input['brandid'] = $request->brand;
       $input['orientationid'] = $request->orientation;
       if($request->color){
        $color = implode(',',$request->color);
       }else{
        $color = "";
       }
       $input['colorid'] = $color;
       $input['techniqueid'] = $request->categorytechnique;
       $input['styleid'] = $request->categorystyle;
       $input['uploadBy'] = 'Admin';

       

       $user = ProductModel::find($id);
        $user->update($input);


           
          $frames =  ProductFrameModel::where('productid', $id)->get();
          if(!empty($frames)){

              ProductFrameModel::where('productid', $id)->delete();

          }
        if($request->frame){
            foreach ($input['frame'] as $key => $value) {
                if(!empty($value)){
                    
                    $attribute = new ProductFrameModel;
                    $attribute->productid = $id;
                    $attribute->frameid = $value;
                    $attribute->frameprice = $input['frameprice'][$key];
                    $attribute->save();
                    
                }
            }
        }
          


        if($request->hasFile("media")){

                $files=$request->file("media");
                foreach($files as $file){
                    $imageName=time().'_'.$file->getClientOriginalName();
                    $upload_path = 'public/image/products/';
                     $file->move(\public_path("/image/products"),$imageName);
                    $mediaurl = $upload_path.$imageName;
                    $imgData[] = $mediaurl;
                }

                     $requests['mediaurl'] = implode('|', $imgData);
                     $requests['filetype'] = 1;
                     $users = ProductMediaModel::where('productid',$id);
                     $users->update($requests);
                   
            }


         // $inputss['styleid'] = $request->categorystyle;
         // $styleupdate = ProductStyleModel::where('productid',$id);
         // $styleupdate->update($inputss);

         // $procolor['colorid'] = implode('|',$request->color);
         // $colorupdate = ProductColorModel::where('productid',$id);
         // $colorupdate->update($procolor);


         // $inputs['techniqueid'] = $request->categorytechnique;
         // $styleupdate = ProductTechniqueModel::where('productid',$id);
         // $styleupdate->update($inputs);

         

        // $ProductCategory = ProductCategoryModel::create($input);
        return redirect()->route('product.index')
            ->with('success', 'Product updated successfully.');
        }

        

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         ProductModel::find($id)->delete();

        return redirect()->route('product.index')
            ->with('success', 'Product deleted successfully.');
    }

    public function changeStatus(Request $request)
    {

        $user = ProductModel::find($request->user_id)->update(['isactive' => $request->status]);
       return response()->json(['success'=>'isactive changed successfully.']);
    }

    public static function Addfeatured(Request $request){
     $data = $request->data;
 
     $user = ProductModel::find($data)->update(['isFeatured' => 'Y']);
     return $user;
     
}

public static function Removefeatured(Request $request){
     $data = $request->data;
     
     $user = ProductModel::find($data)->update(['isFeatured' => 'N']);
      return $user;
}
  
  public static function AddBestSeller(Request $request){
     $data = $request->data;
 
     $user = ProductModel::find($data)->update(['isBestseller' => 'Y']);
     return $user;
     
    }

    public static function RemoveBestSeller(Request $request){
     $data = $request->data;
     
     $user = ProductModel::find($data)->update(['isBestseller' => 'N']);
      return $user;
}

}
