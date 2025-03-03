<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-center min-h-screen py-12 bg-gradient-to-r from-blue-500 to-purple-600">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="p-8 overflow-hidden bg-white shadow-lg dark:bg-gray-800 sm:rounded-2xl">
                <h3 class="text-3xl font-bold text-center text-gray-900 dark:text-gray-100">
                    ⚽ Bienvenido a <span class="text-blue-500">Dream Football</span>
                </h3>
                <p class="mt-4 text-lg text-center text-gray-700 dark:text-gray-300">
                    Disfruta de la mejor experiencia futbolística con nosotros.
                </p>
                <div class="flex justify-center mt-6">
                    <a href="#" class="px-6 py-3 text-lg font-semibold text-white transition duration-300 bg-blue-600 rounded-lg shadow-md hover:bg-blue-700">
                        Explorar
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
