<?php
use App\Http\Controllers\Admin\FlashsaleController;
use App\Http\Controllers\Auth\AuthController;
use App\Models\Distributor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\DistributorController;



// Guest Route 
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/post-register', [AuthController::class, 'post_register'])->name('post.register');

    Route::post('/post-login', [AuthController::class, 'login']);
})->middleware('guest');

// Admin Route 
Route::group(['middleware' => ['admin', 'web']], function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/product', [ProductController::class, 'index'])->name('admin.product');
    Route::get('/admin-logout', [AuthController::class, 'admin_logout'])->name('admin.logout');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/admin/product/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
    Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/admin/flashsales', [FlashsaleController::class, 'index'])->name('admin.flashsale');


    Route::get('/admin/distributor', [DistributorController::class, 'index'])->name('admin.distributor');
    Route::get('/admin/distributor/create', [DistributorController::class, 'create'])->name('distributor.create');
    Route::post('/admin/distributor/store', [DistributorController::class, 'store'])->name('distributor.store');
    Route::get('/admin/distributor/edit/{id}', [DistributorController::class, 'edit'])->name('distributor.edit');
    Route::post('/admin/distributor/update/{id}', [DistributorController::class, 'update'])->name('distributor.update');
    Route::delete('/admin/distributor/delete/{id}', [DistributorController::class, 'delete'])->name('distributor.delete');

    Route::get('/admin/flashsale/create', [FlashsaleController::class, 'create'])->name('flashsale.create');
    Route::post('/admin/flashsale/store', [FlashsaleController::class, 'store'])->name('flashsale.store');
    Route::get('/admin/flashsale/edit/{id}', [FlashsaleController::class, 'edit'])->name('flashsale.edit');
    Route::post('/admin/flashsale/update/{id}', [FlashsaleController::class, 'update'])->name('flashsale.update');





});

// User Route
Route::group(['middleware' => ['web']], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/user-logout', [AuthController::class, 'user_logout'])->name('user.logout');
    Route::get('/user/product/detail/{id}', [UserController::class, 'detail_product'])->name('user.detail.product');
    Route::get('/product/purchase/{productId}/{userId}', [UserController::class, 'purchase']);
});

?>