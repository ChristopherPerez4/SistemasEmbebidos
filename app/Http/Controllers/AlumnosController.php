<?php

namespace App\Http\Controllers;
use App\Models\Alumnos;

use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    //login de alumnos
    public function loginAlumno()
    {
        return view('laravel-examples/loginAlumno');
    }

    public function checkAlumno(Request $request)
    {
        $request->validate([
            'email_alumno' => 'required|email',
            'password_alumno' => 'required|min:8|max:50'
        ]);

        $userInfo = Alumnos::where('email_alumno', '=', $request->email_alumno)->first();

        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            if($request->password_alumno == $userInfo->password_alumno){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('/dashboardAlumno');
            }else{
                return back()->with('fail','Incorrect password');
            }
        }
    }
    
}
