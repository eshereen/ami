<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al Mohandes International | Engineering Excellence Since 1983</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
          :root {
            --ami-blue: #0056b3;
            --ami-orange: #ff7700;
            --ami-light-blue: #e6f2ff;
        }
        .hero-image {
            background-image: url('https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .orange-gradient {
            background: linear-gradient(90deg, #F97316, #FB923C);
        }

        .blue-gradient {
            background: linear-gradient(90deg, #1E40AF, #3B82F6);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.8s ease-out;
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

    </style>
</head>
<body class="font-sans text-gray-800" x-data="{
    mobileMenuOpen: false,
    currentSlide: 0,
    slides: [
        'https://images.pexels.com/photos/2760241/pexels-photo-2760241.jpeg',
        'https://images.unsplash.com/photo-1613665813446-82a78c468a1d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
        'https://images.unsplash.com/photo-1581094271901-8022df4466f9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80'
    ],
    nextSlide() {
        this.currentSlide = (this.currentSlide + 1) % this.slides.length;
    },
    prevSlide() {
        this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
    }
}" x-init="setInterval(() => nextSlide(), 5000)">

    <!-- Navigation -->
    <nav class="fixed w-full bg-white bg-opacity-95 shadow-md z-50">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <div class="w-12 h-12 rounded-full bg-blue-600 flex items-center justify-center">
                        <span class="text-white font-bold text-xl">AMI</span>
                    </div>
                    <span class="text-xl font-bold text-blue-900">Al Mohandes International</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8">
                    <a href="#home" class="text-blue-900 hover:text-orange-500 font-medium transition">Home</a>
                    <a href="#about" class="text-blue-900 hover:text-orange-500 font-medium transition">About</a>
                    <a href="#products" class="text-blue-900 hover:text-orange-500 font-medium transition">Products</a>
                    <a href="#global" class="text-blue-900 hover:text-orange-500 font-medium transition">Services</a>
                    <a href="#innovation" class="text-blue-900 hover:text-orange-500 font-medium transition">Innovation</a>
                    <a href="#contact" class="text-blue-900 hover:text-orange-500 font-medium transition">Contact</a>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-blue-900">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" x-transition class="md:hidden mt-4 pb-4">
                <a href="#home" class="block py-2 text-blue-900 hover:text-orange-500 font-medium transition">Home</a>
                <a href="#about" class="block py-2 text-blue-900 hover:text-orange-500 font-medium transition">About</a>
                <a href="#products" class="block py-2 text-blue-900 hover:text-orange-500 font-medium transition">Products</a>
                <a href="#global" class="block py-2 text-blue-900 hover:text-orange-500 font-medium transition">Global Reach</a>
                <a href="#innovation" class="block py-2 text-blue-900 hover:text-orange-500 font-medium transition">Innovation</a>
                <a href="#contact" class="block py-2 text-blue-900 hover:text-orange-500 font-medium transition">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative h-screen overflow-hidden">
        <div class="absolute inset-0" :style="`background-image: url(${slides[currentSlide]}); background-size: cover; background-position: center;`"></div>
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>

        <div class="relative container mx-auto px-4 h-full flex items-center">
            <div class="text-white max-w-3xl fade-in">
                <h1 class="text-4xl md:text-6xl font-bold mb-4 text-shadow">Powering the World Since 1983</h1>
                <p class="text-xl md:text-2xl mb-8 text-shadow">Engineering excellence in diesel generator solutions for a global market</p>
                <div class="flex flex-wrap gap-4">
                    <a href="#products" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg transition transform hover:scale-105">Explore Products</a>
                    <a href="#contact" class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-900 text-white font-bold py-3 px-6 rounded-lg transition transform hover:scale-105">Contact Us</a>
                </div>
            </div>
        </div>

        <!-- Slider Controls -->
        <button @click="prevSlide" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white bg-black bg-opacity-30 rounded-full p-3 hover:bg-opacity-50 transition">
            <i class="fas fa-chevron-left text-xl"></i>
        </button>
        <button @click="nextSlide" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white bg-black bg-opacity-30 rounded-full p-3 hover:bg-opacity-50 transition">
            <i class="fas fa-chevron-right text-xl"></i>
        </button>

        <!-- Slider Indicators -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
            <template x-for="(slide, index) in slides" :key="index">
                <button @click="currentSlide = index" class="w-3 h-3 rounded-full" :class="currentSlide === index ? 'bg-white' : 'bg-white bg-opacity-50'"></button>
            </template>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1649777689164-c4ad5dd3a83c?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW5kdXN0cmllc3xlbnwwfDJ8MHx8fDA%3D" alt="AMI Facility" class="rounded-lg shadow-xl">
                        <div class="absolute -bottom-6 -right-6 bg-blue-900 text-white p-4 rounded-lg shadow-lg">
                            <div class="text-4xl font-bold">40+</div>
                            <div>Years of Excellence</div>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 md:pl-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-4">About Al Mohandes International</h2>
                    <div class="w-20 h-1 bg-orange-500 mb-6"></div>
                    <p class="text-gray-700 mb-4">Established in 1983, Al Mohandes International (AMI) has grown to become a globally recognized leader in diesel generator manufacturing. With four decades of engineering excellence, we have built a reputation for reliability, innovation, and superior customer service.</p>
                    <p class="text-gray-700 mb-6">Our state-of-the-art facilities and highly skilled engineering team enable us to design and manufacture power solutions that meet the most demanding requirements across industries worldwide.</p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                <i class="fas fa-cogs text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <div class="font-bold text-blue-900">Engineering Excellence</div>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                <i class="fas fa-globe text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <div class="font-bold text-blue-900">Global Presence</div>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                <i class="fas fa-lightbulb text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <div class="font-bold text-blue-900">Innovation</div>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                <i class="fas fa-shield-alt text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <div class="font-bold text-blue-900">Reliability</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-4">Our Products</h2>
                <div class="w-20 h-1 bg-orange-500 mx-auto mb-6"></div>
                <p class="text-gray-700">Our comprehensive range of diesel generators is engineered to deliver reliable power solutions for every application, from commercial to industrial needs.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Product 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden card-hover">
                    <div class="h-56 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1613665813446-82a78c468a1d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Industrial Series</h3>
                        <p class="text-gray-700 mb-4">Heavy-duty generators designed for continuous operation in demanding industrial environments.</p>
                        <ul class="text-gray-700 mb-4 space-y-1">
                            <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> Power range: 500kVA - 3500kVA</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> 24/7 operation capability</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> Advanced monitoring systems</li>
                        </ul>
                        <a href="#" class="text-orange-500 font-medium hover:text-orange-600 transition">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden card-hover">
                    <div class="h-56 bg-cover bg-center" style="background-image: url('https://cdn.pixabay.com/photo/2013/10/09/13/48/vehicle-193213_1280.jpg');"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Commercial Series</h3>
                        <p class="text-gray-700 mb-4">Reliable power solutions for commercial buildings, hospitals, and data centers.</p>
                        <ul class="text-gray-700 mb-4 space-y-1">
                            <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> Power range: 100kVA - 500kVA</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> Low noise operation</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> Compact design</li>
                        </ul>
                        <a href="#" class="text-orange-500 font-medium hover:text-orange-600 transition">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden card-hover">
                    <div class="h-56 bg-cover bg-center" style="background-image: url('https://cdn.pixabay.com/photo/2022/08/19/06/27/honda-xl600r-7396188_1280.jpg');"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Mobile Series</h3>
                        <p class="text-gray-700 mb-4">Portable power solutions for construction sites, events, and emergency situations.</p>
                        <ul class="text-gray-700 mb-4 space-y-1">
                            <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> Power range: 20kVA - 500kVA</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> Trailer-mounted options</li>
                            <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> Quick deployment</li>
                        </ul>
                        <a href="#" class="text-orange-500 font-medium hover:text-orange-600 transition">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
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

    <!-- Innovation Section -->
    <section id="innovation" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0 md:order-2">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1511454493857-0a29f2c023c7?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDZ8fGluZHVzdHJpZXN8ZW58MHwxfDB8fHww" alt="Innovation" class="rounded-lg shadow-xl">
                    </div>
                </div>
                <div class="md:w-1/2 md:pr-12 md:order-1">
                    <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-4">Innovation & Technology</h2>
                    <div class="w-20 h-1 bg-orange-500 mb-6"></div>
                    <p class="text-gray-700 mb-6">At AMI, innovation is at the core of everything we do. Our R&D team continuously develops cutting-edge technologies to improve efficiency, reduce emissions, and enhance the reliability of our power solutions.</p>

                    <div class="space-y-4 mb-8">
                        <div class="flex items-start">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-microchip text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-blue-900 mb-1">Smart Control Systems</h3>
                                <p class="text-gray-700">Advanced monitoring and control systems for optimal performance and remote management.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-leaf text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-blue-900 mb-1">Eco-Friendly Solutions</h3>
                                <p class="text-gray-700">Low-emission technologies that meet global environmental standards.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-battery-full text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-blue-900 mb-1">Fuel Efficiency</h3>
                                <p class="text-gray-700">Innovative engine designs that maximize power output while minimizing fuel consumption.</p>
                            </div>
                        </div>
                    </div>

                    <a href="#" class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg transition transform hover:scale-105">Our Research & Development</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-4">What Our Clients Say</h2>
                <div class="w-20 h-1 bg-orange-500 mx-auto mb-6"></div>
                <p class="text-gray-700">Hear from our valued customers about their experience with AMI's power solutions.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center mb-4">
                        <div class="text-orange-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-6 italic">"AMI's generators have been powering our manufacturing plant for over a decade. Their reliability and exceptional service have made them our trusted partner."</p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Client" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <div class="font-bold text-blue-900">Ahmed Hassan</div>
                            <div class="text-gray-600 text-sm">Manufacturing Director</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center mb-4">
                        <div class="text-orange-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-6 italic">"The mobile generators from AMI provided the perfect solution for our construction sites. Their quick deployment and fuel efficiency saved us both time and money."</p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Client" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <div class="font-bold text-blue-900">Sarah Johnson</div>
                            <div class="text-gray-600 text-sm">Project Manager</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center mb-4">
                        <div class="text-orange-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-6 italic">"As a hospital administrator, reliable power is critical. AMI's backup systems have never failed us, even during the most challenging weather conditions."</p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Client" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <div class="font-bold text-blue-900">Michael Chen</div>
                            <div class="text-gray-600 text-sm">Hospital Administrator</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-blue-900 text-white">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Contact Us</h2>
                <div class="w-20 h-1 bg-orange-500 mx-auto mb-6"></div>
                <p>Get in touch with our team to discuss your power requirements or to learn more about our products and services.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-2xl font-bold mb-6">Get In Touch</h3>
                    <form class="space-y-4">
                        <div>
                            <label class="block mb-2">Name</label>
                            <input type="text" class="w-full px-4 py-2 rounded-lg bg-blue-800 border border-blue-700 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        </div>
                        <div>
                            <label class="block mb-2">Email</label>
                            <input type="email" class="w-full px-4 py-2 rounded-lg bg-blue-800 border border-blue-700 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        </div>
                        <div>
                            <label class="block mb-2">Subject</label>
                            <input type="text" class="w-full px-4 py-2 rounded-lg bg-blue-800 border border-blue-700 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        </div>
                        <div>
                            <label class="block mb-2">Message</label>
                            <textarea rows="4" class="w-full px-4 py-2 rounded-lg bg-blue-800 border border-blue-700 focus:outline-none focus:ring-2 focus:ring-orange-500"></textarea>
                        </div>
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg transition transform hover:scale-105">Send Message</button>
                    </form>
                </div>

                <div>
                    <h3 class="text-2xl font-bold mb-6">Contact Information</h3>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="w-12 h-12 rounded-full bg-blue-800 flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-orange-400 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg mb-1">Headquarters</h4>
                                <p class="text-blue-100">123 Industrial Avenue, Dubai, United Arab Emirates</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 rounded-full bg-blue-800 flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-phone text-orange-400 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg mb-1">Phone</h4>
                                <p class="text-blue-100">+971 4 123 4567</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 rounded-full bg-blue-800 flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-envelope text-orange-400 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg mb-1">Email</h4>
                                <p class="text-blue-100">info@almohandes-int.com</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 rounded-full bg-blue-800 flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-clock text-orange-400 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg mb-1">Business Hours</h4>
                                <p class="text-blue-100">Monday - Friday: 8:00 AM - 6:00 PM<br>Saturday: 9:00 AM - 2:00 PM<br>Sunday: Closed</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h4 class="font-bold text-lg mb-4">Follow Us</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 rounded-full bg-blue-800 flex items-center justify-center hover:bg-orange-500 transition">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-blue-800 flex items-center justify-center hover:bg-orange-500 transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-blue-800 flex items-center justify-center hover:bg-orange-500 transition">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-blue-800 flex items-center justify-center hover:bg-orange-500 transition">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-950 text-white py-10">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-6 md:mb-0">
                    <div class="flex items-center space-x-2 mb-2">
                        <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center">
                            <span class="text-white font-bold">AMI</span>
                        </div>
                        <span class="text-xl font-bold">Al Mohandes International</span>
                    </div>
                    <p class="text-blue-200">Engineering excellence since 1983</p>
                </div>

                <div class="flex flex-wrap justify-center gap-6">
                    <a href="#home" class="text-blue-200 hover:text-orange-400 transition">Home</a>
                    <a href="#about" class="text-blue-200 hover:text-orange-400 transition">About</a>
                    <a href="#products" class="text-blue-200 hover:text-orange-400 transition">Products</a>
                    <a href="#global" class="text-blue-200 hover:text-orange-400 transition">Global Reach</a>
                    <a href="#innovation" class="text-blue-200 hover:text-orange-400 transition">Innovation</a>
                    <a href="#contact" class="text-blue-200 hover:text-orange-400 transition">Contact</a>
                </div>
            </div>

            <div class="border-t border-blue-800 mt-8 pt-8 text-center text-blue-300">
                <p>&copy; 2023 Al Mohandes International. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>
