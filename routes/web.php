<?php

use Illuminate\Support\Facades\Route;
use App\Events\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


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

Route::get('/', function () {
    return view('home');
});
Auth::routes();

// route for Admin
Route::group(['middleware' => 'permission:manage'], function() {
    Route::get('/admin/users/{user_id}/{role_id}', [App\Http\Controllers\Admin\userController::class, 'updateRole'])->name('users.update.role');
    Route::resource('/admin/users',App\Http\Controllers\Admin\userController::class);
    Route::delete('/admin/users-restore/{id}',[App\Http\Controllers\Admin\userController::class,'restore'])->name('admin.users.restore');
    Route::get('/admin/users-role/{role_id}',[App\Http\Controllers\Admin\userController::class,'Role'])->name('admin.users.role');
    Route::get('/admin/users-blacklist',[App\Http\Controllers\Admin\userController::class,'indexTrashed'])->name('admin.users.trashed');
    Route::resource('/categories',App\Http\Controllers\Admin\CategoryController::class);
    Route::put('/categories',[App\Http\Controllers\Admin\CategoryController::class,'update'])->name('categories.update');
    Route::delete('/categories',[App\Http\Controllers\Admin\CategoryController::class,'destroy'])->name('categories.destroy');
    // Route::resource('/admin',App\Http\Controllers\Admin\adminController::class);
    Route::get('/admin/settinge',[App\Http\Controllers\Admin\settingController::class,'index'])->name('admin.setting.index');
    Route::put('/admin/settinge',[App\Http\Controllers\Admin\settingController::class,'update'])->name('admin.setting.update');
    Route::get('/admin/notification',[App\Http\Controllers\Admin\notificationController::class,'index'])->name('admin.notification.index');
    Route::get('/admin/notification-create',[App\Http\Controllers\Admin\notificationController::class,'create'])->name('admin.notification.create');
    Route::post('/admin/notification-create',[App\Http\Controllers\Admin\notificationController::class,'store'])->name('admin.notification.store');
    Route::get('/admin/notification/{id}',[App\Http\Controllers\Admin\notificationController::class,'edit'])->name('admin.notification.edit');
    Route::put('/admin/notification/{id}',[App\Http\Controllers\Admin\notificationController::class,'update'])->name('admin.notification.update');

});
// route for seller
Route::group(['middleware' => 'permission:sell'], function() {
    Route::resource('/seller-place',App\Http\Controllers\Seller\placeController::class);
    Route::resource('/seller-service',App\Http\Controllers\Seller\serviceController::class);
    Route::get('/seller-messages',[App\Http\Controllers\chatController::class,'sellerIndex'])->name('chat.seller.index');
    Route::get('/messages/{service_id}/{user_id}',[App\Http\Controllers\chatController::class,'showSeller'])->name('chat.seller.show');
    Route::post('/send-message/{service_id}/{user_id}',[App\Http\Controllers\chatController::class,'messageSeller'])->name('chat.seller.send');
    Route::put('/messages-read/{service_id}/{user_id}',[App\Http\Controllers\chatController::class,'readSeller'])->name('chat.seller.read');
    Route::put('/seller-affilite-code',[App\Http\Controllers\Marketing\affiliateController::class,'join'])->name('seller.affiliteCode');

});
// route for markiting
Route::group(['middleware' => 'permission:market'], function() {
    Route::resource('/marketing-affiliate',App\Http\Controllers\Marketing\affiliateController::class);
    Route::get('/marketing-affiliate_about',[App\Http\Controllers\Marketing\affiliateController::class,'about'])->name("marketing-affiliate.about");
    Route::get('/marketing-affiliate-sellers',[App\Http\Controllers\Marketing\affiliateController::class,'sellersIndex'])->name("marketing-affiliate.sellers");
});
Route::group(['middleware' => 'permission:controll'], function() {
    Route::resource('/dash-board',App\Http\Controllers\Admin\adminController::class);
    Route::get('/profile',[App\Http\Controllers\profileController::class,'index'])->name('profile.index');
    Route::get('/profile-edit',[App\Http\Controllers\profileController::class,'edit'])->name('profile.edit');
    Route::put('/profile',[App\Http\Controllers\profileController::class,'update'])->name('profile.update');
    Route::put('/profile-edit-photo',[App\Http\Controllers\profileController::class,'updateImg'])->name('profile.updateImg');
    Route::get('/admin/financial',[App\Http\Controllers\financialController::class,'index'])->name('financial.index');

});

// route for user
// route user profiles
Route::group(['middleware' => 'auth'],function() {
    Route::post('/services-favorit/{id}',[App\Http\Controllers\User\serviceController::class,'createFavorit'])->name('services-favorit.create');
    Route::delete('/services-favorit/{id}',[App\Http\Controllers\User\serviceController::class,'destroyFavorit'])->name('services-favorit.destoy');
    Route::get('/notification',[App\Http\Controllers\User\notificationController::class,'index'])->name('notification.index');
    Route::post('/send-message/{service_id}',[App\Http\Controllers\chatController::class,'message'])->name('chat.send');
    Route::get('/messages',[App\Http\Controllers\chatController::class,'index'])->name('chat.index');
    Route::get('/messages/{service_id}',[App\Http\Controllers\chatController::class,'show'])->name('chat.service');
    Route::put('/messages-read/{service_id}',[App\Http\Controllers\chatController::class,'read'])->name('chat.read');
    Route::put('/notification-read/{count}',[App\Http\Controllers\User\notificationController::class,'read'])->name('notification.read');
});

// route for anyone


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profiles/{id}', [App\Http\Controllers\profileController::class,'show'])->name('profile.show');
Route::get('/services/{id}',[App\Http\Controllers\Seller\serviceController::class,'show'])->name('services.show');
Route::get('/places/{id}',[App\Http\Controllers\Seller\placeController::class,'show'])->name('places.show');
Route::get('/services',[App\Http\Controllers\User\serviceController::class,'index'])->name('services.index');

Route::get('/services-favorit',[App\Http\Controllers\User\serviceController::class,'indexFavorit'])->name('services-favorit.index');
// Route::get('/places',[App\Http\Controllers\Seller\placeController::class,'show'])->name('places.show');
// Route::get('/profiles', [App\Http\Controllers\profileController::class,'show'])->name('profile.show');

Route::get('/clear-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    return "All cache cleared";
});

Route::get('/storage-link', function() {
    Artisan::call('storage:link');
    return "storage link success";
});
// Route::get('/markiting',[App\Http\Controllers\Matrketing\affiliateController::class,'index'])->name('market.index');
// Route::get('/test',[App\Http\Controllers\Matrketing\affiliateController::class,'test'])->name('market.test');
Route::post('affiliate/{affiliate_tag}', [App\Http\Controllers\Marketing\affiliateController::class,'setCookies'])->middleware('throttle:30,1');
Route::get('affiliate/{affiliate_tag}', [App\Http\Controllers\Marketing\affiliateController::class,'redirect'])->middleware('throttle:30,1');
