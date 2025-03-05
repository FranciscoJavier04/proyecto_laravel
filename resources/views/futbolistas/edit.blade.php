<x-app-layout>
    <div class="max-w-2xl p-6 mx-auto bg-white rounded-lg shadow-md">
        <h2 class="mb-6 text-2xl font-semibold text-center text-gray-700">Editar Futbolista</h2>

        @if(session('error'))
            <div class="p-3 mb-4 text-center text-white bg-red-500 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('futbolistas.update', $futbolista->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div>
                <label for="nombre" class="block font-medium text-gray-700">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $futbolista->nombre) }}" required
                    class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300 @error('nombre') border-red-500 @enderror">
                @error('nombre')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Fecha de nacimiento -->
            <div>
                <label for="fecha_nac" class="block font-medium text-gray-700">Fecha de Nacimiento</label>
                <input type="date" id="fecha_nac" name="fecha_nac" value="{{ old('fecha_nac', $futbolista->fecha_nac) }}" required
                    class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300 @error('fecha_nac') border-red-500 @enderror">
                @error('fecha_nac')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Edad -->
            <div>
                <label for="edad" class="block font-medium text-gray-700">Edad</label>
                <input type="number" id="edad" name="edad" value="{{ old('edad', $futbolista->edad) }}" required
                    class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300 @error('edad') border-red-500 @enderror">
                @error('edad')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nacionalidad -->
            <div>
                <label for="nacionalidad" class="block font-medium text-gray-700">Nacionalidad</label>
                <input type="text" id="nacionalidad" name="nacionalidad" value="{{ old('nacionalidad', $futbolista->nacionalidad) }}" required
                    class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300 @error('nacionalidad') border-red-500 @enderror">
                @error('nacionalidad')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Imagen -->
            <div>
                <label for="imagen" class="block font-medium text-gray-700">Imagen (opcional)</label>
                <input type="file" id="imagen" name="imagen"
                    class="w-full mt-1 p-2 border rounded-lg focus:ring focus:ring-blue-300 @error('imagen') border-red-500 @enderror">
                @error('imagen')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Vista previa de la imagen actual -->
            @if($futbolista->imagen)
                <div class="text-center">
                    <p class="text-sm text-gray-700">Imagen actual:</p>
                    <img src="{{ asset('storage/img_futbolistas/' . $futbolista->imagen) }}" alt="Imagen actual"
                        class="w-32 h-32 mx-auto rounded-lg shadow-lg">
                </div>
            @endif

            <!-- Selección de posiciones -->
            <div>
                <label for="posiciones" class="block font-medium text-gray-700">Posiciones</label>
                <select name="posiciones[]" id="posiciones" multiple class="w-full p-2 mt-1 border rounded-lg focus:ring focus:ring-blue-300">
                    @foreach($posiciones as $posicion)
                        <option value="{{ $posicion->id }}"
                            @if(in_array($posicion->id, old('posiciones', $futbolista->posiciones->pluck('id')->toArray())))
                                selected
                            @endif>
                            {{ $posicion->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('posiciones')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botón de enviar -->
            <div class="flex justify-between">
                <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Actualizar</button>
                <a href="{{ route('futbolistas.index') }}" class="px-4 py-2 text-white bg-gray-600 rounded-lg hover:bg-gray-700">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
