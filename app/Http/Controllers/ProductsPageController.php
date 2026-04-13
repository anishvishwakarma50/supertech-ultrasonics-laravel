<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsPageController extends Controller
{
    public function index()
    {
        $products = Product::with(['images', 'specification'])->paginate(12);
        return view('products', ['products' => $products]);
    }
}
