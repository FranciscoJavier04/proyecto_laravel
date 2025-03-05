<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Futbolistas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans text-gray-900 bg-gray-100">
    <x-app-layout>
        <div class="container p-6 mx-auto">
            <h1 class="mb-6 text-3xl font-bold text-center text-indigo-600">Futbolistas</h1>

            <a href="{{ route('futbolistas.create') }}" class="inline-block px-6 py-2 mb-4 font-semibold text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                Crear Nuevo Futbolista
            </a>

            <!-- Buscador en vivo con Livewire -->
            @livewire('search-futbolistas')
        </div>
    </x-app-layout>

</body>

</html>
