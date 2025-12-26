@extends('layouts.app')

@section('title', 'Diesel Generators - Al Mohandes International')
@section('description', 'Browse our complete range of diesel generators with various power capacities from 0 kVA to 3000+ kVA.')

@section('content')
<!-- Hero Section -->
<section class="relative h-[400px] bg-cover bg-center" style="background-image: linear-gradient(rgba(0, 51, 102, 0.7), rgba(0, 51, 102, 0.7)), url('{{ asset('imgs/hero-genset.jpg') }}');">
    <div class="container px-4 mx-auto h-full flex items-center">
        <div class="text-white">
            <nav class="text-sm mb-4">
                <a href="{{ route('home') }}" class="hover:text-ami-orange transition">Home</a>
                <span class="mx-2">/</span>
                <a href="#" class="hover:text-ami-orange transition">Products</a>
                <span class="mx-2">/</span>
                <span>Diesel Generators</span>
            </nav>
            <h1 class="text-5xl font-bold uppercase mb-4">Diesel Generators</h1>
            <p class="text-xl max-w-2xl">Reliable power solutions for every application</p>
        </div>
    </div>
</section>


<!-- Products Table Section -->
<section class="py-12 bg-gray-50">
    <div class="container px-4 mx-auto">
        <!-- Desktop Table -->
        <div class="hidden lg:block overflow-x-auto">
            <table class="w-full bg-white rounded-lg shadow-sm border-collapse">
                <thead>
                    <tr class="bg-ami-blue text-white">
                        <th class="py-4 px-4 text-center w-12"></th> <!-- Checkbox -->
                        <th class="py-4 px-4 text-left w-24">Image</th>
                        <th class="py-4 px-4 text-left">AMI Model</th>
                        <th class="py-4 px-4 text-center border-l border-white/20">
                            Standby<br><span class="text-xs font-normal">KVA</span>
                        </th>
                        <th class="py-4 px-4 text-center">
                            Standby<br><span class="text-xs font-normal">KW</span>
                        </th>   
                        <th class="py-4 px-4 text-center border-l border-white/20">
                            Prime<br><span class="text-xs font-normal">KVA</span>
                        </th>
                        <th class="py-4 px-4 text-center">
                            Prime<br><span class="text-xs font-normal">KW</span>
                        </th>
                        <th class="py-4 px-4 text-center border-l border-white/20">Freq.</th>
                        <th class="py-4 px-4 text-center border-l border-white/20">Engine</th>
                        <th class="py-4 px-4 text-center border-l border-white/20">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    @php
                        $standbyKVA = $product->powertype_values->first(function($item) {
                            return $item->powertype && $item->powertype->power_id == 1 && $item->powertype->name == 'KVA';
                        });
                        $standbyKW = $product->powertype_values->first(function($item) {
                            return $item->powertype && $item->powertype->power_id == 1 && $item->powertype->name == 'KW';
                        });
                        $primeKVA = $product->powertype_values->first(function($item) {
                            return $item->powertype && $item->powertype->power_id == 2 && $item->powertype->name == 'KVA';
                        });
                        $primeKW = $product->powertype_values->first(function($item) {
                            return $item->powertype && $item->powertype->power_id == 2 && $item->powertype->name == 'KW';
                        });
                    @endphp
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors">
                        <!-- Checkbox -->
                        <td class="py-4 px-4 text-center">
                            <input type="checkbox" class="w-5 h-5 text-ami-blue border-gray-300 rounded focus:ring-ami-blue">
                        </td>
                        
                        <!-- Image -->
                        <td class="py-4 px-4">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('imgs/products/G1.png') }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-16 h-16 object-contain rounded mx-auto">
                        </td>
                        
                        <!-- Model -->
                        <td class="py-4 px-4">
                            <h3 class="font-bold text-ami-blue text-lg">{{ $product->name }}</h3>
                        </td>
                        
                      
                        <!-- Prime KVA -->
                        <td class="py-4 px-4 text-center font-semibold text-gray-800 border-l border-gray-200">
                            {{ $primeKVA->value ?? '-' }}
                        </td>
                        
                        <!-- Prime KW -->
                        <td class="py-4 px-4 text-center font-semibold text-gray-800">
                            {{ $primeKW->value ?? '-' }}
                        </td>

                          <!-- Standby KVA -->
                        <td class="py-4 px-4 text-center font-semibold text-gray-800 border-l border-gray-200">
                            {{ $standbyKVA->value ?? '-' }}
                        </td>
                        
                        <!-- Standby KW -->
                        <td class="py-4 px-4 text-center font-semibold text-gray-800">
                            {{ $standbyKW->value ?? '-' }}
                        </td>
                        
                        
                        <!-- Frequency -->
                        <td class="py-4 px-4 text-center font-semibold text-gray-800 border-l border-gray-200">
                            50 Hz
                        </td>
                        
                        <!-- Engine -->
                        <td class="py-4 px-4 text-center font-semibold text-gray-800 border-l border-gray-200">
                            {{ $product->engine ?? 'N/A' }}
                        </td>
                        
                        <!-- Actions -->
                        <td class="py-4 px-4 border-l border-gray-200">
                            <div class="flex items-center justify-center gap-2">
                               
                               
                                <a href="{{ route('contact.index') }}" 
                                   class="px-6 py-2 bg-green-500 text-white rounded-full font-semibold hover:bg-green-600 transition whitespace-nowrap">
                                    Get Quote
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="py-12 text-center">
                            <i class="fas fa-tools text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-semibold text-gray-600 mb-2">No Generators Available</h3>
                            <p class="text-gray-500">Please check back later or contact us for more information.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

       

        <!-- Pagination -->
        @if($products->hasPages())
        <div class="mt-8">
            {{ $products->links() }}
        </div>
        @endif
    </div>
</section>



<style>
    /* Sticky filter bar animation */
    .sticky {
        animation: slideDown 0.3s ease-out;
    }
    
    @keyframes slideDown {
        from {
            transform: translateY(-100%);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
</style>
@endsection
