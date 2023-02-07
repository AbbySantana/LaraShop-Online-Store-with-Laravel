<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function perfil()
    {
        $viewData = [];
        $viewData["title"] = "Perfil del usuario";
        return view('perfil')->with("viewData", $viewData);
    }
}
