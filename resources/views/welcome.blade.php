<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al Mohandes International (AMI) | Powering Reliability Since 1983</title>
    <meta name="description" content="AMI is a globally recognized diesel generator manufacturer, offering custom power solutions, turnkey projects, and comprehensive after-sales service since 1983.">
    <meta name="keywords" content="diesel generators, power solutions, Al Mohandes International, AMI, generator sets, turnkey projects">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        /* Custom scrollbar for a more modern look */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #0d47a1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #1e88e5;
        }
        /* Animation for sections fading in on scroll */
        .fade-in-section {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .fade-in-section.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <script>
        // Custom Tailwind CSS Configuration
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'ami-blue': {
                            DEFAULT: '#0d47a1', // Main Blue
                            light: '#1e88e5',   // Lighter Blue for highlights
                            dark: '#0b3d91',    // Darker Blue for depth
                        },
                        'ami-orange': {
                            DEFAULT: '#f57c00', // Main Orange for CTAs
                            light: '#ffa726',
                            dark: '#ef6c00',
                        },
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-white text-slate-800">

    <!-- Header -->
    <header x-data="{ scrolled: false, mobileMenuOpen: false }" @scroll.window="scrolled = (window.scrollY > 50)" class="sticky top-0 z-50 transition-all duration-300" :class="{ 'bg-white/90 shadow-lg backdrop-blur-sm': scrolled, 'bg-transparent': !scrolled }">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="#" class="text-2xl font-bold text-ami-blue">
                    AMI<span class="text-ami-orange">.</span>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="#about" class="text-slate-600 hover:text-ami-blue transition-colors">About</a>

                    <!-- Products Mega Dropdown -->
                    <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                        <a href="#products" @click.prevent="open = !open" class="text-slate-600 hover:text-ami-blue transition-colors flex items-center">
                            Products <i data-lucide="chevron-down" class="w-4 h-4 ml-1"></i>
                        </a>
                        <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-2" class="absolute -left-1/2 mt-2 w-screen max-w-sm rounded-lg shadow-lg bg-white ring-1 ring-black ring-opacity-5" style="display: none;">
                            <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                                <a href="#" class="flex items-start rounded-lg p-3 -m-3 hover:bg-gray-50">
                                    <i data-lucide="server" class="h-6 w-6 text-ami-orange"></i>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">Generator Sets</p>
                                        <p class="mt-1 text-sm text-gray-500">Open, silent, and containerized sets for all needs.</p>
                                    </div>
                                </a>
                                <a href="#" class="flex items-start rounded-lg p-3 -m-3 hover:bg-gray-50">
                                    <i data-lucide="settings-2" class="h-6 w-6 text-ami-orange"></i>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">Accessories</p>
                                        <p class="mt-1 text-sm text-gray-500">Essential components to enhance performance.</p>
                                    </div>
                                </a>
                                <a href="#" class="flex items-start rounded-lg p-3 -m-3 hover:bg-gray-50">
                                    <i data-lucide="truck" class="h-6 w-6 text-ami-orange"></i>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">Trailers</p>
                                        <p class="mt-1 text-sm text-gray-500">Mobile power solutions for any terrain.</p>
                                    </div>
                                </a>
                                <a href="#" class="flex items-start rounded-lg p-3 -m-3 hover:bg-gray-50">
                                    <i data-lucide="shield" class="h-6 w-6 text-ami-orange"></i>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">Canopies</p>
                                        <p class="mt-1 text-sm text-gray-500">Weather and sound-proof enclosures.</p>
                                    </div>
                                </a>
                                <a href="#" class="flex items-start rounded-lg p-3 -m-3 hover:bg-gray-50">
                                    <i data-lucide="layout-panel-left" class="h-6 w-6 text-ami-orange"></i>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">Low Voltage Panels</p>
                                        <p class="mt-1 text-sm text-gray-500">Custom control and distribution panels.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <a href="#services" class="text-slate-600 hover:text-ami-blue transition-colors">Services</a>
                    <a href="#manufacturing" class="text-slate-600 hover:text-ami-blue transition-colors">Capabilities</a>
                    <a href="#partners" class="text-slate-600 hover:text-ami-blue transition-colors">Partners</a>
                    <a href="#contact" class="text-slate-600 hover:text-ami-blue transition-colors">Contact</a>
                </div>

                <!-- CTA Button (Desktop) -->
                <div class="hidden lg:block">
                    <a href="#contact" class="bg-ami-orange text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-ami-orange-dark transition-all duration-300 transform hover:scale-105">
                        Get a Quote
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="lg:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen">
                        <i data-lucide="menu" class="w-6 h-6 text-ami-blue"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false" class="lg:hidden mt-4" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" style="display: none;">
                <a href="#about" class="block py-2 px-4 text-sm hover:bg-gray-100 rounded">About</a>
                <a href="#products" class="block py-2 px-4 text-sm hover:bg-gray-100 rounded">Products</a>
                <a href="#services" class="block py-2 px-4 text-sm hover:bg-gray-100 rounded">Services</a>
                <a href="#manufacturing" class="block py-2 px-4 text-sm hover:bg-gray-100 rounded">Capabilities</a>
                <a href="#partners" class="block py-2 px-4 text-sm hover:bg-gray-100 rounded">Partners</a>
                <a href="#contact" class="block py-2 px-4 text-sm hover:bg-gray-100 rounded">Contact</a>
                <div class="mt-4">
                    <a href="#contact" class="w-full text-center bg-ami-orange text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-ami-orange-dark transition-all">
                        Get a Quote
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <!-- 1. Hero Section -->
        <section class="relative h-[90vh] min-h-[600px] flex items-center bg-cover bg-center" style="background-image: url('https://images.pexels.com/photos/2760241/pexels-photo-2760241.jpeg')">
            <div class="absolute inset-0 bg-ami-blue/80 backdrop-blur-sm"></div>
            <div class="container mx-auto px-6 relative z-10 text-white">
                <div class="max-w-3xl">
                    <span class="text-ami-orange font-semibold">AL MOHANDES INTERNATIONAL</span>
                    <h1 class="text-4xl md:text-6xl font-extrabold my-4 leading-tight">Powering Reliability Since 1983<span class="text-ami-orange">.</span></h1>
                    <p class="text-lg md:text-xl text-slate-200 mb-8">
                        Delivering custom-engineered diesel generator solutions that guarantee uptime and performance across the globe.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#products" class="bg-ami-orange text-white px-8 py-3 rounded-lg font-semibold text-lg hover:bg-ami-orange-dark transition-all duration-300 transform hover:scale-105">
                            Explore Products
                        </a>
                        <a href="#contact" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold text-lg hover:bg-white hover:text-ami-blue transition-all duration-300">
                            Get a Quote
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. About AMI -->
        <section id="about" class="py-20 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div class="fade-in-section">
                        <span class="text-ami-orange font-semibold">OUR LEGACY</span>
                        <h2 class="text-3xl md:text-4xl font-bold text-ami-blue mt-2">Four Decades of Engineering Excellence</h2>
                        <p class="mt-6 text-lg text-slate-600">
                            Since our founding in 1983, Al Mohandes International has grown from a local specialist into a global leader in power generation. Our journey is built on a commitment to innovation, precision engineering, and unwavering customer support.
                        </p>
                        <p class="mt-4 text-lg text-slate-600">
                            We specialize in creating bespoke power solutions, managing complex turnkey projects from design to commissioning, and providing world-class after-sales service that ensures the longevity and reliability of every unit we build.
                        </p>
                    </div>
                    <div class="fade-in-section">
                        <!-- Timeline -->
                        <div class="relative pl-8 border-l-2 border-ami-blue/20">
                            <div class="mb-10">
                                <div class="absolute w-6 h-6 bg-ami-blue rounded-full -left-3 border-4 border-gray-50"></div>
                                <p class="text-lg font-semibold text-ami-blue">1983 - Foundation</p>
                                <p class="text-slate-500">AMI is established with a vision to provide reliable power solutions.</p>
                            </div>
                            <div class="mb-10">
                                <div class="absolute w-6 h-6 bg-ami-blue rounded-full -left-3 border-4 border-gray-50"></div>
                                <p class="text-lg font-semibold text-ami-blue">1995 - Manufacturing Expansion</p>
                                <p class="text-slate-500">In-house production of canopies and control panels begins.</p>
                            </div>
                            <div class="mb-10">
                                <div class="absolute w-6 h-6 bg-ami-blue rounded-full -left-3 border-4 border-gray-50"></div>
                                <p class="text-lg font-semibold text-ami-blue">2010 - Global Reach</p>
                                <p class="text-slate-500">Expanded operations to serve clients across continents.</p>
                            </div>
                            <div>
                                <div class="absolute w-6 h-6 bg-ami-blue rounded-full -left-3 border-4 border-gray-50"></div>
                                <p class="text-lg font-semibold text-ami-blue">Today - Industry Leader</p>
                                <p class="text-slate-500">Recognized for custom solutions and turnkey project expertise.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. Products -->
        <section id="products" class="py-20">
            <div class="container mx-auto px-6">
                <div class="text-center max-w-3xl mx-auto mb-12">
                    <span class="text-ami-orange font-semibold">OUR PRODUCTS</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-ami-blue mt-2">Engineered for Performance</h2>
                    <p class="mt-4 text-lg text-slate-600">
                        We offer a comprehensive range of products, all designed and manufactured to the highest standards of quality and reliability.
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Product Card -->
                    <div class="group fade-in-section bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-2 transition-all duration-300">
                        <img src="https://cdn.pixabay.com/photo/2022/08/19/06/27/honda-xl600r-7396188_1280.jpg" alt="Generator Sets" class="w-full h-56 object-cover group-hover:opacity-90 transition-opacity">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-ami-blue">Generator Sets</h3>
                            <p class="mt-2 text-slate-600">Durable and efficient generators for prime, standby, and continuous power.</p>
                        </div>
                    </div>
                    <!-- Product Card -->
                    <div class="group fade-in-section bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-2 transition-all duration-300">
                        <img src="https://cdn.pixabay.com/photo/2015/10/28/12/31/motor-1010495_1280.jpg" alt="Accessories" class="w-full h-56 object-cover group-hover:opacity-90 transition-opacity">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-ami-blue">Accessories</h3>
                            <p class="mt-2 text-slate-600">Filters, batteries, and control modules to optimize your setup.</p>
                        </div>
                    </div>
                    <!-- Product Card -->
                    <div class="group fade-in-section bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-2 transition-all duration-300">
                        <img src="https://cdn.pixabay.com/photo/2019/12/22/07/45/trailer-4711979_1280.jpg" alt="Trailers" class="w-full h-56 object-cover group-hover:opacity-90 transition-opacity">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-ami-blue">Trailers</h3>
                            <p class="mt-2 text-slate-600">Robust, road-worthy trailers for fully mobile power generation.</p>
                        </div>
                    </div>
                    <!-- Product Card -->
                    <div class="group fade-in-section bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-2 transition-all duration-300">
                        <img src="https://cdn.pixabay.com/photo/2014/12/15/14/04/cylinders-569151_1280.jpg" alt="Canopies" class="w-full h-56 object-cover group-hover:opacity-90 transition-opacity">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-ami-blue">Canopies</h3>
                            <p class="mt-2 text-slate-600">Acoustic and weatherproof enclosures for ultimate protection.</p>
                        </div>
                    </div>
                    <!-- Product Card -->
                    <div class="group fade-in-section bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-2 transition-all duration-300">
                        <img src="https://cdn.pixabay.com/photo/2016/09/02/18/38/factory-1639990_1280.jpg" alt="Low Voltage Panels" class="w-full h-56 object-cover group-hover:opacity-90 transition-opacity">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-ami-blue">Low Voltage Panels</h3>
                            <p class="mt-2 text-slate-600">Synchronization, ATS, and distribution panels built to spec.</p>
                        </div>
                    </div>
                    <!-- Product Card (Placeholder) -->
                     <div class="group fade-in-section bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-2 transition-all duration-300">
                        <img src="https://images.pexels.com/photos/17816971/pexels-photo-17816971.jpeg" alt="Storage Tanks" class="w-full h-56 object-cover group-hover:opacity-90 transition-opacity">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-ami-blue">Fuel Storage Tanks</h3>
                            <p class="mt-2 text-slate-600">Secure, certified fuel tanks for extended run times and reliability.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. Services -->
        <section id="services" class="py-20 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="text-center max-w-3xl mx-auto mb-12">
                    <span class="text-ami-orange font-semibold">OUR SERVICES</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-ami-blue mt-2">Comprehensive Power Support</h2>
                    <p class="mt-4 text-lg text-slate-600">
                        Beyond manufacturing, we provide a full suite of services to ensure your power systems operate at peak performance.
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                    <!-- Service Item -->
                    <div class="fade-in-section p-8 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="bg-ami-orange/10 inline-flex p-4 rounded-full">
                           <i data-lucide="cpu" class="h-8 w-8 text-ami-orange"></i>
                        </div>
                        <h3 class="text-xl font-bold mt-4 text-ami-blue">Custom Solutions</h3>
                        <p class="mt-2 text-slate-600">Tailored engineering to meet unique project requirements and specifications.</p>
                    </div>
                    <!-- Service Item -->
                    <div class="fade-in-section p-8 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                         <div class="bg-ami-orange/10 inline-flex p-4 rounded-full">
                           <i data-lucide="shield-check" class="h-8 w-8 text-ami-orange"></i>
                        </div>
                        <h3 class="text-xl font-bold mt-4 text-ami-blue">Maintenance</h3>
                        <p class="mt-2 text-slate-600">Proactive and corrective maintenance plans to maximize uptime.</p>
                    </div>
                    <!-- Service Item -->
                    <div class="fade-in-section p-8 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                         <div class="bg-ami-orange/10 inline-flex p-4 rounded-full">
                           <i data-lucide="replace" class="h-8 w-8 text-ami-orange"></i>
                        </div>
                        <h3 class="text-xl font-bold mt-4 text-ami-blue">Spare Parts</h3>
                        <p class="mt-2 text-slate-600">Genuine spare parts supply for all major engine and alternator brands.</p>
                    </div>
                    <!-- Service Item -->
                    <div class="fade-in-section p-8 bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                         <div class="bg-ami-orange/10 inline-flex p-4 rounded-full">
                           <i data-lucide="life-buoy" class="h-8 w-8 text-ami-orange"></i>
                        </div>
                        <h3 class="text-xl font-bold mt-4 text-ami-blue">Technical Support</h3>
                        <p class="mt-2 text-slate-600">24/7 expert support from our dedicated team of engineers.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. Manufacturing Capabilities -->
        <section id="manufacturing" class="py-20">
            <div class="container mx-auto px-6">
                 <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div class="fade-in-section">
                        <span class="text-ami-orange font-semibold">IN-HOUSE PRODUCTION</span>
                        <h2 class="text-3xl md:text-4xl font-bold text-ami-blue mt-2">Control Over Quality</h2>
                        <p class="mt-6 text-lg text-slate-600">
                            Our state-of-the-art manufacturing facilities give us complete control over the production process. This vertical integration allows us to ensure every component, from storage tanks and canopies to control systems and LV panels, meets our exacting standards for quality and durability.
                        </p>
                        <ul class="mt-6 space-y-4">
                            <li class="flex items-center">
                                <i data-lucide="check-circle-2" class="w-6 h-6 text-green-500 mr-3"></i>
                                <span class="text-slate-700">Precision metal fabrication and welding</span>
                            </li>
                            <li class="flex items-center">
                                <i data-lucide="check-circle-2" class="w-6 h-6 text-green-500 mr-3"></i>
                                <span class="text-slate-700">Advanced powder coating and finishing</span>
                            </li>
                             <li class="flex items-center">
                                <i data-lucide="check-circle-2" class="w-6 h-6 text-green-500 mr-3"></i>
                                <span class="text-slate-700">Custom electrical assembly and testing</span>
                            </li>
                        </ul>
                    </div>
                    <div class="fade-in-section grid grid-cols-2 gap-4">
                        <img src="https://cdn.pixabay.com/photo/2014/09/13/21/46/milling-444493_1280.jpg" class="rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300" alt="Welding workshop">
                        <img src="https://cdn.pixabay.com/photo/2015/10/03/18/46/industry-970146_1280.jpg" class="rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 mt-8" alt="Engineer working on a control panel">
                        <img src="https://cdn.pixabay.com/photo/2012/07/06/20/23/excavator-51665_1280.jpg" class="rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300" alt="Machinery in factory">
                        <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?q=80&w=2069&auto=format&fit=crop" class="rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 mt-8" alt="Team of engineers collaborating">
                    </div>
                 </div>
            </div>
        </section>

        <!-- 6. Partnerships -->
        <section id="partners" class="py-20 bg-gray-50">
            <div class="container mx-auto px-6">
                <h2 class="text-center text-2xl font-bold text-slate-600 mb-8">Trusted by Global Leaders</h2>
                <div class="flex flex-wrap justify-center items-center gap-x-12 gap-y-8">
                    <!-- Partner logos. Using placeholders -->
                    <img src="https://placehold.co/150x60/f0f0f0/a0a0a0?text=Partner+1" alt="Partner 1 Logo" class="h-10 opacity-60 hover:opacity-100 transition-opacity duration-300">
                    <img src="https://placehold.co/150x60/f0f0f0/a0a0a0?text=Partner+2" alt="Partner 2 Logo" class="h-10 opacity-60 hover:opacity-100 transition-opacity duration-300">
                    <img src="https://placehold.co/150x60/f0f0f0/a0a0a0?text=Partner+3" alt="Partner 3 Logo" class="h-10 opacity-60 hover:opacity-100 transition-opacity duration-300">
                    <img src="https://placehold.co/150x60/f0f0f0/a0a0a0?text=Partner+4" alt="Partner 4 Logo" class="h-10 opacity-60 hover:opacity-100 transition-opacity duration-300">
                    <img src="https://placehold.co/150x60/f0f0f0/a0a0a0?text=Partner+5" alt="Partner 5 Logo" class="h-10 opacity-60 hover:opacity-100 transition-opacity duration-300">
                    <img src="https://placehold.co/150x60/f0f0f0/a0a0a0?text=Partner+6" alt="Partner 6 Logo" class="h-10 opacity-60 hover:opacity-100 transition-opacity duration-300">
                </div>
            </div>
        </section>

        <!-- 7. Case Studies / Environments -->
        <section id="casestudies" class="py-20">
             <div class="container mx-auto px-6">
                <div class="text-center max-w-3xl mx-auto mb-12">
                    <span class="text-ami-orange font-semibold">PROVEN PERFORMANCE</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-ami-blue mt-2">Adaptable to Any Environment</h2>
                    <p class="mt-4 text-lg text-slate-600">
                        Our generators are field-tested and proven to perform reliably in the world's most demanding conditions.
                    </p>
                </div>
                <div class="grid md:grid-cols-3 gap-4">
                    <a href="#" class="group relative block h-96 rounded-lg overflow-hidden fade-in-section">
                        <img src="https://images.pexels.com/photos/1267337/pexels-photo-1267337.jpeg" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"/>
                        <div class="absolute inset-0 bg-black/50"></div>
                        <div class="absolute bottom-0 left-0 p-8 text-white">
                            <h3 class="text-2xl font-bold">Rugged Terrains</h3>
                            <p class="mt-2 opacity-90">Powering construction and mining sites in remote locations.</p>
                        </div>
                    </a>
                    <a href="#" class="group relative block h-96 rounded-lg overflow-hidden fade-in-section">
                        <img src="https://images.pexels.com/photos/9889065/pexels-photo-9889065.jpeg" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"/>
                        <div class="absolute inset-0 bg-black/50"></div>
                        <div class="absolute bottom-0 left-0 p-8 text-white">
                            <h3 class="text-2xl font-bold">Urban Setups</h3>
                            <p class="mt-2 opacity-90">Providing critical backup for data centers and hospitals.</p>
                        </div>
                    </a>
                    <a href="#" class="group relative block h-96 rounded-lg overflow-hidden fade-in-section">
                        <img src="https://cdn.pixabay.com/photo/2022/11/23/09/20/cargo-7611538_1280.jpg" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"/>
                        <div class="absolute inset-0 bg-black/50"></div>
                        <div class="absolute bottom-0 left-0 p-8 text-white">
                            <h3 class="text-2xl font-bold">Marine Environments</h3>
                            <p class="mt-2 opacity-90">Ensuring reliable power for ports and offshore platforms.</p>
                        </div>
                    </a>
                </div>
             </div>
        </section>

        <!-- 8. Contact & Inquiry -->
        <section id="contact" class="py-20 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="bg-white rounded-lg shadow-xl overflow-hidden lg:grid lg:grid-cols-2">
                    <!-- Contact Form -->
                    <div class="p-8 sm:p-12">
                         <span class="text-ami-orange font-semibold">GET IN TOUCH</span>
                         <h2 class="text-3xl font-bold text-ami-blue mt-2">Start Your Project Today</h2>
                         <form action="#" method="POST" class="mt-8 space-y-6">
                            <div>
                                <label for="name" class="sr-only">Name</label>
                                <input type="text" name="name" id="name" autocomplete="name" required class="block w-full rounded-md border-gray-300 py-3 px-4 shadow-sm focus:border-ami-blue focus:ring-ami-blue" placeholder="Full Name">
                            </div>
                            <div>
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" autocomplete="email" required class="block w-full rounded-md border-gray-300 py-3 px-4 shadow-sm focus:border-ami-blue focus:ring-ami-blue" placeholder="Email Address">
                            </div>
                            <div>
                                <label for="phone" class="sr-only">Phone</label>
                                <input type="tel" name="phone" id="phone" autocomplete="tel" class="block w-full rounded-md border-gray-300 py-3 px-4 shadow-sm focus:border-ami-blue focus:ring-ami-blue" placeholder="Phone Number">
                            </div>
                             <div>
                                <label for="details" class="sr-only">Project Details</label>
                                <textarea name="details" id="details" rows="4" required class="block w-full rounded-md border-gray-300 py-3 px-4 shadow-sm focus:border-ami-blue focus:ring-ami-blue" placeholder="Tell us about your project..."></textarea>
                            </div>
                            <div>
                                <button type="submit" class="w-full justify-center rounded-md border border-transparent bg-ami-orange py-3 px-6 text-base font-medium text-white shadow-sm hover:bg-ami-orange-dark focus:outline-none focus:ring-2 focus:ring-ami-orange focus:ring-offset-2">
                                    Send Inquiry
                                </button>
                            </div>
                         </form>
                    </div>
                    <!-- Contact Info & Map -->
                    <div class="relative bg-ami-blue text-white p-8 sm:p-12">
                        <h3 class="text-2xl font-bold">Contact Information</h3>
                        <p class="mt-4 text-slate-200">We're here to help. Reach out to us for sales inquiries, technical support, or general questions.</p>
                        <div class="mt-8 space-y-4">
                            <p class="flex items-center">
                                <i data-lucide="map-pin" class="h-5 w-5 mr-3 text-ami-orange"></i>
                                <span>123 Industrial Zone, Cairo, Egypt</span>
                            </p>
                             <p class="flex items-center">
                                <i data-lucide="phone" class="h-5 w-5 mr-3 text-ami-orange"></i>
                                <span>+20 2 1234 5678</span>
                            </p>
                             <p class="flex items-center">
                                <i data-lucide="mail" class="h-5 w-5 mr-3 text-ami-orange"></i>
                                <span>sales@ami-generators.com</span>
                            </p>
                        </div>
                        <div class="mt-8">
                            <div class="aspect-w-16 aspect-h-9">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d221162.39217684618!2d31.11726719846062!3d30.01633534570058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458403975574979%3A0x19a0a4303487f55!2sCairo%2C%20Cairo%20Governorate%2C%20Egypt!5e0!3m2!1sen!2sus!4v1663784587314!5m2!1sen!2sus" class="w-full h-full rounded-lg" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="bg-ami-blue-dark text-white">
        <div class="container mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-2xl font-bold">AMI<span class="text-ami-orange">.</span></h3>
                    <p class="mt-2 text-slate-300">Powering Reliability Since 1983.</p>
                </div>
                <div>
                    <h4 class="font-semibold tracking-wider uppercase">Quick Links</h4>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#about" class="text-slate-300 hover:text-white">About Us</a></li>
                        <li><a href="#products" class="text-slate-300 hover:text-white">Products</a></li>
                        <li><a href="#services" class="text-slate-300 hover:text-white">Services</a></li>
                        <li><a href="#contact" class="text-slate-300 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                 <div>
                    <h4 class="font-semibold tracking-wider uppercase">Legal</h4>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-slate-300 hover:text-white">Privacy Policy</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white">Terms of Service</a></li>
                    </ul>
                </div>
                 <div>
                    <h4 class="font-semibold tracking-wider uppercase">Connect</h4>
                    <div class="flex mt-4 space-x-4">
                        <a href="#" class="text-slate-300 hover:text-white"><i data-lucide="facebook" class="w-6 h-6"></i></a>
                        <a href="#" class="text-slate-300 hover:text-white"><i data-lucide="twitter" class="w-6 h-6"></i></a>
                        <a href="#" class="text-slate-300 hover:text-white"><i data-lucide="linkedin" class="w-6 h-6"></i></a>
                    </div>
                </div>
            </div>
            <div class="mt-12 border-t border-blue-900/50 pt-8 text-center text-slate-400">
                &copy; <span id="year"></span> Al Mohandes International. All Rights Reserved.
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Initialize Lucide Icons
        lucide.createIcons();

        // Set current year in footer
        document.getElementById('year').textContent = new Date().getFullYear();

        // Intersection Observer for fade-in animations
        const sections = document.querySelectorAll('.fade-in-section');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        sections.forEach(section => {
            observer.observe(section);
        });
    </script>
</body>
</html>
