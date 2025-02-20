<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RankingController extends Controller
{
    public function index()
    {
        $usuarios = User::withCount(['posts as total_likes' => function ($query) {
            $query->select(DB::raw('SUM((SELECT COUNT(*) FROM likes WHERE likes.post_id = posts.id))'));
        }])
        ->orderByDesc('total_likes')
        ->paginate(5);

        return view('ranking.index', compact('usuarios'));
    }
}
