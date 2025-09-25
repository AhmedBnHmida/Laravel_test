<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome - {{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
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
                       class="px-6 py-2 color-primary rounded hover:text-blue-600 font-medium transition duration-200">
                        Login
                    </a>
                    <a href="{{ route('register') }}" 
                       class="px-6 py-2 bg-blue-600 text-gray-700 rounded hover:bg-blue-700 font-medium transition duration-200">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center py-20">
        
        <div class="text-center">
            <div class="text-9xl mb-6"></div>
            <h1 class="text-5xl font-bold text-gray-800 mb-4 flex-items-center">Welcome</h1>
            <p class="text-lg text-gray-600">We're glad to have you here</p>
        </div>
        
    </main>

    
</body>
</html>