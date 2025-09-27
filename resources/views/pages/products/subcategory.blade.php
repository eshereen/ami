@extends('layouts.app')
@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
             alt="{{ $subcategory->name }}"
             class="object-cover w-full h-full">
        <div class="flex absolute inset-0 items-center bg-gradient-to-r from-blue-900/80 to-blue-700/60">
            <div class="container px-4 mx-auto">
                <div class="max-w-4xl">
                    <nav class="mb-4 text-sm text-blue-100">
                        <a href="{{ route('home') }}" class="hover:text-white">Home</a>
                        <span class="mx-2">/</span>
                        <a href="{{ route('categories.index') }}" class="hover:text-white">Categories</a>
                        <span class="mx-2">/</span>
                        <a href="{{ route('category.show', $subcategory->category->slug) }}" class="hover:text-white">{{ $subcategory->category->name }}</a>
                        <span class="mx-2">/</span>
                        <span class="text-white">{{ $subcategory->name }}</span>
                    </nav>
                    <h1 class="mb-4 text-4xl font-bold text-white md:text-5xl fade-in">{{ $subcategory->name }}</h1>
                    <p class="max-w-2xl text-xl text-blue-100 fade-in">
                        Browse all our products. Use filters to find exactly what you need.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col gap-8 lg:flex-row" x-data="{
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
                    <div class="sticky top-8 p-6 bg-white rounded-xl shadow-lg">
                        <h3 class="mb-6 text-xl font-bold text-gray-900">Filter Products</h3>

                        <!-- Search -->
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-700">Search Products</label>
                            <input type="text"
                                   x-model="searchQuery"
                                   x-on:input="filterProducts"
                                   placeholder="Search products..."
                                   class="px-4 py-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-ami-orange focus:border-transparent">
                        </div>

                        <!-- Categories Filter -->
                        <div class="mb-6">
                            <button @click="expandedCategory = expandedCategory === 'categories' ? null : 'categories'"
                                    class="flex justify-between items-center mb-3 w-full font-semibold text-left text-gray-900">
                                <span>Categories</span>
                                <i class="transition-transform duration-200 fas fa-plus"
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
                                                class="block py-1 w-full text-left text-gray-600 transition hover:text-ami-orange"
                                                :class="{ 'text-ami-orange font-semibold': activeCategory === {{ $category->id }} }">
                                            {{ $category->name }}
                                            <span class="ml-1 text-xs text-gray-500">({{ $category->subcategories->count() }})</span>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Subcategories Filter -->
                        <div class="mb-6">
                            <button @click="expandedSubcategory = expandedSubcategory === 'subcategories' ? null : 'subcategories'"
                                    class="flex justify-between items-center mb-3 w-full font-semibold text-left text-gray-900">
                                <span>Subcategories</span>
                                <i class="transition-transform duration-200 fas fa-plus"
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
                                        <div class="mb-2 text-sm font-medium text-gray-700">{{ $category->name }}</div>
                                        @foreach($category->subcategories as $subcat)
                                            <div class="ml-4">
                                                <button @click="selectSubcategory({{ $subcat->id }})"
                                                        class="block py-1 w-full text-left text-gray-600 transition hover:text-ami-orange"
                                                        :class="{ 'text-ami-orange font-semibold': activeSubcategory === {{ $subcat->id }} }">
                                                    {{ $subcat->name }}
                                                    <span class="ml-1 text-xs text-gray-500">({{ $subcat->products->count() }})</span>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Reset Filters -->
                        <button @click="resetFilters"
                                class="px-4 py-2 w-full text-gray-700 bg-gray-100 rounded-lg transition hover:bg-gray-200">
                            Reset Filters
                        </button>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="lg:w-3/4">
                    <!-- Results Header -->
                    <div class="flex flex-col justify-between items-start mb-6 sm:flex-row sm:items-center">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">Products</h2>
                            <p class="text-gray-600" x-text="`${filteredProducts.length} products found`"></p>
                        </div>
                        <div class="mt-4 sm:mt-0">
                            <select class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-ami-orange focus:border-transparent">
                                <option>Sort by Name</option>
                                <option>Sort by Model</option>
                                <option>Sort by Date</option>
                            </select>
                        </div>
                    </div>

                    <!-- Products Grid -->
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                        <template x-for="product in filteredProducts" :key="product.id">
                            <div class="overflow-hidden bg-white rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl product-card">
                                <a :href="`/product/${product.slug}`" class="block">
                                    <div class="relative">
                                        <img :src="product.image ? `/storage/${product.image}` : '/imgs/products/G1.png'"
                                             :alt="product.name"
                                             class="object-contain w-full h-48">
                                        <div class="absolute top-4 left-4">
                                            <span class="px-3 py-1 text-sm font-semibold text-white rounded-full bg-ami-orange" x-text="product.subcategory.name">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <h3 class="mb-2 text-lg font-bold text-gray-900" x-text="product.name"></h3>
                                        <p class="mb-3 text-gray-600" x-text="product.model_name"></p>
                                        <div class="flex justify-between items-center">
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
                         class="py-12 text-center">
                        <div class="flex justify-center items-center mx-auto mb-4 w-24 h-24 bg-gray-100 rounded-full">
                            <i class="text-3xl text-gray-400 fas fa-search"></i>
                        </div>
                        <h3 class="mb-2 text-xl font-semibold text-gray-900">No products found</h3>
                        <p class="mb-6 text-gray-600">Try adjusting your search criteria or browse other categories.</p>
                        <button @click="resetFilters"
                                class="px-6 py-3 font-semibold text-white rounded-lg transition bg-ami-orange hover:bg-orange-600">
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
        <div class="container px-4 mx-auto">
            <div class="mb-12 text-center">
                <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">Related Products</h2>
                <p class="mx-auto max-w-2xl text-xl text-gray-600">Explore more products from {{ $subcategory->category->name }}</p>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach($relatedProducts as $product)
                    <div class="overflow-hidden bg-white rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl product-card">
                        <a href="{{ route('product.show', $product->slug) }}" class="block">
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
                                <h3 class="mb-2 text-lg font-bold text-gray-900">{{ $product->name }}</h3>
                                <p class="mb-3 text-gray-600">{{ $product->model_name }}</p>
                                <div class="flex justify-between items-center">
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
