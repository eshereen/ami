<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al Mohandes International - Powering Reliability Since 1983</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --ami-blue: #0056b3;
            --ami-orange: #ff7700;
            --ami-light-blue: #e6f2ff;
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
        }

        .ami-blue {
            color: var(--ami-blue);
        }

        .ami-orange {
            color: var(--ami-orange);
        }

        .bg-ami-blue {
            background-color: var(--ami-blue);
        }

        .bg-ami-orange {
            background-color: var(--ami-orange);
        }

        .bg-ami-light-blue {
            background-color: var(--ami-light-blue);
        }

        .border-ami-blue {
            border-color: var(--ami-blue);
        }

        .border-ami-orange {
            border-color: var(--ami-orange);
        }

        .text-shadow {
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .smooth-scroll {
            scroll-behavior: smooth;
        }

        .fade-in {
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-slider {
            transition: opacity 0.8s ease-in-out;
        }

        .timeline-dot {
            position: relative;
        }

        .timeline-dot::before {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: var(--ami-blue);
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .world-map {
            background-image: url('https://images.unsplash.com/photo-1526778548025-fa2f459cd5ce?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .world-map::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 86, 179, 0.7);
        }

        .world-map-content {
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body class="smooth-scroll" x-data="{
    mobileMenuOpen: false,
    currentSlide: 0,
    slides: [
        'https://images.unsplash.com/photo-1496247749665-49cf5b1022e9?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGluZHVzdHJpZXN8ZW58MHwwfDB8fHww',
        'https://images.unsplash.com/photo-1613665813446-82a78c468a1d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80',
        'https://images.unsplash.com/photo-1581094271901-8022df4466f9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80'
    ],
    init() {
        setInterval(() => {
            this.currentSlide = (this.currentSlide + 1) % this.slides.length;
        }, 5000);
    }
}">
    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <img src="https://via.placeholder.com/150x50?text=AMI+Logo" alt="AMI Logo" class="h-12">
                    <span class="ml-3 text-xl font-bold ami-blue">Al Mohandes International</span>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-ami-blue transition">Home</a>
                    <a href="#about" class="text-gray-700 hover:text-ami-blue transition">About</a>
                    <a href="#products" class="text-gray-700 hover:text-ami-blue transition">Products</a>
                    <a href="#services" class="text-gray-700 hover:text-ami-blue transition">Services</a>
                    <a href="#manufacturing" class="text-gray-700 hover:text-ami-blue transition">Manufacturing</a>
                    <a href="#global" class="text-gray-700 hover:text-ami-blue transition">Global Reach</a>
                    <a href="#contact" class="text-gray-700 hover:text-ami-blue transition">Contact</a>
                </nav>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-gray-700 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div x-show="mobileMenuOpen" x-transition class="md:hidden mt-4 pb-4">
                <div class="flex flex-col space-y-3">
                    <a href="#home" class="text-gray-700 hover:text-ami-blue transition" @click="mobileMenuOpen = false">Home</a>
                    <a href="#about" class="text-gray-700 hover:text-ami-blue transition" @click="mobileMenuOpen = false">About</a>
                    <a href="#products" class="text-gray-700 hover:text-ami-blue transition" @click="mobileMenuOpen = false">Products</a>
                    <a href="#services" class="text-gray-700 hover:text-ami-blue transition" @click="mobileMenuOpen = false">Services</a>
                    <a href="#manufacturing" class="text-gray-700 hover:text-ami-blue transition" @click="mobileMenuOpen = false">Manufacturing</a>
                    <a href="#global" class="text-gray-700 hover:text-ami-blue transition" @click="mobileMenuOpen = false">Global Reach</a>
                    <a href="#contact" class="text-gray-700 hover:text-ami-blue transition" @click="mobileMenuOpen = false">Contact</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="relative h-screen">
        <div class="absolute inset-0 overflow-hidden">
            <template x-for="(slide, index) in slides" :key="index">
                <div
                    x-show="currentSlide === index"
                    x-transition:enter="transition ease-in-out duration-1000"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in-out duration-1000"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="absolute inset-0 bg-cover bg-center hero-slider"
                    :style="`background-image: url('${slide}')`"
                ></div>
            </template>
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>

        <div class="relative z-10 h-full flex items-center justify-center text-white text-center px-4">
            <div class="max-w-3xl fade-in">
                <h1 class="text-4xl md:text-6xl font-bold mb-4 text-shadow">Powering Reliability Since 1983</h1>
                <p class="text-xl md:text-2xl mb-8 text-shadow">Engineering Excellence in Diesel Generator Solutions</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="#products" class="bg-ami-orange hover:bg-orange-600 text-white font-bold py-3 px-8 rounded-full transition transform hover:scale-105">
                        Explore Products
                    </a>
                    <a href="#contact" class="bg-transparent border-2 border-white hover:bg-white hover:text-ami-blue text-white font-bold py-3 px-8 rounded-full transition">
                        Get a Quote
                    </a>
                </div>
            </div>
        </div>

        <!-- Slider Indicators -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
            <template x-for="(slide, index) in slides" :key="index">
                <button
                    @click="currentSlide = index"
                    class="w-3 h-3 rounded-full"
                    :class="currentSlide === index ? 'bg-white' : 'bg-white bg-opacity-50'"
                ></button>
            </template>
        </div>
    </section>

    <!-- About AMI Section -->
    <section id="about" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold ami-blue mb-4">About Al Mohandes International</h2>
                <div class="w-24 h-1 bg-ami-orange mx-auto"></div>
            </div>

            <div class="flex flex-col md:flex-row gap-12 items-center">
                <div class="md:w-1/2">
                    <h3 class="text-2xl font-bold mb-6">Our Legacy of Excellence</h3>
                    <p class="text-gray-700 mb-6">
                        Established in 1983, Al Mohandes International (AMI) has grown from a local enterprise to a globally recognized manufacturer of diesel generators. With nearly four decades of experience, we've built a reputation for engineering excellence, reliability, and innovative power solutions.
                    </p>
                    <p class="text-gray-700 mb-6">
                        Our expertise spans custom power solutions, turnkey projects, and comprehensive after-sales service. We pride ourselves on solving complex power challenges across industries and environments worldwide.
                    </p>

                    <div class="mt-10">
                        <h4 class="text-xl font-bold mb-6">Our Journey</h4>
                        <div class="relative">
                            <div class="absolute left-4 top-0 bottom-0 w-0.5 bg-ami-blue"></div>

                            <div class="relative pl-10 pb-8">
                                <div class="timeline-dot"></div>
                                <h5 class="font-bold text-lg">1983</h5>
                                <p class="text-gray-600">Founded as a local generator service provider</p>
                            </div>

                            <div class="relative pl-10 pb-8">
                                <div class="timeline-dot"></div>
                                <h5 class="font-bold text-lg">1995</h5>
                                <p class="text-gray-600">Expanded to manufacturing generator sets</p>
                            </div>

                            <div class="relative pl-10 pb-8">
                                <div class="timeline-dot"></div>
                                <h5 class="font-bold text-lg">2005</h5>
                                <p class="text-gray-600">Established international presence</p>
                            </div>

                            <div class="relative pl-10">
                                <div class="timeline-dot"></div>
                                <h5 class="font-bold text-lg">Present</h5>
                                <p class="text-gray-600">Global leader in power solutions with clients worldwide</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2">
                    <img src="https://images.unsplash.com/photo-1649777689164-c4ad5dd3a83c?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW5kdXN0cmllc3xlbnwwfDJ8MHx8fDA%3D" alt="AMI Manufacturing Facility" class="rounded-lg shadow-lg w-full">
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold ami-blue mb-4">Our Products</h2>
                <div class="w-24 h-1 bg-ami-orange mx-auto"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Explore our comprehensive range of power solutions designed for reliability and performance.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Generator Sets -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover-lift">
                    <img src="https://cdn.pixabay.com/photo/2015/10/28/12/31/motor-1010495_1280.jpg" alt="Generator Sets" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 ami-blue">Generator Sets</h3>
                        <p class="text-gray-600 mb-4">High-performance diesel generators ranging from 10kVA to 4000kVA for various applications.</p>
                        <a href="#" class="text-ami-orange font-medium hover:underline">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <!-- Accessories -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover-lift">
                    <img src="https://cdn.pixabay.com/photo/2019/12/22/07/45/trailer-4711979_1280.jpg" alt="Accessories" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 ami-blue">Accessories</h3>
                        <p class="text-gray-600 mb-4">Comprehensive range of generator accessories including fuel tanks, control systems, and more.</p>
                        <a href="#" class="text-ami-orange font-medium hover:underline">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <!-- Trailers -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover-lift">
                    <img src="https://images.pexels.com/photos/17816971/pexels-photo-17816971.jpeg" alt="Trailers" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 ami-blue">Trailers</h3>
                        <p class="text-gray-600 mb-4">Mobile generator trailers for easy transportation and deployment in remote locations.</p>
                        <a href="#" class="text-ami-orange font-medium hover:underline">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <!-- Canopies -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover-lift">
                    <img src="https://cdn.pixabay.com/photo/2016/09/02/18/38/factory-1639990_1280.jpg" alt="Canopies" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 ami-blue">Canopies</h3>
                        <p class="text-gray-600 mb-4">Weatherproof and soundproof canopies designed for optimal generator protection and noise reduction.</p>
                        <a href="#" class="text-ami-orange font-medium hover:underline">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <!-- Low Voltage Panels -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover-lift">
                    <img src="https://cdn.pixabay.com/photo/2014/12/15/14/04/cylinders-569151_1280.jpg" alt="Low Voltage Panels" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 ami-blue">Low Voltage Panels</h3>
                        <p class="text-gray-600 mb-4">Advanced LV panels for power distribution, monitoring, and control systems.</p>
                        <a href="#" class="text-ami-orange font-medium hover:underline">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <!-- Custom Solutions -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover-lift">
                    <img src="https://cdn.pixabay.com/photo/2013/10/09/13/48/vehicle-193213_1280.jpg" alt="Custom Solutions" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 ami-blue">Custom Solutions</h3>
                        <p class="text-gray-600 mb-4">Tailored power solutions designed to meet specific client requirements and challenging environments.</p>
                        <a href="#" class="text-ami-orange font-medium hover:underline">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-ami-light-blue">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold ami-blue mb-4">Our Services</h2>
                <div class="w-24 h-1 bg-ami-orange mx-auto"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Comprehensive services to support your power needs from installation to maintenance.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Custom Solutions -->
                <div class="bg-white rounded-lg p-8 text-center hover-lift">
                    <div class="w-16 h-16 bg-ami-blue rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-cogs text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 ami-blue">Custom Solutions</h3>
                    <p class="text-gray-600">Tailored power solutions designed to meet specific requirements and challenging environments.</p>
                </div>

                <!-- Maintenance -->
                <div class="bg-white rounded-lg p-8 text-center hover-lift">
                    <div class="w-16 h-16 bg-ami-blue rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-tools text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 ami-blue">Maintenance</h3>
                    <p class="text-gray-600">Preventive and corrective maintenance services to ensure optimal performance and longevity.</p>
                </div>

                <!-- Spare Parts -->
                <div class="bg-white rounded-lg p-8 text-center hover-lift">
                    <div class="w-16 h-16 bg-ami-blue rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-box-open text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 ami-blue">Spare Parts</h3>
                    <p class="text-gray-600">Genuine spare parts and components for all our products to maintain reliability and performance.</p>
                </div>

                <!-- Technical Support -->
                <div class="bg-white rounded-lg p-8 text-center hover-lift">
                    <div class="w-16 h-16 bg-ami-blue rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-headset text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 ami-blue">Technical Support</h3>
                    <p class="text-gray-600">24/7 technical support and assistance from our team of experienced engineers.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Manufacturing Capabilities Section -->
    <section id="manufacturing" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold ami-blue mb-4">Manufacturing Capabilities</h2>
                <div class="w-24 h-1 bg-ami-orange mx-auto"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">State-of-the-art facilities and in-house production capabilities for quality control and customization.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
                <div>
                    <img src="https://images.unsplash.com/photo-1511454493857-0a29f2c023c7?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDZ8fGluZHVzdHJpZXN8ZW58MHwxfDB8fHww" alt="Manufacturing Facility" class="rounded-lg shadow-lg w-full">
                </div>
                <div>
                    <h3 class="text-2xl font-bold mb-6 ami-blue">In-House Production Excellence</h3>
                    <p class="text-gray-700 mb-6">
                        Our vertically integrated manufacturing process allows us to maintain strict quality control and deliver customized solutions efficiently. We produce a wide range of components in-house:
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-ami-orange mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-bold">Storage Tanks</h4>
                                <p class="text-gray-600">Custom-designed fuel storage solutions in various capacities.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-ami-orange mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-bold">Canopies</h4>
                                <p class="text-gray-600">Weatherproof and soundproof enclosures for generators.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-ami-orange mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-bold">Control Systems</h4>
                                <p class="text-gray-600">Advanced control panels and monitoring systems.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-ami-orange mt-1 mr-3"></i>
                            <div>
                                <h4 class="font-bold">LV Panels</h4>
                                <p class="text-gray-600">Low voltage distribution and control panels.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-ami-light-blue rounded-lg p-6 text-center">
                    <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80" alt="Workshop" class="rounded-lg mb-4 w-full h-48 object-cover">
                    <h4 class="font-bold ami-blue mb-2">Modern Workshops</h4>
                    <p class="text-gray-600">Equipped with advanced machinery and technology for precision manufacturing.</p>
                </div>

                <div class="bg-ami-light-blue rounded-lg p-6 text-center">
                    <img src="https://images.unsplash.com/photo-1613665813446-82a78c468a1d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80" alt="Quality Control" class="rounded-lg mb-4 w-full h-48 object-cover">
                    <h4 class="font-bold ami-blue mb-2">Quality Control</h4>
                    <p class="text-gray-600">Rigorous testing and quality assurance processes at every production stage.</p>
                </div>

                <div class="bg-ami-light-blue rounded-lg p-6 text-center">
                    <img src="https://images.unsplash.com/photo-1581094271901-8022df4466f9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80" alt="Skilled Team" class="rounded-lg mb-4 w-full h-48 object-cover">
                    <h4 class="font-bold ami-blue mb-2">Skilled Team</h4>
                    <p class="text-gray-600">Experienced engineers and technicians dedicated to excellence.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Global Reach & Partnerships Section -->
    <section id="global" class="py-20 world-map">
        <div class="container mx-auto px-4 world-map-content">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Global Reach & Partnerships</h2>
                <div class="w-24 h-1 bg-ami-orange mx-auto"></div>
                <p class="mt-4 text-gray-200 max-w-2xl mx-auto">Serving clients across continents with reliable power solutions and trusted partnerships.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
                <div class="bg-white bg-opacity-90 rounded-lg p-8">
                    <h3 class="text-2xl font-bold mb-6 ami-blue">Worldwide Presence</h3>
                    <p class="text-gray-700 mb-6">
                        From our headquarters, we've expanded our reach to serve clients in over 50 countries across the Middle East, Africa, Asia, and Europe. Our global network of partners and service centers ensures prompt support wherever our clients operate.
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center">
                            <div class="text-3xl font-bold ami-orange">50+</div>
                            <div class="text-gray-600">Countries</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold ami-orange">5000+</div>
                            <div class="text-gray-600">Projects Completed</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold ami-orange">100+</div>
                            <div class="text-gray-600">Partners</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold ami-orange">24/7</div>
                            <div class="text-gray-600">Support</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white bg-opacity-90 rounded-lg p-8">
                    <h3 class="text-2xl font-bold mb-6 ami-blue">Trusted Partners</h3>
                    <p class="text-gray-700 mb-6">
                        We collaborate with leading industry partners to deliver the best power solutions. Our partners include:
                    </p>
                    <div class="grid grid-cols-3 gap-4 items-center">
                        <div class="bg-gray-100 rounded-lg p-4 flex items-center justify-center h-20">
                            <span class="text-gray-500 font-bold">Partner 1</span>
                        </div>
                        <div class="bg-gray-100 rounded-lg p-4 flex items-center justify-center h-20">
                            <span class="text-gray-500 font-bold">Partner 2</span>
                        </div>
                        <div class="bg-gray-100 rounded-lg p-4 flex items-center justify-center h-20">
                            <span class="text-gray-500 font-bold">Partner 3</span>
                        </div>
                        <div class="bg-gray-100 rounded-lg p-4 flex items-center justify-center h-20">
                            <span class="text-gray-500 font-bold">Partner 4</span>
                        </div>
                        <div class="bg-gray-100 rounded-lg p-4 flex items-center justify-center h-20">
                            <span class="text-gray-500 font-bold">Partner 5</span>
                        </div>
                        <div class="bg-gray-100 rounded-lg p-4 flex items-center justify-center h-20">
                            <span class="text-gray-500 font-bold">Partner 6</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Case Studies / Environments Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold ami-blue mb-4">Case Studies & Environments</h2>
                <div class="w-24 h-1 bg-ami-orange mx-auto"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Our generators excel in diverse environments, demonstrating adaptability and reliability.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Rugged Terrains -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover-lift">
                    <img src="https://cdn.pixabay.com/photo/2016/09/02/18/38/factory-1639990_1280.jpg" alt="Rugged Terrains" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 ami-blue">Rugged Terrains</h3>
                        <p class="text-gray-600 mb-4">Powering mining operations and remote construction sites in challenging environments with extreme temperatures and difficult access.</p>
                        <a href="#" class="text-ami-orange font-medium hover:underline">View Case Study <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <!-- Urban Setups -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover-lift">
                    <img src="https://cdn.pixabay.com/photo/2019/12/22/07/45/trailer-4711979_1280.jpg" alt="Urban Setups" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 ami-blue">Urban Setups</h3>
                        <p class="text-gray-600 mb-4">Providing backup power for hospitals, data centers, and commercial buildings in densely populated urban areas with strict noise regulations.</p>
                        <a href="#" class="text-ami-orange font-medium hover:underline">View Case Study <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <!-- Marine Environments -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover-lift">
                    <img src="https://cdn.pixabay.com/photo/2015/10/28/12/31/motor-1010495_1280.jpg" alt="Marine Environments" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 ami-blue">Marine Environments</h3>
                        <p class="text-gray-600 mb-4">Specialized generators for offshore platforms, ports, and marine vessels with corrosion-resistant materials and saltwater protection.</p>
                        <a href="#" class="text-ami-orange font-medium hover:underline">View Case Study <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact & Inquiry Section -->
    <section id="contact" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold ami-blue mb-4">Contact & Inquiry</h2>
                <div class="w-24 h-1 bg-ami-orange mx-auto"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Get in touch with our team for inquiries, quotes, or support.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div>
                    <h3 class="text-2xl font-bold mb-6 ami-blue">Send Us a Message</h3>
                    <form class="space-y-6">
                        <div>
                            <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                            <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-ami-blue focus:border-transparent">
                        </div>

                        <div>
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                            <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-ami-blue focus:border-transparent">
                        </div>

                        <div>
                            <label for="phone" class="block text-gray-700 font-medium mb-2">Phone</label>
                            <input type="tel" id="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-ami-blue focus:border-transparent">
                        </div>

                        <div>
                            <label for="project" class="block text-gray-700 font-medium mb-2">Project Details</label>
                            <textarea id="project" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-ami-blue focus:border-transparent"></textarea>
                        </div>

                        <button type="submit" class="bg-ami-orange hover:bg-orange-600 text-white font-bold py-3 px-8 rounded-full transition transform hover:scale-105">
                            Submit Inquiry
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div>
                    <h3 class="text-2xl font-bold mb-6 ami-blue">Get in Touch</h3>

                    <div class="space-y-6 mb-8">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-ami-blue rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-1">Headquarters</h4>
                                <p class="text-gray-600">123 Industrial Area, Amman, Jordan</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-ami-blue rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-phone text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-1">Phone</h4>
                                <p class="text-gray-600">+962 6 123 4567</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-ami-blue rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-envelope text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-1">Email</h4>
                                <p class="text-gray-600">info@almohandes-int.com</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-ami-blue rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-clock text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-1">Business Hours</h4>
                                <p class="text-gray-600">Monday - Friday: 8:00 AM - 6:00 PM</p>
                                <p class="text-gray-600">Saturday: 9:00 AM - 2:00 PM</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-200 rounded-lg h-64 flex items-center justify-center">
                        <span class="text-gray-500">Map Location</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-ami-blue text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <img src="https://via.placeholder.com/150x50?text=AMI+Logo" alt="AMI Logo" class="h-12 mb-4">
                    <p class="text-gray-300">Powering reliability since 1983, Al Mohandes International is a global leader in diesel generator solutions.</p>
                </div>

                <div>
                    <h4 class="text-xl font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-300 hover:text-white transition">Home</a></li>
                        <li><a href="#about" class="text-gray-300 hover:text-white transition">About Us</a></li>
                        <li><a href="#products" class="text-gray-300 hover:text-white transition">Products</a></li>
                        <li><a href="#services" class="text-gray-300 hover:text-white transition">Services</a></li>
                        <li><a href="#contact" class="text-gray-300 hover:text-white transition">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-xl font-bold mb-4">Products</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Generator Sets</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Accessories</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Trailers</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Canopies</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Low Voltage Panels</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-xl font-bold mb-4">Connect With Us</h4>
                    <div class="flex space-x-4 mb-4">
                        <a href="#" class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                    <p class="text-gray-300">Subscribe to our newsletter for updates and offers.</p>
                    <div class="mt-4 flex">
                        <input type="email" placeholder="Your email" class="px-4 py-2 rounded-l-lg text-gray-800 w-full focus:outline-none">
                        <button class="bg-ami-orange hover:bg-orange-600 px-4 py-2 rounded-r-lg transition">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="border-t border-white border-opacity-20 mt-12 pt-8 text-center">
                <p class="text-gray-300">&copy; 2023 Al Mohandes International. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Form submission handler
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Thank you for your inquiry. We will contact you soon!');
            this.reset();
        });
    </script>
</body>
</html>
