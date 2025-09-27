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
             class="object-cover w-full h-full">
        <div class="flex absolute inset-0 items-center bg-gradient-to-r from-blue-900/80 to-blue-700/60">
            <div class="container px-4 mx-auto">
                <h1 class="mb-4 text-4xl font-bold text-white md:text-5xl fade-in">Our Products</h1>
                <p class="max-w-2xl text-xl text-blue-100 fade-in">Explore our comprehensive range of power solutions designed for reliability and performance.</p>
            </div>
        </div>
    </section>

    <!-- Main Content with Sidebar -->
    <section class="container px-4 py-8 mx-auto" x-data="{
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
            console.log('Products index - Filtering products, search query:', this.searchQuery);

            // Filter by search query first
            if (this.searchQuery && this.searchQuery.trim()) {
                const query = this.searchQuery.toLowerCase().trim();
                console.log('Products index - Searching for:', query);
                products = products.filter(product => {
                    const nameMatch = product.name && product.name.toLowerCase().includes(query);
                    const modelMatch = product.model_name && product.model_name.toLowerCase().includes(query);
                    const descMatch = product.description && product.description.toLowerCase().includes(query);
                    return nameMatch || modelMatch || descMatch;
                });
                console.log('Products index - Filtered products count:', products.length);
            }

            // Filter by category
            if (this.activeCategory !== 'all') {
                products = products.filter(product => product.subcategory.category_id == this.activeCategory);
            }

            // Filter by subcategory
            if (this.activeSubcategory !== 'all') {
                products = products.filter(product => product.subcategory_id == this.activeSubcategory);
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
        <div class="flex flex-col gap-8 lg:flex-row">
            <!-- Sidebar Filters -->
            <div class="lg:w-1/4">
                <div class="sticky top-8 p-6 bg-white rounded-lg shadow-lg">
                    <h3 class="mb-6 text-xl font-bold text-gray-900">Filter Products</h3>

                    <!-- Search -->
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-700">Search Products</label>
                        <div class="relative">
                            <input type="text"
                                   x-model="searchQuery"
                                   @input="filterProducts()"
                                   @keyup="filterProducts()"
                                   @paste="setTimeout(() => filterProducts(), 100)"
                                   placeholder="Search by name, model..."
                                   class="py-2 pr-4 pl-10 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <i class="absolute top-3 left-3 text-gray-400 fas fa-search"></i>
                        </div>
                    </div>

                    <!-- Category Filter -->
                    <div class="mb-6">
                        <label class="block mb-3 text-sm font-medium text-gray-700">Categories</label>

                        <!-- All Categories Option -->
                        <div class="mb-2">
                            <button @click="selectCategory('all')"
                                    :class="activeCategory === 'all' ? 'bg-blue-100 text-blue-800 border-blue-300' : 'bg-white text-gray-700 border-gray-300'"
                                    class="flex justify-between items-center px-3 py-2 w-full rounded-lg border transition hover:bg-gray-50">
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
                                    class="flex justify-between items-center px-3 py-2 w-full rounded-lg border border-gray-300 transition hover:bg-gray-50">
                                <span>{{ $categoryName }}</span>
                                <i class="transition-transform duration-300 fas fa-plus"
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
                                 class="mt-2 ml-4 space-y-1">
                                @foreach ($categorySubcategories as $subcategory)
                                <button @click="selectSubcategory({{ $subcategory->id }})"
                                        :class="activeSubcategory === {{ $subcategory->id }} ? 'bg-blue-50 text-blue-800 border-blue-300' : 'bg-white text-gray-600 border-gray-200'"
                                        class="flex justify-between items-center px-3 py-2 w-full text-sm rounded-lg border transition hover:bg-gray-50">
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
                            class="px-4 py-2 w-full text-gray-700 bg-gray-100 rounded-lg transition hover:bg-gray-200">
                        <i class="mr-2 fas fa-refresh"></i>Reset Filters
                    </button>

                    <!-- Results Count -->
                    <div class="pt-4 mt-4 border-t border-gray-200">
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
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <template x-for="product in filteredProducts" :key="product.id">
                        <div x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 transform translate-y-4"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             class="overflow-hidden bg-white rounded-xl border border-blue-100 shadow-lg hover-lift">
                            <div class="overflow-hidden h-48">
                                <img :src="product.image ? '/storage/' + product.image : '/imgs/products/G1.png'"
                                     :alt="product.name"
                                     class="object-contain w-full h-full transition duration-500 hover:scale-110">
                            </div>
                            <div class="p-6">
                                <div class="flex justify-between items-center mb-2">
                                    <h3 class="text-lg font-bold text-blue-900" x-text="product.name"></h3>
                                    <span class="px-2 py-1 text-xs font-semibold text-blue-800 bg-blue-100 rounded-full"
                                          x-text="product.subcategory.name"></span>
                                </div>
                                <p class="mb-2 text-sm text-gray-600" x-text="product.model_name"></p>
                                <p class="mb-4 text-sm text-gray-600" x-text="product.description ? product.description.substring(0, 100) + '...' : ''"></p>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm font-semibold text-ami-orange" x-text="product.fuel_type"></span>
                                    <a :href="'/product/' + product.slug" class="text-blue-600 transition hover:text-ami-orange">
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
                     class="py-16 text-center">
                    <i class="mb-4 text-6xl text-gray-300 fas fa-search"></i>
                    <h3 class="mb-2 text-xl font-semibold text-gray-600">No Products Found</h3>
                    <p class="mb-4 text-gray-500">Try adjusting your filters or search terms.</p>
                    <button @click="resetFilters()"
                            class="px-6 py-2 text-white bg-blue-600 rounded-lg transition hover:bg-blue-700">
                        Clear All Filters
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-gradient-to-r from-blue-100 to-blue-400">
        <div class="container px-4 mx-auto text-center">
            <h2 class="mb-4 text-3xl font-bold text-white md:text-4xl">Need Help Finding the Right Product?</h2>
            <p class="mx-auto mb-8 max-w-2xl text-xl text-blue-100">Our expert team is here to help you choose the perfect power solution for your needs.</p>
            <div class="flex flex-col gap-4 justify-center sm:flex-row">
                <a href="{{ route('home') }}#contact" class="px-8 py-3 font-semibold text-white rounded-lg transition bg-ami-orange hover:bg-orange-600">
                    Contact Us
                </a>
                <a href="{{ route('categories.index') }}" class="px-8 py-3 font-semibold text-white bg-transparent rounded-lg border-2 border-white transition hover:bg-white hover:text-blue-600">
                    Browse Categories
                </a>
            </div>
        </div>
    </section>
@endsection
