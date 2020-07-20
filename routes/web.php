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

Route::get('/', 'TestController@welcome');

Route::get('/prueba', function () {
  return 'Hola soy la ruta prueba';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}','ProductController@show');//Formulario Edicion

//Se crea el Middleware Admin con su respectivo  metodo
//En el kernel registramos nuestro middleware como admin
//prefix es porque admin aparecia en la ruta con esto ya no la repito en la ruta
//namespace es porque se creo la carpeta Admin en la ruta de los controldores y
// se puede hacer referencia en lugar de que aparesca en todas las rutas

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/products','ProductController@index');//listado
    Route::get('/products/create','ProductController@create');//Crear
    Route::post('/products','ProductController@store');//Registra
    Route::get('/products/{id}/edit','ProductController@edit');//Formulario Edicion
    Route::post('/products/{id}/edit','ProductController@update');//actualizar
    Route::delete('/products/{id}','ProductController@destroy');//Formulario Eliminar

    Route::get('/products/{id}/images','ImageController@index');//listado
    Route::post('/products/{id}/images','ImageController@store');//Registra
    Route::delete('/products/{id}/images','ImageController@destroy');//Formulario Eliminar
});
