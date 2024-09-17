<x-app-layout>

 
    
    <!-- All Products Section -->
    <section class="all-products p-10">
        <h2 class="text-4xl font-bold mb-5 text-yellow-500">All Products</h2>
    
        <!-- Displaying Regular Products -->
        <div class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach($products as $product)
                <!-- Product Item -->
                <div
                    x-data="productItem({{ json_encode([
                        'id' => $product->id,
                        'image' => $product->image,
                        'title' => $product->title,
                        'price' => $product->price,
                    ]) }})"
                    class="border border-1 border-gray-200 rounded-md hover:border-yellow-500 transition-colors bg-white flex flex-col"
                >
                    <!-- Image with fixed aspect ratio -->
                    <a href="{{ route('product.view', $product->slug) }}" class="block overflow-hidden">
                        <div class="aspect-w-1 aspect-h-1 w-full h-64">
                            <img
                                src="{{ $product->image }}"
                                alt="{{ $product->title }}"
                                class="object-cover w-full h-full rounded-lg hover:scale-105 hover:rotate-1 transition-transform"
                            />
                        </div>
                    </a>
                    <div class="p-4 flex-grow">
                        <h3 class="text-lg">
                            <a href="{{ route('product.view', $product->slug) }}">
                                {{ $product->title }}
                            </a>
                        </h3>
                        <h5 class="font-bold">${{ $product->price }}</h5>
                    </div>
                   
                </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </section>
    
    <footer class="bg-black text-white p-10 mt-10">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Company Information -->
            <div>
                <h3 class="text-2xl text-yellow-500 font-bold mb-4">About Us</h3>
                <p class="text-white">
                    We provide the best  products that you will absolutely love. Discover our wide range of products from top brands at unbeatable prices.
                </p>
            </div>
    
            <!-- Quick Links -->
            <div>
                <h3 class="text-2xl text-yellow-500 font-bold mb-4">Quick Links</h3>
                <ul>
                    <li class="mb-2">
                        <a href="#" class="text-white hover:underline">Home</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-white hover:underline">Shop</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-white hover:underline">Contact Us</a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-white hover:underline">About Us</a>
                    </li>
                </ul>
            </div>
    
            <!-- Contact Information -->
            <div>
                <h3 class="text-2xl text-yellow-500 font-bold mb-4">Contact Us</h3>
                <p class="text-white">
                    Email: <a href="mailto:info@beautyshop.com" class="text-white underline">info@beautyshop.com</a>
                </p>
                <p class="text-white">
                    Phone: <a href="tel:+1234567890" class="text-white underline">+1 234 567 890</a>
                </p>
                <p class="text-white">
                    Address: 123 Beauty Avenue, Suite 100, City, State, ZIP
                </p>
            </div>
        </div>
    
        <div class="border-t border-white mt-10 pt-6 text-center text-white">
            <p>&copy; 2024 AI-commerce. All rights reserved.</p>
        </div>
    </footer>
    
    </x-app-layout>
    