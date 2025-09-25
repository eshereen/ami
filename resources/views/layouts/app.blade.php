<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Dynamic SEO Meta Tags -->
    <title>@yield('title', 'Al Mohandes International - Leading Diesel Generator Manufacturer Since 1983')</title>
    <meta name="description" content="@yield('description', 'Al Mohandes International (AMI) is a leading diesel generator manufacturer in Egypt, providing integrated power solutions to global markets since 1983.')">
    <meta name="keywords" content="@yield('keywords', 'diesel generators, power generation, gensets, backup power, marine generators, industrial generators, Egypt, AMI')">
    <meta name="author" content="Al Mohandes International">
    <meta name="robots" content="@yield('robots', 'index, follow')">
    <meta name="googlebot" content="@yield('robots', 'index, follow')">
    <meta name="google" content="notranslate">
    <meta name="google-site-verification" content="google-site-verification=1234567890">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph Meta Tags -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:title" content="@yield('og_title', 'Al Mohandes International - Leading Diesel Generator Manufacturer')">
    <meta property="og:description" content="@yield('og_description', 'Leading diesel generator manufacturer in Egypt providing power solutions globally since 1983.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Al Mohandes International">
    <meta property="og:image" content="@yield('og_image', asset('imgs/ami-logo.png'))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="en_US">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Al Mohandes International - Diesel Generator Manufacturer')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Leading diesel generator manufacturer in Egypt providing power solutions globally since 1983.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('imgs/ami-logo.png'))">

    <!-- Additional SEO Meta Tags -->
    <meta name="theme-color" content="#0056b3">
    <meta name="msapplication-TileColor" content="#0056b3">
    <meta name="format-detection" content="telephone=no">
    <!-- Critical Resource Hints -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="//images.unsplash.com">
    <link rel="dns-prefetch" href="//cdn.pixabay.com">
    <link rel="dns-prefetch" href="//images.pexels.com">

    <!-- Preload critical fonts -->
    <link rel="preload" href="https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu4mxKKTU1Kg.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WlhyyTh89Y.woff2" as="font" type="font/woff2" crossorigin>
    <!--Favicons-->
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="manifest" href="/site.webmanifest" />

    <!-- Inline Critical CSS -->
    <style>
        /* Critical CSS - Above the fold styling */
        body{margin:0;font-family:'Roboto',sans-serif;line-height:1.6}
        h1,h2,h3,h4,h5,h6{font-family:'Montserrat',sans-serif;font-weight:700}
        .container{max-width:1200px;margin:0 auto;padding:0 1rem}
        .bg-ami-blue{background-color:#0056b3}
        .bg-ami-orange{background-color:#ff7700}
        .text-white{color:#fff}
        .flex{display:flex}
        .items-center{align-items:center}
        .justify-center{justify-content:center}
        .justify-between{justify-content:space-between}
        .relative{position:relative}
        .absolute{position:absolute}
        .h-screen{height:100vh}
        .h-full{height:100%}
        .w-full{width:100%}
        .inset-0{top:0;right:0;bottom:0;left:0}
        .z-10{z-index:10}
        .z-50{z-index:50}
        .text-center{text-align:center}
        .text-4xl{font-size:2.25rem}
        .text-xl{font-size:1.25rem}
        .mb-4{margin-bottom:1rem}
        .mb-8{margin-bottom:2rem}
        .py-3{padding-top:0.75rem;padding-bottom:0.75rem}
        .px-8{padding-left:2rem;padding-right:2rem}
        .bg-opacity-50{background-opacity:0.5}
        .rounded-full{border-radius:9999px}
        .transition{transition-duration:150ms}
        .hover\:bg-orange-600:hover{background-color:#ea580c}
        .bg-transparent{background-color:transparent}
        .border-2{border-width:2px}
        .border-white{border-color:#fff}
        .hidden{display:none}
        @media(min-width:768px){
            .md\:flex{display:flex}
            .md\:text-6xl{font-size:3.75rem}
            .md\:text-2xl{font-size:1.5rem}
        }
        @media(min-width:640px){
            .sm\:flex-row{flex-direction:row}
        }
        .fade-in{animation:fadeIn 1s ease-in}
        @keyframes fadeIn{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
    </style>

    <!-- Load Tailwind CSS asynchronously -->
    <link rel="preload" href="https://cdn.tailwindcss.com" as="script">
    <script>
        const tailwindScript = document.createElement('script');
        tailwindScript.src = 'https://cdn.tailwindcss.com';
        tailwindScript.onload = function() {
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            'ami-blue': '#0056b3',
                            'ami-orange': '#ff7700',
                            'ami-light-blue': '#e6f2ff'
                        }
                    }
                }
            }
        };
        document.head.appendChild(tailwindScript);
    </script>

    <!-- Alpine.js (optimized loading) -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" as="script">
    <script>
        window.addEventListener('load', function() {
            const alpineScript = document.createElement('script');
            alpineScript.src = 'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js';
            alpineScript.defer = true;
            document.head.appendChild(alpineScript);
        });
    </script>

    <!-- Font Awesome for icons (non-blocking) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </noscript>

    <!-- Google Fonts (non-blocking) -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    </noscript>

    <!-- Preload likely LCP hero image -->
    <link rel="preload" as="image" href="https://images.unsplash.com/photo-1496247749665-49cf5b1022e9?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGluZHVzdHJpZXN8ZW58MHwwfDB8fHww" fetchpriority="high">

    <style>
        :root {
            --ami-blue: #0056b3;
            --ami-orange: #ff7700;
            --ami-light-blue: #e6f2ff;
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
        }

        .ami-blue {
            color: var(--ami-blue);
        }

        .ami-orange {
            color: var(--ami-orange);
        }

        .bg-ami-blue {
            background-color: var(--ami-blue);
        }

        .bg-ami-orange {
            background-color: var(--ami-orange);
        }

        .bg-ami-light-blue {
            background-color: var(--ami-light-blue);
        }

        .border-ami-blue {
            border-color: var(--ami-blue);
        }

        .border-ami-orange {
            border-color: var(--ami-orange);
        }

        .text-shadow {
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .smooth-scroll {
            scroll-behavior: smooth;
        }

        .fade-in {
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-slider {
            transition: opacity 0.8s ease-in-out;
        }

        .timeline-dot {
            position: relative;
        }

        .timeline-dot::before {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: var(--ami-blue);
            top: -10px;
            left: -26px;
            transform: translateX(-50%);
        }
        [x-cloak] { display: none !important; }
        .product-card {
            transition: all 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
        .fade-in {
            animation: fadeIn 0.8s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="smooth-scroll" x-data="{
    mobileMenuOpen: false,
    currentSlide: 0,
    slides: [
        '{{ asset('imgs/slide.webp') }}',
        '{{ asset('imgs/slide-1.webp') }}',
        '{{ asset('imgs/slide-2.webp') }}'
    ],
    init() {
        setInterval(() => {
            this.currentSlide = (this.currentSlide + 1) % this.slides.length;
        }, 5000);
    }
}">

@include('layouts.navbar')
@yield('content')
@include('layouts.footer')

<script>
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

</script>

<!-- Structured Data (JSON-LD) -->
@php
    $orgJsonLd = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'Al Mohandes International',
        'alternateName' => 'AMI',
        'url' => url('/'),
        'logo' => asset('imgs/logo.png'),
        'description' => 'Leading diesel generator manufacturer in Egypt providing integrated power solutions to global markets since 1983.',
        'foundingDate' => '1983',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => '6th of October City - 3rd Industrial Zone 54 St of 7 St. - Block 59, 61',
            'addressLocality' => '6th of October City',
            'addressCountry' => 'Egypt',
        ],
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'telephone' => '+2-01223907708',
            'contactType' => 'customer service',
            'email' => 'inquiry@amigenset.com',
        ],
        'sameAs' => [
            'http://www.facebook.com/Al-Mohandes-International-AMI-469567549743548',
            'http://www.youtube.com/user/amigenset',
            'http://www.linkedin.com/company/almohandesinternational',
        ],
        'areaServed' => 'Worldwide',
        'industry' => 'Power Generation Equipment Manufacturing',
    ];
@endphp
<script type="application/ld+json">{!! json_encode($orgJsonLd, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>

@yield('structured_data')

</body>
</html>
