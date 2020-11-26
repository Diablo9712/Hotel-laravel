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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/livetable', 'LiveTable@index');
Route::get('/livetable/fetch_data', 'LiveTable@fetch_data');
Route::post('/livetable/add_data', 'LiveTable@add_data')->name('livetable.add_data');
Route::post('/livetable/update_data', 'LiveTable@update_data')->name('livetable.update_data');
Route::post('/livetable/delete_data', 'LiveTable@delete_data')->name('livetable.delete_data');

Route::resource('saison', 'SaisonController');
Route::resource('country', 'CountryController');
//Route::resource('test', 'CountryController');
Route::resource('city', 'CityController');
Route::resource('hotel', 'HotelController');
Route::resource('tarif', 'TarifController');
Route::resource('room', 'RoomController');

Route::resource('client', 'ClientController');
Route::post('client/update', 'ClientController@update')->name('client.update');
Route::get('client/destroy/{id}', 'ClientController@destroy');


Route::resource('user', 'UserController');
Route::post('user/update', 'UserController@update')->name('user.update');
Route::get('user/destroy/{id}', 'UserController@destroy');

Route::post('tarif/update', 'TarifController@update')->name('tarif.update');
//Route::resource('hotel/getStates/{id}', 'HotelController@getStates');
Route::resource('category', 'CategoryController');
Route::get('hotel/getStates/{id}','HotelController@getStates');
Route::get('hotel/getHotels/{id}','HotelController@getHotels');
Route::post('hotel/store', 'HotelController@store')->name('hotel.store');
Route::post('category/update', 'CategoryController@update')->name('category.update');

Route::get('category/destroy/{id}', 'CategoryController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::resource('service', 'ServiceController');

Route::post('service/update', 'ServiceController@update')->name('service.update');


Route::get('service/destroy/{id}', 'ServiceController@destroy');



Route::resource('mode', 'ModeReglementController');

Route::post('mode/update', 'ModeReglementController@update')->name('mode.update');

Route::get('mode/destroy/{id}', 'ModeReglementController@destroy');


Route::resource('customsearch', 'CustomSearchController');


Route::get('/live_search', 'LiveSearch@index');
Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');


Route::resource('test', 'testController@index');

Route::get('test/getStates/{id}','testController@getStates');
Route::get('test/getHotels/{id}','testController@getHotels');



Route::get('/find_rooms', 'FindRoomController@index')->name('find_rooms.index');
Route::post('/find_rooms', 'FindRoomController@index');





Route::get('/clear', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});





Route::PUT('find_rooms','FindRoomController@store')->name('find_rooms.store');
Route::get('find_rooms/{id}/create','FindRoomController@create')->name('find_rooms.create');

//Route::resource('booking', 'BookingController');
Route::get('/booking', 'BookingController@index')->name('booking.index');

Route::get('booking/create/{id}', 'BookingController@create')->name('booking.create');
Route::get('booking/edit/{id}', 'BookingController@edit')->name('booking.edit');
Route::resource('export', 'ExportController'); 



Route::resource('services', 'ServicesController');

Route::post('services/update', 'ServicesController@update')->name('services.update');


Route::get('services/destroy/{id}', 'ServicesController@destroy');

Route::resource('tables', 'TablesController');


Route::get('/laravel_google_chart', 'LaravelGoogleGraph@index');


Route::get('bar-chart', 'ChartController@index');



Route::get('/dashboard', 'ChartController@index');




Route::get('google-line-chart', 'HomeController@googleLineChart');



Route::get('charts', 'CharttController@index');


Route::get('csv_file', 'CsvFile@index');

Route::get('csv_file/export', 'CsvFile@csv_export')->name('export');

Route::post('csv_file/import', 'CsvFile@csv_import')->name('import');




Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');

Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');


Route::get('/auth/redirect/{provider}', 'SociallController@redirect');
Route::get('/callback/{provider}', 'SociallController@callback');


Route::get('paypal', 'PayPalController@index');

Route::get('get_started','PayPalController@create');

Route::get('store','PayPalController@store');