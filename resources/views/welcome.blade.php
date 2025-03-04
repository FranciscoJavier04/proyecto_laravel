<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamFootball - Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen bg-gradient-to-r from-blue-400 to-blue-700">
    <div class="p-10 text-center bg-white rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold text-gray-800">DreamFootball</h1>
        <p class="mt-4 text-gray-600">El mejor lugar para los amantes del fútbol.</p>

        @if (Route::has('login'))
            <nav class="flex justify-center mt-6 space-x-4">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-white bg-blue-500 ring-1 ring-transparent transition hover:bg-blue-700 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:bg-blue-600 dark:focus-visible:ring-white"
                    >
                        Inicio
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-white bg-green-500 ring-1 ring-transparent transition hover:bg-green-700 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:bg-green-600 dark:focus-visible:ring-white"
                    >
                        Iniciar Sesión
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-white bg-gray-500 ring-1 ring-transparent transition hover:bg-gray-700 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:bg-gray-600 dark:focus-visible:ring-white"
                        >
                            Registrarse
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </div>
</body>
</html>
