<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="w-full max-w-md bg-white border border-gray-200 rounded-xl shadow-md p-8">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
            Login
        </h2>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            {{-- ERROR GLOBAL --}}
            @error('email')
                <p class="text-red-500 text-sm text-center mb-2">
                    {{ $message }}
                </p>
            @enderror

            <!-- EMAIL -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan Email"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500
                           @error('email') border-red-500 @enderror"
                >

                @error('email')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- PASSWORD -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Password</label>

                <div class="relative">
                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Masukkan Password"
                        class="w-full px-4 py-2 pr-12 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500
                               @error('password') border-red-500 @enderror"
                    >

                    <!-- EYE ICON -->
                    <button
                        type="button"
                        onclick="togglePassword()"
                        class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500"
                    >
                        <!-- Eye Open -->
                        <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg"
                             class="h-5 w-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5
                                     c4.478 0 8.268 2.943 9.542 7
                                     -1.274 4.057-5.064 7-9.542 7
                                     -4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>

                        <!-- Eye Closed -->
                        <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg"
                             class="h-5 w-5 hidden" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13.875 18.825A10.05 10.05 0 0112 19
                                     c-4.478 0-8.268-2.943-9.543-7
                                     a9.97 9.97 0 012.188-3.568M6.223 6.223
                                     A9.97 9.97 0 0112 5c4.478 0 8.268 2.943
                                     9.543 7a9.97 9.97 0 01-4.042 5.135M15 12
                                     a3 3 0 00-3-3"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 3l18 18"/>
                        </svg>
                    </button>
                </div>

                @error('password')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- BUTTON -->
            <button
                type="submit"
                class="w-full py-2 bg-indigo-600 text-white rounded-lg font-semibold
                       hover:bg-indigo-700 transition"
            >
                Login
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-6">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-indigo-600 font-medium hover:underline">
                Register
            </a>
        </p>
    </div>

    <!-- SCRIPT -->
    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const eyeOpen = document.getElementById('eyeOpen');
            const eyeClosed = document.getElementById('eyeClosed');

            if (password.type === 'password') {
                password.type = 'text';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            } else {
                password.type = 'password';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            }
        }
    </script>

</body>
</html>
