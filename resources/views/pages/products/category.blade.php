@extends('layouts.app')

@section('title', $category->name . ' Products | Al Mohandes International')
@section('description', 'Explore our comprehensive range of ' . $category->name . ' products. Professional power generation solutions for industrial and commercial applications.')
@section('keywords', $category->name . ', power generation, gensets, backup power, industrial generators, AMI')

@section('content')
<div class="container px-4 py-8 mx-auto">
    <!-- Breadcrumb -->
    <nav class="mb-6 text-sm text-gray-600">
        <a href="{{ route('home') }}" class="hover:text-ami-blue">Home</a>
        <span class="mx-2">/</span>
        <a href="{{ route('products.index') }}" class="hover:text-ami-blue">Products</a>
        <span class="mx-2">/</span>
        <span class="text-gray-900">{{ $category->name }}</span>
    </nav>

    <!-- Category Header -->
    <div class="mb-8 text-center">
        <h1 class="mb-4 text-4xl font-bold text-gray-900 md:text-5xl">{{ $category->name }}</h1>
        <p class="mx-auto max-w-2xl text-xl text-gray-600">Explore our comprehensive range of {{ $category->name }} products designed for reliability and performance.</p>
    </div>

    @if($category->products->count() > 0)
        <!-- Simple Server-Rendered Products Grid -->
        <div class="mb-8">
            <!-- Search Input (basic functionality) -->
            <div class="mx-auto mb-6 max-w-md">
                <div class="relative">
                    <input type="text" id="search-input" placeholder="Search {{ $category->name }} products..."
                           class="py-3 pr-4 pl-12 w-full text-lg rounded-lg border border-gray-300 focus:ring-2 focus:ring-ami-blue focus:border-transparent">
                    <i class="absolute top-4 left-4 text-gray-400 fas fa-search"></i>
                </div>
            </div>

            <!-- Products Count -->
            <div class="mb-6 text-center">
                <p class="text-gray-600" id="products-count">Showing {{ $category->products->count() }} products</p>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4" id="products-grid">
                @foreach ($category->products as $product)
                    <div class="overflow-hidden bg-white rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl product-card">
                        <a href="{{ route('product.show', $product->slug) }}" class="block">
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
                                <h3 class="mb-2 text-lg font-bold text-gray-900">{{ $product->name }}</h3>
                                <p class="mb-3 text-gray-600">{{ $product->model_name }}</p>

                                @if($product->description)
                                    <p class="mb-4 text-sm text-gray-500 line-clamp-2">{{ Str::limit($product->description, 100) }}</p>
                                @endif

                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-sm text-gray-500">{{ $product->fuel_type }}</span>
                                    <span class="text-sm text-gray-500">{{ $product->frequency }}</span>
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

            <!-- No Results Message (initially hidden) -->
            <div class="py-12 text-center" id="no-results" style="display: none;">
                <div class="mx-auto mb-6 w-24 h-24 text-gray-300">
                    <i class="text-6xl fas fa-search"></i>
                </div>
                <h3 class="mb-2 text-xl font-semibold text-gray-900">No products found</h3>
                <p class="text-gray-600">No {{ $category->name }} products match your search criteria.</p>
                <button onclick="clearSearch()" class="px-6 py-2 mt-4 text-white rounded-lg transition-colors bg-ami-blue hover:bg-blue-600">
                    Clear Search
                </button>
            </div>
        </div>

        <script>
            // Simple search functionality without Alpine.js
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('search-input');
                const productCards = document.querySelectorAll('.product-card');
                const productsCount = document.getElementById('products-count');
                const noResults = document.getElementById('no-results');
                const productsGrid = document.getElementById('products-grid');

                if (searchInput && productCards.length > 0) {
                    searchInput.addEventListener('input', function() {
                        const query = this.value.toLowerCase().trim();
                        let visibleCount = 0;

                        productCards.forEach(function(card) {
                            const productName = card.querySelector('h3')?.textContent?.toLowerCase() || '';
                            const productModel = card.querySelector('p')?.textContent?.toLowerCase() || '';
                            const productDesc = card.querySelector('.text-gray-500')?.textContent?.toLowerCase() || '';

                            if (query === '' ||
                                productName.includes(query) ||
                                productModel.includes(query) ||
                                productDesc.includes(query)) {
                                card.style.display = 'block';
                                visibleCount++;
                            } else {
                                card.style.display = 'none';
                            }
                        });

                        // Update count and show/hide no results message
                        if (productsCount) {
                            productsCount.textContent = 'Showing ' + visibleCount + ' products';
                        }

                        if (visibleCount === 0) {
                            productsGrid.style.display = 'none';
                            noResults.style.display = 'block';
                        } else {
                            productsGrid.style.display = 'grid';
                            noResults.style.display = 'none';
                        }
                    });
                }
            });

            function clearSearch() {
                const searchInput = document.getElementById('search-input');
                const productCards = document.querySelectorAll('.product-card');
                const productsCount = document.getElementById('products-count');
                const noResults = document.getElementById('no-results');
                const productsGrid = document.getElementById('products-grid');

                if (searchInput) {
                    searchInput.value = '';
                    productCards.forEach(card => card.style.display = 'block');
                    if (productsCount) {
                        productsCount.textContent = 'Showing {{ $category->products->count() }} products';
                    }
                    productsGrid.style.display = 'grid';
                    noResults.style.display = 'none';
                }
            }
        </script>

        <!-- Pagination or View All Button -->
        <div class="mt-12 text-center">
            <a href="{{ route('products.index') }}"
               class="px-8 py-3 font-semibold text-white rounded-lg transition bg-ami-orange hover:bg-orange-600">
                View All Products
            </a>
        </div>
    @else
        <!-- No Products Message -->
        <div class="py-12 text-center">
            <div class="flex justify-center items-center mx-auto mb-6 w-24 h-24 bg-gray-100 rounded-full">
                <i class="text-4xl text-gray-400 fas fa-box-open"></i>
            </div>
            <h3 class="mb-4 text-xl font-semibold text-gray-900">No Products Available</h3>
            <p class="mb-6 text-gray-600">We're currently updating our {{ $category->name }} product catalog. Please check back soon.</p>
            <a href="{{ route('products.index') }}"
               class="px-8 py-3 font-semibold text-white rounded-lg transition bg-ami-orange hover:bg-orange-600">
                Browse Other Products
            </a>
    </div>
    @endif

    <!-- Back Navigation -->
    <div class="mt-12 text-center">
        <a href="{{ route('products.index') }}" class="inline-flex items-center transition text-ami-blue hover:text-ami-orange">
            <i class="mr-2 fas fa-arrow-left"></i>
            Back to All Products
        </a>
    </div>
 </div>

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
@endsection


