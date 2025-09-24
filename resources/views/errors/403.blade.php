@extends('layouts.app')
@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
             alt="Access Forbidden"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-yellow-900/80 to-yellow-700/60 flex items-center">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-6xl md:text-8xl font-bold text-white mb-4 fade-in">403</h1>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 fade-in">Access Forbidden</h2>
                <p class="text-xl text-yellow-100 max-w-2xl mx-auto fade-in">You don't have permission to access this resource.</p>
            </div>
        </div>
    </section>

    <!-- Error Content -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                    <div class="mb-8">
                        <div class="w-32 h-32 mx-auto mb-6 bg-yellow-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-lock text-6xl text-yellow-500"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Access Denied</h3>
                        <p class="text-gray-600 mb-6">
                            You don't have the necessary permissions to view this page. This could be due to insufficient privileges or the resource being restricted.
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

                        <a href="{{ route('about') }}" class="group bg-gray-50 hover:bg-ami-orange rounded-lg p-6 transition-all duration-300">
                            <div class="text-center">
                                <i class="fas fa-info-circle text-3xl text-gray-400 group-hover:text-white mb-3"></i>
                                <h4 class="font-semibold text-gray-900 group-hover:text-white">About</h4>
                                <p class="text-sm text-gray-600 group-hover:text-white">Learn about us</p>
                            </div>
                        </a>
                    </div>

                    <!-- Authentication Section -->
                    <div class="bg-yellow-50 rounded-lg p-6 mb-8">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Need Access?</h4>
                        <p class="text-gray-600 mb-4">
                            If you believe you should have access to this page, please check your login status or contact an administrator.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="{{ route('login') }}" class="bg-ami-orange text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                                <i class="fas fa-sign-in-alt mr-2"></i>Login
                            </a>
                            <a href="{{ route('register') }}" class="bg-transparent border-2 border-ami-orange text-ami-orange px-6 py-3 rounded-lg font-semibold hover:bg-ami-orange hover:text-white transition">
                                <i class="fas fa-user-plus mr-2"></i>Register
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Help Section -->
                <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Still Having Issues?</h3>
                    <p class="text-gray-600 mb-6">
                        If you continue to experience access issues, please contact our support team for assistance.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('contact.index') }}" class="bg-ami-orange text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                            Contact Support
                        </a>
                        <a href="mailto:support@ami.com" class="bg-transparent border-2 border-ami-orange text-ami-orange px-6 py-3 rounded-lg font-semibold hover:bg-ami-orange hover:text-white transition">
                            <i class="fas fa-envelope mr-2"></i>Email Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
