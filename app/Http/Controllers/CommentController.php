<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Models\CommentLike;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index($topicId)
    {
        $topic = Topic::findOrFail($topicId); 
        $comments = Comment::where('topic_id', $topicId)->get();
        return view('comments.index', compact('comments', 'topic')); 
    }

 // app/Http/Controllers/CommentController.php
//teste
public function store(Request $request)
{
    $request->validate([
        'content' => 'required|string|max:255',
        'topic_id' => 'required|exists:topics,id',
    ]);

    // Criação do comentário
    $comment = Comment::create([
        'content' => $request->content,
        'topic_id' => $request->topic_id,
        'user_id' => Auth::id(), // Adicione o ID do usuário, se necessário
    ]);

    // Criação do post relacionado ao comentário
    $comment->post()->create([
        'user_id' => Auth::id(),
        // 'image' => $request->image, // Caso você queira adicionar uma imagem
    ]);

    return redirect()->back()->with('success', 'Comentário adicionado com sucesso!');
}
public function destroy($id)
{
    $comment = Comment::findOrFail($id);
    $topicId = $comment->topic_id; 

      // Verifica se o usuário autenticado é o autor do comentário
      if (Auth::user()->id !== $comment->user_id) {
        return redirect()->back()->with('error', 'Você não tem permissão para deletar este comentário.');
    }

    $comment->delete(); 

    return redirect()->route('topics.show', $topicId)->with('success', 'Comentário excluído com sucesso!');
}

// CommentController.php

public function edit($id)
{
    // Tenta encontrar o comentário pelo ID
    $comment = Comment::findOrFail($id);

    // Verifica se o usuário autenticado é o autor do comentário
    if (Auth::user()->id !== $comment->user_id) {
        return redirect()->back()->with('error', 'Você não tem permissão para editar este comentário.');
    }

    // Passa a variável $comment para a view
    return view('comments.edit', compact('comment'));
}

public function update(Request $request, $id)
{
    $comment = Comment::findOrFail($id);

    // Verifica se o usuário autenticado é o autor do comentário
    if (Auth::user()->id !== $comment->user_id) {
        return redirect()->back()->with('error', 'Você não tem permissão para atualizar este comentário.');
    }

    // Validação e atualização do comentário
    $request->validate([
        'content' => 'required|string|max:255',
    ]);
    $comment = Comment::findOrFail($id); // Obtém o comentário
    $comment->content = $request->content;
    $comment->save();

    // Redireciona para a rota do tópico associado ao comentário
    return redirect()->route('topics.show', $comment->topic_id)->with('success', 'Comentário atualizado com sucesso!');
}

//sistema de like e deslike



public function like(Request $request, $commentId)
{
    // Verifica se o comentário existe
    $comment = Comment::find($commentId);
    if (!$comment) {
        return back()->with('error', 'Comentário não encontrado.');
    }

    $commentLike = CommentLike::where('comment_id', $commentId)
        ->where('user_id', auth()->id())
        ->first();

    if ($commentLike) {
        // Se já existe um like, altera para dislike
        $commentLike->is_like = !$commentLike->is_like;
        $commentLike->save();
    } else {
        // Cria um novo like
        CommentLike::create([
            'comment_id' => $commentId,
            'user_id' => auth()->id(),
            'is_like' => true,
        ]);
    }

    return back();
}

public function dislike(Request $request, $commentId)
{
    $commentLike = CommentLike::where('comment_id', $commentId)
        ->where('user_id', auth()->id())
        ->first();

    if ($commentLike) {
        // Se já existe um dislike, remove
        $commentLike->delete();
    } else {
        // Cria um novo dislike
        CommentLike::create([
            'comment_id' => $commentId,
            'user_id' => auth()->id(),
            'is_like' => false,
        ]);
    }

    return back();
}


}