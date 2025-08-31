<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        // Aktif kategorileri cache ile sıralı olarak al (1 saat cache)
        $categories = Cache::remember('active_categories', 3600, function () {
            return ProductCategory::where('is_active', true)
                ->orderBy('sort_order', 'asc')
                ->orderBy('name', 'asc')
                ->get();
        });

        // Aktif ürünleri kategorileri ile birlikte cache ile al (30 dakika cache)
        $products = Cache::remember('active_products_with_categories', 1800, function () {
            return Product::with('category')
                ->where('is_active', true)
                ->get();
        });

        return view('site.pages.home', compact('categories', 'products'));
    }
}
