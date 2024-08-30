<x-app-layout>
  
    <section class="bg-gray-100">
        <div class="container mx-auto mt-10 px-4">
            <h1 class="text-4xl font-bold mb-6 text-pink-700">Recommended Products</h1>
            <div class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @if(isset($products) && count($products) > 0)
                    @foreach($products as $product)
                        <div class="border border-gray-200 rounded-lg bg-white shadow-md overflow-hidden">
                            <img src="https://via.placeholder.com/150" alt="Product Image" class="object-cover w-full h-48">
                            <div class="p-4">
                                <!-- Product Name -->
                                <h5 class="text-lg font-semibold mb-2">{{ $product[0] }}</h5>
                                
                                <!-- Ingredients (cleaning up newlines and array-like string) -->
                                <p class="text-gray-700 mb-2">
                                    Ingredients: {{ trim(preg_replace('/[\r\n]+/', ' ', strip_tags($product[1]))) }}
                                </p>
    
                                <!-- Skin Type (implode array into a string) -->
                                <p class="text-gray-700">
                                    Skin Type: {{ is_array($product[2]) ? implode(', ', $product[2]) : $product[2] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-700">No recommendations found.</p>
                @endif
            </div>
        </div>
    </section>
   
    </x-app-layout>
    