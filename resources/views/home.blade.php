@extends('components.layout')
@section('title', $title)

@section('content')
    <!-- Navbar -->
    @include('components.navbar')

    <!-- Main Content -->
    <main class="pt-22 pb-22 max-w-xl mx-auto pl-4 pr-4">
        <!-- Stories -->
        {{-- <div class="bg-white border border-gray-200 rounded-sm mt-6 mb-6 p-4 overflow-x-auto">
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
        </div> --}}
        
        <!-- Posts -->
        <div class="space-y-6" id="post-wrapper">
            <div class="text-center py-16">
                <h2 class="text-gray-600 text-lg mt-4">Loading...</h2>
                <p class="text-gray-400 text-sm">Please wait...</p>
            </div>
        </div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            const wrapper = document.querySelector('#post-wrapper');

            try {
                const res = await fetch('/api/posts');
                const posts = await res.json();
                wrapper.innerHTML = '';

                if (posts.data.length === 0) {
                    wrapper.innerHTML = `
                        <div class="text-center py-16">
                            <img src="https://www.svgrepo.com/show/97068/empty-box.svg" alt="No Posts" class="mx-auto w-24 h-24 opacity-50">
                            <h2 class="text-gray-600 text-lg mt-4">No posts yet</h2>
                            <p class="text-gray-400 text-sm">Come on, be the first to post something!</p>
                        </div>
                    `;
                    return;
                }

                posts.data.forEach(post => {
                    const postEl = `
                    <div class="bg-white border border-gray-200 rounded-sm">
                        <div class="flex items-center justify-between p-3">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 rounded-full bg-blue-500 p-0.5">
                                    <div class="bg-white p-0.5 rounded-full flex items-center justify-center">
                                        <span class="w-6 h-6 rounded-full bg-blue-600 text-white text-xs font-semibold flex items-center justify-center">
                                           ${post.name.split(' ').map(w => w[0].toUpperCase()).join('')}
                                        </span>
                                    </div>
                                </div>
                                <span class="font-semibold text-sm">${post.username}</span>
                            </div>
                        </div>
                        
                        <a href="detail/${post.id}" class="w-full aspect-square bg-gray-200">
                            <img class="w-full h-full object-cover" src="${post.image_path || 'https://via.placeholder.com/500'}" alt="Post">
                        </a>

                        <div class="p-3">
                            <div class="flex justify-between">
                                <div class="flex space-x-4">
                                    <button class="like-btn text-gray-700 hover:text-red-500" onclick="toggleLike(${post.id})">
                                        <i id="like-${post.id}" class="${post.is_liked ? 'fas text-red-500' : 'far'} fa-heart text-2xl"></i>
                                    </button>
                                    <a href="detail/${post.id}" class="text-gray-700 hover:text-gray-500">
                                        <i class="far fa-comment text-2xl"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="mt-2">
                                <span class="font-semibold text-sm" id="likes-${post.id}">${post.likes_count} likes</span>
                            </div>

                            <div class="mt-1">
                                <span class="font-semibold text-sm">${post.username}</span>
                                <span class="text-sm ml-1">${post.content}</span>
                            </div>

                            <div class="mt-1">
                                <a href="detail/${post.id}" id="comments-${post.id}" class="text-gray-500 text-sm">View all ${post.comments_count} comments</a>
                            </div>

                            <div class="mt-1">
                                <span class="text-gray-400 text-xs uppercase">${post.created_at}</span>
                            </div>

                            <div class="mt-3 flex items-center border-t border-gray-100 pt-3">
                                <input id="comment-${post.id}" class="flex-1 text-sm outline-none focus:ring-0" type="text" placeholder="Add a comment..." required>
                                <button class="text-blue-500 font-semibold text-sm" onclick="submitComment(${post.id})">Post</button>
                            </div>
                        </div>
                    </div>
                    `;
                    wrapper.insertAdjacentHTML('beforeend', postEl);
                });

            } catch (err) {
                console.error('Error fetching posts:', err);
                wrapper.innerHTML = `
                    <div class="text-center text-red-500 mt-6">
                        Gagal memuat postingan. Coba refresh halaman.
                    </div>`;
            }
        });

        async function toggleLike(postId) {
            const icon = document.getElementById(`like-${postId}`);
            const countEl = document.getElementById(`likes-${postId}`);

            try {
                const res = await fetch(`/api/posts/${postId}/like`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                });

                if (!res.ok) throw new Error('Gagal like');

                const data = await res.json();

                icon.classList.remove('far', 'fas');
                icon.classList.add(data.is_liked ? 'fas' : 'far');
                icon.classList.toggle('text-red-500', data.is_liked);
                countEl.textContent = `${data.likes_count} likes`;
            } catch (err) {
                console.log(err);
                alert('Gagal melakukan like. Coba lagi nanti.');
            }
        }

        async function submitComment(postId) {
            const content = document.getElementById(`comment-${postId}`).value;
            const countEl = document.getElementById(`comments-${postId}`);
            
            if (content.trim() === '') {
                return;
            }
            try {
                const res = await fetch(`/api/posts/${postId}/comments`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({ content }),
                });
                if (!res.ok) throw new Error('Failed to post comment');

                const data = await res.json();

                document.getElementById(`comment-${postId}`).value = '';
                countEl.textContent = `View all ${data.comments_count} comments`;

                Toastify({
                    text: data.message,
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#4CAF50",
                }).showToast();
            } catch (err) {
                console.log(err);
                alert('Gagal posting komentar. Coba lagi.');
            }
        }
    </script>
    @include('components.bottom-nav')
@endsection