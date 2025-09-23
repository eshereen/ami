
    <!-- Footer -->
    <footer class="bg-ami-blue text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <img src="{{ asset('imgs/dark-logo.png') }}" alt="AMI Logo" class="h-12 mb-4">
                    <p class="text-gray-300">Powering reliability since 1983, Al Mohandes International is a global leader in diesel generator solutions.</p>
                </div>

                <div>
                    <h4 class="text-xl font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white transition">Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white transition">About Us</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-300 hover:text-white transition">Products</a></li>
                        <li><a href="{{ route('services.index') }}" class="text-gray-300 hover:text-white transition">Services</a></li>
                        <li><a href="#contact" class="text-gray-300 hover:text-white transition">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-xl font-bold mb-4">Products</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('products.index') }}" class="text-gray-300 hover:text-white transition">Generator Sets</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Accessories</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-300 hover:text-white transition">Trailers</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-300 hover:text-white transition">Canopies</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-gray-300 hover:text-white transition">Low Voltage Panels</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-xl font-bold mb-4">Connect With Us</h4>
                    <div class="flex space-x-4 mb-4">
                        <a href="#" class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-ami-orange transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-ami-orange transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                                <a href="#" class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-ami-orange transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-ami-orange transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                  {{--   <p class="text-gray-300">Subscribe to our newsletter for updates and offers.</p>
                    <div class="mt-4 flex">
                        <input type="email" placeholder="Your email" class="px-4 py-2 rounded-l-lg text-gray-800 w-full focus:outline-none">
                        <button class="bg-ami-orange hover:bg-orange-600 px-4 py-2 rounded-r-lg transition">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div> --}}
                </div>
            </div>

            <div class="border-t border-white border-opacity-20 mt-12 pt-8 text-center">
                <p class="text-gray-300">&copy; 2025 Al Mohandes International. All rights reserved.</p>
            </div>
        </div>
    </footer>
