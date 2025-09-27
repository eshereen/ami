    <!-- Header -->
    <header class="fixed top-0 right-0 left-0 z-50 transition-all duration-300"
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
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img :src="(scrolled || mobileMenuOpen || !onHome) ? '{{ asset('imgs/logo.png') }}' : '{{ asset('imgs/dark-logo.png') }}'"
                         alt="AMI Logo"
                         class="h-14 transition-all duration-300"
                         width="160"
                         height="56"
                         style="aspect-ratio:160/56;">
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden relative space-x-8 md:flex">
                    <a href="{{ route('home') }}"
                       class="transition hover:text-ami-orange hover:underline"
                       :class="(scrolled || !onHome) ? 'text-gray-700' : 'text-white'">Home</a>
                    <a href="{{ route('about') }}"
                       class="transition hover:text-ami-orange hover:underline"
                       :class="(scrolled || !onHome) ? 'text-gray-700' : 'text-white'">About</a>
                    <div class="relative"
                         @mouseenter="clearTimeout(productsHoverTimeout); productsOpen = true"
                         @mouseleave="productsHoverTimeout = setTimeout(() => productsOpen = false, 150)">
                        <a href="{{ route('products.index') }}"
                           class="inline-flex items-center transition hover:text-ami-orange hover:underline"
                           :class="(scrolled || !onHome) ? 'text-gray-700' : 'text-white'">
                            Products
                            <svg class="ml-1 w-4 h-4 transition-transform duration-200"
                                 :class="productsOpen ? 'rotate-180' : ''"
                                 fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>
                        </a>

                        <div
                            x-cloak
                            x-show="productsOpen"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-2 scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                            x-transition:leave-end="opacity-0 -translate-y-2 scale-95"
                            @mouseenter="clearTimeout(productsHoverTimeout); productsOpen = true"
                            @mouseleave="productsHoverTimeout = setTimeout(() => productsOpen = false, 150)"
                            class="absolute left-1/2 transform -translate-x-1/2 top-full mt-2 w-screen max-w-4xl bg-white shadow-2xl border border-gray-200 rounded-lg p-6 z-[9999] overflow-hidden navbar-dropdown"
                            style="display: none;"
                        >
                            <?php $categories = \App\Models\Category::with(['subcategories' => function($q){ $q->withCount('products'); }])->take(4)->get(); ?>
                            <div class="flex divide-x divide-gray-200">
                                @foreach ($categories as $category)
                                    <div class="px-6 w-1/4 first:pl-0 last:pr-0">
                                        <a href="{{ route('category.show', $category->slug) }}"
                                           class="block mb-3 text-sm font-semibold text-gray-900 transition-colors duration-200 hover:text-ami-orange">
                                            {{ $category->name }}
                                        </a>
                                        <ul class="space-y-2">
                                            @foreach ($category->subcategories as $subcategory)
                                                <li>
                                                    <a href="{{ route('subcategory.show', $subcategory->slug) }}"
                                                       class="flex justify-between items-center text-gray-700 transition-colors duration-200 hover:text-ami-orange group">
                                                        <span class="text-sm">{{ $subcategory->name }}</span>
                                                        <span class="ml-2 text-xs text-gray-500 transition-colors duration-200 group-hover:text-ami-orange">
                                                            ({{ $subcategory->products_count }})
                                                        </span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('services.index') }}"
                       class="transition hover:text-ami-orange hover:underline"
                       :class="(scrolled || !onHome) ? 'text-gray-700' : 'text-white'">Services</a>
                    <a href="{{ route('blog.index') }}"
                       class="transition hover:text-ami-orange hover:underline"
                       :class="(scrolled || !onHome) ? 'text-gray-700' : 'text-white'">Blog</a>
                    <a href="{{ route('home') }}#contact"
                       class="transition hover:text-ami-orange hover:underline"
                       :class="(scrolled || !onHome) ? 'text-gray-700' : 'text-white'">Contact</a>
                </nav>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen"
                        data-mobile-toggle
                        class="transition-colors duration-300 md:hidden focus:outline-none"
                        :class="(scrolled || !onHome) ? 'text-gray-700' : 'text-white'">
                    <i class="text-2xl fas fa-bars"></i>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div x-cloak
                 x-show="mobileMenuOpen"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95"
                 data-mobile-menu
                 class="p-4 mt-4 bg-white rounded-md md:hidden mobile-menu"
                 @click.away="mobileMenuOpen = false">
                <div class="flex flex-col space-y-3">
                    <a href="{{ route('home') }}"
                       class="text-gray-700 transition hover:text-ami-orange"
                       @click="mobileMenuOpen = false">Home</a>
                    <a href="{{ route('about') }}"
                       class="text-gray-700 transition hover:text-ami-orange"
                       @click="mobileMenuOpen = false">About</a>

                    <!-- Products with Mobile Mega Menu -->
                    <div class="relative">
                        <button @click="productsOpen = !productsOpen"
                                class="flex justify-between items-center w-full text-gray-700 transition hover:text-ami-orange">
                            <span>Products</span>
                            <svg class="w-4 h-4 transition-transform duration-200"
                                 :class="productsOpen ? 'rotate-180' : ''"
                                 fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
                            </svg>
                        </button>

                        <!-- Mobile Products Dropdown -->
                        <div x-show="productsOpen"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-95"
                             class="mt-3 ml-4 space-y-3">
                            <?php $categories = \App\Models\Category::with(['subcategories' => function($q){ $q->withCount('products'); }])->take(4)->get(); ?>
                            @foreach ($categories as $category)
                                <div class="pl-3 border-l-2 border-ami-orange">
                                    <a href="{{ route('category.show', $category->slug) }}"
                                       class="block mb-2 text-sm font-semibold text-gray-900 hover:text-ami-orange"
                                       @click="mobileMenuOpen = false">
                                        {{ $category->name }}
                                    </a>
                                    <ul class="space-y-1">
                                        @foreach ($category->subcategories as $subcategory)
                                            <li>
                                                <a href="{{ route('subcategory.show', $subcategory->slug) }}"
                                                   class="block text-sm text-gray-600 hover:text-ami-orange"
                                                   @click="mobileMenuOpen = false">
                                                    {{ $subcategory->name }}
                                                    <span class="text-xs text-gray-400">({{ $subcategory->products_count }})</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <a href="{{ route('services.index') }}"
                       class="text-gray-700 transition hover:text-ami-orange"
                       @click="mobileMenuOpen = false">Services</a>
                    <a href="{{ route('blog.index') }}"
                       class="text-gray-700 transition hover:text-ami-orange"
                       @click="mobileMenuOpen = false">Blog</a>
                    <a href="{{ route('home') }}#contact"
                       class="text-gray-700 transition hover:text-ami-orange"
                       @click="mobileMenuOpen = false">Contact</a>
                </div>
            </div>
        </div>
    </header>
