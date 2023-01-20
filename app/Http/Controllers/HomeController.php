<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Mi Tienda Online";
        return view('home.index')->with("viewData", $viewData);
    }

    public function about() {
        $viewData = [];
        $viewData["title"] = "Mi Tienda Online";
        $viewData["subtitle"]  = "Tienda Online de Abby";
        $viewData["descripcion"]  = "Todo lo que buscas aquí lo encontrarás";
        $viewData["author"]  =  "Creada por Abigail Santana";
        return view('home.about')
            ->with("viewData", $viewData);
    }





}
