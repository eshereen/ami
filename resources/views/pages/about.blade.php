@extends('layouts.app')
@section('content')
    <!-- Hero Section with Large Image -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
             alt="About AMI"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-blue-700/60 flex items-center">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 fade-in">About AMI</h1>
                <p class="text-xl text-blue-100 max-w-2xl fade-in">Four decades of excellence in power generation solutions</p>
            </div>
        </div>
    </section>

    <!-- Company Introduction -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold ami-blue mb-4">Our Story</h2>
                <div class="w-24 h-1 bg-ami-orange mx-auto"></div>
                <p class="mt-4 text-gray-600 max-w-3xl mx-auto">
                    Since 1983, Al Mohandes International (AMI) has been at the forefront of power generation technology,
                    providing reliable solutions to industries worldwide. Our commitment to excellence and innovation has
                    made us a trusted partner in the power generation sector.
                </p>
            </div>
        </div>
    </section>

    <!-- Company History Timeline -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold ami-blue mb-4">Our Journey</h2>
                <div class="w-24 h-1 bg-ami-orange mx-auto"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Four decades of growth, innovation, and excellence</p>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="space-y-8">
                    <!-- Timeline Item 1 -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-16 h-16 bg-ami-blue text-white rounded-full flex items-center justify-center font-bold text-lg">1983</div>
                        <div class="ml-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Company Founded</h3>
                            <p class="text-gray-600">AMI was established with a vision to provide reliable power generation solutions to industries across the region.</p>
                        </div>
                    </div>

                    <!-- Timeline Item 2 -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-16 h-16 bg-ami-blue text-white rounded-full flex items-center justify-center font-bold text-lg">1995</div>
                        <div class="ml-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Regional Expansion</h3>
                            <p class="text-gray-600">Expanded operations across multiple countries, establishing partnerships with leading manufacturers.</p>
                        </div>
                    </div>

                    <!-- Timeline Item 3 -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-16 h-16 bg-ami-blue text-white rounded-full flex items-center justify-center font-bold text-lg">2005</div>
                        <div class="ml-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Service Excellence</h3>
                            <p class="text-gray-600">Launched comprehensive maintenance and support services, becoming a full-service power solutions provider.</p>
                        </div>
                    </div>

                    <!-- Timeline Item 4 -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-16 h-16 bg-ami-blue text-white rounded-full flex items-center justify-center font-bold text-lg">2015</div>
                        <div class="ml-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Innovation Focus</h3>
                            <p class="text-gray-600">Invested heavily in renewable energy solutions and smart power management systems.</p>
                        </div>
                    </div>

                    <!-- Timeline Item 5 -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-16 h-16 bg-ami-orange text-white rounded-full flex items-center justify-center font-bold text-lg">2023</div>
                        <div class="ml-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">40 Years Strong</h3>
                            <p class="text-gray-600">Celebrating four decades of excellence with continued commitment to innovation and customer satisfaction.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission, Vision, Values -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Our Foundation</h2>
                <div class="w-24 h-1 bg-ami-orange mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Mission -->
                <div class="text-center text-white">
                    <div class="bg-white/20 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-bullseye text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Our Mission</h3>
                    <p class="text-blue-100">To provide reliable, efficient, and innovative power generation solutions that empower industries to achieve their goals while maintaining the highest standards of quality and service.</p>
                </div>

                <!-- Vision -->
                <div class="text-center text-white">
                    <div class="bg-white/20 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-eye text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Our Vision</h3>
                    <p class="text-blue-100">To be the leading provider of power generation solutions in the region, recognized for our innovation, reliability, and commitment to sustainable energy practices.</p>
                </div>

                <!-- Values -->
                <div class="text-center text-white">
                    <div class="bg-white/20 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-heart text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Our Values</h3>
                    <p class="text-blue-100">Integrity, innovation, excellence, and customer satisfaction are the core values that guide everything we do, ensuring long-term partnerships and mutual success.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team & Expertise -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold ami-blue mb-4">Our Expertise</h2>
                <div class="w-24 h-1 bg-ami-orange mx-auto"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Meet the experts behind AMI's success</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="bg-ami-blue text-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Expert Team</h3>
                    <p class="text-gray-600">Certified engineers and technicians with decades of experience</p>
                </div>

                <div class="text-center">
                    <div class="bg-ami-blue text-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-certificate text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Certified Solutions</h3>
                    <p class="text-gray-600">ISO certified processes and quality management systems</p>
                </div>

                <div class="text-center">
                    <div class="bg-ami-blue text-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-globe text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Global Reach</h3>
                    <p class="text-gray-600">Serving customers across multiple countries and regions</p>
                </div>

                <div class="text-center">
                    <div class="bg-ami-blue text-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-lightbulb text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Innovation</h3>
                    <p class="text-gray-600">Continuous investment in new technologies and solutions</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold ami-blue mb-4">By the Numbers</h2>
                <div class="w-24 h-1 bg-ami-orange mx-auto"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Our achievements speak for themselves</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-bold text-ami-blue mb-2">40+</div>
                    <div class="text-xl text-gray-600 mb-2">Years Experience</div>
                    <p class="text-gray-500">Four decades of industry expertise</p>
                </div>

                <div class="text-center">
                    <div class="text-4xl font-bold text-ami-blue mb-2">500+</div>
                    <div class="text-xl text-gray-600 mb-2">Projects Completed</div>
                    <p class="text-gray-500">Successful installations worldwide</p>
                </div>

                <div class="text-center">
                    <div class="text-4xl font-bold text-ami-blue mb-2">50+</div>
                    <div class="text-xl text-gray-600 mb-2">Countries Served</div>
                    <p class="text-gray-500">Global presence and reach</p>
                </div>

                <div class="text-center">
                    <div class="text-4xl font-bold text-ami-blue mb-2">24/7</div>
                    <div class="text-xl text-gray-600 mb-2">Support Available</div>
                    <p class="text-gray-500">Round-the-clock technical assistance</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Certifications & Partnerships -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold ami-blue mb-4">Certifications & Partnerships</h2>
                <div class="w-24 h-1 bg-ami-orange mx-auto"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Recognized excellence and trusted partnerships</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="bg-white rounded-lg shadow-lg p-6 h-32 flex items-center justify-center">
                        <div class="text-gray-400">
                            <i class="fas fa-certificate text-4xl mb-2"></i>
                            <p class="text-sm">ISO 9001</p>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <div class="bg-white rounded-lg shadow-lg p-6 h-32 flex items-center justify-center">
                        <div class="text-gray-400">
                            <i class="fas fa-shield-alt text-4xl mb-2"></i>
                            <p class="text-sm">ISO 14001</p>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <div class="bg-white rounded-lg shadow-lg p-6 h-32 flex items-center justify-center">
                        <div class="text-gray-400">
                            <i class="fas fa-handshake text-4xl mb-2"></i>
                            <p class="text-sm">Authorized Partner</p>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <div class="bg-white rounded-lg shadow-lg p-6 h-32 flex items-center justify-center">
                        <div class="text-gray-400">
                            <i class="fas fa-award text-4xl mb-2"></i>
                            <p class="text-sm">Industry Award</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-gradient-to-r from-ami-orange to-orange-600">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Work With Us?</h2>
            <p class="text-xl text-orange-100 mb-8 max-w-2xl mx-auto">Join hundreds of satisfied customers who trust AMI for their power generation needs.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact.index') }}" class="bg-white text-ami-orange px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Get In Touch
                </a>
                <a href="{{ route('products.index') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-ami-orange transition">
                    Explore Products
                </a>
            </div>
        </div>
    </section>
@endsection
