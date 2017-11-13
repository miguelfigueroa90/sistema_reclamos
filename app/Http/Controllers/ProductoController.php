<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller
{
    public function actualizar(Request $request)
    {
       $NuevoNombreProducto = $request->nombre;
       $nuevoTipoProducto = strtoupper($request->tipo);
       $codigoProducto = $request->codigo_producto;
     

       if($sql=Producto::where([['tipo', '=', $nuevoTipoProducto],['condicion', '=', '1']])->first())
    {
        return redirect('/actualizar_productos/'.$codigoProducto)->with('status','¡El producto ingresado ya se encuentra registrado, favor intente con otro nombre!');
    
    }elseif ($sql=Producto::where([['tipo', '=', $nuevoTipoProducto],['condicion', '=', '0']])->first()){
        
        $codigoProductoSQL = $sql->codigo_producto;
        $producto = Producto::find($codigoProductoSQL);
        $producto->condicion = "1";
        $producto->nombre = $NuevoNombreProducto;
        $producto->save();

        $codigoProductoView = $request->codigo_producto;
        $productoView = Producto::find($codigoProductoView);
        $productoView->condicion = "0";
        $productoView->save();

        return redirect('/listar_productos')->with('status','¡El producto ha sido actualizado!'); 

    }else{   
        
        $producto = Producto::find($codigoProducto);
        $producto->condicion = "1";
        $producto->nombre = $NuevoNombreProducto;
        $producto->tipo = $nuevoTipoProducto;
        $producto->save();
        return redirect('/listar_productos')->with('status','¡El Producto ha sido agregado!');
    }
    }

    public function eliminar(Request $request)
    {
        $codigoProducto = $request->codigo_producto;
        $producto = Producto::find($codigoProducto);
        $producto->condicion='0';
        $producto->update();
        return redirect('/listar_productos')->with('status','¡El Producto ha sido eliminado!');
    }

    public function agregar(Request $request)
    {
        $NombreProducto = $request->nombre;
        $nuevoTipoProducto = strtoupper($request->tipo);
        $codigoProducto = $request->codigo_producto;
       
       if($sql=Producto::where([['tipo', '=', $nuevoTipoProducto],['condicion', '=', '1']])->first())
    {
        return redirect('/nuevo_producto')->with('status','¡El producto ingresado ya se encuentra registrado, favor intente con otro nombre!');
      
    }elseif($sql=Producto::where([['tipo', '=', $nuevoTipoProducto],['condicion', '=', '0']])->first()){
    
        $codigoProductoSQL = $sql->codigo_producto;
        $producto = Producto::find($codigoProductoSQL);
        $producto->condicion = "1";
        $producto->nombre = $NombreProducto;
        $producto->save();

       return redirect('/listar_productos')->with('status','¡El producto ha sido agregado!'); 

    }else{   
        $producto = new Producto;
        $producto->nombre = $NombreProducto;
        $producto->tipo = $nuevoTipoProducto;
        $producto->condicion = "1";
        $producto->save();
        return redirect('/listar_productos')->with('status','¡El Producto ha sido agregado!');
        }
    }
}
