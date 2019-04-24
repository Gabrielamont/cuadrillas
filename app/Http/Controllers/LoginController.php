<?php

namespace App\Http\Controllers;

use App\Comuna;
use App\ConsejoComunal;
use App\Sectores;
use App\Vocero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        //dd(Sectores::all());
        return view("dashboard", [
            "comunas"  => Comuna::all(),
            "cc"       => ConsejoComunal::all(),
            "voceros"  => Vocero::all(),
            "sectores" => Sectores::all(),
        ]);
    }

    public function login(Request $request)
    {
        /*----------- LOGIN MANUAL , MODIFICABLE ----------*/
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->intended('dashboard');
        } else {
            return redirect()->route('login')->withErrors('¡Error! , Revise sus credenciales');
        }
    }

    public function logout()
    {
        /*---- funcion de salir/logout/cerrar sesion --*/
        Auth::logout();
        return view('login');
    }

}
