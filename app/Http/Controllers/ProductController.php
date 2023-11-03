<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        $productsList = [];
        foreach ($products as $item) {
            $productsData = json_decode($item->all_products, true);
            $productsList[] = [
                'id' => $item->id,
                'name' => $productsData['name'] ?? '',
                'description' => $productsData['description'] ?? '',
                'price' => $productsData['price'] ?? '',
                'stock_quantity' => $productsData['stock_quantity'] ?? '',
            ];
        }
        return view('products.index', ['productsList' => $productsList]);

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
    public function storeArray(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock_quantity' => 'required',
        ]);

        $productsData = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock_quantity' => $request->input('stock_quantity'),
        ];

        $jsonProductsData = json_encode($productsData);
        $products = new Product();
        $products->all_products = $jsonProductsData;
        $products->save();
        // dd($products);
        return redirect()->route('products/index')->with('success', 'Products created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $productsData = json_decode($product->all_products, true);

        return view('products.edit', [
            'id' => $id,
            'name' => $productsData['name'] ?? '',
            'description' => $productsData['description'] ?? '',
            'price' => $productsData['price'] ?? '',
            'stock_quantity' => $productsData['stock_quantity'] ?? '',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock_quantity' => 'required',
        ]);

        $productsData = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock_quantity' => $request->input('stock_quantity'),
        ];

        $jsonProductsData = json_encode($productsData);
        $products = Product::find($id);
        $products->all_products = $jsonProductsData;
        $products->save();
        // dd($products);
        return redirect()->route('products/index')->with('success', 'Products Update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $test = Product::find($id);
        $test->delete();

        return redirect()->route('products/index')->with('success', 'Products Delete successfully!');
    }
}
