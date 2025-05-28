@extends('components.layout')
@section('title', $title)

@section('content')
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        /* Animation for the blobs */
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }
            33% {
                transform: translate(30px, -50px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }
        
        .animate-blob {
            animation: blob 7s infinite;
        }
        
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        
        /* Mobile menu animation */
        .mobile-menu {
            display: none;
            opacity: 0;
            transform: translateY(-20px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        
        .mobile-menu.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }
    </style>
    <!-- Navigation -->
    <nav class="bg-white shadow-sm relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-users text-blue-600 text-2xl mr-2"></i>
                        <span class="text-xl font-bold text-blue-600">InstaApp</span>
                    </div>
                </div>
                <div class="hidden md:ml-6 md:flex md:items-center md:space-x-8">
                    <a href="#" class="text-gray-500 hover:text-gray-700 px-3 py-2 text-sm font-medium">Features</a>
                    <a href="#" class="text-gray-500 hover:text-gray-700 px-3 py-2 text-sm font-medium">About</a>
                    <a href="#" class="text-gray-500 hover:text-gray-700 px-3 py-2 text-sm font-medium">Contact</a>
                    <a href="login" class="text-blue-600 hover:text-blue-800 px-3 py-2 text-sm font-medium">Log In</a>
                    <a href="register" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">Sign Up</a>
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 mobile-menu-button">
                        <span class="sr-only">Open main menu</span>
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile menu -->
        <div class="mobile-menu md:hidden absolute w-full bg-white shadow-md z-10">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Features</a>
                <a href="#" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">About</a>
                <a href="#" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Contact</a>
                <a href="login" class="block px-3 py-2 text-base font-medium text-blue-600 hover:text-blue-800 hover:bg-gray-50">Log In</a>
                <a href="register" class="block px-3 py-2 text-base font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-md text-center">Sign Up</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-gradient text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20 lg:py-32">
            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="lg:w-1/2 mb-10 lg:mb-0 text-center lg:text-left">
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-6 leading-tight">Connect with friends and the world around you</h1>
                    <p class="text-lg md:text-xl mb-8 opacity-90 max-w-lg mx-auto lg:mx-0">Join millions of people sharing moments, ideas, and experiences on InstaApp.</p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center lg:justify-start">
                        <a href="register" class="bg-white text-blue-600 hover:bg-gray-100 px-6 py-3 rounded-md text-lg font-semibold text-center">Get Started</a>
                        <a href="#" class="border-2 border-white text-white hover:bg-white hover:text-blue-600 px-6 py-3 rounded-md text-lg font-semibold text-center">Learn More</a>
                    </div>
                </div>
                <div class="lg:w-1/2 flex justify-center mt-10 lg:mt-0">
                    <div class="relative w-full max-w-md">
                        <div class="absolute -top-10 -left-10 w-48 h-48 sm:w-64 sm:h-64 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
                        <div class="absolute -bottom-10 -right-10 w-48 h-48 sm:w-64 sm:h-64 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
                        <div class="relative">
                            <img class="rounded-lg shadow-2xl w-full" src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="People connecting on InstaApp">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16 lg:py-24">
        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4">Why Choose InstaApp?</h2>
            <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto">Discover the features that make us different</p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 lg:gap-10">
            <div class="bg-white p-6 md:p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="w-14 h-14 sm:w-16 sm:h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4 mx-auto">
                    <i class="fas fa-user-friends text-blue-600 text-xl sm:text-2xl"></i>
                </div>
                <h3 class="text-lg sm:text-xl font-semibold mb-3 text-center">Real Connections</h3>
                <p class="text-gray-600 text-center">Build meaningful relationships with people who share your interests and passions.</p>
            </div>
            
            <div class="bg-white p-6 md:p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="w-14 h-14 sm:w-16 sm:h-16 bg-pink-100 rounded-full flex items-center justify-center mb-4 mx-auto">
                    <i class="fas fa-photo-video text-pink-600 text-xl sm:text-2xl"></i>
                </div>
                <h3 class="text-lg sm:text-xl font-semibold mb-3 text-center">Share Moments</h3>
                <p class="text-gray-600 text-center">Post photos, videos, and stories to share your life with friends and family.</p>
            </div>
            
            <div class="bg-white p-6 md:p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="w-14 h-14 sm:w-16 sm:h-16 bg-purple-100 rounded-full flex items-center justify-center mb-4 mx-auto">
                    <i class="fas fa-globe-americas text-purple-600 text-xl sm:text-2xl"></i>
                </div>
                <h3 class="text-lg sm:text-xl font-semibold mb-3 text-center">Discover World</h3>
                <p class="text-gray-600 text-center">Explore content from around the world and discover new perspectives.</p>
            </div>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="bg-gray-50 py-12 md:py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4">What Our Users Say</h2>
                <p class="text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto">Join millions of happy users worldwide</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                <div class="bg-white p-5 md:p-6 rounded-lg shadow hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <img class="w-10 h-10 sm:w-12 sm:h-12 rounded-full" src="https://randomuser.me/api/portraits/women/32.jpg" alt="User">
                        <div class="ml-3 sm:ml-4">
                            <h4 class="font-semibold text-sm sm:text-base">Sarah Johnson</h4>
                            <p class="text-gray-600 text-xs sm:text-sm">@sarahj</p>
                        </div>
                    </div>
                    <p class="text-gray-700 text-sm sm:text-base">"InstaApp helped me reconnect with old friends and make new ones who share my love for photography. The community is amazing!"</p>
                </div>
                
                <div class="bg-white p-5 md:p-6 rounded-lg shadow hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <img class="w-10 h-10 sm:w-12 sm:h-12 rounded-full" src="https://randomuser.me/api/portraits/men/45.jpg" alt="User">
                        <div class="ml-3 sm:ml-4">
                            <h4 class="font-semibold text-sm sm:text-base">Michael Chen</h4>
                            <p class="text-gray-600 text-xs sm:text-sm">@michaelc</p>
                        </div>
                    </div>
                    <p class="text-gray-700 text-sm sm:text-base">"As a traveler, I love sharing my adventures on InstaApp. The platform makes it so easy to connect with fellow travelers worldwide."</p>
                </div>
                
                <div class="bg-white p-5 md:p-6 rounded-lg shadow hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <img class="w-10 h-10 sm:w-12 sm:h-12 rounded-full" src="https://randomuser.me/api/portraits/women/65.jpg" alt="User">
                        <div class="ml-3 sm:ml-4">
                            <h4 class="font-semibold text-sm sm:text-base">Emma Rodriguez</h4>
                            <p class="text-gray-600 text-xs sm:text-sm">@emmar</p>
                        </div>
                    </div>
                    <p class="text-gray-700 text-sm sm:text-base">"I've found so many creative inspiration on InstaApp. It's my go-to platform for discovering new ideas and connecting with like-minded people."</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-blue-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16 lg:py-20 text-center">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-4 md:mb-6">Ready to join our community?</h2>
            <p class="text-lg md:text-xl mb-6 md:mb-8 max-w-3xl mx-auto opacity-90">Sign up now and start connecting with people who share your interests.</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="register" class="bg-white text-blue-600 hover:bg-gray-100 px-6 py-3 sm:px-8 sm:py-3 rounded-md text-lg font-semibold">Sign Up Free</a>
                <a href="#" class="border-2 border-white text-white hover:bg-white hover:text-blue-600 px-6 py-3 sm:px-8 sm:py-3 rounded-md text-lg font-semibold">Learn More</a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
                <div>
                    <h3 class="text-white font-semibold mb-3 md:mb-4 text-sm sm:text-base">Company</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white text-xs sm:text-sm">About</a></li>
                        <li><a href="#" class="hover:text-white text-xs sm:text-sm">Careers</a></li>
                        <li><a href="#" class="hover:text-white text-xs sm:text-sm">Blog</a></li>
                        <li><a href="#" class="hover:text-white text-xs sm:text-sm">Press</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-3 md:mb-4 text-sm sm:text-base">Support</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white text-xs sm:text-sm">Help Center</a></li>
                        <li><a href="#" class="hover:text-white text-xs sm:text-sm">Safety</a></li>
                        <li><a href="#" class="hover:text-white text-xs sm:text-sm">Community Guidelines</a></li>
                        <li><a href="#" class="hover:text-white text-xs sm:text-sm">Contact Us</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-3 md:mb-4 text-sm sm:text-base">Legal</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white text-xs sm:text-sm">Terms</a></li>
                        <li><a href="#" class="hover:text-white text-xs sm:text-sm">Privacy</a></li>
                        <li><a href="#" class="hover:text-white text-xs sm:text-sm">Cookie Policy</a></li>
                        <li><a href="#" class="hover:text-white text-xs sm:text-sm">GDPR</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-3 md:mb-4 text-sm sm:text-base">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white text-sm sm:text-base">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm sm:text-base">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm sm:text-base">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm sm:text-base">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm sm:text-base">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                    <div class="mt-4">
                        <p class="text-xs sm:text-sm">Download our app:</p>
                        <div class="flex space-x-2 mt-2">
                            <a href="#" class="bg-black text-white px-2 py-1 rounded text-xs flex items-center">
                                <i class="fab fa-apple mr-1"></i> App Store
                            </a>
                            <a href="#" class="bg-black text-white px-2 py-1 rounded text-xs flex items-center">
                                <i class="fab fa-google-play mr-1"></i> Play Store
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-8 md:mt-12 pt-6 md:pt-8 border-t border-gray-800 text-xs sm:text-sm text-gray-400 text-center">
                <p>© 2025 InstaApp. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');
        
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('active');
            
            // Toggle icon between hamburger and close
            const icon = mobileMenuButton.querySelector('i');
            if (mobileMenu.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
                mobileMenu.classList.remove('active');
                const icon = mobileMenuButton.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
    </script>
@endsection