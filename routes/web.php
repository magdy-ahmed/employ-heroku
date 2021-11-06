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

// Route::get('/admin', [App\Http\Controllers\User\userController::class, 'index'])->name('users.index');
Route::resource('/user',App\Http\Controllers\Tags::class);
Route::group(['middleware' => 'role:admin'], function() {
    Route::get('/admin/users/{user_id}/{role_id}', [App\Http\Controllers\User\userController::class, 'updateRole'])->name('users.update.role');
    Route::resource('/admin/users',App\Http\Controllers\User\userController::class);
    Route::resource('/admin',App\Http\Controllers\Admin\adminController::class);
    Route::resource('/categories',App\Http\Controllers\Category\CategoryController::class);
    Route::put('/categories',[App\Http\Controllers\Category\CategoryController::class,'update'])->name('categories.update');
    Route::delete('/categories',[App\Http\Controllers\Category\CategoryController::class,'destroy'])->name('categories.destroy');
    // Route::get('/profile/{user_name}',[App\Http\Controllers\Category\CategoryController::class,'home'])->name('profile.home');

});
Route::group(['middleware' => 'auth'],function() {
    Route::get('/profile',[App\Http\Controllers\Profile\profileController::class,'index'])->name('profile.index');
    Route::get('/profile-edit',[App\Http\Controllers\Profile\profileController::class,'edit'])->name('profile.edit');
    Route::put('/profile',[App\Http\Controllers\Profile\profileController::class,'update'])->name('profile.update');
    Route::put('/profile-edit-photo',[App\Http\Controllers\Profile\profileController::class,'updateImg'])->name('profile.updateImg');

});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'],function() {
    Route::get('/profile',[App\Http\Controllers\Profile\profileController::class,'index'])->name('profile.index');
    Route::get('/profile-edit',[App\Http\Controllers\Profile\profileController::class,'edit'])->name('profile.edit');
    Route::put('/profile',[App\Http\Controllers\Profile\profileController::class,'update'])->name('profile.update');
    Route::put('/profile-edit-photo',[App\Http\Controllers\Profile\profileController::class,'updateImg'])->name('profile.updateImg');

});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/clear-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    return "All cache cleared";
});
