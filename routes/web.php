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
use App\Booking;


Route::get('/', function () {    
      
    
    return view('welcome');
    
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//create the booking form
Route::get('/reserva/create','ReservaController@create')->name('reserva.create');
//create booking
Route::post('/save-booking',array(
    'as' => 'reserva.saveBooking',
    'middleware' => 'auth',
    'uses'=>'ReservaController@saveBooking'
));
//search that the client id fits the client id in the db
Route::get('reserva/search/{id}','ReservaController@searchClient')->name('reserva.search');
//route to see all the bookings
Route::get('/all-bookigs',array(
    'as'=>'reserva.verReservas',
    'middleware'=>'auth',
    'uses'=>'ReservaController@verReservas'
));

//view of booking edition
Route::get('/edit-reserva/{id}',array(
    'as'=>'editReserva',
    'middleware'=>'auth',
    'uses'=>'ReservaController@editReserva',
));

//update booking
Route::post('/update-booking/{id}',array(
    'as'=>'updateBooking',
    'middleware'=>'auth',
    'uses'=>'ReservaController@updateBooking'
));

//delete booking
Route::get('/delete-booking/{id}',array(
    'as'=>'deleteBooking',
    'middleware'=>'auth',
    'uses'=>'ReservaController@deleteBooking'
));



//create client form
Route::get('/cliente/create','ClienteController@create')->name('cliente.create');

//store new client,the above route is also valid
//Route::post('/cliente/save','ClienteController@saveClient')->name('cliente.create');
Route::post('/save-client',array(
    'as' => 'saveClient',
    'middleware' => 'auth',
    'uses' => 'ClienteController@saveClient'
));

//see all the clients
//Route::get('/all-clients','ClienteController@AllClientes')->name('cliente.AllClientes');
Route::get('/all-clients',array(
    'as'=>'cliente.AllClientes',
    'middleware'=>'auth',
    'uses'=>'ClienteController@AllClientes'
));

//edit the client
Route::get('/edit-cliente/{id}',array(
    'as'=>'EditCliente',
    'middleware'=>'auth',
    'uses'=>'ClienteController@EditCliente'
));


//update the client
Route::post('/update-cliente/{id}',array(
    'as'=>'UpdateCliente',
    'middleware'=>'auth',
    'uses'=>'ClienteController@UpdateCliente'
));

//delete/erase the client
Route::get('/delete-cliente/{id}',array(
    'as'=>'DeleteCliente',
    'middleware'=>'auth',
    'uses'=>'ClienteController@DeleteCliente'
));

//user configuration 
Route::get('/config','UserController@config')->name('config');

//update user information
//Route::post('/user/update','UserController@update')->name('user.update');
Route::post('/user/update','UserController@update')->name('user.update');

//get image
Route::get('/user/avatar/{filename}',array(
    'as'=>'user.avatar',
    'middleware'=>'auth',
    'uses'=>'UserController@updategetImage'
));

