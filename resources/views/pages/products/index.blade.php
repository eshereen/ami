@extends('layouts.app')

@section('title', 'Diesel Generators & Power Solutions | Al Mohandes International')
@section('description', 'Explore our comprehensive range of diesel generators, gensets, and power solutions. Professional-grade equipment for industrial, commercial, and marine applications.')
@section('keywords', 'diesel generators, gensets, power solutions, industrial generators, marine generators, backup power, power generation equipment')

@section('og_type', 'website')
@section('og_title', 'Diesel Generators & Power Solutions | Al Mohandes International')
@section('og_description', 'Explore our comprehensive range of diesel generators, gensets, and power solutions.')
@section('og_image', asset('imgs/ami-logo.png'))

@section('content')
    <!-- Hero Section with Large Image -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
             alt="Our Products"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-blue-700/60 flex items-center">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 fade-in">Our Products</h1>
                <p class="text-xl text-blue-100 max-w-2xl fade-in">Explore our comprehensive range of power solutions designed for reliability and performance.</p>
            </div>
        </div>
    </section>

    <!-- Main Content with Sidebar -->
    <section class="container mx-auto px-4 py-8" x-data="{
        activeCategory: 'all',
        activeSubcategory: 'all',
        searchQuery: '',
        filteredProducts: @js($products->toArray()),
        expandedCategory: null,
        expandedSubcategory: null,

        init() {
            this.filterProducts();
        },

        filterProducts() {
            let products = @js($products->toArray());

            // Filter by category
            if (this.activeCategory !== 'all') {
                products = products.filter(product => product.subcategory.category_id == this.activeCategory);
            }

            // Filter by subcategory
            if (this.activeSubcategory !== 'all') {
                products = products.filter(product => product.subcategory_id == this.activeSubcategory);
            }

            // Filter by search query
            if (this.searchQuery.trim() !== '') {
                const query = this.searchQuery.toLowerCase();
                products = products.filter(product =>
                    product.name.toLowerCase().includes(query) ||
                    product.model_name.toLowerCase().includes(query) ||
                    product.description.toLowerCase().includes(query)
                );
            }

            this.filteredProducts = products;
        },

        resetFilters() {
            this.activeCategory = 'all';
            this.activeSubcategory = 'all';
            this.searchQuery = '';
            this.expandedCategory = null;
            this.expandedSubcategory = null;
            this.filterProducts();
        },

        toggleCategory(categoryId) {
            this.expandedCategory = this.expandedCategory === categoryId ? null : categoryId;
            this.expandedSubcategory = null;
        },

        toggleSubcategory(subcategoryId) {
            this.expandedSubcategory = this.expandedSubcategory === subcategoryId ? null : subcategoryId;
        },

        selectCategory(categoryId) {
            this.activeCategory = categoryId;
            this.activeSubcategory = 'all';
            this.expandedCategory = null;
            this.filterProducts();
        },

        selectSubcategory(subcategoryId) {
            this.activeSubcategory = subcategoryId;
            this.expandedSubcategory = null;
            this.filterProducts();
        }
    }">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Filters -->
            <div class="lg:w-1/4">
                <div class="bg-white rounded-lg shadow-lg p-6 sticky top-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Filter Products</h3>

                    <!-- Search -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Search Products</label>
                        <div class="relative">
                            <input type="text"
                                   x-model="searchQuery"
                                   @input="filterProducts()"
                                   placeholder="Search by name, model..."
                                   class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Category Filter -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-3">Categories</label>

                        <!-- All Categories Option -->
                        <div class="mb-2">
                            <button @click="selectCategory('all')"
                                    :class="activeCategory === 'all' ? 'bg-blue-100 text-blue-800 border-blue-300' : 'bg-white text-gray-700 border-gray-300'"
                                    class="w-full flex items-center justify-between px-3 py-2 border rounded-lg hover:bg-gray-50 transition">
                                <span>All Categories</span>
                                <span x-show="activeCategory === 'all'" class="text-blue-600">
                                    <i class="fas fa-check"></i>
                                </span>
                            </button>
                        </div>

                        <!-- Category List -->
                        @foreach ($subcategories->groupBy('category.name') as $categoryName => $categorySubcategories)
                        <div class="mb-2">
                            <button @click="toggleCategory({{ $categorySubcategories->first()->category_id }})"
                                    class="w-full flex items-center justify-between px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                                <span>{{ $categoryName }}</span>
                                <i class="fas fa-plus transition-transform duration-300"
                                   :class="expandedCategory === {{ $categorySubcategories->first()->category_id }} ? 'rotate-45' : ''"></i>
                            </button>

                            <!-- Subcategories -->
                            <div x-show="expandedCategory === {{ $categorySubcategories->first()->category_id }}"
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 transform -translate-y-2"
                                 x-transition:enter-end="opacity-100 transform translate-y-0"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 transform translate-y-0"
                                 x-transition:leave-end="opacity-0 transform -translate-y-2"
                                 class="ml-4 mt-2 space-y-1">
                                @foreach ($categorySubcategories as $subcategory)
                                <button @click="selectSubcategory({{ $subcategory->id }})"
                                        :class="activeSubcategory === {{ $subcategory->id }} ? 'bg-blue-50 text-blue-800 border-blue-300' : 'bg-white text-gray-600 border-gray-200'"
                                        class="w-full flex items-center justify-between px-3 py-2 text-sm border rounded-lg hover:bg-gray-50 transition">
                                    <span>{{ $subcategory->name }}</span>
                                    <span x-show="activeSubcategory === {{ $subcategory->id }}" class="text-blue-600">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </button>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Reset Filters -->
                    <button @click="resetFilters()"
                            class="w-full bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition">
                        <i class="fas fa-refresh mr-2"></i>Reset Filters
                    </button>

                    <!-- Results Count -->
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <p class="text-sm text-gray-600">
                            <span x-text="filteredProducts.length"></span> products found
                        </p>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="lg:w-3/4">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Products</h2>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-600">
                            Showing <span x-text="filteredProducts.length"></span> products
                        </span>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <template x-for="product in filteredProducts" :key="product.id">
                        <div x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 transform translate-y-4"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             class="bg-white rounded-xl shadow-lg overflow-hidden border border-blue-100 hover-lift">
                            <div class="h-48 overflow-hidden">
                                <img :src="product.image ? '/storage/' + product.image : '/imgs/products/G1.png'"
                                     :alt="product.name"
                                     class="w-full h-full object-cover transition duration-500 hover:scale-110">
                            </div>
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-2">
                                    <h3 class="text-lg font-bold text-blue-900" x-text="product.name"></h3>
                                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded-full"
                                          x-text="product.subcategory.name"></span>
                                </div>
                                <p class="text-gray-600 mb-2 text-sm" x-text="product.model_name"></p>
                                <p class="text-gray-600 mb-4 text-sm" x-text="product.description ? product.description.substring(0, 100) + '...' : ''"></p>
                                <div class="flex justify-between items-center">
                                    <span class="text-ami-orange font-semibold text-sm" x-text="product.fuel_type"></span>
                                    <a :href="'/product/' + product.slug" class="text-blue-600 hover:text-ami-orange transition">
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- No Results -->
                <div x-show="filteredProducts.length === 0"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     class="text-center py-16">
                    <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">No Products Found</h3>
                    <p class="text-gray-500 mb-4">Try adjusting your filters or search terms.</p>
                    <button @click="resetFilters()"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                        Clear All Filters
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-gradient-to-r from-blue-100 to-blue-400 py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Need Help Finding the Right Product?</h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">Our expert team is here to help you choose the perfect power solution for your needs.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact.index') }}" class="bg-ami-orange text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                    Contact Us
                </a>
                <a href="{{ route('categories.index') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition">
                    Browse Categories
                </a>
            </div>
        </div>
    </section>
@endsection
