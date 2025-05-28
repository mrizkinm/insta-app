@extends('components.layout')
@section('title', $title)

@section('content')
    <style>
        .drag-active {
            border-color: #3b82f6;
            background-color: #f0f7ff;
        }
        .image-preview {
            max-height: 70vh;
        }
        @media (max-width: 640px) {
            .image-preview {
                max-height: 50vh;
            }
        }
    </style>
    <!-- Navigation -->
    @include('components.navbar')

    <!-- Main Content -->
    <main class="pt-22 pb-16 max-w-xl mx-auto pl-4 pr-4">
        <div class="bg-white border border-gray-200 rounded-sm">
            <!-- Upload Area -->
            <form id="create-post-form" enctype="multipart/form-data">
                <div id="uploadContainer" class="p-4 md:p-8">
                    <div id="dragDropArea" class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-blue-400 transition-colors duration-200">
                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                        <h2 class="text-xl font-semibold mb-1">Upload Photos</h2>
                        <p class="text-gray-500 mb-4">Drag and drop files here or click to browse</p>
                        <button type="button" id="browseBtn" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium">Select from computer</button>
                        <input type="file" id="fileInput" name="image" accept="image/*" class="hidden" multiple>
                    </div>
                </div>

                <!-- Preview and Edit Area (hidden by default) -->
                <div id="editContainer" class="hidden">
                    <!-- Image Preview -->
                    <div class="flex justify-center items-center bg-black">
                        <img id="imagePreview" class="image-preview object-contain" src="" alt="Preview">
                    </div>
                    
                    <!-- Edit Options -->
                    <div class="p-4">
                        <!-- Caption -->
                        <div class="mb-4">
                            <textarea id="captionInput" name="content" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Write a caption..."></textarea>
                        </div>
                        <button type="button" id="shareBtn" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium w-full" onclick="submitPost()">Share</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <!-- Bottom Navigation (Mobile) -->
    @include('components.bottom-nav')

    <script>
        // DOM Elements
        const dragDropArea = document.getElementById('dragDropArea');
        const browseBtn = document.getElementById('browseBtn');
        const fileInput = document.getElementById('fileInput');
        const uploadContainer = document.getElementById('uploadContainer');
        const editContainer = document.getElementById('editContainer');
        const imagePreview = document.getElementById('imagePreview');
        const shareBtn = document.getElementById('shareBtn');
        
        // Drag and drop events
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dragDropArea.addEventListener(eventName, preventDefaults, false);
        });
        
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        ['dragenter', 'dragover'].forEach(eventName => {
            dragDropArea.addEventListener(eventName, highlight, false);
        });
        
        ['dragleave', 'drop'].forEach(eventName => {
            dragDropArea.addEventListener(eventName, unhighlight, false);
        });
        
        function highlight() {
            dragDropArea.classList.add('drag-active');
        }
        
        function unhighlight() {
            dragDropArea.classList.remove('drag-active');
        }
        
        // Handle dropped files
        dragDropArea.addEventListener('drop', handleDrop, false);
        
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            handleFiles(files);
        }
        
        // Handle selected files
        browseBtn.addEventListener('click', () => fileInput.click());
        fileInput.addEventListener('change', () => handleFiles(fileInput.files));
        
        function handleFiles(files) {
            if (files.length > 0) {
                const file = files[0];
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        uploadContainer.classList.add('hidden');
                        editContainer.classList.remove('hidden');
                        shareBtn.disabled = false;
                        shareBtn.classList.remove('opacity-50');
                        shareBtn.classList.add('opacity-100');
                    };
                    reader.readAsDataURL(file);
                }
            }
        }

        async function submitPost() {
            const form = document.getElementById('create-post-form');
            const formData = new FormData(form);

            if (!formData.get('content')) {
                return;
            }

            const button = document.getElementById('shareBtn');
            button.innerHTML = "Loading...";
            button.disabled = true;

            try {
                const res = await fetch('/api/posts', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: formData
                });

                const data = await res.json();

                if (res.ok) {
                    form.reset();
                    Toastify({
                        text: data.message,
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#4CAF50",
                    }).showToast();

                    setTimeout(() => {
                        window.location.href = '/home';
                    }, 2000);
                } else {
                    if (data.errors) {
                        for (const [field, messages] of Object.entries(data.errors)) {
                            Toastify({
                                text: messages[0],
                                duration: 3000,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#ef4444",
                            }).showToast();
                        }
                    } else {
                        Toastify({
                            text: data.message,
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#ef4444",
                        }).showToast();
                    }
                }
            } catch (err) {
                console.error(err);
            }
            button.innerHTML = "Share";
            button.disabled = false;
        }
    </script>
@endsection
