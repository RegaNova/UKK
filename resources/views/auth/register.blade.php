<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center">

    <div class="w-full max-w-md bg-white border border-gray-200 rounded-xl shadow-md p-8">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">
            Register
        </h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            {{-- NAME --}}
            <div>
                <label class="block text-sm text-gray-600 mb-1">Name</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500
                           @error('name') border-red-500 @enderror"
                >
                @error('name')
                    <small class="text-red-500 text-xs">{{ $message }}</small>
                @enderror
            </div>

            {{-- EMAIL --}}
            <div>
                <label class="block text-sm text-gray-600 mb-1">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500
                           @error('email') border-red-500 @enderror"
                >
                @error('email')
                    <small class="text-red-500 text-xs">{{ $message }}</small>
                @enderror
            </div>

            {{-- PASSWORD --}}
            <div>
                <label class="block text-sm text-gray-600 mb-1">Password</label>
                <input
                    type="password"
                    name="password"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500
                           @error('password') border-red-500 @enderror"
                >
                @error('password')
                    <small class="text-red-500 text-xs">{{ $message }}</small>
                @enderror
            </div>

            {{-- CONFIRM PASSWORD --}}
            <div>
                <label class="block text-sm text-gray-600 mb-1">Confirm Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
            </div>

            <button
                type="submit"
                class="w-full py-2 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition"
            >
                Register
            </button>
        </form>

        <p class="text-center text-sm text-gray-600 mt-6">
            Already have an account?
            <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">
                Login
            </a>
        </p>
    </div>
