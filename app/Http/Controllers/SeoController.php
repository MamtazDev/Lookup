<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeoModel;
use Illuminate\Support\Arr;
use App\Models\CountryModel;
use App\Models\GlobleSeo;
use App\Models\ProductCategoryModel;
use Redirect,Response;
use App\Helpers\AdminApproveUser;
use DB;
use Hash;


class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        //  $this->middleware('permission:artist-list|artist-create|artist-edit|artist-delete', ['only' => ['index','store']]);
        //  $this->middleware('permission:artist-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:artist-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:artist-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
       $artist = SeoModel::orderBy('id', 'desc')->paginate(50);
       return view('seo.index',compact('artist'));

    }
    
    public function globle(Request $request){
        
        
        $indexing = GlobleSeo::find(1);
         
       
        if($request->input('indexing') == "on"){
            $indexing->status = 1;
        } else {
            $indexing->status = 0;
        }
        
        $sitemap = GlobleSeo::find(2);
        if($request->input('sitemap') == "on"){
            $sitemap->status = 1;
        } else {
            $sitemap->status = 0;
        }
        
        // dd($request);
       
       
       
        $indexing->update();
        $sitemap->update();
        
        
        return redirect()->back()->with('success','SEO Updated Successfully');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategoryModel::with('children')->whereNull('parentcatid')->where('isactive',1)->get();
        $countries = CountryModel::all();

        return view('seo.create',compact('countries','categories'));
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

       $validatedData = $request->validate([
          'firstname' => 'required',
        //   'lastname' =>  'required',
        //    'image' => 'required',
        //    'media' => 'required',
        //   'media.*' => 'max:1024',
        //   'email' => 'required|email|unique:artistmaster,email',
        //   'password' => 'required|confirmed',
        //   'countryid' => 'required',
        //   'isfulltimeartist' => 'required',
        //   'isrepresentedgallary' => 'required',
        //   'onlineportfolio' => 'required',
        //   'updatedcvlink' => 'required|url',
        //   'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:artistmaster,phone',
        //   'experience' => 'required',
        //   'bio' => 'required',
        //   'category' => 'required',
        //   'soldartworksinlastyear' => 'required',
        //   'artworksproduceinmonth' => 'required',
        //   'Commission' => 'required',
       ]);

       $input = $request->all();

       

        if ($image = $request->file('image')) {
            $destinationPath = 'Artist/public/image/profile/';//public_path('') .'/image/artist/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $featured = "$profileImage";
        }else{
            $featured = "";
        }

        if($request->mediums){
            foreach($request->mediums as $file){
                $mediums[] = $file;
            }
        $request['mediums'] = implode(',', $mediums);
        $mediums = $request['mediums'];
        }else{
            $mediums = '';
        }
        if($request->hasFile("media")){
            $files=$request->file("media");
            foreach($files as $file){
                $imageName=time().'_'.$file->getClientOriginalName();
                $upload_path = 'Artist/public/image/artist/';
                $file->move(\public_path("/image/artist"),$imageName);
                $mediaurl = $upload_path.$imageName;
                $imgData[] = $mediaurl;
            }
            $request['mediaurl'] = implode('|', $imgData);
            $mediaurl = $request['mediaurl'];
        }else{
            $mediaurl = "";
        }
        if($request->password){
            $password = Hash::make($input['password']);
        }else{
            $password = "";
        }
        $customer = ArtistModel::create([
          'firstname' => $request->firstname,
          'lastname' => $request->lastname,
          'email' => $request->email,
          'password' => $password,
          'phone' => $request->phone,
          'profileimage' => $featured,
          'mediums' => $mediums,
          'media' => $mediaurl,
          'roleid' => '0',
          'updatedcvlink' => $request->updatedcvlink,
          'isfulltimeartist' => $request->isfulltimeartist,
          'isrepresentedgallary' => $request->isrepresentedgallary,
          'onlineportfolio' => $request->onlineportfolio,
          'soldartworksinlastyear' => $request->soldartworksinlastyear,
          'artworksproduceinmonth' => $request->artworksproduceinmonth,
          'experience' => $request->experience,
          'bio' => $request->bio,
          'sellingpricerange' => '2500',
          'countryid' => $request->countryid,
          'categoryid' => $request->category,
          "slug" => $request->firstname,
          'isverified'=>'Verified',
          'isactive'=> "1",
          'commission'=>$request->Commission,

       ]);
    
        return redirect()->route('seo.index')
            ->with('success', 'Artist created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = SeoModel::find($id);

        return view('seo.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = SeoModel::find($id);
        // $categories = ProductCategoryModel::with('children')->whereNull('parentcatid')->where('isactive',1)->get();
        // $countries = CountryModel::all();
        return view('seo.update',compact('customer','id'));
    }



    public function editverified($id)
    {
        $customer = ArtistModel::find($id);
         return Response::json($customer);
    }

    public function changeIsVerifiedStatus(Request $request)
    {
        $id= $request->id;
        $Password = $this->randomPassword();
        if($request->isverified == 'Verified' && $request->commission){
            $hashed = Hash::make($Password);
            $user = ArtistModel::find($request->id);
            $user->isverified = $request->isverified;
            $user->password = $hashed;
            $user->commission = $request->commission;
            $this->SendConfirmationMailToUser($id,$Password);
            $user->update();
            return response()->json(['success'=>"$request->isverified Status changed successfully.",'status'=>1,'isverify'=>$user->isverified]);
        }
        else{
            $user = ArtistModel::find($request->id);
            $user->isverified = $request->isverified;
            $user->update();
            return response()->json(['success'=>"$request->isverified Status changed successfully.",'status'=>1,'isverify'=>$user->isverified]);
        }
    }
    public function forgotpage(){
        return view('seo.Forgotpasswordpage');
    }

    public function ArtistResentPassword(Request $request)
    {   
        $validatedData = $request->validate([
            'email' => 'required|email',
        ]);
        $Password = $this->randomPassword();
        $hashed = Hash::make($Password);
        $user = ArtistModel::where('email',$request->email)->where('isactive','1')->first();
        if($user){
            $id= $user->id;
            $user->password = $hashed;
            $this->SendConfirmationMailToUser($id,$Password);
            $user->update();
            return redirect("https://lakouphoto.ca/Artist");//->route('login.artist');
            // $thankyouMsg = 'New Password Send To Your Email Address.';
            // return redirect()->route('thank-you')->with(['form_submit' => true, 'message' => $thankyouMsg]);
        }else{
            return back()->with('msg','Email is Not Founded');
        }
    }

    function randomPassword() 
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
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
                 
    //   $this->validate($request, [
    //         'firstname' => 'required',
    //     //     'lastname' => 'required',
    //     //     'email' => 'required|email',
    //     //     'password' => 'confirmed',
    //     //     'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
    //     //     'isfulltimeartist' => 'required',
    //     //   'isrepresentedgallary' => 'required',
    //     //   'onlineportfolio' => 'required',
    //     //   'updatedcvlink' => 'required|url',
    //     //   'experience' => 'required',
    //     //   'bio' => 'required',
    //     //   'category' => 'required',
    //     //   'soldartworksinlastyear' => 'required',
    //     //   'artworksproduceinmonth' => 'required',
    //     //   'Commission' => 'required',
    //     ]);

       $input = $request->all();
      
        $input['title'] = $request->title;
        $input['description'] = $request->description;
        $input['keywords'] = $request->keywords;
        $input['author'] = $request->author;
        
         $user = SeoModel::find($id);
         $user->update($input);

         return redirect()->route('seo.index')
            ->with('success', 'Seo Settings updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ArtistModel::find($id)->delete();

        return redirect()->route('seo.index')
            ->with('success', 'artist deleted successfully.'); 

    }

     public function changeStatus(Request $request)
    {

        $user = ArtistModel::find($request->user_id)->update(['isactive' => $request->status]);
       return response()->json(['success'=>'isactive changed successfully.']);
    }

    public function SendConfirmationMailToUser($id,$Password)
    {

       $UserData = ArtistModel::find($id);
       $UserData['password'] = $Password;
       AdminApproveUser::Signupverification($UserData);
       $thankyouMsg = 'The confirmation request email sent to your entered address.';
       return redirect()->back()->with('signupmessage', $thankyouMsg);
    
 
     
    }
    
}
