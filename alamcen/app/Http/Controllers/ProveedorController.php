<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\proveedor;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedor = proveedor::all();

        return view('proveedor.proveedor', compact('proveedor'));
    }


    public function create(Request $request)
    {
        $proveedor = new proveedor();
        $proveedor->Nombre = $request->Nombre;
        $proveedor->Compañia = $request->Compañia;
        $proveedor->Correo = $request->Correo;
        $proveedor->Telefono = $request->Telefono;
        $proveedor->Celular = $request->Celular;
        $proveedor->Calle = $request->Calle;
        $proveedor->Numero = $request->Numero;
        $proveedor->Ciudad = $request->Ciudad;
        $proveedor->Estado = $request->Estado;
        $proveedor->Pais = $request->Pais;
        $proveedor->Codigo_postal = $request->Codigo_postal;



        $proveedor->save();
    }






    public function edit($id)
    {
        $proveedor = DB::table('proveedor')
            ->where('Id_proveedor', $id)
            ->get();

        return view('proveedor.ModificarProveedor', compact('proveedor'));
    }

    public function update(Request $request, proveedor $proveedor)
    {

        $proveedor->Id_proveedor  = $request->id;
        $proveedor->Nombre = $request->Nombre;
        $proveedor->Compañia = $request->Compañia;
        $proveedor->Correo = $request->Correo;
        $proveedor->Telefono = $request->Telefono;
        $proveedor->Celular = $request->Celular;
        $proveedor->Calle = $request->Calle;
        $proveedor->Numero = $request->Numero;
        $proveedor->Ciudad = $request->Ciudad;
        $proveedor->Estado = $request->Estado;
        $proveedor->Pais = $request->Pais;
        $proveedor->Codigo_postal = $request->Codigo_postal;

        $data = array(
            'Nombre' => $proveedor->Nombre, 'Compañia' => $proveedor->Compañia, 'Correo' => $proveedor->Correo,
            'Telefono' => $proveedor->Telefono, 'Celular' => $proveedor->Celular, 'Calle' => $proveedor->Calle,
            'Numero' => $proveedor->Numero, 'Ciudad' =>  $proveedor->Ciudad, 'Pais' => $proveedor->Pais,
            'Codigo_postal' => $proveedor->Codigo_postal
        );

        proveedor::updateData($proveedor->Id_proveedor, $data);
    }

    public function delete($id)
    {
        // Call deleteData() method of Page Model
        proveedor::deleteData($id);
        return view('proveedor.BorrarProveedor');
    }
}
