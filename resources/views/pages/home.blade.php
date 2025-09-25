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
                    <a href="#products" class="px-8 py-3 font-bold text-white rounded-full transition transform bg-ami-orange hover:bg-orange-600 hover:scale-105">
                        Explore Products
                    </a>
                    <a href="#contact" class="px-8 py-3 font-bold text-white bg-transparent rounded-full border-2 border-white transition hover:bg-white hover:text-ami-blue">
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

                    <div class="mt-10">
                        <h4 class="mb-6 text-xl font-bold">Our Journey</h4>
                        <div class="relative">
                            <div class="absolute top-0 bottom-0 left-4 w-0.5 bg-ami-blue"></div>

                            <div class="relative pb-8 pl-10">
                                <div class="timeline-dot"></div>
                                <h5 class="text-lg font-bold">1983</h5>
                                <p class="text-gray-600">Founded as a local generator service provider</p>
                            </div>

                            <div class="relative pb-8 pl-10">
                                <div class="timeline-dot"></div>
                                <h5 class="text-lg font-bold">2005</h5>
                                <p class="text-gray-600">Established international presence</p>
                            </div>

                            <div class="relative pl-10">
                                <div class="timeline-dot"></div>
                                <h5 class="text-lg font-bold">Present</h5>
                                <p class="text-gray-600">Global leader in power solutions with clients worldwide</p>
                            </div>
                        </div>
                    </div>
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
                            class="object-contain w-full h-64 bg-gray-100"
                            loading="lazy"
                            decoding="async"
                            width="400"
                            height="256"
                            style="aspect-ratio: 400/256;"
                        >
                    </picture>

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
                                <h4 class="font-bold capitalize">Diesel Generating Set
                                </h4>
                                <p class="text-gray-600">Full range of reliable diesel generator power solutions.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="mt-1 mr-3 fas fa-check-circle text-ami-orange"></i>
                            <div>
                                <h4 class="font-bold capitalize">Fuel Storage Tanks
                                </h4>
                                <p class="text-gray-600">Distant job site location is no longer an issue with our storage tank solutions.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="mt-1 mr-3 fas fa-check-circle text-ami-orange"></i>
                            <div>
                                <h4 class="font-bold capitalize">Marine Gensets</h4>
                                <p class="text-gray-600">Where performance & reliability are critical the most.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="mt-1 mr-3 fas fa-check-circle text-ami-orange"></i>
                            <div>
                                <h4 class="font-bold capitalize">Trailers
                                </h4>
                                <p class="text-gray-600">On the Job site, rough terrain or on a boat, various accessories to meet your application requirement perfectly.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="mt-1 mr-3 fas fa-check-circle text-ami-orange"></i>
                            <div>
                                <h4 class="font-bold capitalize">Flood Light
                                </h4>
                                <p class="text-gray-600">Ease your night working days with the right Flood Light Set.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="mt-1 mr-3 fas fa-check-circle text-ami-orange"></i>
                            <div>
                                <h4 class="font-bold capitalize">Low Voltage Panels
                                </h4>
                                <p class="text-gray-600">LCompatible, High-Quality Low Voltage panels Distribution Switchgear, Lighting panels, Synchronization panels and ATS.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

           {{--   <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <div class="p-6 text-center rounded-lg bg-ami-light-blue">
                    <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80" alt="Workshop" class="object-cover mb-4 w-full h-48 rounded-lg">
                    <h4 class="mb-2 font-bold ami-blue">Modern Workshops</h4>
                    <p class="text-gray-600">Equipped with advanced machinery and technology for precision manufacturing.</p>
                </div>

                <div class="p-6 text-center rounded-lg bg-ami-light-blue">
                    <img src="https://images.unsplash.com/photo-1613665813446-82a78c468a1d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80" alt="Quality Control" class="object-cover mb-4 w-full h-48 rounded-lg">
                    <h4 class="mb-2 font-bold ami-blue">Quality Control</h4>
                    <p class="text-gray-600">Rigorous testing and quality assurance processes at every production stage.</p>
                </div>

                <div class="p-6 text-center rounded-lg bg-ami-light-blue">
                    <img src="https://images.unsplash.com/photo-1581094271901-8022df4466f9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80" alt="Skilled Team" class="object-cover mb-4 w-full h-48 rounded-lg">
                    <h4 class="mb-2 font-bold ami-blue">Skilled Team</h4>
                    <p class="text-gray-600">Experienced engineers and technicians dedicated to excellence.</p>
                </div>
            </div>--}}
        </div>
    </section>

    <!-- Global Reach & Partnerships Section -->
    <section id="global" class="py-20 world-map">
        <div class="container px-4 mx-auto world-map-content">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl text-">Global Reach & Partnerships</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
                <p class="mx-auto mt-4 max-w-2xl text-gray-800">Serving clients across continents with reliable power solutions and trusted partnerships.</p>
            </div>

            <div class="grid grid-cols-1 gap-12 items-center mb-16 md:grid-cols-2">
               <div class="p-8 bg-white bg-opacity-90 rounded-lg">
                    <h3 class="mb-6 text-2xl font-bold ami-blue">Worldwide Presence</h3>
                    <p class="mb-6 text-gray-700">
                        From our headquarters, we've expanded our reach to serve clients in over 50 countries across the Middle East, Africa, Asia, and Europe. Our global network of partners and service centers ensures prompt support wherever our clients operate.
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center">
                            <div class="text-3xl font-bold ami-orange">50+</div>
                            <div class="text-gray-600">Countries</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold ami-orange">5000+</div>
                            <div class="text-gray-600">Projects Completed</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold ami-orange">100+</div>
                            <div class="text-gray-600">Partners</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold ami-orange">24/7</div>
                            <div class="text-gray-600">Support</div>
                        </div>
                    </div>
                </div>

                <div class="p-8 bg-white bg-opacity-90 rounded-lg">
                    <h3 class="mb-6 text-2xl font-bold ami-blue">Trusted Partners</h3>
                    <p class="mb-6 text-gray-700">
                        We collaborate with leading industry partners to deliver the best power solutions. Our partners include:
                    </p>
                    <div class="grid grid-cols-3 gap-4 items-center">
                        <a href="https://www.avk.com" class="flex justify-center items-center p-4 h-auto bg-gray-100 rounded-lg">
                            <img src="{{ asset('imgs/avk.png') }}" alt="avk" class="object-cover w-full h-full">
                        </a>
                        <a href="https://www.detuz.com" class="flex justify-center items-center p-4 h-auto bg-gray-100 rounded-lg">
                            <img src="{{ asset('imgs/detuz.png') }}" alt="detus" class="object-cover w-full h-full">
                        </a>
                        <a href="https://www.doosan.com" class="flex justify-center items-center p-4 h-auto bg-gray-100 rounded-lg">
                            <img src="{{ asset('imgs/doosan.png') }}" alt="doosan" class="object-cover w-full h-full">
                        </a>
                        <a href="https://www.iveco.com" class="flex justify-center items-center p-4 h-auto bg-gray-100 rounded-lg">
                            <img src="{{ asset('imgs/iveco.png') }}" alt="iveco" class="object-cover w-full h-full">
                        </a>
                        <a href="https://www.marathonelectric.com" class="flex justify-center items-center p-4 h-auto bg-gray-100 rounded-lg">
                            <img src="{{ asset('imgs/marathon.png') }}" alt="marathon" class="object-cover w-full h-full">
                        </a>
                        <a href="https://www.volvopenta.com" class="flex justify-center items-center p-4 h-auto bg-gray-100 rounded-lg">
                            <img src="{{ asset('imgs/volvo.png') }}" alt="volvo" class="object-cover w-full h-full">
                        </a>
                        <a href="https://www.mtu-online.com" class="flex justify-center items-center p-4 h-auto bg-gray-100 rounded-lg">
                            <img src="{{ asset('imgs/mtu.png') }}" alt="mtu" class="object-cover w-full h-full">
                        </a>
                        <a href="https://www.stamford-avk.com" class="flex justify-center items-center p-4 h-auto bg-gray-100 rounded-lg">
                            <img src="{{ asset('imgs/stamford.png') }}" alt="stamford" class="object-cover w-full h-full">
                        </a>
                        <a href="https://www.perkins.com" class="flex justify-center items-center p-4 h-20 bg-gray-100 rounded-lg">
                            <img src="{{ asset('imgs/perkins.png') }}" alt="perkins" class="object-cover w-full h-full">
                        </a>
                        <a href="https://www.meccalte.com" class="flex justify-center items-center p-4 h-20 bg-gray-100 rounded-lg">
                            <img src="{{ asset('imgs/mecc-alta.png') }}" alt="meccalte" class="object-cover w-full h-full">
                        </a>
                        <a href="https://acim.nidec.com/en-US/motors/leroy-somer" class="flex justify-center items-center p-4 h-auto bg-gray-100 rounded-lg">
                            <img src="{{ asset('imgs/leroysomer.png') }}" alt="leroysomer" class="object-cover w-full h-full">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Case Studies / Environments Section -->

    <section class="py-20 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue">Case Studies & Environments</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
                <p class="mx-auto mt-4 max-w-2xl text-gray-600">Our generators excel in diverse environments, demonstrating adaptability and reliability.</p>
            </div>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <!-- Rugged Terrains -->
                <div class="overflow-hidden bg-white rounded-lg shadow-md hover-lift">
                    <img src="https://cdn.pixabay.com/photo/2016/09/02/18/38/factory-1639990_1280.jpg" alt="Rugged Terrains" class="object-cover w-full h-56" loading="lazy" decoding="async" width="400" height="224">
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-bold ami-blue">Rugged Terrains</h3>
                        <p class="mb-4 text-gray-600">Powering mining operations and remote construction sites in challenging environments with extreme temperatures and difficult access.</p>
                        <a href="#" class="font-medium text-ami-orange hover:underline">View Rugged Terrain Generator Case Study <i class="ml-1 fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Urban Setups -->
                <div class="overflow-hidden bg-white rounded-lg shadow-md hover-lift">
                    <img src="https://cdn.pixabay.com/photo/2019/12/22/07/45/trailer-4711979_1280.jpg" alt="Urban Setups" class="object-cover w-full h-56" loading="lazy" decoding="async" width="400" height="224">
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-bold ami-blue">Urban Setups</h3>
                        <p class="mb-4 text-gray-600">Providing backup power for hospitals, data centers, and commercial buildings in densely populated urban areas with strict noise regulations.</p>
                        <a href="#" class="font-medium text-ami-orange hover:underline">View Urban Setup Generator Case Study <i class="ml-1 fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Marine Environments -->
                <div class="overflow-hidden bg-white rounded-lg shadow-md hover-lift">
                    <img src="https://cdn.pixabay.com/photo/2015/10/28/12/31/motor-1010495_1280.jpg" alt="Marine Environments" class="object-cover w-full h-56" loading="lazy" decoding="async" width="400" height="224">
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-bold ami-blue">Marine Environments</h3>
                        <p class="mb-4 text-gray-600">Specialized generators for offshore platforms, ports, and marine vessels with corrosion-resistant materials and saltwater protection.</p>
                        <a href="#" class="font-medium text-ami-orange hover:underline">View Marine Generator Case Study <i class="ml-1 fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact & Inquiry Section -->
    <section id="contact" class="py-20 bg-white">
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
                    <form method="post" action="{{ route('contact.store') }}" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block mb-2 font-medium text-gray-700">Name</label>
                            <input type="text" id="name" name="name" class="px-4 py-2 w-full rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-ami-blue focus:border-transparent">
                        </div>

                        <div>
                            <label for="email" class="block mb-2 font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" class="px-4 py-2 w-full rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-ami-blue focus:border-transparent">
                        </div>

                        <div>
                            <label for="phone" class="block mb-2 font-medium text-gray-700">Phone</label>
                            <input type="tel" id="phone" name="phone" class="px-4 py-2 w-full rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-ami-blue focus:border-transparent">
                        </div>

                        <div>
                            <label for="message" class="block mb-2 font-medium text-gray-700">Your Message</label>
                            <textarea id="message" name="message" rows="4" class="px-4 py-2 w-full rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-ami-blue focus:border-transparent"></textarea>
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
                                <a href="tel:(+2) 01223907708" class="text-gray-600" tel="(+2) 01223907708">(+2) 01223907708</a><br>
                                <a href="tel:(+2) 01223295077" class="text-gray-600" tel="(+2) 01223295077">(+2) 01223295077</a>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex flex-shrink-0 justify-center items-center mr-4 w-12 h-12 rounded-full transition-all duration-300 bg-ami-blue hover:bg-ami-orange">
                                <i class="text-white fas fa-envelope"></i>
                            </div>
                            <div>
                                <h4 class="mb-1 font-bold">Email</h4>
                                <a href="mailto:inquiry@amigenset.com" class="text-gray-600" email="inquiry@amigenset.com">inquiry@amigenset.com</a>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex flex-shrink-0 justify-center items-center mr-4 w-12 h-12 rounded-full transition-all duration-300 bg-ami-blue hover:bg-ami-orange">
                                <i class="text-white fas fa-clock"></i>
                            </div>
                            <div>
                                <h4 class="mb-1 font-bold">Fax</h4>
                                <a href="tel:(+2) 38206210" class="text-gray-600" tel="(+2) 38206210">(+2) 38206210</a>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center items-center h-64 bg-gray-200 rounded-lg transition-all duration-300 hover:bg-gray-300">
                        <div class="relative w-full h-full">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13830.033018943786!2d30.923326!3d29.936056000000004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14585539d61dafb7%3A0x5b0f7c23fd598347!2zQWwgTW9oYW5kZXMgSW50ZXJuYXRpb25hbCAtINin2YTZhdmH2YbYr9izINin2YTYr9mI2YTZitipINmE2YTZhdmI2YTYr9in2Ko!5e0!3m2!1sen!2seg!4v1758542923568!5m2!1sen!2seg" width="730" height="250" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
