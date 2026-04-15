<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PageSeo;
use Illuminate\Http\Request;

class ProductsPageController extends Controller
{
    public function index()
    {
        $products = Product::with(['images', 'specification'])->paginate(12);
        $pageSeo = PageSeo::where('page_name', 'products')->first();
        return view('products', ['products' => $products, 'seo' => $pageSeo]);
    }
}
