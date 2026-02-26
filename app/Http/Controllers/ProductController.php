<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show Product to Specific Id
    public function showProduct(string $id) {
        // dd($nid);
        $product_data = Product::find($id);
        // dd($product_data);
        return view('product', ['product_data' => $product_data]);
    }
}
