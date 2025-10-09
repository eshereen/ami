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
                    Over 40 years, Al Mohandes International Co. (AMI) has grown steadily, achieving major milestones that shaped our success story.
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




 

@endsection
