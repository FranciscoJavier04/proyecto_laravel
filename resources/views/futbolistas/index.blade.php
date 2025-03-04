<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Futbolistas</title>
    <!-- Asegúrate de tener el enlace a Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans text-gray-900 bg-gray-100">

    <!-- Usar el layout de la aplicación si estás utilizando Blade -->
    <x-app-layout>
        <div class="container p-6 mx-auto">
            <h1 class="mb-6 text-3xl font-bold text-center text-indigo-600">Futbolistas</h1>

            <!-- Botón para crear un nuevo futbolista -->
            <a href="{{ route('futbolistas.create') }}" class="inline-block px-6 py-2 mb-4 font-semibold text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                Crear Nuevo Futbolista
            </a>

            <!-- Tabla de futbolistas -->
            <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                <table class="min-w-full text-left">
                    <thead class="text-sm text-gray-700 bg-gray-200">
                        <tr>
                            <th class="px-6 py-3">Nombre</th>
                            <th class="px-6 py-3">Fecha de Nacimiento</th>
                            <th class="px-6 py-3">Edad</th>
                            <th class="px-6 py-3">Nacionalidad</th>
                            <th class="px-6 py-3">Imagen</th>
                            <th class="px-6 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @foreach($futbolistas as $futbolista)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $futbolista->nombre }}</td>
                                <td class="px-6 py-4">{{ $futbolista->fecha_nac }}</td>
                                <td class="px-6 py-4">{{ $futbolista->edad }}</td>
                                <td class="px-6 py-4">{{ $futbolista->nacionalidad }}</td>
                                <td class="px-6 py-4">
                                    <img src="{{ asset('storage/img_futbolistas/'.$futbolista->imagen) }}" alt="Imagen de {{ $futbolista->nombre }}" class="object-cover w-24 h-24 rounded-full">
                                </td>
                                <td class="px-6 py-4">
                                    <!-- Botón de Editar -->
                                    <a href="{{ route('futbolistas.edit', $futbolista->id) }}" class="inline-block px-4 py-2 text-white transition duration-300 bg-yellow-500 rounded-lg hover:bg-yellow-600">Editar</a>

                                    <!-- Formulario de Borrar -->
                                    <form action="{{ route('futbolistas.destroy', $futbolista->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-block px-4 py-2 text-white transition duration-300 bg-red-500 rounded-lg hover:bg-red-600" onclick="return confirm('¿Estás seguro de que deseas eliminar este futbolista?')">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-app-layout>

</body>

</html>
