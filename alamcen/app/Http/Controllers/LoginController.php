<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showloginform()
    {
        return view('login.login');
    }

    //Verifica el inicio
    public function authLogin(Request $request)
    {
        //Recibe los input
        $Usuario = $request->input('Usuario');
        $Contraseña = $request->input('Contraseña');

        //Verifica que exista el email
        $user = Usuario::where('Usuario', $Usuario)->first();

        //Si no existe el correo, manda la alerta
        if (!$user) {
            return back()->withErrors(['Usuario' => 'Verifica tu email'])
                ->withInput(request(['Usuario']));
        }
        //Si existe el correo pero la contraseña no coincide manda alerta
        $hashed = hash::make($user->Contraseña);
        if (!Hash::check($Contraseña, $hashed)) {
            return back()->withErrors(['Contraseña' => 'Verifica tu contraseña'])
                ->withInput(request(['Contraseña']));
        } //Si cohincide la contraseña, verifica el estatus, comprueba el tipo y realiza el login
        if (Hash::check($Contraseña, $hashed)) {
            if ($user->status == 'Inactivo') {
                return back()->withErrors(['msg' => 'Herror:
                                                    Usuarios no activado comunicate con tu administrador']);
            } else {
                //Pushea la sesión
                $request->session()->put('users', $user);


                return redirect('/welcome');
                //Si es broker manda al listado de clientes

            }
        }
    }



    public function login()
    {

        $credentials =  $this->validate(request(), [
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);



        if (Auth::attempt($credentials)) {
            return 'tu session ah iniciado correctamente';
        }

        return back()->withErrors(['email' => 'Estas credenciales no coinciden con nuestros registros'])
            ->withInput(request(['email']));
    }
}
