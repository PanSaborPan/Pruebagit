<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();

        return view('usuario.usuarios', compact('usuarios'));
    }

    public function create(Request $request)
    {
        $usuarios = new Usuario();
        $usuarios->Nombre = $request->Nombre;
        $usuarios->Area = $request->Area;
        $usuarios->Usuario = $request->Usuario;
        $usuarios->Contraseña = $request->Contraseña;


        $usuarios->save();
    }






    public function edit($id)
    {
        $Usuarios = DB::table('usuarios')
            ->where('Id_usuario', $id)
            ->get();

        return view('usuario.ModificarUsuarios', compact('Usuarios'));
    }

    public function update(Request $request, Usuario $usuarios)
    {

        $usuarios->Nombre = $request->Nombre;
        $usuarios->Area = $request->Area;
        $usuarios->Usuario = $request->Usuario;
        $usuarios->Contraseña = $request->Contraseña;
        $usuarios->Id_usuario = $request->Id_usuario;

        $data = array(
            'Nombre' => $usuarios->Nombre, 'Area' => $usuarios->Area, 'Usuario' => $usuarios->Usuario,
            'Contraseña' => $usuarios->Contraseña
        );

        Usuario::updateData($usuarios->Id_usuario, $data);
    }

    public function delete($id)
    {
        // Call deleteData() method of Page Model
        Usuario::deleteData($id);
        return view('usuario.BorrarUsuarios');
    }
}
