<?php

namespace App\Http\Controllers;
use Illuminate\Http\Exception;
use Illuminate\Http\JsonResponse;
use App\Models\Product;
use Illuminate\Support\Facades\Http;


class ApiProductsController extends Controller
{
    public function index()
    {
        try {
            $products = Product::all();
        } catch (Exception $e) {
            return response()->json([
                'data' => [],
                'message'=>$e->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
        return response()->json([
            'data' => $products,
            'message' => 'Succeed'
        ], JsonResponse::HTTP_OK);

    }


}
