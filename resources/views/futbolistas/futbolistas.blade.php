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
            <h1 class="mb-6 text-3xl font-bold text-center text-indigo-600"> Todos los Futbolistas</h1>
            <!-- Buscador en vivo con Livewire -->
            @livewire('todos-los-futbolistas')
        </div>
    </x-app-layout>

</body>

</html>
