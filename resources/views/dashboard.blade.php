<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <p class="text-xl text-gray-900 dark:text-gray-100">
                        {{ __("Has iniciado sesión") }}
                    </p>
                    <a href="{{ route('profile.edit') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">Editar perfil</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>