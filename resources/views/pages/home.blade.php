@extends('layouts.app')

@section('title', 'Al Mohandes International - Leading Diesel Generator Manufacturer Since 1983')
@section('description', 'Leading diesel generator manufacturer in Egypt providing integrated power solutions to global markets since 1983. Explore our comprehensive range of gensets, marine generators, and industrial power solutions.')
@section('keywords', 'diesel generators, power generation, gensets, backup power, marine generators, industrial generators, Egypt, AMI, Al Mohandes International, power solutions, generator manufacturer')

@section('og_type', 'website')
@section('og_title', 'Al Mohandes International - Leading Diesel Generator Manufacturer Since 1983')
@section('og_description', 'Leading diesel generator manufacturer in Egypt providing integrated power solutions to global markets since 1983.')
@section('og_image', asset('imgs/ami-logo.png'))

@section('twitter_title', 'Al Mohandes International - Diesel Generator Manufacturer')
@section('twitter_description', 'Leading diesel generator manufacturer in Egypt providing power solutions globally since 1983.')

@section('content')

    <!-- Hero Section -->
    <section id="home" class="relative hero-section" style="height: 100vh; margin-top: -72px; min-height: 600px;" x-data="{
            currentSlide: 0,
            slides: [
                {
                    desktop: '{{ asset('imgs/1-desktop.webp') }}',
                    tablet: '{{ asset('imgs/1-tablet.webp') }}',
                    mobile: '{{ asset('imgs/1-mobile.webp') }}',
                    title: 'Powering Reliability Since 1983',
                    description: 'Engineering Excellence in Diesel Generator Solutions'
                },
                {
                    desktop: '{{ asset('imgs/2-desktop.webp') }}',
                    tablet: '{{ asset('imgs/2-tablet.webp') }}',
                    mobile: '{{ asset('imgs/2-mobile.webp') }}',
                    title: 'Engineered for Silence. Built by AMI.',
                    description: 'Precision-made soundproof enclosures for reliable generator performance.'
                },
                {
                    desktop: '{{ asset('imgs/3-desktop.webp') }}',
                    tablet: '{{ asset('imgs/3-tablet.webp') }}',
                    mobile: '{{ asset('imgs/3-mobile.webp') }}',
                    title: 'Genuine Parts. Guaranteed Performance.',
                    description: 'Every component is tested, trusted, and AMI-certified.'
                }
            ]
        }" x-init="() => {
            // Start immediately, then rotate every 6s for better mobile performance
            currentSlide = 0;
            setInterval(() => { currentSlide = (currentSlide + 1) % slides.length }, 6000);
        }">
        <!-- Mobile optimized hero images with explicit dimensions -->
        <div class="overflow-hidden absolute inset-0">
            <template x-for="(slide, index) in slides" :key="index">
                <div
                    x-show="currentSlide === index"
                    x-transition:enter="transition ease-in-out duration-2000"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in-out duration-2000"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="absolute inset-0 hero-slider"
                    style="width: 100%; height: 100%;"
                >
                    <img :src="slide.mobile"
                         :srcset="slide.mobile + ' 640w, ' + slide.tablet + ' 1024w, ' + slide.desktop + ' 1920w'"
                         sizes="100vw"
                         alt="AMI Power Generation Solutions"
                         class="object-cover w-full h-full smooth-zoom"
                         width="1920"
                         height="1080"
                         :fetchpriority="index === 0 ? 'high' : 'low'"
                         decoding="async"
                         :loading="index === 0 ? 'eager' : 'lazy'"
                         style="object-position: center; min-height: 100%;">
                </div>
            </template>
            <style>
                @keyframes zoomEffect {
                    0% { transform: scale(1); }
                    100% { transform: scale(1.1); }
                }
                .smooth-zoom {
                    animation: zoomEffect 8s ease-out forwards;
                }
            </style>
            <div class="absolute inset-0 z-10 bg-gray-800/50"></div>
        </div>

        <div class="flex relative z-10 justify-center items-center h-full text-center text-white" >
            <div class="px-4 w-full max-w-5xl fade-in">
                <div class="relative" style="min-height: 280px; height: 280px;" class="md:min-h-[320px] flex flex-col justify-center items-center">
                  <template x-for="(slide, index) in slides" :key="index">
                    <div x-show="currentSlide === index"
                         class="flex absolute inset-0 flex-col justify-center items-center">
                      <h1
                        x-show="currentSlide === index"
                        x-transition:enter="transition ease-out duration-700 delay-100"
                        x-transition:enter-start="opacity-0 transform -translate-x-full"
                        x-transition:enter-end="opacity-100 transform translate-x-0"
                        x-transition:leave="transition ease-in duration-500"
                        x-transition:leave-start="opacity-100 transform translate-x-0"
                        x-transition:leave-end="opacity-0 transform translate-x-full"
                        class="mb-4 w-full text-3xl font-bold leading-tight text-center text-shadow md:text-4xl lg:text-5xl"
                        x-text="slide.title">
                      </h1>
                      <p
                        x-show="currentSlide === index"
                        x-transition:enter="transition ease-out duration-700 delay-300"
                        x-transition:enter-start="opacity-0 transform -translate-x-full"
                        x-transition:enter-end="opacity-100 transform translate-x-0"
                        x-transition:leave="transition ease-in duration-500"
                        x-transition:leave-start="opacity-100 transform translate-x-0"
                        x-transition:leave-end="opacity-0 transform translate-x-full"
                        class="mx-auto mb-8 w-full max-w-4xl text-lg leading-relaxed text-center text-shadow md:text-xl lg:text-2xl"
                        x-text="slide.description">
                      </p>
                    </div>
                  </template>
                </div>


                <div class="flex flex-col gap-4 justify-center mx-auto max-w-md sm:flex-row">
                    <a href="#products" class="px-8 py-3 font-bold text-white rounded-lg transition transform bg-ami-orange hover:bg-blue-600 hover:scale-105">
                        Explore Products
                    </a>
                    <a href="{{ route('home') }}#contact" class="px-8 py-3 font-bold text-white bg-transparent rounded-lg border-2 border-white transition hover:bg-white hover:text-ami-blue">
                        Get a Quote
                    </a>
                </div>
            </div>
            </div>
        </div>

        <!-- Slider Indicators -->
        <div class="flex absolute bottom-8 left-1/2 z-10 space-x-2 transform -translate-x-1/2">
            <template x-for="(slide, index) in slides" :key="index">
                <button
                    @click="currentSlide = index"
                    class="w-3 h-3 rounded-full"
                    :class="currentSlide === index ? 'bg-white' : 'bg-white bg-opacity-50'"
                ></button>
            </template>
        </div>
    </section>
    <!-- Products Section -->
    <section id="products" class="py-20 bg-white" style="content-visibility:auto; contain-intrinsic-size: 1px 1200px;">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue scroll-animate">Our Products</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange scroll-animate delay-100"></div>
                <p class="mx-auto mt-4 max-w-2xl text-gray-600">Explore our comprehensive range of power solutions designed for reliability and performance.</p>
            </div>
 @if ($products->count() > 0)
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($products->take(6) as $product)
                <!-- Generator Sets -->
                <div class="overflow-hidden bg-white rounded-lg shadow-md hover-lift">
                    <a href="{{ route('product.show', $product->slug) }}" class="block relative overflow-hidden group">
                        <div class="absolute inset-0 z-10 bg-ami-orange opacity-60 transition-transform duration-500 ease-in-out transform -translate-x-full -translate-y-full group-hover:translate-x-0 group-hover:translate-y-0"></div>
                        <picture>
                            <source
                                media="(max-width: 480px)"
                                srcset="{{ $product->image ? asset('storage/' . $product->image) : asset('imgs/products/G1.png') }}"
                                sizes="(max-width: 480px) 100vw"
                            >
                            <source
                                media="(max-width: 768px)"
                                srcset="{{ $product->image ? asset('storage/' . $product->image) : asset('imgs/products/G1.png') }}"
                                sizes="(max-width: 768px) 50vw"
                            >
                            <img
                                src="{{ $product->image ? asset('storage/' . $product->image) : asset('imgs/products/G1.png') }}"
                                alt="{{ $product->name }}"
                                class="object-contain w-full h-auto"
                                loading="lazy"
                                decoding="async"
                                width="400"
                                height="256"
                                style="aspect-ratio: 400/256; content-visibility: auto;"
                            >
                        </picture>
                    </a>
                    <div class="p-6">
                      
                        <h3 class="mb-2 text-xl font-bold ami-blue">{{ $product->name ?? $product->ami_model }}</h3>
                        @if($product->description)
                        <p class="mb-4 text-gray-600">{{ Str::limit($product->description, 100)  }}</p>
                        @endif
                        @if($product->engine)
                        <p class="mb-4 text-gray-600">{{ $product->engine }}</p>
                        @endif
                        <a href="{{ route('product.show', $product->slug) }}" class="font-medium text-ami-orange hover:underline">
                            View Details <i class="ml-1 fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="py-16 text-center">
                <i class="mb-4 text-6xl text-gray-300 fas fa-tools"></i>
                <h3 class="mb-2 text-xl font-semibold text-gray-600">Products Coming Soon</h3>
                <p class="text-gray-500">Our Products will be available here soon.</p>
            </div>
            @endif
        </div>
    </section>
    <!--Partners Section -->
        <section id="partners" class="py-20 bg-white">
            <div class="flex relative flex-col justify-center items-center py-10 w-full" >
               <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue scroll-animate">Firms & Consultants</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange scroll-animate delay-100"></div>
                <!-- Continuous Slider Container -->
                <div class="overflow-hidden relative py-6 w-full">
                    <!-- Row 1 - Moving Left  -->
                    <div class="flex gap-8 mb-8 whitespace-nowrap animate-scroll-left">
                        <!-- First Set - -->
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/1.png') }}" alt="veolia" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/2.png') }}" alt="o2a" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/3.png') }}" alt="metito" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/4.png') }}" alt="concord" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/5.png') }}" alt="militray production" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/6.png') }}" alt="suez canal" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/7.png') }}" alt="mostaqeble misr" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/8.png') }}" alt="nopwasd" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/9.png') }}" alt="tmg" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/10.png') }}" alt="hassan allam" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/11.jpeg') }}" alt="the arab constructor" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/12.jpeg') }}" alt="elswedy" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/13.jpeg') }}" alt="petrojet" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/14.jpeg') }}" alt="petroluim" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/15.jpeg') }}" alt="sodic" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/16.jpeg') }}" alt="waterway" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/17.jpeg') }}" alt="intech" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/18.jpeg') }}" alt="nextep" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>



                        <!-- Duplicate for Seamless Loop -->
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/1.png') }}" alt="veolia" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/2.png') }}" alt="o2a" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/3.png') }}" alt="metito" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/4.png') }}" alt="concord" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/5.png') }}" alt="militray production" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/6.png') }}" alt="suez canal" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/7.png') }}" alt="mostaqeble misr" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/8.png') }}" alt="nopwasd" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/9.png') }}" alt="tmg" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/10.png') }}" alt="hassan allam" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/11.jpeg') }}" alt="the arab constructor" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/12.jpeg') }}" alt="elswedy" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/13.jpeg') }}" alt="petrojet" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/14.jpeg') }}" alt="petroluim" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/15.jpeg') }}" alt="sodic" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/16.jpeg') }}" alt="waterway" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/17.jpeg') }}" alt="intech" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-brands/18.jpeg') }}" alt="nextep" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>


                    </div>

                    <!-- Row 2 - Moving Right  -->
                    <div class="flex gap-8 whitespace-nowrap animate-scroll-right">
                        <!-- First Set -  -->
                        <a href="https://www.mtu-online.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/mtu.png') }}" alt="MTU" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="https://www.stamford-avk.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/stamford.png') }}" alt="Stamford" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="https://www.perkins.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/perkins.png') }}" alt="Perkins" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="https://www.meccalte.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/mecc-alta.png') }}" alt="Mecc Alte" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="https://acim.nidec.com/en-US/motors/leroy-somer" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/leroysomer.png') }}" alt="Leroy Somer" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-logos/4.png') }}" alt="jhon deer" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-logos/1.png') }}" alt="fbt" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-logos/2.png') }}" alt="disgenset" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-logos/3.png') }}" alt="cummins" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/Schneider.png') }}" alt="Schneider" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ABB.png') }}" alt="ABB" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>

                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-logos/5.png') }}" alt="hyundai" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-logos/6.png') }}" alt="Mitsubishi" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-logos/7.png') }}" alt="comap company" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="https://www.volvopenta.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/volvo.png') }}" alt="Volvo" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>

                        <!-- Duplicate First Set for Seamless Loop -->
                        <a href="https://www.mtu-online.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/mtu.png') }}" alt="MTU" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="https://www.stamford-avk.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/stamford.png') }}" alt="Stamford" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="https://www.perkins.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/perkins.png') }}" alt="Perkins" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="https://www.meccalte.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/mecc-alta.png') }}" alt="Mecc Alte" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="https://acim.nidec.com/en-US/motors/leroy-somer" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/leroysomer.png') }}" alt="Leroy Somer" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-logos/4.png') }}" alt="jhon deer" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-logos/1.png') }}" alt="fbt" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-logos/2.png') }}" alt="disgenset" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-logos/3.png') }}" alt="cummins" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/Schneider.png') }}" alt="Schneider" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ABB.png') }}" alt="ABB" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-logos/5.png') }}" alt="hyundai" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-logos/6.png') }}" alt="Mitsubishi" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ami-logos/7.png') }}" alt="comap company" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                        <a href="https://www.volvopenta.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-64 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/volvo.png') }}" alt="Volvo" class="object-contain w-full h-full" loading="lazy" decoding="async" width="256" height="160">
                        </a>
                    </div>
                </div>

                <!-- CSS Animations -->
                <style>
                    @keyframes scroll-left {
                        0% {
                            transform: translateX(0);
                        }
                        100% {
                            /* Move exactly the width of 18 items: (256px width + 32px gap) × 18 = 5184px */
                            transform: translateX(calc(-288px * 18));
                        }
                    }

                    @keyframes scroll-right {
                        0% {
                            /* Start from the width of 15 items: (256px width + 32px gap) × 15 = 4320px */
                            transform: translateX(calc(-288px * 15));
                        }
                        100% {
                            transform: translateX(0);
                        }
                    }

                    .animate-scroll-left {
                        animation: scroll-left 55s linear infinite;
                        will-change: transform;
                    }

                    .animate-scroll-left:hover {
                        animation-play-state: paused;
                    }

                    .animate-scroll-right {
                        animation: scroll-right 50s linear infinite;
                        will-change: transform;
                    }

                    .animate-scroll-right:hover {
                        animation-play-state: paused;
                    }

                    /* Reduce animations on mobile for better performance */
                    @media (max-width: 768px) {
                        .animate-scroll-left {
                            animation-duration: 60s;
                        }
                        .animate-scroll-right {
                            animation-duration: 55s;
                        }
                    }
                </style>
            </div>
        </section>

     <!-- Manufacturing Capabilities Section -->
     <section id="manufacturing" class="py-20 bg-white" style="content-visibility:auto; contain-intrinsic-size: 1px 1000px;">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue scroll-animate">Manufacturing Capabilities</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange scroll-animate delay-100"></div>
                <p class="mx-auto mt-4 max-w-2xl text-gray-600">State-of-the-art facilities and in-house production capabilities for quality control and customization.</p>
            </div>

            <div class="grid grid-cols-1 gap-12 items-stretch mb-16 pb-20 md:grid-cols-2 ">
                <!-- Text content - shows first on mobile, second on desktop -->
                <div class="overflow-y-auto order-1 md:order-2">
                    <h3 class="mb-6 text-2xl font-bold ami-blue">In-House Production Excellence</h3>
                    <p class="mb-6 text-gray-700">
                        Our vertically integrated manufacturing process allows us to maintain strict quality control and deliver customized solutions efficiently. We produce a wide range of components in-house:
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="mt-1 mr-3 fas fa-check-circle text-ami-orange"></i>
                            <div>
                                <h4 class="text-lg font-bold text-gray-900 capitalize">Diesel Generating Set
                                </h4>
                                <p class="text-gray-600">Full range of reliable diesel generator power solutions.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="mt-1 mr-3 fas fa-check-circle text-ami-orange"></i>
                            <div>
                                <h4 class="text-lg font-bold text-gray-900 capitalize">Fuel Storage Tanks
                                </h4>
                                <p class="text-gray-600">Distant job site location is no longer an issue with our storage tank solutions.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="mt-1 mr-3 fas fa-check-circle text-ami-orange"></i>
                            <div>
                                <h4 class="text-lg font-bold text-gray-900 capitalize">Marine generator set</h4>
                                <p class="text-gray-600">Where performance & reliability are critical the most.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="mt-1 mr-3 fas fa-check-circle text-ami-orange"></i>
                            <div>
                                <h4 class="text-lg font-bold text-gray-900 capitalize">Trailer generator set
                                </h4>
                                <p class="text-gray-600">On the Job site, rough terrain or on a boat, various accessories to meet your application requirement perfectly.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="mt-1 mr-3 fas fa-check-circle text-ami-orange"></i>
                            <div>
                                <h4 class="font-bold text-gray-900 capitalize"> Light Towers

                                </h4>
                                <p class="text-gray-600">Ease your night working days with the right Light Towers
                                    Set.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="mt-1 mr-3 fas fa-check-circle text-ami-orange"></i>
                            <div>
                                <h4 class="font-bold text-gray-900 capitalize">Low Voltage Panels
                                </h4>
                                <p class="text-gray-600">Compatible, High-Quality Low Voltage panels Distribution Switchgear, Lighting panels, Synchronization panels and ATS.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Image - shows second on mobile, first on desktop -->
                <div class="flex order-2 md:order-1">
                    <picture class="w-full h-full">
                        <source srcset="{{ asset('imgs/2.webp') }}" type="image/webp">
                        <img src="{{ asset('imgs/2.png') }}" alt="Manufacturing Facility" class="object-cover w-full h-full rounded-lg shadow-lg 
                        max-h-[600px]" loading="lazy" decoding="async">
                    </picture>
                </div>
            </div>
        </div>
    </section>
      <!-- About AMI Section -->
      <section id="about" class="py-20 bg-gray-50" style="content-visibility:auto; contain-intrinsic-size: 1px 1000px;">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue scroll-animate">About Al Mohandes International</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange scroll-animate delay-100"></div>
            </div>

            <div class="flex flex-col gap-12 items-stretch md:flex-row ">
                <div class="md:w-1/2">
                    <h3 class="mb-6 text-2xl font-bold">Our Legacy of Excellence</h3>
                    <p class="mb-6 text-gray-700">
                        Founded in 1983, Al Mohandes International (AMI) is a leading diesel generator manufacturer in Egypt, providing integrated power solutions to global markets. We specialize in designing and manufacturing gensets, backup power systems, and custom electrical solutions for industrial, commercial, and marine applications.

                    </p>
                    <p class="mb-6 text-gray-700">
                        With a proven reputation for reliability, performance, and durability, our diesel gensets are engineered to meet the highest international standards. We also provide generator accessories, including canopies, fuel tanks, and control systems, ensuring complete and efficient power generation solutions.
                    </p>
                    <p class="mb-6 text-gray-700">
                        At AMI, we combine technical expertise, quality engineering, and a customer-focused approach to deliver sustainable energy solutions and unmatched after-sales service. Our mission is to ensure reliable energy supply for businesses, industries, and communities worldwide.
                    </p>

                </div>

                <div class="flex bg-transparent md:w-1/2">


                        <picture class="w-full h-full">
                            <source srcset="{{ asset('imgs/3.webp') }}" type="image/webp">
                            <img
                                src="{{ asset('imgs/3.png') }}"
                                alt="AMI Manufacturing Facility"
                                class="object-cover w-full h-full rounded-md max-h-[500px]"
                                loading="lazy"
                                decoding="async"
                            >
                        </picture>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section -->
    <section id="services" class="py-20 bg-ami-light-blue">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue scroll-animate">Our Services</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange scroll-animate delay-100"></div>
                <p class="mx-auto mt-4 max-w-2xl text-gray-600">Comprehensive services to support your power needs from installation to maintenance.</p>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                <!-- Custom Solutions -->
                <div class="relative p-8 text-center bg-white rounded-lg overflow-hidden group cursor-pointer">
                    <div class="absolute inset-0 bg-ami-orange transform translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-in-out"></div>
                    <div class="relative z-10">
                        <div class="flex justify-center items-center mx-auto mb-4 w-16 h-16 rounded-full transition-all duration-300 bg-ami-blue group-hover:bg-white">
                            <i class="text-2xl text-white group-hover:text-ami-orange transition-colors duration-300 fas fa-cogs"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold ami-blue group-hover:text-white transition-colors duration-300">Custom Solutions</h3>
                        <p class="text-gray-600 group-hover:text-white transition-colors duration-300">Tailored power solutions designed to meet specific requirements and challenging environments.</p>
                    </div>
                </div>

                <!-- Maintenance -->
                <div class="relative p-8 text-center bg-white rounded-lg overflow-hidden group cursor-pointer">
                    <div class="absolute inset-0 bg-ami-orange transform translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-in-out"></div>
                    <div class="relative z-10">
                        <div class="flex justify-center items-center mx-auto mb-4 w-16 h-16 rounded-full transition-all duration-300 bg-ami-blue group-hover:bg-white">
                            <i class="text-2xl text-white group-hover:text-ami-orange transition-colors duration-300 fas fa-tools"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold ami-blue group-hover:text-white transition-colors duration-300">Maintenance</h3>
                        <p class="text-gray-600 group-hover:text-white transition-colors duration-300">Preventive and corrective maintenance services to ensure optimal performance and longevity.</p>
                    </div>
                </div>

                <!-- Spare Parts -->
                <div class="relative p-8 text-center bg-white rounded-lg overflow-hidden group cursor-pointer">
                    <div class="absolute inset-0 bg-ami-orange transform translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-in-out"></div>
                    <div class="relative z-10">
                        <div class="flex justify-center items-center mx-auto mb-4 w-16 h-16 rounded-full transition-all duration-300 bg-ami-blue group-hover:bg-white">
                            <i class="text-2xl text-white group-hover:text-ami-orange transition-colors duration-300 fas fa-box-open"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold ami-blue group-hover:text-white transition-colors duration-300">Spare Parts</h3>
                        <p class="text-gray-600 group-hover:text-white transition-colors duration-300">Genuine spare parts and components for all our products to maintain reliability and performance.</p>
                    </div>
                </div>

                <!-- Technical Support -->
                <div class="relative p-8 text-center bg-white rounded-lg overflow-hidden group cursor-pointer">
                    <div class="absolute inset-0 bg-ami-orange transform translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-in-out"></div>
                    <div class="relative z-10">
                        <div class="flex justify-center items-center mx-auto mb-4 w-16 h-16 rounded-full transition-all duration-300 bg-ami-blue group-hover:bg-white">
                            <i class="text-2xl text-white group-hover:text-ami-orange transition-colors duration-300 fas fa-headset"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold ami-blue group-hover:text-white transition-colors duration-300">Technical Support</h3>
                        <p class="text-gray-600 group-hover:text-white transition-colors duration-300">24/7 technical support and assistance from our team of experienced engineers.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Global Reach & Partnerships Section -->
    <section id="global" class="py-20 world-map">
        <div class="container px-4 mx-auto world-map-content">
            <div class="mb-8 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl text- scroll-animate">Global Reach</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange scroll-animate delay-100"></div>
                <p class="mx-auto mt-4 max-w-2xl text-gray-800">Serving clients across continents with reliable power solutions and trusted partnerships.</p>
            </div>

            <div class="grid grid-cols-1 gap-12 items-center mb-8 md:grid-cols-2">
                <div>
                    <picture>
                        <source srcset="{{ asset('imgs/ami-world.webp') }}" type="image/webp">
                        <img src="{{ asset('imgs/ami-world.png') }}" alt="worldwide presence" loading="lazy" decoding="async" width="1024" height="1024" style="aspect-ratio: 16/12;" class="w-full h-auto">
                    </picture>
                   </div>
               <div class="p-8 bg-white bg-opacity-90 rounded-lg">
                    <h3 class="mb-6 text-2xl font-bold ami-blue">Worldwide Presence</h3>
                    <p class="mb-6 text-gray-700">
                        Over the years, Al Mohandes International Co. (AMI) has proudly expanded its reach beyond Egypt, exporting high-quality diesel generator sets to several countries across the globe.
                        </p>

                        <p class="mb-6 text-gray-700">Our products have been successfully delivered to: Russia, Japan, Syria, Jordan, Lebanon, Saudi Arabia, Yemen, Kuwait, Sudan, Tanzania, Kenya, Libya, Algeria, and England.</p>

                        <p class="mb-6 text-gray-700">This wide international presence reflects our commitment to quality, reliability, and long-term customer satisfaction in every project we handle.</p>

                        <p class="mb-6 text-gray-700">Our network of trusted suppliers and partners in countries enables us to deliver high-quality solutions and reliable aftersales support wherever our customers are located.</p>
                    </p>

                </div>

            </div>

            </div>
        </div>
    </section>


    <!-- Contact & Inquiry Section -->
    <section id="contact" class="py-5 bg-white">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue scroll-animate">Contact & Inquiry</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange scroll-animate delay-100"></div>
                <p class="mx-auto mt-4 max-w-2xl text-gray-600 scroll-animate delay-200">Get in touch with our team for inquiries, quotes, or support.</p>
            </div>

            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
                <!-- Contact Form -->
                <div class="scroll-animate delay-300">
                    <h3 class="mb-6 text-2xl font-bold ami-blue">Send Us a Message</h3>

                    @if ($errors->any())
                        <div class="p-4 mb-6 bg-red-50 rounded-lg border border-red-200">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <i class="text-red-400 fas fa-exclamation-circle"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">
                                        There were some problems with your submission:
                                    </h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <ul class="space-y-1 list-disc list-inside">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <form method="post" action="{{ route('contact.store') }}" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block mb-2 font-medium text-gray-700">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="px-4 py-2 w-full rounded-lg border focus:outline-none focus:ring-2 focus:ring-ami-blue focus:border-transparent @error('name') border-red-500 @else border-gray-300 @enderror">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block mb-2 font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="px-4 py-2 w-full rounded-lg border focus:outline-none focus:ring-2 focus:ring-ami-blue focus:border-transparent @error('email') border-red-500 @else border-gray-300 @enderror">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block mb-2 font-medium text-gray-700">Phone</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="px-4 py-2 w-full rounded-lg border focus:outline-none focus:ring-2 focus:ring-ami-blue focus:border-transparent @error('phone') border-red-500 @else border-gray-300 @enderror">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="message" class="block mb-2 font-medium text-gray-700">Your Message</label>
                            <textarea id="message" name="message" rows="4" class="px-4 py-2 w-full rounded-lg border focus:outline-none focus:ring-2 focus:ring-ami-blue focus:border-transparent @error('message') border-red-500 @else border-gray-300 @enderror">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="px-8 py-3 font-bold text-white rounded-full transition transform bg-ami-orange hover:bg-orange-600 hover:scale-105">
                            Submit Inquiry
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <!-- Contact Information -->
                <div>
                    <h3 class="mb-6 text-2xl font-bold ami-blue scroll-animate">Get in Touch</h3>

                    <div class="mb-8 space-y-6">
                        <div class="flex items-start scroll-animate delay-100">
                            <div class="flex flex-shrink-0 justify-center items-center mr-4 w-12 h-12 rounded-full transition-all duration-300 bg-ami-blue hover:bg-ami-orange">
                                <i class="text-white fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h4 class="mb-1 font-bold">Headquarters</h4>
                                <p class="text-gray-600">6th of October City - 3rd Industrial Zone 54 St of 7 St. - Block 59, 61 - P.O. Box 48
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start scroll-animate delay-200">
                            <div class="flex flex-shrink-0 justify-center items-center mr-4 w-12 h-12 rounded-full transition-all duration-300 bg-ami-blue hover:bg-ami-orange">
                                <i class="text-white fas fa-phone"></i>
                            </div>
                            <div>
                                <h4 class="mb-1 font-bold">Phone</h4>
                                <a href="tel:+201223295077" class="text-gray-600">(+2) 01223295077</a>
                            </div>
                        </div>

                        <div class="flex items-start scroll-animate delay-300">
                            <div class="flex flex-shrink-0 justify-center items-center mr-4 w-12 h-12 rounded-full transition-all duration-300 bg-ami-blue hover:bg-ami-orange">
                                <i class="text-white fas fa-envelope"></i>
                            </div>
                            <div>
                                <h4 class="mb-1 font-bold">Email</h4>
                                <a href="mailto:inquiry@amigenset.com" class="block text-gray-600" email="inquiry@amigenset.com">inquiry@amigenset.com </a>
                                <a href="mailto:info@amigenset.com" class="block text-gray-600" email="info@amigenset.com">info@amigenset.com </a>


                            </div>
                        </div>

                        <div class="flex items-start scroll-animate delay-400">
                            <div class="flex flex-shrink-0 justify-center items-center mr-4 w-12 h-12 rounded-full transition-all duration-300 bg-ami-blue hover:bg-ami-orange">
                                <i class="text-white fa-solid fa-fax"></i>
                            </div>
                            <div>
                                <h4 class="mb-1 font-bold">Fax</h4>
                                <a href="tel:+238206210" class="text-gray-600">(+2) 38206210</a>
                            </div>

                        </div>
                        <div class="flex items-start scroll-animate delay-500">
                            <div class="flex flex-shrink-0 justify-center items-center mr-4 w-12 h-12 rounded-full transition-all duration-300 bg-ami-blue hover:bg-ami-orange">
                                <i class="text-xl text-white fa-brands fa-whatsapp"></i>
                            </div>
                            <div>
                                <h4 class="mb-1 font-bold">WhatsApp </h4>
                                <a href="https://wa.me/201211692434"class="text-gray-600">+20 1211692434</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Full-Width Google Map Section -->
    <section class="pb-px w-full">
        <div class="relative w-full h-96">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d432.287205513475!2d30.9042049!3d29.9133322!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458ff7ba2422dcb%3A0xf9fee2c4c3a60b12!2sAMI%20-%20Al%20Mohandes%20International%20Co.!5e0!3m2!1sen!2seg!4v1760003246511!5m2!1sen!2seg"
                width="100%"
                height="100%"
                style="border:0; display: block;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                class="w-full h-full">
            </iframe>
        </div>
    </section>
    <!-- Scroll Animation Script & Styles -->
    <style>
        .scroll-animate {
            opacity: 0;
            transform: translateY(80px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
            will-change: opacity, transform;
        }
        
        .scroll-animate.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Staggered delays for elements in the same container if needed */
        .delay-100 { transition-delay: 0.1s; }
        .delay-200 { transition-delay: 0.2s; }
        .delay-300 { transition-delay: 0.3s; }
        .delay-400 { transition-delay: 0.4s; }
        .delay-500 { transition-delay: 0.5s; }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                root: null,
                rootMargin: '0px 0px -50px 0px', // Trigger slightly before the bottom
                threshold: 0.2 // Trigger when 20% of the element is visible
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target); // Only animate once
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.scroll-animate').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
@endsection
