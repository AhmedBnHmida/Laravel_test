<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome - {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b">
        <div class="max-w-6xl mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="text-2xl font-bold text-gray-800">
                    {{ config('app.name', 'Laravel') }}
                </div>

                <!-- Login/Register Buttons -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" 
                       class="px-6 py-2 bg-primary text-white rounded-lg font-medium transition-all duration-200 hover:bg-blue-700 hover:shadow-md transform hover:-translate-y-0.5">
                        Login
                    </a>
                    <a href="{{ route('register') }}" 
                       class="px-6 py-2 bg-secondary text-white rounded-lg font-medium transition-all duration-200 hover:bg-purple-700 hover:shadow-md transform hover:-translate-y-0.5">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center py-20">
        <div class="text-center">
            <h1 class="text-5xl font-bold text-gray-800 mb-4">Welcome</h1>
            <p class="text-lg text-gray-600">We're glad to have you here</p>
            
            <!-- Additional call-to-action buttons -->
            <div class="mt-8 flex justify-center space-x-4">
                <a href="{{ route('login') }}" 
                   class="px-8 py-3 bg-primary text-white rounded-lg font-semibold transition-all duration-200 hover:bg-blue-700 hover:shadow-lg transform hover:-translate-y-0.5">
                    Get Started - Login
                </a>
                <a href="{{ route('register') }}" 
                   class="px-8 py-3 border-2 border-primary text-primary rounded-lg font-semibold transition-all duration-200 hover:bg-primary hover:text-white hover:shadow-lg transform hover:-translate-y-0.5">
                    Create Account
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-auto">
        <div class="max-w-6xl mx-auto px-4 py-6 text-center text-gray-600">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>