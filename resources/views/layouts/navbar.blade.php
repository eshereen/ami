    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <img src="{{ asset('imgs/logo.png') }}" alt="AMI Logo" class="h-14">

                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-ami-orange  hover:underline transition">Home</a>
                    <a href="#about" class="text-gray-700 hover:text-ami-orange  hover:underline transition">About</a>
                    <a href="#products" class="text-gray-700 hover:text-ami-orange  hover:underline transition">Products</a>
                    <a href="#services" class="text-gray-700 hover:text-ami-orange  hover:underline transition">Services</a>
                    <a href="#manufacturing" class="text-gray-700 hover:text-ami-orange  hover:underline transition">Manufacturing</a>
                    <a href="#global" class="text-gray-700 hover:text-ami-orange  hover:underline transition">Global Reach</a>
                    <a href="#contact" class="text-gray-700 hover:text-ami-orange  hover:underline transition">Contact</a>
                </nav>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-gray-700 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div x-show="mobileMenuOpen" x-transition class="md:hidden mt-4 pb-4">
                <div class="flex flex-col space-y-3">
                    <a href="#home" class="text-gray-700 hover:text-ami-blue transition" @click="mobileMenuOpen = false">Home</a>
                    <a href="#about" class="text-gray-700 hover:text-ami-blue transition" @click="mobileMenuOpen = false">About</a>
                    <a href="#products" class="text-gray-700 hover:text-ami-blue transition" @click="mobileMenuOpen = false">Products</a>
                    <a href="#services" class="text-gray-700 hover:text-ami-blue transition" @click="mobileMenuOpen = false">Services</a>
                    <a href="#manufacturing" class="text-gray-700 hover:text-ami-blue transition" @click="mobileMenuOpen = false">Manufacturing</a>
                    <a href="#global" class="text-gray-700 hover:text-ami-blue transition" @click="mobileMenuOpen = false">Global Reach</a>
                    <a href="#contact" class="text-gray-700 hover:text-ami-blue transition" @click="mobileMenuOpen = false">Contact</a>
                </div>
            </div>
        </div>
    </header>
