<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Tag;

class TagController extends Controller
{
    public function home() {
        //Essa função seria um Controller próprio para gerenciar o ID do usuário logado.
        $user_id = Auth::id();
        return view('home', ['authUser' => $user_id]);
    }

    // camelCase
    // no_camel_case
    //Lógicas para programar
    public function listAllTags(){
        $tags = Tag:: all();
        //Lógica pasta.nomedapagina
        return view('tags.listAllTags', ['tags' => $tags]);
    }

    /*não será mais utilizado.
    public function createAUser(Request $request){
        return view('users.createAUser');
    }
    */

    public function createtag(Request $request){
        
        if($request->method() === 'GET') {
            return view('auth.createtag');
        } else {
            $request->validate([
                'tagtitle' => 'required|string|max:255|unique:tags',
                'tagdescription' => 'required|string|max:255',
                'tagstatus' => 'required|boolean|max:1'
            ]);

            $tag = Tag::create([
                'tagtitle' => $request->tagtitle,
                'tagdescription' => $request->tagdescription,
                'tagstatus' => $request->tagstatus,
            ]);

            //Auth::login($user);

            return redirect()
            ->route('listAllTags')
            ->with('success', 'Tag cadastrada com sucesso.');
        }
    }
    public function tags_profile(Request $request){
        
        if($request->method() === 'GET') {
            return view('tags_profile');
        } else {
            $request->validate([
                'tagtitle' => 'required|string|max:255',
                'tagdescription' => 'required|string|max:255',
                'tagstatus' => 'required|boolean|max:1'
            ]);

            $tag = Tag::create([
                'tagtitle' => $request->tagtitle,
                'tagdescription' => $request->tagdescription,
                'tagstatus' => $request->tagstatus,
            ]);

            //Auth::login($user);

            return redirect()
            ->route('tags_profile')
            ->with('success', 'Tópico cadastrado com sucesso.');
        }
    }

    public function listTagsByID(Request $request, $uid){
        //Procurar o Usuário no Banco.
        $tag = Tag::where('id', $uid)->first();
        //where --> busca 1 campo só, mas retorna um array desse campo.
        //find --> busca vários campos.
        //print($uid);
        //return view('users.listUsersByID');
        return view('tags.ViewtagByID', ['tag' => $tag]);
    }


    public function editTagByID(Request $request, $uid){
        $tag = Tag::where('id', $uid)->first();
        //Adicionar validação de dados igual a função do register.
        $request->validate([
            'tagtitle' => 'required|string|max:255',
            'tagdescription' => 'required|string|max:255',
            'tagstatus' => 'required|boolean|max:1'
        ]);
        $tag->tagtitle = $request->tagtitle;
        $tag->tagdescription = $request->tagdescription;
        $tag->tagstatus = $request->tagstatus;

        $tag->save();
        $tag_id = Auth::id();
        return redirect()->route('listAllTags', [$tag->id])->with('message', 'Atualizado com sucesso!');
        //return view('tags.editTagByID');
    }
    public function deletetagByID(Request $request, $uid){
        $tag = Tag::where('id', $uid)->first();
        
        $user->save();
        //return view('users.deleteUserByID');
        return redirect()->route('listTagsByID', [$tag->id])->with('message', 'Excluído com sucesso!');
    }
}