<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\MultipleimageController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {


    Route::resource('post', PostController::class);
    Route::resource('tag', TagController::class);



    Route::resource('brand', BrandController::class);
    Route::resource('category', CategoryController::class);
    Route::get('category/setfeatured/{id}', [CategoryController::class, 'setfeatured'])->name('category.setfeatured');
    Route::get('category/removefeatured/{id}', [CategoryController::class, 'removefeatured'])->name('category.removefeatured');
    Route::get('category/setmain_featured/{id}', [CategoryController::class, 'setmain_featured'])->name('category.setmain_featured');
    Route::get('category/removemain_featured/{id}', [CategoryController::class, 'removemain_featured'])->name('category.removemain_featured');
    Route::resource('subcategory', SubcategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('/product/{product}/multipleimage', MultipleimageController::class);
    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
});

require __DIR__ . '/auth.php';
