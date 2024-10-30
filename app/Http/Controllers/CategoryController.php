<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //listAllCategory ou list_all_category
    public function listAllCategory(Request $request) {
        // Lógica
        $categories = Category::all();

        return view('category.listAllCategory', compact('categories'));
    }

     // Método para mostrar uma categoria específica
     public function showCategory($cid) {
        $category = Category::findOrFail($cid);
        return view('category.id.showCategory', compact('category'));
    }

    public function updateCategory(Request $request, $cid) {
        $category = Category::where('id', $cid)->first();
        $category->title = $request->title;
        $category->description = $request->description;
        
        $category->save();

        return redirect()->route('showCategory', [$category->id])
        ->with('message', 'Atualizado com sucesso!');
    }

    public function deleteCategory(Request $request, $cid) {
        $category = Category::where('id', $cid)->delete();
        return redirect()->intended('/category')
        ->with('message', 'Deletado com sucesso!');
    }

    public function createCategory(Request $request) {
        if ($request->method() === 'GET'){
        return view('category.createcat.createCategory');
        } else {
            $request->validate([
                'title' => 'required|string|max:50',
                'description' => 'required|string|max:255',
            ]);

            $category = Category::create([
                'title' => $request->title,
                'description' => $request->description,
                ]);

            

            return redirect()->intended('/category')->with('success', 'Categoria registrada com sucesso');
        }
    }

    public function editCategory() {
        return view('category.id.edit.editCategory');
    }


}
