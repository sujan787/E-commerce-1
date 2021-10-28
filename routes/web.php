<?php

use App\Http\Controllers\admincontroller;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\store_product;
use App\Http\Controllers\store_category;
use App\Http\Controllers\cart_controller;
use App\Http\Controllers\pdfcontroller;
use App\Http\Controllers\RazorpayPaymentController;
use App\Http\Controllers\placeordercontroller;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// home

Route::get('/',[homecontroller::class,'index'])->name('home');
Route::get('filtercategory/{id}',[homecontroller::class,'filtercategory'])->name('filter_category');
Route::get('singleproduct/{id}',[homecontroller::class,'singleproduct'])->name('single_product');
Route::get('/search',[homecontroller::class,'search'])->name('search');
Route::post('/contact',[homecontroller::class,'add_contact'])->name('contact');
Route::get('/order',[homecontroller::class,'order'])->name('order');



// cart
Route::post('/cart', [cart_controller::class, 'addToCart']);
Route::get('/view_cart',[cart_controller::class,'view_cart'])->name('view_cart');
Route::patch('/updatecart', [cart_controller::class, 'updatecart']);
Route::delete('/delete_cart',[cart_controller::class,'delete_cart']);

// place order

Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']);
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');
Route::get('/placeorderview', [placeordercontroller::class, 'index'])->name('place_order_view');
Route::post('/placeorder', [placeordercontroller::class, 'placeorder'])->name('placeorder');

// product

Route::get('/addproductindex',[store_product::class,'index'])->name('add_product_index');
Route::get('/addproductview',[store_product::class,'show'])->name('add_product_view');
Route::post('/addproductstore',[store_product::class,'store'])->name('add_product_store');
Route::get('/addproductedit{id}',[store_product::class,'edit'])->name('add_product_edit');
Route::get('/addproductdestroy{id}',[store_product::class,'destroy'])->name('add_product_destroy');
Route::post('/addproductupdate{id}',[store_product::class,'update'])->name('add_product_update');
Route::get('/offer{id}',[store_product::class,'set_offer'])->name('offer');
Route::get('/removeoffer{id}',[store_product::class,'remove_offer'])->name('remove_offer');
Route::post('/addoffer{id}',[store_product::class,'add_offer'])->name('add_offer');

// category

Route::get('/addcategoryindex',[store_category::class,'index'])->name('add_category_index');
Route::get('/addcategoryview',[store_category::class,'show'])->name('add_category_view');
Route::post('/addcategorystore',[store_category::class,'store'])->name('add_category_store');
Route::get('/addcategoryedit{id}',[store_category::class,'edit'])->name('add_category_edit');
Route::get('/addcategorydestroy{id}',[store_category::class,'destroy'])->name('add_category_destroy');
Route::post('/addcategoryupdate{id}',[store_category::class,'update'])->name('add_category_update');

// user information
Route::get('/userinfo',[admincontroller::class,'user_info'])->name('user_info');

// contact information
Route::get('/contactinfo',[homecontroller::class,'contact_view'])->name('contact_info');

// order info
Route::get('/orderinfo',[admincontroller::class,'order_info'])->name('order_info');
Route::get('/orderproduct{id}',[admincontroller::class,'order_product'])->name('order_product');

// pdf converter
Route::get('/pdfview',[pdfcontroller::class,'pdf_view'])->name('pdf_view');
Route::get('/pdfconverter',[pdfcontroller::class,'pdf_converter'])->name('pdf_converter');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/index',[homecontroller::class,'redirect']);