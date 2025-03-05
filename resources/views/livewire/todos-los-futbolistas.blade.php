<div>
    <input type="text" wire:model.live="search" class="px-4 py-2 mb-4 border rounded-md" placeholder="Buscar por nombre...">

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach($futbolistas as $futbolista)
            <div class="p-4 bg-white rounded-lg shadow-md hover:shadow-xl">
                <div class="flex flex-col items-center">
                    <img src="{{ asset('storage/img_futbolistas/'.$futbolista->imagen) }}" class="object-cover w-24 h-24 mb-4 rounded-full">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $futbolista->nombre }}</h2>
                    <p class="text-sm text-gray-600">Fecha de Nacimiento: {{ $futbolista->fecha_nac }}</p>
                    <p class="text-sm text-gray-600">Edad: {{ $futbolista->edad }}</p>
                    <p class="text-sm text-gray-600">Nacionalidad: {{ $futbolista->nacionalidad }}</p>
                    <p class="text-sm text-gray-600">Propietario: {{ $futbolista->usuario->name ?? 'Sin propietario' }}</p>

                    <!-- Mostrar la(s) posición(es) del futbolista -->
                    <p class="text-sm text-gray-600">
                        Posición(es):
                        @foreach($futbolista->posiciones as $posicion)
                            {{ $posicion->nombre }} @if(!$loop->last), @endif
                        @endforeach
                    </p>

                    @if(Auth::check() && Auth::id() === $futbolista->id_usuario)
                        <div class="flex mt-4 space-x-4">
                            <a href="{{ route('futbolistas.edit', $futbolista->id) }}" class="px-4 py-2 text-white bg-yellow-500 rounded-lg hover:bg-yellow-600">Editar</a>
                            <form action="{{ route('futbolistas.destroy', $futbolista->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600" onclick="return confirm('¿Estás seguro?')">Borrar</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
