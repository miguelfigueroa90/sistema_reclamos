<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller
{
    public function actualizar(Request $request)
    {
        $NuevoNombreProducto = ucwords($request->nombre);
        $nuevoTipoProducto = strtoupper($request->tipo);
        $codigoProducto = $request->codigo_producto;

        $producto = Producto::find($codigoProducto);
        $producto->nombre = $NuevoNombreProducto;
        $producto->tipo = $nuevoTipoProducto;
        $producto->save();

        return redirect('/listar_productos')->with('success','¡El Producto ha sido actualizado!');
    }

    public function eliminar(Request $request)
    {
        $codigoProducto = $request->codigo_producto;
        $producto = Producto::find($codigoProducto);
        $producto->condicion='0';
        $producto->update();
        return redirect('/listar_productos')->with('danger','¡El Producto ha sido eliminado!');
    }

    public function agregar(Request $request)
    {
        $NombreProducto = $request->nombre;
        $nuevoTipoProducto = ucwords($request->tipo);
        $codigoProducto = $request->codigo_producto;
       
       if($sql=Producto::where([['tipo', '=', $nuevoTipoProducto],['condicion', '=', '1']])->first())
    {
        return redirect('/nuevo_producto')->with('danger','¡El producto ingresado ya se encuentra registrado, favor intente con otro nombre!');
      
    }elseif($sql=Producto::where([['tipo', '=', $nuevoTipoProducto],['condicion', '=', '0']])->first()){
    
        $codigoProductoSQL = $sql->codigo_producto;
        $producto = Producto::find($codigoProductoSQL);
        $producto->condicion = "1";
        $producto->nombre = $NombreProducto;
        $producto->save();

       return redirect('/listar_productos')->with('success','¡El producto ha sido agregado!'); 

    }else{   
        $producto = new Producto;
        $producto->nombre = $NombreProducto;
        $producto->tipo = $nuevoTipoProducto;
        $producto->condicion = "1";
        $producto->save();
        return redirect('/listar_productos')->with('success','¡El Producto ha sido agregado!');
        }
    }
}
