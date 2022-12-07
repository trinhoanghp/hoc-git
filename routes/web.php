<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['prefix'=>''],function(){
    Route::get('/',[HomeController::class,'index'])->name('home.index');
    Route::get('/about',[HomeController::class,'about'])->name('home.about');
    Route::get('/login',[HomeController::class,'login'])->name('home.login');
    Route::post('/login',[HomeController::class,'check_login'])->name('home.login');
    Route::get('/logout',[HomeController::class,'logout'])->name('home.logout');

    Route::get('/register',[HomeController::class,'register'])->name('home.register');
    Route::get('/account',[HomeController::class,'account'])->name('home.account')->middleware('customer');

    Route::get('/productdetail',[HomeController::class,'productdetail'])->name('home.productdetail');

});

Route::get('admin/login',[AdminController::class,'login'])->name('admin.login');
Route::post('admin/login',[AdminController::class,'check_login']);

Route::group(['prefix'=>'admin','middleware'=> 'auth'],function(){
    Route::get('',[AdminController::class,'index'])->name('admin.index');
    Route::get('logout',[AdminController::class,'logout'])->name('admin.logout');
    // Route::get('category',[CategoryController::class,'index'])->name('category.index');
    // Route::post('category',[CategoryController::class,'addcategory'])->name('category.add');
    // Route::delete('category/{category}',[CategoryController::class,'delete'])->name('category.delete');

    // Route::get('category/{category}/edit',[CategoryController::class,'edit'])->name('category.edit');
    // Route::put('category/{category}/update',[CategoryController::class,'update'])->name('category.update');

    Route::resources([
        'category' => CategoryController::class,
        'product' => ProductController::class,
    ]);

});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

