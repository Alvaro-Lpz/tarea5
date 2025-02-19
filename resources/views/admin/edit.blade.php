<x-app-layout>
    <h2 class="text-xl font-semibold">Editar Usuario</h2>

    <form action="{{ route('admin.update', $user) }}" method="POST">
        @csrf
        @method('PATCH')

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ $user->nombre }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" required>

        <label for="rol">Rol:</label>
        <select name="rol">
            <option value="usuario" {{ $user->rol == 'usuario' ? 'selected' : '' }}>Usuario</option>
            <option value="admin" {{ $user->rol == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Actualizar</button>
    </form>
</x-app-layout>