<x-layout>
    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-200 fixed w-full z-10">
        <div class="max-w-5xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <h1 class="text-xl font-bold text-blue-600">InstaApp</h1>
                </div>
                
                <!-- Search Bar -->
                {{-- <div class="hidden md:block mx-4 flex-1 max-w-md">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-gray-50 placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Search">
                    </div>
                </div> --}}
                
                <!-- Navigation Icons -->
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-gray-700 hover:text-gray-900">
                        <i class="fas fa-home text-2xl"></i>
                    </a>
                    <a href="#" class="text-gray-700 hover:text-gray-900">
                        <i class="far fa-plus-square text-2xl"></i>
                    </a>
                    <div class="ml-4 relative">
                        <div>
                            <button class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <img class="h-8 w-8 rounded-full" src="https://randomuser.me/api/portraits/women/44.jpg" alt="Profile">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16 pb-16 max-w-xl mx-auto">
        <!-- Stories -->
        <div class="bg-white border border-gray-200 rounded-sm mt-6 mb-6 p-4 overflow-x-auto">
            <div class="flex space-x-4">
                <!-- Your Story -->
                <div class="flex flex-col items-center space-y-1">
                    <div class="relative">
                        <div class="w-16 h-16 rounded-full p-0.5 bg-gradient-to-tr from-yellow-400 to-pink-500">
                            <div class="bg-white p-0.5 rounded-full">
                                <img class="w-14 h-14 rounded-full object-cover" src="https://randomuser.me/api/portraits/women/44.jpg" alt="Your story">
                            </div>
                        </div>
                        <div class="absolute bottom-0 right-0 bg-blue-500 rounded-full w-5 h-5 flex items-center justify-center border-2 border-white">
                            <i class="fas fa-plus text-white text-xs"></i>
                        </div>
                    </div>
                    <span class="text-xs truncate w-16 text-center">Your Story</span>
                </div>
                
                <!-- Other Stories -->
                <div class="flex flex-col items-center space-y-1">
                    <div class="w-16 h-16 rounded-full p-0.5 bg-gradient-to-tr from-yellow-400 to-pink-500">
                        <div class="bg-white p-0.5 rounded-full">
                            <img class="w-14 h-14 rounded-full object-cover" src="https://randomuser.me/api/portraits/women/32.jpg" alt="Story">
                        </div>
                    </div>
                    <span class="text-xs truncate w-16 text-center">jane_doe</span>
                </div>
                
                <div class="flex flex-col items-center space-y-1">
                    <div class="w-16 h-16 rounded-full p-0.5 bg-gradient-to-tr from-yellow-400 to-pink-500">
                        <div class="bg-white p-0.5 rounded-full">
                            <img class="w-14 h-14 rounded-full object-cover" src="https://randomuser.me/api/portraits/men/22.jpg" alt="Story">
                        </div>
                    </div>
                    <span class="text-xs truncate w-16 text-center">john_smith</span>
                </div>
                
                <div class="flex flex-col items-center space-y-1">
                    <div class="w-16 h-16 rounded-full p-0.5 bg-gradient-to-tr from-yellow-400 to-pink-500">
                        <div class="bg-white p-0.5 rounded-full">
                            <img class="w-14 h-14 rounded-full object-cover" src="https://randomuser.me/api/portraits/women/65.jpg" alt="Story">
                        </div>
                    </div>
                    <span class="text-xs truncate w-16 text-center">travel_girl</span>
                </div>
                
                <div class="flex flex-col items-center space-y-1">
                    <div class="w-16 h-16 rounded-full p-0.5 bg-gradient-to-tr from-yellow-400 to-pink-500">
                        <div class="bg-white p-0.5 rounded-full">
                            <img class="w-14 h-14 rounded-full object-cover" src="https://randomuser.me/api/portraits/men/75.jpg" alt="Story">
                        </div>
                    </div>
                    <span class="text-xs truncate w-16 text-center">food_lover</span>
                </div>
                
                <div class="flex flex-col items-center space-y-1">
                    <div class="w-16 h-16 rounded-full p-0.5 bg-gradient-to-tr from-yellow-400 to-pink-500">
                        <div class="bg-white p-0.5 rounded-full">
                            <img class="w-14 h-14 rounded-full object-cover" src="https://randomuser.me/api/portraits/women/12.jpg" alt="Story">
                        </div>
                    </div>
                    <span class="text-xs truncate w-16 text-center">fitness_queen</span>
                </div>
                
                <div class="flex flex-col items-center space-y-1">
                    <div class="w-16 h-16 rounded-full p-0.5 bg-gradient-to-tr from-yellow-400 to-pink-500">
                        <div class="bg-white p-0.5 rounded-full">
                            <img class="w-14 h-14 rounded-full object-cover" src="https://randomuser.me/api/portraits/men/45.jpg" alt="Story">
                        </div>
                    </div>
                    <span class="text-xs truncate w-16 text-center">tech_guy</span>
                </div>
            </div>
        </div>
        
        <!-- Posts -->
        <div class="space-y-6">
            <!-- Post 1 -->
            <div class="bg-white border border-gray-200 rounded-sm">
                <!-- Post Header -->
                <div class="flex items-center justify-between p-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-yellow-400 to-pink-500 p-0.5">
                            <div class="bg-white p-0.5 rounded-full">
                                <img class="w-6 h-6 rounded-full object-cover" src="https://randomuser.me/api/portraits/women/32.jpg" alt="Profile">
                            </div>
                        </div>
                        <span class="font-semibold text-sm">jane_doe</span>
                    </div>
                    <button class="text-gray-500">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
                
                <!-- Post Image -->
                <div class="w-full aspect-square bg-gray-200">
                    <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Post">
                </div>
                
                <!-- Post Actions -->
                <div class="p-3">
                    <div class="flex justify-between">
                        <div class="flex space-x-4">
                            <button class="text-gray-700 hover:text-red-500">
                                <i class="far fa-heart text-2xl"></i>
                            </button>
                            <button class="text-gray-700 hover:text-gray-500">
                                <i class="far fa-comment text-2xl"></i>
                            </button>
                            <button class="text-gray-700 hover:text-gray-500">
                                <i class="far fa-paper-plane text-2xl"></i>
                            </button>
                        </div>
                        <button class="text-gray-700 hover:text-gray-500">
                            <i class="far fa-bookmark text-2xl"></i>
                        </button>
                    </div>
                    
                    <!-- Likes -->
                    <div class="mt-2">
                        <span class="font-semibold text-sm">1,234 likes</span>
                    </div>
                    
                    <!-- Caption -->
                    <div class="mt-1">
                        <span class="font-semibold text-sm">jane_doe</span>
                        <span class="text-sm ml-1">Enjoying the beautiful sunset at the beach! #sunset #beach #vacation</span>
                    </div>
                    
                    <!-- Comments -->
                    <div class="mt-1">
                        <button class="text-gray-500 text-sm">View all 42 comments</button>
                    </div>
                    
                    <!-- Time Posted -->
                    <div class="mt-1">
                        <span class="text-gray-400 text-xs uppercase">2 hours ago</span>
                    </div>
                    
                    <!-- Add Comment -->
                    <div class="mt-3 flex items-center border-t border-gray-100 pt-3">
                        <input class="flex-1 text-sm border-none focus:ring-0" type="text" placeholder="Add a comment...">
                        <button class="text-blue-500 font-semibold text-sm">Post</button>
                    </div>
                </div>
            </div>
            
            <!-- Post 2 -->
            <div class="bg-white border border-gray-200 rounded-sm">
                <!-- Post Header -->
                <div class="flex items-center justify-between p-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-yellow-400 to-pink-500 p-0.5">
                            <div class="bg-white p-0.5 rounded-full">
                                <img class="w-6 h-6 rounded-full object-cover" src="https://randomuser.me/api/portraits/men/22.jpg" alt="Profile">
                            </div>
                        </div>
                        <span class="font-semibold text-sm">john_smith</span>
                    </div>
                    <button class="text-gray-500">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
                
                <!-- Post Image -->
                <div class="w-full aspect-square bg-gray-200">
                    <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1511765224389-37f0e77cf0eb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Post">
                </div>
                
                <!-- Post Actions -->
                <div class="p-3">
                    <div class="flex justify-between">
                        <div class="flex space-x-4">
                            <button class="text-gray-700 hover:text-red-500">
                                <i class="far fa-heart text-2xl"></i>
                            </button>
                            <button class="text-gray-700 hover:text-gray-500">
                                <i class="far fa-comment text-2xl"></i>
                            </button>
                            <button class="text-gray-700 hover:text-gray-500">
                                <i class="far fa-paper-plane text-2xl"></i>
                            </button>
                        </div>
                        <button class="text-gray-700 hover:text-gray-500">
                            <i class="far fa-bookmark text-2xl"></i>
                        </button>
                    </div>
                    
                    <!-- Likes -->
                    <div class="mt-2">
                        <span class="font-semibold text-sm">892 likes</span>
                    </div>
                    
                    <!-- Caption -->
                    <div class="mt-1">
                        <span class="font-semibold text-sm">john_smith</span>
                        <span class="text-sm ml-1">Weekend vibes with my favorite people! #friends #weekend #goodtimes</span>
                    </div>
                    
                    <!-- Comments -->
                    <div class="mt-1">
                        <button class="text-gray-500 text-sm">View all 23 comments</button>
                    </div>
                    
                    <!-- Time Posted -->
                    <div class="mt-1">
                        <span class="text-gray-400 text-xs uppercase">5 hours ago</span>
                    </div>
                    
                    <!-- Add Comment -->
                    <div class="mt-3 flex items-center border-t border-gray-100 pt-3">
                        <input class="flex-1 text-sm border-none focus:ring-0" type="text" placeholder="Add a comment...">
                        <button class="text-blue-500 font-semibold text-sm">Post</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <!-- Bottom Navigation (Mobile) -->
    <div class="md:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 flex justify-around items-center h-16 z-10">
        <a href="#" class="text-gray-700 hover:text-gray-900">
            <i class="fas fa-home text-2xl"></i>
        </a>
        <a href="#" class="text-gray-700 hover:text-gray-900">
            <i class="far fa-plus-square text-2xl"></i>
        </a>
        <a href="#" class="text-gray-700 hover:text-gray-900">
            <img class="h-6 w-6 rounded-full" src="https://randomuser.me/api/portraits/women/44.jpg" alt="Profile">
        </a>
    </div>
  </x-layout>