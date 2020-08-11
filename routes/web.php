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
    
    /*
    $bookings = Booking::all();
    foreach ($bookings as $booking) {
        echo "id del cliente  :".$booking->clients->id." |  nombre : ".$booking->clients->name.""
                . " | surname : ".$booking->clients->surname."reserva hecha por: ".$booking->user->name;
               
      
    }
    die();
    */
    
    
    return view('welcome');
    
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Crear formulario reserva
Route::get('/reserva/create','ReservaController@create')->name('reserva.create');
//crear Booking
Route::post('/save-booking',array(
    'as' => 'reserva.saveBooking',
    'middleware' => 'auth',
    'uses'=>'ReservaController@saveBooking'
));
//buscar que el id del cliente existe en la db,
Route::get('reserva/search/{id}','ReservaController@searchClient')->name('reserva.search');
//route para ver todas las reservas
Route::get('/all-bookigs',array(
    'as'=>'reserva.verReservas',
    'middleware'=>'auth',
    'uses'=>'ReservaController@verReservas'
));

//vista de edicion de reserva
Route::get('/edit-reserva/{id}',array(
    'as'=>'editReserva',
    'middleware'=>'auth',
    'uses'=>'ReservaController@editReserva',
));

//update reserva/booking
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



//crear formulario cliente
Route::get('/cliente/create','ClienteController@create')->name('cliente.create');

//guardar nuevo cliente,esta primera ruta es válida tambien
//Route::post('/cliente/save','ClienteController@saveClient')->name('cliente.create');
Route::post('/save-client',array(
    'as' => 'saveClient',
    'middleware' => 'auth',
    'uses' => 'ClienteController@saveClient'
));

//ver todos los clientes
//Route::get('/all-clients','ClienteController@AllClientes')->name('cliente.AllClientes');
Route::get('/all-clients',array(
    'as'=>'cliente.AllClientes',
    'middleware'=>'auth',
    'uses'=>'ClienteController@AllClientes'
));

//Editamos el cliente.
Route::get('/edit-cliente/{id}',array(
    'as'=>'EditCliente',
    'middleware'=>'auth',
    'uses'=>'ClienteController@EditCliente'
));


//Actualizar el cliente
Route::post('/update-cliente/{id}',array(
    'as'=>'UpdateCliente',
    'middleware'=>'auth',
    'uses'=>'ClienteController@UpdateCliente'
));

//delete/borrar el cliente
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

