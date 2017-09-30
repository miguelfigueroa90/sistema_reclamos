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

// Route::get('/', function(){ return View::make('pages.home');});

Route::get('/', 'PaginasController@listarPerfiles');

Route::post('/login', 'LdapController@autenticar');

// Administración de Perfiles
Route::get('perfiles', 'PaginasController@listarPerfiles');
Route::get('perfil', 'PaginasController@agregarPerfil');
Route::get('perfil/{codigo_perfil}', 'PaginasController@actualizarPerfil');
Route::post('perfil', 'PerfilesController@agregar');
Route::delete('perfil/{codigo_perfil}', 'PerfilesController@eliminar');
Route::put('perfil/{codigo_perfil}', 'PerfilesController@actualizar');
