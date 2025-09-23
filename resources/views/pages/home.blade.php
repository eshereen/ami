@extends('layouts.app')
@section('content')

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
 @if ($products->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($products->take(6) as $product)
                <!-- Generator Sets -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover-lift">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('imgs/products/G1.png') }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">

                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 ami-blue">{{ $product->name }}</h3>
                        @if($product->description)
                        <p class="text-gray-600 mb-4">{{ $product->description }}</p>
                        @endif
                        <a href="{{ route('product.show', $product->slug) }}" class="text-ami-orange font-medium hover:underline">Learn More <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
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
                    <div class="w-16 h-16 bg-ami-blue hover:bg-ami-orange transition-all duration-300 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-cogs text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 ami-blue">Custom Solutions</h3>
                    <p class="text-gray-600">Tailored power solutions designed to meet specific requirements and challenging environments.</p>
                </div>

                <!-- Maintenance -->
                <div class="bg-white rounded-lg p-8 text-center hover-lift">
                    <div class="w-16 h-16 bg-ami-blue hover:bg-ami-orange transition-all duration-300 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-tools text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 ami-blue">Maintenance</h3>
                    <p class="text-gray-600">Preventive and corrective maintenance services to ensure optimal performance and longevity.</p>
                </div>

                <!-- Spare Parts -->
                <div class="bg-white rounded-lg p-8 text-center hover-lift">
                    <div class="w-16 h-16 bg-ami-blue hover:bg-ami-orange transition-all duration-300 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-box-open text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 ami-blue">Spare Parts</h3>
                    <p class="text-gray-600">Genuine spare parts and components for all our products to maintain reliability and performance.</p>
                </div>

                <!-- Technical Support -->
                <div class="bg-white rounded-lg p-8 text-center hover-lift">
                    <div class="w-16 h-16 bg-ami-blue hover:bg-ami-orange transition-all duration-300 rounded-full flex items-center justify-center mx-auto mb-4">
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
                <h2 class="text-3xl md:text-4xl font-bold text- mb-4">Global Reach & Partnerships</h2>
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
                        <div class="bg-gray-100 rounded-lg p-4 flex items-center justify-center h-auto">
                            <img src="{{ asset('imgs/avk.png') }}" alt="avk" class="w-full h-full object-cover">
                        </div>
                            <div class="bg-gray-100 rounded-lg p-4 flex items-center justify-center h-auto">
                            <img src="{{ asset('imgs/detuz.png') }}" alt="detus" class="w-full h-full object-cover">
                        </div>
                        <div class="bg-gray-100 rounded-lg p-4 flex items-center justify-center h-auto">
                            <img src="{{ asset('imgs/doosan.png') }}" alt="doosan" class="w-full h-full object-cover">
                        </div>
                        <div class="bg-gray-100 rounded-lg p-4 flex items-center justify-center h-auto">
                            <img src="{{ asset('imgs/iveco.png') }}" alt="iveco" class="w-full h-full object-cover">
                        </div>
                        <div class="bg-gray-100 rounded-lg p-4 flex items-center justify-center h-auto">
                            <img src="{{ asset('imgs/marathon.png') }}" alt="marathon" class="w-full h-full object-cover">
                        </div>
                        <div class="bg-gray-100 rounded-lg p-4 flex items-center justify-center h-auto">
                            <img src="{{ asset('imgs/volvo.png') }}" alt="volvo" class="w-full h-full object-cover">
                        </div>
                        <div class="bg-gray-100 rounded-lg p-4 flex items-center justify-center h-auto">
                            <img src="{{ asset('imgs/mtu.png') }}" alt="mtu" class="w-full h-full object-cover">
                        </div>
                        <div class="bg-gray-100 rounded-lg p-4 flex items-center justify-center h-auto">
                            <img src="{{ asset('imgs/stamford.png') }}" alt="stamford" class="w-full h-full object-cover">
                        </div>
                        <div class="bg-gray-100 rounded-lg p-4 flex items-center justify-center h-20">
                            <img src="{{ asset('imgs/perkins.png') }}" alt="perkins" class="w-full h-full object-cover">
                        </div>
                        <div class="bg-gray-100 rounded-lg p-4 flex items-center justify-center h-20">
                            <img src="{{ asset('imgs/mecc-alta.png') }}" alt="meccalte" class="w-full h-full object-cover">
                        </div>
                        <div class="bg-gray-100 rounded-lg p-4 flex items-center justify-center h-auto">
                            <img src="{{ asset('imgs/leroysomer.png') }}" alt="leroysomer" class="w-full h-full object-cover">
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
                    <form method="post" action="{{ route('contact.store') }}" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-ami-blue focus:border-transparent">
                        </div>

                        <div>
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-ami-blue focus:border-transparent">
                        </div>

                        <div>
                            <label for="phone" class="block text-gray-700 font-medium mb-2">Phone</label>
                            <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-ami-blue focus:border-transparent">
                        </div>

                        <div>
                            <label for="message" class="block text-gray-700 font-medium mb-2">Your Message</label>
                            <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-ami-blue focus:border-transparent"></textarea>
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
                            <div class="w-12 h-12 bg-ami-blue hover:bg-ami-orange transition-all duration-300 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-1">Headquarters</h4>
                                <p class="text-gray-600">123 Industrial Area, Amman, Jordan</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-ami-blue hover:bg-ami-orange transition-all duration-300 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-phone text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-1">Phone</h4>
                                <p class="text-gray-600">+962 6 123 4567</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-ami-blue hover:bg-ami-orange transition-all duration-300 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-envelope text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-1">Email</h4>
                                <p class="text-gray-600">info@almohandes-int.com</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-ami-blue hover:bg-ami-orange transition-all duration-300 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-clock text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-1">Business Hours</h4>
                                <p class="text-gray-600">Monday - Friday: 8:00 AM - 6:00 PM</p>
                                <p class="text-gray-600">Saturday: 9:00 AM - 2:00 PM</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-200 hover:bg-gray-300 transition-all duration-300 rounded-lg h-64 flex items-center justify-center">
                        <div class="relative w-full h-full">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13830.033018943786!2d30.923326!3d29.936056000000004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14585539d61dafb7%3A0x5b0f7c23fd598347!2zQWwgTW9oYW5kZXMgSW50ZXJuYXRpb25hbCAtINin2YTZhdmH2YbYr9izINin2YTYr9mI2YTZitipINmE2YTZhdmI2YTYr9in2Ko!5e0!3m2!1sen!2seg!4v1758542923568!5m2!1sen!2seg" width="730" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
