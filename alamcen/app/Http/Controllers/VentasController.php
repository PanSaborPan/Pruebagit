<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use Illuminate\Support\Facades\DB;

class VentasController extends Controller
{
    public function index()
    {
        $ventas = Ventas::all();

        return view('ventas.ventas', compact('ventas'));
    }

    public function create(Request $request)
    {
        $calculariva = 0.16;

        $ventas = new Ventas();
        $ventas->Cliente = $request->Cliente;
        $ventas->Producto = $request->Producto;
        $ventas->Descripcion = $request->Descripcion;
        $ventas->Cantidad = $request->Cantidad;
        $ventas->Precio_Unitario = $request->Precio_Unitario;
        $ventas->Sub_Total = $request->Precio_Unitario*$request->Cantidad;
        $ventas->Iva = $ventas->Sub_Total*$calculariva;
        $ventas->Total = $ventas->Sub_Total+$ventas->Iva;

        $ventas->save();
    }

    public function edit($id)
    {
        $Ventas = DB::table('ventas')
            ->where('Folio', $id)
            ->get();

        return view('ventas.ModificarVentas', compact('Ventas'));
    }
    
    public function update(Request $request, Ventas $ventas)
    {

        $calculariva = 0.16;

        $ventas->Cliente = $request->Cliente;
        $ventas->Producto = $request->Producto;
        $ventas->Descripcion = $request->Descripcion;
        $ventas->Cantidad = $request->Cantidad;
        $ventas->Precio_Unitario = $request->Precio_Unitario;
        $ventas->Sub_Total = $request->Precio_Unitario*$request->Cantidad;
        $ventas->Iva = $ventas->Sub_Total*$calculariva;
        $ventas->Total = $ventas->Sub_Total+$ventas->Iva;
        $ventas->Folio = $request->Folio;

        $data = array(
            'Cliente' => $ventas->Cliente, 
            'Producto' => $ventas->Producto, 
            'Descripcion' => $ventas->Descripcion,
            'Cantidad' => $ventas->Cantidad, 
            'Precio_Unitario' => $ventas->Precio_Unitario, 
            'Iva' => $ventas->Iva, 
            'Sub_Total' => $ventas->Sub_Total,
            'Total' => $ventas->Total

        );
        Ventas::updateData($ventas->Folio, $data);
    }

    public function delete($id)
    {
        // Call deleteData() method of Page Model
        Ventas::deleteData($id);
        return view('ventas.BorrarVentas');
    }
}
