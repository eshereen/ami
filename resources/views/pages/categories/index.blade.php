@extends('layouts.app')
@section('content')
    <!-- Hero Section with Large Image -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
             alt="Product Categories"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-blue-700/60 flex items-center">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 fade-in">Product Categories</h1>
                <p class="text-xl text-blue-100 max-w-2xl fade-in">Explore our comprehensive range of power solutions organized by category</p>
            </div>
        </div>
    </section>

    <!-- Categories Grid -->
    <section class="container mx-auto px-4 py-16">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold ami-blue mb-4">Our Categories</h2>
            <div class="w-24 h-1 bg-ami-orange mx-auto"></div>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Browse through our main product categories to find exactly what you need</p>
        </div>

        @if ($categories->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($categories as $category)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-blue-100 hover-lift">
                <div class="h-48 bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
                    <div class="text-center text-white">
                        <i class="fas fa-cogs text-4xl mb-4"></i>
                        <h3 class="text-xl font-bold">{{ $category->name }}</h3>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-blue-900 mb-2">{{ $category->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ $category->subcategories->count() }} Subcategories</p>
                    <div class="space-y-2 mb-4">
                        @foreach ($category->subcategories->take(3) as $subcategory)
                        <div class="text-sm text-gray-500 flex items-center">
                            <i class="fas fa-arrow-right text-ami-orange mr-2"></i>
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
                        <span class="text-ami-orange font-semibold">{{ $category->subcategories->sum('products_count') }} Products</span>
                        <a href="{{ route('category.show', $category->slug) }}" class="text-blue-600 hover:text-ami-orange transition">
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16">
            <i class="fas fa-folder-open text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-semibold text-gray-600 mb-2">No Categories Found</h3>
            <p class="text-gray-500">Categories will appear here once they are added to the system.</p>
        </div>
        @endif
    </section>

    <!-- Call to Action -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Need Help Finding the Right Product?</h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">Our expert team is here to help you choose the perfect power solution for your needs.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact.index') }}" class="bg-ami-orange text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                    Contact Us
                </a>
                <a href="{{ route('products.index') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition">
                    View All Products
                </a>
            </div>
        </div>
    </section>
@endsection
