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
    return view('welcome');
});
Route::get('/app/login', 'loginController@index');
Route::post('/app/login', 'loginController@verify');
Route::get('/app/logout', 'logoutController@index');

Route::group(['middleware'=>['sess']], function(){

	Route::get('/app/home', 'AppController@index')->middleware('sess')->name('admin.home.home');

	Route::get('/app/adminlist','AppController@adminlist')->name('admin.home.adminlist');

	Route::get('/app/managerlist','AppController@managerlist')->name('admin.home.managerlist');

	Route::get('/app/userlist','AppController@userlist')->name('admin.home.userlist');
	
    Route::get('/app/create', 'AppController@create')->name('admin.home.create');
	Route::post('/app/create', 'AppController@store');

	Route::get('/app/createmanager', 'AppController@createmanager')->name('admin.home.createmanager');
	Route::post('/app/createmanager', 'AppController@storemanager');

	Route::get('/app/createagent', 'AppController@createagent')->name('admin.home.createagent');
	Route::post('/app/createagent', 'AppController@storeagent');

	Route::get('/app/users', 'AppController@index2');
	Route::get('/app/search','AppController@search')->name('search');

	Route::get('/app/user/edit/{id}', 'AppController@edit')->name('admin.home.edit');
	Route::post('/app/user/edit/{id}', 'AppController@update');

	Route::get('/app/delete/{id}', 'AppController@delete')->name('admin.home.delete');
	Route::get('/app/salarylist','AppController@salarylist')->name('admin.home.salarylist');

	Route::get('/app/pdf','AppController@pdf')->name('admin.home.pdf');
	Route::get('/app/mpdf','AppController@mpdf')->name('admin.home.mpdf');
	Route::get('/app/updf','AppController@updf')->name('admin.home.updf');

	Route::get('/app/salarylist','AppController@salarylist')->name('admin.home.salarylist');
	Route::get('/app/transaction','AppController@transaction')->name('admin.home.transaction');

	Route::get('/app/adminedit', 'AppController@adminedit')->name('admin.home.adminedit');
	Route::post('/app/adminedit', 'AppController@updateadmin');

	

	
});
Route::resource('/app','AppController');
