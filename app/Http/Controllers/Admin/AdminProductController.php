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
            'especificaciones' => 'required',
        ]);

        $product = new Product();
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->especificaciones = $validatedData['especificaciones'];
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
        $id = $product->getId();
        if ($request->hasFile('especificaciones')){
            Storage::disk('public')->put(
            $id .'.' . ($request->file('especificaciones')->extension()),
            file_get_contents($request->file('especificaciones')->getRealPath())
        );
        $product->especificaciones =  $id .'.' . ($request->file('especificaciones')->extension());

        };
        $product->save();
        return redirect()->route('admin.product.index')->with('success', 'Product created successfully');
    }

    public function delete(int $id){
        $product = Product::find($id);
        Storage::disk('public')->delete($product->image);
        Storage::disk('public')->delete($product->especificaciones);
        Product::destroy($id);
        return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully');
    }

    public function edit(int $id){
        $viewData = [];
        $viewData["title"] = "Panel de Control";
        $product = "";
        try {$product = Product::findOrFail($id);}
        catch(ModelNotFoundException $e){return view('products.error')->with("error", $e);}
        $viewData["product"] = $product;
        return view('admin.product.edit')->with("viewData", $viewData);
    }

    public function update(int $id, Request $request){
        $product = Product::find($id);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
        ]);
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];


        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
            $product->image = $id . '.' . ($request->file('image')->extension());

            Storage::disk('public')->put($product->image,
                file_get_contents($request->file('image')->getRealPath())
            );
        }

        if ($request->hasFile('especificaciones')) {
            Storage::disk('public')->delete($product->especificaciones);
            $product->especificaciones = $id . '.' . ($request->file('especificaciones')->extension());

            Storage::disk('public')->put($product->especificaciones,
                file_get_contents($request->file('especificaciones')->getRealPath())
            );
        }
        $product->save();
        return redirect()->route('admin.product.index')->with('success', 'Product created successfully');

    }
}
