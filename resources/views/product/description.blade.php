<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4">
            {{ $product->title }}
        </h1>
        <div class="text-xl mb-6">
            <strong>Price:</strong> ${{ $product->price }}
        </div>
        <div class="text-gray-700 mb-6">
            {!! $product->description !!}
        </div>
        <a href="{{ route('product.view', $product->slug) }}" class="text-purple-500 hover:text-purple-700">
            Go Back to Product Page
        </a>
    </div>
</x-app-layout>
