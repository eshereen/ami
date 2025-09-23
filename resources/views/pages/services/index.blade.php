@extends('layouts.app')
@section('content')
    <!-- Hero Section with Large Image -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
             alt="Our Services"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-blue-700/60 flex items-center">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 fade-in">Our Services</h1>
                <p class="text-xl text-blue-100 max-w-2xl fade-in">Comprehensive power solutions and maintenance services for industrial excellence</p>
            </div>
        </div>
    </section>

    <!-- Services Introduction -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold ami-blue mb-4">Professional Services</h2>
                <div class="w-24 h-1 bg-ami-orange mx-auto"></div>
                <p class="mt-4 text-gray-600 max-w-3xl mx-auto">
                    With over 40 years of experience in the power generation industry, AMI provides comprehensive services
                    to ensure your equipment operates at peak performance. Our expert team delivers reliable solutions
                    tailored to your specific needs.
                </p>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            @if ($services->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($services as $service)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-blue-100 hover-lift">
                    <div class="h-48 overflow-hidden">
                        @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}"
                                 alt="{{ $service->name }}"
                                 class="w-full h-full object-cover transition duration-500 hover:scale-110">
                        @else
                            <div class="h-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
                                <div class="text-center text-white">
                                    <i class="fas fa-cogs text-4xl mb-4"></i>
                                    <h3 class="text-lg font-bold">{{ $service->name }}</h3>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-3">{{ $service->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($service->description, 120) }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-ami-orange font-semibold">Professional Service</span>
                            <a href="{{ route('service.show', $service->slug) }}" class="text-blue-600 hover:text-ami-orange transition">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-16">
                <i class="fas fa-tools text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">Services Coming Soon</h3>
                <p class="text-gray-500">Our comprehensive service offerings will be available here soon.</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Why Choose Our Services
    <section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Why Choose AMI Services?</h2>
                <div class="w-24 h-1 bg-ami-orange mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center text-white">
                    <div class="bg-white/20 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-award text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">40+ Years Experience</h3>
                    <p class="text-blue-100">Decades of expertise in power generation solutions</p>
                </div>

                <div class="text-center text-white">
                    <div class="bg-white/20 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Expert Team</h3>
                    <p class="text-blue-100">Certified technicians and engineers</p>
                </div>

                <div class="text-center text-white">
                    <div class="bg-white/20 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clock text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">24/7 Support</h3>
                    <p class="text-blue-100">Round-the-clock technical assistance</p>
                </div>

                <div class="text-center text-white">
                    <div class="bg-white/20 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Quality Guarantee</h3>
                    <p class="text-blue-100">Comprehensive warranty on all services</p>
                </div>
            </div>
        </div>
    </section>-->

    <!-- Service Process
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold ami-blue mb-4">Our Service Process</h2>
                <div class="w-24 h-1 bg-ami-orange mx-auto"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">We follow a systematic approach to ensure the highest quality service delivery</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="bg-ami-blue text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 text-2xl font-bold">1</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Consultation</h3>
                    <p class="text-gray-600">Initial assessment and requirement analysis</p>
                </div>

                <div class="text-center">
                    <div class="bg-ami-blue text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 text-2xl font-bold">2</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Planning</h3>
                    <p class="text-gray-600">Detailed service plan and timeline development</p>
                </div>

                <div class="text-center">
                    <div class="bg-ami-blue text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 text-2xl font-bold">3</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Execution</h3>
                    <p class="text-gray-600">Professional service delivery by certified technicians</p>
                </div>

                <div class="text-center">
                    <div class="bg-ami-blue text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4 text-2xl font-bold">4</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Follow-up</h3>
                    <p class="text-gray-600">Quality assurance and ongoing support</p>
                </div>
            </div>
        </div>
    </section>-->

    <!-- Call to Action-->
    <section class="py-16 bg-gradient-to-r from-ami-orange to-orange-600">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Get Started?</h2>
            <p class="text-xl text-orange-100 mb-8 max-w-2xl mx-auto">Contact our service team today for a consultation and discover how we can help optimize your power systems.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact.index') }}" class="bg-white text-ami-orange px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Get Free Consultation
                </a>
                <a href="{{ route('products.index') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-ami-orange transition">
                    View Our Products
                </a>
            </div>
        </div>
    </section>
@endsection
