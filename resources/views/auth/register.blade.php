<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#121212] text-[#e0e0e0] font-sans min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <form method="POST" action="{{ route('register') }}" class="bg-[#1e1e1e] p-8 rounded-2xl shadow-2xl border border-[#2a2a2a] backdrop-blur-sm">
            @csrf

            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-white mb-2">Create Account</h1>
                <p class="text-[#a0a0a0] text-base">Join us and start your journey</p>
            </div>

            <div class="space-y-6">
                <!-- Name -->
                <div class="space-y-2">
                    <label for="name" class="block text-sm font-medium text-[#e0e0e0]">Full Name</label>
                    <div class="relative">
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name"
                            placeholder="Enter your full name"
                            class="w-full px-4 py-3.5 bg-[#2a2a2a] border border-[#3a3a3a] rounded-xl text-[#e0e0e0] placeholder-[#a0a0a0] focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none transition-all duration-200 hover:border-[#4a4a4a]" />
                    </div>
                    @error('name')
                        <p class="text-red-400 text-sm mt-1 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-[#e0e0e0]">Email Address</label>
                    <div class="relative">
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="username"
                            placeholder="Enter your email address"
                            class="w-full px-4 py-3.5 bg-[#2a2a2a] border border-[#3a3a3a] rounded-xl text-[#e0e0e0] placeholder-[#a0a0a0] focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none transition-all duration-200 hover:border-[#4a4a4a]" />
                    </div>
                    @error('email')
                        <p class="text-red-400 text-sm mt-1 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <label for="password" class="block text-sm font-medium text-[#e0e0e0]">Password</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required autocomplete="new-password"
                            placeholder="Create a strong password"
                            class="w-full px-4 py-3.5 bg-[#2a2a2a] border border-[#3a3a3a] rounded-xl text-[#e0e0e0] placeholder-[#a0a0a0] focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none transition-all duration-200 hover:border-[#4a4a4a]" />
                    </div>
                    @error('password')
                        <p class="text-red-400 text-sm mt-1 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="space-y-2">
                    <label for="password_confirmation" class="block text-sm font-medium text-[#e0e0e0]">Confirm Password</label>
                    <div class="relative">
                        <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                            placeholder="Confirm your password"
                            class="w-full px-4 py-3.5 bg-[#2a2a2a] border border-[#3a3a3a] rounded-xl text-[#e0e0e0] placeholder-[#a0a0a0] focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none transition-all duration-200 hover:border-[#4a4a4a]" />
                    </div>
                    @error('password_confirmation')
                        <p class="text-red-400 text-sm mt-1 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            
            <div class="mt-8 space-y-4">
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3.5 px-6 rounded-xl transition-all duration-200 hover:shadow-lg hover:shadow-blue-500/25 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transform hover:scale-[1.02] active:scale-[0.98]">
                    Create Account
                </button>
                
                <div class="text-center">
                    <p class="text-[#a0a0a0] text-sm">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-300 font-medium transition-colors duration-200 hover:underline">
                            Sign in here
                        </a>
                    </p>
                </div>
            </div>
        </form>
    </div>

</body>
</html>