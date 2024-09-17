<x-app-layout>
    <section class="product-details p-10">
        <h2 class="text-4xl font-bold mb-5 text-yellow-500">Product Details</h2>

        <div class="border border-1 border-gray-200 rounded-md bg-white p-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    @if ($product->image)
                        <img src="{{ $product->image }}" alt="{{ $product->title }}" class="w-64 h-64 object-cover rounded-lg">
                    @endif
                </div>
                <div class="ml-6">
                    <h3 class="text-2xl font-bold">{{ $product->title }}</h3>
                    <p class="text-gray-500">{{ $product->price }}</p>
                </div>
            </div>
            <div class="mt-6">
                <a href="{{ route('admin.products.edit', $product) }}" class="btn-primary bg-yellow-500 hover:bg-yellow-600">
                    Edit
                </a>
                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger bg-red-500 hover:bg-red-600">
                        Delete
                    </button>
                </form>
                <a href="{{ route('admin.products.index') }}" class="btn-secondary bg-gray-500 hover:bg-gray-600">
                    Back to List
                </a>
            </div>
        </div>
    </section>
</x-app-layout>
