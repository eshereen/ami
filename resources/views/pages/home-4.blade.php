<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al Mohandes International | Powering Reliability Since 1983</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }
        .hero-gradient {
            background: linear-gradient(120deg, #1e3a8a 0%, #1e40af 100%);
        }
        .timeline-item:nth-child(odd) .timeline-content {
            margin-left: auto;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .partner-logo {
            filter: grayscale(100%);
            opacity: 0.7;
            transition: all 0.3s ease;
        }
        .partner-logo:hover {
            filter: grayscale(0%);
            opacity: 1;
        }
    </style>
</head>
<body class="bg-white text-gray-800">
    <!-- Navigation -->
    <nav x-data="{ open: false, megaMenuOpen: false }" class="fixed w-full bg-white shadow-md z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="#" class="flex-shrink-0 flex items-center">
                        <div class="h-12 w-12 bg-blue-800 rounded-full flex items-center justify-center text-white font-bold text-xl">AMI</div>
                        <span class="ml-3 text-xl font-semibold">Al Mohandes <span class="text-orange-500">International</span></span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-blue-800 font-medium">Home</a>
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="text-gray-600 hover:text-blue-800 font-medium flex items-center">
                            Products <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute z-50 left-0 w-96 mt-2 bg-white shadow-xl rounded-lg p-5 grid grid-cols-2 gap-4">
                            <a href="#" class="p-2 hover:bg-blue-50 rounded flex items-center"><div class="h-8 w-8 bg-blue-100 rounded-full flex items-center justify-center mr-2"><i class="fas fa-bolt text-blue-600"></i></div> Generator Sets</a>
                            <a href="#" class="p-2 hover:bg-blue-50 rounded flex items-center"><div class="h-8 w-8 bg-blue-100 rounded-full flex items-center justify-center mr-2"><i class="fas fa-cog text-blue-600"></i></div> Accessories</a>
                            <a href="#" class="p-2 hover:bg-blue-50 rounded flex items-center"><div class="h-8 w-8 bg-blue-100 rounded-full flex items-center justify-center mr-2"><i class="fas fa-trailer text-blue-600"></i></div> Trailers</a>
                            <a href="#" class="p-2 hover:bg-blue-50 rounded flex items-center"><div class="h-8 w-8 bg-blue-100 rounded-full flex items-center justify-center mr-2"><i class="fas fa-box text-blue-600"></i></div> Canopies</a>
                            <a href="#" class="p-2 hover:bg-blue-50 rounded flex items-center"><div class="h-8 w-8 bg-blue-100 rounded-full flex items-center justify-center mr-2"><i class="fas fa-tachometer-alt text-blue-600"></i></div> LV Panels</a>
                        </div>
                    </div>
                    <a href="#services" class="text-gray-600 hover:text-blue-800 font-medium">Services</a>
                    <a href="#manufacturing" class="text-gray-600 hover:text-blue-800 font-medium">Manufacturing</a>
                    <a href="#case-studies" class="text-gray-600 hover:text-blue-800 font-medium">Case Studies</a>
                    <a href="#contact" class="bg-blue-800 text-white px-4 py-2 rounded-md font-medium hover:bg-blue-700 transition">Contact Us</a>
                </div>
                <div class="md:hidden flex items-center">
                    <button @click="open = !open" class="text-gray-600">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile menu -->
        <div x-show="open" class="md:hidden bg-white shadow-lg">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-blue-800 bg-blue-50">Home</a>
                <a href="#products" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-blue-800 hover:bg-blue-50">Products</a>
                <a href="#services" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-blue-800 hover:bg-blue-50">Services</a>
                <a href="#manufacturing" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-blue-800 hover:bg-blue-50">Manufacturing</a>
                <a href="#case-studies" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-blue-800 hover:bg-blue-50">Case Studies</a>
                <a href="#contact" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-blue-800 hover:bg-blue-50">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-20 hero-gradient">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-20 md:pt-40 md:pb-28 grid md:grid-cols-2 gap-8 items-center">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight">Powering Reliability <span class="text-orange-400">Since 1983</span></h1>
                <p class="mt-6 text-xl text-blue-100 max-w-lg">Global leader in diesel generator manufacturing with 40+ years of engineering excellence and innovative power solutions.</p>
                <div class="mt-10 flex flex-wrap gap-4">
                    <a href="#products" class="bg-orange-500 hover:bg-orange-600 text-white font-medium py-3 px-6 rounded-md transition">Explore Products</a>
                    <a href="#contact" class="bg-white hover:bg-blue-50 text-blue-800 font-medium py-3 px-6 rounded-md transition">Get a Quote</a>
                </div>
            </div>
            <div class="relative">
                <div class="bg-white p-1 rounded-2xl shadow-2xl transform rotate-2">
                    <img src="https://images.unsplash.com/photo-1626721105368-a5cdf11f6f73?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1000&q=80" alt="AMI Generator" class="rounded-2xl">
                </div>
                <div class="absolute -bottom-5 -left-5 bg-blue-800 text-white p-4 rounded-lg shadow-lg">
                    <div class="text-3xl font-bold">40+</div>
                    <div class="text-sm">Years Experience</div>
                </div>
                <div class="absolute -top-5 -right-5 bg-orange-500 text-white p-4 rounded-lg shadow-lg">
                    <div class="text-3xl font-bold">85+</div>
                    <div class="text-sm">Countries Served</div>
                </div>
            </div>
        </div>
    </section>

    <!-- About AMI Section -->
    <section class="py-16 bg-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-blue-800">Engineering Excellence Since 1983</h2>
                <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">For over four decades, AMI has been at the forefront of power generation technology, delivering reliable solutions across the globe.</p>
            </div>

            <!-- Timeline -->
            <div class="mt-20 relative">
                <!-- Middle line -->
                <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-blue-200"></div>

                <!-- Timeline items -->
                <div class="space-y-12">
                    <div class="timeline-item relative">
                        <div class="timeline-content w-5/12 bg-white p-6 rounded-lg shadow-md">
                            <div class="text-blue-800 font-bold text-lg">1983</div>
                            <h3 class="text-xl font-semibold mt-2">Foundation</h3>
                            <p class="mt-2 text-gray-600">Al Mohandes International was established with a vision to provide reliable power solutions.</p>
                        </div>
                        <div class="absolute top-1/2 transform -translate-y-1/2 left-1/2 -ml-4 w-8 h-8 bg-blue-800 rounded-full border-4 border-white shadow"></div>
                    </div>

                    <div class="timeline-item relative">
                        <div class="timeline-content w-5/12 ml-auto bg-white p-6 rounded-lg shadow-md">
                            <div class="text-blue-800 font-bold text-lg">1995</div>
                            <h3 class="text-xl font-semibold mt-2">Global Expansion</h3>
                            <p class="mt-2 text-gray-600">Began exporting to international markets, establishing a presence in 20+ countries.</p>
                        </div>
                        <div class="absolute top-1/2 transform -translate-y-1/2 left-1/2 -ml-4 w-8 h-8 bg-blue-800 rounded-full border-4 border-white shadow"></div>
                    </div>

                    <div class="timeline-item relative">
                        <div class="timeline-content w-5/12 bg-white p-6 rounded-lg shadow-md">
                            <div class="text-blue-800 font-bold text-lg">2008</div>
                            <h3 class="text-xl font-semibold mt-2">Innovation Center</h3>
                            <p class="mt-2 text-gray-600">Opened state-of-the-art R&D facility to develop next-generation power solutions.</p>
                        </div>
                        <div class="absolute top-1/2 transform -translate-y-1/2 left-1/2 -ml-4 w-8 h-8 bg-blue-800 rounded-full border-4 border-white shadow"></div>
                    </div>

                    <div class="timeline-item relative">
                        <div class="timeline-content w-5/12 ml-auto bg-white p-6 rounded-lg shadow-md">
                            <div class="text-blue-800 font-bold text-lg">2020</div>
                            <h3 class="text-xl font-semibold mt-2">Sustainable Solutions</h3>
                            <p class="mt-2 text-gray-600">Launched eco-friendly generator series with reduced emissions and improved efficiency.</p>
                        </div>
                        <div class="absolute top-1/2 transform -translate-y-1/2 left-1/2 -ml-4 w-8 h-8 bg-blue-800 rounded-full border-4 border-white shadow"></div>
                    </div>

                    <div class="timeline-item relative">
                        <div class="timeline-content w-5/12 bg-white p-6 rounded-lg shadow-md">
                            <div class="text-blue-800 font-bold text-lg">Present</div>
                            <h3 class="text-xl font-semibold mt-2">Global Leader</h3>
                            <p class="mt-2 text-gray-600">Serving clients in 85+ countries with comprehensive power solutions and support.</p>
                        </div>
                        <div class="absolute top-1/2 transform -translate-y-1/2 left-1/2 -ml-4 w-8 h-8 bg-blue-800 rounded-full border-4 border-white shadow"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-blue-800">Our Products</h2>
                <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">Comprehensive range of power solutions engineered for reliability and performance.</p>
            </div>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Product Card 1 -->
                <div class="product-card bg-white rounded-xl shadow-md overflow-hidden transition duration-300">
                    <div class="h-48 bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-bolt text-blue-600 text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-blue-800">Generator Sets</h3>
                        <p class="mt-2 text-gray-600">From 10 kVA to 3000 kVA, our generators are built for maximum reliability and efficiency.</p>
                        <a href="#" class="mt-4 inline-flex items-center text-orange-500 font-medium">Explore <i class="fas fa-arrow-right ml-2 text-xs"></i></a>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="product-card bg-white rounded-xl shadow-md overflow-hidden transition duration-300">
                    <div class="h-48 bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-cog text-blue-600 text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-blue-800">Accessories</h3>
                        <p class="mt-2 text-gray-600">Comprehensive range of accessories to enhance functionality and performance.</p>
                        <a href="#" class="mt-4 inline-flex items-center text-orange-500 font-medium">Explore <i class="fas fa-arrow-right ml-2 text-xs"></i></a>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="product-card bg-white rounded-xl shadow-md overflow-hidden transition duration-300">
                    <div class="h-48 bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-trailer text-blue-600 text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-blue-800">Trailers</h3>
                        <p class="mt-2 text-gray-600">Mobile power solutions with rugged trailers designed for easy transportation.</p>
                        <a href="#" class="mt-4 inline-flex items-center text-orange-500 font-medium">Explore <i class="fas fa-arrow-right ml-2 text-xs"></i></a>
                    </div>
                </div>

                <!-- Product Card 4 -->
                <div class="product-card bg-white rounded-xl shadow-md overflow-hidden transition duration-300">
                    <div class="h-48 bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-box text-blue-600 text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-blue-800">Canopies</h3>
                        <p class="mt-2 text-gray-600">Acoustic canopies for noise reduction and weather protection.</p>
                        <a href="#" class="mt-4 inline-flex items-center text-orange-500 font-medium">Explore <i class="fas fa-arrow-right ml-2 text-xs"></i></a>
                    </div>
                </div>

                <!-- Product Card 5 -->
                <div class="product-card bg-white rounded-xl shadow-md overflow-hidden transition duration-300">
                    <div class="h-48 bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-tachometer-alt text-blue-600 text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-blue-800">LV Panels</h3>
                        <p class="mt-2 text-gray-600">Low voltage control panels with advanced monitoring and control systems.</p>
                        <a href="#" class="mt-4 inline-flex items-center text-orange-500 font-medium">Explore <i class="fas fa-arrow-right ml-2 text-xs"></i></a>
                    </div>
                </div>

                <!-- Product Card 6 -->
                <div class="product-card bg-white rounded-xl shadow-md overflow-hidden transition duration-300">
                    <div class="h-48 bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-tools text-blue-600 text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-blue-800">Custom Solutions</h3>
                        <p class="mt-2 text-gray-600">Tailor-made power solutions designed to meet specific client requirements.</p>
                        <a href="#" class="mt-4 inline-flex items-center text-orange-500 font-medium">Explore <i class="fas fa-arrow-right ml-2 text-xs"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-16 bg-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-blue-800">Our Services</h2>
                <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">Comprehensive support throughout the entire lifecycle of your power system.</p>
            </div>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Service 1 -->
                <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <div class="h-16 w-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto">
                        <i class="fas fa-cogs text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mt-4 text-blue-800">Custom Solutions</h3>
                    <p class="mt-2 text-gray-600">Tailor-made power systems designed to meet your specific requirements.</p>
                </div>

                <!-- Service 2 -->
                <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <div class="h-16 w-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto">
                        <i class="fas fa-tools text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mt-4 text-blue-800">Maintenance</h3>
                    <p class="mt-2 text-gray-600">Proactive maintenance programs to ensure optimal performance and longevity.</p>
                </div>

                <!-- Service 3 -->
                <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <div class="h-16 w-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto">
                        <i class="fas fa-box-open text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mt-4 text-blue-800">Spare Parts</h3>
                    <p class="mt-2 text-gray-600">Genuine parts available worldwide with fast shipping and logistics.</p>
                </div>

                <!-- Service 4 -->
                <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <div class="h-16 w-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto">
                        <i class="fas fa-headset text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mt-4 text-blue-800">Technical Support</h3>
                    <p class="mt-2 text-gray-600">24/7 expert support to address any issues and minimize downtime.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Manufacturing Section -->
    <section id="manufacturing" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-blue-800">Manufacturing Excellence</h2>
                <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">State-of-the-art facilities with complete in-house production capabilities.</p>
            </div>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-2xl font-semibold text-blue-800">Complete Vertical Integration</h3>
                    <p class="mt-4 text-gray-600">Our manufacturing facilities feature advanced technology and processes to ensure the highest quality standards across all product lines.</p>

                    <div class="mt-6 space-y-4">
                        <div class="flex items-start">
                            <div class="h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-industry text-blue-600"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-blue-800">Storage Tanks Production</h4>
                                <p class="mt-1 text-gray-600">In-house fabrication of fuel and storage tanks with precision engineering.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-cube text-blue-600"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-blue-800">Canopy Manufacturing</h4>
                                <p class="mt-1 text-gray-600">Custom-designed canopies for noise reduction and environmental protection.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-sliders-h text-blue-600"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-blue-800">Control Systems</h4>
                                <p class="mt-1 text-gray-600">Advanced control panels with intelligent monitoring and automation.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-bolt text-blue-600"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold text-blue-800">LV Panel Assembly</h4>
                                <p class="mt-1 text-gray-600">Complete low voltage panel production with rigorous testing protocols.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="rounded-lg overflow-hidden shadow-md">
                        <img src="https://images.unsplash.com/photo-1590065480004-477ef6d4d5bf?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80" alt="Manufacturing Facility" class="w-full h-64 object-cover">
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-md">
                        <img src="https://images.unsplash.com/photo-1581091226033-d5c48150dbaa?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80" alt="Control Panel Production" class="w-full h-64 object-cover">
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-md">
                        <img src="https://images.unsplash.com/photo-1581092580497-e0d23cbdf1dc?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80" alt="Engineering Team" class="w-full h-64 object-cover">
                    </div>
                    <div class="rounded-lg overflow-hidden shadow-md">
                        <img src="https://images.unsplash.com/photo-1581092921461-eab62e97a780?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&q=80" alt="Quality Testing" class="w-full h-64 object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partnerships Section -->
    <section class="py-16 bg-blue-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold">Global Partnerships</h2>
                <p class="mt-4 text-xl text-blue-100 max-w-3xl mx-auto">Trusted by industry leaders and organizations worldwide.</p>
            </div>

            <div class="mt-12 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
                <div class="partner-logo h-20 flex items-center justify-center bg-white rounded-lg p-4">
                    <span class="text-2xl font-bold text-blue-800">Partner 1</span>
                </div>
                <div class="partner-logo h-20 flex items-center justify-center bg-white rounded-lg p-4">
                    <span class="text-2xl font-bold text-blue-800">Partner 2</span>
                </div>
                <div class="partner-logo h-20 flex items-center justify-center bg-white rounded-lg p-4">
                    <span class="text-2xl font-bold text-blue-800">Partner 3</span>
                </div>
                <div class="partner-logo h-20 flex items-center justify-center bg-white rounded-lg p-4">
                    <span class="text-2xl font-bold text-blue-800">Partner 4</span>
                </div>
                <div class="partner-logo h-20 flex items-center justify-center bg-white rounded-lg p-4">
                    <span class="text-2xl font-bold text-blue-800">Partner 5</span>
                </div>
                <div class="partner-logo h-20 flex items-center justify-center bg-white rounded-lg p-4">
                    <span class="text-2xl font-bold text-blue-800">Partner 6</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Case Studies Section -->
    <section id="case-studies" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-blue-800">Case Studies</h2>
                <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">Proven performance across diverse environments and applications.</p>
            </div>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Case Study 1 -->
                <div class="rounded-xl overflow-hidden shadow-lg">
                    <div class="h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1518998053901-5348d3961a04?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=700&q=80" alt="Mining Application" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <span class="text-xs font-semibold text-orange-500 uppercase">Mining</span>
                        <h3 class="text-xl font-semibold mt-2 text-blue-800">Rugged Terrains</h3>
                        <p class="mt-2 text-gray-600">Powering remote mining operations with reliable generators built for extreme conditions.</p>
                        <a href="#" class="mt-4 inline-flex items-center text-blue-600 font-medium">Read more <i class="fas fa-arrow-right ml-2 text-xs"></i></a>
                    </div>
                </div>

                <!-- Case Study 2 -->
                <div class="rounded-xl overflow-hidden shadow-lg">
                    <div class="h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1496449903675-14c6f1dcfb38?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=700&q=80" alt="Urban Application" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <span class="text-xs font-semibold text-orange-500 uppercase">Urban</span>
                        <h3 class="text-xl font-semibold mt-2 text-blue-800">Urban Setups</h3>
                        <p class="mt-2 text-gray-600">Backup power solutions for hospitals, data centers, and commercial buildings.</p>
                        <a href="#" class="mt-4 inline-flex items-center text-blue-600 font-medium">Read more <i class="fas fa-arrow-right ml-2 text-xs"></i></a>
                    </div>
                </div>

                <!-- Case Study 3 -->
                <div class="rounded-xl overflow-hidden shadow-lg">
                    <div class="h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1565373679100-32dfb809e7d7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=700&q=80" alt="Marine Application" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <span class="text-xs font-semibold text-orange-500 uppercase">Marine</span>
                        <h3 class="text-xl font-semibold mt-2 text-blue-800">Marine Environments</h3>
                        <p class="mt-2 text-gray-600">Specialized corrosion-resistant generators for marine and offshore applications.</p>
                        <a href="#" class="mt-4 inline-flex items-center text-blue-600 font-medium">Read more <i class="fas fa-arrow-right ml-2 text-xs"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 bg-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-blue-800">Get In Touch</h2>
                <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">Our team of experts is ready to assist with your power generation needs.</p>
            </div>

            <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div>
                    <form class="bg-white p-8 rounded-xl shadow-md">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                                <input type="text" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                                <input type="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <input type="tel" id="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border">
                            </div>
                            <div>
                                <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                                <input type="text" id="company" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border">
                            </div>
                            <div class="md:col-span-2">
                                <label for="project" class="block text-sm font-medium text-gray-700">Project Details</label>
                                <textarea id="project" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border"></textarea>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="w-full bg-blue-800 text-white py-3 px-4 rounded-md hover:bg-blue-700 transition font-medium">Submit Inquiry</button>
                        </div>
                    </form>
                </div>

                <div>
                    <div class="bg-white p-8 rounded-xl shadow-md h-full">
                        <h3 class="text-xl font-semibold text-blue-800">Contact Information</h3>

                        <div class="mt-6 space-y-4">
                            <div class="flex items-start">
                                <div class="h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-map-marker-alt text-blue-600"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="font-semibold text-blue-800">Headquarters</h4>
                                    <p class="mt-1 text-gray-600">123 Industrial Zone, Cairo, Egypt</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-phone text-blue-600"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="font-semibold text-blue-800">Phone</h4>
                                    <p class="mt-1 text-gray-600">+20 2 1234 5678</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-envelope text-blue-600"></i>
                                </div>
                                <div class="ml-4">
                                    <h4 class="font-semibold text-blue-800">Email</h4>
                                    <p class="mt-1 text-gray-600">info@almohandes-intl.com</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8">
                            <div class="h-64 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-map text-3xl text-blue-600"></i>
                                <span class="ml-2 font-medium text-blue-800">Interactive Map</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-semibold">Al Mohandes International</h3>
                    <p class="mt-4 text-blue-200">Powering reliability since 1983 with innovative diesel generator solutions worldwide.</p>
                    <div class="mt-6 flex space-x-4">
                        <a href="#" class="h-10 w-10 bg-blue-800 rounded-full flex items-center justify-center"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="h-10 w-10 bg-blue-800 rounded-full flex items-center justify-center"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="h-10 w-10 bg-blue-800 rounded-full flex items-center justify-center"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="h-10 w-10 bg-blue-800 rounded-full flex items-center justify-center"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div>
                    <h4 class="text-lg font-semibold">Products</h4>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-blue-200 hover:text-white">Generator Sets</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white">Accessories</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white">Trailers</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white">Canopies</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white">LV Panels</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold">Services</h4>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-blue-200 hover:text-white">Custom Solutions</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white">Maintenance</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white">Spare Parts</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white">Technical Support</a></li>
                        <li><a href="#" class="text-blue-200 hover:text-white">Training</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold">Contact</h4>
                    <ul class="mt-4 space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 text-orange-500"></i>
                            <span class="ml-2 text-blue-200">123 Industrial Zone, Cairo, Egypt</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-phone mt-1 text-orange-500"></i>
                            <span class="ml-2 text-blue-200">+20 2 1234 5678</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-envelope mt-1 text-orange-500"></i>
                            <span class="ml-2 text-blue-200">info@almohandes-intl.com</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-blue-800 text-center text-blue-300">
                <p>© 2023 Al Mohandes International. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
