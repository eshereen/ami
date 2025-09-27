@extends('layouts.app')

@section('content')
<div class="container px-4 py-16 mx-auto">
    <h1 class="mb-8 text-3xl font-bold">Alpine.js Test Page</h1>

    <!-- Simple Alpine.js test -->
    <div x-data="{ message: 'Alpine.js is working!' }" class="p-6 mb-8 bg-white rounded-lg shadow">
        <h2 class="mb-4 text-xl font-semibold">Basic Test</h2>
        <p x-text="message" class="font-medium text-green-600"></p>
        <button @click="message = 'Button clicked!'" class="px-4 py-2 mt-4 text-white bg-blue-500 rounded hover:bg-blue-600">
            Click me
        </button>
    </div>

    <!-- Mobile menu test -->
    <div class="p-6 mb-8 bg-white rounded-lg shadow">
        <h2 class="mb-4 text-xl font-semibold">Mobile Menu Test</h2>
        <button onclick="testMobileMenu()" class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">
            Test Mobile Menu
        </button>
        <div id="mobile-menu-status" class="mt-4 text-sm text-gray-600"></div>
    </div>

    <!-- Alpine.js status -->
    <div class="p-6 bg-white rounded-lg shadow">
        <h2 class="mb-4 text-xl font-semibold">Alpine.js Status</h2>
        <div id="alpine-status" class="text-sm"></div>
    </div>
</div>

<script>
function testMobileMenu() {
    const toggle = document.querySelector('[data-mobile-toggle]');
    const menu = document.querySelector('[data-mobile-menu]');
    const status = document.getElementById('mobile-menu-status');

    if (toggle && menu) {
        status.innerHTML = '✅ Mobile menu elements found<br>';
        toggle.click();
        setTimeout(() => {
            const isVisible = menu.style.display !== 'none' && menu.style.display !== '';
            status.innerHTML += isVisible ? '✅ Mobile menu opened successfully' : '❌ Mobile menu did not open';
        }, 100);
    } else {
        status.innerHTML = '❌ Mobile menu elements not found';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const statusDiv = document.getElementById('alpine-status');

    if (typeof Alpine !== 'undefined') {
        statusDiv.innerHTML = '✅ Alpine.js is loaded and available';
        statusDiv.className = 'text-sm text-green-600';

        // Test Alpine initialization
        setTimeout(() => {
            const alpineElements = document.querySelectorAll('[x-data]');
            statusDiv.innerHTML += `<br>📊 Found ${alpineElements.length} Alpine.js components`;
        }, 500);
    } else {
        statusDiv.innerHTML = '❌ Alpine.js is not available';
        statusDiv.className = 'text-sm text-red-600';
    }
});
</script>
@endsection
