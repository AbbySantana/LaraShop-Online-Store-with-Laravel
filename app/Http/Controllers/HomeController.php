<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Titulo con route";
        return view('home.index')->with("viewData", $viewData);
    }

    public function about() {
        $viewData = [];
        $viewData["title"] = "Tienda Online de Abby";
        $viewData["subtitle"]  = "Todo lo que ves se vende";
        $viewData["descripcion"]  = "Se mira y se compra";
        $viewData["author"]  =  "Por Abigail Santana";
        return view('home.about')
            ->with("viewData", $viewData);
    }





}
