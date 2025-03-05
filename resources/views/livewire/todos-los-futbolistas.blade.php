<div>
    <input type="text" wire:model.live="search" class="px-4 py-2 mb-4 border rounded-md" placeholder="Buscar por nombre...">

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
                            <img src="{{ asset('storage/img_futbolistas/'.$futbolista->imagen) }}" class="object-cover w-24 h-24 rounded-full">
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('futbolistas.edit', $futbolista->id) }}" class="px-4 py-2 text-white bg-yellow-500 rounded-lg hover:bg-yellow-600">Editar</a>
                            <form action="{{ route('futbolistas.destroy', $futbolista->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600" onclick="return confirm('¿Estás seguro?')">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
