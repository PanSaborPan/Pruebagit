<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\productos;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = productos::all();

        return view('productos.productos', compact('productos'));
    }


    public function create(Request $request)
    {
        $productos = new productos();
        $productos->Nombre_del_producto = $request->Nombre_del_producto;
        $productos->Descripcion_del_producto = $request->Descripcion_del_producto;
        $productos->Clave_del_sat = $request->Clave_del_sat;
        $productos->Clave_de_unidad = $request->Clave_de_unidad;
        $productos->Tipo = $request->Tipo;
        $productos->Precio_unitario = $request->Precio_unitario;
        $productos->Existencias_actuales = $request->Existencias_actuales;
        $productos->Punto_de_reabastecimiento = $request->Punto_de_reabastecimiento;
        $productos->Cuenta_de_activo_de_inventario = $request->Cuenta_de_activo_de_inventario;

        $productos->save();
    }






    public function edit($id)
    {
        $productos = DB::table('productos')
            ->where('SKU', $id)
            ->get();

        return view('productos.ModificarProductos', compact('productos'));
    }

    public function update(Request $request, productos $productos)
    {

        $productos->SKU = $request->id;
        $productos->Nombre_del_producto = $request->Nombre_del_producto;
        $productos->Descripcion_del_producto = $request->Descripcion_del_producto;
        $productos->Clave_del_sat = $request->Clave_del_sat;
        $productos->Clave_de_unidad = $request->Clave_de_unidad;
        $productos->Tipo = $request->Tipo;
        $productos->Precio_unitario = $request->Precio_unitario;
        $productos->Existencias_actuales = $request->Existencias_actuales;
        $productos->Punto_de_reabastecimiento = $request->Punto_de_reabastecimiento;
        $productos->Cuenta_de_activo_de_inventario = $request->Cuenta_de_activo_de_inventario;

        $data = array(
            'Nombre_del_producto' => $productos->Nombre_del_producto, 'Descripcion_del_producto' => $productos->Descripcion_del_producto, 'Clave_del_sat' => $productos->Clave_del_sat,
            'Clave_de_unidad' => $productos->Clave_de_unidad, 'Tipo' => $productos->Tipo, 'Precio_unitario' => $productos->Precio_unitario,
            'Existencias_actuales' => $productos->Existencias_actuales, 'Punto_de_reabastecimiento' =>  $productos->Punto_de_reabastecimiento, 'Cuenta_de_activo_de_inventario' => $productos->Cuenta_de_activo_de_inventario
        );

        productos::updateData($productos->SKU, $data);
    }

    public function delete($id)
    {
        // Call deleteData() method of Page Model
        productos::deleteData($id);
        return view('productos.BorrarProductos');
    }
}
