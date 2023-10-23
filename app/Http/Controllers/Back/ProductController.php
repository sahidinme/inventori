<?php

namespace App\Http\Controllers\Back;

use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.product.index', [
            'product' => Product::with('Categories')->latest()->get(),
            'categories' => Categories::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required'
            
        ]);


        Product::create($data);

        return back()->with('success', 'Product has been created');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = $request->validate([
            'name' => 'required|min:3',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        Product::find($id)->update($data);

        return back()->with('success', 'Product has been Updated');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::find($id)->delete();

        return back()->with('success', 'Product has been Delete');
    }
}
