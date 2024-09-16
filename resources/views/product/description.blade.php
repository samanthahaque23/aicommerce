<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4">
            {{ $product->title }}
        </h1>
        
        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <div class="aspect-w-1 aspect-h-1 max-w-md mx-auto">
                <img src="{{ $product->image }}" alt="Product Image" class="w-full h-auto object-cover rounded-lg"/>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <h1 class="text-bold text-lg font-medium mb-2">Allergens</h1>

            @php
                // Assuming the allergens are listed in the description separated by commas
                $allergens = explode(',', strip_tags($product->description));
            @endphp

            @if(count($allergens) > 1)
                <div class="flex flex-wrap gap-2">
                    @foreach($allergens as $allergen)
                        @if(trim($allergen) !== '') <!-- Avoid empty buttons -->
                            <button class="bg-gray-200 text-gray-800 py-1 px-3 rounded-lg text-sm">
                                {{ trim($allergen) }}
                            </button>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>

        <a href="{{ route('product.view', $product->slug) }}" class="text-purple-500 hover:text-purple-700">
            Go Back to Product Page
        </a>
    </div>
</x-app-layout>
