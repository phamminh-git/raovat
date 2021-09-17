<?php

use App\Http\Controllers\Admin\UserManageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\User\UserArticleController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('homePage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=> 'admin', 'middleware' => ['auth', 'role:admin']], function(){
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');
    Route::get('/users', [UserManageController::class, 'index'])->name('admin.manageUser');
    Route::get('/users/{user}/block', [UserManageController::class, 'blockUser'])->name('admin.blockUser');
    Route::get('/users/{user}/unblock', [UserManageController::class, 'unblockUser'])->name('admin.unblockUser');
});

Route::group(['prefix'=> 'user', 'middleware' => ['auth', 'checkBlockUser', 'role:user']], function(){
    Route::resource('articles', UserArticleController::class)->names('userArticle');
    Route::post('/upload-thumbnail', [UserArticleController::class, 'uploadImage']);
});

Route::resource('articles', HomeArticleController::class)->names('homeArticle');

Route::get('resource/categories', [CategoryController::class, 'index'])->name('getCategoriesResource');

Route::get('/location/provinces', [LocationController::class, 'getProvinces'])->name('getProvinces');
Route::get('/location/province/{province}/districts', [LocationController::class, 'getDistricts'])->name('getDistricts');
Route::get('/location/district/{district}/wards', [LocationController::class, 'getWards'])->name('getWards');
