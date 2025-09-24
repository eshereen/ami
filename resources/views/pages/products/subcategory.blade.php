@extends('layouts.app')
@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
             alt="{{ $subcategory->name }}"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-blue-700/60 flex items-center">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl">
                    <nav class="text-sm text-blue-100 mb-4">
                        <a href="{{ route('home') }}" class="hover:text-white">Home</a>
                        <span class="mx-2">/</span>
                        <a href="{{ route('categories.index') }}" class="hover:text-white">Categories</a>
                        <span class="mx-2">/</span>
                        <a href="{{ route('category.show', $subcategory->category->slug) }}" class="hover:text-white">{{ $subcategory->category->name }}</a>
                        <span class="mx-2">/</span>
                        <span class="text-white">{{ $subcategory->name }}</span>
                    </nav>
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 fade-in">{{ $subcategory->name }}</h1>
                    <p class="text-xl text-blue-100 max-w-2xl fade-in">
                        Browse all our products. Use filters to find exactly what you need.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8" x-data="{
                activeCategory: '',
                activeSubcategory: '',
                searchQuery: '',
                filteredProducts: @js($allProducts),
                expandedCategory: 'categories',
                expandedSubcategory: 'subcategories',

                filterProducts() {
                    let products = @js($allProducts);

                    // Filter by search query
                    if (this.searchQuery) {
                        const query = this.searchQuery.toLowerCase();
                        products = products.filter(product => {
                            return product.name.toLowerCase().includes(query) ||
                                   product.model_name.toLowerCase().includes(query) ||
                                   product.description.toLowerCase().includes(query);
                        });
                    }

                    // Filter by category
                    if (this.activeCategory) {
                        products = products.filter(product => {
                            return product.subcategory.category_id == this.activeCategory;
                        });
                    }

                    // Filter by subcategory
                    if (this.activeSubcategory) {
                        products = products.filter(product => {
                            return product.subcategory_id == this.activeSubcategory;
                        });
                    }

                    this.filteredProducts = products;
                },

                resetFilters() {
                    this.searchQuery = '';
                    this.activeCategory = '';
                    this.activeSubcategory = '';
                    this.filteredProducts = @js($allProducts);
                },

                selectCategory(categoryId) {
                    this.activeCategory = this.activeCategory === categoryId ? '' : categoryId;
                    this.activeSubcategory = ''; // Reset subcategory when category changes
                    this.filterProducts();
                },

                selectSubcategory(subcategoryId) {
                    this.activeSubcategory = this.activeSubcategory === subcategoryId ? '' : subcategoryId;
                    this.filterProducts();
                }
            }">

                <!-- Sidebar -->
                <div class="lg:w-1/4">
                    <div class="bg-white rounded-xl shadow-lg p-6 sticky top-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-6">Filter Products</h3>

                        <!-- Search -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Search Products</label>
                            <input type="text"
                                   x-model="searchQuery"
                                   x-on:input="filterProducts"
                                   placeholder="Search products..."
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-ami-orange focus:border-transparent">
                        </div>

                        <!-- Categories Filter -->
                        <div class="mb-6">
                            <button @click="expandedCategory = expandedCategory === 'categories' ? null : 'categories'"
                                    class="flex items-center justify-between w-full text-left font-semibold text-gray-900 mb-3">
                                <span>Categories</span>
                                <i class="fas fa-plus transition-transform duration-200"
                                   :class="{ 'rotate-45': expandedCategory === 'categories' }"></i>
                            </button>
                            <div x-show="expandedCategory === 'categories'"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 -translate-y-2"
                                 x-transition:enter-end="opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 translate-y-0"
                                 x-transition:leave-end="opacity-0 -translate-y-2"
                                 class="space-y-2">
                                @foreach($allCategories as $category)
                                    <div class="ml-4">
                                        <button @click="selectCategory({{ $category->id }})"
                                                class="block w-full text-left text-gray-600 hover:text-ami-orange transition py-1"
                                                :class="{ 'text-ami-orange font-semibold': activeCategory === {{ $category->id }} }">
                                            {{ $category->name }}
                                            <span class="text-xs text-gray-500 ml-1">({{ $category->subcategories->count() }})</span>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Subcategories Filter -->
                        <div class="mb-6">
                            <button @click="expandedSubcategory = expandedSubcategory === 'subcategories' ? null : 'subcategories'"
                                    class="flex items-center justify-between w-full text-left font-semibold text-gray-900 mb-3">
                                <span>Subcategories</span>
                                <i class="fas fa-plus transition-transform duration-200"
                                   :class="{ 'rotate-45': expandedSubcategory === 'subcategories' }"></i>
                            </button>
                            <div x-show="expandedSubcategory === 'subcategories'"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 -translate-y-2"
                                 x-transition:enter-end="opacity-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 translate-y-0"
                                 x-transition:leave-end="opacity-0 -translate-y-2"
                                 class="space-y-2">
                                @foreach($allCategories as $category)
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-700 mb-2">{{ $category->name }}</div>
                                        @foreach($category->subcategories as $subcat)
                                            <div class="ml-4">
                                                <button @click="selectSubcategory({{ $subcat->id }})"
                                                        class="block w-full text-left text-gray-600 hover:text-ami-orange transition py-1"
                                                        :class="{ 'text-ami-orange font-semibold': activeSubcategory === {{ $subcat->id }} }">
                                                    {{ $subcat->name }}
                                                    <span class="text-xs text-gray-500 ml-1">({{ $subcat->products->count() }})</span>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Reset Filters -->
                        <button @click="resetFilters"
                                class="w-full bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition">
                            Reset Filters
                        </button>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="lg:w-3/4">
                    <!-- Results Header -->
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">Products</h2>
                            <p class="text-gray-600" x-text="`${filteredProducts.length} products found`"></p>
                        </div>
                        <div class="mt-4 sm:mt-0">
                            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-ami-orange focus:border-transparent">
                                <option>Sort by Name</option>
                                <option>Sort by Model</option>
                                <option>Sort by Date</option>
                            </select>
                        </div>
                    </div>

                    <!-- Products Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                        <template x-for="product in filteredProducts" :key="product.id">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 product-card">
                                <a :href="`/product/${product.slug}`" class="block">
                                    <div class="relative">
                                        <img :src="product.image ? `/storage/${product.image}` : '/imgs/products/G1.png'"
                                             :alt="product.name"
                                             class="w-full h-48 object-cover">
                                        <div class="absolute top-4 left-4">
                                            <span class="bg-ami-orange text-white px-3 py-1 rounded-full text-sm font-semibold" x-text="product.subcategory.name">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <h3 class="text-lg font-bold text-gray-900 mb-2" x-text="product.name"></h3>
                                        <p class="text-gray-600 mb-3" x-text="product.model_name"></p>
                                        <div class="flex items-center justify-between">
                                            <span class="text-sm text-gray-500" x-text="product.fuel_type"></span>
                                            <span class="text-sm text-gray-500" x-text="product.frequency"></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </template>
                    </div>

                    <!-- Empty State -->
                    <div x-show="filteredProducts.length === 0"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         class="text-center py-12">
                        <div class="w-24 h-24 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-search text-3xl text-gray-400"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">No products found</h3>
                        <p class="text-gray-600 mb-6">Try adjusting your search criteria or browse other categories.</p>
                        <button @click="resetFilters"
                                class="bg-ami-orange text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                            Reset Filters
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(isset($relatedProducts) && $relatedProducts->count() > 0)
    <!-- Related Products -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Related Products</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Explore more products from {{ $subcategory->category->name }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($relatedProducts as $product)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 product-card">
                        <a href="{{ route('product.show', $product->slug) }}" class="block">
                            <div class="relative">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}"
                                         alt="{{ $product->name }}"
                                         class="w-full h-48 object-cover">
                                @else
                                    <img src="{{ asset('imgs/products/G1.png') }}"
                                         alt="{{ $product->name }}"
                                         class="w-full h-48 object-cover">
                                @endif
                                <div class="absolute top-4 left-4">
                                    <span class="bg-ami-orange text-white px-3 py-1 rounded-full text-sm font-semibold">
                                        {{ $product->subcategory->name }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $product->name }}</h3>
                                <p class="text-gray-600 mb-3">{{ $product->model_name }}</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-500">{{ $product->fuel_type }}</span>
                                    <span class="text-sm text-gray-500">{{ $product->frequency }}</span>
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
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Need Help Choosing?</h2>
            <p class="text-xl text-gray-700 mb-8 max-w-2xl mx-auto">Our experts are here to help you find the perfect {{ $subcategory->name }} solution for your needs.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact.index') }}" class="bg-ami-orange text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                    Contact Our Experts
                </a>
                <a href="{{ route('category.show', $subcategory->category->slug) }}" class="bg-transparent border-2 border-ami-orange text-ami-orange px-8 py-3 rounded-lg font-semibold hover:bg-ami-orange hover:text-white transition">
                    View All {{ $subcategory->category->name }}
                </a>
            </div>
        </div>
    </section>
@endsection
