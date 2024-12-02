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
        // Inicializa a variável $query como uma string vazia
        $query = $request->input('query', ''); // Se não houver input, será uma string vazia
        $topics = [];

        // Se houver uma consulta, faça a busca
        if ($query) {
            $topics = Topic::where('title', 'LIKE', "%{$query}%")
                           ->orWhere('description', 'LIKE', "%{$query}%")
                           ->get();
        } else {
            // Se não houver consulta, obtenha todos os tópicos
            $topics = Topic::all();
        }

        return view('welcome', compact('topics', 'query'));
    }
}