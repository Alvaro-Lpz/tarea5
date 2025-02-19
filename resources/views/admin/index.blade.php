<x-app-layout>
    <h2 class="text-xl font-semibold">Lista de Usuarios</h2>

    @if(session('success'))
        <p class="text-green-500">{{ session('success') }}</p>
    @endif

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->rol }}</td>
                    <td>
                        <a href="{{ route('admin.edit', $usuario) }}" class="text-blue-500">Editar</a>
                        <form action="{{ route('admin.destroy', $usuario) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar este usuario?')" class="text-red-500">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $usuarios->links() }}
</x-app-layout>