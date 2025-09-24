@extends('layouts.app')
@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
             alt="Page Not Found"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-red-900/80 to-red-700/60 flex items-center">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-6xl md:text-8xl font-bold text-white mb-4 fade-in">404</h1>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 fade-in">Page Not Found</h2>
                <p class="text-xl text-red-100 max-w-2xl mx-auto fade-in">The page you're looking for doesn't exist or has been moved.</p>
            </div>
        </div>
    </section>

    <!-- Error Content -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                    <div class="mb-8">
                        <div class="w-32 h-32 mx-auto mb-6 bg-red-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-exclamation-triangle text-6xl text-red-500"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Oops! Something went wrong</h3>
                        <p class="text-gray-600 mb-6">
                            The page you're looking for might have been removed, had its name changed, or is temporarily unavailable.
                        </p>
                    </div>

                    <!-- Quick Links -->
                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <a href="{{ route('home') }}" class="group bg-gray-50 hover:bg-ami-orange rounded-lg p-6 transition-all duration-300">
                            <div class="text-center">
                                <i class="fas fa-home text-3xl text-gray-400 group-hover:text-white mb-3"></i>
                                <h4 class="font-semibold text-gray-900 group-hover:text-white">Home</h4>
                                <p class="text-sm text-gray-600 group-hover:text-white">Back to homepage</p>
                            </div>
                        </a>

                        <a href="{{ route('products.index') }}" class="group bg-gray-50 hover:bg-ami-orange rounded-lg p-6 transition-all duration-300">
                            <div class="text-center">
                                <i class="fas fa-cogs text-3xl text-gray-400 group-hover:text-white mb-3"></i>
                                <h4 class="font-semibold text-gray-900 group-hover:text-white">Products</h4>
                                <p class="text-sm text-gray-600 group-hover:text-white">Browse our products</p>
                            </div>
                        </a>

                        <a href="{{ route('services.index') }}" class="group bg-gray-50 hover:bg-ami-orange rounded-lg p-6 transition-all duration-300">
                            <div class="text-center">
                                <i class="fas fa-tools text-3xl text-gray-400 group-hover:text-white mb-3"></i>
                                <h4 class="font-semibold text-gray-900 group-hover:text-white">Services</h4>
                                <p class="text-sm text-gray-600 group-hover:text-white">Our services</p>
                            </div>
                        </a>

                        <a href="{{ route('contact.index') }}" class="group bg-gray-50 hover:bg-ami-orange rounded-lg p-6 transition-all duration-300">
                            <div class="text-center">
                                <i class="fas fa-envelope text-3xl text-gray-400 group-hover:text-white mb-3"></i>
                                <h4 class="font-semibold text-gray-900 group-hover:text-white">Contact</h4>
                                <p class="text-sm text-gray-600 group-hover:text-white">Get in touch</p>
                            </div>
                        </a>
                    </div>

                    <!-- Search Box -->
                    <div class="bg-gray-50 rounded-lg p-6 mb-8">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Looking for something specific?</h4>
                        <div class="max-w-md mx-auto">
                            <form action="{{ route('products.index') }}" method="GET" class="flex gap-2">
                                <input type="text" name="search" placeholder="Search products..."
                                       class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-ami-orange focus:border-transparent">
                                <button type="submit" class="bg-ami-orange text-white px-6 py-2 rounded-lg hover:bg-orange-600 transition">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Help Section -->
                <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Need Help?</h3>
                    <p class="text-gray-600 mb-6">
                        If you continue to experience issues, please contact our support team.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('contact.index') }}" class="bg-ami-orange text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                            Contact Support
                        </a>
                        <a href="tel:+15551234567" class="bg-transparent border-2 border-ami-orange text-ami-orange px-6 py-3 rounded-lg font-semibold hover:bg-ami-orange hover:text-white transition">
                            <i class="fas fa-phone mr-2"></i>Call Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
