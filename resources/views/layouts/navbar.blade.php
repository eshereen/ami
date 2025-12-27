    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
            :class="scrolled ? 'bg-white shadow-md' : 'bg-transparent'"
            style="min-height:72px;"
            x-data="{
                scrolled: false,
                mobileMenuOpen: false,
                onHome: {{ request()->routeIs('home') ? 'true' : 'false' }}
            }"
            x-init="
                scrolled = window.scrollY > 50;
                window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 }, { passive: true });
            ">
        <div class="container px-4 py-3 mx-auto">
            <div class="flex items-center justify-between">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img :src="(scrolled || mobileMenuOpen || !onHome) ? '{{ asset('imgs/logo.png') }}' : '{{ asset('imgs/logo.png') }}'"
                         alt="AMI Logo"
                         class="transition-all duration-300 h-14">
                </a>

                <!-- Desktop Navigation -->
                <nav class="relative hidden space-x-8 md:flex">
                    <a href="{{ route('home') }}"
                       class="transition hover:text-ami-orange hover:underline"
                       :class="(scrolled || !onHome) ? 'text-gray-700' : 'text-white'">Home</a>
                    <a href="{{ route('about') }}"
                       class="transition hover:text-ami-orange hover:underline"
                       :class="(scrolled || !onHome) ? 'text-gray-700' : 'text-white'">About</a>

                    <!-- Products Dropdown (Desktop) -->
                    <div class="relative group"
                         x-data="{ open: false }"
                         @mouseenter="open = true"
                         @mouseleave="open = false">
                        <a href="{{ route('products.index') }}"
                           class="inline-flex items-center transition hover:text-ami-orange hover:underline"
                           :class="(scrolled || !onHome) ? 'text-gray-700' : 'text-white'">
                            Products
                            <svg class="w-4 h-4 ml-1 transition-transform duration-200"
                                 :class="open ? 'rotate-180' : ''"
                                 fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        
                        <!-- Dropdown Menu -->
                        <div x-cloak
                             x-show="open"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 translate-y-2"
                             class="absolute top-full text-left left-0 w-72 mt-2 bg-white shadow-xl border border-gray-100 rounded-lg overflow-hidden z-[100]">
                            
                            <?php $categories = \App\Models\Category::get(); ?>
                            
                            <div class="py-2">
                                @foreach ($categories as $category)
                                    <a href="{{ $category->name === 'Diesel Generator Sets' ? route('genset.index') : route('category.show', $category->slug) }}"
                                       class="block w-full px-4 py-3 text-sm font-medium text-gray-700 transition-colors duration-200 hover:bg-[#ec2600] hover:text-white border-b border-gray-50 last:border-0">
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
                       class="transition hover:text-ami-orange hover:underline"
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
                <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="text-gray-700 transition-colors duration-300 md:hidden focus:outline-none">
                    <i class="text-2xl fas" :class="mobileMenuOpen ? 'fa-times' : 'fa-bars'"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div x-show="mobileMenuOpen"
             x-collapse
             class="bg-white border-t border-gray-100 shadow-xl md:hidden overflow-y-auto max-h-[80vh]">
            <div class="flex flex-col p-4 space-y-3">
                <a href="{{ route('home') }}"
                   class="font-medium text-gray-700 transition hover:text-ami-orange">Home</a>
                <a href="{{ route('about') }}"
                   class="font-medium text-gray-700 transition hover:text-ami-orange">About</a>

                <!-- Products Mobile Dropdown -->
                <div x-data="{ productsExpanded: false }">
                    <button @click="productsExpanded = !productsExpanded"
                            class="flex items-center justify-between w-full font-medium text-gray-700 transition hover:text-ami-orange">
                        <span>Products</span>
                        <svg class="w-4 h-4 transition-transform duration-200"
                             :class="productsExpanded ? 'rotate-180' : ''"
                             fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div x-show="productsExpanded"
                         x-collapse
                         class="mt-2 space-y-1">
                        @foreach ($categories as $category)
                            <a href="{{ $category->name === 'Diesel Generator Sets' ? route('genset.index') : route('category.show', $category->slug) }}"
                               class="block w-full px-4 py-3 text-sm font-medium text-gray-700 transition-colors duration-200 hover:bg-[#ec2600] hover:text-white active:bg-[#ec2600] active:text-white border-b border-gray-100 last:border-0">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <a href="{{ route('services.index') }}"
                   class="font-medium text-gray-700 transition hover:text-ami-orange">Services</a>
                <a href="{{ route('gallaries.index') }}"
                   class="font-medium text-gray-700 transition hover:text-ami-orange">Projects</a>
                <a href="{{ route('home') }}#contact"
                   class="font-medium text-gray-700 transition hover:text-ami-orange">Contact</a>
                <a href="/admin"
                   class="font-medium text-gray-700 transition hover:text-ami-orange flex items-center">
                    <i class="mr-2 fas fa-sign-in-alt"></i>Login
                </a>
            </div>
        </div>
    </header>
