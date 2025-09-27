@extends('layouts.app')
@section('content')
    <!-- Hero Section with Large Image -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
             alt="Our Services"
             class="object-cover w-full h-full">
        <div class="flex absolute inset-0 items-center bg-gradient-to-r from-blue-900/80 to-blue-700/60">
            <div class="container px-4 mx-auto">
                <h1 class="mb-4 text-4xl font-bold text-white md:text-5xl fade-in">Our Services</h1>
                <p class="max-w-2xl text-xl text-blue-100 fade-in">Comprehensive power solutions and maintenance services for industrial excellence</p>
            </div>
        </div>
    </section>

    <!-- Services Introduction -->
    <section class="py-16 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue">Professional Services</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
                <p class="mx-auto mt-4 max-w-3xl text-gray-600">
                    With over 40 years of experience in the power generation industry, AMI provides comprehensive services
                    to ensure your equipment operates at peak performance. Our expert team delivers reliable solutions
                    tailored to your specific needs.
                </p>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="py-16">
        <div class="container px-4 mx-auto">
            @if ($services->count() > 0)
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($services as $service)
                <div class="overflow-hidden bg-white rounded-xl border border-blue-100 shadow-lg hover-lift">
                    <div class="overflow-hidden h-48">
                        @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}"
                                 alt="{{ $service->name }}"
                                 class="object-cover w-full h-full transition duration-500 hover:scale-110">
                        @else
                            <div class="flex justify-center items-center h-full bg-gradient-to-br from-blue-500 to-blue-700">
                                <div class="text-center text-white">
                                    <i class="mb-4 text-4xl fas fa-cogs"></i>
                                    <h3 class="text-lg font-bold">{{ $service->name }}</h3>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="mb-3 text-xl font-bold text-blue-900">{{ $service->name }}</h3>
                        <p class="mb-4 text-gray-600">{{ Str::limit($service->description, 120) }}</p>
                        <div class="flex justify-between items-center">
                            <span class="font-semibold text-ami-orange">Professional Service</span>
                            <a href="{{ route('service.show', $service->slug) }}" class="text-blue-600 transition hover:text-ami-orange">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="py-16 text-center">
                <i class="mb-4 text-6xl text-gray-300 fas fa-tools"></i>
                <h3 class="mb-2 text-xl font-semibold text-gray-600">Services Coming Soon</h3>
                <p class="text-gray-500">Our comprehensive service offerings will be available here soon.</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Why Choose Our Services -->
    <!--<section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800"></section>
        <div class="container px-4 mx-auto">
            <div class="mb-12 text-center">
                <h2 class="mb-4 text-3xl font-bold text-white md:text-4xl">Why Choose AMI Services?</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                <div class="text-center text-white">
                    <div class="flex justify-center items-center mx-auto mb-4 w-16 h-16 rounded-full bg-white/20">
                        <i class="text-2xl fas fa-award"></i>
                    </div>
                    <h3 class="mb-2 text-xl font-bold">40+ Years Experience</h3>
                    <p class="text-blue-100">Decades of expertise in power generation solutions</p>
                </div>

                <div class="text-center text-white">
                    <div class="flex justify-center items-center mx-auto mb-4 w-16 h-16 rounded-full bg-white/20">
                        <i class="text-2xl fas fa-users"></i>
                    </div>
                    <h3 class="mb-2 text-xl font-bold">Expert Team</h3>
                    <p class="text-blue-100">Certified technicians and engineers</p>
                </div>

                <div class="text-center text-white">
                    <div class="flex justify-center items-center mx-auto mb-4 w-16 h-16 rounded-full bg-white/20">
                        <i class="text-2xl fas fa-clock"></i>
                    </div>
                    <h3 class="mb-2 text-xl font-bold">24/7 Support</h3>
                    <p class="text-blue-100">Round-the-clock technical assistance</p>
                </div>

                <div class="text-center text-white">
                    <div class="flex justify-center items-center mx-auto mb-4 w-16 h-16 rounded-full bg-white/20">
                        <i class="text-2xl fas fa-shield-alt"></i>
                    </div>
                    <h3 class="mb-2 text-xl font-bold">Quality Guarantee</h3>
                    <p class="text-blue-100">Comprehensive warranty on all services</p>
                </div>
            </div>
        </div>
    </section>-->

    <!-- Service Process -->
    <!--<section class="py-16 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue">Our Service Process</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
                <p class="mx-auto mt-4 max-w-2xl text-gray-600">We follow a systematic approach to ensure the highest quality service delivery</p>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                <div class="text-center">
                    <div class="flex justify-center items-center mx-auto mb-4 w-16 h-16 text-2xl font-bold text-white rounded-full bg-ami-blue">1</div>
                    <h3 class="mb-2 text-xl font-bold text-gray-900">Consultation</h3>
                    <p class="text-gray-600">Initial assessment and requirement analysis</p>
                </div>

                <div class="text-center">
                    <div class="flex justify-center items-center mx-auto mb-4 w-16 h-16 text-2xl font-bold text-white rounded-full bg-ami-blue">2</div>
                    <h3 class="mb-2 text-xl font-bold text-gray-900">Planning</h3>
                    <p class="text-gray-600">Detailed service plan and timeline development</p>
                </div>

                <div class="text-center">
                    <div class="flex justify-center items-center mx-auto mb-4 w-16 h-16 text-2xl font-bold text-white rounded-full bg-ami-blue">3</div>
                    <h3 class="mb-2 text-xl font-bold text-gray-900">Execution</h3>
                    <p class="text-gray-600">Professional service delivery by certified technicians</p>
                </div>

                <div class="text-center">
                    <div class="flex justify-center items-center mx-auto mb-4 w-16 h-16 text-2xl font-bold text-white rounded-full bg-ami-blue">4</div>
                    <h3 class="mb-2 text-xl font-bold text-gray-900">Follow-up</h3>
                    <p class="text-gray-600">Quality assurance and ongoing support</p>
                </div>
            </div>
        </div>
    </section>-->

    <!-- Call to Action -->
    <section class="py-16 bg-gradient-to-r to-orange-600 from-ami-orange">
        <div class="container px-4 mx-auto text-center">
            <h2 class="mb-4 text-3xl font-bold text-white md:text-4xl">Ready to Get Started?</h2>
            <p class="mx-auto mb-8 max-w-2xl text-xl text-orange-100">Contact our service team today for a consultation and discover how we can help optimize your power systems.</p>
            <div class="flex flex-col gap-4 justify-center sm:flex-row">
                <a href="{{ route('home') }}#contact" class="px-8 py-3 font-semibold bg-white rounded-lg transition text-ami-orange hover:bg-gray-100">
                    Get Free Consultation
                </a>
                <a href="{{ route('products.index') }}" class="px-8 py-3 font-semibold text-white bg-transparent rounded-lg border-2 border-white transition hover:bg-white hover:text-ami-orange">
                    View Our Products
                </a>
            </div>
        </div>
    </section>
@endsection
