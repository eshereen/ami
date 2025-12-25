    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
            :class="scrolled ? 'bg-white shadow-md' : 'bg-transparent'"
            style="min-height:72px;"
            x-data="{
                scrolled: false,
                mobileMenuOpen: false,
                productsOpen: false,
                productsHoverTimeout: null,
                onHome: {{ request()->routeIs('home') ? 'true' : 'false' }}
            }"
            x-init="
                // Initialize scroll state
                scrolled = window.scrollY > 50;

                // Add scroll listener
                const handleScroll = () => {
                    scrolled = window.scrollY > 50;
                };

                window.addEventListener('scroll', handleScroll, { passive: true });

                // Cleanup on component destroy
                this.$el.addEventListener('alpine:destroying', () => {
                    window.removeEventListener('scroll', handleScroll);
                });
            ">
        <div class="container px-4 py-3 mx-auto">
            <div class="flex items-center justify-between">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img :src="(scrolled || mobileMenuOpen || !onHome) ? '{{ asset('imgs/logo.png') }}' : '{{ asset('imgs/logo.png') }}'"
                         alt="AMI Logo"
                         class="transition-all duration-300 h-14"
                        >
                </a>

                <!-- Desktop Navigation -->
                <nav class="relative hidden space-x-8 md:flex">
                    <a href="{{ route('home') }}"
                       class="transition hover:text-ami-orange hover:underline"
                       :class="(scrolled || !onHome) ? 'text-gray-700' : 'text-white'">Home</a>
                    <a href="{{ route('about') }}"
                       class="transition hover:text-ami-orange hover:underline"
                       :class="(scrolled || !onHome) ? 'text-gray-700' : 'text-white'">About</a>
                    <div class="relative"
                         x-data="{ 
                             productsOpen: false, 
                             activeCategory: null,
                             toggleCategory(id) {
                                 this.activeCategory = this.activeCategory === id ? null : id;
                             }
                         }"
                         @mouseenter="productsOpen = true"
                         @mouseleave="productsOpen = false; activeCategory = null">
                        <a href="{{ route('products.index') }}"
                           class="inline-flex items-center transition hover:text-ami-orange hover:underline"
                           :class="(scrolled || !onHome) ? 'text-gray-700' : 'text-white'">
                            Products
                            <svg class="w-4 h-4 ml-1 transition-transform duration-200"
                                 :class="productsOpen ? 'rotate-180' : ''"
                                 fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>
                        </a>
                        <div
                            x-cloak
                            x-show="productsOpen"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-2"
                            class="absolute top-full text-left left-0 w-64 mt-2 bg-white shadow-xl border border-gray-100 rounded-lg overflow-hidden z-[100]"
                        >
                            <?php $categories = \App\Models\Category::with(['subcategories' => function($q){ $q->withCount('products'); }])->take(6)->get(); ?>
                            <div class="py-2">
                                @foreach ($categories as $category)
                                    <div class="relative border-b border-gray-50 last:border-0">
                                        <button 
                                            @click.prevent="toggleCategory({{ $category->id }})"
                                            class="flex items-center justify-between w-full px-4 py-3 text-sm font-medium text-gray-700 hover:bg-ami-orange hover:text-white transition-colors duration-200"
                                            :class="activeCategory === {{ $category->id }} ? 'bg-ami-orange text-white' : ''"
                                        >
                                            <span class="truncate">{{ $category->name }}</span>
                                            <div class="flex items-center justify-center w-5 h-5">
                                                <!-- Plus Icon -->
                                                <svg x-show="activeCategory !== {{ $category->id }}" class="w-3 h-3 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                                <!-- Minus Icon -->
                                                <svg x-show="activeCategory === {{ $category->id }}" class="w-3 h-3 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                                            </div>
                                        </button>
                                        
                                        <!-- Subcategories Accordion -->
                                        <div 
                                            x-show="activeCategory === {{ $category->id }}"
                                            x-collapse
                                            class="bg-ami-light-blue/50"
                                        >
                                            <ul class="py-1 px-4 pb-2 space-y-1">
                                                <!-- Category Link -->
                                                <li>
                                                    <a href="{{ route('category.show', $category->slug) }}" class="block py-1 text-xs font-semibold text-ami-orange hover:underline">
                                                        View All {{ $category->name }}
                                                    </a>
                                                </li>
                                                @foreach ($category->subcategories as $subcategory)
                                                    <li>
                                                        <a href="{{ route('subcategory.show', $subcategory->slug) }}"
                                                           class="flex items-center justify-between px-3 py-2 text-xs text-gray-700 transition-all duration-300 ease-in-out rounded hover:bg-ami-orange hover:text-white hover:shadow-md transform hover:-translate-y-0.5">
                                                            <span>{{ $subcategory->name }}</span>
                                                            <span class="text-[10px] opacity-70">({{ $subcategory->products_count }})</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('services.index') }}"
                       class="transition hover:text-ami-orange hover:underline"
                       :class="(scrolled || !onHome) ? 'text-gray-700' : 'text-white'">Services</a>
                       <a href="{{ route('gallaries.index') }}"
                       class="text-gray-700 transition hover:text-ami-orange hover:underline"
                       :class="(scrolled || !onHome) ? 'text-gray-700' : 'text-white'">Projects</a>
                    <a href="{{ route('home') }}#contact"
                       class="transition hover:text-ami-orange hover:underline"
                       :class="(scrolled || !onHome) ? 'text-gray-700' : 'text-white'">Contact</a>
                    <a href="/admin"
                       class="transition hover:text-ami-orange hover:underline"
                       :class="(scrolled || !onHome) ? 'text-gray-700' : 'text-white'"
                       title="Admin Login">
                        <i class="fas fa-sign-in-alt"></i>
                    </a>
                </nav>

                <!-- Mobile Menu Button -->
                <button data-mobile-toggle
                        class="text-gray-700 transition-colors duration-300 md:hidden focus:outline-none">
                    <i class="text-2xl fas fa-bars"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation - Moved outside flex container -->
        <div data-mobile-menu
             class="p-4 mt-4 bg-white rounded-md border border-gray-100 shadow-xl md:hidden mobile-menu"
             style="display: none;">
                <div class="flex flex-col space-y-3">
                    <a href="{{ route('home') }}"
                       class="text-gray-700 transition hover:text-ami-orange">Home</a>
                    <a href="{{ route('about') }}"
                       class="text-gray-700 transition hover:text-ami-orange">About</a>


                    <!-- Products with Mobile Mega Menu -->
                    <div class="relative" x-data="{ productsOpen: false, activeCategory: null, toggleCategory(id) { this.activeCategory = this.activeCategory === id ? null : id; } }">
                        <button @click="productsOpen = !productsOpen"
                                class="flex items-center justify-between w-full text-gray-700 transition hover:text-ami-orange">
                            <span>Products</span>
                            <svg class="w-4 h-4 transition-transform duration-200"
                                 :class="productsOpen ? 'rotate-180' : ''"
                                 fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <!-- Mobile Products Dropdown -->
                        <div x-show="productsOpen"
                             x-collapse
                             class="mt-2 ml-2 space-y-1">
                            <?php $categories = \App\Models\Category::with(['subcategories' => function($q){ $q->withCount('products'); }])->take(6)->get(); ?>
                            @foreach ($categories as $category)
                                <div class="border-b border-gray-100 last:border-0">
                                    <button 
                                        @click.prevent="toggleCategory({{ $category->id }})"
                                        class="flex items-center justify-between w-full py-2 text-sm font-medium text-gray-700 hover:text-ami-orange transition-colors duration-200"
                                        :class="activeCategory === {{ $category->id }} ? 'text-ami-orange' : ''"
                                    >
                                        <span>{{ $category->name }}</span>
                                        <div class="flex items-center justify-center w-5 h-5">
                                            <svg x-show="activeCategory !== {{ $category->id }}" class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                            <svg x-show="activeCategory === {{ $category->id }}" class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                                        </div>
                                    </button>
                                    
                                    <div x-show="activeCategory === {{ $category->id }}" x-collapse class="pl-2 pb-2">
                                        <a href="{{ route('category.show', $category->slug) }}" class="block py-1 text-xs font-semibold text-ami-orange hover:underline mb-1">
                                            View All {{ $category->name }}
                                        </a>
                                        <ul class="space-y-1">
                                            @foreach ($category->subcategories as $subcategory)
                                                <li>
                                                    <a href="{{ route('subcategory.show', $subcategory->slug) }}"
                                                       class="block text-xs text-gray-600 hover:text-ami-orange"
                                                       @click="mobileMenuOpen = false">
                                                        {{ $subcategory->name }}
                                                        <span class="text-[10px] text-gray-400">({{ $subcategory->products_count }})</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <a href="{{ route('services.index') }}"
                       class="text-gray-700 transition hover:text-ami-orange"
                       @click="mobileMenuOpen = false">Services</a>

                       <a href="{{ route('gallaries.index') }}"
                       class="text-gray-700 transition hover:text-ami-orange"
                       @click="mobileMenuOpen = false">Projects</a>
                       
                    <a href="{{ route('home') }}#contact"
                       class="text-gray-700 transition hover:text-ami-orange"
                       @click="mobileMenuOpen = false">Contact</a>
                       <a href="/admin"
                       class="text-gray-700 transition hover:text-ami-orange"
                       title="Admin Login">
                        <i class="mr-2 fas fa-sign-in-alt"></i>Login
                    </a>
                </div>
            </div>
        </div>
    </header>
