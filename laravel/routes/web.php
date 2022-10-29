<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use App\Http\Middleware;
use App\Mail\OrderShipped;
use App\Mail\NewFashions;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewMailController;
use App\Http\Controllers\ChartJSController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\Admin\EditOrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\BlogController;

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

Route::get('/a', function () {
    return view('welcome');
});

Route::get('/profile', function () {
    return view('viewfashion.profile');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/////customer quản lý người mua
Route::get('/', [IndexController::class, 'home'])->name('home');
Route::post('/addcart', [OrderController::class, 'saveDataToSession'])->name('addcart');
Route::put('/order-update', [OrderController::class, 'update'])->name('updatecart');
Route::get('/showcart', [OrderController::class, 'orderList'])->name('showcart');
Route::post('/deletecart', [OrderController::class, 'deleteProduct'])->name('deletecart');
Route::get('/shop', [HomeController::class, 'home'])->name('shop');
Route::get('/shop/{id}', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/hotsales', [HomeController::class, 'hotsales'])->name('products.hotsales');
Route::get('/new', [HomeController::class, 'new'])->name('products.new');
Route::get('/selltop', [HomeController::class, 'selltop'])->name('products.selltop');
Route::get('/blog', [BlogController::class, 'blogshow'])->name('blogshow');
Route::get('/blog-detail/{blog}', [BlogController::class, 'blogdetail'])->name('blogdetail');
Route::get('chart-js', [ChartJSController::class, 'index']);
Route::get('/contact', function () { return view('viewfashion.contact'); })->name('contact');
Route::get('/detail/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/about', function () { return view('viewfashion.about'); })->name('about');

///checkout- thanh toán
Route::get('/checkoutvnpay', [OrderController::class, 'checkoutvnpay'])->name('order.checkout');
Route::get('/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
Route::get('/order-mail', [OrderController::class, 'orderMail'])->name('order.mail');
Route::get('/viewpayment', [PaymentController::class, 'viewpayment'])->name('viewpayment');
Route::post('/payment', [PaymentController::class, 'payment'])->name('payment');

////export excell
Route::get('/order-export', [OrderController::class, 'export'])->name('order.export');
Route::get('/orderproduct-export', [OrderController::class, 'exportproduct'])->name('orderProduct.export');

/////admin manager quản lý admin
Route::name('admin.')->group(function () {
   Route::resource('/products', AdminProductController::class)->middleware(['auth','admin']);
   Route::resource('/categories', AdminCategoryController::class)->middleware(['auth','admin']);
   Route::get('/statisticalday', [AdminOrderController::class, 'day'])->name('order.day')->middleware(['auth','admin']);
   Route::get('/statisticalmonth', [AdminOrderController::class, 'month'])->name('order.month')->middleware(['auth','admin']);
   Route::get('/statisticalyear', [AdminOrderController::class, 'year'])->name('order.year')->middleware(['auth','admin']);
   Route::get('/statistical', [AdminOrderController::class, 'viewstatistical'])->name('viewstatistical')->middleware(['auth','admin']);
   Route::get('/statistical', [AdminOrderController::class, 'statistical'])->name('statistical')->middleware(['auth','admin']);
   Route::resource('/orders', EditOrderController::class)->middleware(['auth','admin']);
   Route::get('/index-admin', [AdminController::class, 'index'])->name('admin.index-admin')->middleware(['auth','admin']);
   Route::get('/order-list', [AdminOrderController::class, 'orderList'])->name('order-list')->middleware(['auth','admin']);
   Route::get('/order-products-list', [AdminOrderController::class, 'orderProductsList'])->name('order-products-list')->middleware(['auth','admin']);
});

///send mail- gửi mail
Route::get('/send-mail', [OrderShipped::class, 'build'])->name('send-mail');
Route::get('/fashion-mail', [NewFashions::class, 'build'])->name('fashion-mail');
Route::post('/newmail', [NewMailController::class, 'sendNew'])->name('newmail');

////purchasse
Route::post('purchase', [OrderController::class, 'purchase'])->name('order.purchase');
Route::post('purchasevnpay', [OrderController::class, 'purchasevnpay'])->name('order.purchasevnpay');

//sắp xếp theo mức giá
Route::get('/ascprice', [HomeController::class, 'ascPrice'])->name('ascPrice');
Route::get('/descprice', [HomeController::class, 'descPrice'])->name('descPrice');
Route::get('/below100', [HomeController::class, 'below100'])->name('below100');
Route::get('/below200', [HomeController::class, 'below200'])->name('below200');
Route::get('/below300', [HomeController::class, 'below300'])->name('below300');
Route::get('/below400', [HomeController::class, 'below400'])->name('below400');
Route::get('/above400', [HomeController::class, 'above400'])->name('above400');


require __DIR__.'/auth.php';
