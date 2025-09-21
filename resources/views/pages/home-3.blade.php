<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al Mohandes International - Engineering Power Solutions</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --ami-dark: #0a192f;
            --ami-accent: #ff7700;
            --ami-secondary: #172a45;
            --ami-light: #8892b0;
            --ami-white: #ffffff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--ami-dark);
            color: var(--ami-white);
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Space Grotesk', sans-serif;
        }

        .ami-dark {
            background-color: var(--ami-dark);
        }

        .ami-secondary {
            background-color: var(--ami-secondary);
        }

        .ami-accent {
            color: var(--ami-accent);
        }

        .bg-ami-accent {
            background-color: var(--ami-accent);
        }

        .text-ami-light {
            color: var(--ami-light);
        }

        .border-ami-accent {
            border-color: var(--ami-accent);
        }

        .gradient-text {
            background: linear-gradient(135deg, #ff7700 0%, #ff9e50 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(255, 119, 0, 0.2);
        }

        .tech-border {
            position: relative;
            overflow: hidden;
        }

        .tech-border::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--ami-accent), transparent);
            animation: borderSlide 3s linear infinite;
        }

        @keyframes borderSlide {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .diagonal-pattern {
            background-image: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 10px,
                rgba(255, 119, 0, 0.03) 10px,
                rgba(255, 119, 0, 0.03) 20px
            );
        }

        .glow-effect {
            box-shadow: 0 0 30px rgba(255, 119, 0, 0.3);
        }

        .section-padding {
            padding: 100px 0;
        }

        @media (max-width: 768px) {
            .section-padding {
                padding: 60px 0;
            }
        }
    </style>
</head>
<body class="smooth-scroll" x-data="{
    mobileMenuOpen: false,
    activeTab: 'products',
    showQuoteModal: false
}">
    <!-- Header -->
    <header class="fixed top-0 w-full z-50 ami-secondary backdrop-blur-lg bg-opacity-90">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-ami-accent rounded-lg flex items-center justify-center mr-3">
                        <span class="font-bold text-white">AMI</span>
                    </div>
                    <span class="text-xl font-bold">Al Mohandes International</span>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#home" class="hover:text-ami-accent transition">Home</a>
                    <a href="#about" class="hover:text-ami-accent transition">About</a>
                    <a href="#solutions" class="hover:text-ami-accent transition">Solutions</a>
                    <a href="#manufacturing" class="hover:text-ami-accent transition">Manufacturing</a>
                    <a href="#global" class="hover:text-ami-accent transition">Global</a>
                    <a href="#contact" class="hover:text-ami-accent transition">Contact</a>
                </nav>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-white focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div x-show="mobileMenuOpen" x-transition class="md:hidden mt-4 pb-4">
                <div class="flex flex-col space-y-3">
                    <a href="#home" class="hover:text-ami-accent transition" @click="mobileMenuOpen = false">Home</a>
                    <a href="#about" class="hover:text-ami-accent transition" @click="mobileMenuOpen = false">About</a>
                    <a href="#solutions" class="hover:text-ami-accent transition" @click="mobileMenuOpen = false">Solutions</a>
                    <a href="#manufacturing" class="hover:text-ami-accent transition" @click="mobileMenuOpen = false">Manufacturing</a>
                    <a href="#global" class="hover:text-ami-accent transition" @click="mobileMenuOpen = false">Global</a>
                    <a href="#contact" class="hover:text-ami-accent transition" @click="mobileMenuOpen = false">Contact</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="min-h-screen flex items-center section-padding pt-24 diagonal-pattern">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Hero Content -->
                <div class="space-y-8">
                    <div class="space-y-4">
                        <p class="text-ami-accent font-medium tracking-wider">ESTABLISHED 1983</p>
                        <h1 class="text-4xl md:text-6xl font-bold leading-tight">
                            Engineering <span class="gradient-text">Power Solutions</span> for a Connected World
                        </h1>
                        <p class="text-xl text-ami-light max-w-xl">
                            Global leader in diesel generator technology, delivering reliable power solutions across industries and continents.
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <button @click="showQuoteModal = true" class="bg-ami-accent hover:bg-orange-600 text-white font-semibold py-4 px-8 rounded-lg transition transform hover:scale-105 glow-effect">
                            Get Instant Quote
                        </button>
                        <a href="#solutions" class="border-2 border-ami-accent text-ami-accent hover:bg-ami-accent hover:text-white font-semibold py-4 px-8 rounded-lg transition">
                            Explore Solutions
                        </a>
                    </div>

                    <div class="grid grid-cols-3 gap-6 pt-8">
                        <div>
                            <div class="text-3xl font-bold gradient-text">40+</div>
                            <div class="text-ami-light">Years Experience</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold gradient-text">50+</div>
                            <div class="text-ami-light">Countries</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold gradient-text">5000+</div>
                            <div class="text-ami-light">Projects</div>
                        </div>
                    </div>
                </div>

                <!-- Hero Image -->
                <div class="relative">
                    <div class="relative z-10">
                        <img src="https://images.unsplash.com/photo-1511454493857-0a29f2c023c7?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDZ8fGluZHVzdHJpZXN8ZW58MHwxfDB8fHww" alt="Power Generator" class="rounded-2xl shadow-2xl">
                    </div>
                    <div class="absolute -bottom-6 -right-6 w-64 h-64 bg-ami-accent rounded-full opacity-20 blur-3xl"></div>
                    <div class="absolute -top-6 -left-6 w-48 h-48 bg-ami-accent rounded-full opacity-20 blur-3xl"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section-padding ami-secondary">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- About Image -->
                <div class="relative order-2 lg:order-1">
                    <div class="relative z-10">
                        <img src="https://images.unsplash.com/photo-1613665813446-82a78c468a1d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80" alt="AMI Facility" class="rounded-2xl shadow-2xl">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-r from-ami-accent to-transparent opacity-10 rounded-2xl"></div>
                </div>

                <!-- About Content -->
                <div class="space-y-6 order-1 lg:order-2">
                    <div>
                        <p class="text-ami-accent font-medium tracking-wider mb-2">OUR LEGACY</p>
                        <h2 class="text-3xl md:text-4xl font-bold mb-4">Pioneering Power Since 1983</h2>
                        <div class="w-24 h-1 bg-ami-accent"></div>
                    </div>

                    <p class="text-ami-light text-lg">
                        For four decades, Al Mohandes International has been at the forefront of power generation innovation. From our humble beginnings as a local service provider to becoming a global manufacturing powerhouse, our journey is defined by engineering excellence and unwavering commitment to reliability.
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-ami-accent mt-1 mr-3 text-xl"></i>
                            <div>
                                <h4 class="font-semibold text-lg">Custom Engineering Solutions</h4>
                                <p class="text-ami-light">Tailored power systems designed for specific industrial requirements</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-ami-accent mt-1 mr-3 text-xl"></i>
                            <div>
                                <h4 class="font-semibold text-lg">Turnkey Project Expertise</h4>
                                <p class="text-ami-light">End-to-end project management from design to commissioning</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check-circle text-ami-accent mt-1 mr-3 text-xl"></i>
                            <div>
                                <h4 class="font-semibold text-lg">Global Service Network</h4>
                                <p class="text-ami-light">24/7 support across 50+ countries with local expertise</p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6">
                        <a href="#contact" class="inline-flex items-center text-ami-accent font-semibold hover:underline">
                            Learn More About Our History <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Solutions Section -->
    <section id="solutions" class="section-padding diagonal-pattern">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <p class="text-ami-accent font-medium tracking-wider mb-2">OUR SOLUTIONS</p>
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Comprehensive Power Solutions</h2>
                <div class="w-24 h-1 bg-ami-accent mx-auto"></div>
            </div>

            <!-- Tabs -->
            <div class="flex justify-center mb-12">
                <div class="bg-ami-secondary rounded-lg p-1 inline-flex">
                    <button @click="activeTab = 'products'" :class="activeTab === 'products' ? 'bg-ami-accent text-white' : 'text-ami-light'" class="px-6 py-3 rounded-md font-medium transition">
                        Products
                    </button>
                    <button @click="activeTab = 'services'" :class="activeTab === 'services' ? 'bg-ami-accent text-white' : 'text-ami-light'" class="px-6 py-3 rounded-md font-medium transition">
                        Services
                    </button>
                </div>
            </div>

            <!-- Products Tab -->
            <div x-show="activeTab === 'products'" x-transition class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Product Card 1 -->
                <div class="bg-ami-secondary rounded-xl overflow-hidden hover-lift tech-border">
                    <div class="h-48 bg-gradient-to-br from-ami-accent to-orange-600 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80" alt="Generator Sets" class="w-full h-full object-cover mix-blend-overlay">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Generator Sets</h3>
                        <p class="text-ami-light mb-4">High-performance diesel generators (10kVA - 4000kVA) for industrial and commercial applications.</p>
                        <a href="#" class="text-ami-accent font-medium hover:underline">View Specifications →</a>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="bg-ami-secondary rounded-xl overflow-hidden hover-lift tech-border">
                    <div class="h-48 bg-gradient-to-br from-ami-accent to-orange-600 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1613665813446-82a78c468a1d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80" alt="Control Systems" class="w-full h-full object-cover mix-blend-overlay">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Control Systems</h3>
                        <p class="text-ami-light mb-4">Advanced monitoring and control solutions for optimal generator performance and management.</p>
                        <a href="#" class="text-ami-accent font-medium hover:underline">View Specifications →</a>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="bg-ami-secondary rounded-xl overflow-hidden hover-lift tech-border">
                    <div class="h-48 bg-gradient-to-br from-ami-accent to-orange-600 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1581094271901-8022df4466f9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80" alt="Mobile Solutions" class="w-full h-full object-cover mix-blend-overlay">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Mobile Solutions</h3>
                        <p class="text-ami-light mb-4">Trailer-mounted generators and portable power solutions for rapid deployment.</p>
                        <a href="#" class="text-ami-accent font-medium hover:underline">View Specifications →</a>
                    </div>
                </div>
            </div>

            <!-- Services Tab -->
            <div x-show="activeTab === 'services'" x-transition class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Service 1 -->
                <div class="flex items-start space-x-6">
                    <div class="w-16 h-16 bg-ami-accent rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-cogs text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-2">Custom Engineering</h3>
                        <p class="text-ami-light">Bespoke power solutions designed to meet unique operational requirements and environmental challenges.</p>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="flex items-start space-x-6">
                    <div class="w-16 h-16 bg-ami-accent rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-tools text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-2">Maintenance Programs</h3>
                        <p class="text-ami-light">Comprehensive maintenance plans including preventive, predictive, and corrective services.</p>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="flex items-start space-x-6">
                    <div class="w-16 h-16 bg-ami-accent rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-graduation-cap text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-2">Training & Support</h3>
                        <p class="text-ami-light">Operator training programs and 24/7 technical support from certified engineers.</p>
                    </div>
                </div>

                <!-- Service 4 -->
                <div class="flex items-start space-x-6">
                    <div class="w-16 h-16 bg-ami-accent rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-box-open text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-2">Parts Supply</h3>
                        <p class="text-ami-light">Genuine spare parts inventory with global distribution network for quick availability.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Manufacturing Section -->
    <section id="manufacturing" class="section-padding ami-secondary">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Manufacturing Content -->
                <div class="space-y-6">
                    <div>
                        <p class="text-ami-accent font-medium tracking-wider mb-2">MANUFACTURING EXCELLENCE</p>
                        <h2 class="text-3xl md:text-4xl font-bold mb-4">State-of-the-Art Production</h2>
                        <div class="w-24 h-1 bg-ami-accent"></div>
                    </div>

                    <p class="text-ami-light text-lg">
                        Our vertically integrated manufacturing facilities represent the pinnacle of power generation technology. With complete control over the production process, we ensure uncompromising quality and innovation in every component.
                    </p>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-ami-dark p-6 rounded-xl">
                            <div class="text-3xl font-bold gradient-text mb-2">15,000m²</div>
                            <div class="text-ami-light">Production Facility</div>
                        </div>
                        <div class="bg-ami-dark p-6 rounded-xl">
                            <div class="text-3xl font-bold gradient-text mb-2">100%</div>
                            <div class="text-ami-light">Quality Control</div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h4 class="font-semibold text-lg">In-House Capabilities:</h4>
                        <div class="flex flex-wrap gap-3">
                            <span class="bg-ami-accent bg-opacity-20 text-ami-accent px-4 py-2 rounded-full text-sm font-medium">Storage Tanks</span>
                            <span class="bg-ami-accent bg-opacity-20 text-ami-accent px-4 py-2 rounded-full text-sm font-medium">Canopies</span>
                            <span class="bg-ami-accent bg-opacity-20 text-ami-accent px-4 py-2 rounded-full text-sm font-medium">Control Systems</span>
                            <span class="bg-ami-accent bg-opacity-20 text-ami-accent px-4 py-2 rounded-full text-sm font-medium">LV Panels</span>
                            <span class="bg-ami-accent bg-opacity-20 text-ami-accent px-4 py-2 rounded-full text-sm font-medium">Custom Fabrication</span>
                        </div>
                    </div>
                </div>

                <!-- Manufacturing Image -->
                <div class="relative">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-4">
                            <img src="https://cdn.pixabay.com/photo/2014/09/13/21/46/milling-444493_1280.jpg" alt="Manufacturing" class="rounded-xl shadow-lg">
                            <img src="https://images.unsplash.com/photo-1613665813446-82a78c468a1d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80" alt="Workshop" class="rounded-xl shadow-lg">
                        </div>
                        <div class="space-y-4">
                            <img src="https://cdn.pixabay.com/photo/2015/10/28/12/31/motor-1010495_1280.jpg" alt="Quality Control" class="rounded-xl shadow-lg mt-8">
                            <img src="https://images.pexels.com/photos/17816971/pexels-photo-17816971.jpeg" alt="Team" class="rounded-xl shadow-lg">
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-ami-accent rounded-full opacity-20 blur-3xl"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Global Reach Section -->
    <section id="global" class="section-padding diagonal-pattern">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <p class="text-ami-accent font-medium tracking-wider mb-2">GLOBAL PRESENCE</p>
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Powering the World</h2>
                <div class="w-24 h-1 bg-ami-accent mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Map Visualization -->
                <div class="relative">
                    <div class="bg-ami-secondary rounded-2xl p-8 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-ami-accent to-transparent opacity-10"></div>
                        <div class="relative z-10">
                            <div class="aspect-video bg-gradient-to-br from-ami-dark to-ami-secondary rounded-lg flex items-center justify-center">
                                <div class="text-center">
                                    <img src="https://cdn.pixabay.com/photo/2016/04/24/19/28/spain-1350439_1280.jpg" alt="Global Map" class="w-full h-full object-cover">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Global Stats -->
                <div class="space-y-8">
                    <div>
                        <h3 class="text-2xl font-bold mb-4">International Network</h3>
                        <p class="text-ami-light text-lg">
                            Our global footprint spans across continents, with strategic partnerships and service centers ensuring reliable power solutions wherever our clients operate.
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-ami-secondary p-6 rounded-xl">
                            <div class="text-4xl font-bold gradient-text mb-2">50+</div>
                            <div class="text-ami-light">Countries Served</div>
                        </div>
                        <div class="bg-ami-secondary p-6 rounded-xl">
                            <div class="text-4xl font-bold gradient-text mb-2">100+</div>
                            <div class="text-ami-light">Service Centers</div>
                        </div>
                        <div class="bg-ami-secondary p-6 rounded-xl">
                            <div class="text-4xl font-bold gradient-text mb-2">24/7</div>
                            <div class="text-ami-light">Global Support</div>
                        </div>
                        <div class="bg-ami-secondary p-6 rounded-xl">
                            <div class="text-4xl font-bold gradient-text mb-2">15+</div>
                            <div class="text-ami-light">Industry Sectors</div>
                        </div>
                    </div>

                    <div>
                        <h4 class="font-semibold text-lg mb-4">Key Regions:</h4>
                        <div class="flex flex-wrap gap-3">
                            <span class="bg-ami-accent bg-opacity-20 text-ami-accent px-4 py-2 rounded-full text-sm font-medium">Middle East</span>
                            <span class="bg-ami-accent bg-opacity-20 text-ami-accent px-4 py-2 rounded-full text-sm font-medium">Africa</span>
                            <span class="bg-ami-accent bg-opacity-20 text-ami-accent px-4 py-2 rounded-full text-sm font-medium">Asia</span>
                            <span class="bg-ami-accent bg-opacity-20 text-ami-accent px-4 py-2 rounded-full text-sm font-medium">Europe</span>
                            <span class="bg-ami-accent bg-opacity-20 text-ami-accent px-4 py-2 rounded-full text-sm font-medium">Americas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Case Studies Section -->
    <section class="section-padding ami-secondary">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <p class="text-ami-accent font-medium tracking-wider mb-2">PROJECT SHOWCASE</p>
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Success Stories</h2>
                <div class="w-24 h-1 bg-ami-accent mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Case Study 1 -->
                <div class="bg-ami-dark rounded-xl overflow-hidden hover-lift">
                    <div class="h-48 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1755377205428-ec47fcc8b9d2?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fGluZHVzdHJpZXN8ZW58MHwxfDB8fHww" alt="Mining Project" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-ami-dark to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="bg-ami-accent text-white px-3 py-1 rounded-full text-sm font-medium">Mining</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Desert Mining Operation</h3>
                        <p class="text-ami-light mb-4">Providing 24/7 power for remote mining operations in extreme desert conditions.</p>
                        <a href="#" class="text-ami-accent font-medium hover:underline">Read Case Study →</a>
                    </div>
                </div>

                <!-- Case Study 2 -->
                <div class="bg-ami-dark rounded-xl overflow-hidden hover-lift">
                    <div class="h-48 relative overflow-hidden">
                        <img src="https://cdn.pixabay.com/photo/2013/10/09/13/48/vehicle-193213_1280.jpg" alt="Hospital Backup" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-ami-dark to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="bg-ami-accent text-white px-3 py-1 rounded-full text-sm font-medium">Healthcare</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Hospital Critical Power</h3>
                        <p class="text-ami-light mb-4">Uninterruptible power solution for major hospital with zero tolerance for failure.</p>
                        <a href="#" class="text-ami-accent font-medium hover:underline">Read Case Study →</a>
                    </div>
                </div>

                <!-- Case Study 3 -->
                <div class="bg-ami-dark rounded-xl overflow-hidden hover-lift">
                    <div class="h-48 relative overflow-hidden">
                        <img src="https://cdn.pixabay.com/photo/2012/07/06/20/23/excavator-51665_1280.jpg" alt="Marine Project" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-ami-dark to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="bg-ami-accent text-white px-3 py-1 rounded-full text-sm font-medium">Marine</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Offshore Platform Power</h3>
                        <p class="text-ami-light mb-4">Corrosion-resistant generators for harsh marine environments.</p>
                        <a href="#" class="text-ami-accent font-medium hover:underline">Read Case Study →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section-padding diagonal-pattern">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-ami-secondary rounded-2xl p-8">
                    <h2 class="text-3xl font-bold mb-6">Get in Touch</h2>
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-ami-light mb-2">Name</label>
                                <input type="text" class="w-full bg-ami-dark border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-ami-accent transition">
                            </div>
                            <div>
                                <label class="block text-ami-light mb-2">Email</label>
                                <input type="email" class="w-full bg-ami-dark border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-ami-accent transition">
                            </div>
                        </div>

                        <div>
                            <label class="block text-ami-light mb-2">Phone</label>
                            <input type="tel" class="w-full bg-ami-dark border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-ami-accent transition">
                        </div>

                        <div>
                            <label class="block text-ami-light mb-2">Project Requirements</label>
                            <textarea rows="4" class="w-full bg-ami-dark border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-ami-accent transition"></textarea>
                        </div>

                        <button type="submit" class="w-full bg-ami-accent hover:bg-orange-600 text-white font-semibold py-4 rounded-lg transition transform hover:scale-105">
                            Send Message
                        </button>
                    </form>
                </div>

                <!-- Contact Info -->
                <div class="space-y-8">
                    <div>
                        <h2 class="text-3xl font-bold mb-6">Contact Information</h2>
                        <p class="text-ami-light text-lg">Reach out to our team for inquiries, technical support, or partnership opportunities.</p>
                    </div>

                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-ami-accent rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg">Headquarters</h4>
                                <p class="text-ami-light">123 Industrial Zone, Amman, Jordan</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-ami-accent rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg">Phone</h4>
                                <p class="text-ami-light">+962 6 123 4567</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-ami-accent rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg">Email</h4>
                                <p class="text-ami-light">info@almohandes-int.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-ami-secondary rounded-xl p-6">
                        <h4 class="font-semibold text-lg mb-4">Business Hours</h4>
                        <div class="space-y-2 text-ami-light">
                            <div class="flex justify-between">
                                <span>Monday - Friday</span>
                                <span>8:00 AM - 6:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Saturday</span>
                                <span>9:00 AM - 2:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Sunday</span>
                                <span>Closed</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-ami-dark border-t border-gray-800 py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-ami-accent rounded-lg flex items-center justify-center mr-3">
                            <span class="font-bold text-white">AMI</span>
                        </div>
                        <span class="text-xl font-bold">Al Mohandes International</span>
                    </div>
                    <p class="text-ami-light">Engineering excellence in power generation solutions since 1983.</p>
                </div>

                <div>
                    <h4 class="font-semibold text-lg mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-ami-light">
                        <li><a href="#home" class="hover:text-ami-accent transition">Home</a></li>
                        <li><a href="#about" class="hover:text-ami-accent transition">About Us</a></li>
                        <li><a href="#solutions" class="hover:text-ami-accent transition">Solutions</a></li>
                        <li><a href="#manufacturing" class="hover:text-ami-accent transition">Manufacturing</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold text-lg mb-4">Industries</h4>
                    <ul class="space-y-2 text-ami-light">
                        <li><a href="#" class="hover:text-ami-accent transition">Healthcare</a></li>
                        <li><a href="#" class="hover:text-ami-accent transition">Mining</a></li>
                        <li><a href="#" class="hover:text-ami-accent transition">Construction</a></li>
                        <li><a href="#" class="hover:text-ami-accent transition">Marine</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold text-lg mb-4">Connect</h4>
                    <div class="flex space-x-4 mb-4">
                        <a href="#" class="w-10 h-10 bg-ami-secondary rounded-lg flex items-center justify-center hover:bg-ami-accent transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-ami-secondary rounded-lg flex items-center justify-center hover:bg-ami-accent transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-ami-secondary rounded-lg flex items-center justify-center hover:bg-ami-accent transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-ami-secondary rounded-lg flex items-center justify-center hover:bg-ami-accent transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                    <p class="text-ami-light">Subscribe to our newsletter</p>
                    <div class="mt-2 flex">
                        <input type="email" placeholder="Your email" class="bg-ami-secondary border border-gray-700 rounded-l-lg px-4 py-2 text-white focus:outline-none focus:border-ami-accent transition flex-1">
                        <button class="bg-ami-accent hover:bg-orange-600 px-4 py-2 rounded-r-lg transition">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-ami-light">
                <p>&copy; 2023 Al Mohandes International. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Quote Modal -->
    <div x-show="showQuoteModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 p-4" @click.self="showQuoteModal = false">
        <div class="bg-ami-secondary rounded-2xl p-8 max-w-md w-full">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold">Request a Quote</h3>
                <button @click="showQuoteModal = false" class="text-ami-light hover:text-white">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <form class="space-y-4">
                <div>
                    <label class="block text-ami-light mb-2">Name</label>
                    <input type="text" class="w-full bg-ami-dark border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-ami-accent transition">
                </div>

                <div>
                    <label class="block text-ami-light mb-2">Email</label>
                    <input type="email" class="w-full bg-ami-dark border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-ami-accent transition">
                </div>

                <div>
                    <label class="block text-ami-light mb-2">Power Requirement (kVA)</label>
                    <input type="text" class="w-full bg-ami-dark border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-ami-accent transition">
                </div>

                <div>
                    <label class="block text-ami-light mb-2">Application</label>
                    <select class="w-full bg-ami-dark border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-ami-accent transition">
                        <option>Industrial</option>
                        <option>Commercial</option>
                        <option>Healthcare</option>
                        <option>Marine</option>
                        <option>Other</option>
                    </select>
                </div>

                <button type="submit" class="w-full bg-ami-accent hover:bg-orange-600 text-white font-semibold py-3 rounded-lg transition">
                    Submit Request
                </button>
            </form>
        </div>
    </div>

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

        // Form submission handlers
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Thank you for your inquiry. We will contact you soon!');
                this.reset();
                if (window.showQuoteModal) {
                    window.showQuoteModal = false;
                }
            });
        });
    </script>
</body>
</html>
