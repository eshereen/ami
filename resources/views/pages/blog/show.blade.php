@extends('layouts.app')
@section('content')
    <!-- Blog Post Header -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        @if($blog->image)
            <img src="{{ asset('storage/' . $blog->image) }}"
                 alt="{{ $blog->title }}"
                 class="object-cover w-full h-full">
        @else
            <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
                 alt="{{ $blog->title }}"
                 class="object-cover w-full h-full">
        @endif
        <div class="flex absolute inset-0 items-center bg-gradient-to-r from-blue-900/80 to-blue-700/60">
            <div class="container px-4 mx-auto">
                <div class="max-w-4xl">
                    <div class="flex items-center mb-4 text-blue-100">
                        <i class="mr-2 fas fa-user"></i>
                        <span>{{ $blog->user->name ?? 'AMI Team' }}</span>
                        <span class="mx-2">•</span>
                        <i class="mr-2 fas fa-calendar"></i>
                        <span>{{ $blog->created_at->format('M d, Y') }}</span>
                    </div>
                    <h1 class="mb-4 text-4xl font-bold text-white md:text-5xl fade-in">{{ $blog->title }}</h1>
                    <p class="text-xl text-blue-100 fade-in">Expert insights from AMI's technical team</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Content -->
    <section class="py-16">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col gap-12 lg:flex-row">
                <!-- Main Content -->
                <div class="lg:w-2/3">
                    <article class="max-w-none prose prose-lg">
                        <div class="p-8 bg-white rounded-xl shadow-lg">
                            {!! $blog->content !!}
                        </div>
                    </article>

                    <!-- Author Info -->
                    <div class="p-6 mt-8 bg-gray-50 rounded-xl">
                        <div class="flex items-center">
                            <div class="flex justify-center items-center mr-4 w-12 h-12 text-white rounded-full bg-ami-blue">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">{{ $blog->user->name ?? 'AMI Team' }}</h4>
                                <p class="text-sm text-gray-600">Technical Expert</p>
                            </div>
                        </div>
                    </div>

                    <!-- Share Buttons -->
                    <div class="p-6 mt-8 bg-white rounded-xl shadow-lg">
                        <h4 class="mb-4 font-bold text-gray-900">Share this article</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="px-4 py-2 text-white bg-blue-600 rounded-lg transition hover:bg-blue-700">
                                <i class="mr-2 fab fa-facebook-f"></i>Facebook
                            </a>
                            <a href="#" class="px-4 py-2 text-white bg-blue-400 rounded-lg transition hover:bg-blue-500">
                                <i class="mr-2 fab fa-twitter"></i>Twitter
                            </a>
                            <a href="#" class="px-4 py-2 text-white bg-blue-800 rounded-lg transition hover:bg-blue-900">
                                <i class="mr-2 fab fa-linkedin-in"></i>LinkedIn
                            </a>
                            <a href="#" class="px-4 py-2 text-white bg-gray-600 rounded-lg transition hover:bg-gray-700">
                                <i class="mr-2 fas fa-link"></i>Copy Link
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:w-1/3">
                    <!-- Related Posts -->
                    @if($relatedBlogs->count() > 0)
                    <div class="p-6 mb-8 bg-white rounded-xl shadow-lg">
                        <h3 class="mb-6 text-xl font-bold text-gray-900">Related Articles</h3>
                        <div class="space-y-4">
                            @foreach($relatedBlogs as $relatedBlog)
                            <div class="flex gap-4">
                                <div class="overflow-hidden flex-shrink-0 w-16 h-16 bg-gray-200 rounded-lg">
                                    @if($relatedBlog->image)
                                        <img src="{{ asset('storage/' . $relatedBlog->image) }}"
                                             alt="{{ $relatedBlog->title }}"
                                             class="object-cover w-full h-full">
                                    @else
                                        <div class="flex justify-center items-center w-full h-full bg-gradient-to-br from-blue-500 to-blue-700">
                                            <i class="text-white fas fa-newspaper"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <h4 class="mb-1 font-semibold text-gray-900 transition hover:text-ami-orange">
                                        <a href="{{ route('blog.show', $relatedBlog->slug) }}">{{ Str::limit($relatedBlog->title, 50) }}</a>
                                    </h4>
                                    <p class="text-sm text-gray-600">{{ $relatedBlog->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Newsletter Signup -->
                    <div class="p-6 text-white bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl">
                        <h3 class="mb-4 text-xl font-bold">Stay Updated</h3>
                        <p class="mb-4 text-blue-100">Get the latest insights delivered to your inbox.</p>
                        <form class="space-y-3">
                            <input type="email"
                                   placeholder="Your email address"
                                   class="px-4 py-2 w-full text-gray-900 rounded-lg border-0">
                            <button type="submit"
                                    class="px-4 py-2 w-full font-semibold text-white rounded-lg transition bg-ami-orange hover:bg-orange-600">
                                Subscribe
                            </button>
                        </form>
                    </div>

                    <!-- Quick Links -->
                    <div class="p-6 mt-8 bg-white rounded-xl shadow-lg">
                        <h3 class="mb-6 text-xl font-bold text-gray-900">Quick Links</h3>
                        <div class="space-y-3">
                            <a href="{{ route('products.index') }}" class="flex items-center text-gray-600 transition hover:text-ami-orange">
                                <i class="mr-3 fas fa-cube"></i>Our Products
                            </a>
                            <a href="{{ route('services.index') }}" class="flex items-center text-gray-600 transition hover:text-ami-orange">
                                <i class="mr-3 fas fa-tools"></i>Our Services
                            </a>
                            <a href="{{ route('contact.index') }}" class="flex items-center text-gray-600 transition hover:text-ami-orange">
                                <i class="mr-3 fas fa-envelope"></i>Contact Us
                            </a>
                            <a href="{{ route('blog.index') }}" class="flex items-center text-gray-600 transition hover:text-ami-orange">
                                <i class="mr-3 fas fa-newspaper"></i>All Articles
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
