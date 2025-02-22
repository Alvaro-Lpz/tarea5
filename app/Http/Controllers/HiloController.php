<?php

namespace App\Http\Controllers;

use App\Models\Hilo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HiloController extends Controller
{
    public function index()
    {
        $hilos = Hilo::with('user')->latest()->get(); // Obtiene los hilos con el usuario creador
        return view('hilos.principal', compact('hilos'));
    }

    public function create()
    {
        // dd('Entrando al método create');
        return view('hilos.create');
    }

    public function show(Hilo $hilo)
    {
        $hilo->load(['posts.user']); // Carga los posts con su usuario
        return view('hilos.show', compact('hilo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        Hilo::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('hilos.principal');
    }
}
