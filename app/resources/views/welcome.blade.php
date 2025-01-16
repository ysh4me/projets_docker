<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="text-center">
                @if (env('SERVER_NAME') == 'nginx1')
                    <h1 class="text-4xl font-bold text-green-500">Serveur 1</h1>
                @elseif (env('SERVER_NAME') == 'nginx2')
                    <h1 class="text-4xl font-bold text-blue-500">Serveur 2</h1>
                @else
                    <h1 class="text-4xl font-bold text-red-500">Serveur Inconnu</h1>
                @endif
            </div>

            <div class="mt-6">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</body>
</html>
