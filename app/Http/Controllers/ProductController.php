<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    // Display the list of products (index page)
    public function index()
    {
        $products = Product::query()->orderBy('updated_at', 'desc')->paginate(5);
        return view('product.index', [
            'products' => $products
        ]);
    }

    // Display a single product (view page)
    public function view(Product $product)
    {
        return view('product.view', ['product' => $product]);
    }

    // Show the recommendation form (GET request)
    public function showRecommendationForm()
    {
        return view('product.form');  // This should match the path 'resources/views/product/form.blade.php'
    }

    // Handle the recommendation request (POST request)
    public function getRecommendations(Request $request)
    {
        // Send POST request to the Flask API
        $response = Http::post('http://127.0.0.1:5000/api/recommend_products', [
            'product_name' => $request->input('product_name'),
            'skin_type' => $request->input('skin_type'),
            'secondary_category' => $request->input('secondary_category'),
        ]);
    
        // Check if the response was successful
        if ($response->successful()) {
            $recommendations = $response->json();
            return view('product.form', ['products' => $recommendations['recommendations']]);
        } else {
            return view('product.form')->with('error', 'Failed to retrieve recommendations');
        }
    }
    
    
}
