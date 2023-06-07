<?php



use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;

use App\Http\Controllers\AdminUsers;

use App\Http\Controllers\PermissionController;

use App\Http\Controllers\RoleController;

use App\Http\Controllers\SeoController;

use App\Http\Controllers\CountryController;

use App\Http\Controllers\ProductCategoryController;

use App\Http\Controllers\CategoryTypeController;

use App\Http\Controllers\FramesController;

use App\Http\Controllers\SizeController;

use App\Http\Controllers\OrientationController;

use App\Http\Controllers\ColorCodeController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\ArtistController;

use App\Http\Controllers\BannerController;

use App\Http\Controllers\WithdrawRequestController;

use App\Http\Controllers\BrandController;

use App\Http\Controllers\OrderController;

use App\Http\Controllers\CurrencyController;

use App\Http\Controllers\CollectionController;

use App\Http\Controllers\FrontControllers\MyaccountController;

use App\Http\Controllers\CmsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogcategoryController;
use App\Http\Controllers\LeavecommentController;




















/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/






Route::get('/', 'App\Http\Controllers\FrontControllers\HomeController@index');

Route::get('/homepage', 'App\Http\Controllers\FrontControllers\HomeController@index');

Route::get('/userlogin', 'App\Http\Controllers\FrontControllers\UserLoginController@index');

Route::get('/userlogout', 'App\Http\Controllers\FrontControllers\UserLoginController@logout');

Route::get('/newregister', 'App\Http\Controllers\FrontControllers\UserLoginController@newregister');

Route::post('/user/signup', 'App\Http\Controllers\FrontControllers\UserLoginController@newSignup');

Route::post('/user/signin', 'App\Http\Controllers\FrontControllers\UserLoginController@newSignin');

Route::any('/product-cat/{slug}', 'App\Http\Controllers\FrontControllers\ProductCategoryController@index');

Route::any('/products-list', 'App\Http\Controllers\FrontControllers\ProductCategoryController@index');

Route::get('product-detail/{param?}', 'App\Http\Controllers\FrontControllers\ProductController@details')->where('param', '(.*)');

Route::post('/addReview', 'App\Http\Controllers\FrontControllers\ProductController@addReview');

Route::get('/varifyemail/{tokan}', 'App\Http\Controllers\FrontControllers\UserLoginController@varifyemail');

Route::get('/forgotpassword', 'App\Http\Controllers\FrontControllers\UserLoginController@forgotpassword');

Route::post('/resetpassword', 'App\Http\Controllers\FrontControllers\UserLoginController@resetpasswordemail');

Route::get('/change-password/{tokan}/{id}', 'App\Http\Controllers\FrontControllers\UserLoginController@changepassword')->name('change-password-route');

Route::post('/passwordchange', 'App\Http\Controllers\FrontControllers\UserLoginController@passwordchange');

Route::post('/check_email_exist', 'App\Http\Controllers\FrontControllers\UserLoginController@checkEmailExist');

Route::get('/profile-changepassword', 'App\Http\Controllers\FrontControllers\UserLoginController@profileChangepassword');



Route::post('/seo/{id}/edit', 'App\Http\Controllers\SeoController@edit');

Route::post('/addcart', 'App\Http\Controllers\FrontControllers\CartController@Addcart');

Route::post('/removefromcart', 'App\Http\Controllers\FrontControllers\CartController@RemoveFromCart');

Route::post('/Addwishlist', 'App\Http\Controllers\FrontControllers\UserLoginController@Addwishlist');

Route::get('/newartist/signup', 'App\Http\Controllers\FrontControllers\ArtistController@newArtistSignupform');

Route::post('/artist-form/insert', 'App\Http\Controllers\FrontControllers\ArtistController@artistInsert');

Route::get('/thank-you', 'App\Http\Controllers\FrontControllers\ArtistController@thankyou')->name('thank-you');

Route::any('/artist-list', 'App\Http\Controllers\FrontControllers\ArtistController@ArtistList');

Route::get('/artist-details/{slug}', 'App\Http\Controllers\FrontControllers\ArtistController@ArtistDetails');

Route::get('/CollectionController/action/{value}', 'App\Http\Controllers\FrontControllers\CollectionController@action')->name('CollectionController.action');

Route::get('/collection/{slug}', 'App\Http\Controllers\FrontControllers\CollectionController@Collection');

Route::get('/collection-details/{slug}', 'App\Http\Controllers\FrontControllers\CollectionController@CollectionDetails');

Route::get('/collections-list', 'App\Http\Controllers\FrontControllers\CollectionController@getAllCollections');

Route::get('/shopping-cart', 'App\Http\Controllers\FrontControllers\CartController@getCartList');

Route::post('/Removefromwishlist', 'App\Http\Controllers\FrontControllers\UserLoginController@Removefromwishlist');

Route::get('/wish-list', 'App\Http\Controllers\FrontControllers\UserLoginController@GetWishList');

Route::post('/artistFilter', 'App\Http\Controllers\FrontControllers\ArtistController@artistFilter');

Route::get('/shoppingaddress', 'App\Http\Controllers\FrontControllers\UserLoginController@ShoppingAddress');

Route::get('/addnewaddress', 'App\Http\Controllers\FrontControllers\UserLoginController@AddNewAddressview');

Route::post('/getStatelist', 'App\Http\Controllers\FrontControllers\UserLoginController@getStatelist');

Route::post('/shopping-address/insert', 'App\Http\Controllers\FrontControllers\UserLoginController@InsertNewAddress');

Route::post('/removeShoppingAddress', 'App\Http\Controllers\FrontControllers\UserLoginController@removeShoppingAddress');

Route::get('/{id}/editshoppingaddress', 'App\Http\Controllers\FrontControllers\UserLoginController@editshoppingaddress');

Route::post('/updatequantitycart', 'App\Http\Controllers\FrontControllers\CartController@updatequantitycart');

Route::post('/updatequantitycartmin', 'App\Http\Controllers\FrontControllers\CartController@updatequantitycartmin');

Route::get('/contact-us', 'App\Http\Controllers\FrontControllers\HomeController@contactUs');

Route::get('/about-us', 'App\Http\Controllers\FrontControllers\HomeController@AboutUs');
Route::get('/blogs', 'App\Http\Controllers\FrontControllers\HomeController@blogs');

Route::get('/blog-detail', 'App\Http\Controllers\FrontControllers\HomeController@BlogDetails');
Route::get('/blog-detail/{id}', 'App\Http\Controllers\FrontControllers\HomeController@getBlogDetails');

Route::post('/contect-us/insert', 'App\Http\Controllers\FrontControllers\HomeController@contactUsInsert');



Route::post('/leavecomment', 'App\Http\Controllers\FrontControllers\HomeController@leavecomment');

Route::post('/addorder', 'App\Http\Controllers\FrontControllers\OrderController@addorder');

Route::get('/orderhistory', 'App\Hattp\Controllers\FrontControllers\OrderController@orderhistory');

Route::post('/checkstock', 'App\Http\Controllers\FrontControllers\CartController@checkstock');

Route::post('/orderfilter', 'App\Http\Controllers\FrontControllers\OrderController@orderfilter');

Route::get('/order-details/{id}', 'App\Http\Controllers\FrontControllers\OrderController@getOrderDetails');

Route::get('/return-request/{id}', 'App\Http\Controllers\FrontControllers\OrderController@ReturnRequest');

Route::post('/checkEmailExistSubscribe', 'App\Http\Controllers\FrontControllers\FrontController@checkEmailExistSubscribe');

Route::post('/Newslette/insert', 'App\Http\Controllers\FrontControllers\FrontController@NewsletterInsert');

Route::get('/Newslette/subscribe/{tokan}/{id}', 'App\Http\Controllers\FrontControllers\FrontController@Newslettersubscribe');

Route::post('/contactus', 'App\Http\Controllers\FrontControllers\UserLoginController@contactus');



Route::post('/return-email', 'App\Http\Controllers\FrontControllers\OrderController@ReturnMail');

Route::any('/search-list/{serchdata}', 'App\Http\Controllers\FrontControllers\ProductCategoryController@GlobalserchData');

Route::post('/filterdata', 'App\Http\Controllers\FrontControllers\ProductCategoryController@filterdata');

Route::post('/globleseoupdate', 'App\Http\Controllers\SeoController@globle')->name('globle.seoupdate');

Route::any('artist-products/{artistslug}/{cat}', 'App\Http\Controllers\FrontControllers\ProductCategoryController@ArtistProdectsList');

Route::get('/sitemap.xml', function(){
    $indexing = \App\Models\GlobleSeo::find(2);
    if($indexing->status == 1){
        return view('sitemap')->withHeaders([
            'Content-Type' => 'text/xml'
        ]);
    } else {
        echo "The page is currently disabled or unavailable  !";
    }
});


// Route::get('property-detail/{param?}', ['uses' => 'Powerpanel\Properties\Controllers\PropertiesController@detail'])->where('param', '(.*)');



Route::get('/admin', function () {
    return view('auth.login');
});







Route::post('store-customer', [CustomerController::class, 'store']);

Route::post('customer/{id}', 'App\Http\Controllers\CustomerController@update');



// Route::get('/dashboard', function () {

//     return view('dashboard');

// })->middleware(['auth'])->name('dashboard');



Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'Counters'])->name('dashboard');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Auth::routes();



require __DIR__.'/auth.php';

Route::post('cattypebyid', [ProductCategoryController::class, 'GetCatTypes'])->name('cattypebyid');

Route::post('producttypebyid', [ProductController::class, 'GetProductTypeandSub'])->name('producttypebyid');

Route::post('subcolbyparent', [ProductController::class, 'GetProductColSub'])->name('subcolbyparent');

Route::post('producttypebyidedit', [ProductController::class, 'GetProductTypeandSubUpdate'])->name('producttypebyidedit');

Route::post('productcoledit', [ProductController::class, 'GetProductColSubUpdate'])->name('productcoledit');





Route::post('categorytypebyidedit', [ProductCategoryController::class, 'GetCatTypeEdit'])->name('categorytypebyidedit');

Route::post('collectionedit', [CollectionController::class, 'GetCollectionEdit'])->name('collectionedit');



Route::post('customerchangestatus', [CustomerController::class, 'changeStatus'])->name('customerchangestatus');

Route::post('artistchangestatus', [ArtistController::class, 'changeStatus'])->name('artistchangestatus');

Route::post('adminchangestatus', [AdminUsers::class, 'changeStatus'])->name('adminchangestatus');

Route::post('categorychangestatus', [ProductCategoryController::class, 'changeStatus'])->name('categorychangestatus');

Route::post('bannerchangestatus', [BannerController::class, 'changeStatus'])->name('bannerchangestatus');
Route::post('blogchangestatus', [BlogController::class, 'changeStatus'])->name('blogchangestatus');
Route::post('blogcategorychangestatus', [BlogcategoryController::class, 'changeStatus'])->name('blogcategorychangestatus');




Route::post('categorytypechangestatus', [CategoryTypeController::class, 'changeStatus'])->name('categorytypechangestatus');

Route::post('frameschangestatus', [FramesController::class, 'changeStatus'])->name('frameschangestatus');

Route::post('sizeschangestatus', [SizeController::class, 'changeStatus'])->name('sizeschangestatus');

Route::post('orientationchangestatus', [OrientationController::class, 'changeStatus'])->name('orientationchangestatus');

Route::post('colorcodeschangestatus', [ColorCodeController::class, 'changeStatus'])->name('colorcodeschangestatus');

Route::post('productchangestatus', [ProductController::class, 'changeStatus'])->name('productchangestatus');

Route::post('brandchangestatus', [BrandController::class, 'changeStatus'])->name('brandchangestatus');

Route::post('collectionchangestatus', [CollectionController::class, 'changeStatus'])->name('collectionchangestatus');

Route::get('/editverified/{id}/edit', 'App\Http\Controllers\ArtistController@editverified')->name('verify.edit');

Route::get('/quickview/{id}/view', 'App\Http\Controllers\FrontControllers\ProductController@quickview')->name('quick.view');

Route::get('/editwithdraw/{id}/{created_at}/edit', 'App\Http\Controllers\WithdrawRequestController@editwithdraw')->name('withdraw.edit');

Route::post('artistisverified', [ArtistController::class, 'changeIsVerifiedStatus'])->name('artistisverified');
Route::post('ArtistResentPassword', [ArtistController::class, 'ArtistResentPassword'])->name('ArtistResentPassword');
Route::get('artist/forgot/passsword', [ArtistController::class, 'forgotpage'])->name('forgotpage');

Route::post('withdrawstatus', [WithdrawRequestController::class, 'changeWithdrawStatus'])->name('withdrawstatus');

Route::post('orderstatusupdate', [OrderController::class, 'changeOrderStatus'])->name('orderstatusupdate');

Route::post('Addfeatured', 'App\Http\Controllers\ProductController@Addfeatured')->name('Addfeatured');

Route::post('Removefeatured', 'App\Http\Controllers\ProductController@Removefeatured')->name('Removefeatured');

Route::post('addBestSeller', 'App\Http\Controllers\ProductController@AddBestSeller')->name('addBestSeller');

Route::post('removeBestSeller', 'App\Http\Controllers\ProductController@RemoveBestSeller')->name('removeBestSeller');

Route::get('/terms-conditions', 'App\Http\Controllers\FrontControllers\HomeController@termsRedirect');

Route::get('/privacy-policy', 'App\Http\Controllers\FrontControllers\HomeController@privacyRedirect');

Route::resource('myaccount', MyaccountController::class);







Route::group(['middleware' => ['auth']], function() {

    Route::resource('adminusers', AdminUsers::class);

    Route::resource('role', RoleController::class);

    Route::resource('permission', PermissionController::class);

    Route::resource('customer', CustomerController::class);

    Route::resource('product-category', ProductCategoryController::class);

    Route::resource('category-type', CategoryTypeController::class);

    Route::resource('frames', FramesController::class);

    Route::resource('size', SizeController::class);

    Route::resource('orientation', OrientationController::class);

    Route::resource('colors', ColorCodeController::class);

    Route::resource('product', ProductController::class); 

    Route::resource('artist', ArtistController::class);
    
    Route::resource('seo', SeoController::class);

    Route::resource('banner', BannerController::class);

    Route::resource('withdraw', WithdrawRequestController::class);

    Route::resource('brand', BrandController::class);

    Route::resource('order', OrderController::class);

    Route::resource('currency', CurrencyController::class);  

    Route::resource('collections', CollectionController::class);  

    Route::resource('cms',CmsController::class);

    Route::resource('blog',BlogController::class);
    Route::resource('blogcategory',BlogcategoryController::class);



});




// Route::get('/getAllPermission','PermissionController@getAllPermissions');

// Route::get('country', [CountryController::class, 'index']);