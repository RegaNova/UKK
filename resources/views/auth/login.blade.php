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

            {{-- ERROR GLOBAL (LOGIN GAGAL) --}}
            @error('email')
                <p class="text-red-500 text-sm text-center mb-2">
                    {{ $message }}
                </p>
            @enderror

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

                {{-- ERROR EMAIL --}}
                @error('email')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">Password</label>
                <input
                    type="password"
                    name="password"
                    placeholder="Masukkan Password"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500
                           @error('password') border-red-500 @enderror"
                    
                >

                {{-- ERROR PASSWORD --}}
                @error('password')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <button
                type="submit"
                class="w-full py-2 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition"
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

</body>
</html>
