<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ranking de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow-md">
                        <table class="min-w-full table-auto text-left text-gray-800 dark:text-gray-200">
                            <thead>
                                <tr class="border-b dark:border-gray-700">
                                    <th class="px-4 py-2 font-semibold">Puesto</th>
                                    <th class="px-4 py-2 font-semibold">Usuario</th>
                                    <th class="px-4 py-2 font-semibold">Likes Totales</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $index => $usuario)
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="px-4 py-2">{{ $index + 1 + ($usuarios->currentPage() - 1) * $usuarios->perPage() }}</td>
                                        <td class="px-4 py-2">{{ $usuario->nombre }}</td>
                                        <td class="px-4 py-2">{{ $usuario->total_likes ?? 0 }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Paginación -->
                    <div class="mt-4 text-center">
                        <div class="inline-flex rounded-md shadow-sm">
                            {{ $usuarios->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>