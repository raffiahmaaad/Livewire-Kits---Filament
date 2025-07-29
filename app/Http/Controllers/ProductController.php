<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'brand'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Debug untuk memastikan controller dipanggil
        dd('Controller called! Products count: ' . $products->count(), $products->toArray());

        return view('pages.product', compact('products'));
    }

    public function show(Product $product)
    {
        $product->load(['category', 'brand']);

        // Get related products from same category
        $relatedProducts = Product::with(['category', 'brand'])
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_featured', true)
            ->limit(3)
            ->get();

        return view('pages.product-detail', compact('product', 'relatedProducts'));
    }
}
