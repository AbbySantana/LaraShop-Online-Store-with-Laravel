<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function about() {
        $dato1 = "Tienda Online de Abby";
        $dato2 = "Todo lo que ves se vende";
        $dato3 = "Se mira y se compra";
        $dato4 = "Por Abigail Santana";
        return view('home.about')
            ->with("title", $dato1)
            ->with("subtitle", $dato2)
            ->with("description", $dato3)
            ->with("author", $dato4);
    }
}
