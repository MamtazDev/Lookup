<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller;
use Request;
use App\Models\ProductModel;
use App\Models\ProductCategoryModel;
use App\Models\CategoryTypeModel;
use App\Models\CurrencyModel;
use App\Models\OrientationModel;
use App\Models\ColorCodeModel;
use App\Models\SizeModel;
use App\Models\ProductFrameModel;
use App\Models\ArtistModel;
use App\Models\ProductMediaModel;
use Redirect,Response;
use DB;


class ProductController extends FrontController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         parent::__construct();
    }

    public function index()
    {
       $data = ProductModel::orderBy('id','DESC')->paginate(5);
       return view('product-detail.blade.php');
    }

    public function details($alias)
    {

        if(isset($alias) && !empty($alias)){
        $data = [];
        $products = ProductModel::getProdectsdetailsbyId($alias);
        
        if(isset($products) && !empty($products)){
        $ignoeids[] = $products['id'];
        $relatedProducts = ProductModel::getrelatedProductsbyArtiest($products['artistid'],$ignoeids);
        $prodectimages  = ProductModel::getProdectsImages($products['id']);
        $ProductCategoryData = ProductCategoryModel::getProductCategoryByIds($products['categoryid']);
        $ProdectsReview  = ProductModel::getProdectsReview($products['id']);
        $productsbrands = ProductModel::getProdectsbrands($products['brandid']);
        $productsFrames = ProductFrameModel::getProdectsFrame($products['id']);
        $ratingCount = '';
        $ReviewCount = 0;
        $productSizes = ProductMediaModel::where('productid',$products['id'])->get();
        foreach($ProdectsReview as $Review){
            $ratingCount = (int)$Review->rating + (int)$ratingCount;
            $ReviewCount++;
        }
        if((int)$ratingCount != 0 && (int)$ReviewCount != 0){
            $RatingData = (int)$ratingCount/(int)$ReviewCount;
        }else{
            $RatingData = 0;
        }
        $currencies = CurrencyModel::get();

        $data['relatedProducts'] = $relatedProducts;
        $data['products'] = $products;
        $data['prodectimages'] = $prodectimages;
        $data['ReviewCount'] = $ReviewCount;
        $data['RatingData'] = $RatingData;
        $data['productsbrands'] = $productsbrands;
        $data['productsFrames'] = $productsFrames;
        $data['ProductCategoryData'] = $ProductCategoryData;
        $data['currencies'] = $currencies;
        $data['productSizes'] = $productSizes;
        
        if($products->artists){
            $artists = ArtistModel::find($products->artists);
            $data['country'] = $artists[0]->country;
        }
        // return $productSizes;

        return view('frontview.product-detail',$data);
         }else{
            abort(404);
         }
        }else{
            abort(404);
        }

    }

    public function quickview($alias)
    {
       if(isset($alias) && !empty($alias)){
        $data = [];
        $products = ProductModel::getProdectsdetailsbyId($alias);
        
        if(isset($products) && !empty($products)){
        $ignoeids[] = $products['id'];
        $relatedProducts = ProductModel::getrelatedProductsbyArtiest($products['artistid'],$ignoeids);
        $prodectimages  = ProductModel::getProdectsImages($products['id']);
        $ProdectsReview  = ProductModel::getProdectsReview($products['id']);
        $productsbrands = ProductModel::getProdectsbrands($products['brandid']);
        $ratingCount = '';
        $ReviewCount = 0;
        foreach($ProdectsReview as $Review){
            $ratingCount = (int)$Review->rating + (int)$ratingCount;
            $ReviewCount++;
        }
        if((int)$ratingCount != 0 && (int)$ReviewCount != 0){
            $RatingData = (int)$ratingCount/(int)$ReviewCount;
        }else{
            $RatingData = 0;
        }
        $data['relatedProducts'] = $relatedProducts;
        $data['products'] = $products;
        $data['prodectimages'] = $prodectimages;
        $data['ReviewCount'] = $ReviewCount;
        $data['RatingData'] = $RatingData;
        $data['productsbrands'] = $productsbrands;
        // print_r($data);exit;
        $returnHTML = view('frontview.quick-view')->with($data)->render();
        return response()->json(['html' => "$returnHTML"]);
         }else{
            abort(404);
         }
        }else{
            abort(404);
        }

    }

    public function addReview(){
        $data = Request::all();
        if(!empty($data)){
            $id = DB::table('reviewsmaster')->insertGetId(
            ['productid' => $data['prodectid'],'name' => $data['name'],'review' => $data['review'],'rating' =>$data['rating']]
        );
            return $id;
        }else{
            return false;
        }
    }

}
