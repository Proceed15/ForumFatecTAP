<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function listAllTags(Request $request) {
        $tags = Tag::all();
        return view('tag.list', compact('tags')); 
    }

    public function showTag(Request $request, $tid) {
        $tag = Tag::findOrFail($tid);
        return view('tag.show', compact('tag')); 
    }

    public function updateTag(Request $request, $tid) {
        // Validação dos dados recebidos
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
    
        // Encontre a tag pelo ID e atualize
        $tag = Tag::findOrFail($tid); // Corrigido para usar $tid
        $tag->title = $request->input('title');
        $tag->save();
    
        // Redirecione para a lista de tags
        return redirect()->route('listAllTags')->with('success', 'Tag atualizada com sucesso!'); // Corrigido para redirecionar para a rota correta
    }

    public function deleteTag(Request $request, $tid) {
        // Encontre a tag pelo ID
        $tag = Tag::findOrFail($tid);
    
        // Remover todas as associações na tabela topic_tags
        $tag->topics()->detach(); // Isso remove todas as associações da tag com os tópicos
    
        // Agora, deletar a tag
        $tag->delete();
    
        return redirect()->intended('/tag')
            ->with('message', 'Deletado com sucesso!');
    }

    public function createTag(Request $request) {
        if ($request->isMethod('get')) {
            return view('tag.create');
        } else {
            $request->validate([
                'title' => 'required|string|max:100',
            ]);
    
            Tag::create([
                'title' => $request->title,
            ]);
    
            return redirect()->route('listAllTags')->with('success', 'Tag registrada com sucesso');
        }
    }

    public function edit($id) {
        // Encontre a tag pelo ID
        $tag = Tag::findOrFail($id);
        // Retorne a view de edição com a tag
        return view('tag.edit', compact('tag'));
    }
}