<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show Product to Specific Id
    public function showProduct(string $id) {
        return view('product');
    }
}
