@extends('layouts.app')
@section('content')
    <!-- Hero Section with Large Image -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
             alt="AMI Blog"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-blue-700/60 flex items-center">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 fade-in">AMI Blog</h1>
                <p class="text-xl text-blue-100 max-w-2xl fade-in">Insights, updates, and expert knowledge from the power generation industry</p>
            </div>
        </div>
    </section>

    <!-- Blog Introduction -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold ami-blue mb-4">Latest Insights</h2>
                <div class="w-24 h-1 bg-ami-orange mx-auto"></div>
                <p class="mt-4 text-gray-600 max-w-3xl mx-auto">
                    Stay informed with the latest trends, technical insights, and industry updates from AMI's expert team.
                    Our blog covers everything from maintenance tips to emerging technologies in power generation.
                </p>
            </div>
        </div>
    </section>

    <!-- Blog Posts Grid -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            @if ($blogs->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach ($blogs as $blog)
                <article class="bg-white rounded-xl shadow-lg overflow-hidden border border-blue-100 hover-lift">
                    <div class="h-48 overflow-hidden">
                        @if($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}"
                                 alt="{{ $blog->title }}"
                                 class="w-full h-full object-cover transition duration-500 hover:scale-110">
                        @else
                            <div class="h-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
                                <div class="text-center text-white">
                                    <i class="fas fa-newspaper text-4xl mb-4"></i>
                                    <h3 class="text-lg font-bold">{{ Str::limit($blog->title, 30) }}</h3>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <i class="fas fa-user mr-2"></i>
                            <span>{{ $blog->user->name ?? 'AMI Team' }}</span>
                            <span class="mx-2">•</span>
                            <i class="fas fa-calendar mr-2"></i>
                            <span>{{ $blog->created_at->format('M d, Y') }}</span>
                        </div>
                        <h3 class="text-xl font-bold text-blue-900 mb-3 hover:text-ami-orange transition">
                            <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                        </h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($blog->content), 120) }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-ami-orange font-semibold text-sm">Read More</span>
                            <a href="{{ route('blog.show', $blog->slug) }}" class="text-blue-600 hover:text-ami-orange transition">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center">
                {{ $blogs->links() }}
            </div>
            @else
            <div class="text-center py-16">
                <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No Blog Posts Yet</h3>
                <p class="text-gray-500">Our latest insights and updates will appear here soon.</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Newsletter Signup
    <section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Stay Updated</h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">Subscribe to our newsletter for the latest industry insights and company updates.</p>
            <div class="max-w-md mx-auto">
                <form class="flex flex-col sm:flex-row gap-4">
                    <input type="email"
                           placeholder="Enter your email address"
                           class="flex-1 px-4 py-3 rounded-lg border-0 focus:ring-2 focus:ring-ami-orange">
                    <button type="submit"
                            class="bg-ami-orange text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </section>-->

    <!-- Industry Insights
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold ami-blue mb-4">Industry Insights</h2>
                <div class="w-24 h-1 bg-ami-orange mx-auto"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Key topics we cover in our blog</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="bg-ami-blue text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-tools text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Maintenance Tips</h3>
                    <p class="text-gray-600">Best practices for equipment maintenance and care</p>
                </div>

                <div class="text-center">
                    <div class="bg-ami-blue text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-lightbulb text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Technical Solutions</h3>
                    <p class="text-gray-600">Expert solutions to common power generation challenges</p>
                </div>

                <div class="text-center">
                    <div class="bg-ami-blue text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-chart-line text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Industry Trends</h3>
                    <p class="text-gray-600">Latest developments and future outlook</p>
                </div>

                <div class="text-center">
                    <div class="bg-ami-blue text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-leaf text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Sustainability</h3>
                    <p class="text-gray-600">Green energy solutions and environmental impact</p>
                </div>
            </div>
        </div>
    </section>-->

    <!-- Call to Action -->
    <section class="py-16 bg-gradient-to-r from-ami-orange to-orange-600">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Have Questions?</h2>
            <p class="text-xl text-orange-100 mb-8 max-w-2xl mx-auto">Our expert team is ready to help with your power generation needs.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact.index') }}" class="bg-white text-ami-orange px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Contact Our Experts
                </a>
                <a href="{{ route('services.index') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-ami-orange transition">
                    Our Services
                </a>
            </div>
        </div>
    </section>
@endsection
