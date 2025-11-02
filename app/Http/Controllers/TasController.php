<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasController extends Controller
{
    public function tas_inicio(){
        return view('tas.inicio');
    }

    public function tas_loginView(){
        return view('tas.login');
    }

    public function tas_inicioSesion(Request $request){
        
    }
}
