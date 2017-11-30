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

// Autenticación
Route::get('/', 'PaginasController@index');
Route::get('/salir', 'LdapController@salir');

// Autenticación
Route::auth('/login', 'PaginasController@index');
Route::post('/login', 'LdapController@autenticar');

// Administración de usuarios
Route::get('/usuarios', 'PaginasController@listarUsuarios');
Route::get('/nuevo_usuario', 'PaginasController@agregarUsuario');
Route::post('/usuario', 'UsuariosController@procesarUsuario');

// Administración de perfiles
Route::get('/perfiles', 'PaginasController@listarPerfiles');
Route::get('/nuevo_perfil', 'PaginasController@agregarPerfil');
Route::get('/actualizar_perfil/{codigo_perfil}', 'PaginasController@actualizarPerfil');
Route::post('/nuevo_perfil', 'PerfilesController@agregar');
Route::put('/actualizar_perfil/{codigo_perfil}', 'PerfilesController@actualizar');
Route::delete('/eliminar_perfil/{codigo_perfil}', 'PerfilesController@eliminar');

// Reclamo
Route::get('/reclamo', 'PaginasController@agregarReclamo');
Route::get('/bandeja', 'PaginasController@bandeja');
Route::get('/buscar_reclamo', 'PaginasController@buscarReclamos');
Route::get('/reclamos_asignados', 'PaginasController@listarReclamosAsignados');
Route::get('/gestionar_reclamo', 'PaginasController@gestionarReclamo');
Route::post('/buscar_reclamo', 'ReclamosController@buscar');
Route::post('/buscar_cliente', 'ClientesController@buscarCliente');
Route::post('/reclamo', 'ReclamosController@agregar');
Route::post('/obtener_transacciones', 'ReclamosController@obtenerTransacciones');

// Administración de Bancos
Route::get('/listar_bancos', 'PaginasController@listarBancos');
Route::get('/nuevo_banco', 'PaginasController@agregarBanco');
Route::get('/actualizar_banco/{codigo_banco}', 'PaginasController@actualizarBanco');
Route::post('/nuevo_banco', 'BancosController@agregar');
Route::put('/actualizar_banco/{codigo_banco}', 'BancosController@actualizar');
Route::delete('/eliminar_banco/{codigo_banco}', 'BancosController@eliminar');

// Administración de bancos
Route::get('/listar_bancos', 'PaginasController@listarBancos');
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

// Administración de Tipos de Clientes
Route::get('/listar_TipoCliente', 'PaginasController@listarTipoCliente');
Route::get('/nuevo_TipoCliente', 'PaginasController@agregarTipoCliente');
Route::get('/actualizar_TipoCliente/{codigo_tipo_cliente}', 'PaginasController@actualizarTipoCliente');
Route::post('/nuevo_TipoCliente', 'TipoClienteController@agregar');
Route::put('/actualizar_TipoCliente/{codigo_tipo_cliente}', 'TipoClienteController@actualizar');
Route::delete('/eliminar_TipoCliente/{codigo_tipo_cliente}', 'TipoClienteController@eliminar');

// Administración de Productos
Route::get('/listar_productos', 'PaginasController@listarProducto');
Route::get('/nuevo_producto', 'PaginasController@agregarProducto');
Route::get('/actualizar_productos/{codigo_producto}', 'PaginasController@actualizarProducto');
Route::post('/nuevo_producto', 'ProductoController@agregar');
Route::put('/actualizar_productos/{codigo_producto}', 'ProductoController@actualizar');
Route::delete('/eliminar_productos/{codigo_producto}', 'ProductoController@eliminar');

// Administración de Dispositivo
Route::get('/listar_dispositivo', 'PaginasController@listarDispositivo');
Route::get('/nuevo_dispositivo', 'PaginasController@agregarDispositivo');
Route::get('/actualizar_dispositivo/{codigo_dispositivo}', 'PaginasController@actualizarDispositivo');
Route::post('/nuevo_dispositivo', 'DispositivoController@agregar');
Route::put('/actualizar_dispositivo/{codigo_dispositivo}', 'DispositivoController@actualizar');
Route::delete('/eliminar_dispositivo/{codigo_dispositivo}', 'DispositivoController@eliminar');

// Administración de Departamentos
Route::get('/listar_departamento', 'PaginasController@listarDepartamentos');
Route::get('/nuevo_departamento', 'PaginasController@agregarDepartamento');
Route::get('/actualizar_departamento/{codigo_departamento}', 'PaginasController@actualizarDepartamento');
Route::post('/nuevo_departamento', 'DepartamentosController@agregar');
Route::put('/actualizar_departamento/{codigo_departamento}', 'DepartamentosController@actualizar');
Route::delete('/eliminar_departamento/{codigo_departamento}', 'DepartamentosController@eliminar');

// Reclamos
Route::get('/reporte_reclamos', 'PaginasController@reporteReclamos');
Route::get('/reporte_auditoria', 'PaginasController@reporteAuditoria');
