<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show Product to Specific Id
    public function showProduct(string $id, string $title) {
        $product_data = Product::with(['images', 'specification'])->find($id);
        // dd($product_data);
        // dd($product_data->specification);
        return view('product', ['product_data' => $product_data]);
    }
}
