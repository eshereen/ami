@extends('layouts.app')
@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
             alt="Terms & Conditions"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-blue-700/60 flex items-center">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 fade-in">Terms & Conditions</h1>
                <p class="text-xl text-blue-100 max-w-2xl fade-in">Please read these terms carefully before using our services</p>
            </div>
        </div>
    </section>

    <!-- Terms Content -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <div class="prose prose-lg max-w-none">
                        <p class="text-gray-600 mb-6">
                            <strong>Last updated:</strong> {{ date('F d, Y') }}
                        </p>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">1. Acceptance of Terms</h2>
                        <p class="text-gray-600 mb-6">
                            By accessing and using the services provided by Al Mohandes International (AMI), you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.
                        </p>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">2. Use License</h2>
                        <p class="text-gray-600 mb-4">
                            Permission is granted to temporarily download one copy of the materials on AMI's website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:
                        </p>
                        <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                            <li>Modify or copy the materials</li>
                            <li>Use the materials for any commercial purpose or for any public display</li>
                            <li>Attempt to reverse engineer any software contained on the website</li>
                            <li>Remove any copyright or other proprietary notations from the materials</li>
                        </ul>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">3. Service Terms</h2>
                        <p class="text-gray-600 mb-4">
                            AMI provides power generation solutions and related services. By engaging our services, you agree to:
                        </p>
                        <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                            <li>Provide accurate and complete information for service requests</li>
                            <li>Comply with all applicable laws and regulations</li>
                            <li>Pay all fees and charges as agreed upon</li>
                            <li>Allow access to equipment for maintenance and service</li>
                        </ul>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">4. Payment Terms</h2>
                        <p class="text-gray-600 mb-4">
                            Payment terms are as follows:
                        </p>
                        <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                            <li>Payment is due within 30 days of invoice date unless otherwise specified</li>
                            <li>Late payments may incur additional charges</li>
                            <li>All prices are subject to change without notice</li>
                            <li>Currency and payment methods will be specified in individual contracts</li>
                        </ul>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">5. Warranty and Liability</h2>
                        <p class="text-gray-600 mb-4">
                            AMI warrants its products and services as follows:
                        </p>
                        <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                            <li>Products are warranted against defects in materials and workmanship</li>
                            <li>Services are performed by qualified technicians</li>
                            <li>Warranty terms vary by product and service type</li>
                            <li>Liability is limited to the cost of the product or service provided</li>
                        </ul>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">6. Intellectual Property</h2>
                        <p class="text-gray-600 mb-6">
                            All content, trademarks, and intellectual property on this website are owned by AMI or its licensors. You may not use, reproduce, or distribute any content without written permission from AMI.
                        </p>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">7. Privacy Policy</h2>
                        <p class="text-gray-600 mb-6">
                            Your privacy is important to us. Please review our Privacy Policy, which also governs your use of the website, to understand our practices.
                        </p>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">8. Termination</h2>
                        <p class="text-gray-600 mb-6">
                            AMI may terminate or suspend your access to our services immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.
                        </p>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">9. Governing Law</h2>
                        <p class="text-gray-600 mb-6">
                            These Terms shall be interpreted and governed by the laws of the jurisdiction in which AMI operates, without regard to its conflict of law provisions.
                        </p>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">10. Changes to Terms</h2>
                        <p class="text-gray-600 mb-6">
                            AMI reserves the right, at its sole discretion, to modify or replace these Terms at any time. If a revision is material, we will try to provide at least 30 days notice prior to any new terms taking effect.
                        </p>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">11. Contact Information</h2>
                        <p class="text-gray-600 mb-4">
                            If you have any questions about these Terms & Conditions, please contact us:
                        </p>
                        <div class="bg-gray-50 rounded-lg p-4 mb-6">
                            <p class="text-gray-600"><strong>Al Mohandes International (AMI)</strong></p>
                            <p class="text-gray-600">Email: info@ami.com</p>
                            <p class="text-gray-600">Phone: +1 (555) 123-4567</p>
                            <p class="text-gray-600">Address: [Company Address]</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-gradient-to-r from-ami-orange to-orange-600">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Questions About Our Terms?</h2>
            <p class="text-xl text-orange-100 mb-8 max-w-2xl mx-auto">Our legal team is here to help clarify any questions you may have.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact.index') }}" class="bg-white text-ami-orange px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Contact Legal Team
                </a>
                <a href="{{ route('privacy') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-ami-orange transition">
                    Privacy Policy
                </a>
            </div>
        </div>
    </section>
@endsection
