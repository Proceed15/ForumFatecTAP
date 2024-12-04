<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Topic;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::with('tags')->get(); // Carrega as tags associadas
        return view('topics.list', compact('topics'));
    }

    public function edit($id)
    {
        $topic = Topic::with(['comments', 'tags'])->findOrFail($id); // Carrega as tags associadas
        // Verifica se o usuário autenticado é o autor do tópico
        if (Auth::user()->id !== $topic->user_id) {
            return redirect()->back()->with('error', 'Você não tem permissão para editar este tópico.');
        }
        $tags = Tag::all(); // Carrega todas as tags para o formulário
        return view('topics.edit', compact('topic', 'tags'));
    }

    // Criação de tópicos
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('topics.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        // Criação do tópico
        $topic = Topic::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'user_id' => Auth::id(),
        ]);

        // Criação do post relacionado ao tópico
        $postData = [
            'user_id' => Auth::id(),
            'topic_id' => $topic->id,
        ];

        // Lidar com o upload da imagem
        if ($request->hasFile('image')) {
            $postData['image'] = $this->uploadImage($request->file('image')); // Usando método separado
        }

        $topic->post()->create($postData); // Cria o post

        // Associar as tags
        if ($request->tags) {
            $topic->tags()->attach($request->tags);
        }

        return redirect()->route('topics.index')->with('success', 'Tópico criado com sucesso!');
    }

    public function update(Request $request, $id)
    {
        // Encontra o tópico pelo ID
        $topic = Topic::findOrFail($id);

        // Verifica se o usuário autenticado é o autor do tópico
        if (Auth::user()->id !== $topic->user_id) {
            return redirect()->back()->with('error', 'Você não tem permissão para editar este tópico.');
        }

        // Validação dos dados
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        // Atualiza os dados do tópico
        $topic->title = $request->input('title');
        $topic->description = $request->input('description');
        $topic->status = $request->input('status');
        $topic->save(); // Salvar as alterações no tópico

        // Atualizar o post relacionado ao tópico
        if ($topic->post) {
            // Verificando se uma nova imagem foi enviada
            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($topic->post->image); // Remove a imagem antiga
                $topic->post->image = $this->uploadImage($request->file('image')); // Armazena a nova imagem
            }
            $topic->post->save(); // Salva as alterações no post
        }

        // Atualiza as tags associadas
        if ($request->tags) {
            $topic->tags()->sync($request->tags); // Sincroniza as tags
        }

        return redirect()->route('topics.index')->with('success', 'Tópico atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $topic = Topic::findOrFail($id);
    
        // Verifica se o usuário autenticado é o autor do tópico
        if (Auth::user()->id !== $topic->user_id) {
            return redirect()->back()->with('error', 'Você não tem permissão para deletar este tópico.');
        }
    
        // Remove o post relacionado ao tópico
        if ($topic->post) {
            Storage::disk('public')->delete($topic->post->image); // Remove a imagem do post
            $topic->post->delete(); // Deleta o post
        }
    
        // Remove as associações de tags
        $topic->tags()->detach(); // Remove as tags associadas
    
        $topic->delete(); // Deleta o tópico
    
        return redirect()->route('topics.index')->with('success', 'Tópico deletado com sucesso!');
    }   

    // Método para fazer upload da imagem
    private function uploadImage($image)
    {
        return $image->store('images/posts', 'public'); // Armazena a imagem na pasta public/images/posts
    }

    public function show($id)
{
    $topic = Topic::with(['post', 'tags', 'comments'])->findOrFail($id); // Carrega o tópico com post, tags e comentários
    return view('topics.show', compact('topic'));
}

public function showAllTopics(Request $request)
{
    $query = $request->input('query', '');
    $topics = Topic::with(['category', 'tags', 'user']) // Carrega a categoria, as tags e o usuário
                   ->where('title', 'LIKE', "%{$query}%")
                   ->orWhere('description', 'LIKE', "%{$query}%")
                   ->get();

    return view('welcome', compact('topics', 'query'));
}
}