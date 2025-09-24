@extends('layouts.app')
@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}"
                 alt="{{ $product->name }}"
                 class="w-full h-full object-cover"
                 fetchpriority="high" decoding="async">
        @else
            <img src="{{ asset('imgs/products/G1.png') }}"
                 alt="{{ $product->name }}"
                 class="w-full h-full object-cover"
                 fetchpriority="high" decoding="async">
        @endif
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-blue-700/60 flex items-center">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl">
                    <nav class="text-sm text-blue-100 mb-4">
                        <a href="{{ route('home') }}" class="hover:text-white">Home</a>
                        <span class="mx-2">/</span>
                        <a href="{{ route('products.index') }}" class="hover:text-white">Products</a>
                        <span class="mx-2">/</span>
                        <a href="{{ route('category.show', $product->subcategory->category->slug) }}" class="hover:text-white">{{ $product->subcategory->category->name }}</a>
                        <span class="mx-2">/</span>
                        <a href="{{ route('subcategory.show', $product->subcategory->slug) }}" class="hover:text-white">{{ $product->subcategory->name }}</a>
                        <span class="mx-2">/</span>
                        <span class="text-white">{{ $product->name }}</span>
                    </nav>
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 fade-in">{{ $product->name }}</h1>
                    <p class="text-xl text-blue-100 max-w-2xl fade-in">{{ $product->model_name }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Details -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Product Image -->
                <div class="space-y-6">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-96 object-cover"
                                 loading="lazy" decoding="async">
                        @else
                            <img src="{{ asset('imgs/products/G1.png') }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-96 object-cover"
                                 loading="lazy" decoding="async">
                        @endif
                    </div>
                </div>
                <!-- Product Information -->
                <div class="space-y-8">
                    <!-- Product Title & Category -->
                    <div>
                        <div class="flex items-center space-x-4 mb-4">
                            <span class="bg-ami-orange text-white px-4 py-2 rounded-full text-sm font-semibold">
                                {{ $product->subcategory->name }}
                            </span>
                            <span class="bg-blue-100 text-ami-blue px-4 py-2 rounded-full text-sm font-semibold">
                                {{ $product->subcategory->category->name }}
                            </span>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->name }}</h2>
                        <p class="text-xl text-gray-600">{{ $product->model_name }}</p>
                    </div>

                    <!-- Product Specifications -->
                    <div class="bg-gray-50 rounded-xl p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Specifications</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex justify-between py-2 border-b border-gray-200">
                                <span class="font-medium text-gray-700">Fuel Type:</span>
                                <span class="text-gray-900">{{ $product->fuel_type }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-200">
                                <span class="font-medium text-gray-700">Frequency:</span>
                                <span class="text-gray-900">{{ $product->frequency }}</span>
                            </div>
                            @if($product->powertypes->count() > 0)
                                @foreach($product->powertypes as $powertype)
                                    <div class="flex justify-between py-2 border-b border-gray-200">
                                        <span class="font-medium text-gray-700">{{ $powertype->name }}:</span>
                                        <span class="text-gray-900">{{ $powertype->value }}</span>
                                    </div>
                                @endforeach
                            @endif
                            @if($product->powertypes->count() > 0 && $product->powertypes->name)
                            <div class="flex justify-between py-2 border-b border-gray-200">
                                <span class="font-medium text-gray-700">{{ $product->powertypes->name }}:</span>
                                <span class="text-gray-900 capitalize">{{ $product->powertypes->name }}</span>
                            </div>
                            @endif
                            <div class="flex justify-between py-2 border-b border-gray-200">
                                <span class="font-medium text-gray-700">Category:</span>
                                <span class="text-gray-900">{{ $product->subcategory->category->name }}</span>
                            </div>
                        </div>
                    </div>
</div>
                </div>
 <!-- Product Description -->
 @if($product->description)
 <div class="bg-gray-50 rounded-xl p-6">
    <h3 class="text-xl font-bold text-gray-900 mb-4">Description</h3>
    <div class="prose prose-lg max-w-none text-gray-600">
        <p>{{ $product->description }}</p>
    </div>
</div>
@endif
<!-- Product Features -->
@if($product->features->count() > 0)
<div class="bg-gray-50 rounded-xl p-6">
    <h3 class="text-xl font-bold text-gray-900 mb-4">Features</h3>
    <div class="prose prose-lg max-w-none text-gray-600">
        @foreach($product->features as $feature)
            <p class="font-bold text-gray-900 mb-2 text-lg">{{ $feature->name }}</p>
            <p>{{ $feature->description }}</p>
        @endforeach
    </div>
</div>
@endif
<!-- Product Applications -->
@if($product->applications->count() > 0)
<div class="bg-gray-50 rounded-xl p-6">
    <h3 class="text-xl font-bold text-gray-900 mb-4">Applications</h3>
    <div class="prose prose-lg max-w-none text-gray-600">
        @foreach($product->applications as $application)
            <p class="font-bold text-gray-900 mb-2 text-lg">{{ $application->name }}</p>
            <p>{{ $application->description }}</p>
        @endforeach
    </div>
</div>
@endif

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 mt-4">
                        <a href="{{ route('contact.index') }}"
                           class="bg-ami-orange text-white px-8 py-4 rounded-lg font-semibold hover:bg-orange-600 transition text-center">
                            <i class="fas fa-envelope mr-2"></i>Request Quote
                        </a>
                        <a href="{{ route('contact.index') }}"
                           class="bg-transparent border-2 border-ami-orange text-ami-orange px-8 py-4 rounded-lg font-semibold hover:bg-ami-orange hover:text-white transition text-center">
                            <i class="fas fa-phone mr-2"></i>Contact Sales
                        </a>
                    </div>

                    <!-- Additional Information -->
                    <div class="bg-blue-50 rounded-xl p-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">Need More Information?</h4>
                        <p class="text-gray-600 mb-4">Our technical experts are available to provide detailed specifications, pricing, and delivery information.</p>
                        <div class="flex items-center space-x-4 text-sm text-gray-600">
                            <div class="flex items-center">
                                <i class="fas fa-clock mr-2"></i>
                                <span>24/7 Support</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-shipping-fast mr-2"></i>
                                <span>Fast Delivery</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-tools mr-2"></i>
                                <span>Installation Support</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Related Products</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Explore other products in the same category</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $relatedProduct)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 product-card">
                        <a href="{{ route('product.show', $relatedProduct->slug) }}" class="block">
                            <div class="relative">
                                @if($relatedProduct->image)
                                    <img src="{{ asset('storage/' . $relatedProduct->image) }}"
                                         alt="{{ $relatedProduct->name }}"
                                         class="w-full h-48 object-cover"
                                         loading="lazy" decoding="async">
                                @else
                                    <img src="{{ asset('imgs/products/G1.png') }}"
                                         alt="{{ $relatedProduct->name }}"
                                         class="w-full h-48 object-cover"
                                         loading="lazy" decoding="async">
                                @endif
                                <div class="absolute top-4 left-4">
                                    <span class="bg-ami-orange text-white px-3 py-1 rounded-full text-sm font-semibold">
                                        {{ $relatedProduct->subcategory->name }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $relatedProduct->name }}</h3>
                                <p class="text-gray-600 mb-3">{{ $relatedProduct->model_name }}</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-500">{{ $relatedProduct->fuel_type }}</span>
                                    <span class="text-sm text-gray-500">{{ $relatedProduct->frequency }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('subcategory.show', $product->subcategory->slug) }}"
                   class="bg-ami-orange text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                    View All {{ $product->subcategory->name }} Products
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Call to Action -->
    <section class="py-16 bg-gradient-to-r from-blue-100 to-blue-400">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Ready to Get Started?</h2>
            <p class="text-xl text-gray-700 mb-8 max-w-2xl mx-auto">Contact our experts today to discuss your power generation needs and get a customized solution.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact.index') }}" class="bg-ami-orange text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                    Get Free Quote
                </a>
                <a href="tel:+15551234567" class="bg-transparent border-2 border-ami-orange text-ami-orange px-8 py-3 rounded-lg font-semibold hover:bg-ami-orange hover:text-white transition">
                    <i class="fas fa-phone mr-2"></i>Call Now
                </a>
            </div>
        </div>
    </section>
@endsection
