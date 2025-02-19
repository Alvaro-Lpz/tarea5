<?php

namespace App\Http\Controllers;

use App\Models\Hilo;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request, Hilo $hilo)
    {

        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para publicar.');
        }

        $request->validate(['contenido' => 'required|string']);

        $hilo->posts()->create([
            'contenido' => $request->contenido,
            'user_id' => Auth::id(),
            'fecha_publicacion' => now(),
        ]);

        return back();
    }

    public function like(Post $post)
    {
        $post->likes()->firstOrCreate(['user_id' => Auth::id()]);
        return back();
    }
}
