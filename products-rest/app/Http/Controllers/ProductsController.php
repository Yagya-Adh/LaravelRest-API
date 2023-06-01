<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return Product::create([
        //     'name' => "Product one",
        //     'email' => "Product mail gmail.",
        //     'description' => "This is the Product one description.",
        //     'price' => "99.99"
        // ]);

        //just simple validate
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);



        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Product::destroy($id);
    }




    /**
     *   search.
     * 
     * @param str $name
     * 
     * @return \Illumination\Http\Response
     * 
     */
    public function search(string $name)
    {
        return Product::where('name', 'like', '%' . $name . '%')->get();
    }
}
