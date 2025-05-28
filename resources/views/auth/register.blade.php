<x-layout>
  <div class="min-h-screen flex flex-col items-center justify-center p-4">
      <div class="w-full max-w-md bg-white rounded-lg shadow-md overflow-hidden">
          <!-- Header -->
          <div class="bg-blue-600 py-6 px-8 text-center">
              <h1 class="text-3xl font-bold text-white">Join InstaApp</h1>
              <p class="text-blue-100 mt-2">Create your account and start connecting</p>
          </div>
          
          <!-- Register Form -->
          <div class="p-8">
              <form id="registerForm" method="POST">
                  @csrf
                  <div class="mb-4">
                      <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                          Name
                      </label>
                      <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="name" name="name" type="text" placeholder="Enter your name" required>
                  </div>
                  <div class="mb-4">
                      <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                          Email Address
                      </label>
                      <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="email" name="email" type="email" placeholder="Enter your email" required>
                  </div>
                  <div class="mb-4">
                      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                          Username
                      </label>
                      <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="username" name="username" type="text" placeholder="Choose a username" required>
                  </div>
                  <div class="mb-4">
                      <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                          Password
                      </label>
                      <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="password" name="password" type="password" placeholder="Create a password" required>
                  </div>
                  <div class="mb-4">
                      <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm-password">
                          Confirm Password
                      </label>
                      <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm your password" required>
                  </div>
                  <div class="mb-4">
                      <p id="errorMessage" class="text-red-500 mt-2 hidden"></p>
                  </div>
                  <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-150">
                      Create Account
                  </button>
              </form>
          </div>
          
          <!-- Footer -->
          <div class="bg-gray-50 px-8 py-4 text-center">
              <p class="text-gray-600 text-sm">
                  Already have an account? 
                  <a href="login" class="font-medium text-blue-600 hover:text-blue-500">Log in</a>
              </p>
          </div>
      </div>
    </div>
    <script>
      const validator = new JustValidate('#registerForm', {
        validateBeforeSubmitting: true,
        errorFieldCssClass: 'border-red-500',
      });

      validator.addField('#name', [
        {
          rule: 'required',
          errorMessage: 'Nama wajib diisi',
        },
      ])
      .addField('#email', [
        {
          rule: 'required',
          errorMessage: 'Email wajib diisi',
        },
        {
          rule: 'email',
          errorMessage: 'Format email tidak valid',
        },
      ])
      .addField('#password', [
        {
          rule: 'required',
          errorMessage: 'Password wajib diisi',
        },
        {
          rule: 'minLength',
          value: 6,
          errorMessage: 'Password minimal 6 karakter',
        },
      ])
      .addField('#password_confirmation', [
        {
          rule: 'required',
          errorMessage: 'Konfirmasi password wajib diisi',
        },
        {
          validator: (value, fields) => {
            return value === fields['#password'].elem.value;
          },
          errorMessage: 'Konfirmasi password tidak cocok',
        },
      ]);

      document.getElementById("registerForm").addEventListener("submit", async (e) => {
        e.preventDefault();
        if (!validator.isValid) {
          return;
        }
        const button = document.querySelector("button[type='submit']");
        button.innerHTML = "Loading...";
        button.disabled = true;
        const form = e.target;
        const formData = new FormData(form);
        const csrfToken = document.querySelector('input[name="_token"]').value;

        const response = await fetch("{{ route('register') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
                "Accept": "application/json"
            },
            body: formData,
        });

        const data = await response.json();

        if (response.ok) {
          // success redirect
          window.location.href = "/login";
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
          }
        }
        button.innerHTML = "Create Account";
        button.disabled = false;
      });
    </script>
</x-layout>
