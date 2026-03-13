<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Specification;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // right now we don't have the image of Machine
        $products = Product::with(['specification'])->orderByDesc('created_at')->get();
        // dd($products);
        return view("admin.product.index", ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.product.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Logic to Store Product in database
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'moq' => 'required',
            'usage' => 'required',
            'material' => 'required',
            'weight' => 'required',
            'voltage' => 'required',
            'color' => 'required',
            'frequency' => 'required',
            'temperature' => 'required',
        ]);

        $curr_spec = Specification::create($request->only([
            'usage',
            'material',
            'weight',
            'voltage',
            'color',
            'frequency',
            'temperature',
        ]));

        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'moq' => $request->moq,
            'specification_id' => $curr_spec->id
        ]);

        return redirect()->route('product.index')->with('status', 'Product added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("admin.product.show");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("admin.product.edit");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()
        ->route('product.index')
        ->with('status', 'Product Deleted Successfully');
    }
}
