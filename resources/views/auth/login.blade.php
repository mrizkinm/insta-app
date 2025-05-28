<x-layout :title="$title">
    <div class="min-h-screen flex flex-col items-center justify-center p-4">
        <div class="w-full max-w-md bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Header -->
            <div class="bg-blue-600 py-6 px-8 text-center">
                <h1 class="text-3xl font-bold text-white">InstaApp</h1>
                <p class="text-blue-100 mt-2">Connect with friends around the world</p>
            </div>
            
            <!-- Login Form -->
            <div class="p-8">
                <form id="loginForm" method="POST">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Email or Username
                        </label>
                        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="email" name="email" type="text" placeholder="Enter your email or username" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password" required>
                            Password
                        </label>
                        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="password" name="password" type="password" placeholder="Enter your password">
                    </div>
                    <div class="mb-4">
                        <p id="errorMessage" class="text-red-500 mt-2 hidden"></p>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-150">
                        Log In
                    </button>
                </form>
            </div>
            
            <!-- Footer -->
            <div class="bg-gray-50 px-8 py-4 text-center">
                <p class="text-gray-600 text-sm">
                    Don't have an account? 
                    <a href="register" class="font-medium text-blue-600 hover:text-blue-500">Sign up</a>
                </p>
            </div>
        </div>
    </div>
    <script>
        const validator = new JustValidate('#loginForm', {
            validateBeforeSubmitting: true,
            errorFieldCssClass: 'border-red-500',
        });

        validator.addField('#email', [
            {
            rule: 'required',
            errorMessage: 'Email is required',
            },
        ])
        .addField('#password', [
            {
            rule: 'required',
            errorMessage: 'Password is required',
            },
            {
            rule: 'minLength',
            value: 6,
            errorMessage: 'Password must be at least 6 characters',
            },
        ]);

        document.getElementById("loginForm").addEventListener("submit", async (e) => {
            e.preventDefault();
            if (!validator.isValid) {
                return;
            }

            const button = document.querySelector("button[type='submit']");
            button.innerHTML = "Logging in...";
            button.disabled = true;

            const form = e.target;
            const formData = new FormData(form);

            const response = await fetch("{{ route('login') }}", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: formData,
            });

            const data = await response.json();

            if (response.ok) {
                // success redirect
                Toastify({
                    text: data.message,
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#4CAF50",
                }).showToast();

                setTimeout(() => {
                    window.location.href = "/home";
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
            button.innerHTML = "Log In";
            button.disabled = false;
        });
    </script>
</x-layout>
