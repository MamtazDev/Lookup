<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\ProductCategoryModel;
use App\Models\CategoryTypeModel;
use App\Models\OrientationModel;
use App\Models\ArtistModel;
use App\Models\CountryModel;
use App\Helpers\Email_sender;
use Validator;
use DB;
use Redirect;
use Session;
use Cookie;


class ArtistController extends FrontController
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

    public static function newArtistSignupform(){
        $data['countrys'] = CountryModel::all();
        return view('frontview.userauth.artist-login',$data);
    }

    public static function artistInsert(Request $request){
        
        $data = $request->all();

        $messsages = array(
            'firstname.required' => 'Name field is required',
            //'firstname.handle_xss' => 'Please enter valid input',
            'firstname.no_url' => 'URL is not allowed',
            'lastname.required' => 'Last Name field is required',
            //'lastname.handle_xss' => 'Please enter valid input',
            'lastname.no_url' => 'URL is not allowed',
            'email.required' => 'Email is required',
            'phone.required' => 'Phone number field is required',
            'country.required' => 'This field is required',
            'lang.required' => 'This field is required',
            'Professionaltype.required' => 'This field is required',
            'anotherGallery.required' => 'This field is required',
            'Portfolio.required' => 'This field is required',
            //'ans1.required' => 'This field is required',
            
            'Mediums.required' => 'This field is required',
            'pricerang.required' => 'This field is required',
            'solditeam.required' => 'This field is required',
            'solditeammonth.required' => 'This field is required',
            'filename.required' => 'This field is required',
            'ques.required' => 'This field is required',
            'confomaply.required' => 'This field is required',            
        );

        $rules = array(
            'firstname' => 'required',
            'lastname' =>  'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'country' => 'required',
            'lang' => 'required',
            'Professionaltype' => 'required',
            'anotherGallery' => 'required',
            'Portfolio' => 'required',
            //'ans1' => 'required',
            'Mediums' => 'required',
            'pricerang' => 'required',
            'solditeam' => 'required',
            'solditeammonth' => 'required',
            'filename' => 'required',
            // 'filename.*' => 'max:1024',
            'ques' => 'required',
            'confomaply' => 'required',
        );
        $validator = Validator::make($data, $rules, $messsages);
       
        if ($validator->passes()) {
            // print_r($data);exit;
            $Artist = new ArtistModel;
            $Artist->firstname = strip_tags($data['firstname']);
            $Artist->lastname = strip_tags($data['lastname']);
            $Artist->email = strip_tags($data['email']);
            $Artist->phone = $data['phone'];
            $countryid = CountryModel::getCountryidByflagicon($data['country']);
            if(isset($countryid['id']) && !empty($countryid['id'])){
                $countryidData = $countryid['id'];
            }else{
                $countryidData = '';
            }
            $Artist->countryid = $countryidData;
            $Artist->preferred_language = strip_tags($data['lang']);
            if($data['Professionaltype'] == 'Y'){
                $Artist->isfulltimeartist = 'yes';
            }else{
                $Artist->isfulltimeartist = 'no';
            }
            $Artist->experience = $data['SinceYears'];
             if($data['anotherGallery'] == 'Y'){
                $Artist->isrepresentedgallary = 'yes';
            }else{
                $Artist->isrepresentedgallary = 'no';
            }
            $Artist->experience = $data['SinceYears'];

             if($data['Portfolio'] == 'Y'){
                $Artist->onlineportfolio = 'yes';
            }else{
                $Artist->onlineportfolio = 'no';
            }
            // $Artist->bio = $data['ans1'];
            $Artist->updatedcvlink = $data['cvlink'];
            $Artist->mediums = implode(",",$data['Mediums']);
            $Artist->sellingpricerange = implode(",",$data['pricerang']);
            $Artist->soldartworksinlastyear = $data['solditeam'];
            $Artist->artworksproduceinmonth = $data['solditeammonth'];
            $Artist->questions_ans = implode(",",$data['ques']);
            $Artist->isverified = 'Pending';

        if(isset($data['filename']) && !empty($data['filename'])) {
            foreach($data['filename'] as $file)
            {
                $image_name = date('YmdHis') . "." . $file->getClientOriginalExtension();
                $upload_path = 'public/image/artist/';
                $mediaurl = $upload_path.$image_name;
                $file->move($upload_path, $image_name);  
                $imgData[] = $mediaurl;  
            }

         
            $promedia['mediaurl'] = implode('|', $imgData);
        }
            
            $Artist->media = $promedia['mediaurl'];
            $Artist->isactive = 0;
          
           $Artist->save();
         if (!empty($Artist->id)) {
                $recordID = $Artist->id;
                Email_sender::NewArtistRequest($data);
                $thankyouMsg = 'We have received your request, we will get back to you shortly.';
                return redirect()->route('thank-you')->with(['form_submit' => true, 'message' => $thankyouMsg]);
            }else{
                return redirect('/');
            }

        } else {
             
            return Redirect::back()->withErrors($validator)->withInput();
        }
    }

    public static function thankyou(){
       
        return view('frontview.thankyou',['message' => Session::get('message')]);
    }

    public static function ArtistList(Request $request){
        $data = [];
        $Requestdata = $request->all();
        $page = (!empty($request->page) ? $request->page : 1);
         $ArtistData = ArtistModel::getArtistList($Requestdata); 
         $countryArr = CountryModel::getCountryList();
         $data['ArtistDataArr'] = $ArtistData;
         $data['countryArr'] = $countryArr;
         if (!$request->ajax()) {
                 return view('frontview.artist-list',$data);
            } else {

                $pagination = (count($ArtistData) > 0) ? (string) $ArtistData->links('frontview.pagination.pagination') : '';
                $totalpagecount = view('frontview.pagecount')->with($data)->render();
                $returnHTML = view('frontview.artist-list')->with($data)->render();
                return response()->json(['html' => $returnHTML, 'pagination' => $pagination,'totalpagecount' => $totalpagecount]);
            }
       
    }

    public static function artistFilter(Request $request){
         $Requestdata = $request->all();
         $data = [];
         $ArtistData = ArtistModel::getArtistListbyLatter($Requestdata); 
         $data['ArtistDataArr'] = $ArtistData;
         $pagination = (count($ArtistData) > 0) ? (string) $ArtistData->links('frontview.pagination.pagination') : '';
         $totalpagecount = view('frontview.pagecount')->with($data)->render();
         $returnHTML = view('frontview.artist-list')->with($data)->render();
         return response()->json(['html' => $returnHTML, 'pagination' => $pagination,'totalpagecount' => $totalpagecount]);
    }

    Public static function ArtistDetails($slug){
        $ArtistData = ArtistModel::getArtistDatabyslug($slug);
        if($ArtistData){
            $RelatedProdects = ProductModel::getrelatedProductsbyArtiest($ArtistData->id);
            $catIds = [];
            foreach($RelatedProdects as $prodectcat){
                if(!in_array($prodectcat->categoryid, $catIds)){
                    $catIds[] = $prodectcat->categoryid;
                }
            }
            
            $catalist = ProductCategoryModel::getProductCategorylistByIds($catIds);
            $data['ArtistDataArr'] = $ArtistData;
            $data['RelatedProdects'] = $RelatedProdects;
            $data['catalist'] = $catalist;
            return view('frontview.artist-profile',$data);
        }else{
            return "Artists Not Found";
        }
       
    }


}
