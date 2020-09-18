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
    return view('user.dashboarduser');
});


Route::get('/makan', function () {
    return view('admin.makanan');
});

Route::get('/pesan', function () {
    return view('admin.pesan');
});

Route::get('/makann', 'makananController@maem');

Route::get('/deletemakan/{id}', 'makananController@deletemkn');

Route::get('/minum', 'minumanController@minum');


Route::get('/delete/{id}', 'minumanController@delete');

Route::post('/tambahmakan', 'makananController@tambahmakan');
Route::post('/tambahminum', 'minumanController@tambahminum');
Route::post('/editmakan', 'makananController@editmakan');

// Route::resource('editmaem','makananController')
// Route::get('/editmaem/{id}', 'makananController@editmaem');

Route::get('/user', function(){
    return view('user.dashboarduser');
});

// Route::get('/login', function(){
//     return view('admin.dashboard');
// });

Route::post('/loginnya', 'loginController@postlogin');

Route::get('edit/{id}', 'makananController@edit');
Route::put('/makann/update/{id}', 'makananController@update');

Route::get('editminum/{id}', 'minumanController@editminum');
Route::put('/minum/update/{id}', 'minumanController@updateminum');

// Route::get('/start', function(){
//     return view('user.dashboarduser');
// });

Route::get('/usermakan', 'makananController@usermaem');
Route::get('/usermin', 'minumanController@userminum');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pdfmakan', 'makananController@cetak_pdf');
Route::get('/pdfminum', 'minumanController@cetak_pdfmin');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', function(){
    return view('admin.dashboard');
});