@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-semibold text-gray-900">{{ $subcategory->name }}</h1>
    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($subcategory->products as $product)
            <a href="{{ route('product.show', $product->slug) }}" class="block border rounded-lg p-4 hover:shadow">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-32 object-cover mb-3 rounded">
                @else
                    <img src="{{ asset('imgs/products/G1.png') }}" alt="{{ $product->name }}" class="w-full h-32 object-cover mb-3 rounded">
                @endif
                <div class="font-medium">{{ $product->name }}</div>
                <div class="text-sm text-gray-500">{{ $product->model_name }}</div>
            </a>
        @empty
            <div class="text-gray-600">No products found.</div>
        @endforelse
    </div>
    <div class="mt-8">
        <a href="{{ route('category.show', $subcategory->category->slug) }}" class="text-ami-blue hover:underline">Back to Category</a>
    </div>
</div>
@endsection


