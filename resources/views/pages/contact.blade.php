@extends('layouts.app')

@section('title', 'Contact Us | Al Mohandes International')
@section('description', 'Get in touch with Al Mohandes International for inquiries about diesel generators, power solutions, and technical support.')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="{{ asset('imgs/call.jpg') }}" 
             alt="Contact Us" 
             class="object-cover w-full h-full"
             onerror="this.src='{{ asset('imgs/about-hero.jpg') }}'">
        <div class="flex absolute inset-0 items-center bg-gradient-to-r from-blue-900/80 to-blue-700/60">
            <div class="container px-4 mx-auto">
                <h1 class="mb-4 text-4xl font-bold text-white md:text-5xl fade-in">Contact Us</h1>
                <p class="max-w-2xl text-xl text-blue-100 fade-in">Get in touch with our team for inquiries, quotes, or support</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="container px-4 mx-auto">
            <!-- Form Container - 2/3 width, centered -->
            <div class="max-w-4xl mx-auto">
                <!-- Header -->
                <div class="mb-12 text-center animate-fade-in-down">
                    <h2 class="mb-4 text-4xl font-bold text-ami-blue">Send Us a Message</h2>
                    <div class="mx-auto w-24 h-1 mb-4 bg-ami-orange"></div>
                    <p class="text-lg text-gray-600">Fill out the form below and our team will get back to you as soon as possible.</p>
                </div>

                <!-- Form Card -->
                <div class="bg-white rounded-2xl shadow-2xl p-8 md:p-12 animate-fade-in-up">
                    @if(session('success'))
                        <div class="p-4 mb-8 bg-green-50 rounded-xl border-l-4 border-green-500 animate-slide-in-right">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <i class="text-2xl text-green-500 fas fa-check-circle"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="font-semibold text-green-800">
                                        {{ session('success') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="p-4 mb-8 bg-red-50 rounded-xl border-l-4 border-red-500 animate-shake">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <i class="text-2xl text-red-500 fas fa-exclamation-circle"></i>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-red-800">
                                        Please correct the following errors:
                                    </h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <ul class="space-y-1 list-disc list-inside">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="post" action="{{ route('contact.store') }}" class="space-y-6">
                        @csrf
                        
                        <!-- Name Field -->
                        <div class="group">
                            <label for="name" class="block mb-2 text-sm font-semibold text-gray-700 transition-colors group-focus-within:text-ami-blue">
                                <i class="mr-2 fas fa-user"></i>Name *
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   required
                                   placeholder="Enter your full name"
                                   class="px-5 py-4 w-full text-gray-900 bg-gray-50 rounded-xl border-2 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-ami-blue/20 focus:border-ami-blue focus:bg-white hover:border-ami-blue/50 @error('name') border-red-500 @else border-gray-200 @enderror">
                            @error('name')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <i class="mr-1 fas fa-exclamation-circle"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div class="group">
                            <label for="email" class="block mb-2 text-sm font-semibold text-gray-700 transition-colors group-focus-within:text-ami-blue">
                                <i class="mr-2 fas fa-envelope"></i>Email *
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required
                                   placeholder="your.email@example.com"
                                   class="px-5 py-4 w-full text-gray-900 bg-gray-50 rounded-xl border-2 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-ami-blue/20 focus:border-ami-blue focus:bg-white hover:border-ami-blue/50 @error('email') border-red-500 @else border-gray-200 @enderror">
                            @error('email')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <i class="mr-1 fas fa-exclamation-circle"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Phone Field -->
                        <div class="group">
                            <label for="phone" class="block mb-2 text-sm font-semibold text-gray-700 transition-colors group-focus-within:text-ami-blue">
                                <i class="mr-2 fas fa-phone"></i>Phone
                            </label>
                            <input type="tel" 
                                   id="phone" 
                                   name="phone" 
                                   value="{{ old('phone') }}" 
                                   placeholder="+20 123 456 7890"
                                   class="px-5 py-4 w-full text-gray-900 bg-gray-50 rounded-xl border-2 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-ami-blue/20 focus:border-ami-blue focus:bg-white hover:border-ami-blue/50 @error('phone') border-red-500 @else border-gray-200 @enderror">
                            @error('phone')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <i class="mr-1 fas fa-exclamation-circle"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Message Field -->
                        <div class="group">
                            <label for="message" class="block mb-2 text-sm font-semibold text-gray-700 transition-colors group-focus-within:text-ami-blue">
                                <i class="mr-2 fas fa-comment-dots"></i>Your Message *
                            </label>
                            <textarea id="message" 
                                      name="message" 
                                      rows="6" 
                                      required
                                      placeholder="Tell us about your inquiry..."
                                      class="px-5 py-4 w-full text-gray-900 bg-gray-50 rounded-xl border-2 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-ami-blue/20 focus:border-ami-blue focus:bg-white hover:border-ami-blue/50 resize-none @error('message') border-red-500 @else border-gray-200 @enderror">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <i class="mr-1 fas fa-exclamation-circle"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button type="submit" 
                                    class="w-full px-8 py-5 text-lg font-bold text-white rounded-xl transition-all duration-300 transform bg-gradient-to-r from-ami-orange to-orange-600 hover:from-orange-600 hover:to-ami-orange hover:scale-[1.02] hover:shadow-2xl focus:outline-none focus:ring-4 focus:ring-ami-orange/50 active:scale-95">
                                <i class="mr-3 fas fa-paper-plane"></i>Send Message
                                <i class="ml-3 fas fa-arrow-right"></i>
                            </button>
                        </div>

                        <!-- Additional Info -->
                        <div class="pt-6 border-t border-gray-200">
                            <p class="text-center text-sm text-gray-600">
                                <i class="mr-2 fas fa-shield-alt text-ami-blue"></i>
                                Your information is safe and will never be shared with third parties.
                            </p>
                        </div>
                    </form>
                </div>

                <!-- Contact Info Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-ami-blue">
                            <i class="text-2xl text-white fas fa-phone"></i>
                        </div>
                        <h3 class="mb-2 font-bold text-gray-900">Call Us</h3>
                        <a href="tel:+201223295077" class="text-ami-orange hover:text-orange-600 transition">(+2) 01223295077</a>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-ami-blue">
                            <i class="text-2xl text-white fas fa-envelope"></i>
                        </div>
                        <h3 class="mb-2 font-bold text-gray-900">Email Us</h3>
                        <a href="mailto:inquiry@amigenset.com" class="text-ami-orange hover:text-orange-600 transition block">inquiry@amigenset.com</a>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-ami-blue">
                            <i class="text-2xl text-white fa-brands fa-whatsapp"></i>
                        </div>
                        <h3 class="mb-2 font-bold text-gray-900">WhatsApp</h3>
                        <a href="https://wa.me/201223295077" target="_blank" class="text-ami-orange hover:text-orange-600 transition">(+2) 01223295077</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-16 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="mb-12 text-center">
                <h2 class="mb-4 text-3xl font-bold text-ami-blue md:text-4xl">Find Us</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
            </div>
            <div class="overflow-hidden rounded-xl shadow-lg">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3456.123456789!2d30.9!3d30.0!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzDCsDAwJzAwLjAiTiAzMMKwNTQnMDAuMCJF!5e0!3m2!1sen!2seg!4v1234567890123!5m2!1sen!2seg" 
                        width="100%" 
                        height="450" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <style>
        @keyframes fade-in-down {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slide-in-right {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }

        .animate-fade-in-down {
            animation: fade-in-down 0.6s ease-out;
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out;
        }

        .animate-slide-in-right {
            animation: slide-in-right 0.5s ease-out;
        }

        .animate-shake {
            animation: shake 0.5s ease-in-out;
        }
    </style>
@endsection
