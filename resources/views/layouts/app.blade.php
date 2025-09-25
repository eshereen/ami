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
    <!-- Performance: DNS Prefetch & Preconnect -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="dns-prefetch" href="//cdn.tailwindcss.com">
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.tailwindcss.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <!--Favicons-->
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="manifest" href="/site.webmanifest" />

    <!-- Tailwind CSS (deferred) -->
    <script defer src="https://cdn.tailwindcss.com"></script>
    <script>
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
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Font Awesome for icons (non-blocking) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </noscript>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

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
        'https://images.unsplash.com/photo-1496247749665-49cf5b1022e9?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGluZHVzdHJpZXN8ZW58MHwwfDB8fHww',
        'https://images.unsplash.com/photo-1613665813446-82a78c468a1d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80',
        'https://images.pexels.com/photos/2760241/pexels-photo-2760241.jpeg'
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
