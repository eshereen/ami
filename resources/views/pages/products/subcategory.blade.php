@extends('layouts.app')

@section('title', $subcategory->name . ' - AMI GenSet')
@section('description', 'Explore ' . $subcategory->name . ' products from AMI GenSet. High-quality power generation solutions for your needs.')
@section('keywords', $subcategory->name . ', power generators, AMI GenSet, ' . $subcategory->category->name)

@section('content')
    <!-- Breadcrumb -->
    <section class="py-4 bg-gray-100">
        <div class="container px-4 mx-auto">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2">
                    <li><a href="{{ route('home') }}" class="text-gray-500 hover:text-ami-orange">Home</a></li>
                    <li><i class="mx-2 text-gray-400 fas fa-chevron-right"></i></li>
                    <li><a href="{{ route('products.index') }}" class="text-gray-500 hover:text-ami-orange">Products</a></li>
                    <li><i class="mx-2 text-gray-400 fas fa-chevron-right"></i></li>
                    <li><a href="{{ route('category.show', $subcategory->category->slug) }}" class="text-gray-500 hover:text-ami-orange">{{ $subcategory->category->name }}</a></li>
                    <li><i class="mx-2 text-gray-400 fas fa-chevron-right"></i></li>
                    <li class="text-gray-900">{{ $subcategory->name }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Header -->
    <section class="py-16 bg-gradient-to-r to-blue-600 from-ami-blue">
        <div class="container px-4 mx-auto text-center">
            <div class="flex justify-center items-center mx-auto mb-6 w-24 h-24 bg-white bg-opacity-20 rounded-full">
                <i class="text-3xl text-white fas fa-cogs"></i>
            </div>
            <h1 class="mb-4 text-4xl font-bold text-white md:text-5xl">{{ $subcategory->name }}</h1>
            <p class="mx-auto max-w-2xl text-xl text-blue-100">{{ $subcategory->description }}</p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col gap-8 lg:flex-row">

                <!-- Left Sidebar -->
                <div class="lg:w-1/4">
                    <div class="sticky top-8 p-6 bg-white rounded-xl shadow-lg">
                        <h3 class="mb-6 text-xl font-bold text-gray-900">Filter Products</h3>
                        @include('partials.product-filter', [
                            'products' => $products,
                            'placeholder' => 'Search all products...',
                            'showCategories' => true,
                            'showSubcategories' => true,
                            'categories' => \App\Models\Category::withCount('products')->get(),
                            'subcategories' => \App\Models\Subcategory::withCount('products')->get(),
                            'currentSubcategory' => $subcategory
                        ])
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:w-3/4">
                    <!-- Products Grid -->
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3" id="products-grid">
                        @foreach ($products as $product)
                            <div class="overflow-hidden bg-white rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl product-card">
                                <a href="{{ route('product.show', $product->slug) }}" class="block relative overflow-hidden group">
                                    <div class="absolute inset-0 z-10 bg-ami-orange opacity-60 transition-transform duration-500 ease-in-out transform -translate-x-full -translate-y-full group-hover:translate-x-0 group-hover:translate-y-0"></div>
                                    <div class="relative">
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                 alt="{{ $product->name }}"
                                                 class="object-contain w-full h-48"
                                                 loading="lazy" decoding="async">
                                        @else
                                            <img src="{{ asset('imgs/products/G1.png') }}"
                                                 alt="{{ $product->name }}"
                                                 class="object-contain w-full h-48"
                                                 loading="lazy" decoding="async">
                                        @endif
                                        <div class="absolute top-4 left-4">
                                            <span class="px-3 py-1 text-sm font-semibold text-white rounded-full bg-ami-orange">
                                                {{ $product->subcategory->name }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <h3 class="mb-2 text-lg font-bold text-gray-900">{{ $product->name ?? $product->ami_model }}</h3>
                                        <p class="mb-3 text-gray-600">{{ $product->engine }}</p>

                                        @if($product->description)
                                            <p class="mb-4 text-sm text-gray-500 line-clamp-2">{{ Str::limit($product->description, 100) }}</p>
                                        @endif

                                        <div class="flex justify-between items-center mb-4">
                                            @if($product->fuel_type)
                                            <span class="text-sm text-gray-500">{{ $product->fuel_type }}</span>
                                            @endif
                                            @if($product->frequency)
                                            <span class="text-sm text-gray-500">{{ $product->frequency }}</span>
                                            @endif
                                        </div>

                                        <div class="flex justify-between items-center">
                                            <span class="text-sm font-medium text-ami-blue">View Details</span>
                                            <i class="fas fa-arrow-right text-ami-orange"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <!-- No Results Message -->
                    <div class="py-12 text-center" id="no-results" style="display: none;">
                        <div class="mx-auto mb-6 w-24 h-24 text-gray-300">
                            <i class="text-6xl fas fa-search"></i>
                        </div>
                        <h3 class="mb-2 text-xl font-semibold text-gray-900">No products found</h3>
                        <p class="text-gray-600">No products match your search criteria.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(isset($relatedProducts) && $relatedProducts->count() > 0)
    <!-- Related Products -->
    <section class="py-16 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="mb-12 text-center">
                <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">Related Products</h2>
                <p class="mx-auto max-w-2xl text-xl text-gray-600">Explore more products from {{ $subcategory->category->name }}</p>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach($relatedProducts as $product)
                    <div class="overflow-hidden bg-white rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl product-card">
                        <a href="{{ route('product.show', $product->slug) }}" class="block relative overflow-hidden group">
                            <div class="absolute inset-0 z-10 bg-ami-orange opacity-60 transition-transform duration-500 ease-in-out transform -translate-x-full -translate-y-full group-hover:translate-x-0 group-hover:translate-y-0"></div>
                            <div class="relative">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}"
                                         alt="{{ $product->name }}"
                                         class="object-contain w-full h-48">
                                @else
                                    <img src="{{ asset('imgs/products/G1.png') }}"
                                         alt="{{ $product->name }}"
                                         class="object-contain w-full h-48">
                                @endif
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 text-sm font-semibold text-white rounded-full bg-ami-orange">
                                        {{ $product->subcategory->name }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="mb-2 text-lg font-bold text-gray-900">{{ $product->name ?? $product->ami_model    }}</h3>
                                <p class="mb-3 text-gray-600">{{ $product->engine }}</p>
                                <div class="flex justify-between items-center">
                                    @if($product->fuel_type)
                                    <span class="text-sm text-gray-500">{{ $product->fuel_type }}</span>
                                    @endif
                                    @if($product->frequency)
                                    <span class="text-sm text-gray-500">{{ $product->frequency }}</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Call to Action -->
    <section class="py-16 bg-gradient-to-r from-blue-100 to-blue-400">
        <div class="container px-4 mx-auto text-center">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">Need Help Choosing?</h2>
            <p class="mx-auto mb-8 max-w-2xl text-xl text-gray-700">Our experts are here to help you find the perfect {{ $subcategory->name }} solution for your needs.</p>
            <div class="flex flex-col gap-4 justify-center sm:flex-row">
                <a href="{{ route('home') }}#contact" class="px-8 py-3 font-semibold text-white rounded-lg transition bg-ami-orange hover:bg-orange-600">
                    Contact Our Experts
                </a>
                <a href="{{ route('category.show', $subcategory->category->slug) }}" class="px-8 py-3 font-semibold bg-transparent rounded-lg border-2 transition border-ami-orange text-ami-orange hover:bg-ami-orange hover:text-white">
                    View All {{ $subcategory->category->name }}
                </a>
            </div>
        </div>
    </section>
@endsection

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-card {
        transition: all 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
    }
</style>
