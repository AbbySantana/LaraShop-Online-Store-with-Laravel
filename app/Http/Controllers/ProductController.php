<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public static array $products;



    public function insertar()
    {
        ProductController::$products[0] = array("id" => 1, "name" => "Nintendo 3DS negro",   "description" => "Consola portátil de Nintendo que permitirá disfrutar de efectos 3D sin necesidad de gafas especiales, e incluirá retrocompatibilidad con el software de DS y de DSi.",
        "image" => asset('img/nintendo.webp'), "price" => 270.00);
        ProductController::$products[1] = array("id" => 2, "name" => "Pentax Optio LS1100",   "description" => " La LS1100 con funda de transporte y tarjeta de memoria de 2GB incluidas es la compacta digital que te llevarás a todas partes. Esta cámara diseñada por Pentax incorpora un sensor CCD de 14,1 megapíxeles y un objetivo gran angular de 28 mm.
        ",
        "image" => asset('img/penta.jfif'), "price" =>104.80);
        ProductController::$products[3] = array("id" => 3, "name" => "Kingston DataTraveler G3 32GB rojo",   "description" => " Características: Tipo de producto Unidad flash USB Capacidad almacenamiento32GB Anchura 58.3 mm Profundidad 23.6 mm Altura 9.0 mm Peso 12 g Color incluido RED Tipo de interfaz USB.",
        "image" => asset('img/kingston.webp'), "price" =>40.00);
        ProductController::$products[2] = array("id" => 4, "name" => "Toshiba SD16GB Class10 Jewel Case",   "description" => "Características: Densidad: 16 GB PINs de conexión: 9 pins Interfaz: Tarjeta de memoria SD standard compatible Velocidad de Escritura: 20 MBytes/s* Velocidad de Lectura: 20 MBytes/s* Dimensiones: 32.0 mm (L) × 24.0 mm (W) × 2.1 mm (H) Peso: 2g Temperatura: -25°C a +85°C (Recomendada) Humedad: 30% to 80% RH (sin condensación)",
        "image" => asset('img/tarjetaSD.webp'), "price" => 32.60);

    }


    public function index() {
        $this -> insertar();
        $viewData = [];
        $viewData["title"] = "Nuestros Productos";
        $viewData["subtitle"] = "Listado de Productos";
        $viewData["products"] = ProductController::$products;
        return view('products.index')->with("viewData", $viewData);
    }
    function show(int $id){
        $this -> insertar();
        $prodID = $this -> getProduct($id);

        $viewData = [];
        $viewData["title"] = "Detalles del Producto - Tienda online";
        $viewData["subtitle"] = "Listado de Productos";
        $viewData["products"] = ProductController::$products[$prodID];
        return view('products.show')->with("viewData", $viewData);
    }

    private function getProduct(int $id): int{
        if($id == 0) return -1;
        for ($i = 0; $i < sizeof(ProductController::$products); $i++)
            if(ProductController::$products[$i]["id"] == $id) return $i;
        return -1;
    }


}
