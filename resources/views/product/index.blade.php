<x-app-layout>

<!-- Hero Image Slider Section -->
<section class="hero-slider relative w-full h-[500px] mb-10" style="border: 30px solid #000">
    <div class="swiper-container bg-pink-700" style="height: 500px;">
        <div class="swiper-wrapper">
            @foreach(array_slice($topLovedProducts, 0, 5) as $product)
                <div class="swiper-slide flex items-center">
                    <!-- Product Image on the left -->
                    <div class="w-1/2 h-3/4">
                        <img
                            src="{{ $product['image_link'] ?? '' }}" 
                            alt="{{ $product['product_name'] ?? '' }}"
                            class="object-cover w-full h-full"
                        />
                    </div>
                    
                    <!-- Overlay Content on the right -->
                    <div class="w-1/2 h-full text-white flex flex-col justify-center p-10">
                        <h2 class="text-4xl font-bold mb-2">{{ $product['product_name'] ?? 'Product Name' }}</h2>
                        <h3 class="text-2xl mb-4">{{ $product['brand_name'] ?? 'Brand Name' }}</h3>
                        
                        <!-- Check if the slug exists before using it in the link -->
                        @if(isset($product['slug']))
                            <a href="{{ route('product.view', $product['slug']) }}" class="bg-pink-700 text-white py-2 px-6 rounded-lg hover:bg-purple-800 transition-all">
                                Shop Now
                            </a>
                        @else
                            <button disabled class="bg-black text-white py-2 px-6 rounded-md">
                                Shop Now
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

    
    </div>
</section>


    <!-- Section for Top Loved Products -->
    <section class=" px-10 pb-10 pt-20">
        <h1 class="text-4xl font-bold mb-5 text-pink-700">Top Loved Products</h1>

        <!-- Swiper Container -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @if(!empty($topLovedProducts))
                    @foreach($topLovedProducts as $product)
                        <!-- Swiper Slide -->
                        <div class="swiper-slide">
                            <div class="border border-1 border-gray-200 rounded-md bg-white flex flex-col">
                                <div class="aspect-w-1 aspect-h-1 w-full h-64">
                                    <img
                                        src="{{ $product['image_link'] }}" 
                                        alt="{{ $product['product_name'] }}"
                                        class="object-cover w-full h-full rounded-lg"
                                    />
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg">
                                        <span>{{ $product['product_name'] }}</span>
                                    </h3>
                                    <p>Brand: {{ $product['brand_name'] }}</p>
                                    <p>Price: ${{ $product['price_usd'] }}</p>
                                    <p>Loves: {{ $product['loves_count'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No top loved products available at the moment.</p>
                @endif
            </div>

            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>

      
        </div>
    </section>

   <section class="all-products p-10 ">
    <h2 class="text-4xl font-bold mb-5   text-pink-700">All Products</h2>

    <!-- Displaying Regular Products -->
    <div class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 ">
        @foreach($products as $product)
            <!-- Product Item -->
            <div
                x-data="productItem({{ json_encode([
                    'id' => $product->id,
                    'image' => $product->image,
                    'title' => $product->title,
                    'price' => $product->price,
                ]) }})"
                class="border border-1 border-gray-200 rounded-md hover:border-pink-700 transition-colors bg-white flex flex-col"
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
                            {{$product->title}}
                        </a>
                    </h3>
                    <h5 class="font-bold">${{$product->price}}</h5>
                </div>
                <!-- Button Area -->
                <div class="flex justify-between items-center py-3 px-4 mt-auto">
                    <button
                        @click="addToWatchlist()"
                        class="w-10 h-10 rounded-full border border-1 border-pink-700 flex items-center justify-center hover:bg-pink-700 hover:text-white active:bg-purple-800 transition-colors"
                        :class="isInWatchlist(id) ? 'bg-pink-700 text-white' : 'text-pink-700'"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                            />
                        </svg>
                    </button>
                    <button class="btn-primary bg-pink-700 hover:bg-black" @click="addToCart(id)">
                        Add to Cart
                    </button>
                </div>
            </div>
        @endforeach
    </div>
    {{$products->links()}}
   </section>
    <footer class="bg-black text-white p-10 mt-10">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Company Information -->
            <div>
                <h3 class="text-2xl text-pink-700 font-bold mb-4">About Us</h3>
                <p class="text-white">
                    We provide the best beauty products that you will absolutely love. Discover our wide range of products from top brands at unbeatable prices.
                </p>
            </div>
    
            <!-- Quick Links -->
            <div>
                <h3 class="text-2xl  text-pink-700 font-bold mb-4">Quick Links</h3>
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
                <h3 class="text-2xl  text-pink-700 font-bold mb-4">Contact Us</h3>
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
