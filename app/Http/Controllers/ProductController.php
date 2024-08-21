<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    // Display the list of products and top-loved products
    public function index()
    {
        // Fetch the regular products from the database
        $products = Product::query()->orderBy('updated_at', 'desc')->paginate(8);

        // Fetch top-loved products from the Flask API
        $topLovedResponse = Http::get('http://127.0.0.1:5000/api/top_loved_products');

        // Check if the API request is successful
        if ($topLovedResponse->successful()) {
            $topLovedProducts = $topLovedResponse->json();  // Get the top-loved products from the Flask API
        } else {
            $topLovedProducts = [];  // Fallback to an empty array if the API request fails
        }

        // Debugging: Check the response of topLovedProducts
        if (empty($topLovedProducts)) {
            dd('No top loved products available', $topLovedResponse->status());
        }

        // Return the view with both regular products and top-loved products
        return view('product.index', [
            'products' => $products,
            'topLovedProducts' => $topLovedProducts // Pass top-loved products to the view
        ]);
    }

    // Display a single product
    public function view(Product $product)
    {
        return view('product.view', ['product' => $product]);
    }

    // New method to handle the route for top-loved products only
    public function showTopLoved()
    {
        // Fetch top-loved products from the Flask API
        $topLovedResponse = Http::get('http://127.0.0.1:5000/api/top_loved_products');

        // Check if the API request is successful
        if ($topLovedResponse->successful()) {
            $topLovedProducts = $topLovedResponse->json();  // Get the top-loved products from the Flask API
        } else {
            $topLovedProducts = [];  // Fallback to an empty array if the API request fails
        }

        // Debugging: Check the response of topLovedProducts
        if (empty($topLovedProducts)) {
            dd('No top loved products available', $topLovedResponse->status());
        }

        // Return the view with top-loved products
        return view('product.top_loved', [
            'topLovedProducts' => $topLovedProducts // Pass top-loved products to the view
        ]);
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
