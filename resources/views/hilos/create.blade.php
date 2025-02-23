<x-app-layout>
<div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Crear Nuevo Hilo</h2>

    <form action="{{ route('hilos.store') }}" method="POST">
        @csrf

        <!-- Título -->
        <div class="mb-4">
            <label for="titulo" class="block text-gray-700 dark:text-gray-300 font-medium mb-1">Título</label>
            <input type="text" id="titulo" name="titulo" placeholder="Escribe el título del hilo"
                class="w-full p-2 border rounded-lg text-gray-900 dark:text-gray-100 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                required>
        </div>

        <!-- Descripción -->
        <div class="mb-4">
            <label for="descripcion" class="block text-gray-700 dark:text-gray-300 font-medium mb-1">Descripción</label>
            <textarea id="descripcion" name="descripcion" placeholder="Escribe una descripción..."
                class="w-full p-2 border rounded-lg text-gray-900 dark:text-gray-100 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-indigo-500 focus:outline-none h-32 resize-none"
                required></textarea>
        </div>

        <!-- Botón de envío -->
        <div class="flex justify-end">
            <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                Crear Hilo
            </button>
        </div>
    </form>
</div>
</x-app-layout>