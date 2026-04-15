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
        // Eager load specification, images, and seo to avoid N+1 queries
        $products = Product::with(['specification', 'images', 'seo'])->orderByDesc('created_at')->get();
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
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'og_title' => 'nullable|string|max:100',
            'og_description' => 'nullable|string|max:160',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
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
            'description' => $this->sanitizeHtml($request->description),
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

        // Handle SEO data
        $seoData = [
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'og_title' => $request->og_title,
            'og_description' => $request->og_description,
        ];

        // Handle OG image upload
        if ($request->hasFile('og_image')) {
            $ogImagePath = $request->file('og_image')->store('ogimages', 'public');
            $seoData['og_image'] = $ogImagePath;
        }

        $product->seo()->create($seoData);

        return redirect()->route('product.index')->with('status', 'Product added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with(['specification', 'images', 'seo'])->findOrFail($id);
        return view("admin.product.show", ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::with(['specification', 'images', 'seo'])->findOrFail($id);
        return view("admin.product.edit", ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::with(['specification', 'images', 'seo'])->findOrFail($id);

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
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'og_title' => 'nullable|string|max:100',
            'og_description' => 'nullable|string|max:160',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'delete_og_image' => 'nullable|boolean',
        ]);

        // Update product
        $product->update([
            'title' => $request->title,
            'description' => $this->sanitizeHtml($request->description),
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

        // Handle SEO data
        $seoData = [
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'og_title' => $request->og_title,
            'og_description' => $request->og_description,
        ];

        // Handle OG image deletion
        if ($request->delete_og_image && $product->seo && $product->seo->og_image) {
            Storage::disk('public')->delete($product->seo->og_image);
            $seoData['og_image'] = null;
        }

        // Handle OG image upload
        if ($request->hasFile('og_image')) {
            // Delete old OG image if exists
            if ($product->seo && $product->seo->og_image) {
                Storage::disk('public')->delete($product->seo->og_image);
            }
            $ogImagePath = $request->file('og_image')->store('ogimages', 'public');
            $seoData['og_image'] = $ogImagePath;
        }

        // Update or create SEO data
        if ($product->seo) {
            $product->seo->update($seoData);
        } else {
            $product->seo()->create($seoData);
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

    /**
     * Sanitize HTML content from CKEditor
     * Allows safe tags like p, br, b, i, u, h1-h6, ul, ol, li, img, a, strong, em
     */
    private function sanitizeHtml($html)
    {
        if (!$html) return null;

        $allowed_tags = [
            'p', 'br', 'b', 'i', 'u', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
            'ul', 'ol', 'li', 'img', 'a', 'strong', 'em', 'span',
            'blockquote', 'figure', 'figcaption'
        ];

        // Create allowed tags string
        $allowed = '<' . implode('><', $allowed_tags) . '>';

        // Strip tags not in allowed list
        return strip_tags($html, $allowed);
    }
}
