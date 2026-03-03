<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - School Equipment Management</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .gradient-bg {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #a855f7 100%);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
        }
        .input-focus:focus {
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15);
            border-color: #6366f1;
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-15px) rotate(5deg); }
            66% { transform: translateY(-10px) rotate(-5deg); }
        }
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(99, 102, 241, 0.3); }
            50% { box-shadow: 0 0 40px rgba(99, 102, 241, 0.5); }
        }
        @keyframes slideInLeft {
            from { transform: translateX(-50px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slideInRight {
            from { transform: translateX(50px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes fadeInUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .animate-slide-in-left {
            animation: slideInLeft 0.6s ease-out;
        }
        .animate-slide-in-right {
            animation: slideInRight 0.6s ease-out;
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.5s ease-out;
        }
        .floating {
            animation: floating 6s ease-in-out infinite;
        }
        .floating-delay {
            animation: floating 6s ease-in-out infinite;
            animation-delay: 2s;
        }
        .btn-submit {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            transition: all 0.3s ease;
        }
        .btn-submit:hover {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(99, 102, 241, 0.4);
        }
        .demo-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    <!-- Animated Background Shapes -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-72 h-72 bg-white/10 rounded-full blur-3xl floating"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-white/10 rounded-full blur-3xl floating-delay"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-white/5 rounded-full blur-3xl"></div>
        <div class="absolute top-1/4 right-1/4 w-48 h-48 bg-purple-300/20 rounded-full blur-2xl floating"></div>
        <div class="absolute bottom-1/4 left-1/4 w-40 h-40 bg-indigo-300/20 rounded-full blur-2xl floating-delay"></div>
    </div>

    <!-- Grid Pattern Overlay -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle, #ffffff 1px, transparent 1px); background-size: 30px 30px;"></div>
    </div>

    <div class="relative w-full max-w-6xl grid grid-cols-1 lg:grid-cols-2 gap-0 rounded-3xl overflow-hidden shadow-2xl animate-fade-in-up" style="animation: pulse-glow 3s ease-in-out infinite;">
        <!-- Left Side - Branding -->
        <div class="gradient-bg p-8 md:p-12 flex flex-col justify-between text-white relative overflow-hidden animate-slide-in-left">
            <!-- Decorative Elements -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-16 left-16 w-24 h-24 border-4 border-white rounded-full"></div>
                <div class="absolute bottom-32 right-16 w-16 h-16 border-4 border-white rounded-full"></div>
                <div class="absolute top-1/2 left-1/2 w-32 h-32 border-4 border-white rounded-full transform -translate-x-1/2 -translate-y-1/2"></div>
                <div class="absolute top-24 right-24 w-8 h-8 bg-white rounded-full"></div>
                <div class="absolute bottom-48 left-32 w-6 h-6 bg-white rounded-full"></div>
            </div>

            <!-- Content -->
            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <span class="text-3xl font-bold">EquipManage</span>
                </div>
            </div>

            <div class="relative z-10 floating">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">Manage School Equipment with Ease</h1>
                <p class="text-white/80 text-lg mb-8 leading-relaxed">Digitalize your classroom equipment borrowing process. Track, manage, and control all school assets in one centralized platform.</p>

                <div class="space-y-4">
                    <div class="flex items-center gap-4 bg-white/10 backdrop-blur-sm p-4 rounded-2xl">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold">Real-time Tracking</p>
                            <p class="text-sm text-white/70">Monitor equipment status instantly</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 bg-white/10 backdrop-blur-sm p-4 rounded-2xl">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold">Secure Access</p>
                            <p class="text-sm text-white/70">Prevent unauthorized borrowing</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 bg-white/10 backdrop-blur-sm p-4 rounded-2xl">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold">Detailed Reports</p>
                            <p class="text-sm text-white/70">Generate comprehensive analytics</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative z-10 text-sm text-white/60 pt-6 border-t border-white/10">
                © 2026 School Equipment Management. All rights reserved.
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="glass-effect p-8 md:p-12 animate-slide-in-right">
            <div class="max-w-md mx-auto h-full flex flex-col justify-center">
                <!-- Mobile Logo -->
                <div class="text-center mb-6 lg:hidden">
                    <div class="flex items-center justify-center gap-2 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-gray-800">EquipManage</span>
                    </div>
                </div>

                <div class="text-center mb-8 hidden lg:block">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Welcome Back! 👋</h2>
                    <p class="text-gray-500">Sign in to access your dashboard</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div class="animate-fade-in-up" style="animation-delay: 0.1s;">
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   placeholder="you@example.com"
                                   class="input-focus w-full pl-12 pr-4 py-3.5 border border-gray-200 rounded-xl focus:outline-none transition-all @error('email') border-red-400 @enderror"
                                   required
                                   autofocus>
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs mt-2 flex items-center gap-1 animate-pulse">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="animate-fade-in-up" style="animation-delay: 0.2s;">
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input type="password"
                                   id="password"
                                   name="password"
                                   placeholder="••••••••"
                                   class="input-focus w-full pl-12 pr-4 py-3.5 border border-gray-200 rounded-xl focus:outline-none transition-all @error('password') border-red-400 @enderror"
                                   required>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs mt-2 flex items-center gap-1 animate-pulse">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between animate-fade-in-up" style="animation-delay: 0.3s;">
                        <div class="flex items-center">
                            <input type="checkbox"
                                   id="remember"
                                   name="remember"
                                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded cursor-pointer">
                            <label for="remember" class="ml-2 text-sm text-gray-600 cursor-pointer select-none">Remember me</label>
                        </div>
                        <a href="#" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700 transition-colors">Forgot password?</a>
                    </div>

                    <button type="submit"
                            class="w-full btn-submit text-white py-3.5 px-4 rounded-xl font-semibold shadow-lg">
                        Sign In
                        <svg class="w-5 h-5 inline-block ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </form>

                <div class="mt-8 pt-6 border-t border-gray-200 animate-fade-in-up" style="animation-delay: 0.4s;">
                    <p class="text-sm text-gray-500 text-center mb-4 font-medium">🎯 Demo Accounts</p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="demo-card bg-gradient-to-br from-blue-50 to-indigo-50 p-4 rounded-2xl border border-blue-200 transition-all duration-300 cursor-pointer">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-2xl">👨‍💼</span>
                                <p class="text-sm font-bold text-blue-800">Admin</p>
                            </div>
                            <p class="text-xs text-blue-600 font-mono bg-white/50 px-2 py-1 rounded mb-1">admin@example.com</p>
                            <p class="text-xs text-blue-400 font-mono">password</p>
                        </div>
                        <div class="demo-card bg-gradient-to-br from-green-50 to-emerald-50 p-4 rounded-2xl border border-green-200 transition-all duration-300 cursor-pointer">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-2xl">👨‍🏫</span>
                                <p class="text-sm font-bold text-green-800">Teacher</p>
                            </div>
                            <p class="text-xs text-green-600 font-mono bg-white/50 px-2 py-1 rounded mb-1">guru@example.com</p>
                            <p class="text-xs text-green-400 font-mono">password</p>
                        </div>
                    </div>
                </div>

                <div class="mt-6 text-center animate-fade-in-up" style="animation-delay: 0.5s;">
                    <p class="text-xs text-gray-400">🔒 Secure login powered by EquipManage</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
