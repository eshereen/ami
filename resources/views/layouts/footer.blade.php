
    <!-- Footer -->
    <footer class="py-12 text-white bg-ami-blue">
        <div class="container px-4 mx-auto">
            <div class="grid grid-cols-1 gap-8 text-center md:grid-cols-4 md:text-left">
                <!-- Company Info - Centered on mobile, left on desktop -->
                <div class="flex flex-col items-center md:items-start">
                    <img src="{{ asset('imgs/dark-logo.png') }}" alt="AMI Logo" class="mb-4 h-12" loading="lazy" decoding="async">
                    <p class="text-gray-300">Powering reliability since 1983, Al Mohandes International is a global leader in diesel generator solutions.</p>
                </div>

                <!-- Quick Links - Centered on mobile, left on desktop -->
                <div class="flex flex-col items-center md:items-start">
                    <h4 class="mb-4 text-xl font-bold">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-300 transition hover:text-white">Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-300 transition hover:text-white">About Us</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-300 transition hover:text-white">Products</a></li>
                        <li><a href="{{ route('services.index') }}" class="text-gray-300 transition hover:text-white">Services</a></li>
                        <li><a href="#contact" class="text-gray-300 transition hover:text-white">Contact</a></li>
                    </ul>
                </div>

                <!-- Products - Centered on mobile, left on desktop -->
                <div class="flex flex-col items-center md:items-start">
                    <h4 class="mb-4 text-xl font-bold">Products</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('products.index') }}" class="text-gray-300 transition hover:text-white">Generator Sets</a></li>
                        <li><a href="#" class="text-gray-300 transition hover:text-white">Accessories</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-300 transition hover:text-white">Trailers</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-300 transition hover:text-white">Canopies</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-300 transition hover:text-white">Low Voltage Panels</a></li>
                    </ul>
                </div>

                <!-- Social Media - Centered on mobile, left on desktop -->
                <div class="flex flex-col items-center md:items-start">
                    <h4 class="mb-4 text-xl font-bold">Connect With Us</h4>
                    <div class="flex justify-center mb-4 space-x-4 md:justify-start">
                        <a href="http://www.facebook.com/Al-Mohandes-International-AMI-469567549743548" class="flex justify-center items-center w-10 h-10 bg-white bg-opacity-20 rounded-full transition hover:bg-ami-orange">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="http://www.youtube.com/user/amigenset" class="flex justify-center items-center w-10 h-10 bg-white bg-opacity-20 rounded-full transition hover:bg-ami-orange">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="http://www.linkedin.com/company/almohandesinternational" class="flex justify-center items-center w-10 h-10 bg-white bg-opacity-20 rounded-full transition hover:bg-ami-orange">
                            <i class="fab fa-linkedin-in"></i>
                        </a>

                    </div>
                </div>
            </div>

            <!-- Footer Bottom - Centered on mobile, justified on desktop -->
            <div class="pt-8 mt-12 border-t border-white border-opacity-20">
                <div class="flex flex-col items-center md:flex-row md:justify-between">
                    <p class="text-center text-gray-300 md:text-left">&copy; 2025 Al Mohandes International. All rights reserved.</p>
                    <div class="flex flex-col items-center mt-4 space-y-2 md:flex-row md:space-y-0 md:space-x-6 md:mt-0">
                        <a href="{{ route('terms') }}" class="text-gray-300 transition hover:text-white">Terms & Conditions</a>
                        <a href="{{ route('privacy') }}" class="text-gray-300 transition hover:text-white">Privacy Policy</a>
                    </div>
                </div>

                <!-- Developer Credit - Hidden from users, visible to search engines -->
                <div class="sr-only">
                    <p>Developed by <a href="https://medsite.dev" rel="nofollow">Medsite</a></p>
                </div>
            </div>
        </div>
    </footer>
