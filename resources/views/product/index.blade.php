<x-app-layout>
    <!-- Displaying Regular Products -->
    <div class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 p-5">
        @foreach($products as $product)
            <!-- Product Item -->
            <div
                x-data="productItem({{ json_encode([
                    'id' => $product->id,
                    'image' => $product->image,
                    'title' => $product->title,
                    'price' => $product->price,
                ]) }})"
                class="border border-1 border-gray-200 rounded-md hover:border-purple-600 transition-colors bg-white flex flex-col"
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
                        class="w-10 h-10 rounded-full border border-1 border-purple-600 flex items-center justify-center hover:bg-purple-600 hover:text-white active:bg-purple-800 transition-colors"
                        :class="isInWatchlist(id) ? 'bg-purple-600 text-white' : 'text-purple-600'"
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
                    <button class="btn-primary" @click="addToCart(id)">
                        Add to Cart
                    </button>
                </div>
            </div>
        @endforeach
    </div>
    {{$products->links()}}

    <!-- Section for Top Loved Products -->
    <section class="py-10">
        <h2 class="text-2xl font-bold mb-5">Top Loved Products</h2>
        <div class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 p-5">
            @if(!empty($topLovedProducts))
                @foreach($topLovedProducts as $product)
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
                @endforeach
            @else
                <p>No top loved products available at the moment.</p>
            @endif
        </div>
    </section>

</x-app-layout>
