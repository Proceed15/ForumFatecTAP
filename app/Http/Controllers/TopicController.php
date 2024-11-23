<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Topic;
//use App\Http\Controllers\UserController;
use UserController;

class TopicController extends Controller
{
    public function home() {
        //Essa função seria um Controller próprio para gerenciar o ID do usuário logado.
        $user_id = Auth::id();
        return view('home', ['authUser' => $user_id]);
    }

    // camelCase
    // no_camel_case
    //Lógicas para programar
    public function listAllTopics(){
        $topics = Topic:: all();
        //Lógica pasta.nomedapagina
        return view('topics.listAllTopics', ['topics' => $topics]);
    }

    /*não será mais utilizado.
    public function createAUser(Request $request){
        return view('users.createAUser');
    }
    */

    public function create(Request $request){
        
        if($request->method() === 'GET') {
            return view('auth.create');
        } else {
            $request->validate([
                'title' => 'required|string|max:255|unique:topics',
                'description' => 'required|string|max:255',
                'status' => 'required|boolean|max:1',
                'image' => 'required|string|max:255'
            ]);

            $topic = Topic::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'image' => $request->image,
            ]);

            //Auth::login($user);

            return redirect()
            ->route('listAllTopics')
            ->with('success', 'Tópico cadastrado com sucesso.');
        }
    }
    public function topics_profile(Request $request){
        
        if($request->method() === 'GET') {
            return view('topics_profile');
        } else {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'status' => 'required|boolean|max:1',
                'image' => 'required|string|max:255',
                'category' => 'required'
            ]);

            $topic = Topic::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'image' => $request->image,
                'category_id' => $request->category_id,
            ]);

            //Auth::login($user);

            return redirect()
            ->route('topics_profile')
            ->with('success', 'Tópico cadastrado com sucesso.');
        }
    }

    public function listTopicsByID(Request $request, $uid){
        //Procurar o Usuário no Banco.
        $topic = Topic::where('id', $uid)->first();
        //where --> busca 1 campo só, mas retorna um array desse campo.
        //find --> busca vários campos.
        //print($uid);
        //return view('users.listUsersByID');
        return view('topics.ViewTopicByID', ['topic' => $topic]);
    }


    public function editTopicByID(Request $request, $uid){
        $topic = Topic::where('id', $uid)->first();
        //Adicionar validação de dados igual a função do register.
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'required|boolean|max:1',
            'image' => 'required|string|max:255'
        ]);
        $topic->title = $request->title;
        $topic->description = $request->description;
        $topic->status = $request->status;
        $topic->image = $request->image;

        $topic->save();
        $topic_id = Auth::id();
        return redirect()->route('listAllUsers', [$topic->id])->with('message', 'Atualizado com sucesso!');
        //return view('topics.editTopicByID');
    }
    public function deleteTopicByID(Request $request, $uid){
        $topic = Topic::where('id', $uid)->first();
        
        //$user->save();
        $topic->save();
        //return view('users.deleteUserByID');
        return redirect()->route('listTopicsByID', [$topic->id])->with('message', 'Excluído com sucesso!');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::with('post')->get();
        return $topics;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Esse no Plural
    public function creates()
    {
        $categories = Category::all();
        return view('topic.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::id();

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|string',
            'status' => 'required|int',
            'category' => 'required'
        ]);

        $topic = Topic::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category
        ]);

        $topic->post()->create([
            'user_id' => Auth::id(),
            'image' => $request->image,
            // 'image' => $request->file('image')->store('images', 'public')
        ]);

        // $topic = new Topic([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'status' => $request->status,
        //     'category_id' => $request->category
        // ]);

        // $post = new Post([
        //     'image' => $request->image
        // ]);

        
        // $topic->post()->save($post);



        return($topic);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
