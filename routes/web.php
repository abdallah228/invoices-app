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
    return view('auth.login');
    
});




Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'dashboard','namespace'=>'Dashboard','middleware'=>'auth'],function(){
Route::resource('invoices','invoicesController');//invoices
Route::resource('sections','SectionController');//sections
Route::resource('products','ProductController');//products
Route::get('/section/{id}', 'InvoicesController@getproducts');


});


//dashboard them
Route::get('/{page}', 'AdminController@index');
