<x-app-layout>
    <section class="all-products p-10">
        <h2 class="text-4xl font-bold mb-5 text-yellow-500">All Products</h2>

        <!-- Add Product Button -->
        <div class="mb-4">
            <a href="{{ route('admin.products.create') }}" class="btn-primary bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-md">
                Add New Product
            </a>
        </div>

        <!-- Search Form -->
        <form method="GET" action="{{ route('admin.products.index') }}" class="mb-6">
            <div class="flex">
                <input type="text" name="search" placeholder="Search" value="{{ request('search') }}" class="form-input w-full border-gray-300 rounded-md shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-500 focus:ring-opacity-50">
                <button type="submit" class="ml-2 bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-md">
                    Search
                </button>
            </div>
        </form>

        <!-- Product Grid -->
        <div class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach($products as $product)
                <div class="border border-gray-200 rounded-md bg-white flex flex-col shadow-sm">
                    <a href="{{ route('admin.products.show', $product) }}" class="block overflow-hidden">
                        <div class="aspect-w-1 aspect-h-1 w-full h-64">
                            <img
                                src="{{ $product->image }}"
                                alt="{{ $product->title }}"
                                class="object-cover w-full h-full rounded-t-md hover:scale-105 transition-transform"
                            />
                        </div>
                    </a>
                    <div class="p-4 flex-grow">
                        <h3 class="text-lg font-bold mb-2">
                            <a href="{{ route('admin.products.show', $product) }}" class="text-gray-800 hover:text-yellow-500">{{ $product->title }}</a>
                        </h3>
                        <p class="text-gray-500">{{ $product->price }}</p>
                    </div>
                    <div class="flex justify-between items-center py-3 px-4 mt-auto">
                        <a href="{{ route('admin.products.edit', $product) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-md">
                            Edit
                        </a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirmDelete(event)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </section>

    <!-- JavaScript for Confirm Delete -->
    <script>
        function confirmDelete(event) {
            event.preventDefault();
            if (confirm('Are you sure you want to delete this product?')) {
                event.target.submit();
            }
        }
    </script>
</x-app-layout>
