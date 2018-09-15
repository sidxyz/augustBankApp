<?php

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

Route::get('/about', function () {
    return view('andugunduthandapani');
});

Route::get('/product', function () {
    return view('home');
});

Route::get('/tour', function () {
    return view('tour');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/addAccount', function () {
//     return view('addAccount');
// });
Route::get('/createTransaction','Controller@createTransaction');

Route::post('/processAccount', 'Controller@processAccount');
Route::post('/processTransaction', 'Controller@processTransaction');

Route::get('/showAccounts', 'Controller@showAllAccounts');

Route::get('/showUsers', 'Controller@showUsers')->middleware('auth');

Route::get('/addAccount/{userId}', 'Controller@addAccount');