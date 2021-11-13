<?php

use Illuminate\Support\Facades\Route;

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
});
// route for seller
Route::group(['middleware' => 'permission:sell'], function() {
    Route::resource('/seller-place',App\Http\Controllers\Seller\placeController::class);
    Route::resource('/seller-service',App\Http\Controllers\Seller\serviceController::class);
});
// route for markiting
Route::group(['middleware' => 'permission:market'], function() {
    Route::resource('/marketing-affiliate',App\Http\Controllers\Marketing\affiliateController::class);
    Route::get('/marketing-affiliate_about',[App\Http\Controllers\Marketing\affiliateController::class,'about'])->name("marketing-affiliate.about");
});
Route::group(['middleware' => 'permission:controll'], function() {
    Route::resource('/dash-board',App\Http\Controllers\Admin\adminController::class);
});

// route for user
// route user profiles
Route::group(['middleware' => 'auth'],function() {
    Route::get('/profile',[App\Http\Controllers\profileController::class,'index'])->name('profile.index');
    Route::get('/profile-edit',[App\Http\Controllers\profileController::class,'edit'])->name('profile.edit');
    Route::put('/profile',[App\Http\Controllers\profileController::class,'update'])->name('profile.update');
    Route::put('/profile-edit-photo',[App\Http\Controllers\profileController::class,'updateImg'])->name('profile.updateImg');
});

// route for anyone


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profiles/{id}', [App\Http\Controllers\profileController::class,'show'])->name('profile.show');
Route::get('/services/{id}',[App\Http\Controllers\Seller\serviceController::class,'show'])->name('services.show');
Route::get('/places/{id}',[App\Http\Controllers\Seller\placeController::class,'show'])->name('places.show');

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
