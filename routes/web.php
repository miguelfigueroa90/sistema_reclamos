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

// Inicio
Route::get('/', 'PaginasController@index');

// Autenticación
Route::post('/login', 'LdapController@autenticar');

// Administración de Estatus
Route::get('/listar_estatus', 'PaginasController@listarEstatus');
Route::get('/nuevo_estatus', 'PaginasController@agregarEstatus');
Route::get('/actualizar_estatus/{codigo_estatus}', 'PaginasController@actualizarEstatus');
Route::post('/nuevo_estatus', 'EstatusController@agregar');
Route::put('/actualizar_estatus/{codigo_estatus}', 'EstatusController@actualizar');
Route::delete('/eliminar_estatus/{codigo_estatus}', 'EstatusController@eliminar');

// Administración de Nacionalidades
Route::get('/nacionalidades', 'PaginasController@listarNacionalidades');
Route::get('/nacionalidad', 'PaginasController@agregarNacionalidad');
Route::get('/nacionalidad/{codigo_nacionalidad}', 'PaginasController@actualizarNacionalidad');
Route::post('/nacionalidad', 'NacionalidadesController@agregar');
Route::put('/nacionalidad/{codigo_nacionalidad}', 'NacionalidadesController@actualizar');
Route::delete('/nacionalidad/{codigo_nacionalidad}', 'NacionalidadesController@eliminar');

// Administración de Departamentos
Route::get('/departamentos', 'PaginasController@listarDepartamentos');
Route::get('/departamento', 'PaginasController@agregarDepartamento');
Route::get('/departamento/{codigo_departamento}', 'PaginasController@actualizarDepartamento');
Route::post('/departamento', 'DepartamentosController@agregar');
Route::put('/departamento/{codigo_departamento}', 'DepartamentosController@actualizar');
Route::delete('/departamento/{codigo_departamento}', 'DepartamentosController@eliminar');

// Administración de Perfiles
Route::get('/perfiles', 'PaginasController@listarPerfiles');
Route::get('/perfil', 'PaginasController@agregarPerfil');
Route::get('/perfil/{codigo_perfil}', 'PaginasController@actualizarPerfil');
Route::post('/perfil', 'PerfilesController@agregar');
Route::put('/perfil/{codigo_perfil}', 'PerfilesController@actualizar');
Route::delete('/perfil/{codigo_perfil}', 'PerfilesController@eliminar');
