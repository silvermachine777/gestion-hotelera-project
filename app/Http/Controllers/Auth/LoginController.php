<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use App\User;

class LoginController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest', ['only' => 'showLoginForm']);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    //Metodo para hacer login
    public function login()
    {   
        //Validacion de campos formulario
        $credentials =$this->validate(Request(), 
        [
            $this->username() => 'required|string',
            'password' => 'required|string'
        ]);
        
        //Condición para validar si el usuario existe
        if(Auth::attempt($credentials))
        {
            $user = User::where('cedula','=', $credentials['cedula'])->first(); 
            if($user->estado_usuario == '1')
            {
                
                return redirect()->route('dashboard');
            }
            else
            {
                Flash::error("El usuario esta inactivo.");                
                Auth::logout();
                return redirect('/');
                
            }
        }

        else
        {
            Flash::error("El usuario no existe");     
            Auth::logout();   
            return redirect('/');   
        }
    }

    //Metodo para hacer logout
    public function logout()
    {        
        Auth::logout();
        
        return redirect('/');
    }

    //Metodo para autenticar con otro campo de la bbdd
    public function username()
    {
        return 'cedula';
    }
}
