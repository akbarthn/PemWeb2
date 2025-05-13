<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        return view('products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validasi = \Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:products,slug',
            'description' => 'nullable|max:1000',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        //jika validasi gagal
        if($validasi->fails()){
            return redirect()->back()
                ->withErrors($validasi)
                ->with('error','Validasi Gagal')
                ->withInput();
        }

        //jika validasi berhasil
        // Create a new product instance
        $product = new Products();
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description =$request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');

        // Generate dan set SKU
        $product->sku = Products::generateSku();
        $product->save();

        // Save the product to the database
        $product->save();

        return redirect()
        ->route('products.index')
        ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Products::findOrFail($id);
        return view('products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:products,slug,' . $id,
            'description' => 'nullable|max:1000',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        //jika validasi gagal
        if($validatedData->fails()){
            return redirect()->back()
                ->withErrors($validatedData)
                ->with('error','Validasi Error, Silahkan
                lengkapi data terlebih dahulu')
                ->withInput();
        }

        //jika validasi berhasil
        // Find the product and update its details
        $product = Products::findOrFail($id);
        $product->name = $validatedData['name'];
        $product->slug = $validatedData['slug'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->stock = $validatedData['stock'];

        // Save the updated product to the database
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the product and delete it
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
