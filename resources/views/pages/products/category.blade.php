@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-semibold text-gray-900">{{ $category->name }}</h1>
    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($category->subcategories as $subcategory)
            <a href="{{ route('subcategory.show', $subcategory->slug) }}" class="block border rounded-lg p-4 hover:shadow">
                <div class="flex items-center justify-between">
                    <span class="font-medium">{{ $subcategory->name }}</span>
                    <span class="text-sm text-gray-500">({{ $subcategory->products_count }})</span>
                </div>
            </a>
        @endforeach
    </div>
    <div class="mt-8">
        <a href="{{ route('products.index') }}" class="text-ami-blue hover:underline">Back to Products</a>
    </div>
 </div>
@endsection


