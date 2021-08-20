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

// Route::get('/', function () {
//     return view('ui.dashboard');
// });
Route::get('/',"hardware@index");
Route::get('/home',"hardware@index");
Route::get('/stock',"hardware@mystock");
Route::post('/add_product',"hardware@add_product");
Route::get('/new_product',"hardware@new_product");
Route::any('/delete_item',"hardware@delete_item");
Route::any('/point_of_sale',"hardware@shop")->name('shop');
Route::get('/shop', 'hardware@shop')->name('shop');
Route::get('/cart', 'hardware@cart')->name('cart.index');
Route::post('/add', 'hardware@add')->name('cart.store');
Route::post('/update', 'hardware@update')->name('cart.update');
Route::post('/remove', 'hardware@remove')->name('cart.remove');
Route::post('/clear', 'hardware@clear')->name('cart.clear');
Route::any('/checkout','hardware@checkout');
Route::get('send-mail', function () {

    $details = [
        'title' => 'Mail from waruikinyuru',
        'body' => 'This is for testing email using smtp'
    ];

    Mail::to('waruikinyuru@gmail.com')->send(new \App\Mail\mailing($details));

    dd("Email is Sent.");
});
Route::get('/send', 'mail1@send');
Route::get('/accounts','hardware@users');
Route::post('/add_user','hardware@add_user');
Route::post('/update_user','hardware@user_update');
Route::any('/delete_user','hardware@user_delete');
Route::get('/new_user','hardware@accounts');
Route::get('/sales','hardware@mysales');
Route::get('/reports','hardware@myreports');
Route::any('/repo','hardware@reports_generate');
Route::any('/login','hardware@user_login')->name('login');
Route::get('/generate_invoice','hardware@generate_invoice');
Route::any('/logout',"hardware@sign_out")->name('logout');

