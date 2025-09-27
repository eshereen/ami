@extends('layouts.app')
@section('content')
    <!-- Hero Section with Large Image -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
             alt="AMI Blog"
             class="object-cover w-full h-full">
        <div class="flex absolute inset-0 items-center bg-gradient-to-r from-blue-900/80 to-blue-700/60">
            <div class="container px-4 mx-auto">
                <h1 class="mb-4 text-4xl font-bold text-white md:text-5xl fade-in">AMI Blog</h1>
                <p class="max-w-2xl text-xl text-blue-100 fade-in">Insights, updates, and expert knowledge from the power generation industry</p>
            </div>
        </div>
    </section>

    <!-- Blog Introduction -->
    <section class="py-16 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue">Latest Insights</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
                <p class="mx-auto mt-4 max-w-3xl text-gray-600">
                    Stay informed with the latest trends, technical insights, and industry updates from AMI's expert team.
                    Our blog covers everything from maintenance tips to emerging technologies in power generation.
                </p>
            </div>
        </div>
    </section>

    <!-- Blog Posts Grid -->
    <section class="py-16">
        <div class="container px-4 mx-auto">
            @if ($blogs->count() > 0)
            <div class="grid grid-cols-1 gap-8 mb-12 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($blogs as $blog)
                <article class="overflow-hidden bg-white rounded-xl border border-blue-100 shadow-lg hover-lift">
                    <div class="overflow-hidden h-48">
                        @if($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}"
                                 alt="{{ $blog->title }}"
                                 class="object-cover w-full h-full transition duration-500 hover:scale-110">
                        @else
                            <div class="flex justify-center items-center h-full bg-gradient-to-br from-blue-500 to-blue-700">
                                <div class="text-center text-white">
                                    <i class="mb-4 text-4xl fas fa-newspaper"></i>
                                    <h3 class="text-lg font-bold">{{ Str::limit($blog->title, 30) }}</h3>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-3 text-sm text-gray-500">
                            <i class="mr-2 fas fa-user"></i>
                            <span>{{ $blog->user->name ?? 'AMI Team' }}</span>
                            <span class="mx-2">•</span>
                            <i class="mr-2 fas fa-calendar"></i>
                            <span>{{ $blog->created_at->format('M d, Y') }}</span>
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-blue-900 transition hover:text-ami-orange">
                            <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                        </h3>
                        <p class="mb-4 text-gray-600">{{ Str::limit(strip_tags($blog->content), 120) }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-semibold text-ami-orange">Read Full Article</span>
                            <a href="{{ route('blog.show', $blog->slug) }}" class="text-blue-600 transition hover:text-ami-orange">
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
            <div class="py-16 text-center">
                <i class="mb-4 text-6xl text-gray-300 fas fa-newspaper"></i>
                <h3 class="mb-2 text-xl font-semibold text-gray-600">No Blog Posts Yet</h3>
                <p class="text-gray-500">Our latest insights and updates will appear here soon.</p>
            </div>
            @endif
        </div>
    </section>
@endsection
