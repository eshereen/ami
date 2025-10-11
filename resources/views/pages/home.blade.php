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
    <section id="home" class="relative hero-section" style="height: calc(100vh - 72px); margin-top: -72px;" x-data="{
            currentSlide: 0,
            slides: [
                {
                    desktop: '{{ asset('imgs/slide.webp') }}',
                    mobile: '{{ asset('imgs/slide-mobile.webp') }}',
                    mobileSmall: '{{ asset('imgs/slide-mobile-sm.webp') }}'
                },
                {
                    desktop: '{{ asset('imgs/slide-1.webp') }}',
                    mobile: '{{ asset('imgs/slide-1-mobile.webp') }}',
                    mobileSmall: '{{ asset('imgs/slide-1-mobile-sm.webp') }}'
                },
                {
                    desktop: '{{ asset('imgs/slide-2.webp') }}',
                    mobile: '{{ asset('imgs/slide-2-mobile.webp') }}',
                    mobileSmall: '{{ asset('imgs/slide-2-mobile-sm.webp') }}'
                }
            ]
        }" x-init="() => {
            // Start immediately, then rotate every 5s
            currentSlide = 0;
            setInterval(() => { currentSlide = (currentSlide + 1) % slides.length }, 5000);
        }">
        <!-- Mobile optimized hero images with explicit dimensions -->
        <div class="overflow-hidden absolute inset-0">
            <template x-for="(slide, index) in slides" :key="index">
                <div
                    x-show="currentSlide === index"
                    x-transition:enter="transition ease-in-out duration-1000"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in-out duration-1000"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="absolute inset-0 hero-slider"
                    style="width: 100%; height: 100vh;"
                >
                    <img :src="slide.desktop"
                         :srcset="slide.mobileSmall + ' 480w, ' + slide.mobile + ' 768w, ' + slide.desktop + ' 1920w'"
                         sizes="(max-width: 480px) 100vw, (max-width: 768px) 100vw, (max-width: 1024px) 90vw, 1920px"
                         alt="AMI Power Generation Solutions"
                         class="object-cover w-full h-full"
                         width="1920"
                         height="1080"
                         :fetchpriority="index === 0 ? 'high' : 'low'"
                         decoding="async"
                         loading="eager"
                         style="aspect-ratio: 16/9;"
                         :onerror="console.error('Failed to load image:', slide.desktop)">
                </div>
            </template>
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>

        <div class="flex relative z-10 justify-center items-center px-4 h-full text-center text-white" style="contain:layout;"><div class="max-w-3xl fade-in">
                <h1 class="mb-4 text-4xl font-bold md:text-6xl text-shadow">Powering Reliability Since 1983</h1>
                <p class="mb-8 text-xl md:text-2xl text-shadow">Engineering Excellence in Diesel Generator Solutions</p>
                <div class="flex flex-col gap-4 justify-center sm:flex-row">
                    <a href="#products" class="px-8 py-3 font-bold text-white rounded-full transition transform bg-ami-orange hover:bg-blue-600 hover:scale-105">
                        Explore Products
                    </a>
                    <a href="{{ route('home') }}#contact" class="px-8 py-3 font-bold text-white bg-transparent rounded-full border-2 border-white transition hover:bg-white hover:text-ami-blue">
                        Get a Quote
                    </a>
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


     <!-- Manufacturing Capabilities Section -->
     <section id="manufacturing" class="py-20 bg-white">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue">Manufacturing Capabilities</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
                <p class="mx-auto mt-4 max-w-2xl text-gray-600">State-of-the-art facilities and in-house production capabilities for quality control and customization.</p>
            </div>

            <div class="grid grid-cols-1 gap-12 items-center mb-16 md:grid-cols-2">
                <div>
                    <img src="{{ asset('imgs/products.webp') }}" alt="Manufacturing Facility" class="w-full rounded-lg shadow-lg" loading="lazy" decoding="async" width="900" height="600">
                </div>
                <div>
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
                                <h4 class="text-lg font-bold text-gray-900 capitalize">Marine Gensets</h4>
                                <p class="text-gray-600">Where performance & reliability are critical the most.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="mt-1 mr-3 fas fa-check-circle text-ami-orange"></i>
                            <div>
                                <h4 class="text-lg font-bold text-gray-900 capitalize">Trailers
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
            </div>

        </div>
    </section>
      <!-- About AMI Section -->
      <section id="about" class="py-20 bg-gray-50" style="content-visibility:auto; contain-intrinsic-size: 1px 1000px;">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue">About Al Mohandes International</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
            </div>

            <div class="flex flex-col gap-12 items-center md:flex-row">
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

                <div class="md:w-1/2">
                    <picture>
                        <source
                            media="(max-width: 768px)"
                            srcset="{{ asset('imgs/about-mobile.webp') }} 768w, {{ asset('imgs/about-mobile-sm.webp') }} 480w"
                            sizes="100vw"
                        >
                        <img
                            src="{{ asset('imgs/about.webp') }}"
                            alt="AMI Manufacturing Facility"
                            class="w-full rounded-lg shadow-lg"
                            loading="lazy"
                            decoding="async"
                            width="900"
                            height="600"
                            style="aspect-ratio: 3/2;"
                        >
                    </picture>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-20 bg-white" style="content-visibility:auto; contain-intrinsic-size: 1px 1200px;">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue">Our Products</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
                <p class="mx-auto mt-4 max-w-2xl text-gray-600">Explore our comprehensive range of power solutions designed for reliability and performance.</p>
            </div>
 @if ($products->count() > 0)
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($products->take(6) as $product)
                <!-- Generator Sets -->
                <div class="overflow-hidden bg-white rounded-lg shadow-md hover-lift">
                    <a href="{{ route('product.show', $product->slug) }}">
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
                            class="object-contain w-full h-auto bg-gray-100"
                            loading="lazy"
                            decoding="async"
                            width="400"
                            height="256"
                            style="aspect-ratio: 400/256;"
                        >
                    </picture>
                    </a>
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-bold ami-blue">{{ $product->name }}</h3>
                        @if($product->description)
                        <p class="mb-4 text-gray-600">{{ $product->description }}</p>
                        @endif
                        <a href="{{ route('product.show', $product->slug) }}" class="font-medium text-ami-orange hover:underline">
                            View {{ $product->name }} Details <i class="ml-1 fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    <!--Partners Section -->
        <section id="partners" class="py-20 bg-white">
            <div class="flex relative flex-col justify-center items-center py-10 w-full" >


                <!-- Continuous Slider Container -->
                <div class="overflow-hidden relative py-6 w-full">
                    <!-- Row 1 - Moving Left (6 Partners) -->
                    <div class="flex gap-8 mb-8 whitespace-nowrap animate-scroll-left">
                        <!-- First Set - 6 Unique Partners -->
                        <a href="https://www.avk.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/avk.png') }}" alt="AVK" class="object-contain w-full h-full">
                        </a>
                        <a href="https://www.detuz.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/detuz.png') }}" alt="Detuz" class="object-contain w-full h-full">
                        </a>
                        <a href="https://www.doosan.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/doosan.png') }}" alt="Doosan" class="object-contain w-full h-full">
                        </a>
                        <a href="https://www.iveco.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/iveco.png') }}" alt="Iveco" class="object-contain w-full h-full">
                        </a>
                        <a href="https://www.marathonelectric.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/marathon.png') }}" alt="Marathon" class="object-contain w-full h-full">
                        </a>
                        <a href="https://www.volvopenta.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/volvo.png') }}" alt="Volvo" class="object-contain w-full h-full">
                        </a>

                        <!-- Duplicate Same 6 Partners for Seamless Loop -->
                        <a href="https://www.avk.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/avk.png') }}" alt="AVK" class="object-contain w-full h-full">
                        </a>
                        <a href="https://www.detuz.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/detuz.png') }}" alt="Detuz" class="object-contain w-full h-full">
                        </a>
                        <a href="https://www.doosan.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/doosan.png') }}" alt="Doosan" class="object-contain w-full h-full">
                        </a>
                        <a href="https://www.iveco.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/iveco.png') }}" alt="Iveco" class="object-contain w-full h-full">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/Schneider.png') }}" alt="Schneider" class="object-contain w-full h-full">
                        </a>
                        <a href="#" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/ABB.png') }}" alt="ABB" class="object-contain w-full h-full">
                        </a>
                        <a href="https://www.marathonelectric.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/marathon.png') }}" alt="Marathon" class="object-contain w-full h-full">
                        </a>
                        <a href="https://www.volvopenta.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/volvo.png') }}" alt="Volvo" class="object-contain w-full h-full">
                        </a>
                    </div>

                    <!-- Row 2 - Moving Right (Remaining 5 Partners) -->
                    <div class="flex gap-8 whitespace-nowrap animate-scroll-right">
                        <!-- First Set - 5 Unique Partners -->
                        <a href="https://www.mtu-online.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/mtu.png') }}" alt="MTU" class="object-contain w-full h-full">
                        </a>
                        <a href="https://www.stamford-avk.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/stamford.png') }}" alt="Stamford" class="object-contain w-full h-full">
                        </a>
                        <a href="https://www.perkins.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/perkins.png') }}" alt="Perkins" class="object-contain w-full h-full">
                        </a>
                        <a href="https://www.meccalte.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/mecc-alta.png') }}" alt="Mecc Alte" class="object-contain w-full h-full">
                        </a>
                        <a href="https://acim.nidec.com/en-US/motors/leroy-somer" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/leroysomer.png') }}" alt="Leroy Somer" class="object-contain w-full h-full">
                        </a>

                        <!-- Duplicate Same 5 Partners for Seamless Loop -->
                        <a href="https://www.mtu-online.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/mtu.png') }}" alt="MTU" class="object-contain w-full h-full">
                        </a>
                        <a href="https://www.stamford-avk.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/stamford.png') }}" alt="Stamford" class="object-contain w-full h-full">
                        </a>
                        <a href="https://www.perkins.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/perkins.png') }}" alt="Perkins" class="object-contain w-full h-full">
                        </a>
                        <a href="https://www.meccalte.com" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/mecc-alta.png') }}" alt="Mecc Alte" class="object-contain w-full h-full">
                        </a>
                        <a href="https://acim.nidec.com/en-US/motors/leroy-somer" class="flex flex-shrink-0 justify-center items-center p-6 w-64 h-40 bg-white rounded-xl shadow-lg transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('imgs/leroysomer.png') }}" alt="Leroy Somer" class="object-contain w-full h-full">
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
                            transform: translateX(-50%);
                        }
                    }

                    @keyframes scroll-right {
                        0% {
                            transform: translateX(-50%);
                        }
                        100% {
                            transform: translateX(0);
                        }
                    }

                    .animate-scroll-left {
                        animation: scroll-left 30s linear infinite;
                    }

                    .animate-scroll-left:hover {
                        animation-play-state: paused;
                    }

                    .animate-scroll-right {
                        animation: scroll-right 25s linear infinite;
                    }

                    .animate-scroll-right:hover {
                        animation-play-state: paused;
                    }
                </style>
            </div>
        </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-ami-light-blue">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue">Our Services</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
                <p class="mx-auto mt-4 max-w-2xl text-gray-600">Comprehensive services to support your power needs from installation to maintenance.</p>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                <!-- Custom Solutions -->
                <div class="p-8 text-center bg-white rounded-lg hover-lift">
                    <div class="flex justify-center items-center mx-auto mb-4 w-16 h-16 rounded-full transition-all duration-300 bg-ami-blue hover:bg-ami-orange">
                        <i class="text-2xl text-white fas fa-cogs"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-bold ami-blue">Custom Solutions</h3>
                    <p class="text-gray-600">Tailored power solutions designed to meet specific requirements and challenging environments.</p>
                </div>

                <!-- Maintenance -->
                <div class="p-8 text-center bg-white rounded-lg hover-lift">
                    <div class="flex justify-center items-center mx-auto mb-4 w-16 h-16 rounded-full transition-all duration-300 bg-ami-blue hover:bg-ami-orange">
                        <i class="text-2xl text-white fas fa-tools"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-bold ami-blue">Maintenance</h3>
                    <p class="text-gray-600">Preventive and corrective maintenance services to ensure optimal performance and longevity.</p>
                </div>

                <!-- Spare Parts -->
                <div class="p-8 text-center bg-white rounded-lg hover-lift">
                    <div class="flex justify-center items-center mx-auto mb-4 w-16 h-16 rounded-full transition-all duration-300 bg-ami-blue hover:bg-ami-orange">
                        <i class="text-2xl text-white fas fa-box-open"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-bold ami-blue">Spare Parts</h3>
                    <p class="text-gray-600">Genuine spare parts and components for all our products to maintain reliability and performance.</p>
                </div>

                <!-- Technical Support -->
                <div class="p-8 text-center bg-white rounded-lg hover-lift">
                    <div class="flex justify-center items-center mx-auto mb-4 w-16 h-16 rounded-full transition-all duration-300 bg-ami-blue hover:bg-ami-orange">
                        <i class="text-2xl text-white fas fa-headset"></i>
                    </div>
                    <h3 class="mb-3 text-xl font-bold ami-blue">Technical Support</h3>
                    <p class="text-gray-600">24/7 technical support and assistance from our team of experienced engineers.</p>
                </div>
            </div>
        </div>
    </section>



    <!-- Global Reach & Partnerships Section -->
    <section id="global" class="py-20 world-map">
        <div class="container px-4 mx-auto world-map-content">
            <div class="mb-8 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl text-">Global Reach</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
                <p class="mx-auto mt-4 max-w-2xl text-gray-800">Serving clients across continents with reliable power solutions and trusted partnerships.</p>
            </div>

            <div class="grid grid-cols-1 gap-12 items-center mb-8 md:grid-cols-2">
                <div>
                    <img src="{{ asset('imgs/ami-world.png') }}" alt="worldwide presence">
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

    <!-- Case Studies / Environments Section -->
@if ($blogs->count()) > 0
    <section class="py-10 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue">Case Studies & Environments</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
                <p class="mx-auto mt-4 max-w-2xl text-gray-600">Our generators excel in diverse environments, demonstrating adaptability and reliability.</p>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <!-- Rugged Terrains -->
                @foreach($blogs as $blog)
                <div class="overflow-hidden bg-white rounded-lg shadow-md hover-lift">
                    <img src="https://cdn.pixabay.com/photo/2016/09/02/18/38/factory-1639990_1280.jpg" alt="Rugged Terrains" class="object-cover w-full h-56" loading="lazy" decoding="async" width="400" height="224">
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-bold ami-blue">Rugged Terrains</h3>
                        <p class="mb-4 text-gray-600">Powering mining operations and remote construction sites in challenging environments with extreme temperatures and difficult access.</p>
                        <a href="#" class="font-medium text-ami-orange hover:underline">View Rugged Terrain Generator Case Study <i class="ml-1 fas fa-arrow-right"></i></a>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </section>
@endif
    <!-- Contact & Inquiry Section -->
    <section id="contact" class="py-5 bg-white">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue">Contact & Inquiry</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
                <p class="mx-auto mt-4 max-w-2xl text-gray-600">Get in touch with our team for inquiries, quotes, or support.</p>
            </div>

            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
                <!-- Contact Form -->
                <div>
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
                <div>
                    <h3 class="mb-6 text-2xl font-bold ami-blue">Get in Touch</h3>

                    <div class="mb-8 space-y-6">
                        <div class="flex items-start">
                            <div class="flex flex-shrink-0 justify-center items-center mr-4 w-12 h-12 rounded-full transition-all duration-300 bg-ami-blue hover:bg-ami-orange">
                                <i class="text-white fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h4 class="mb-1 font-bold">Headquarters</h4>
                                <p class="text-gray-600">6th of October City - 3rd Industrial Zone 54 St of 7 St. - Block 59, 61 - P.O. Box 48
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex flex-shrink-0 justify-center items-center mr-4 w-12 h-12 rounded-full transition-all duration-300 bg-ami-blue hover:bg-ami-orange">
                                <i class="text-white fas fa-phone"></i>
                            </div>
                            <div>
                                <h4 class="mb-1 font-bold">Phone</h4>
                                <a href="tel:+201223907708" class="text-gray-600">(+2) 01223907708</a><br>
                                <a href="tel:+201223295077" class="text-gray-600">(+2) 01223295077</a>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex flex-shrink-0 justify-center items-center mr-4 w-12 h-12 rounded-full transition-all duration-300 bg-ami-blue hover:bg-ami-orange">
                                <i class="text-white fas fa-envelope"></i>
                            </div>
                            <div>
                                <h4 class="mb-1 font-bold">Email</h4>
                                <a href="mailto:inquiry@amigenset.com" class="block text-gray-600" email="inquiry@amigenset.com">inquiry@amigenset.com </a>
                                <a href="mailto:info@amigenset.com" class="block text-gray-600" email="info@amigenset.com">info@amigenset.com </a>


                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex flex-shrink-0 justify-center items-center mr-4 w-12 h-12 rounded-full transition-all duration-300 bg-ami-blue hover:bg-ami-orange">
                                <i class="text-white fa-solid fa-fax"></i>
                            </div>
                            <div>
                                <h4 class="mb-1 font-bold">Fax</h4>
                                <a href="tel:+238206210" class="text-gray-600">(+2) 38206210</a>
                            </div>

                        </div>
                        <div class="flex items-start">
                            <div class="flex flex-shrink-0 justify-center items-center mr-4 w-12 h-12 rounded-full transition-all duration-300 bg-ami-blue hover:bg-ami-orange">
                                <i class="text-xl text-white fa-brands fa-whatsapp"></i>
                            </div>
                            <div>
                                <h4 class="mb-1 font-bold">WhatsApp </h4>
                                <a href="tel:+201223907708" class="text-gray-600">(+2) 01223907708</a>
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
@endsection
