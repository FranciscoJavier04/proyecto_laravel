<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
            {{ __('Añadir Futbolista') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="p-8 bg-white rounded-lg shadow-md dark:bg-gray-900">
                <form action="{{ route('futbolistas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Nombre -->
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                        <input type="text" id="nombre" name="nombre"
                               class="block w-full p-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white" required>
                        @error('nombre')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Fecha de nacimiento -->
                    <div>
                        <label for="fecha_nac" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha de Nacimiento</label>
                        <input type="date" id="fecha_nac" name="fecha_nac"
                               class="block w-full p-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white" required>
                        @error('fecha_nac')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Edad -->
                    <div>
                        <label for="edad" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Edad</label>
                        <input type="number" id="edad" name="edad" min="0"
                               class="block w-full p-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white" required>
                        @error('edad')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Nacionalidad -->
                    <div>
                        <label for="nacionalidad" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nacionalidad</label>
                        <input type="text" id="nacionalidad" name="nacionalidad"
                               class="block w-full p-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white" required>
                        @error('nacionalidad')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Imagen -->
                    <div>
                        <label for="imagen" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imagen</label>
                        <input type="file" id="imagen" name="imagen"
                               class="block w-full p-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white" required>
                        @error('imagen')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Posiciones -->
                    <div>
                        <label for="posiciones" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Posiciones</label>
                        <select name="posiciones[]" id="posiciones" multiple
                                class="block w-full p-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white">
                            @foreach($posiciones as $posicion)
                                <option value="{{ $posicion->id }}">{{ $posicion->nombre }}</option>
                            @endforeach
                        </select>
                        @error('posiciones')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Usuario autenticado -->
                    <input type="hidden" name="id_usuario" value="{{ auth()->id() }}">

                    <!-- Botón -->
                    <div class="flex justify-end">
                        <button type="submit"
                                class="px-6 py-3 text-white transition duration-300 ease-in-out bg-blue-600 rounded-lg shadow-md hover:bg-blue-700">
                            Guardar Futbolista
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
