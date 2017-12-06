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

Route::get('/', 'PaginasController@index');

// Autenticación
Route::auth('/login', 'PaginasController@index');
Route::post('/login', 'LdapController@autenticar');
Route::get('/salir', 'LdapController@salir');

Route::group(['middleware' => 'GestionDeUsuarios'], function(){
	// Administración de usuarios
	Route::get('/usuarios', 'PaginasController@listarUsuarios');
	Route::get('/nuevo_usuario', 'PaginasController@agregarUsuario');
	Route::post('/usuario', 'UsuariosController@procesarUsuario');
	Route::get('/actualizar_usuario/{cedula}', 'PaginasController@actualizarUsuario');
	Route::put('/actualizar_usuario/{cedula}', 'UsuariosController@actualizar');
	Route::get('/bloquear_usuario/{cedula}', 'UsuariosController@bloquear');
	Route::get('/desbloquear_usuario/{cedula}', 'UsuariosController@desbloquear');

	// Administración de perfiles
	Route::get('/perfiles', 'PaginasController@listarPerfiles');
	Route::get('/nuevo_perfil', 'PaginasController@agregarPerfil');
	Route::get('/actualizar_perfil/{codigo_perfil}', 'PaginasController@actualizarPerfil');
	Route::post('/nuevo_perfil', 'PerfilesController@agregar');
	Route::put('/actualizar_perfil/{codigo_perfil}', 'PerfilesController@actualizar');
	Route::delete('/eliminar_perfil/{codigo_perfil}', 'PerfilesController@eliminar');

	// Administración de Departamentos
	Route::get('/listar_departamento', 'PaginasController@listarDepartamentos');
	Route::get('/nuevo_departamento', 'PaginasController@agregarDepartamento');
	Route::get('/actualizar_departamento/{codigo_departamento}', 'PaginasController@actualizarDepartamento');
	Route::post('/nuevo_departamento', 'DepartamentosController@agregar');
	Route::put('/actualizar_departamento/{codigo_departamento}', 'DepartamentosController@actualizar');
	Route::delete('/eliminar_departamento/{codigo_departamento}', 'DepartamentosController@eliminar');
});

Route::group(['middleware' => 'ConfiguracionDeVariables'], function(){
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

	// Administración de bancos
	Route::get('/listar_bancos', 'PaginasController@listarBancos');
	Route::get('/nuevo_banco', 'PaginasController@agregarBanco');
	Route::get('/actualizar_banco/{codigo_banco}', 'PaginasController@actualizarBanco');
	Route::post('/nuevo_banco', 'BancosController@agregar');
	Route::put('/actualizar_banco/{codigo_banco}', 'BancosController@actualizar');
	Route::delete('/eliminar_banco/{codigo_banco}', 'BancosController@eliminar');

	// Administración de Dispositivo
	Route::get('/listar_dispositivo', 'PaginasController@listarDispositivo');
	Route::get('/nuevo_dispositivo', 'PaginasController@agregarDispositivo');
	Route::get('/actualizar_dispositivo/{codigo_dispositivo}', 'PaginasController@actualizarDispositivo');
	Route::post('/nuevo_dispositivo', 'DispositivoController@agregar');
	Route::put('/actualizar_dispositivo/{codigo_dispositivo}', 'DispositivoController@actualizar');
	Route::delete('/eliminar_dispositivo/{codigo_dispositivo}', 'DispositivoController@eliminar');
});

Route::group(['middleware' => 'RegistroDeReclamo'], function(){
	// Registro del Reclamo
	Route::get('/reclamo', 'PaginasController@agregarReclamo');
	Route::get('/buscar_reclamo', 'PaginasController@buscarReclamos');
	Route::post('/buscar_reclamo', 'ReclamosController@buscar');
	Route::post('/buscar_cliente', 'ClientesController@buscarCliente');
	Route::post('/reclamo', 'ReclamosController@agregar');
});

Route::group(['middleware' => 'GestionDeReclamo'], function(){
	// Gestión del Reclamo
	Route::get('/bandeja', 'PaginasController@bandeja');
	Route::get('/reclamos_asignados', 'PaginasController@listarReclamosAsignados');
	Route::get('/gestionar_reclamo/{numero_reclamo}', 'PaginasController@gestionarReclamo');
	Route::post('/obtener_transacciones', 'ReclamosController@obtenerTransacciones');
	Route::get('/asignar_reclamo/{numero_reclamo}', 'ReclamosController@asignarReclamo');
	Route::post('/gestionar_estatus_reclamo', 'ReclamosController@gestionarEstatusReclamo');
	Route::post('/gestionar_transaccion_reclamo', 'ReclamosController@gestionarTransaccionReclamo');
});

// Reportes
Route::get('/reporte_usuarios', 'PaginasController@reporteUsuarios');
Route::get('/reporte_reclamos', 'PaginasController@reporteReclamos');
Route::post('/generar_reporte_usuarios', 'ReportesController@generarReporteUsuarios');
Route::post('/generar_reporte_reclamos', 'ReportesController@generarReporteReclamos');

Route::get('/reporte_auditoria_usuarios', 'PaginasController@reporteAuditoriaUsuarios');
Route::get('/generar_reporte_auditoria_usuarios/{cedula}', 'ReportesController@generarReporteAuditoriaUsuarios');
