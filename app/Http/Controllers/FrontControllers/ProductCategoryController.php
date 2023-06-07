<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\FrontControllers;

use Request;
use App\Models\ProductModel;
use App\Models\ProductCategoryModel;
use App\Models\CategoryTypeModel;
use App\Models\OrientationModel;
use App\Models\ColorCodeModel;
use App\Models\SizeModel;
use App\Models\ArtistModel;
use DB;
use Response;


class ProductCategoryController extends FrontController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct() {
        parent::__construct();
    }

    public function index($slug = false)
    {
        $filterArr = [];
        $ThemesData = Request::get('ThemesData');
        $StylesData = Request::get('StylesData');
        $TechniquesData = Request::get('TechniquesData');
        $minprice = Request::get('minprice');
        $maxprice = Request::get('maxprice');
        $orientation = Request::get('orientation');
        $size = Request::get('size');
        $minheight = Request::get('minheight');
        $maxheight = Request::get('maxheight');
        $minwidth = Request::get('minwidth');
        $maxwidth = Request::get('maxwidth');
        $color = Request::get('color');
        $seaech = Request::get('seaech');
        $ArtistData = Request::get('artist_id');
        $catslug = Request::get('cat_slug');
        

        $filterArr['Themes'] = $ThemesData;
        $filterArr['Styles'] = $StylesData;
        $filterArr['Techniques'] = $TechniquesData;
        $filterArr['minprice'] = $minprice;
        $filterArr['maxprice'] = $maxprice;
        $filterArr['orientation'] = $orientation;
        $filterArr['size'] = $size;
        $filterArr['minheight'] = $minheight;
        $filterArr['maxheight'] = $maxheight;
        $filterArr['minwidth'] = $minwidth;
        $filterArr['maxwidth'] = $maxwidth;
        $filterArr['color'] = $color;
        $filterArr['search'] = $seaech;
        $filterArr['artist_id'] = $ArtistData;

        if(isset($slug) && !empty($slug)){
            $slug = $slug;
        }elseif(isset($catslug) && !empty($catslug)){
           $slug = $catslug;
        }
        $catId = ProductCategoryModel::getCatagoryidByslug($slug);

        $Orientation = OrientationModel::select('*')->get();
        $ColorCode = ColorCodeModel::select('*')->get();
        $Size = SizeModel::select('*')->get();
       
        if(isset($catId) && !empty($catId) && !empty($slug)){
            
            $ProductData = ProductModel::getProdectbyCatagoryID($catId->id,$filterArr);
            //print_r($ProductData);exit;
            $parantcatList = ProductCategoryModel::getParentProductCategorylist();
            $TypeByCatId = CategoryTypeModel::where('categoryid',$catId->id)->with('children')->get();

            $catdata = [];
            foreach($TypeByCatId as $catagoryIds){
                $catsubdata = [];
                if(isset($catagoryIds->id) && !empty($catagoryIds->id)){
                    $subcategory = ProductCategoryModel::with('children')->where('parentcatid',$catId->id)->where('categorytypeid',$catagoryIds->id)->where('isactive', '=', 1)->get();
                    
                    foreach($subcategory as $subcat){
                        $catsubdata[] = $subcat;
                    }
                    $catdata[] = $catsubdata;
                    
                }
            }
            
            $data = [];
            $data['productsArr'] = $ProductData;
            $data['Currentpagename'] = $catId->name;
            $data['CurrentpageUrl'] = $catId->slug;
            $data['catagoryId'] = $catId->id;
            $data['parantcatList'] = $parantcatList;
            $data['catdata'] = $catdata;
            $data['Orientation'] = $Orientation;
            $data['Size'] = $Size;
            $data['ColorCode'] = $ColorCode;
            $data['ArtistDataArr'] = $ProductData;
            if (!Request::ajax()) {
                return view('frontview.product-category-list',$data);
            } else {
                $pagination = (count($ProductData) > 0) ? (string) $ProductData->links('frontview.pagination.pagination') : '';
                $totalpagecount = view('frontview.pagecount')->with($data)->render();
                $returnHTML = view('frontview.product-category-list')->with($data)->render();
                return response()->json(['html' => $returnHTML, 'pagination' => $pagination,'totalpagecount' => $totalpagecount]);
            }
            
        }else{

            $ProductData = ProductModel::getAllProdectList($filterArr);
            $parantcatList = ProductCategoryModel::getParentProductCategorylist();
           
            /*foreach($catList as $catagoryIds){
                if(isset($catagoryIds->parentcatid) && !empty($catagoryIds->parentcatid)){
                    $catagoryArr[] = $catagoryIds->parentcatid;
                }
            }
           // $catagoryArr = array_unique($catagoryArr);
            $cattypeArr = CategoryTypeModel::getCategoryTypeList($catagoryArr);*/
            $catdata['0'] = '';
            $catdata['1'] = '';
            $catdata['2'] = '';
            $data = [];
            $data['productsArr'] = $ProductData;
            $data['Currentpagename'] = 'Paintings for Sale';
            $data['CurrentpageUrl'] = 'products-list';
            $data['parantcatList'] = $parantcatList;
            $data['catdata'] = $catdata;
            $data['Orientation'] = $Orientation;
            $data['Size'] = $Size;
            $data['ColorCode'] = $ColorCode;
            $data['ArtistDataArr'] = $ProductData;
            if (!Request::ajax()) {
                return view('frontview.product-category-list',$data);
            } else {

                $pagination = (count($ProductData) > 0) ? (string) $ProductData->links('frontview.pagination.pagination') : '';
                $totalpagecount = view('frontview.pagecount')->with($data)->render();
                $returnHTML = view('frontview.product-category-list')->with($data)->render();
                return response()->json(['html' => $returnHTML, 'pagination' => $pagination,'totalpagecount' => $totalpagecount]);
            }
            //return view('frontview.product-category-list',$data);
        }
    }

    public function details($alias)
    {
        if(isset($alias) && !empty($alias)){
        $data = [];
        $products = ProductModel::getProdectsdetailsbyId($alias);
        if(isset($products) && !empty($products)){
        $relatedProducts = ProductModel::getSpecialProducts();


        $data['relatedProducts'] = $relatedProducts;
        $data['products'] = $products;
        // print_r($data);exit;
        return view('product-detail',$data);
         }else{
            abort(404);
         }
        }else{
            abort(404);
        }

    }

    public function GlobalserchData($seaech = false)
    {
            $filterArr['search'] = $seaech;
            $ProductData = ProductModel::getAllProdectList($filterArr);
            $catList = ProductCategoryModel::getProductCategorylist();
            $parantcatList = ProductCategoryModel::getParentProductCategorylist();
            $Orientation = OrientationModel::select('*')->get();
            $ColorCode = ColorCodeModel::select('*')->get();
            $Size = SizeModel::select('*')->get();
            foreach($catList as $catagoryIds){
                if(isset($catagoryIds->parentcatid) && !empty($catagoryIds->parentcatid)){
                    $catagoryArr[] = $catagoryIds->parentcatid;
                }
                else{
                    $catagoryArr = "";
                }
            }
            if($catagoryArr){
                $catagoryArr = array_unique($catagoryArr);
                $cattypeArr = CategoryTypeModel::getCategoryTypeList($catagoryArr);
            }else{
                $catagoryArr = '';
                $cattypeArr = '';
            }

            $data = [];
            $catdata['0'] = '';
            $catdata['1'] = '';
            $catdata['2'] = '';
            $data['productsArr'] = $ProductData;
            $data['Currentpagename'] = 'Paintings for Sale';
            $data['CurrentpageUrl'] = 'products-list';
            $data['catListArr'] = $catagoryArr;
            $data['parantcatList'] = $parantcatList;
             $data['catdata'] = $catdata;
            $data['cattypeArr'] = $cattypeArr;
            $data['catList'] = $catList;
            $data['Orientation'] = $Orientation;
            $data['Size'] = $Size;
            $data['seaech'] = $seaech;
            $data['ColorCode'] = $ColorCode;
            return view('frontview.product-category-list',$data);
       
    }

    public function ArtistProdectsList($artist = false,$cat = false)
    {
            $filterArr = [];
            $catId = ProductCategoryModel::getCatagoryidByslug($cat);
            $ArtistData = ArtistModel::getArtistDatabyslug($artist);
            if(isset($ArtistData['id']) && !empty($ArtistData['id'])){
                $filterArr['artist_id'] = $ArtistData['id'];
            }
            if(isset($catId->id) && !empty($catId->id)){
                $ProductData = ProductModel::getProdectbyCatagoryID($catId->id,$filterArr);
            }else{
                $ProductData = ProductModel::getAllProdectList($filterArr);     
            }
            

            
            $catList = ProductCategoryModel::getProductCategorylist();
            $parantcatList = ProductCategoryModel::getParentProductCategorylist();
            $Orientation = OrientationModel::select('*')->get();
            $ColorCode = ColorCodeModel::select('*')->get();
            $Size = SizeModel::select('*')->get();
            foreach($catList as $catagoryIds){
                if(isset($catagoryIds->parentcatid) && !empty($catagoryIds->parentcatid)){
                    $catagoryArr[] = $catagoryIds->parentcatid;
                }
            }
            $catagoryArr = array_unique($catagoryArr);
            $cattypeArr = CategoryTypeModel::getCategoryTypeList($catagoryArr);

            $data = [];
            $catdata['0'] = '';
            $catdata['1'] = '';
            $catdata['2'] = '';
            $data['productsArr'] = $ProductData;
            $data['Currentpagename'] = 'Paintings for Sale';
            $data['CurrentpageUrl'] = 'products-list';
            $data['catListArr'] = $catagoryArr;
            $data['parantcatList'] = $parantcatList;
             $data['catdata'] = $catdata;
            $data['cattypeArr'] = $cattypeArr;
            $data['catList'] = $catList;
            $data['Orientation'] = $Orientation;
            $data['Size'] = $Size;
            if(isset($ArtistData['id']) && !empty($ArtistData['id'])){
                $data['artist_id'] = $ArtistData['id'];
            }
            $data['cat_slug'] = $cat;
            $data['ColorCode'] = $ColorCode;
            return view('frontview.product-category-list',$data);
        
    }
    

}
