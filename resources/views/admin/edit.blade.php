<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-gray-200">Editar Usuario</h2>

                    <form action="{{ route('admin.update', $user) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                            <input type="text" name="nombre" value="{{ $user->nombre }}" required class="mt-1 block w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" required class="mt-1 block w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        </div>

                        <div>
                            <label for="rol" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Rol</label>
                            <select name="rol" class="mt-1 block w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                                <option value="usuario" {{ $user->rol == 'usuario' ? 'selected' : '' }}>Usuario</option>
                                <option value="admin" {{ $user->rol == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="editor" {{ $user->rol == 'editor' ? 'selected' : '' }}>Editor</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>