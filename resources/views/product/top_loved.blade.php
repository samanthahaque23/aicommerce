<x-app-layout>
    <!-- Section for Top Loved Products -->
    <section class="py-10">
        <h2 class="text-2xl font-bold mb-5">Top Loved Products</h2>
        <div class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 p-5">
            @if(!empty($topLovedProducts))
                @foreach($topLovedProducts as $product)
                    <div class="border border-1 border-gray-200 rounded-md bg-white flex flex-col">
                        <div class="aspect-w-1 aspect-h-1 w-full h-64">
                            <img
                                src="{{ $product['image_link'] }}" <!-- Assuming API returns 'image_link' field -->
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
