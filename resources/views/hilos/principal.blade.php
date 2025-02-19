@foreach($hilos as $hilo)
    <div class="hilo">
        <h2>{{ $hilo->titulo }}</h2>
        <p>{{ $hilo->descripcion }}</p>
        <p>Creado por: {{ $hilo->user->nombre }}</p>
        <a href="{{ route('hilos.show', $hilo) }}">Ver conversación</a>
    </div>
@endforeach

{{-- @auth --}}
    <a href="{{ route('hilos.create') }}">Crear hilo</a>
{{-- @endauth --}}