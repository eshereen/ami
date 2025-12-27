@extends('layouts.app')
@section('content')
    <!-- Hero Section with Large Image -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
             alt="Product Categories"
             class="object-cover w-full h-full">
        <div class="flex absolute inset-0 items-center bg-gradient-to-r from-blue-900/80 to-blue-700/60">
            <div class="container px-4 mx-auto">
                <h1 class="mb-4 text-4xl font-bold text-white md:text-5xl fade-in">Product Categories</h1>
                <p class="max-w-2xl text-xl text-blue-100 fade-in">Explore our comprehensive range of power solutions organized by category</p>
            </div>
        </div>
    </section>

    <!-- Categories Grid -->
    <section class="container px-4 py-16 mx-auto">
        <div class="mb-16 text-center">
            <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue">Our Categories</h2>
            <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
            <p class="mx-auto mt-4 max-w-2xl text-gray-600">Browse through our main product categories to find exactly what you need</p>
        </div>

        @if ($categories->count() > 0)
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($categories as $category)
            <div class="overflow-hidden bg-white rounded-xl border border-blue-100 shadow-lg hover-lift">
                <a href="{{ route('category.show', $category->slug) }}">
                <div class="relative h-48 overflow-hidden bg-gradient-to-br from-blue-300 to-blue-700">
                    @if($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" 
                             alt="{{ $category->name }}" 
                             class="object-cover w-full h-full transition-transform duration-300 hover:scale-110">
                    @else
                        <img src="{{ asset('imgs/category-placeholder.jpg') }}" 
                             alt="{{ $category->name }}" 
                             class="object-cover w-full h-full transition-transform duration-300 hover:scale-110"
                             onerror="this.onerror=null; this.src='{{ asset('imgs/products/G1.png') }}';">
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end">
                        <h3 class="text-xl font-bold text-white p-4">{{ $category->name }}</h3>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="mb-2 text-xl font-bold text-blue-900">{{ $category->name }}</h3>
                    <p class="mb-4 text-gray-600">{{ $category->subcategories->count() }} Subcategories</p>
                    <div class="mb-4 space-y-2">
                        @foreach ($category->subcategories->take(3) as $subcategory)
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="mr-2 fas fa-arrow-right text-ami-orange"></i>
                            {{ $subcategory->name }}
                        </div>
                        @endforeach
                        @if($category->subcategories->count() > 3)
                        <div class="text-sm text-gray-400">
                            +{{ $category->subcategories->count() - 3 }} more...
                        </div>
                        @endif
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="font-semibold text-ami-orange">{{ $category->subcategories->sum('products_count') }} Products</span>
                        <a href="{{ route('category.show', $category->slug) }}" class="text-blue-600 transition hover:text-ami-orange">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
        </div>
        @else
        <div class="py-16 text-center">
            <i class="mb-4 text-6xl text-gray-300 fas fa-folder-open"></i>
            <h3 class="mb-2 text-xl font-semibold text-gray-600">No Categories Found</h3>
            <p class="text-gray-500">Categories will appear here once they are added to the system.</p>
        </div>
        @endif
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800">
        <div class="container px-4 mx-auto text-center">
            <h2 class="mb-4 text-3xl font-bold text-white md:text-4xl">Need Help Finding the Right Product?</h2>
            <p class="mx-auto mb-8 max-w-2xl text-xl text-blue-100">Our expert team is here to help you choose the perfect power solution for your needs.</p>
            <div class="flex flex-col gap-4 justify-center sm:flex-row">
                <a href="{{ route('contact.index') }}" class="px-8 py-3 font-semibold text-white rounded-lg transition bg-ami-orange hover:bg-orange-600">
                    Contact Us
                </a>
                <a href="{{ route('products.index') }}" class="px-8 py-3 font-semibold text-white bg-transparent rounded-lg border-2 border-white transition hover:bg-white hover:text-blue-600">
                    View All Products
                </a>
            </div>
        </div>
    </section>
@endsection
