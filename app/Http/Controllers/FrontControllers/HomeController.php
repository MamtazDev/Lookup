<?php
namespace App\Http\Controllers\FrontControllers;
use Illuminate\Http\Request;

// use Request;
use App\Models\UserLogin;
use App\Models\ProductCategoryModel;
use App\Models\CategoryTypeModel;
use App\Models\OrientationModel;
use App\Models\ColorCodeModel;
use App\Models\SizeModel;
use App\Models\ProductModel;
use App\Models\BannerModel;
use App\Models\ArtistModel;
use App\Models\CmsModel;
use App\Models\BlogModel;
use App\Models\BlogcategoryModel;
use App\Models\LeavecommentModel;
use App\Models\CurrencyModel;
use Validator;
use Session;
use Redirect;
use Hash;
use DB;


class HomeController extends FrontController {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        parent::__construct();
    }

    public static function index(){
       
        $data = [];
        $prodectData = ProductModel::getFeaturedList();
        $prodectLatestData = ProductModel::getLatestList();
        $prodectbestseller = ProductModel::getbestsellerList();
        $ProductCategory = ProductCategoryModel::getProductCategorylistforhome();
        $SpecialProducts = ProductModel::getSpecialProducts();
        $bannerData = BannerModel::gethomebanners();   
        $ArtistData = ArtistModel::all();   
        $cms = CmsModel::all();  
        $blog = BlogModel::all();  
        $blogcategory = BlogcategoryModel::all();  
        $CurrencyModel = CurrencyModel::get();
        
      
        $data['prodectsArr'] = $prodectData;
        $data['ProdectLatestDataArr'] = $prodectLatestData;
        $data['ProductCategoryArr'] = $ProductCategory;
        $data['SpecialProductsArr'] = $SpecialProducts;
        $data['bannerData'] = $bannerData;
        $data['ArtistDataArr'] = $ArtistData;
        $data['prodectbestseller'] = $prodectbestseller;
        $data['cms'] = $cms;
        $data['blog'] = $blog;
        $data['blogcategory'] = $blogcategory;
        return view('frontview.index',$data);
    }

   

    public static function contactUs(){
        return view('frontview.contact-us');
    }

    public static function AboutUs(){
        $cms = CmsModel::all();
        $data['cms'] = $cms;
        return view('frontview.about-us',$data);
    }
   public function leavecomment(Request $request){
        // dd($request->all());
        $leavecomment = new LeavecommentModel;
        $leavecomment->name = $request->author;
        $leavecomment->email = $request->email;
        $leavecomment->comment = $request->comment_text;
        $leavecomment->blog_id = $request->blog_id;
        $leavecomment->save();
        return redirect()->back();

   }
    public static function blogs(){
        $data = [];
        $prodectData = ProductModel::getFeaturedList();
        $prodectLatestData = ProductModel::getLatestList();
        $prodectbestseller = ProductModel::getbestsellerList();
        $ProductCategory = ProductCategoryModel::getProductCategorylistforhome();
        $SpecialProducts = ProductModel::getSpecialProducts();
        $bannerData = BannerModel::gethomebanners();   
        $ArtistData = ArtistModel::getArtistForhomepage(); 
        $cms = CmsModel::all();  
        $blog = BlogModel::all();  
        // $blog = BlogModel::paginate(2); 
        // dd($blog);
             
         
        $blogcategory = BlogcategoryModel::all();  
        
       
        $data['prodectsArr'] = $prodectData;
        $data['ProdectLatestDataArr'] = $prodectLatestData;
        $data['ProductCategoryArr'] = $ProductCategory;
        $data['SpecialProductsArr'] = $SpecialProducts;
        $data['bannerData'] = $bannerData;
        $data['ArtistDataArr'] = $ArtistData;
        $data['prodectbestseller'] = $prodectbestseller;
        $data['cms'] = $cms;
        $data['blog'] = $blog;
        $data['blogcategory'] = $blogcategory;
        return view('frontview.blogs',$data);
    }
    public static function BlogDetails(){
        // return view('frontview.about-us');
        $data = CmsModel::all();
        // return view('frontview.blog-detail',['data'=>$data]);
        return view('frontview.blog-detail');
        // return view('dynamic');
    }
    public static function getBlogDetails($id){
        $blog = BlogModel::find($id);  
        // $leavecomment = LeavecommentModel::all();
        $leavecomment = LeavecommentModel::where('blog_id',$id)->get();
        // dd($leavecomment);  
        return view('frontview.blog-detail',compact('blog','leavecomment'));
        // return view('frontview.blog-detail');
        // return view('dynamic');
    }

    public static function privacyRedirect(){
        $cms = CmsModel::all();
        $data['cms'] = $cms;
   
     return view('privacy',$data);
    }

    public static function termsRedirect(){
    $cms = CmsModel::all();
        $data['cms'] = $cms;
     return view('terms',$data);
    }

    public static function contactUsInsert(){
     print_r('tests');exit;   
    }


}
