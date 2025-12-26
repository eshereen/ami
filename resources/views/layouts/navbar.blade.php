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
                         x-data="{ productsOpen: false }"
                         @mouseenter="productsOpen = true"
                         @mouseleave="productsOpen = false">
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
                            <?php $categories = \App\Models\Category::take(6)->get(); ?>
                            <div class="py-2">
                                @foreach ($categories as $category)
                                    <a href="{{ $category->name === 'Diesel Generator Sets' ? route('genset.index') : route('category.show', $category->slug) }}"
                                       class="block px-4 py-3 text-sm font-medium text-gray-700 hover:bg-ami-orange hover:text-white transition-colors duration-200 border-b border-gray-50 last:border-0">
                                        {{ $category->name }}
                                    </a>
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
                    <div class="relative" x-data="{ productsOpen: false }">
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
                            <?php $categories = \App\Models\Category::take(6)->get(); ?>
                            @foreach ($categories as $category)
                                <a href="{{ $category->name === 'Diesel Generator Sets' ? route('genset.index') : route('category.show', $category->slug) }}"
                                   class="block py-2 text-sm font-medium text-gray-700 hover:text-ami-orange transition-colors duration-200 border-b border-gray-100 last:border-0"
                                   @click="mobileMenuOpen = false">
                                    {{ $category->name }}
                                </a>
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
