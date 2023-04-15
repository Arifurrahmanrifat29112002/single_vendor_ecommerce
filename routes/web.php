<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

Route::get('/',[HomeController::class,'index']); //redirect resource>view>frontend>userHome.blade.php

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {return view('admin.home');})->name('dashboard');

    /**
     * category controller
     */
    Route::controller(CategoryController::class)->group(function () {
        Route::get('create/category/', 'create')->name('category.create');
        Route::post('create/category/', 'store')->name('category.store');
        Route::get('edit/category/{id}', 'edit')->name('category.edit');
        Route::post('edit/category/{id}', 'update')->name('category.update');
        Route::get('destroy/category/{id}', 'destroy')->name('category.destroy');
    });
    /**
     * product controller
     */
    Route::controller(ProductController::class)->group(function () {
        Route::get('create/product/', 'create')->name('product.create');
    });
});

/**
 * /redirect
 */
Route::get('/redirect',[HomeController::class,'redirect']);//dashbord main page
