<nav class="bg-white border-b border-gray-200 fixed w-full z-10">
    <div class="max-w-5xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <i class="fas fa-users text-blue-600 text-2xl mr-2"></i>
                    <a href="/home" class="text-xl font-bold text-blue-600">InstaApp</a>
                </div>
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
            <div class="flex items-center">
                <div class="hidden md:block space-x-4">
                  <a href="/home" class="text-gray-700 hover:text-gray-900" title="Home">
                      <i class="fas fa-home text-2xl"></i>
                  </a>
                  <a href="/add" class="text-gray-700 hover:text-gray-900" title="Add Post">
                      <i class="fas fa-pen-to-square text-2xl"></i>
                  </a>
                </div>
                <div class="relative">
                    <div class="ml-4 relative" id="profileDropdown">
                    <!-- Tombol Profil -->
                    <button id="profileButton" class="flex items-center">
                        <div class="w-8 h-8 rounded-full bg-blue-500 p-0.5">
                            <div class="bg-white p-0.5 rounded-full flex items-center justify-center">
                                <span class="w-6 h-6 rounded-full bg-blue-600 text-white text-xs font-semibold flex items-center justify-center">
                                    {{ collect(explode(' ', auth()->user()->name))->map(fn($part) => strtoupper(substr($part, 0, 1)))->join('') }}
                                </span>
                            </div>
                        </div>
                    </button>
                    
        
                    <!-- Dropdown Menu -->
                    <div id="dropdownMenu" class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-neutral-200 ring-opacity-40 focus:outline-none z-50">
                        <div class="py-1" role="none">
                            <span href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 font-bold" role="menuitem">{{ auth()->user()->name }} ({{ auth()->user()->username }})</span>
                            <div class="border-t border-gray-100"></div>
                            <a href="/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Log Out</a>
                        </div>
                    </div>
                </div>

                <script>
                    const profileButton = document.getElementById('profileButton');
                    const dropdownMenu = document.getElementById('dropdownMenu');
                    
                    // Toggle dropdown saat tombol diklik
                    profileButton.addEventListener('click', () => {
                        dropdownMenu.classList.toggle('hidden');
                    });
                    
                    // Tutup dropdown saat klik di luar
                    document.addEventListener('click', (e) => {
                        if (!profileDropdown.contains(e.target)) {
                            dropdownMenu.classList.add('hidden');
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</nav>