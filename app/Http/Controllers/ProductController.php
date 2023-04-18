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
        $products = Product::all();
        return response()->json(['message' => 'success!', 'data' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|string']);
        Product::create($validated);
        return response()->json(['message' => 'succesfully added!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Product::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $p = Product::findOrFail($id);
        $p->name = $request->name;
        $p->save();
        return response()->json(['message' => 'succesfully updated!', 'item' => $p]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $p = Product::findOrFail($id);
        $p->delete();
        return response()->json(['message' => 'succesfully removed!']);
    }
}
