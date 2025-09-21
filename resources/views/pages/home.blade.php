<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al Mohandes International - Power Solutions Excellence</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .hero-bg {
            background-image: linear-gradient(rgba(0, 51, 102, 0.7), rgba(0, 51, 102, 0.7)), url('https://images.unsplash.com/photo-1613665813446-82a78c468a1d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80');
            background-size: cover;
            background-position: center;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .tab-active {
            border-bottom: 3px solid #003366;
            color: #003366;
        }
    </style>
</head>
<body class="font-sans text-gray-800" x-data="{ mobileMenuOpen: false, activeTab: 'generators' }">
    <!-- Header -->
    <header class="bg-white shadow-md fixed w-full z-50">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <div class="bg-blue-800 text-white font-bold text-xl py-2 px-4 rounded">
                        AMI
                    </div>
                    <span class="ml-2 text-xl font-semibold text-blue-900">Al Mohandes International</span>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#home" class="text-blue-900 hover:text-blue-700 font-medium">Home</a>
                    <a href="#about" class="text-blue-900 hover:text-blue-700 font-medium">About Us</a>
                    <a href="#products" class="text-blue-900 hover:text-blue-700 font-medium">Products</a>
                    <a href="#services" class="text-blue-900 hover:text-blue-700 font-medium">Services</a>
                    <a href="#manufacturing" class="text-blue-900 hover:text-blue-700 font-medium">Manufacturing</a>
                    <a href="#partners" class="text-blue-900 hover:text-blue-700 font-medium">Partners</a>
                    <a href="#contact" class="text-blue-900 hover:text-blue-700 font-medium">Contact</a>
                </nav>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-blue-900 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div x-show="mobileMenuOpen" x-transition class="md:hidden mt-4 pb-4">
                <a href="#home" class="block py-2 text-blue-900 hover:text-blue-700 font-medium">Home</a>
                <a href="#about" class="block py-2 text-blue-900 hover:text-blue-700 font-medium">About Us</a>
                <a href="#products" class="block py-2 text-blue-900 hover:text-blue-700 font-medium">Products</a>
                <a href="#services" class="block py-2 text-blue-900 hover:text-blue-700 font-medium">Services</a>
                <a href="#manufacturing" class="block py-2 text-blue-900 hover:text-blue-700 font-medium">Manufacturing</a>
                <a href="#partners" class="block py-2 text-blue-900 hover:text-blue-700 font-medium">Partners</a>
                <a href="#contact" class="block py-2 text-blue-900 hover:text-blue-700 font-medium">Contact</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero-bg text-white pt-24 pb-20">
        <div class="container mx-auto px-4 py-16">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Powering the World Since 1983</h1>
                <p class="text-xl mb-8">Al Mohandes International delivers reliable, innovative power solutions for the most challenging environments across the globe.</p>
                <div class="flex flex-wrap gap-4">
                    <a href="#products" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">Explore Products</a>
                    <a href="#contact" class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-900 text-white font-bold py-3 px-6 rounded-lg transition duration-300">Contact Us</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <img src="https://cdn.pixabay.com/photo/2016/04/24/19/28/spain-1350439_1280.jpg" alt="AMI Manufacturing Facility" class="rounded-lg shadow-lg">
                </div>
                <div class="md:w-1/2 md:pl-12">
                    <h2 class="text-3xl font-bold text-blue-900 mb-6">About Al Mohandes International</h2>
                    <p class="mb-4">Founded in 1983, Al Mohandes International (AMI) has grown into a globally recognized leader in diesel generator manufacturing and power solutions.</p>
                    <p class="mb-4">Our innovative, problem-solving culture drives us to develop customized power solutions for the most challenging environments, from rugged terrains to marine applications.</p>
                    <div class="grid grid-cols-2 gap-4 mt-6">
                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="text-blue-600 text-3xl font-bold">40+</div>
                            <div class="text-gray-600">Years of Excellence</div>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="text-blue-600 text-3xl font-bold">50+</div>
                            <div class="text-gray-600">Countries Served</div>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="text-blue-600 text-3xl font-bold">5000+</div>
                            <div class="text-gray-600">Projects Completed</div>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="text-blue-600 text-3xl font-bold">24/7</div>
                            <div class="text-gray-600">Technical Support</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-blue-900 mb-12">Our Products</h2>

            <!-- Product Tabs -->
            <div class="flex flex-wrap justify-center mb-8 border-b">
                <button @click="activeTab = 'generators'" :class="activeTab === 'generators' ? 'tab-active' : ''" class="px-4 py-2 font-medium text-gray-700 hover:text-blue-900 focus:outline-none">
                    Generator Sets
                </button>
                <button @click="activeTab = 'accessories'" :class="activeTab === 'accessories' ? 'tab-active' : ''" class="px-4 py-2 font-medium text-gray-700 hover:text-blue-900 focus:outline-none">
                    Accessories
                </button>
                <button @click="activeTab = 'trailers'" :class="activeTab === 'trailers' ? 'tab-active' : ''" class="px-4 py-2 font-medium text-gray-700 hover:text-blue-900 focus:outline-none">
                    Trailers
                </button>
                <button @click="activeTab = 'canopies'" :class="activeTab === 'canopies' ? 'tab-active' : ''" class="px-4 py-2 font-medium text-gray-700 hover:text-blue-900 focus:outline-none">
                    Canopies
                </button>
                <button @click="activeTab = 'panels'" :class="activeTab === 'panels' ? 'tab-active' : ''" class="px-4 py-2 font-medium text-gray-700 hover:text-blue-900 focus:outline-none">
                    Low Voltage Panels
                </button>
            </div>

            <!-- Product Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Generator Sets -->
                <div x-show="activeTab === 'generators'" x-transition class="product-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="Diesel Generator" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Industrial Diesel Generators</h3>
                        <p class="text-gray-600 mb-4">High-performance diesel generators ranging from 20kVA to 4000kVA for industrial and commercial applications.</p>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <div x-show="activeTab === 'generators'" x-transition class="product-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300">
                    <img src="https://cdn.pixabay.com/photo/2013/10/09/13/48/vehicle-193213_1280.jpg" alt="Marine Generator" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Marine Generators</h3>
                        <p class="text-gray-600 mb-4">Specialized marine power solutions designed to withstand harsh marine environments with corrosion-resistant components.</p>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <div x-show="activeTab === 'generators'" x-transition class="product-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1613665813446-82a78c468a1d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="Mobile Generator" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Mobile Generators</h3>
                        <p class="text-gray-600 mb-4">Portable power solutions for construction sites, events, and emergency situations with quick deployment capabilities.</p>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <!-- Accessories -->
                <div x-show="activeTab === 'accessories'" x-transition class="product-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1581094271901-8022df4466f9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="Fuel Tanks" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Fuel Tanks</h3>
                        <p class="text-gray-600 mb-4">Durable fuel storage solutions in various capacities to ensure extended generator operation without refueling.</p>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <div x-show="activeTab === 'accessories'" x-transition class="product-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1600880292089-90a7e086ee0c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="Control Systems" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Control Systems</h3>
                        <p class="text-gray-600 mb-4">Advanced control panels and monitoring systems for seamless generator operation and remote management.</p>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <div x-show="activeTab === 'accessories'" x-transition class="product-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1598300042247-d088f8ab3a91?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="Transfer Switches" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Transfer Switches</h3>
                        <p class="text-gray-600 mb-4">Automatic and manual transfer switches for seamless power transition between utility and generator power.</p>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <!-- Trailers -->
                <div x-show="activeTab === 'trailers'" x-transition class="product-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1617814076367-b759c7d7e738?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="Standard Trailer" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Standard Trailers</h3>
                        <p class="text-gray-600 mb-4">Robust trailer solutions for easy transportation of generators to various job sites and locations.</p>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <div x-show="activeTab === 'trailers'" x-transition class="product-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1589476993333-8e4df517e7c5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="Heavy-Duty Trailer" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Heavy-Duty Trailers</h3>
                        <p class="text-gray-600 mb-4">Specialized trailers designed for transporting larger generator sets to rugged terrains and remote locations.</p>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <div x-show="activeTab === 'trailers'" x-transition class="product-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="Custom Trailer" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Custom Trailers</h3>
                        <p class="text-gray-600 mb-4">Bespoke trailer solutions designed to meet specific project requirements and environmental challenges.</p>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <!-- Canopies -->
                <div x-show="activeTab === 'canopies'" x-transition class="product-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1598300042247-d088f8ab3a91?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="Soundproof Canopy" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Soundproof Canopies</h3>
                        <p class="text-gray-600 mb-4">Acoustic enclosures designed to minimize noise pollution while protecting generators from environmental elements.</p>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <div x-show="activeTab === 'canopies'" x-transition class="product-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="Weatherproof Canopy" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Weatherproof Canopies</h3>
                        <p class="text-gray-600 mb-4">Durable enclosures that protect generators from harsh weather conditions, ensuring reliable operation in any environment.</p>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <div x-show="activeTab === 'canopies'" x-transition class="product-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1613665813446-82a78c468a1d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="Custom Canopy" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Custom Canopies</h3>
                        <p class="text-gray-600 mb-4">Tailored canopy solutions designed to meet specific aesthetic, acoustic, and environmental requirements.</p>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <!-- Low Voltage Panels -->
                <div x-show="activeTab === 'panels'" x-transition class="product-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="Distribution Panels" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Distribution Panels</h3>
                        <p class="text-gray-600 mb-4">Comprehensive low voltage distribution panels for efficient power management and distribution in various applications.</p>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <div x-show="activeTab === 'panels'" x-transition class="product-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1581094271901-8022df4466f9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="Control Panels" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Control Panels</h3>
                        <p class="text-gray-600 mb-4">Advanced control panels for generator monitoring, protection, and automation with user-friendly interfaces.</p>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <div x-show="activeTab === 'panels'" x-transition class="product-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1600880292089-90a7e086ee0c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="Synchronization Panels" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Synchronization Panels</h3>
                        <p class="text-gray-600 mb-4">Specialized panels for parallel operation of multiple generators to ensure stable and efficient power supply.</p>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-blue-900 mb-12">Our Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-cogs text-blue-800 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-blue-900 mb-3">Custom Power Solutions</h3>
                    <p class="text-gray-600">Tailored power solutions designed to meet specific project requirements, from initial design to implementation and commissioning.</p>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-tools text-blue-800 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-blue-900 mb-3">Maintenance Services</h3>
                    <p class="text-gray-600">Comprehensive maintenance programs including regular inspections, preventive maintenance, and emergency repair services.</p>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-box-open text-blue-800 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-blue-900 mb-3">Spare Parts</h3>
                    <p class="text-gray-600">Genuine spare parts and components for all AMI products, ensuring optimal performance and longevity of your power systems.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Manufacturing Capabilities Section -->
    <section id="manufacturing" class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-blue-900 mb-12">Manufacturing Capabilities</h2>
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0 md:order-2">
                    <img src="https://images.unsplash.com/photo-1755377205428-ec47fcc8b9d2?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fGluZHVzdHJpZXN8ZW58MHwxfDB8fHww" alt="Manufacturing Facility" class="rounded-lg shadow-lg">
                </div>
                <div class="md:w-1/2 md:pr-12 md:order-1">
                    <h3 class="text-2xl font-bold text-blue-900 mb-4">In-House Manufacturing Excellence</h3>
                    <p class="mb-4">At AMI, we pride ourselves on our comprehensive in-house manufacturing capabilities that allow us to maintain strict quality control and deliver customized solutions efficiently.</p>

                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-2 rounded-full mr-3">
                                <i class="fas fa-check text-blue-800"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-blue-900">Storage Tanks</h4>
                                <p class="text-gray-600">Custom-designed fuel storage tanks in various capacities and configurations.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-blue-100 p-2 rounded-full mr-3">
                                <i class="fas fa-check text-blue-800"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-blue-900">Canopies</h4>
                                <p class="text-gray-600">Acoustic and weatherproof enclosures tailored to specific requirements.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-blue-100 p-2 rounded-full mr-3">
                                <i class="fas fa-check text-blue-800"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-blue-900">Control Systems</h4>
                                <p class="text-gray-600">Advanced control panels and monitoring systems for optimal performance.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-blue-100 p-2 rounded-full mr-3">
                                <i class="fas fa-check text-blue-800"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-blue-900">Low Voltage Panels</h4>
                                <p class="text-gray-600">Comprehensive range of distribution and control panels for various applications.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Global Partnerships Section -->
    <section id="partners" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-blue-900 mb-12">Global Partnerships</h2>
            <p class="text-center max-w-3xl mx-auto mb-12">AMI has established strong partnerships with leading engine manufacturers and technology providers worldwide to deliver the most reliable and innovative power solutions.</p>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-lg shadow flex items-center justify-center h-32">
                    <div class="text-center">
                        <div class="text-blue-800 font-bold text-lg">Partner 1</div>
                        <div class="text-gray-600 text-sm">Engine Manufacturer</div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow flex items-center justify-center h-32">
                    <div class="text-center">
                        <div class="text-blue-800 font-bold text-lg">Partner 2</div>
                        <div class="text-gray-600 text-sm">Technology Provider</div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow flex items-center justify-center h-32">
                    <div class="text-center">
                        <div class="text-blue-800 font-bold text-lg">Partner 3</div>
                        <div class="text-gray-600 text-sm">Control Systems</div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow flex items-center justify-center h-32">
                    <div class="text-center">
                        <div class="text-blue-800 font-bold text-lg">Partner 4</div>
                        <div class="text-gray-600 text-sm">Components Supplier</div>
                    </div>
                </div>
            </div>

            <div class="mt-12 text-center">
                <h3 class="text-2xl font-bold text-blue-900 mb-4">Global Presence</h3>
                <div class="inline-block bg-blue-800 text-white py-2 px-6 rounded-full">
                    <i class="fas fa-globe-americas mr-2"></i> Serving 50+ Countries Worldwide
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-blue-900 mb-12">Contact Us</h2>
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8">
                    <h3 class="text-xl font-bold text-blue-900 mb-4">Get in Touch</h3>
                    <p class="mb-6">For inquiries about our products, services, or to discuss your power requirements, please contact us using the information below or fill out the contact form.</p>

                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <i class="fas fa-map-marker-alt text-blue-800"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-blue-900">Headquarters</h4>
                                <p class="text-gray-600">123 Industrial Area, Dubai, UAE</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <i class="fas fa-phone text-blue-800"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-blue-900">Phone</h4>
                                <p class="text-gray-600">+971 4 123 4567</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <i class="fas fa-envelope text-blue-800"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-blue-900">Email</h4>
                                <p class="text-gray-600">info@almohandes-int.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2">
                    <form class="bg-white p-6 rounded-lg shadow-md">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                            <input type="text" id="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                            <input type="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="subject" class="block text-gray-700 font-bold mb-2">Subject</label>
                            <input type="text" id="subject" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="message" class="block text-gray-700 font-bold mb-2">Message</label>
                            <textarea id="message" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>

                        <button type="submit" class="bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <div class="flex items-center">
                        <div class="bg-white text-blue-800 font-bold text-xl py-1 px-3 rounded">
                            AMI
                        </div>
                        <span class="ml-2 text-xl font-semibold">Al Mohandes International</span>
                    </div>
                    <p class="mt-2 text-blue-200">Powering the World Since 1983</p>
                </div>

                <div class="flex space-x-6">
                    <a href="#" class="text-blue-200 hover:text-white transition duration-300">
                        <i class="fab fa-facebook-f text-xl"></i>
                    </a>
                    <a href="#" class="text-blue-200 hover:text-white transition duration-300">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="#" class="text-blue-200 hover:text-white transition duration-300">
                        <i class="fab fa-linkedin-in text-xl"></i>
                    </a>
                    <a href="#" class="text-blue-200 hover:text-white transition duration-300">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                </div>
            </div>

            <div class="border-t border-blue-800 mt-6 pt-6 text-center text-blue-200">
                <p>&copy; 2025 Al Mohandes International. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 80,
                        behavior: 'smooth'
                    });
                    // Close mobile menu if open
                    if (window.innerWidth < 768) {
                        document.querySelector('[x-data]').__x.$data.mobileMenuOpen = false;
                    }
                }
            });
        });
    </script>
</body>
</html>
