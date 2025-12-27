@extends('layouts.app')

@section('title', 'Products - AMI GenSet')
@section('description', 'Browse our comprehensive range of power generation products including generators, engines, and related equipment.')
@section('keywords', 'products, generators, power equipment, AMI GenSet, engines, power solutions')

@section('content')
    <!-- Hero Section -->
    <section class="py-20 bg-gradient-to-r to-blue-600 from-ami-blue">
        <div class="container px-4 mx-auto text-center">
            <h1 class="mb-6 text-4xl font-bold text-white md:text-5xl">Our Products</h1>
            <p class="mx-auto max-w-3xl text-xl text-blue-100">Explore our comprehensive range of power generation solutions designed for reliability, efficiency, and performance.</p>
        </div>
    </section>

    <!-- Main Content with Sidebar -->
    <section class="container px-4 py-8 mx-auto">
        <div class="flex flex-col gap-8 lg:flex-row">
            <!-- Left Sidebar -->
            <div class="lg:w-1/4">
                <div class="sticky top-8 p-6 bg-white rounded-xl shadow-lg">
                    <h3 class="mb-6 text-xl font-bold text-gray-900">Filter Products</h3>
                    @include('partials.product-filter', [
                        'products' => $products,
                        'placeholder' => 'Search all products...',
                        'showCategories' => true,
                        'showSubcategories' => true,
                        'categories' => \App\Models\Category::withCount('products')->get(),
                        'subcategories' => \App\Models\Subcategory::withCount('products')->get()
                    ])
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:w-3/4">
                <!-- Products Grid -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3" id="products-grid">
                    @foreach ($products as $product)
                        <div class="overflow-hidden bg-white rounded-xl shadow-lg transition-all duration-300 hover:shadow-xl product-card">
                            <a href="{{ route('product.show', $product->slug) }}" class="block relative overflow-hidden group">
                                <div class="absolute inset-0 z-10 bg-ami-orange opacity-60 transition-transform duration-500 ease-in-out transform -translate-x-full -translate-y-full group-hover:translate-x-0 group-hover:translate-y-0"></div>
                                <div class="relative">
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}"
                                             alt="{{ $product->name }}"
                                             class="object-contain w-full h-48"
                                             loading="lazy" decoding="async">
                                    @else
                                        <img src="{{ asset('imgs/products/G1.png') }}"
                                             alt="{{ $product->name }}"
                                             class="object-contain w-full h-48"
                                             loading="lazy" decoding="async">
                                    @endif
                                    <div class="absolute top-4 left-4">
                                        <span class="px-3 py-1 text-sm font-semibold text-white rounded-full bg-ami-orange">
                                            {{ $product->subcategory->name }}
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <div class="p-6">
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <h3 class="mb-2 text-lg font-bold text-gray-900 hover:text-ami-blue transition">{{ $product->name ?? $product->ami_model }}</h3>
                                </a>
                                <p class="mb-3 text-gray-600">{{ $product->engine }}</p>
                                @if($product->description)
                                    <p class="mb-4 text-sm text-gray-500 line-clamp-2">{{ Str::limit($product->description, 100) }}</p>
                                @endif

                                <div class="flex justify-between items-center mb-4">
                                    @if($product->fuel_type)
                                    <span class="text-sm text-gray-500">{{ $product->fuel_type }}</span>
                                    @endif
                                    @if($product->frequency)
                                    <span class="text-sm text-gray-500">{{ $product->frequency }} HZ</span>
                                    @endif
                                </div>

                                <a href="{{ route('product.show', $product->slug) }}" class="flex justify-between items-center group/link">
                                    <span class="text-sm font-medium text-ami-blue group-hover/link:text-ami-orange transition">View Details</span>
                                    <i class="fas fa-arrow-right text-ami-orange"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- No Results Message -->
                <div class="py-12 text-center" id="no-results" style="display: none;">
                    <div class="mx-auto mb-6 w-24 h-24 text-gray-300">
                        <i class="text-6xl fas fa-search"></i>
                    </div>
                    <h3 class="mb-2 text-xl font-semibold text-gray-900">No products found</h3>
                    <p class="text-gray-600">No products match your search criteria.</p>
                </div>

                <!-- Pagination -->
                @if(method_exists($products, 'links'))
                <div class="mt-12">
                    {{ $products->links() }}
                </div>
                @endif
            </div>
        </div>
    </section>


    <!-- Call to Action -->
    <section class="py-16 bg-blue-300">
        <div class="container px-4 mx-auto text-center">
            <h2 class="mb-4 text-3xl font-bold text-white md:text-4xl">Need Help Finding the Right Product?</h2>
            <p class="mx-auto mb-8 max-w-2xl text-xl text-orange-100">Our expert team is here to help you choose the perfect power solution for your needs.</p>
            <div class="flex flex-col gap-4 justify-center sm:flex-row">
                <a href="{{ route('home') }}#contact" class="px-8 py-3 font-semibold bg-white rounded-lg transition text-ami-orange hover:bg-gray-100">
                    Contact Our Experts
                </a>
                <a href="{{ route('home') }}#services" class="px-8 py-3 font-semibold text-white bg-transparent rounded-lg border-2 border-white transition hover:bg-white hover:text-ami-orange">
                    View Our Services
                </a>
            </div>
        </div>
    </section>
@endsection

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-card {
        transition: all 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
    }

    .hover-lift:hover {
        transform: translateY(-8px);
    }
</style>
