@extends('layouts.app')
@section('content')
    <!-- Hero Section with Animations -->
    <section class="relative h-96 md:h-[500px] overflow-hidden" id="subcategories-hero">
        <!-- Animated Background Image with Parallax -->
        <div class="absolute inset-0 bg-black">
            @php
                $heroImageUrl = $heroImage 
                    ? asset('storage/' . $heroImage)
                    : asset('imgs/call.webp');
            @endphp
            <img src="{{ $heroImageUrl }}"
                 alt="Product Subcategories"
                 class="object-cover w-full h-full transition-transform duration-700 ease-out scale-110 hero-parallax">
        </div>
        
        <!-- Animated Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 via-blue-800/70 to-blue-700/60 animate-gradient"></div>
        
        <!-- Content with Staggered Animations -->
        <div class="flex absolute inset-0 items-center z-10">
            <div class="container px-4 mx-auto">
                <h1 class="mb-4 text-4xl font-bold text-white md:text-5xl opacity-0 translate-y-8 hero-title">
                    Product Subcategories
                </h1>
                <p class="max-w-2xl text-xl text-blue-100 opacity-0 translate-y-8 hero-description">
                    Browse our detailed product subcategories to find specific solutions
                </p>
            </div>
        </div>
        
        <!-- Decorative Animated Elements -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-ami-orange/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-ami-blue/10 rounded-full blur-3xl animate-pulse-slower"></div>
    </section>

    <style>
        /* Hero Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes gradientShift {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }

        @keyframes pulseSlow {
            0%, 100% {
                opacity: 0.3;
                transform: scale(1);
            }
            50% {
                opacity: 0.5;
                transform: scale(1.1);
            }
        }

        @keyframes pulseSlower {
            0%, 100% {
                opacity: 0.2;
                transform: scale(1);
            }
            50% {
                opacity: 0.4;
                transform: scale(1.15);
            }
        }

        /* Apply animations on page load */
        .hero-title {
            animation: fadeInUp 1s ease-out 0.3s forwards;
        }

        .hero-description {
            animation: fadeInUp 1s ease-out 0.6s forwards;
        }

        .hero-parallax {
            animation: fadeInUp 1.2s ease-out forwards;
        }

        .animate-gradient {
            background-size: 200% 200%;
            animation: gradientShift 8s ease infinite;
        }

        .animate-pulse-slow {
            animation: pulseSlow 4s ease-in-out infinite;
        }

        .animate-pulse-slower {
            animation: pulseSlower 6s ease-in-out infinite;
        }

        /* Parallax scroll effect */
        @media (min-width: 768px) {
            .hero-parallax-container {
                transition: transform 0.1s ease-out;
            }
        }

        /* Reduced motion for accessibility */
        @media (prefers-reduced-motion: reduce) {
            .hero-title,
            .hero-description,
            .hero-parallax,
            .animate-gradient,
            .animate-pulse-slow,
            .animate-pulse-slower {
                animation: none !important;
                opacity: 1 !important;
                transform: none !important;
            }
        }
    </style>

    <script>
        // Parallax scroll effect for hero section
        document.addEventListener('DOMContentLoaded', function() {
            const hero = document.getElementById('subcategories-hero');
            const parallaxImage = hero?.querySelector('.hero-parallax');
            
            if (parallaxImage && window.matchMedia('(min-width: 768px)').matches) {
                let ticking = false;
                
                window.addEventListener('scroll', function() {
                    if (!ticking) {
                        window.requestAnimationFrame(function() {
                            const scrolled = window.pageYOffset;
                            const heroHeight = hero.offsetHeight;
                            
                            // Only apply parallax while hero is in view
                            if (scrolled < heroHeight) {
                                const parallaxSpeed = 0.5;
                                const yPos = -(scrolled * parallaxSpeed);
                                parallaxImage.style.transform = `translateY(${yPos}px) scale(1.1)`;
                            }
                            
                            ticking = false;
                        });
                        
                        ticking = true;
                    }
                }, { passive: true });
            }
        });
    </script>

    <!-- Subcategories Filter Tabs -->
    <section class="container px-4 py-8 mx-auto" x-data="{
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
        <div class="flex flex-col gap-8 lg:flex-row">
            <!-- Sidebar Filters -->
            <div class="lg:w-1/4">
                <div class="sticky top-8 p-6 bg-white rounded-lg shadow-lg">
                    <h3 class="mb-6 text-xl font-bold text-gray-900">Filter Subcategories</h3>

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
                        @foreach ($categories as $category)
                        <div class="mb-2">
                            <button @click="toggleCategory({{ $category->id }})"
                                    class="flex justify-between items-center px-3 py-2 w-full rounded-lg border border-gray-300 transition hover:bg-gray-50">
                                <span>{{ $category->name }}</span>
                                <i class="transition-transform duration-300 fas fa-plus"
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
                                 class="mt-2 ml-4 space-y-1">
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
                            class="px-4 py-2 w-full text-gray-700 bg-gray-100 rounded-lg transition hover:bg-gray-200">
                        <i class="mr-2 fas fa-refresh"></i>Reset Filters
                    </button>

                    <!-- Results Count -->
                    <div class="pt-4 mt-4 border-t border-gray-200">
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
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <template x-for="subcategory in filteredSubcategories" :key="subcategory.id">
                        <div x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 transform translate-y-4"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             class="overflow-hidden bg-white rounded-xl border border-blue-100 shadow-lg hover-lift">
                            <div class="flex justify-center items-center h-48 bg-gradient-to-br from-blue-500 to-blue-700">
                                <div class="text-center text-white">
                                    <i class="mb-4 text-4xl fas fa-layer-group"></i>
                                    <h3 class="text-lg font-bold" x-text="subcategory.name"></h3>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex justify-between items-center mb-2">
                                    <h3 class="text-xl font-bold text-blue-900" x-text="subcategory.name"></h3>
                                    <span class="px-2 py-1 text-xs font-semibold text-blue-800 bg-blue-100 rounded-full"
                                          x-text="subcategory.category.name"></span>
                                </div>

                                <div class="mb-4 space-y-2">
                                    <template x-if="subcategory.products && subcategory.products.length > 0">
                                        <div>
                                            <template x-for="product in subcategory.products.slice(0, 2)" :key="product.id">
                                                <div class="flex items-center text-sm text-gray-500">
                                                    <i class="mr-2 fas fa-cube text-ami-orange"></i>
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
                                        <div class="text-sm italic text-gray-400">No products available</div>
                                    </template>
                                </div>

                                <div class="flex justify-between items-center">
                                    <span class="font-semibold text-ami-orange">
                                        <span x-text="subcategory.products ? subcategory.products.length : 0"></span> Products
                                    </span>
                                    <a :href="'/subcategory/' + subcategory.slug" class="text-blue-600 transition hover:text-ami-orange">
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
                     class="py-16 text-center">
                    <i class="mb-4 text-6xl text-gray-300 fas fa-search"></i>
                    <h3 class="mb-2 text-xl font-semibold text-gray-600">No Subcategories Found</h3>
                    <p class="mb-4 text-gray-500">Try adjusting your filters.</p>
                    <button @click="resetFilters()"
                            class="px-6 py-2 text-white bg-blue-600 rounded-lg transition hover:bg-blue-700">
                        Clear All Filters
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800">
        <div class="container px-4 mx-auto text-center">
            <h2 class="mb-4 text-3xl font-bold text-white md:text-4xl">Ready to Find Your Perfect Product?</h2>
            <p class="mx-auto mb-8 max-w-2xl text-xl text-blue-100">Explore our complete product catalog or get personalized recommendations from our experts.</p>
            <div class="flex flex-col gap-4 justify-center sm:flex-row">
                <a href="{{ route('products.index') }}" class="px-8 py-3 font-semibold text-white rounded-lg transition bg-ami-orange hover:bg-orange-600">
                    View All Products
                </a>
                <a href="{{ route('categories.index') }}" class="px-8 py-3 font-semibold text-white bg-transparent rounded-lg border-2 border-white transition hover:bg-white hover:text-blue-600">
                    Browse Categories
                </a>
            </div>
        </div>
    </section>
@endsection
