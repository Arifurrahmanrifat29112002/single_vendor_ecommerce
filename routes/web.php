<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
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
        Route::post('create/product/', 'store')->name('product.store');
        Route::get('show/product/', 'show')->name('product.show');
        Route::get('edit/product/{id}', 'edit')->name('product.edit');
        Route::post('edit/product/{id}', 'update')->name('product.update');
        Route::get('destroy/product/{id}', 'destroy')->name('product.destroy');
        Route::get('restore/product/{id}', 'restore')->name('product.restore');
        Route::get('delete/product/{id}', 'delete')->name('product.delete');


        Route::get('product/details/{id}', 'details')->name('product.details');
        Route::post('product/addtocard/{id}', 'addtocard')->name('addtocard');
        Route::get('product/addtocard/', 'showcard')->name('showcard');
        Route::post('product/addtocard/remove/{id}', 'cardremove')->name('cardremove');

        Route::get('product/cashorder/', 'cashorder')->name('cashorder');

        Route::get('product/stripe/{total_price}', 'stripe')->name('stripe');

        Route::post('stripe/{total_price}', 'stripePost')->name('stripe.post');
    });
});

/**
 * /redirect
 */
Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');//dashbord main page



 /**
     * category controller
     */
    Route::controller(OrderController::class)->group(function () {
        Route::get('order/show/', 'index')->name('order.show');
        Route::get('order/show/deliverd/{id}', 'deliverd')->name('order.deliverd');


        Route::get('order/download/pdf/{id}', 'print_pdf')->name('download.pdf');//pdf download
    });
    /**
     * product controller
     */
