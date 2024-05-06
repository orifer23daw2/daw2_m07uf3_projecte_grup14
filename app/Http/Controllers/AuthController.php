<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Treballador;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('treballador')->attempt($credentials)) {
            return redirect()->route('admin');
        }

        return redirect()->route('login')->with('error', 'Credencials incorrectes. Si us plau, torneu-ho a provar.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nom_cognoms' => 'required',
            'email' => 'required|email|unique:treballadors,email',
            'contrasenya' => 'required|min:6',
        ]);

        $validatedData['contrasenya'] = Hash::make($validatedData['contrasenya']);

        $treballador = Treballador::create($validatedData);



        return redirect('/dashboard')->with('success', 'Treballador registrado exitosamente');
    }
}
