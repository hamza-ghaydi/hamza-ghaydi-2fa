<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#121212] text-[#e0e0e0] font-sans min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <!-- Logo & Welcome -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-white mb-2 tracking-tight">
                Login
            </h1>
            <p class="text-[#a0a0a0] text-base">Welcome back! Please sign in to your account</p>
        </div>

        <!-- Login Card -->
        <div class="bg-[#1e1e1e] border border-[#2a2a2a] rounded-2xl shadow-2xl p-8 backdrop-blur-sm">
            
            @if (session('status'))
                <div class="mb-6 p-4 bg-green-900/20 border border-green-500/30 rounded-xl">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <p class="text-green-400 text-sm">{{ session('status') }}</p>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-[#e0e0e0]">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-[#a0a0a0]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <input 
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="Enter your email address"
                            class="w-full pl-10 pr-4 py-3.5 bg-[#2a2a2a] border border-[#3a3a3a] rounded-xl text-[#e0e0e0] placeholder-[#a0a0a0] focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none transition-all duration-200 hover:border-[#4a4a4a]"
                        />
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
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-[#a0a0a0]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input 
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Enter your password"
                            class="w-full pl-10 pr-4 py-3.5 bg-[#2a2a2a] border border-[#3a3a3a] rounded-xl text-[#e0e0e0] placeholder-[#a0a0a0] focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none transition-all duration-200 hover:border-[#4a4a4a]"
                        />
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

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input 
                            id="remember_me" 
                            type="checkbox" 
                            name="remember"
                            class="w-4 h-4 text-blue-500 bg-[#2a2a2a] border-[#3a3a3a] rounded focus:ring-blue-500 focus:ring-2 transition-all duration-200"
                        />
                        <label for="remember_me" class="ml-2 text-sm text-[#a0a0a0]">Remember me</label>
                    </div>
                    
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-sm text-blue-400 hover:text-blue-300 transition-colors duration-200 hover:underline focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-[#1e1e1e] rounded-md px-1 py-1">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="mt-8">
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3.5 px-6 rounded-xl transition-all duration-200 hover:shadow-lg hover:shadow-blue-500/25 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transform hover:scale-[1.02] active:scale-[0.98]"
                    >
                        Sign In
                    </button>
                </div>
            </form>

            @if (Route::has('register'))
                <div class="mt-8 pt-6 border-t border-[#2a2a2a] text-center">
                    <p class="text-[#a0a0a0] text-sm">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="text-blue-400 hover:text-blue-300 font-medium transition-colors duration-200 hover:underline ml-1">
                            Create one now
                        </a>
                    </p>
                </div>
            @endif
        </div>
    </div>

</body>
</html>