<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Specification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager load specification and images to avoid N+1 queries
        $products = Product::with(['specification', 'images'])->orderByDesc('created_at')->get();
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
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120', // max 5MB
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

        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'moq' => $request->moq,
            'specification_id' => $curr_spec->id
        ]);

        // Handle image uploads
        if ($request->hasFile('images')) {
            $position = 1;
            foreach ($request->file('images') as $image) {
                // Store image in public/storage/products directory
                $imagePath = $image->store('products', 'public');
                
                // Create ProductImage record
                $product->images()->create([
                    'image_path' => $imagePath,
                    'position' => $position,
                ]);
                
                $position++;
            }
        }

        return redirect()->route('product.index')->with('status', 'Product added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with(['specification', 'images'])->findOrFail($id);
        return view("admin.product.show", ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::with(['specification', 'images'])->findOrFail($id);
        return view("admin.product.edit", ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::with(['specification', 'images'])->findOrFail($id);

        // Validate input
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
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120', // max 5MB
        ]);

        // Update product
        $product->update([
            'title' => $request->title,
            'description' => $request->description,
            'moq' => $request->moq,
        ]);

        // Update specification
        $product->specification->update($request->only([
            'usage',
            'material',
            'weight',
            'voltage',
            'color',
            'frequency',
            'temperature',
        ]));

        // Handle new image uploads
        if ($request->hasFile('images')) {
            $position = 1;
            foreach ($request->file('images') as $image) {
                // Store image in public/storage/products directory
                $imagePath = $image->store('products', 'public');
                
                // Create ProductImage record
                $product->images()->create([
                    'image_path' => $imagePath,
                    'position' => $position,
                ]);
                
                $position++;
            }
        }

        // Handle image deletion if requested
        if ($request->has('delete_images') && is_array($request->delete_images)) {
            foreach ($request->delete_images as $imageId) {
                $productImage = $product->images()->find($imageId);
                if ($productImage) {
                    // Delete file from storage
                    Storage::disk('public')->delete($productImage->image_path);
                    // Delete record from database
                    $productImage->delete();
                }
            }
        }

        return redirect()->route('product.index')->with('status', 'Product updated successfully');
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
