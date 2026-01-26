<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-cover bg-center flex items-center justify-center"
    style="background-image: url('https://images.unsplash.com/photo-1501785888041-af3ef285b470');">


    <div class="w-full max-w-lg backdrop-blur-md bg-black/30 border border-white/20 rounded-2xl shadow-xl p-12 text-white">
        <h2 class="text-2xl font-semibold text-center mb-6 tracking-widest">REGISTER</h2>


        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf


            <div>
                <label class="text-xs uppercase tracking-wide">Name</label>
                <input type="text" name="name"
                    class="w-full bg-transparent border-b border-white/40 focus:outline-none focus:border-white py-2"
                    required>
            </div>


            <div>
                <label class="text-xs uppercase tracking-wide">Email</label>
                <input type="email" name="email"
                    class="w-full bg-transparent border-b border-white/40 focus:outline-none focus:border-white py-2"
                    required>
            </div>


            <div>
                <label class="text-xs uppercase tracking-wide">Password</label>
                <input type="password" name="password"
                    class="w-full bg-transparent border-b border-white/40 focus:outline-none focus:border-white py-2"
                    required>
            </div>


            <div>
                <label class="text-xs uppercase tracking-wide">Confirm Password</label>
                <input type="password" name="password_confirmation"
                    class="w-full bg-transparent border-b border-white/40 focus:outline-none focus:border-white py-2"
                    required>
            </div>


            <button type="submit"
                class="w-full mt-6 py-2 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 font-semibold tracking-wide hover:opacity-90">
                REGISTER
            </button>
        </form>


        <p class="text-center text-xs mt-6">
            Already have an account?
            <a href="{{ route('login') }}" class="underline">Login</a>
        </p>
    </div>


</body>

</html>