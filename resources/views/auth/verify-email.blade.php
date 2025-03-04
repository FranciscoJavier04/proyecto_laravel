<x-guest-layout>
    <!-- Encabezado con el nombre de la página -->
    <div class="mb-6 text-center">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Dream Football</h1>
        <p class="text-lg text-gray-600 dark:text-gray-400">{{ __('¡Bienvenido a la mejor plataforma de fútbol!') }}</p>
    </div>

    <div class="mb-4 text-sm text-gray-700 dark:text-gray-300">
        {{ __('Gracias por registrarte! Antes de comenzar, por favor verifica tu dirección de correo electrónico haciendo clic en el enlace que acabamos de enviarte. Si no recibiste el correo, con gusto te enviaremos otro.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 text-sm font-medium text-green-600 dark:text-green-400">
            {{ __('Te hemos enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionaste durante el registro.') }}
        </div>
    @endif

    <div class="flex items-center justify-between mt-6">
        <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
            @csrf
            <x-primary-button class="w-full sm:w-auto">
                {{ __('Reenviar Email de Verificación') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="ml-4">
            @csrf
            <button type="submit" class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Cerrar Sesión') }}
            </button>
        </form>
    </div>

    <!-- Pie de página opcional (footer) -->
    <div class="mt-8 text-sm text-center text-gray-500 dark:text-gray-400">
        <p>{{ __('© 2025 Dream Football. Todos los derechos reservados.') }}</p>
    </div>
</x-guest-layout>
