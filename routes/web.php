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

// Reclamo
Route::get('/reclamo', 'PaginasController@agregarReclamo');
Route::get('/bandeja', 'PaginasController@bandeja');
Route::get('/buscar_reclamo', 'ReclamosController@listar');
Route::post('/buscar_reclamo', 'ReclamosController@buscar');
Route::post('/buscar_cliente', 'ClientesController@buscarCliente');
Route::post('/reclamo', 'ReclamosController@agregar');
Route::post('/obtener_transacciones', 'ReclamosController@obtenerTransacciones');

// Administración de Bancos
Route::get('/bancos', 'PaginasController@listarBancos');
Route::get('/nuevo_banco', 'PaginasController@agregarBanco');
Route::get('/actualizar_banco/{codigo_banco}', 'PaginasController@actualizarBanco');
Route::post('/nuevo_banco', 'BancosController@agregar');
Route::put('/actualizar_banco/{codigo_banco}', 'BancosController@actualizar');
Route::delete('/eliminar_banco/{codigo_banco}', 'BancosController@eliminar');

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
