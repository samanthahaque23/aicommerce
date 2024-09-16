<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Display the list of products and top-loved products
    public function index()
    {
        // Fetch the regular products from the database
        $products = Product::query()->orderBy('updated_at', 'desc')->paginate(8);
        $heroProducts = $products->take(5);
        

        // Return the view with both regular products and top-loved products
        return view('product.index', [
            'products' => $products,
            'heroProducts' => $heroProducts,
        ]);
    }

    // Display a single product
    public function view(Product $product)
    {
        // Generate the QR code URL for the product
        $url = route('product.description', $product->slug); // Updated route to description
        
        // Generate QR Code using SimpleSoftwareIO\QrCode with GD
        $qrCodeImage = QrCode::format('png')->size(200)->generate($url);

        // Save QR Code to a file in the public storage directory
        $filePath = 'qrcodes/' . $product->slug . '.png';
        Storage::disk('public')->put($filePath, $qrCodeImage);

        // Return the view with the product and QR code URL
        return view('product.view', [
            'product' => $product,
            'qrCodeUrl' => asset('storage/' . $filePath) // Provide the URL for downloading
        ]);
    }

    // Method to show the product description
    public function showDescription($slug)
    {
        // Retrieve the product based on the slug
        $product = Product::where('slug', $slug)->firstOrFail();

        // Return a view with the product description
        return view('product.description', compact('product'));
    }

  

    
}
