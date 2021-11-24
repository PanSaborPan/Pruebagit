<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\clientes;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = clientes::all();

        return view('clientes.clientes', compact('clientes'));
    }


    public function create(Request $request)
    {
        $clientes = new clientes();
        $clientes->Nombre_de_contacto = $request->Nombre_de_contacto;
        $clientes->Nombre_de_empresa = $request->Nombre_de_empresa;
        $clientes->Razonsocial = $request->Razonsocial;
        $clientes->Rfc = $request->Rfc;
        $clientes->Telefono = $request->Telefono;
        $clientes->Movil = $request->Movil;
        $clientes->Correo_electronico_1 = $request->Correo_electronico_1;
        $clientes->Correo_electronico_2 = $request->Correo_electronico_2;
        $clientes->Calle = $request->Calle;
        $clientes->Numero = $request->Numero;
        $clientes->Codigo_Postal = $request->Codigo_Postal;
        $clientes->Ciudad = $request->Ciudad;
        $clientes->Estado = $request->Estado;
        $clientes->Pais = $request->Pais;

        $clientes->save();
    }






    public function edit($id)
    {
        $clientes = DB::table('clientes')
            ->where('Id_cliente', $id)
            ->get();

        return view('clientes.ModificarClientes', compact('clientes'));
    }

    public function update(Request $request, clientes $clientes)
    {

        $clientes->Id_cliente = $request->id;
        $clientes->Nombre_de_contacto = $request->Nombre_de_contacto;
        $clientes->Nombre_de_empresa = $request->Nombre_de_empresa;
        $clientes->Razonsocial = $request->Razonsocial;
        $clientes->Rfc = $request->Rfc;
        $clientes->Telefono = $request->Telefono;
        $clientes->Movil = $request->Movil;
        $clientes->Correo_electronico_1 = $request->Correo_electronico_1;
        $clientes->Correo_electronico_2 = $request->Correo_electronico_2;
        $clientes->Calle = $request->Calle;
        $clientes->Numero = $request->Numero;
        $clientes->Codigo_Postal = $request->Codigo_Postal;
        $clientes->Ciudad = $request->Ciudad;
        $clientes->Estado = $request->Estado;
        $clientes->Pais = $request->Pais;

        $data = array(
            'Nombre_de_contacto' => $clientes->Nombre_de_contacto, 'Nombre_de_empresa' => $clientes->Nombre_de_empresa, 'Razonsocial' => $clientes->Razonsocial,
            'Rfc' => $clientes->Rfc, 'Telefono' => $clientes->Telefono, 'Movil' => $clientes->Movil,
            'Correo_electronico_1' => $clientes->Correo_electronico_1, 'Correo_electronico_2' =>  $clientes->Correo_electronico_2, 'Calle' => $clientes->Calle,
            'Numero' => $clientes->Numero, 'Codigo_Postal' => $clientes->Codigo_Postal, 'Ciudad' =>  $clientes->Ciudad, 'Estado' => $clientes->Estado,
            'Pais' => $clientes->Pais
        );

        clientes::updateData($clientes->Id_cliente, $data);
    }

    public function delete($id)
    {
        // Call deleteData() method of Page Model
        clientes::deleteData($id);
        return view('clientes.BorrarCliente');
    }
}
