<x-layout :title="$title" :id="$id">
    <style>
        .comment-box {
            max-height: calc(100vh - 200px);
        }
        @media (max-width: 640px) {
            .comment-box {
                max-height: calc(100vh - 160px);
            }
        }
    </style>
    <!-- Navigation -->
    <x-navbar />

    <!-- Main Content -->
    <main class="pt-22 pb-16 max-w-xl mx-auto pl-4 pr-4">
        <!-- Post Header -->
        <div class="bg-white border-b border-gray-200">
            <div class="flex items-center p-3">
                  <div class="w-8 h-8 rounded-full bg-blue-500 p-0.5">
                      <div class="bg-white p-0.5 rounded-full flex items-center justify-center">
                          <span class="w-6 h-6 rounded-full bg-blue-600 text-white text-xs font-semibold flex items-center justify-center">
                             U
                          </span>
                      </div>
                  </div>
                <span id="username" class="font-semibold text-sm ml-3">loading...</span>
            </div>
            <div class="w-full aspect-square bg-gray-200">
                <img id="image_path" class="w-full h-full object-cover" src="https://placehold.co/400x400?text=Loading..." alt="Post">
            </div>
            <div class="p-3">
              <div class="flex justify-between">
                  <div class="flex space-x-4">
                      <button class="like-btn text-gray-700 hover:text-red-500" onclick="toggleLike()">
                          <i id="like" class="far fa-heart text-2xl"></i>
                      </button>
                  </div>
              </div>

              <div class="mt-2">
                  <span id="likes_count" class="font-semibold text-sm">0 likes</span>
              </div>

              <div class="mt-1">
                  <span id="content" class="text-sm">loading...</span>
              </div>

              <div class="mt-1">
                  <span id="created_at" class="text-gray-400 text-xs uppercase">0 hours ago</span>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Comments Section -->
        <div class="comment-box overflow-y-auto bg-white">
            <!-- Comment List -->
            <div class="divide-y divide-gray-100">
                <!-- Comment 2 -->
                <div class="p-4 text-center">
                    <p class="text-sm mt-1">Loading...</p>
                </div>
            </div>
        </div>
        
        <!-- Add Comment -->
        <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 p-3 max-w-xl mx-auto">
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full bg-blue-500 p-0.5">
                    <div class="bg-white p-0.5 rounded-full flex items-center justify-center">
                        <span id="user_image" class="w-6 h-6 rounded-full bg-blue-600 text-white text-xs font-semibold flex items-center justify-center">
                          U
                        </span>
                    </div>
                </div>
                <input type="text" placeholder="Add a comment..." class="flex-1 ml-3 outline-none focus:ring-0">
                <button class="text-blue-500 font-semibold ml-2 text-sm" onclick="submitComment()">Post</button>
            </div>
        </div>
    </main>

    <script>
      async function getDetailPost() {
        const postId = {{ $id }}; // ambil dari route

        try {
          const res = await fetch(`/api/posts/${postId}`);
          const response = await res.json();
          const data = response.data;

          document.querySelector('.like-btn i').className = data.is_liked ? 'fas fa-heart text-2xl text-red-500' : 'far fa-heart text-2xl';
          document.getElementById('likes_count').textContent = `${data.likes_count} likes`;
          document.getElementById('content').textContent = data.content;
          document.getElementById('created_at').textContent = data.created_at;
          document.getElementById('username').textContent = data.username;
          document.getElementById('image_path').src = data.image_path;
          document.getElementById('user_image').textContent = data.name.split(' ').map(w => w[0].toUpperCase()).join('');
        } catch (error) {
          console.error('Error fetching post:', error);
        }
      }

      getDetailPost();

      function renderComments(comments) {
        const container = document.querySelector('.comment-box .divide-y');
        container.innerHTML = '';

        comments.forEach(comment => {
          const commentHTML = `
            <div class="p-4">
              <div class="flex">
                <div class="w-8 h-8 rounded-full bg-blue-500 p-0.5">
                    <div class="bg-white p-0.5 rounded-full flex items-center justify-center">
                        <span class="w-6 h-6 rounded-full bg-blue-600 text-white text-xs font-semibold flex items-center justify-center">
                            ${comment.name.split(' ').map(w => w[0].toUpperCase()).join('')}
                        </span>
                    </div>
                </div>
                <div class="ml-3 flex-1">
                  <div class="flex items-center">
                    <span class="font-semibold text-sm">${comment.username}</span>
                    <span class="text-gray-400 text-xs ml-2">${comment.created_at}</span>
                  </div>
                  <p class="text-sm mt-1">${comment.content}</p>
                </div>
              </div>
            </div>
          `;
          container.insertAdjacentHTML('beforeend', commentHTML);
        });
      }

      async function getComments() {
        const postId = {{ $id }}; // ambil dari route

        try {
          const res = await fetch(`/api/posts/${postId}/comments`);
          const response = await res.json();
          const data = response.data;

          if (data.length === 0) {
              const container = document.querySelector('.comment-box .divide-y');
              container.innerHTML = `
                  <div class="text-center py-16">
                    <h2 class="text-gray-600 text-lg mt-4">No comments yet</h2>
                    <p class="text-gray-400 text-sm">Let's be the first to comment!</p>
                  </div>
              `;
              return;
          }
          renderComments(data)
        } catch (error) {
          console.error('Error fetching comments:', error);
        }
      }

      getComments();

      async function toggleLike() {
          const postId = {{ $id }};
          const icon = document.getElementById(`like`);
          const countEl = document.getElementById(`likes_count`);

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

      async function submitComment() {
        const postId = {{ $id }};

        const input = document.querySelector('input[type="text"]');
        const postBtn = document.querySelector('button.text-blue-500');

        const content = input.value.trim();
        if (!content) return;

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
          input.value = '';

          getComments();
        } catch (err) {
          console.log(err);
          alert('Gagal posting komentar. Coba lagi.');
        }
      }
    </script>
</x-layout>