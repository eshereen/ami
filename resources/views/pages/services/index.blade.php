@extends('layouts.app')
@section('content')
    <!-- Hero Section with Animations -->
    <section class="relative h-96 md:h-[500px] overflow-hidden" id="services-hero">
        <!-- Animated Background Image with Parallax -->
        <div class="absolute inset-0 bg-black">
            <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
                 alt="Our Services"
                 class="object-cover w-full h-full transition-transform duration-700 ease-out scale-110 hero-parallax">
        </div>
        
        <!-- Animated Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 via-blue-800/70 to-blue-700/60 animate-gradient"></div>
        
        <!-- Content with Staggered Animations -->
        <div class="flex absolute inset-0 items-center z-10">
            <div class="container px-4 mx-auto">
                <h1 class="mb-4 text-4xl font-bold text-white md:text-5xl opacity-0 translate-y-8 hero-title">
                    Our Services
                </h1>
                <p class="max-w-2xl text-xl text-blue-100 opacity-0 translate-y-8 hero-description">
                    Comprehensive power solutions and maintenance services for industrial excellence
                </p>
            </div>
        </div>
        
        <!-- Decorative Animated Elements -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-ami-orange/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-ami-blue/10 rounded-full blur-3xl animate-pulse-slower"></div>
    </section>

    <style>
        /* Hero Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes gradientShift {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }

        @keyframes pulseSlow {
            0%, 100% {
                opacity: 0.3;
                transform: scale(1);
            }
            50% {
                opacity: 0.5;
                transform: scale(1.1);
            }
        }

        @keyframes pulseSlower {
            0%, 100% {
                opacity: 0.2;
                transform: scale(1);
            }
            50% {
                opacity: 0.4;
                transform: scale(1.15);
            }
        }

        /* Apply animations on page load */
        .hero-title {
            animation: fadeInUp 1s ease-out 0.3s forwards;
        }

        .hero-description {
            animation: fadeInUp 1s ease-out 0.6s forwards;
        }

        .hero-parallax {
            animation: fadeInUp 1.2s ease-out forwards;
        }

        .animate-gradient {
            background-size: 200% 200%;
            animation: gradientShift 8s ease infinite;
        }

        .animate-pulse-slow {
            animation: pulseSlow 4s ease-in-out infinite;
        }

        .animate-pulse-slower {
            animation: pulseSlower 6s ease-in-out infinite;
        }

        /* Parallax scroll effect */
        @media (min-width: 768px) {
            .hero-parallax-container {
                transition: transform 0.1s ease-out;
            }
        }

        /* Reduced motion for accessibility */
        @media (prefers-reduced-motion: reduce) {
            .hero-title,
            .hero-description,
            .hero-parallax,
            .animate-gradient,
            .animate-pulse-slow,
            .animate-pulse-slower {
                animation: none !important;
                opacity: 1 !important;
                transform: none !important;
            }
        }
    </style>

    <script>
        // Parallax scroll effect for hero section
        document.addEventListener('DOMContentLoaded', function() {
            const hero = document.getElementById('services-hero');
            const parallaxImage = hero?.querySelector('.hero-parallax');
            
            if (parallaxImage && window.matchMedia('(min-width: 768px)').matches) {
                let ticking = false;
                
                window.addEventListener('scroll', function() {
                    if (!ticking) {
                        window.requestAnimationFrame(function() {
                            const scrolled = window.pageYOffset;
                            const heroHeight = hero.offsetHeight;
                            
                            // Only apply parallax while hero is in view
                            if (scrolled < heroHeight) {
                                const parallaxSpeed = 0.5;
                                const yPos = -(scrolled * parallaxSpeed);
                                parallaxImage.style.transform = `translateY(${yPos}px) scale(1.1)`;
                            }
                            
                            ticking = false;
                        });
                        
                        ticking = true;
                    }
                }, { passive: true });
            }
        });
    </script>

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
