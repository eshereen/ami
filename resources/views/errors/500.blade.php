@extends('layouts.app')
@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
             alt="Server Error"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-purple-900/80 to-purple-700/60 flex items-center">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-6xl md:text-8xl font-bold text-white mb-4 fade-in">500</h1>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 fade-in">Server Error</h2>
                <p class="text-xl text-purple-100 max-w-2xl mx-auto fade-in">Something went wrong on our end. We're working to fix it.</p>
            </div>
        </div>
    </section>

    <!-- Error Content -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                    <div class="mb-8">
                        <div class="w-32 h-32 mx-auto mb-6 bg-purple-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-server text-6xl text-purple-500"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Internal Server Error</h3>
                        <p class="text-gray-600 mb-6">
                            We're experiencing technical difficulties. Our team has been notified and is working to resolve the issue as quickly as possible.
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

                        <a href="{{ route('blog.index') }}" class="group bg-gray-50 hover:bg-ami-orange rounded-lg p-6 transition-all duration-300">
                            <div class="text-center">
                                <i class="fas fa-blog text-3xl text-gray-400 group-hover:text-white mb-3"></i>
                                <h4 class="font-semibold text-gray-900 group-hover:text-white">Blog</h4>
                                <p class="text-sm text-gray-600 group-hover:text-white">Read our blog</p>
                            </div>
                        </a>
                    </div>

                    <!-- Status Section -->
                    <div class="bg-purple-50 rounded-lg p-6 mb-8">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">What's Happening?</h4>
                        <p class="text-gray-600 mb-4">
                            Our servers are experiencing technical difficulties. This is usually temporary and should be resolved shortly.
                        </p>
                        <div class="flex items-center justify-center space-x-4 text-sm text-gray-600">
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                                <span>Monitoring Active</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></div>
                                <span>Team Notified</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-blue-500 rounded-full mr-2"></div>
                                <span>Working on Fix</span>
                            </div>
                        </div>
                    </div>

                    <!-- Retry Section -->
                    <div class="bg-gray-50 rounded-lg p-6 mb-8">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Try Again</h4>
                        <p class="text-gray-600 mb-4">
                            Sometimes refreshing the page or trying again in a few minutes resolves the issue.
                        </p>
                        <button onclick="window.location.reload()" class="bg-ami-orange text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                            <i class="fas fa-redo mr-2"></i>Refresh Page
                        </button>
                    </div>
                </div>

                <!-- Help Section -->
                <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Still Having Problems?</h3>
                    <p class="text-gray-600 mb-6">
                        If the problem persists, please contact our technical support team with details about what you were trying to do.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('contact.index') }}" class="bg-ami-orange text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                            Contact Technical Support
                        </a>
                        <a href="mailto:tech@ami.com" class="bg-transparent border-2 border-ami-orange text-ami-orange px-6 py-3 rounded-lg font-semibold hover:bg-ami-orange hover:text-white transition">
                            <i class="fas fa-envelope mr-2"></i>Email Tech Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
