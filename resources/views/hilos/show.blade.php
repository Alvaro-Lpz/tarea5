<h2>{{ $hilo->titulo }}</h2>
<p>{{ $hilo->descripcion }}</p>

@foreach ($hilo->posts as $post)
    <div class="post">
        <img src="{{ asset($post->user->ruta_imagen) }}" alt="Imagen de {{ $post->user->nombre }}" width="50">
        <p><strong>{{ $post->user->nombre }}:</strong> {{ $post->contenido }}</p>
        <p>Me gusta: {{ $post->likes->count() }}</p>
        <form action="{{ route('posts.like', $post) }}" method="POST">
            @csrf
            <button type="submit">👍 Me gusta</button>
        </form>
        {{-- @if (auth()->user()->hasRole('admin')) --}}
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                onsubmit="return confirm('¿Seguro que quieres eliminar este post?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">🗑️ Eliminar</button>
            </form>
        {{-- @endif --}}
    </div>
@endforeach

<form action="{{ route('posts.store', $hilo) }}" method="POST">
    @csrf
    <textarea name="contenido" placeholder="Escribe tu respuesta..." required></textarea>
    <button type="submit">Responder</button>
</form>
