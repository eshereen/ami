@extends('layouts.app')
@section('content')
    <!-- Blog Post Header -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        @if($blog->image)
            <img src="{{ asset('storage/' . $blog->image) }}"
                 alt="{{ $blog->title }}"
                 class="w-full h-full object-cover">
        @else
            <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
                 alt="{{ $blog->title }}"
                 class="w-full h-full object-cover">
        @endif
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-blue-700/60 flex items-center">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl">
                    <div class="flex items-center text-blue-100 mb-4">
                        <i class="fas fa-user mr-2"></i>
                        <span>{{ $blog->user->name ?? 'AMI Team' }}</span>
                        <span class="mx-2">•</span>
                        <i class="fas fa-calendar mr-2"></i>
                        <span>{{ $blog->created_at->format('M d, Y') }}</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 fade-in">{{ $blog->title }}</h1>
                    <p class="text-xl text-blue-100 fade-in">Expert insights from AMI's technical team</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Content -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-12">
                <!-- Main Content -->
                <div class="lg:w-2/3">
                    <article class="prose prose-lg max-w-none">
                        <div class="bg-white rounded-xl shadow-lg p-8">
                            {!! $blog->content !!}
                        </div>
                    </article>

                    <!-- Author Info -->
                    <div class="bg-gray-50 rounded-xl p-6 mt-8">
                        <div class="flex items-center">
                            <div class="bg-ami-blue text-white rounded-full w-12 h-12 flex items-center justify-center mr-4">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">{{ $blog->user->name ?? 'AMI Team' }}</h4>
                                <p class="text-gray-600 text-sm">Technical Expert</p>
                            </div>
                        </div>
                    </div>

                    <!-- Share Buttons -->
                    <div class="bg-white rounded-xl shadow-lg p-6 mt-8">
                        <h4 class="font-bold text-gray-900 mb-4">Share this article</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                <i class="fab fa-facebook-f mr-2"></i>Facebook
                            </a>
                            <a href="#" class="bg-blue-400 text-white px-4 py-2 rounded-lg hover:bg-blue-500 transition">
                                <i class="fab fa-twitter mr-2"></i>Twitter
                            </a>
                            <a href="#" class="bg-blue-800 text-white px-4 py-2 rounded-lg hover:bg-blue-900 transition">
                                <i class="fab fa-linkedin-in mr-2"></i>LinkedIn
                            </a>
                            <a href="#" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                                <i class="fas fa-link mr-2"></i>Copy Link
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:w-1/3">
                    <!-- Related Posts -->
                    @if($relatedBlogs->count() > 0)
                    <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-6">Related Articles</h3>
                        <div class="space-y-4">
                            @foreach($relatedBlogs as $relatedBlog)
                            <div class="flex gap-4">
                                <div class="w-16 h-16 bg-gray-200 rounded-lg flex-shrink-0 overflow-hidden">
                                    @if($relatedBlog->image)
                                        <img src="{{ asset('storage/' . $relatedBlog->image) }}"
                                             alt="{{ $relatedBlog->title }}"
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
                                            <i class="fas fa-newspaper text-white"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-900 mb-1 hover:text-ami-orange transition">
                                        <a href="{{ route('blog.show', $relatedBlog->slug) }}">{{ Str::limit($relatedBlog->title, 50) }}</a>
                                    </h4>
                                    <p class="text-gray-600 text-sm">{{ $relatedBlog->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Newsletter Signup -->
                    <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl p-6 text-white">
                        <h3 class="text-xl font-bold mb-4">Stay Updated</h3>
                        <p class="text-blue-100 mb-4">Get the latest insights delivered to your inbox.</p>
                        <form class="space-y-3">
                            <input type="email"
                                   placeholder="Your email address"
                                   class="w-full px-4 py-2 rounded-lg border-0 text-gray-900">
                            <button type="submit"
                                    class="w-full bg-ami-orange text-white px-4 py-2 rounded-lg font-semibold hover:bg-orange-600 transition">
                                Subscribe
                            </button>
                        </form>
                    </div>

                    <!-- Quick Links -->
                    <div class="bg-white rounded-xl shadow-lg p-6 mt-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-6">Quick Links</h3>
                        <div class="space-y-3">
                            <a href="{{ route('products.index') }}" class="flex items-center text-gray-600 hover:text-ami-orange transition">
                                <i class="fas fa-cube mr-3"></i>Our Products
                            </a>
                            <a href="{{ route('services.index') }}" class="flex items-center text-gray-600 hover:text-ami-orange transition">
                                <i class="fas fa-tools mr-3"></i>Our Services
                            </a>
                            <a href="{{ route('contact.index') }}" class="flex items-center text-gray-600 hover:text-ami-orange transition">
                                <i class="fas fa-envelope mr-3"></i>Contact Us
                            </a>
                            <a href="{{ route('blog.index') }}" class="flex items-center text-gray-600 hover:text-ami-orange transition">
                                <i class="fas fa-newspaper mr-3"></i>All Articles
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-gradient-to-r from-ami-orange to-orange-600">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Need Technical Support?</h2>
            <p class="text-xl text-orange-100 mb-8 max-w-2xl mx-auto">Our expert team is ready to help with your power generation challenges.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact.index') }}" class="bg-white text-ami-orange px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Get Expert Help
                </a>
                <a href="{{ route('services.index') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-ami-orange transition">
                    Our Services
                </a>
            </div>
        </div>
    </section>
@endsection
