<x-app-layout>
    <div class="container px-4 py-8 mx-auto">
        <h1 class="mb-6 text-3xl font-semibold text-center text-blue-500">Editar Perfil</h1>

        @if(session('success'))
            <div class="p-4 mb-6 text-white bg-green-500 rounded-lg shadow-lg">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('user.update', $user->id) }}" method="POST" class="p-8 bg-white rounded-lg shadow-lg">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-6">
                <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
                <input type="text" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="apellidos" name="apellidos" value="{{ old('apellidos', $user->apellidos) }}"/>
            </div>

            <div class="mb-6">
                <label for="sexo" class="block text-sm font-medium text-gray-700">Sexo</label>
                <select class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="sexo" name="sexo">
                    <option value="Masculino" {{ old('sexo', $user->sexo) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="Femenino" {{ old('sexo', $user->sexo) == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                    <option value="" {{ old('sexo', $user->sexo) == null ? 'selected' : '' }}>No especificado</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="pais" class="block text-sm font-medium text-gray-700">País</label>
                <input type="text" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="pais" name="pais" value="{{ old('pais', $user->pais) }}"/>
            </div>

            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                <input type="email" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="password" name="password" placeholder="Deja en blanco si no quieres cambiarla">
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
                <input type="password" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="password_confirmation" name="password_confirmation" placeholder="Deja en blanco si no quieres cambiarla">
            </div>

            <!-- Campo para seleccionar si el usuario será admin -->
            <div class="mb-6">
                <label for="admin" class="block text-sm font-medium text-gray-700">¿Es Administrador?</label>
                <select name="admin" id="admin" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="0" {{ old('admin', $user->admin) == '0' ? 'selected' : '' }}>No</option>
                    <option value="1" {{ old('admin', $user->admin) == '1' ? 'selected' : '' }}>Sí</option>
                </select>
            </div>

            <button type="submit" class="w-full py-3 font-semibold text-white bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                Actualizar Perfil
            </button>
        </form>
    </div>
</x-app-layout>
