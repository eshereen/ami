@extends('layouts.app')
@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
             alt="Privacy Policy"
             class="object-cover w-full h-full">
        <div class="flex absolute inset-0 items-center bg-gradient-to-r from-blue-900/80 to-blue-700/60">
            <div class="container px-4 mx-auto">
                <h1 class="mb-4 text-4xl font-bold text-white md:text-5xl fade-in">Privacy Policy</h1>

            </div>
        </div>
    </section>

    <!-- Privacy Content -->
    <section class="py-16">
        <div class="container px-4 mx-auto">
            <div class="mx-auto max-w-4xl">
                <div class="p-8 bg-white rounded-xl shadow-lg">
                    <div class="max-w-none prose prose-lg">


                        <p class="mb-6 text-gray-600">At Al Mohandes International Co. (AMI)., we respect your privacy and are committed to protecting your personal information.</p>
                        <p class="mb-6 text-gray-600">

                            When you contact us or fill out a form on our website, we may collect information such as your name, phone number, and email address for communication purposes only.
                            </p>
                            <p class="mb-6 text-gray-600">
                            We use this information solely to respond to your inquiries, provide quotations, and improve our services.
                            </p>
                            <p class="mb-6 text-gray-600">
                            We do not share, sell, or disclose your personal information to any third party unless required by law.
                            </p>
                            <p class="mb-6 text-gray-600">
                            Our website may use cookies and analytics tools to improve user experience and understand how visitors interact with our content.
                            </p>
                            <p class="mb-6 text-gray-600">
                                    By using this website, you consent to the collection and use of your information as described in this Privacy Policy.
                            </p>
                            <p class="mb-6 text-gray-600">
                            You may contact us at any time to update or request the deletion of your personal data.
                            </p>
                            <p class="mb-6 text-gray-600">
                                Al Mohandes International Co. (AMI) reserves the right to update or modify these Terms & Conditions and Privacy Policy at any time without prior notice.
                                Please review this page periodically for the latest information.
                            </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
