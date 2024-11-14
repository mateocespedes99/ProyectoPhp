<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index () {
        return view ('welcome');
    }

}


// helpers
//config = ('aca se puede pasar un valor', 'aca si no se encuentra se puede pasar uno por defecto')
// dump and die -> dd(se le pasa una vble por ej que deseo saber que valor está tomando) me muestra que valor toma y detiene la ejecución del codigo
