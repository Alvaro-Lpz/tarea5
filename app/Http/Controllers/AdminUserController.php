<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function index()
    {
        $usuarios = User::paginate(5);
        return view('admin.index', compact('usuarios'));
    }

    public function edit(User $user)
    {
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'rol' => 'required|in:admin,usuario',
        ]);

        if (Auth::user()->rol !== 'admin') {
            unset($request['rol']);
        }

        $user->update($request->only('nombre', 'email', 'rol'));

        return redirect()->route('admin.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
