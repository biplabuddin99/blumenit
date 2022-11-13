<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Footercol1Controller;
use App\Http\Controllers\Footercol4Controller;
use App\Http\Controllers\HeaderviewController;
use App\Http\Controllers\HomeHeadersupportController;
use App\Http\Controllers\HomeFootersupportController;
use App\Http\Controllers\HomeSection1Controller;
use App\Http\Controllers\HomeSection2Controller;
use App\Http\Controllers\HomeSection3Controller;
use App\Http\Controllers\HomeSection4Controller;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\FootersocialController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AboutUsSettingController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PhoneExtController;
use App\Http\Controllers\CategorySettingController;
use App\Http\Controllers\GamingSettingController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\CorporateSettingsController;

use App\Http\Controllers\Company\CompanyController as company;
use App\Http\Controllers\Header\HeaderController;

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



/********for fronend********/
Route::get('/', [FrontEnd::class, 'index'])->name('front.home');
Route::get('/games', [FrontEnd::class, 'games'])->name('front.games');
Route::get('/category', [FrontEnd::class, 'category'])->name('front.category');
Route::get('/aboutus', [FrontEnd::class, 'aboutus'])->name('front.aboutus');

Route::get('/corporate-business', [FrontEnd::class, 'corporatebusiness'])->name('front.corporate');
Route::post('/corporate-business_inq', [FrontEnd::class, 'corporatebusiness_inq'])->name('front.corporate_inq');

Route::get('/contactus', [FrontEnd::class, 'contactus'])->name('front.contactus');
Route::get('/c/{id}', [FrontEnd::class, 'categoryview'])->name('front.categoryview');
Route::get('/sc/{id}', [FrontEnd::class, 'subcategoryview'])->name('front.subcategoryview');
Route::get('/shopview', [FrontEnd::class, 'shopview'])->name('front.shopview');
Route::get('/product/{id}', [FrontEnd::class, 'product'])->name('front.product');
Route::get('/wishlist', [FrontEnd::class, 'wishlist'])->name('front.wishlist');
Route::get('/search', [FrontEnd::class, 'search'])->name('front.search');
    /* cart */
Route::get('/cart', [CartController::class, 'cartView'])->name('front.cart');
Route::get('/addtocart', [CartController::class, 'addToCart'])->name('front.addcart');
Route::get('/updatecart', [CartController::class, 'updateCart'])->name('front.updateCart');
Route::get('/removecart', [CartController::class, 'removeCart'])->name('front.removeCart');
    /* cart */
    /* checkout */
Route::get('/checkout', [CheckoutController::class, 'index'])->name('front.checkout');
Route::get('/guestcheckout', [CheckoutController::class, 'guest_checkout'])->name('front.guestcheckout');
Route::get('/detailscheckout', [CheckoutController::class, 'details_checkout'])->name('front.detailscheckout');
Route::post('/checkoutaddress', [CheckoutController::class, 'checkout_address'])->name('front.checkoutaddress');
Route::get('/finalcheckout', [CheckoutController::class, 'final_checkout'])->name('front.finalcheckout');

Route::get('/shippingcheck', [CheckoutController::class, 'shippingcheck'])->name('front.shippingcheck');

Route::post('/ordersubmit', [CheckoutController::class, 'order_submit'])->name('front.ordersubmit');
Route::get('/finishorder/{id}', [CheckoutController::class, 'finish_order'])->name('front.finishorder');
    /* checkout */

    /* customer */
Route::get('/signin', [CustomerController::class, 'signin'])->name('front.signin');
Route::post('/signin', [CustomerController::class, 'validsignin'])->name('front.signin.valid');
Route::get('/signup', [CustomerController::class, 'signup'])->name('front.signup');
Route::post('/signup', [CustomerController::class, 'store'])->name('front.signup.store');
Route::get('/signout', [CustomerController::class, 'logout'])->name('front.logout');

Route::get('/wishliststore/{id}', [CustomerController::class, 'wishlist'])->name('front.wishlist.store');
Route::post('/review', [CustomerController::class, 'review'])->name('front.review');

Route::get('/customer_profile', [CustomerController::class, 'cprofile'])->name('front.cprofile');
Route::post('/customer_profileup', [CustomerController::class, 'profileup'])->name('front.customer.profileup');
Route::get('/customer_order_list', [CustomerController::class, 'order_list'])->name('front.corderlist');
Route::get('/customer_invoice/{id}', [CustomerController::class, 'invoice'])->name('front.cinvoice');
    /* customer */


/********for fronend********/

/*for logout*/
Route::get('/logout', [Authcontroller::class, 'logout'])->name('logout');
/*for logout*/

Route::group(['middleware'=>'UnknownUser'],function(){
    Route::get('/adminlogin', [Authcontroller::class, 'adminlogin'])->name('adminlogin');
    Route::post('/adminlogin', [Authcontroller::class, 'adminloginvarify'])->name('signin.varify');
});


/* superadmin group */
Route::group(['middleware'=>'isSuperadmin'],function(){
    Route::prefix('superadmin')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'superadmin'])->name('superadmin.dashboard');

        Route::resource('categoryy', CategoryController::class,['as'=>'superadmin']);
        Route::resource('subcategory', SubCategoryController::class,['as'=>'superadmin']);
        Route::resource('manufacturer', ManufacturerController::class,['as'=>'superadmin']);
        Route::resource('product', ProductController::class,['as'=>'superadmin']);
        Route::resource('slide', SlideController::class,['as'=>'superadmin']);
        Route::resource('admincustomer', AdminCustomerController::class,['as'=>'superadmin']);
        Route::resource('admins', UserController::class,['as'=>'superadmin']);
        Route::resource('country', CountryController::class,['as'=>'superadmin']);
        Route::resource('state', StateController::class,['as'=>'superadmin']);
        Route::resource('city', CityController::class,['as'=>'superadmin']);
        Route::resource('shipping', ShippingController::class,['as'=>'superadmin']);
        Route::resource('phoneext', PhoneExtController::class,['as'=>'superadmin']);

		Route::resource('company', company::class,['as'=>'superadmin']);
        Route::resource('header', HeaderController::class,['as'=>'superadmin']);
        
        

        Route::resource('corporate_setting', CorporateSettingsController::class,['as'=>'superadmin']);
        Route::group(['controller' => CorporateSettingsController::class], function(){
            Route::get('/corporate_setting_inq','inq_list')->name('superadmin.corporate_setting_inq.list');
            Route::get('/corporate_setting_inq/{id}/{status}','update_status')->name('superadmin.corporate_setting_inq.update_status');
        });

        Route::group(['controller' => Authcontroller::class], function(){
            Route::get('/profile', 'profile')->name('superadmin.profile');
            Route::post('/profile_update/{id}','profile_update')->name('superadmin.profile_update');
        });

        /*for Dynamic Frontend */
        Route::resource('headerview', HeaderviewController::class,['as'=>'superadmin']);
        Route::resource('headersupport',HomeHeadersupportController::class,['as'=>'superadmin']);
        Route::resource('footersupport',HomeFootersupportController::class,['as'=>'superadmin']);
        Route::group(['controller' => HomeSection1Controller::class], function(){
            Route::get('/indexsec1', 'index')->name('superadmin.homesec1.index');
            Route::get('/sec1','create')->name('superadmin.homesec1.create');
            Route::post('/sec1','store')->name('superadmin.homesec1.store');
            Route::get('/editsec1','edit')->name('superadmin.homesec1.edit');
            Route::post('/updatesec1/{id}','update')->name('superadmin.homesec1.update');
        });
        Route::group(['controller' => AboutUsSettingController::class], function(){
            Route::get('/editas','edit')->name('superadmin.aboutsetting.edit');
            Route::post('/updateas/{id}','update')->name('superadmin.aboutsetting.update');
        });
        Route::group(['controller' => CategorySettingController::class], function(){
            Route::get('/editcats','edit')->name('superadmin.categorysetting.edit');
            Route::post('/updatecats/{id}','update')->name('superadmin.categorysetting.update');
        });
        Route::group(['controller' => GamingSettingController::class], function(){
            Route::get('/editgame','edit')->name('superadmin.gamesetting.edit');
            Route::post('/updategame/{id}','update')->name('superadmin.gamesetting.update');
        });
        Route::group(['controller' => GeneralSettingController::class], function(){
            Route::get('/editgs','edit')->name('superadmin.gs.edit');
            Route::post('/updategs/{id}','update')->name('superadmin.gs.update');
        });
        Route::group(['controller' => HomeSection2Controller::class], function(){
            Route::get('/indexsec2','index')->name('superadmin.homesec2.index');
            Route::get('/sec2','create')->name('superadmin.homesec2.create');
            Route::post('/sec2','store')->name('superadmin.homesec2.store');
            Route::get('/editsec2','edit')->name('superadmin.homesec2.edit');
            Route::post('/updatesec2/{id}','update')->name('superadmin.homesec2.update');
        });
        Route::group(['controller' => HomeSection3Controller::class], function(){
            Route::get('/indexsec3','index')->name('superadmin.homesec3.index');
            Route::get('/sec3','create')->name('superadmin.homesec3.create');
            Route::post('/sec3','store')->name('superadmin.homesec3.store');
            Route::get('/editsec3','edit')->name('superadmin.homesec3.edit');
            Route::post('/updatesec3/{id}','update')->name('superadmin.homesec3.update');
        });
        Route::group(['controller' => HomeSection4Controller::class], function(){
            Route::get('/indexsec4','index')->name('superadmin.homesec4.index');
            Route::get('/sec4', 'create')->name('superadmin.homesec4.create');
            Route::post('/sec4', 'store')->name('superadmin.homesec4.store');
            Route::get('/editsec4', 'edit')->name('superadmin.homesec4.edit');
            Route::post('/updatesec4/{id}', 'update')->name('superadmin.homesec4.update');
        });
        Route::group(['controller' => Footercol1Controller::class], function(){
            Route::get('/indexfootcol1','index')->name('superadmin.homefootcol1.index');
            Route::get('/footcol1','create')->name('superadmin.homefootcol1.create');
            Route::post('/footcol1','store')->name('superadmin.homefootcol1.store');
            Route::get('/editfootcol1','edit')->name('superadmin.homefootcol1.edit');
            Route::post('/updatefootcol1','update')->name('superadmin.homefootcol1.update');
        });
        Route::group(['controller' => Footercol4Controller::class], function(){
            Route::get('/indexfootcol4', 'index')->name('superadmin.homefootcol4.index');
            Route::get('/footcol4', 'create')->name('superadmin.homefootcol4.create');
            Route::post('/footcol4', 'store')->name('superadmin.homefootcol4.store');
            Route::get('/editfootcol4', 'edit')->name('superadmin.homefootcol4.edit');
            Route::post('/updatefootcol4', 'update')->name('superadmin.homefootcol4.update');
        });
        Route::group(['controller' => FootersocialController::class], function(){
            Route::get('/indexfootsocial','index')->name('superadmin.homefootsocial.index');
            Route::get('/footsocial','create')->name('superadmin.homefootsocial.create');
            Route::post('/footsocial','store')->name('superadmin.homefootsocial.store');
            Route::get('/editfootsocial','edit')->name('superadmin.homefootsocial.edit');
            Route::post('/updatefootsocial','update')->name('superadmin.homefootsocial.update');
        });
         /* Dynamic Frontend */
        /* order */
        Route::group(['controller' => OrderController::class], function(){
            Route::get('/order','index')->name('superadmin.order.index');
            Route::get('/order_show/{id}','show')->name('superadmin.order.show');
            Route::get('/order_edit/{id}','edit')->name('superadmin.order.edit');
            Route::post('/update_order/{id}','update')->name('superadmin.order.update');
            Route::get('/order_delete/{id}','destroy')->name('superadmin.order.delete');
        });
        /* order */
        //  ajaxcalls
        Route::get('/pro_cat', [ProductController::class, 'getcat'])->name('superadmin.product.getcat');
    });
});
