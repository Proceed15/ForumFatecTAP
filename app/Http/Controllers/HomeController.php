<?php

namespace App\Http\Controllers;

use App\Models\Topic; // Certifique-se de usar o modelo correto
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Função com Query para pesquisas
        $query = $request->input('query', ''); // Se não houver input, será uma string vazia
        $topics = [];

        // Se houver uma consulta, faz a busca
        if ($query) {
            $topics = Topic::where('title', 'LIKE', "%{$query}%")
                           ->orWhere('description', 'LIKE', "%{$query}%")
                           ->get();
        } else {
            // Se não houver consulta vai mostrar todos os tópicos
            $topics = Topic::all();
        }

        return view('welcome', compact('topics', 'query'));
    }
}