@extends('layouts.app')
@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
             alt="Terms & Conditions"
             class="object-cover w-full h-full">
        <div class="flex absolute inset-0 items-center bg-gradient-to-r from-blue-900/80 to-blue-700/60">
            <div class="container px-4 mx-auto">
                <h1 class="mb-4 text-4xl font-bold text-white md:text-5xl fade-in">Terms & Conditions</h1>
                <p class="max-w-2xl text-xl text-blue-100 fade-in">Please read these terms carefully before using our services</p>
            </div>
        </div>
    </section>

    <!-- Terms Content -->
    <section class="py-16">
        <div class="container px-4 mx-auto">
            <div class="mx-auto max-w-4xl">
                <div class="p-8 bg-white rounded-xl shadow-lg">
                    <div class="max-w-none prose prose-lg">

<p class="mb-6 text-gray-600">
    Welcome to Al Mohandes International Co. (AMI) website.
    By accessing and using this website, you agree to comply with and be bound by the following terms and conditions.
</p>

                        <p class="mb-6 text-gray-600">
                        - All content, images, product descriptions, and information on this website are the property of Al Mohandes International Co. (AMI) and may not be copied, reproduced, or used without prior written permission.
                        </p>
                        <p class="mb-6 text-gray-600">
                        - Product specifications, features, and prices may change without prior notice.
                        </p>
                        <p class="mb-6 text-gray-600">
                        - While we strive to ensure all information is accurate and up to date, Al Mohandes International Co. (AMI) assumes no liability for any errors, inaccuracies, or omissions.
                        </p>
                        <p class="mb-6 text-gray-600">
                        - Any misuse of the information or materials contained on this website is strictly prohibited.
                        </p>
                        <p class="mb-6 text-gray-600">
                        - All official communications, quotations, and business dealings should be made directly through our authorized representatives or official company contact channels.
                        </p>
                        <p class="mb-6 text-gray-600">
                        - This website may contain links to external websites; Al Mohandes International Co. (AMI) is not responsible for the content or accuracy of any third-party sites.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
