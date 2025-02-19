@extends('layouts.app')
<form action="{{ route('hilos.store') }}" method="POST">
    @csrf
    <input type="text" name="titulo" placeholder="Título" required>
    <textarea name="descripcion" placeholder="Descripción" required></textarea>
    <button type="submit">Crear Hilo</button>
</form>