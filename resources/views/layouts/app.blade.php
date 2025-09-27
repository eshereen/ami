<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="theme-color" content="#1e40af">
    <meta name="color-scheme" content="light">
    <meta name="format-detection" content="telephone=no">
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
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="dns-prefetch" href="//cdn.tailwindcss.com">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">

    <!-- Preload LCP hero images with mobile optimization -->
    <link rel="preload" as="image" href="{{ asset('imgs/slide-mobile.webp') }}" media="(max-width: 768px)" fetchpriority="high">
    <link rel="preload" as="image" href="{{ asset('imgs/slide.webp') }}" media="(min-width: 769px)" fetchpriority="high">

    <!-- Optimized font loading with font-display swap -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu4mxKKTU1Kg.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WlhyyTh89Y.woff2" as="font" type="font/woff2" crossorigin>

    <!-- Font CSS with font-display swap -->
    <style>
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url('https://fonts.gstatic.com/s/roboto/v30/KFOmCnqEu92Fr1Mu4mxKKTU1Kg.woff2') format('woff2');
        }
        @font-face {
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url('https://fonts.gstatic.com/s/montserrat/v25/JTUSjIg1_i6t8kCHKm459WlhyyTh89Y.woff2') format('woff2');
        }
    </style>
    <!--Favicons-->
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="manifest" href="/site.webmanifest" />

    <!-- Ultra-minimal Critical CSS for mobile FCP -->
    <style>
        /* Essential mobile-first critical CSS only */
        *{box-sizing:border-box;margin:0;padding:0}
        html{font-size:16px;-webkit-text-size-adjust:100%;overflow-x:hidden}
        body{margin:0;font-family:system-ui,-apple-system,sans-serif;line-height:1.6;overflow-x:hidden}

        /* Hero section - absolute minimum */
        .relative{position:relative}
        .absolute{position:absolute}
        .h-screen{height:100vh;min-height:600px}
        .inset-0{top:0;right:0;bottom:0;left:0}
        .z-10{z-index:10}
        .flex{display:flex}
        .items-center{align-items:center}
        .justify-center{justify-content:center}
        .text-center{text-align:center}
        .text-white{color:#fff}
        .overflow-hidden{overflow:hidden}

        /* Hero image optimization */
        .hero-section{contain:layout style paint}
        .hero-slider{width:100%;height:100%;position:absolute;top:0;left:0;contain:layout}
        .hero-slider img{width:100%;height:100%;object-fit:cover;object-position:center}

        /* Critical typography only */
        .text-4xl{font-size:2rem;line-height:1.1;font-weight:700}
        .text-xl{font-size:1.125rem;line-height:1.4}
        .mb-4{margin-bottom:1rem}
        .mb-8{margin-bottom:1.5rem}
        .px-4{padding-left:1rem;padding-right:1rem}
        .max-w-3xl{max-width:48rem;margin:0 auto}

        /* Essential performance */
        .bg-black{background-color:#000}
        .bg-opacity-50{background-color:rgba(0,0,0,0.5)}
        header{z-index:1000;position:sticky;top:0}

        /* Desktop only */
        @media(min-width:769px){
            .z-10{z-index:10}
            .flex{display:flex}
            .items-center{align-items:center}
            .justify-center{justify-content:center}
            .max-w-3xl{max-width:48rem;margin:0 auto}
            .px-4{padding-left:1rem;padding-right:1rem}
            .text-center{text-align:center}
            .text-white{color:#fff}
            .overflow-hidden{overflow:hidden}
            .text-4xl{font-size:3.75rem}
            .text-xl{font-size:1.5rem}
            .mb-4{margin-bottom:1rem}
            .mb-8{margin-bottom:2rem}
            .bg-black{background-color:#000}
            .bg-opacity-50{background-color:rgba(0,0,0,0.5)}
            header{z-index:1000;position:sticky;top:0}
            /* Prevent CLS */
            img,picture{height:auto;max-width:100%}
            [style*="aspect-ratio"]{contain:layout}
            .mobile-menu{display:none}
            .mobile-menu.active{display:block}
            @media(max-width:767px){
                .mobile-menu-toggle{display:block}
            }
        }
    </style>

    <!-- Critical CSS inline for immediate rendering -->
    <style>
        /* Critical above-the-fold styles */
        .hero-section { height: calc(100vh - 72px); margin-top: -72px; }
        .hero-slider { width: 100%; height: 100%; position: absolute; top: 0; left: 0; }
        .hero-slider img { width: 100%; height: 100%; object-fit: cover; object-position: center; }
        .fixed { position: fixed; }
        .top-0 { top: 0; }
        .left-0 { left: 0; }
        .right-0 { right: 0; }
        .z-50 { z-index: 50; }
        .transition-all { transition: all 0.3s ease; }
        .duration-300 { transition-duration: 300ms; }
        .bg-transparent { background-color: transparent; }
        .bg-white { background-color: white; }
        .shadow-md { box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
        .text-white { color: white; }
        .text-gray-700 { color: #374151; }
        .hover\:text-ami-orange:hover { color: #ff7700; }
        .h-14 { height: 3.5rem; }
        .transition-all { transition: all 0.3s ease; }
        .duration-300 { transition-duration: 300ms; }
    </style>

    <!-- Non-critical CSS loaded asynchronously -->
    <link rel="preload" href="{{ Vite::asset('resources/css/app.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}"></noscript>

    <!-- Tailwind CDN with error handling -->
    <script>
        // Load Tailwind with error handling and fallback
        (function() {
            const script = document.createElement('script');
            script.src = 'https://cdn.tailwindcss.com';
            script.async = true;
            script.onload = function() {
                try {
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
                    };
                } catch (e) {
                    console.warn('Tailwind config error:', e);
                }
            };
            script.onerror = function() {
                console.warn('Tailwind CDN failed to load');
                // Load fallback CSS
                const fallbackCSS = document.createElement('link');
                fallbackCSS.rel = 'stylesheet';
                fallbackCSS.href = '{{ asset("css/fallback.css") }}';
                document.head.appendChild(fallbackCSS);
            };
            document.head.appendChild(script);
        })();
    </script>

    <!-- Alpine.js with optimized loading -->
    <script>
        // Load Alpine.js with performance optimization
        (function() {
            const script = document.createElement('script');
            script.src = 'https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js';
            script.defer = true;
            script.onload = function() {
                console.log('Alpine.js loaded successfully');
            };
            script.onerror = function() {
                console.warn('Primary Alpine.js CDN failed, trying fallback');
                // Try fallback CDN
                const fallbackScript = document.createElement('script');
                fallbackScript.src = 'https://unpkg.com/alpinejs@3.13.3/dist/cdn.min.js';
                fallbackScript.defer = true;
                fallbackScript.onerror = function() {
                    console.error('All Alpine.js CDN sources failed');
                    initializeNavbarFallback();
                };
                document.head.appendChild(fallbackScript);
            };
            document.head.appendChild(script);
        })();

        function initializeNavbarFallback() {
            console.warn('Initializing navbar fallback');
            document.body.classList.add('navbar-fallback');
        }
    </script>

    <!-- Non-critical JavaScript loaded asynchronously -->
    <script>
        // Load Font Awesome asynchronously
        (function() {
            const link = document.createElement('link');
            link.rel = 'stylesheet';
            link.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css';
            link.media = 'print';
            link.onload = function() { this.media = 'all'; };
            document.head.appendChild(link);
        })();

        // Simple mobile menu fix
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                const mobileToggle = document.querySelector('[data-mobile-toggle]');
                const mobileMenu = document.querySelector('[data-mobile-menu]');
                const header = document.querySelector('header');

                if (mobileToggle && mobileMenu && header) {
                    // Remove Alpine.js attributes that might be causing conflicts
                    mobileMenu.removeAttribute('x-cloak');
                    mobileMenu.removeAttribute('x-show');
                    mobileMenu.removeAttribute('x-transition:enter');
                    mobileMenu.removeAttribute('x-transition:leave');

                    // Ensure menu is initially hidden
                    mobileMenu.style.display = 'none';

                    // Function to update mobile button color based on scroll
                    const updateMobileButtonColor = () => {
                        const scrolled = window.scrollY > 50;
                        const isHomePage = window.location.pathname === '/';

                        if (scrolled || !isHomePage) {
                            mobileToggle.classList.remove('text-white');
                            mobileToggle.classList.add('text-gray-700');
                        } else {
                            mobileToggle.classList.remove('text-gray-700');
                            mobileToggle.classList.add('text-white');
                        }
                    };

                    // Initialize button color
                    updateMobileButtonColor();

                    // Update on scroll
                    window.addEventListener('scroll', updateMobileButtonColor, { passive: true });

                    // Simple toggle functionality
                    mobileToggle.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        if (mobileMenu.style.display === 'none') {
                            mobileMenu.style.display = 'block';
                            mobileMenu.style.opacity = '1';
                            mobileMenu.style.transform = 'scale(1)';
                        } else {
                            mobileMenu.style.display = 'none';
                        }
                    });

                    // Close menu when clicking outside
                    document.addEventListener('click', function(e) {
                        if (!mobileMenu.contains(e.target) && !mobileToggle.contains(e.target)) {
                            mobileMenu.style.display = 'none';
                        }
                    });
                }
            }, 100);
        });
    </script>


    <style>
        :root {
            --ami-blue: #0056b3;
            --ami-orange: #ff7700;
            --ami-light-blue: #e6f2ff;
        }

        body {
            font-family: 'Roboto', sans-serif;
            padding-top: 72px; /* Account for fixed header */
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

        /* Navbar dropdown positioning fix */
        .navbar-dropdown {
            transform: translateZ(0); /* Force hardware acceleration */
            will-change: transform, opacity;
        }

        /* Ensure proper z-index stacking */
        header {
            z-index: 1000 !important;
        }

        .navbar-dropdown {
            z-index: 1001 !important;
        }

        /* Hero section z-index management */
        .hero-section {
            z-index: 1;
        }
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

        /* Hero slider improvements */
        .hero-slider {
            z-index: 1;
        }
        .hero-slider img {
            object-fit: cover;
            object-position: center;
        }

        /* Debug - remove in production */
        [x-cloak] { display: none !important; }

        /* Notification Styles */
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            max-width: 400px;
            padding: 16px 20px;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transform: translateX(100%);
            transition: all 0.3s ease-in-out;
        }

        .notification.show {
            transform: translateX(0);
        }

        .notification.success {
            background-color: #10b981;
            color: white;
        }

        .notification.error {
            background-color: #ef4444;
            color: white;
        }

        .notification.warning {
            background-color: #f59e0b;
            color: white;
        }

        .notification.info {
            background-color: #3b82f6;
            color: white;
        }

        .notification-close {
            position: absolute;
            top: 8px;
            right: 12px;
            background: none;
            border: none;
            color: inherit;
            cursor: pointer;
            font-size: 18px;
            opacity: 0.7;
            transition: opacity 0.2s;
        }

        .notification-close:hover {
            opacity: 1;
        }

        /* Navbar fallback styles */
        .navbar-dropdown {
            transition: opacity 0.3s ease;
        }

        /* Enhanced dropdown positioning and behavior */
        .navbar-dropdown {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        @media (max-width: 768px) {
            .navbar-dropdown {
                position: fixed !important;
                left: 1rem !important;
                right: 1rem !important;
                top: 5rem !important;
                transform: none !important;
                width: auto !important;
                max-width: none !important;
            }
        }

        @media (min-width: 769px) {
            .navbar-dropdown {
                position: fixed !important;
                left: 0 !important;
                right: 0 !important;
                top: 72px !important; /* match header height */
                width: 100vw !important;
                max-width: none !important;
                margin-left: 0 !important;
                margin-right: 0 !important;
                transform: none !important;
            }
        }

        .mobile-menu {
            transition: all 0.2s ease;
            transform-origin: top;
        }

        /* Ensure navbar works without Alpine.js */
        [x-cloak] {
            display: none !important;
        }

        /* Only hide mobile menu with x-cloak, not the entire header */
        .mobile-menu[x-cloak] {
            display: none !important;
        }

        /* Ensure navbar dropdowns are hidden with x-cloak */
        .navbar-dropdown[x-cloak] {
            display: none !important;
        }

        /* Mobile menu positioning and visibility */
        .mobile-menu {
            position: absolute !important;
            top: 100% !important;
            left: 1rem !important;
            right: 1rem !important;
            z-index: 1000 !important;
            background: white !important;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
            border-radius: 0.5rem !important;
            border: 1px solid rgba(0, 0, 0, 0.1) !important;
        }

        /* Ensure header has proper positioning */
        header {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            z-index: 50 !important;
        }

        /* Override Alpine.js x-cloak for mobile menu */
        .mobile-menu[x-cloak] {
            display: none !important;
        }

        /* Fallback for when Alpine.js is not available */
        .navbar-fallback .navbar-dropdown {
            display: none !important;
        }

        .navbar-dropdown.show {
            display: block !important;
            opacity: 1 !important;
        }

        .navbar-fallback .mobile-menu {
            display: none !important;
        }

        .navbar-fallback .mobile-menu.show {
            display: block !important;
        }

        /* Fix mobile menu flashing */
        .mobile-menu[x-cloak] {
            display: none !important;
        }

        /* Prevent mobile menu from showing initially */
        @media (max-width: 767px) {
            .mobile-menu {
                display: none;
            }

            .mobile-menu.show {
                display: block;
            }
        }
    </style>
</head>
<body class="smooth-scroll">

@include('layouts.navbar')

<!-- Flash Message Notifications -->
@if(session('success'))
    <div class="notification success" id="notification">
        <button class="notification-close" onclick="closeNotification()">&times;</button>
        <div class="flex items-center">
            <i class="mr-3 fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="notification error" id="notification">
        <button class="notification-close" onclick="closeNotification()">&times;</button>
        <div class="flex items-center">
            <i class="mr-3 fas fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
        </div>
    </div>
@endif

@if(session('warning'))
    <div class="notification warning" id="notification">
        <button class="notification-close" onclick="closeNotification()">&times;</button>
        <div class="flex items-center">
            <i class="mr-3 fas fa-exclamation-triangle"></i>
            <span>{{ session('warning') }}</span>
        </div>
    </div>
@endif

@if(session('info'))
    <div class="notification info" id="notification">
        <button class="notification-close" onclick="closeNotification()">&times;</button>
        <div class="flex items-center">
            <i class="mr-3 fas fa-info-circle"></i>
            <span>{{ session('info') }}</span>
        </div>
    </div>
@endif

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

    // Notification system
    function showNotification() {
        const notification = document.getElementById('notification');
        if (notification) {
            // Add show class to trigger animation
            notification.classList.add('show');

            // Auto-hide after 5 seconds
            setTimeout(() => {
                closeNotification();
            }, 5000);
        }
    }

    function closeNotification() {
        const notification = document.getElementById('notification');
        if (notification) {
            notification.classList.remove('show');
            // Remove element after animation completes
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
            }, 300);
        }
    }

    // Initialize notifications when page loads
    document.addEventListener('DOMContentLoaded', function() {
        try {
            showNotification();
        } catch (e) {
            console.warn('Notification system error:', e);
        }
    });

    // Global error handler to prevent white pages
    window.addEventListener('error', function(e) {
        console.error('JavaScript error:', e.error);
        // Don't let errors break the page
        e.preventDefault();
        return false;
    });

    // Unhandled promise rejection handler
    window.addEventListener('unhandledrejection', function(e) {
        console.error('Unhandled promise rejection:', e.reason);
        e.preventDefault();
    });

    // Debug information for live server
    console.log('Page loaded successfully');
    console.log('Alpine.js available:', typeof Alpine !== 'undefined');
    console.log('Tailwind available:', typeof tailwind !== 'undefined');
    console.log('Font Awesome available:', typeof FontAwesome !== 'undefined');

    // Navbar fallback functionality (in case Alpine.js fails)
    document.addEventListener('DOMContentLoaded', function() {
        // Check if Alpine.js is available immediately
        if (typeof Alpine === 'undefined') {
            console.warn('Alpine.js not loaded, initializing navbar fallback...');
            document.body.classList.add('navbar-fallback');
            initializeNavbarFallback();
        } else {
            // Alpine.js is available, but add a safety net
            setTimeout(function() {
                const mobileToggle = document.querySelector('[data-mobile-toggle]');
                const mobileMenu = document.querySelector('[data-mobile-menu]');

                if (mobileToggle && mobileMenu) {
                    // Check if Alpine.js is actually working
                    mobileToggle.addEventListener('click', function() {
                        setTimeout(function() {
                            if (mobileMenu.style.display === 'none' && !mobileMenu.hasAttribute('x-show')) {
                                console.warn('Alpine.js not working properly, switching to fallback');
                                document.body.classList.add('navbar-fallback');
                                initializeNavbarFallback();
                            }
                        }, 100);
                    });
                }
            }, 500);
        }
    });

    function initializeNavbarFallback() {
        console.log('Initializing performance-optimized navbar fallback');

        const header = document.querySelector('header');
        const mobileToggle = document.querySelector('[data-mobile-toggle]');
        const mobileMenu = document.querySelector('[data-mobile-menu]');

        // Handle scroll-based header styling (maintains original behavior)
        if (header) {
            const isHomePage = window.location.pathname === '/';

            const handleScroll = () => {
                const scrolled = window.scrollY > 50;

                if (scrolled) {
                    header.classList.add('bg-white', 'shadow-md');
                    header.classList.remove('bg-transparent');
                } else if (isHomePage) {
                    header.classList.remove('bg-white', 'shadow-md');
                    header.classList.add('bg-transparent');
                }
            };

            // Initialize scroll state
            handleScroll();

            // Add optimized scroll listener
            window.addEventListener('scroll', handleScroll, { passive: true });
        }

        // Mobile menu fallback - Enhanced version
        if (mobileToggle && mobileMenu) {
            console.log('Setting up mobile menu fallback');

            // Remove Alpine-specific attributes to prevent conflicts
            mobileToggle.removeAttribute('@click');
            mobileMenu.removeAttribute('@click.away');
            mobileMenu.removeAttribute('x-cloak');
            mobileMenu.removeAttribute('x-show');

            // Ensure mobile menu is initially hidden
            mobileMenu.style.display = 'none';

            mobileToggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                console.log('Mobile toggle clicked (fallback)');

                const isOpen = mobileMenu.style.display === 'block' ||
                              mobileMenu.classList.contains('show');

                if (isOpen) {
                    mobileMenu.style.display = 'none';
                    mobileMenu.classList.remove('show');
                    mobileMenu.setAttribute('aria-hidden', 'true');
                    console.log('Mobile menu closed');
                } else {
                    mobileMenu.style.display = 'block';
                    mobileMenu.classList.add('show');
                    mobileMenu.setAttribute('aria-hidden', 'false');
                    console.log('Mobile menu opened');
                }
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(e) {
                if (!mobileMenu.contains(e.target) && !mobileToggle.contains(e.target)) {
                    mobileMenu.style.display = 'none';
                    mobileMenu.classList.remove('show');
                    mobileMenu.setAttribute('aria-hidden', 'true');
                }
            });
        }

        // Mobile products dropdown fallback
        const mobileProductsButtons = document.querySelectorAll('.mobile-menu button');
        mobileProductsButtons.forEach(function(button) {
            if (button.textContent.includes('Products')) {
                button.addEventListener('click', function() {
                    const dropdown = button.nextElementSibling;
                    if (dropdown) {
                        const isOpen = dropdown.classList.contains('show');
                        if (isOpen) {
                            dropdown.classList.remove('show');
                            dropdown.style.display = 'none';
                        } else {
                            dropdown.classList.add('show');
                            dropdown.style.display = 'block';
                        }
                        console.log('Mobile products dropdown toggled via fallback');
                    }
                });
            }
        });

        // Desktop products dropdown fallback (keep open when hovering dropdown)
        const productsLinks = document.querySelectorAll('nav a[href*="products"]');
        productsLinks.forEach(function(link) {
            const parent = link.parentElement;
            const dropdown = parent ? parent.querySelector('.navbar-dropdown') : null;
            if (!dropdown) return;

            const openDropdown = () => {
                dropdown.classList.add('show');
                dropdown.style.display = 'block';
                dropdown.style.opacity = '1';
            };
            const closeDropdown = () => {
                dropdown.classList.remove('show');
                dropdown.style.display = 'none';
                dropdown.style.opacity = '0';
            };

            let hoverTimeout;

            link.addEventListener('mouseenter', function() {
                clearTimeout(hoverTimeout);
                openDropdown();
            });
            link.addEventListener('mouseleave', function() {
                hoverTimeout = setTimeout(closeDropdown, 300);
            });
            dropdown.addEventListener('mouseenter', function() {
                clearTimeout(hoverTimeout);
                openDropdown();
            });
            dropdown.addEventListener('mouseleave', function() {
                hoverTimeout = setTimeout(closeDropdown, 300);
            });
        });

        // Header scroll effect fallback
        const header = document.querySelector('header');
        if (header) {
            window.addEventListener('scroll', function() {
                const scrolled = window.scrollY > 50;
                if (scrolled) {
                    header.classList.add('bg-white', 'shadow-md');
                    header.classList.remove('bg-transparent');
                } else {
                    header.classList.remove('bg-white', 'shadow-md');
                    header.classList.add('bg-transparent');
                }
            });
        }

        console.log('Navbar fallback initialized');
    }

    // Subcategory search fallback functionality
    function initializeSubcategorySearchFallback() {
        const searchInput = document.querySelector('input[x-model="searchQuery"]');
        const productCards = document.querySelectorAll('.product-card');

        if (searchInput && productCards.length > 0) {
            searchInput.addEventListener('input', function() {
                const query = this.value.toLowerCase().trim();
                console.log('Search fallback triggered:', query);

                productCards.forEach(function(card) {
                    const productName = card.querySelector('h3')?.textContent?.toLowerCase() || '';
                    const productModel = card.querySelector('p')?.textContent?.toLowerCase() || '';
                    const productDesc = card.querySelector('.text-gray-500')?.textContent?.toLowerCase() || '';

                    if (query === '' ||
                        productName.includes(query) ||
                        productModel.includes(query) ||
                        productDesc.includes(query)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });

            console.log('Subcategory search fallback initialized');
        }
    }

    // Products index page search fallback functionality
    function initializeProductsIndexSearchFallback() {
        const searchInput = document.querySelector('input[x-model="searchQuery"]');
        const productCards = document.querySelectorAll('.product-card');

        if (searchInput && productCards.length > 0) {
            searchInput.addEventListener('input', function() {
                const query = this.value.toLowerCase().trim();
                console.log('Products index search fallback triggered:', query);

                productCards.forEach(function(card) {
                    const productName = card.querySelector('h3')?.textContent?.toLowerCase() || '';
                    const productModel = card.querySelector('p')?.textContent?.toLowerCase() || '';
                    const productDesc = card.querySelector('.text-gray-500')?.textContent?.toLowerCase() || '';

                    if (query === '' ||
                        productName.includes(query) ||
                        productModel.includes(query) ||
                        productDesc.includes(query)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });

            console.log('Products index search fallback initialized');
        }
    }

    // Category page search fallback functionality
    function initializeCategoryPageSearchFallback() {
        const searchInput = document.querySelector('input[placeholder*="products"]');
        const productCards = document.querySelectorAll('.product-card');

        if (searchInput && productCards.length > 0) {
            searchInput.addEventListener('input', function() {
                const query = this.value.toLowerCase().trim();
                console.log('Category page search fallback triggered:', query);

                productCards.forEach(function(card) {
                    const productName = card.querySelector('h3')?.textContent?.toLowerCase() || '';
                    const productModel = card.querySelector('p')?.textContent?.toLowerCase() || '';
                    const productDesc = card.querySelector('.text-gray-500')?.textContent?.toLowerCase() || '';

                    if (query === '' ||
                        productName.includes(query) ||
                        productModel.includes(query) ||
                        productDesc.includes(query)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });

            console.log('Category page search fallback initialized');
        }
    }

    // Category page fallback - show static version when Alpine.js fails
    function initializeCategoryPageFallback() {
        const staticProducts = document.getElementById('static-products');
        const alpineSection = document.getElementById('category-app') || document.querySelector('[x-data]');

        if (staticProducts && alpineSection) {
            // Hide Alpine.js section and show static version
            if (alpineSection) alpineSection.style.display = 'none';
            staticProducts.style.display = 'block';

            // Initialize search functionality for static version
            const searchInput = document.getElementById('static-search');
            const productCards = staticProducts.querySelectorAll('.product-card');
            const productsCount = document.getElementById('products-count');

            if (searchInput && productCards.length > 0) {
                searchInput.addEventListener('input', function() {
                    const query = this.value.toLowerCase().trim();
                    let visibleCount = 0;

                    productCards.forEach(function(card) {
                        const productName = card.querySelector('h3')?.textContent?.toLowerCase() || '';
                        const productModel = card.querySelector('p')?.textContent?.toLowerCase() || '';
                        const productDesc = card.querySelector('.text-gray-500')?.textContent?.toLowerCase() || '';

                        if (query === '' ||
                            productName.includes(query) ||
                            productModel.includes(query) ||
                            productDesc.includes(query)) {
                            card.style.display = 'block';
                            visibleCount++;
                        } else {
                            card.style.display = 'none';
                        }
                    });

                    if (productsCount) {
                        productsCount.textContent = 'Showing ' + visibleCount + ' products';
                    }
                });
            }

            console.log('Category page fallback initialized - showing static version');
        }
    }

    // Initialize all search fallbacks if Alpine.js fails
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            if (typeof Alpine === 'undefined' || !document.querySelector('[x-data]')) {
                initializeSubcategorySearchFallback();
                initializeProductsIndexSearchFallback();
                initializeCategoryPageSearchFallback();
                initializeCategoryPageFallback();
            }
        }, 2000);
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
