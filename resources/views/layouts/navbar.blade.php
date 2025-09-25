    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50" style="min-height:72px;">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <img src="{{ asset('imgs/logo.png') }}" alt="AMI Logo" class="h-14" width="160" height="56" style="aspect-ratio:160/56;">

                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-8 relative" x-data="{ productsOpen: false }" @mouseleave="productsOpen = false">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-ami-orange  hover:underline transition">Home</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-ami-orange  hover:underline transition">About</a>
                    <div class="relative" @mouseenter="productsOpen = true">
                        <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-ami-orange hover:underline transition inline-flex items-center">
                            Products
                            <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>
                        </a>

                        <div
                            x-cloak
                            x-show="productsOpen"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 -translate-y-4 scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                            x-transition:leave-end="opacity-0 -translate-y-4 scale-95"
                            @mouseenter="productsOpen = true"
                            @mouseleave="productsOpen = false"
                            class="absolute top-full left-0 right-0 bg-white shadow-2xl border-t border-gray-200 p-8 z-[9999] overflow-x-hidden navbar-dropdown"
                            style="margin-top: -1px; display: none;"
                        >
                            <?php $categories = \App\Models\Category::with(['subcategories' => function($q){ $q->withCount('products'); }])->take(4)->get(); ?>
                            <div class="max-w-7xl mx-auto px-4">
                                <div class="flex divide-x">
                                @foreach ($categories as $category)
                                    <div class="px-6 w-1/4">
                                        <a href="{{ route('category.show', $category->slug) }}" class="text-sm font-semibold text-gray-900 hover:text-ami-orange">{{ $category->name }}</a>
                                        <ul class="mt-3 space-y-2">
                                            @foreach ($category->subcategories as $subcategory)
                                                <li>
                                                    <a href="{{ route('subcategory.show', $subcategory->slug) }}" class="flex items-center justify-between text-gray-700 hover:text-ami-orange">
                                                        <span class="text-sm">{{ $subcategory->name }}</span>
                                                        <span class="ml-2 text-xs text-gray-500">({{ $subcategory->products_count }})</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('services.index') }}" class="text-gray-700 hover:text-ami-orange  hover:underline transition">Services</a>
                    <a href="{{ route('blog.index') }}" class="text-gray-700 hover:text-ami-orange  hover:underline transition">Blog</a>
                    <a href="{{ route('home') }}#contact" class="text-gray-700 hover:text-ami-orange  hover:underline transition">Contact</a>
                </nav>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-gray-700 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div x-cloak x-show="mobileMenuOpen" x-transition class="md:hidden mt-4 pb-4" style="display: none;">
                <div class="flex flex-col space-y-3">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-ami-blue transition" @click="mobileMenuOpen = false">Home</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-ami-blue transition" @click="mobileMenuOpen = false">About</a>
                    <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-ami-blue transition" @click="mobileMenuOpen = false">Products</a>
                    <a href="{{ route('services.index') }}" class="text-gray-700 hover:text-ami-blue transition" @click="mobileMenuOpen = false">Services</a>
                    <a href="{{ route('blog.index') }}" class="text-gray-700 hover:text-ami-blue transition" @click="mobileMenuOpen = false">Blog</a>
                    <a href="{{ route('home') }}#contact" class="text-gray-700 hover:text-ami-blue transition" @click="mobileMenuOpen = false">Contact</a>
                </div>
            </div>
        </div>
    </header>
