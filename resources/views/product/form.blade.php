<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Recommendation Form</title>
        <!-- Tailwind CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
        <style>
            /* Custom styles */
            .card-body {
                overflow: auto; /* Enable scroll if content is too long */
                max-height: 200px; /* Set a maximum height for card content */
            }
        </style>
    </head>
    <body class="bg-gray-100">
        <div class="container mx-auto mt-10 px-4">
            <!-- Form Section -->
            <div class="bg-white shadow-md rounded-lg p-6 mb-10">
                <h1 class="text-2xl font-bold mb-6">Get Product Recommendations</h1>
                
                <!-- Form for product recommendations -->
                <form action="{{ route('product.recommend') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="product_name" class="block text-sm font-medium text-gray-700">Product Name</label>
                        <input type="text" name="product_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" id="product_name" placeholder="Enter product name (optional)">
                    </div>
                    <div>
                        <label for="skin_type" class="block text-sm font-medium text-gray-700">Skin Type</label>
                        <input type="text" name="skin_type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" id="skin_type" placeholder="Enter skin type">
                    </div>
                    <div>
                        <label for="secondary_category" class="block text-sm font-medium text-gray-700">Secondary Category</label>
                        <input type="text" name="secondary_category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" id="secondary_category" placeholder="Enter secondary category">
                    </div>
                    <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Get Recommendations</button>
                </form>
            </div>

            <!-- Recommendations Section -->
            @if(isset($products) && count($products) > 0)
                <div>
                    <h2 class="text-xl font-semibold mb-6">Recommended Products</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        @foreach($products as $product)
                            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                                <img src="https://via.placeholder.com/150" alt="Product Image" class="w-full h-40 object-cover">
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold mb-2">{{ $product[0] }}</h3>
                                    <!-- Display Skin Type -->
                                    <p class="text-sm text-gray-600">
                                        Skin Type: {{ is_array($product[2]) ? implode(', ', $product[2]) : $product[2] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @elseif(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
        </div>
    </body>
    </html>
</x-app-layout>
