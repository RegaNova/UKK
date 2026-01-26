<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-cover bg-center flex items-center justify-center overflow-hidden"
    style="background-image: url('https://images.unsplash.com/photo-1501785888041-af3ef285b470');">


    <div id="card" class="w-full max-w-lg backdrop-blur-md bg-black/30 border border-white/20 rounded-2xl shadow-xl p-12 text-white transition-all duration-500 ease-in-out">
        <h2 id="title" class="text-2xl font-semibold text-center mb-6 tracking-widest">LOGIN</h2>


        <form id="loginForm" method="POST" action="{{ route('login') }}" class="space-y-4 transition-all duration-500">
            @csrf
            <div>
                <label class="text-xs uppercase tracking-wide">Email</label>
                <input type="email" name="email" class="w-full bg-transparent border-b border-white/40 focus:outline-none focus:border-white py-3" required>
            </div>
            <div>
                <label class="text-xs uppercase tracking-wide">Password</label>
                <input type="password" name="password" class="w-full bg-transparent border-b border-white/40 focus:outline-none focus:border-white py-3" required>
            </div>
            <button type="submit" class="w-full mt-6 py-3 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 font-semibold tracking-wide hover:opacity-90">LOGIN</button>
        </form>


        <form id="registerForm" method="POST" action="{{ route('register') }}" class="space-y-4 hidden transition-all duration-500">
            @csrf
            <div>
                <label class="text-xs uppercase tracking-wide">Name</label>
                <input type="text" name="name" class="w-full bg-transparent border-b border-white/40 focus:outline-none focus:border-white py-3">
            </div>
            <div>
                <label class="text-xs uppercase tracking-wide">Email</label>
                <input type="email" name="email" class="w-full bg-transparent border-b border-white/40 focus:outline-none focus:border-white py-3">
            </div>
            <div>
                <label class="text-xs uppercase tracking-wide">Password</label>
                <input type="password" name="password" class="w-full bg-transparent border-b border-white/40 focus:outline-none focus:border-white py-3">
            </div>
            <div>
                <label class="text-xs uppercase tracking-wide">Confirm Password</label>
                <input type="password" name="password_confirmation" class="w-full bg-transparent border-b border-white/40 focus:outline-none focus:border-white py-3">
            </div>
            <button type="submit" class="w-full mt-6 py-3 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 font-semibold tracking-wide hover:opacity-90">REGISTER</button>
        </form>


        <p class="text-center text-xs mt-6">
            <span id="switchText">Don’t have an account?</span>
            <button onclick="toggleForm()" class="underline ml-1">Register</button>
        </p>
    </div>


    <script>
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');
        const title = document.getElementById('title');
        const switchText = document.getElementById('switchText');
        const switchButton = document.querySelector('p button[onclick="toggleForm()"]');

        function toggleForm() {
            const showingLogin = !loginForm.classList.contains('hidden');
            loginForm.classList.toggle('hidden');
            registerForm.classList.toggle('hidden');

            if (showingLogin) {
                title.textContent = 'REGISTER';
                switchText.textContent = "Already have an account?";
                if (switchButton) switchButton.textContent = 'Login';
            } else {
                title.textContent = 'LOGIN';
                switchText.textContent = "Don’t have an account?";
                if (switchButton) switchButton.textContent = 'Register';
            }
        }
    </script>
</body>

</html>