@extends('layouts.app')
@section('content')

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Additional mobile menu fix for galleries page
    const mobileToggle = document.querySelector('[data-mobile-toggle]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');

    if (mobileToggle && mobileMenu) {
        console.log('Mobile menu elements found on galleries page');

        // Ensure click handler is working
        mobileToggle.addEventListener('click', function(e) {
            console.log('Mobile toggle clicked on galleries page');
            e.preventDefault();

            // Force toggle the menu
            if (mobileMenu.style.display === 'none' || !mobileMenu.style.display) {
                mobileMenu.style.display = 'block';
                mobileMenu.classList.add('show');
            } else {
                mobileMenu.style.display = 'none';
                mobileMenu.classList.remove('show');
            }
        });
    } else {
        console.error('Mobile menu elements not found on galleries page');
    }
});
</script>
@endpush

    <!-- Hero Section with Large Image -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
             alt="AMI Gallery"
             class="object-cover w-full h-full">
        <div class="flex absolute inset-0 items-center bg-gradient-to-r from-blue-900/80 to-blue-700/60">
            <div class="container px-4 mx-auto">
                <h1 class="mb-4 text-4xl font-bold text-white md:text-5xl fade-in">Product Gallery</h1>
                <p class="max-w-2xl text-xl text-blue-100 fade-in">Explore our comprehensive collection of power generation solutions and installations</p>
            </div>
        </div>
    </section>

    <!-- Gallery Introduction -->
    <section class="py-16 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue">Our Work Gallery</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
                <p class="mx-auto mt-4 max-w-3xl text-gray-600">
                    Discover our extensive portfolio of power generation solutions, installations, and projects.
                    From industrial generators to marine applications, our gallery showcases the quality and
                    reliability that AMI brings to every project.
                </p>
            </div>
        </div>
    </section>

    <!-- Gallery Grid -->
    <section class="py-16">
        <div class="container px-4 mx-auto">
            @if($gallaries->count() > 0)
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($gallaries as $gallery)
                <div class="overflow-hidden bg-white rounded-xl border border-blue-100 shadow-lg hover-lift group">
                    <div class="overflow-hidden h-64">
                        @if($gallery->image)
                            <img src="{{ asset('storage/' . $gallery->image) }}"
                                 alt="{{ $gallery->name ?? 'Gallery Image' }}"
                                 class="object-cover w-full h-full transition duration-500 group-hover:scale-110">
                        @else
                            <div class="flex justify-center items-center h-full bg-gradient-to-br from-blue-500 to-blue-700">
                                <div class="text-center text-white">
                                    <i class="mb-4 text-4xl fas fa-image"></i>
                                    <h3 class="text-lg font-bold">{{ $gallery->name ?? 'Gallery Image' }}</h3>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="mb-2 text-xl font-bold text-blue-900">
                            {{ $gallery->name ?? 'Gallery Image' }}
                        </h3>
                        @if($gallery->description)
                            <p class="mb-4 text-gray-600">{{ Str::limit($gallery->description, 100) }}</p>
                        @endif
                        @if($gallery->product)
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-semibold text-ami-orange">{{ $gallery->product->name }}</span>
                                <div class="flex items-center text-blue-600">
                                    <i class="mr-1 text-sm fas fa-tag"></i>
                                    <span class="text-sm">Product Gallery</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($gallaries->hasPages())
            <div class="mt-12">
                <div class="flex justify-center">
                    {{ $gallaries->links() }}
                </div>
            </div>
            @endif

            @else
            <div class="py-16 text-center">
                <i class="mb-4 text-6xl text-gray-300 fas fa-images"></i>
                <h3 class="mb-2 text-xl font-semibold text-gray-600">Gallery Coming Soon</h3>
                <p class="text-gray-500">Our comprehensive gallery will be available here soon.</p>
            </div>
            @endif
        </div>
    </section>



@include('layouts.call-to-action')

@endsection
