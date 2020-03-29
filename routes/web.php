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

//Rutas para las categorias
Route::resource('categorias','Almacen\CategoriasController');
Route::post('activar/{id}','Almacen\CategoriasController@activar')->name('activar');

//Rutas para las subcategorias
Route::resource('subcategorias','Almacen\SubcategoriasController');
Route::get('listado-categorias','Almacen\SubcategoriasController@categorias')->name('lista-categorias');
Route::post('activar-subcategoria/{id}','Almacen\SubcategoriasController@activar')->name('activar-subcategoria');

//Rutas para los productos
Route::resource('productos','Almacen\ProductosController');
Route::get('listado-subcategorias','Almacen\ProductosController@subcategorias')->name('lista-subcategorias');
Route::post('activar-producto/{id}','Almacen\ProductosController@activar')->name('activar-producto');



Route::get('/{any?}', 'HomeController@index')->where('any','.*');