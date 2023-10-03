<?php

namespace App\Http\Controllers;
use App\Models\Administradores;
use Illuminate\Http\Request;

class AdministradoresController extends Controller
{
    //vista de login de administradores
    public function login_index()
    {
        return view('session.login-session');
    }


    public function login_store(Request $request)
    {
        $request->validate([
            'email_administrador' => 'required|email',
            'password_administrador' => 'required|min:8|max:50'
        ]);

        if(auth()->attempt($request->only('email_administrador', 'password_administrador'))){
            return redirect()->route('dashboard');
        }else{
            return back()->with('status', 'Invalid login details');
        }
        
    }

}