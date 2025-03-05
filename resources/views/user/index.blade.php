<x-app-layout>
    <div class="container p-6 mx-auto">
        <h1 class="mb-6 text-3xl font-semibold text-blue-500">Listado de Usuarios</h1>

        <!-- Mensaje de éxito o error -->
        @if(session('success'))
            <div class="p-4 mb-4 text-white bg-green-500 rounded alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="p-4 mb-4 text-white bg-red-500 rounded alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Botón para agregar nuevo usuario -->
        <a href="{{ route('user.create') }}" class="inline-block px-4 py-2 mb-4 text-white transition duration-300 bg-blue-600 rounded-lg hover:bg-blue-700">Crear Nuevo Usuario</a>

        <!-- Tabla de usuarios -->
        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="min-w-full border-collapse table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-sm font-medium text-left text-gray-600">Nombre</th>
                        <th class="px-6 py-3 text-sm font-medium text-left text-gray-600">Apellidos</th>
                        <th class="px-6 py-3 text-sm font-medium text-left text-gray-600">Email</th>
                        <th class="px-6 py-3 text-sm font-medium text-left text-gray-600">Sexo</th>
                        <th class="px-6 py-3 text-sm font-medium text-left text-gray-600">País</th>
                        <th class="px-6 py-3 text-sm font-medium text-left text-gray-600">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->apellidos }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->sexo }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $user->pais }}</td>
                            <td class="px-6 py-4 text-sm">
                                <!-- Botón para editar -->
                                <a href="{{ route('user.edit', $user->id) }}" class="inline-block px-3 py-1 text-white transition duration-200 bg-yellow-500 rounded-lg hover:bg-yellow-600">Editar</a>

                                <!-- Botón para eliminar con modal -->
                                <button onclick="openModal('usuario-{{ $user->id }}')" class="inline-block px-3 py-1 text-white transition duration-200 bg-red-600 rounded-lg hover:bg-red-700">Eliminar</button>

                                <!-- Componente de modal de confirmación -->
                                <x-confirm-delete-modal
                                    id="usuario-{{ $user->id }}"
                                    route="{{ route('user.destroy', $user->id) }}"
                                    message="¿Seguro que deseas eliminar a {{ $user->name }}?"
                                />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
