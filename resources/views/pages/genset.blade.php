@extends('layouts.app')

@section('title', 'Diesel Generators - Al Mohandes International')
@section('description', 'Browse our complete range of diesel generators with various power capacities from 0 kVA to 3000+ kVA.')

@section('content')
@php
    // Helper function to format numbers: remove .00 for whole numbers, keep decimals otherwise
    function formatNumber($value) {
        if ($value === null || $value === '-') {
            return '-';
        }
        // Convert to float and check if it's a whole number
        $numValue = floatval($value);
        if ($numValue == intval($numValue)) {
            return number_format($numValue, 0); // No decimals for whole numbers
        }
        return rtrim(rtrim(number_format($numValue, 2), '0'), '.'); // Remove trailing zeros and decimal point if needed
    }
@endphp
<!-- Hero Section -->
<section class="relative h-[400px] bg-cover bg-center" style="background-image: linear-gradient(rgba(0, 51, 102, 0.7), rgba(0, 51, 102, 0.7)), url('{{ $category && $category->image ? asset('storage/' . $category->image) : asset('imgs/hero-genset.jpg') }}');">
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
<section class="py-12 bg-gray-50" x-data="{ selectedBrand: '' }">
    <div class="container px-4 mx-auto">
        <!-- Brand Filter -->
        <div class="mb-6 bg-white p-4 md:p-6 rounded-lg shadow-md">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-6">
                    <label class="text-base font-bold text-gray-800 whitespace-nowrap">Filter by Brand:</label>
                    
                    <!-- Custom Dropdown -->
                    <div x-data="{ open: false }" class="relative w-full sm:w-auto" @click.away="open = false">
                        <!-- Dropdown Button -->
                        <button @click="open = !open" 
                                class="w-full sm:min-w-[280px] px-4 sm:px-6 py-3 text-sm sm:text-base font-medium border-2 border-gray-300 rounded-lg 
                                       focus:ring-4 focus:ring-ami-blue/20 focus:border-ami-blue 
                                       hover:border-ami-blue/50
                                       transition-all duration-300 ease-in-out
                                       bg-white cursor-pointer
                                       shadow-sm hover:shadow-md
                                       flex items-center justify-between">
                            <span x-text="selectedBrand || 'All Brands'" class="text-gray-800"></span>
                            <i class="fas fa-chevron-down transition-transform duration-300" 
                               :class="{ 'rotate-180': open }"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-95"
                             class="absolute z-50 mt-2 w-full bg-white rounded-lg shadow-2xl border border-gray-200 max-h-80 overflow-y-auto">
                            
                            <!-- All Brands Option -->
                            <button @click="selectedBrand = ''; open = false"
                                    class="w-full px-4 sm:px-6 py-3 text-left text-sm sm:text-base font-medium text-gray-800 
                                           hover:bg-ami-orange hover:text-white
                                           transition-all duration-200 ease-in-out
                                           border-b border-gray-100 first:rounded-t-lg"
                                    :class="{ 'bg-ami-blue text-white': selectedBrand === '' }">
                                All Brands
                            </button>

                            @php
                                $brands = \App\Models\Subcategory::whereNotNull('name')
                                    ->distinct()
                                    ->pluck('name')
                                    ->sort();
                            @endphp

                            <!-- Brand Options -->
                            @foreach($brands as $brand)
                                <button @click="selectedBrand = '{{ $brand }}'; open = false"
                                        class="w-full px-4 sm:px-6 py-3 text-left text-sm sm:text-base font-medium text-gray-800 
                                               hover:bg-ami-orange hover:text-white
                                               transition-all duration-200 ease-in-out
                                               border-b border-gray-100 last:border-0 last:rounded-b-lg"
                                        :class="{ 'bg-ami-blue text-white': selectedBrand === '{{ $brand }}' }">
                                    {{ $brand }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <div class="text-sm sm:text-base text-gray-700 font-medium text-center md:text-right">
                    <span x-text="selectedBrand ? 'Showing: ' + selectedBrand : 'Showing all products'" 
                          class="transition-all duration-300"></span>
                </div>
            </div>
        </div>

        <!-- Desktop Table -->
        <div class="hidden lg:block overflow-x-auto">
            <table class="w-full bg-white rounded-lg shadow-sm border-collapse">
                <thead>
                    <tr class="bg-ami-blue text-white">
                      <!-- Checkbox -->
                        <th class="py-4 px-4 text-left w-20"></th>
                        <th class="py-4 px-2 text-center border-l border-white/20">AMI Model</th>
                          <th class="py-4 px-2 text-center border-l border-white/20">
                            Prime Power<br><span class="text-xs font-normal">KVA</span>
                        </th>
                        <th class="py-4 px-2 text-center">
                            Prime Power<br><span class="text-xs font-normal">KW</span>
                        </th>
                        <th class="py-4 px-2 text-center border-l border-white/20">
                            Standby Power<br><span class="text-xs font-normal">KVA</span>
                        </th>
                        <th class="py-4 px-2 text-center ">
                            Standby Power<br><span class="text-xs font-normal">KW</span>
                        </th>   
                        <th class="py-4 px-2 text-center border-l border-white/20">HZ</th>
                        <th class="py-4 px-4 text-center border-l border-white/20">Engine</th>
                        <th class="py-4 px-2 text-center border-l border-white/20">Brand</th>
                        <th class="py-4 px-2 text-center border-l border-white/20"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors"
                        x-show="!selectedBrand || '{{ $product->subcategory->name ?? '' }}' === selectedBrand"
                        x-transition>
                   
                        
                        <!-- Image -->
                        <td class="py-4 px-4">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('imgs/products/G1.png') }}" 
                                 alt="{{ $product->ami_model }}" 
                                 class="w-24 h-24 object-contain rounded mx-auto">
                        </td>
                        
                        <!-- Model -->
                        <td class="py-4 px-4">
                            <h3 class="font-bold text-ami-blue text-lg">{{ $product->ami_model }}</h3>
                        </td>
                        
                      
                        <!-- Prime KVA -->
                        <td class="py-4 px-4 text-center font-semibold text-gray-800 border-l border-gray-200">
                            {{ formatNumber($product->prime_kva->value ?? '-') }}
                        </td>
                        
                        <!-- Prime KW -->
                        <td class="py-4 px-4 text-center font-semibold text-gray-800">
                            {{ formatNumber($product->prime_kw->value ?? '-') }}
                        </td>

                          <!-- Standby KVA -->
                        <td class="py-4 px-4 text-center font-semibold text-gray-800 border-l border-gray-200">
                            {{ formatNumber($product->standby_kva->value ?? '-') }}
                        </td>
                        
                        <!-- Standby KW -->
                        <td class="py-4 px-4 text-center font-semibold text-gray-800">
                            {{ formatNumber($product->standby_kw->value ?? '-') }}
                        </td>
                        
                        
                        <!-- Frequency -->
                        <td class="py-4 px-4 text-center font-semibold text-gray-800 border-l border-gray-200">
                           {{$product->frequency ?? 'N/A'}}
                        </td>
                        
                        <!-- Engine -->
                        <td class="py-4 px-4 text-center font-semibold text-gray-800 border-l border-gray-200">
                            {{ $product->engine ?? 'N/A' }}
                        </td>
                        
                        <!-- Brand -->
                        <td class="py-4 px-4 text-center font-semibold text-gray-800 border-l border-gray-200">
                            {{ $product->subcategory->name ?? 'N/A' }}
                        </td>
                        
                        <!-- Actions -->
                        <td class="py-4 px-4 border-l border-gray-200">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('contact.index') }}" 
                                   class="px-6 py-2 bg-green-500 text-white rounded-full text-sm font-semibold hover:bg-green-600 transition whitespace-nowrap">
                                    Get an Offer
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

        <!-- Mobile Cards View -->
        <div class="lg:hidden space-y-6">
            @forelse($products as $product)
            
            <div class="bg-white rounded-lg shadow-md overflow-hidden"
                 x-show="!selectedBrand || '{{ $product->subcategory->name ?? '' }}' === selectedBrand"
                 x-transition>
                <!-- Product Header -->
                <div class="bg-ami-blue text-white p-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-bold">{{ $product->ami_model }}</h3>
                        <input type="checkbox" class="w-5 h-5 text-ami-orange border-white rounded focus:ring-ami-orange">
                    </div>
                </div>
                
                <!-- Product Image -->
                <div class="p-4 bg-gray-50 flex justify-center">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('imgs/products/G1.png') }}" 
                         alt="{{ $product->ami_model }}" 
                         class="w-40 h-40 object-contain">
                </div>
                
                <!-- Product Details -->
                <div class="p-4 space-y-3">
                    <!-- Power Specifications -->
                    <div class="grid grid-cols-2 gap-3">
                        <!-- Prime Power -->
                        <div class="bg-blue-50 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 font-semibold mb-1">Prime Power</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-bold text-ami-blue">{{ formatNumber($product->prime_kva->value ?? '-') }} KVA</span>
                                <span class="text-sm font-bold text-ami-blue">{{ formatNumber($product->prime_kw->value ?? '-') }} KW</span>
                            </div>
                        </div>
                        
                        <!-- Standby Power -->
                        <div class="bg-orange-50 p-3 rounded-lg">
                            <p class="text-xs text-gray-600 font-semibold mb-1">Standby Power</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm font-bold text-ami-orange">{{ formatNumber($product->standby_kva->value ?? '-') }} KVA</span>
                                <span class="text-sm font-bold text-ami-orange">{{ formatNumber($product->standby_kw->value ?? '-') }} KW</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Additional Info -->
                    <div class="grid grid-cols-3 gap-2 pt-3 border-t">
                        <div class="text-center">
                            <p class="text-xs text-gray-500">Frequency</p>
                            <p class="text-sm font-semibold text-gray-800">{{ $product->frequency ?? 'N/A' }}</p>
                        </div>
                        <div class="text-center">
                            <p class="text-xs text-gray-500">Engine</p>
                            <p class="text-sm font-semibold text-gray-800">{{ $product->engine ?? 'N/A' }}</p>
                        </div>
                        <div class="text-center">
                            <p class="text-xs text-gray-500">Brand</p>
                            <p class="text-sm font-semibold text-gray-800">{{ $product->subcategory->name ?? 'N/A' }}</p>
                        </div>
                    </div>
                    
                    <!-- Actions -->
                    <div class="flex gap-2 pt-3">
                        <a href="{{ route('contact.index') }}" 
                           class="flex-1 bg-ami-blue text-white text-center py-2 px-4 rounded-lg hover:bg-ami-blue/90 transition">
                            <i class="fas fa-envelope mr-2"></i>Sent an Offer
                        </a>
                       
                    </div>
                </div>
            </div>
            @empty
            <div class="bg-white rounded-lg shadow-md p-12 text-center">
                <i class="fas fa-tools text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No Generators Available</h3>
                <p class="text-gray-500">Please check back later or contact us for more information.</p>
            </div>
            @endforelse
        </div>

       

        <!-- Pagination -->
        @if($products->hasPages())
        <div class=" mt-8 text-center">
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
