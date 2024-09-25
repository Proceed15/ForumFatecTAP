<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoryController extends Controller
{
    public function home() {
        //Essa função seria um Controller próprio para gerenciar o ID do usuário logado.
        $user_id = Auth::id();
        return view('home', ['authUser' => $user_id]);
    }

    // camelCase
    // no_camel_case
    //Lógicas para programar
    public function listAllCategories(){
        $categories = Category::all();
        //Lógica pasta.nomedapagina
        return view('categories.listAllCategories', ['Categories' => $categories]);
    }

    /*não será mais utilizado.
    public function createAUser(Request $request){
        return view('users.createAUser');
    }
    */

    public function createcategory(Request $request){
        
        if($request->method() === 'GET') {
            return view('auth.createcategory');
        } else {
            $request->validate([
                'title' => 'required|string|max:255|unique:categories',
                'description' => 'required|string|max:255',
                'status' => 'required|boolean|max:1'
            ]);

            $category = category::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
            ]);

            //Auth::login($user);

            return redirect()
            ->route('listAllcategories')
            ->with('success', 'categoria cadastrada com sucesso.');
        }
    }
    public function categories_profile(Request $request){
        
        if($request->method() === 'GET') {
            return view('categories_profile');
        } else {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'status' => 'required|boolean|max:1'
            ]);

            $category = category::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
            ]);

            //Auth::login($user);

            return redirect()
            ->route('categories_profile')
            ->with('success', 'Tópico cadastrado com sucesso.');
        }
    }

    public function listcategoriesByID(Request $request, $uid){
        //Procurar o Usuário no Banco.
        $category = category::where('id', $uid)->first();
        //where --> busca 1 campo só, mas retorna um array desse campo.
        //find --> busca vários campos.
        //print($uid);
        //return view('users.listUsersByID');
        return view('categories.ViewcategoryByID', ['category' => $category]);
    }


    public function editcategoryByID(Request $request, $uid){
        $category = category::where('id', $uid)->first();
        //Adicionar validação de dados igual a função do register.
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'required|boolean|max:1'
        ]);
        $category->title = $request->title;
        $category->description = $request->description;
        $category->status = $request->status;

        $category->save();
        $category_id = Auth::id();
        return redirect()->route('listAllcategories', [$category->id])->with('message', 'Atualizado com sucesso!');
        //return view('categories.editcategoryByID');
    }
    public function deletecategoryByID(Request $request, $uid){
        $category = category::where('id', $uid)->first();
        
        $user->save();
        //return view('users.deleteUserByID');
        return redirect()->route('listcategoriesByID', [$category->id])->with('message', 'Excluído com sucesso!');
    }
}
