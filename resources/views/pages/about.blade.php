@extends('layouts.app')
@section('content')

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Additional mobile menu fix for about page
    const mobileToggle = document.querySelector('[data-mobile-toggle]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');

    if (mobileToggle && mobileMenu) {
        console.log('Mobile menu elements found on about page');

        // Ensure click handler is working
        mobileToggle.addEventListener('click', function(e) {
            console.log('Mobile toggle clicked on about page');
            e.preventDefault();

            // Force toggle the menu
            if (mobileMenu.style.display === 'none' || !mobileMenu.style.display) {
                mobileMenu.style.display = 'block';
                mobileMenu.classList.add('show');
            } else {
                mobileMenu.style.display = 'none';
                mobileMenu.classList.remove('show');
            }
        });
    } else {
        console.error('Mobile menu elements not found on about page');
    }
});
</script>
@endpush
    <!-- Hero Section with Large Image -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
             alt="About AMI"
             class="object-cover w-full h-full">
        <div class="flex absolute inset-0 items-center bg-gradient-to-r from-blue-900/80 to-blue-700/60">
            <div class="container px-4 mx-auto">
                <h1 class="mb-4 text-4xl font-bold text-white md:text-5xl fade-in">About AMI</h1>
                <p class="max-w-2xl text-xl text-blue-100 fade-in">Four decades of excellence in power generation solutions</p>
            </div>
        </div>
    </section>

    <!-- Company Introduction -->
    <section class="py-16 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue">Our Story</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
                <p class="mx-auto mt-4 max-w-3xl text-gray-600">
                    Founded in 1983, Al Mohandes International (AMI) is a leading diesel generator manufacturer in Egypt, providing integrated power solutions to global markets. We specialize in designing and manufacturing gensets, backup power systems, and custom electrical solutions for industrial, commercial, and marine applications.
                </p>
                <p class="mx-auto mt-4 max-w-3xl text-gray-600">
                With a proven reputation for reliability, performance, and durability, our diesel gensets are engineered to meet the highest international standards. We also provide generator accessories, including canopies, fuel tanks, and control systems, ensuring complete and efficient power generation solutions.
                </p>
                <p class="mx-auto mt-4 max-w-3xl text-gray-600">
                    At AMI, we combine technical expertise, quality engineering, and a customer-focused approach to deliver sustainable energy solutions and unmatched after-sales service. Our mission is to ensure reliable energy supply for businesses, industries, and communities worldwide.
                </p>
            </div>
        </div>
    </section>

    <!-- Company History Timeline -->
    <section class="py-16">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue">Our Journey</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
                <p class="mx-auto mt-4 max-w-2xl text-gray-600">Four decades of growth, innovation, and excellence</p>
            </div>

            <div class="mx-auto max-w-4xl">
                <div class="space-y-8">
                    <!-- Timeline Item 1 -->
                    <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">1983</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">Company Founded</h3>
                            <p class="text-gray-600">AMI was established with a vision to provide reliable power generation solutions to industries across the region.</p>
                        </div>
                    </div>

                    <!-- Timeline Item 2 -->
                    <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">1995</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">Regional Expansion</h3>
                            <p class="text-gray-600">Expanded operations across multiple countries, establishing partnerships with leading manufacturers.</p>
                        </div>
                    </div>

                    <!-- Timeline Item 3 -->
                    <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">2005</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">Service Excellence</h3>
                            <p class="text-gray-600">Launched comprehensive maintenance and support services, becoming a full-service power solutions provider.</p>
                        </div>
                    </div>

                    <!-- Timeline Item 4 -->
                    <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">2015</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">Innovation Focus</h3>
                            <p class="text-gray-600">Invested heavily in renewable energy solutions and smart power management systems.</p>
                        </div>
                    </div>

                    <!-- Timeline Item 5 -->
                    <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-orange">2025</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">40 Years Strong</h3>
                            <p class="text-gray-600">Celebrating four decades of excellence with continued commitment to innovation and customer satisfaction.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission, Vision, Values
        {{--
    <section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold text-white md:text-4xl">Our Foundation</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <!-- Mission -->
                <div class="text-center text-white">
                    <div class="flex justify-center items-center mx-auto mb-6 w-20 h-20 rounded-full bg-white/20">
                        <i class="text-3xl fas fa-bullseye"></i>
                    </div>
                    <h3 class="mb-4 text-2xl font-bold">Our Mission</h3>
                    <p class="text-blue-100">To provide reliable, efficient, and innovative power generation solutions that empower industries to achieve their goals while maintaining the highest standards of quality and service.</p>
                </div>

                <!-- Vision -->
                <div class="text-center text-white">
                    <div class="flex justify-center items-center mx-auto mb-6 w-20 h-20 rounded-full bg-white/20">
                        <i class="text-3xl fas fa-eye"></i>
                    </div>
                    <h3 class="mb-4 text-2xl font-bold">Our Vision</h3>
                    <p class="text-blue-100">To be the leading provider of power generation solutions in the region, recognized for our innovation, reliability, and commitment to sustainable energy practices.</p>
                </div>

                <!-- Values -->
                <div class="text-center text-white">
                    <div class="flex justify-center items-center mx-auto mb-6 w-20 h-20 rounded-full bg-white/20">
                        <i class="text-3xl fas fa-heart"></i>
                    </div>
                    <h3 class="mb-4 text-2xl font-bold">Our Values</h3>
                    <p class="text-blue-100">Integrity, innovation, excellence, and customer satisfaction are the core values that guide everything we do, ensuring long-term partnerships and mutual success.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team & Expertise -->
    <section class="py-16 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue">Our Expertise</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
                <p class="mx-auto mt-4 max-w-2xl text-gray-600">Meet the experts behind AMI's success</p>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                <div class="text-center">
                    <div class="flex justify-center items-center mx-auto mb-4 w-20 h-20 text-white rounded-full bg-ami-blue">
                        <i class="text-3xl fas fa-users"></i>
                    </div>
                    <h3 class="mb-2 text-xl font-bold text-gray-900">Expert Team</h3>
                    <p class="text-gray-600">Certified engineers and technicians with decades of experience</p>
                </div>

                <div class="text-center">
                    <div class="flex justify-center items-center mx-auto mb-4 w-20 h-20 text-white rounded-full bg-ami-blue">
                        <i class="text-3xl fas fa-certificate"></i>
                    </div>
                    <h3 class="mb-2 text-xl font-bold text-gray-900">Certified Solutions</h3>
                    <p class="text-gray-600">ISO certified processes and quality management systems</p>
                </div>

                <div class="text-center">
                    <div class="flex justify-center items-center mx-auto mb-4 w-20 h-20 text-white rounded-full bg-ami-blue">
                        <i class="text-3xl fas fa-globe"></i>
                    </div>
                    <h3 class="mb-2 text-xl font-bold text-gray-900">Global Reach</h3>
                    <p class="text-gray-600">Serving customers across multiple countries and regions</p>
                </div>

                <div class="text-center">
                    <div class="flex justify-center items-center mx-auto mb-4 w-20 h-20 text-white rounded-full bg-ami-blue">
                        <i class="text-3xl fas fa-lightbulb"></i>
                    </div>
                    <h3 class="mb-2 text-xl font-bold text-gray-900">Innovation</h3>
                    <p class="text-gray-600">Continuous investment in new technologies and solutions</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics -->
    <section class="py-16 bg-white">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue">By the Numbers</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
                <p class="mx-auto mt-4 max-w-2xl text-gray-600">Our achievements speak for themselves</p>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                <div class="text-center">
                    <div class="mb-2 text-4xl font-bold text-ami-blue">40+</div>
                    <div class="mb-2 text-xl text-gray-600">Years Experience</div>
                    <p class="text-gray-500">Four decades of industry expertise</p>
                </div>

                <div class="text-center">
                    <div class="mb-2 text-4xl font-bold text-ami-blue">500+</div>
                    <div class="mb-2 text-xl text-gray-600">Projects Completed</div>
                    <p class="text-gray-500">Successful installations worldwide</p>
                </div>

                <div class="text-center">
                    <div class="mb-2 text-4xl font-bold text-ami-blue">50+</div>
                    <div class="mb-2 text-xl text-gray-600">Countries Served</div>
                    <p class="text-gray-500">Global presence and reach</p>
                </div>

                <div class="text-center">
                    <div class="mb-2 text-4xl font-bold text-ami-blue">24/7</div>
                    <div class="mb-2 text-xl text-gray-600">Support Available</div>
                    <p class="text-gray-500">Round-the-clock technical assistance</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Certifications & Partnerships -->
    <section class="py-16 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue">Certifications & Partnerships</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
                <p class="mx-auto mt-4 max-w-2xl text-gray-600">Recognized excellence and trusted partnerships</p>
            </div>

            <div class="grid grid-cols-2 gap-8 md:grid-cols-4">
                <div class="text-center">
                    <div class="flex justify-center items-center p-6 h-32 bg-white rounded-lg shadow-lg">
                        <div class="text-gray-400">
                            <i class="mb-2 text-4xl fas fa-certificate"></i>
                            <p class="text-sm">ISO 9001</p>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <div class="flex justify-center items-center p-6 h-32 bg-white rounded-lg shadow-lg">
                        <div class="text-gray-400">
                            <i class="mb-2 text-4xl fas fa-shield-alt"></i>
                            <p class="text-sm">ISO 14001</p>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <div class="flex justify-center items-center p-6 h-32 bg-white rounded-lg shadow-lg">
                        <div class="text-gray-400">
                            <i class="mb-2 text-4xl fas fa-handshake"></i>
                            <p class="text-sm">Authorized Partner</p>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <div class="flex justify-center items-center p-6 h-32 bg-white rounded-lg shadow-lg">
                        <div class="text-gray-400">
                            <i class="mb-2 text-4xl fas fa-award"></i>
                            <p class="text-sm">Industry Award</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  --}}
@include('layouts.call-to-action')

@endsection
