<x-app-layout>
    <div class="max-w-4xl p-6 mx-auto bg-white rounded-lg shadow-md">
        <h1 class="mb-6 text-3xl font-semibold text-gray-800">Crear Nuevo Usuario</h1>

        @if(session('success'))
            <div class="p-4 mb-6 text-green-700 bg-green-100 border border-green-300 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-lg font-medium text-gray-700">Nombre</label>
                <input type="text" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-4">
                <label for="apellidos" class="block text-lg font-medium text-gray-700">Apellidos</label>
                <input type="text" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="apellidos" name="apellidos" value="{{ old('apellidos') }}">
            </div>

            <div class="mb-4">
                <label for="sexo" class="block text-lg font-medium text-gray-700">Sexo</label>
                <select class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="sexo" name="sexo">
                    <option value="Masculino" {{ old('sexo') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="Femenino" {{ old('sexo') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                    <option value="" {{ old('sexo') == null ? 'selected' : '' }}>No especificado</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="pais" class="block text-lg font-medium text-gray-700">País</label>
                <input type="text" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="pais" name="pais" value="{{ old('pais') }}">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-lg font-medium text-gray-700">Correo electrónico</label>
                <input type="email" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-lg font-medium text-gray-700">Contraseña</label>
                <input type="password" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="password" name="password" required>
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block text-lg font-medium text-gray-700">Confirmar Contraseña</label>
                <input type="password" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="w-full py-3 text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Crear Usuario
            </button>
        </form>
    </div>
</x-app-layout>
