@extends('layouts.app')

@section('title', $product->name . ' - ' . $product->model_name . ' | Al Mohandes International')
@section('description', $product->description ? Str::limit($product->description, 160) : 'Professional ' . $product->name . ' (' . $product->model_name . ') diesel generator by Al Mohandes International. Reliable power solutions for industrial and commercial applications.')
@section('keywords', $product->name . ', ' . $product->model_name . ', diesel generator, ' . $product->fuel_type . ', ' . $product->frequency . ', ' . $product->subcategory->name . ', power generation, AMI')

@section('og_type', 'product')
@section('og_title', $product->name . ' - ' . $product->model_name . ' | Al Mohandes International')
@section('og_description', $product->description ? Str::limit($product->description, 160) : 'Professional ' . $product->name . ' diesel generator by Al Mohandes International.')
@section('og_image', $product->image ? asset('storage/' . $product->image) : asset('imgs/products/G1.png'))

@section('twitter_title', $product->name . ' - ' . $product->model_name . ' | AMI')
@section('twitter_description', $product->description ? Str::limit($product->description, 160) : 'Professional ' . $product->name . ' diesel generator by Al Mohandes International.')
@section('twitter_image', $product->image ? asset('storage/' . $product->image) : asset('imgs/products/G1.png'))

@section('structured_data')
@php
    $productJsonLd = [
        '@context' => 'https://schema.org',
        '@type' => 'Product',
        'name' => $product->name,
        'description' => $product->description ?: 'Professional diesel generator by Al Mohandes International',
        'brand' => [
            '@type' => 'Brand',
            'name' => 'Al Mohandes International',
        ],
        'manufacturer' => [
            '@type' => 'Organization',
            'name' => 'Al Mohandes International',
            'url' => url('/'),
        ],
        'category' => $product->subcategory->category->name,
        'subcategory' => $product->subcategory->name,
        'model' => $product->model_name,
        'fuelType' => $product->fuel_type,
        'frequency' => $product->frequency,
        'url' => route('product.show', $product->slug),
        'offers' => [
            '@type' => 'Offer',
            'availability' => 'https://schema.org/InStock',
            'priceCurrency' => 'USD',
            'seller' => [
                '@type' => 'Organization',
                'name' => 'Al Mohandes International',
            ],
        ],
    ];
    if ($product->image) {
        $productJsonLd['image'] = asset('storage/' . $product->image);
    }
@endphp
<script type="application/ld+json">{!! json_encode($productJsonLd, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}"
                 alt="{{ $product->name }}"
                 class="object-contain w-full h-full"
                 fetchpriority="high" decoding="async">
        @else
            <img src="{{ asset('imgs/products/G1.png') }}"
                 alt="{{ $product->name }}"
                 class="object-contain w-full h-full"
                 fetchpriority="high" decoding="async">
        @endif
        <div class="flex absolute inset-0 items-center bg-gradient-to-r from-blue-900/80 to-blue-700/60">
            <div class="container px-4 mx-auto">
                <div class="max-w-4xl">
                    <nav class="mb-4 text-sm text-blue-100">
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
                    <h1 class="mb-4 text-4xl font-bold text-white md:text-5xl fade-in">{{ $product->name }}</h1>
                    <p class="max-w-2xl text-xl text-blue-100 fade-in">{{ $product->model_name }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Details -->
    <section class="py-16">
        <div class="container px-4 mx-auto">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
                <!-- Product Image -->
                <div class="space-y-6">
                    <div class="overflow-hidden bg-white rounded-xl shadow-lg">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}"
                                 alt="{{ $product->name }}"
                                 class="object-contain w-full h-96"
                                 loading="lazy" decoding="async">
                        @else
                            <img src="{{ asset('imgs/products/G1.png') }}"
                                 alt="{{ $product->name }}"
                                 class="object-contain w-full h-96"
                                 loading="lazy" decoding="async">
                        @endif
                    </div>
                </div>
                <!-- Product Information -->
                <div class="space-y-8">
                    <!-- Product Title & Category -->
                    <div>
                        <div class="flex items-center mb-4 space-x-4">
                            <span class="px-4 py-2 text-sm font-semibold text-white rounded-full bg-ami-orange">
                                {{ $product->subcategory->name }}
                            </span>
                            <span class="px-4 py-2 text-sm font-semibold bg-blue-100 rounded-full text-ami-blue">
                                {{ $product->subcategory->category->name }}
                            </span>
                        </div>
                        <h2 class="mb-2 text-3xl font-bold text-gray-900">{{ $product->name }}</h2>
                        <p class="text-xl text-gray-600">{{ $product->model_name }}</p>
                    </div>

                    <!-- Product Specifications -->
                    <div class="p-6 bg-gray-50 rounded-xl">
                        <h3 class="mb-4 text-xl font-bold text-gray-900">Specifications</h3>
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
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
                        </div>
                    </div>
                  </div>
                </div>
 <!-- Product Description -->
 @if($product->description)
 <div class="p-6 bg-gray-50 rounded-xl">
    <h3 class="mb-4 text-xl font-bold text-gray-900">Description</h3>
    <div class="max-w-none text-gray-600 prose prose-lg">
        <p>{{ $product->description }}</p>
    </div>
</div>
@endif
<!-- Product Features -->
@if($product->features->count() > 0)
<div class="p-6 bg-gray-50 rounded-xl">
    <h3 class="mb-4 text-xl font-bold text-gray-900">Features</h3>
    <div class="max-w-none text-gray-600 prose prose-lg">
        @foreach($product->features as $feature)
            <p class="mb-2 text-lg font-bold text-gray-900">{{ $feature->name }}</p>
            <p>{{ $feature->description }}</p>
        @endforeach
    </div>
</div>
@endif
<!-- Product Applications -->
@if($product->applications->count() > 0)
<div class="p-6 bg-gray-50 rounded-xl">
    <h3 class="mb-4 text-xl font-bold text-gray-900">Applications</h3>
    <div class="max-w-none text-gray-600 prose prose-lg">
        @foreach($product->applications as $application)
            <p class="mb-2 text-lg font-bold text-gray-900">{{ $application->name }}</p>
            <p>{{ $application->description }}</p>
        @endforeach
    </div>
</div>
@endif

                    <!-- Action Buttons -->
                    <div class="flex flex-col gap-4 mt-4 sm:flex-row">
                        <a href="{{ route('home') }}#contact"
                           class="px-8 py-4 font-semibold text-center text-white rounded-lg transition bg-ami-orange hover:bg-orange-600">
                            <i class="mr-2 fas fa-envelope"></i>Request Quote
                        </a>
                        <a href="tel:+201223907708"
                           class="px-8 py-4 font-semibold text-center bg-transparent rounded-lg border-2 transition border-ami-orange text-ami-orange hover:bg-ami-orange hover:text-white">
                            <i class="mr-2 fas fa-phone"></i>Contact Sales
                        </a>
                    </div>

                    <!-- Additional Information -->
                    <div class="p-6 bg-blue-50 rounded-xl">
                        <h4 class="mb-3 text-lg font-semibold text-gray-900">Need More Information?</h4>
                        <p class="mb-4 text-gray-600">Our technical experts are available to provide detailed specifications, pricing, and delivery information.</p>
                        <div class="flex items-center space-x-4 text-sm text-gray-600">
                            <div class="flex items-center">
                                <i class="mr-2 fas fa-clock"></i>
                                <span>24/7 Support</span>
                            </div>
                            <div class="flex items-center">
                                <i class="mr-2 fas fa-shipping-fast"></i>
                                <span>Fast Delivery</span>
                            </div>
                            <div class="flex items-center">
                                <i class="mr-2 fas fa-tools"></i>
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
        <div class="container px-4 mx-auto">
            <div class="mb-12 text-center">
                <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">Related Products</h2>
                <p class="mx-auto max-w-2xl text-xl text-gray-600">Explore other products in the same category</p>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                @foreach($relatedProducts as $relatedProduct)
                    <div class="overflow-hidden bg-white rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl product-card">
                        <a href="{{ route('product.show', $relatedProduct->slug) }}" class="block">
                            <div class="relative">
                                @if($relatedProduct->image)
                                    <img src="{{ asset('storage/' . $relatedProduct->image) }}"
                                         alt="{{ $relatedProduct->name }}"
                                         class="object-cover w-full h-48"
                                         loading="lazy" decoding="async">
                                @else
                                    <img src="{{ asset('imgs/products/G1.png') }}"
                                         alt="{{ $relatedProduct->name }}"
                                         class="object-cover w-full h-48"
                                         loading="lazy" decoding="async">
                                @endif
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 text-sm font-semibold text-white rounded-full bg-ami-orange">
                                        {{ $relatedProduct->subcategory->name }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="mb-2 text-lg font-bold text-gray-900">{{ $relatedProduct->name }}</h3>
                                <p class="mb-3 text-gray-600">{{ $relatedProduct->model_name }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-500">{{ $relatedProduct->fuel_type }}</span>
                                    <span class="text-sm text-gray-500">{{ $relatedProduct->frequency }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('subcategory.show', $product->subcategory->slug) }}"
                   class="px-8 py-3 font-semibold text-white rounded-lg transition bg-ami-orange hover:bg-orange-600">
                    View All {{ $product->subcategory->name }} Products
                </a>
            </div>
        </div>
    </section>
    @endif


@endsection
