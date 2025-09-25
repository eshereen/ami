@extends('layouts.app')
@section('content')
    <!-- Hero Section with Large Image -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
             alt="Product Subcategories"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-blue-700/60 flex items-center">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 fade-in">Product Subcategories</h1>
                <p class="text-xl text-blue-100 max-w-2xl fade-in">Browse our detailed product subcategories to find specific solutions</p>
            </div>
        </div>
    </section>

    <!-- Subcategories Filter Tabs -->
    <section class="container mx-auto px-4 py-8" x-data="{
        activeCategory: 'all',
        filteredSubcategories: @js($subcategories->toArray()),
        expandedCategory: null,

        init() {
            this.filterSubcategories();
        },

        filterSubcategories() {
            let subcategories = @js($subcategories->toArray());

            // Filter by category
            if (this.activeCategory !== 'all') {
                subcategories = subcategories.filter(subcategory => subcategory.category_id == this.activeCategory);
            }

            this.filteredSubcategories = subcategories;
        },

        resetFilters() {
            this.activeCategory = 'all';
            this.expandedCategory = null;
            this.filterSubcategories();
        },

        toggleCategory(categoryId) {
            this.expandedCategory = this.expandedCategory === categoryId ? null : categoryId;
        },

        selectCategory(categoryId) {
            this.activeCategory = categoryId;
            this.expandedCategory = null;
            this.filterSubcategories();
        }
    }">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Filters -->
            <div class="lg:w-1/4">
                <div class="bg-white rounded-lg shadow-lg p-6 sticky top-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Filter Subcategories</h3>

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
                        @foreach ($categories as $category)
                        <div class="mb-2">
                            <button @click="toggleCategory({{ $category->id }})"
                                    class="w-full flex items-center justify-between px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                                <span>{{ $category->name }}</span>
                                <i class="fas fa-plus transition-transform duration-300"
                                   :class="expandedCategory === {{ $category->id }} ? 'rotate-45' : ''"></i>
                            </button>

                            <!-- Subcategories Preview -->
                            <div x-show="expandedCategory === {{ $category->id }}"
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 transform -translate-y-2"
                                 x-transition:enter-end="opacity-100 transform translate-y-0"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 transform translate-y-0"
                                 x-transition:leave-end="opacity-0 transform -translate-y-2"
                                 class="ml-4 mt-2 space-y-1">
                                @foreach ($category->subcategories as $subcategory)
                                <div class="px-3 py-2 text-sm text-gray-600 bg-gray-50 rounded-lg">
                                    {{ $subcategory->name }} ({{ $subcategory->products_count }})
                                </div>
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
                            <span x-text="filteredSubcategories.length"></span> subcategories found
                        </p>
                    </div>
                </div>
            </div>

            <!-- Subcategories Grid -->
            <div class="lg:w-3/4">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Subcategories</h2>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-600">
                            Showing <span x-text="filteredSubcategories.length"></span> subcategories
                        </span>
                    </div>
                </div>

                <!-- Subcategories Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <template x-for="subcategory in filteredSubcategories" :key="subcategory.id">
                        <div x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 transform translate-y-4"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             class="bg-white rounded-xl shadow-lg overflow-hidden border border-blue-100 hover-lift">
                            <div class="h-48 bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
                                <div class="text-center text-white">
                                    <i class="fas fa-layer-group text-4xl mb-4"></i>
                                    <h3 class="text-lg font-bold" x-text="subcategory.name"></h3>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-2">
                                    <h3 class="text-xl font-bold text-blue-900" x-text="subcategory.name"></h3>
                                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded-full"
                                          x-text="subcategory.category.name"></span>
                                </div>

                                <div class="space-y-2 mb-4">
                                    <template x-if="subcategory.products && subcategory.products.length > 0">
                                        <div>
                                            <template x-for="product in subcategory.products.slice(0, 2)" :key="product.id">
                                                <div class="text-sm text-gray-500 flex items-center">
                                                    <i class="fas fa-cube text-ami-orange mr-2"></i>
                                                    <span x-text="product.name"></span>
                                                </div>
                                            </template>
                                            <template x-if="subcategory.products.length > 2">
                                                <div class="text-sm text-gray-400">
                                                    +<span x-text="subcategory.products.length - 2"></span> more products...
                                                </div>
                                            </template>
                                        </div>
                                    </template>
                                    <template x-if="!subcategory.products || subcategory.products.length === 0">
                                        <div class="text-sm text-gray-400 italic">No products available</div>
                                    </template>
                                </div>

                                <div class="flex justify-between items-center">
                                    <span class="text-ami-orange font-semibold">
                                        <span x-text="subcategory.products ? subcategory.products.length : 0"></span> Products
                                    </span>
                                    <a :href="'/subcategory/' + subcategory.slug" class="text-blue-600 hover:text-ami-orange transition">
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- No Results -->
                <div x-show="filteredSubcategories.length === 0"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     class="text-center py-16">
                    <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">No Subcategories Found</h3>
                    <p class="text-gray-500 mb-4">Try adjusting your filters.</p>
                    <button @click="resetFilters()"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                        Clear All Filters
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Find Your Perfect Product?</h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">Explore our complete product catalog or get personalized recommendations from our experts.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('products.index') }}" class="bg-ami-orange text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                    View All Products
                </a>
                <a href="{{ route('categories.index') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition">
                    Browse Categories
                </a>
            </div>
        </div>
    </section>
@endsection
