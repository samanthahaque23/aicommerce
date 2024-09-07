<x-app-layout>
    <div class="container mx-auto p-6">
        <div class="grid gap-6 grid-cols-1 lg:grid-cols-5">
            <!-- Image Section -->
            <div class="lg:col-span-3">
                <!-- Product Image Carousel (Existing code) -->
                <div
                    x-data="{
                        images: ['{{$product->image}}'],
                        activeImage: null,
                        prev() {
                            let index = this.images.indexOf(this.activeImage);
                            if (index === 0) index = this.images.length;
                            this.activeImage = this.images[index - 1];
                        },
                        next() {
                            let index = this.images.indexOf(this.activeImage);
                            if (index === this.images.length - 1) index = -1;
                            this.activeImage = this.images[index + 1];
                        },
                        init() {
                            this.activeImage = this.images.length > 0 ? this.images[0] : null;
                        }
                    }"
                >
                    <div class="relative">
                        <template x-for="image in images">
                            <div
                                x-show="activeImage === image"
                                class="aspect-w-1 aspect-h-1 max-w-md mx-auto"
                            >
                                <img :src="image" alt="Product Image" class="w-full h-auto object-cover rounded-lg"/>
                            </div>
                        </template>
                        <!-- Navigation Arrows -->
                        <a
                            @click.prevent="prev"
                            class="cursor-pointer bg-black/30 text-white absolute left-0 top-1/2 -translate-y-1/2 p-2 rounded-full"
                            style="transform: translateY(-50%);"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-10 w-10"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15 19l-7-7 7-7"
                                />
                            </svg>
                        </a>
                        <a
                            @click.prevent="next"
                            class="cursor-pointer bg-black/30 text-white absolute right-0 top-1/2 -translate-y-1/2 p-2 rounded-full"
                            style="transform: translateY(-50%);"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-10 w-10"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M9 5l7 7-7 7"
                                />
                            </svg>
                        </a>
                    </div>
                    <!-- Thumbnail Image List -->
                    <div class="flex mt-4 space-x-2 justify-center">
                        <template x-for="image in images">
                            <a
                                @click.prevent="activeImage = image"
                                class="cursor-pointer w-20 h-20 border border-gray-300 hover:border-yellow-500 flex items-center justify-center rounded-lg"
                                :class="{'border-yellow-500': activeImage === image}"
                            >
                                <img :src="image" alt="Thumbnail Image" class="object-cover w-full h-full rounded-lg"/>
                            </a>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Product Details Section -->
            <div class="lg:col-span-2">
                <h1 class="text-4xl font-semibold mb-4" style="text-transform: capitalize">
                    {{$product->title}}
                </h1>
            
                {{-- <div class="mb-6" x-data="{expanded: false}">
                    <div
                        x-show="expanded"
                        x-collapse.min.120px
                        class="text-gray-500 wysiwyg-content"
                    >
                        {{ $product->description }}
                    </div>
                    <p class="text-right">
                        <a
                            @click="expanded = !expanded"
                            href="javascript:void(0)"
                            class="text-yellow-500 hover:text-pink-700"
                            x-text="expanded ? 'Read Less' : 'Read More'"
                        ></a>
                    </p>
                </div> --}}

                <!-- QR Code Section -->
                <!-- QR Code Section -->
                <div class="mt-6">
                    <h3 class="text-lg font-semibold mb-2">Scan this QR code to view the product:</h3>
                    <div class="mt-2">
                        <!-- Display the QR code image -->
                        <img src="{{ $qrCodeUrl }}" alt="QR Code" class="w-48 h-48"/>
                    </div>
                    <!-- Download QR Code as PNG -->
                    @if($qrCodeUrl)
                        <a
                            href="{{ $qrCodeUrl }}"
                            download="product-qr-code.png"
                            class="btn-primary mt-4 bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded"
                        >
                            Download QR Code
                        </a>
                    @endif
                </div>
                {{-- <!-- Description Button -->
                <div class="mt-4">
                    <a
                        href="{{ route('product.description', $product->slug) }}"
                        class="btn-primary bg-blue-600 text-white hover:bg-blue-700 py-2 px-4 rounded"
                    >
                        View Full Description
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>
