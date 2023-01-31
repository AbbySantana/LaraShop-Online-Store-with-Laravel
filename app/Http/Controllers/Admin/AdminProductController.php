<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index() {
        $viewData = [];
        $viewData["title"] = "Panel de Control";
        $products = "";
        try {$products =  Product::all();}
        catch(ModelNotFoundException $e){return view('admin.product.error')->with("error", $e);}
        $viewData["products"] = $products;
        return view('admin.product.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'image',
        ]);

        $product = new Product();
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->save();
        $id = $product->getId();
        if ($request->hasFile('image')){
            Storage::disk('public')->put(
            $id .'.' . ($request->file('image')->extension()),
            file_get_contents($request->file('image')->getRealPath())
        );
        $product->image =  $id .'.' . ($request->file('image')->extension());

        }else{
            $product->image = 'logoLaravel.jpeg';
        };
        $product->save();
        return redirect()->route('admin.product.index')->with('success', 'Product created successfully');
    }
}
