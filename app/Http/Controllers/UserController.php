<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function iniciarSesion(Request $request) //recibir los datos del formulario
    {
        $credentials = $request->only('email', 'password');
        $email = $request->input('email');
        $password = $request->input('password');
    
        // Obtener el usuario por correo electrónico
        $user = \App\Models\User::where('email', $email)->first();
    
        if ($user) {
            // El usuario existe, verifica la contraseña
            if ($user->password === $password) {
                // Contraseña válida
                Auth::login($user);
                return view('/inicio');
            } else {
                // Contraseña incorrecta
                return redirect()->back()
                    ->withInput($request->only('email', 'remember'))
                    ->withErrors([
                        'contrasena' => 'La contraseña es incorrecta.',
                    ]);
            }
        } else {
            // El usuario no existe
            return redirect()->back()
                ->withInput($request->only('email', 'remember'))
                ->withErrors([
                    'correo' => 'El correo electrónico no está registrado.',
                ]);
        }
    }
}
