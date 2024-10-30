<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function listAllTags(Request $request) {
        $tags = Tag::all();
        return view('tag.listAllTags', compact('tags')); 
    }

    public function showTag(Request $request, $tid) {
        $tag = Tag::findOrFail($tid);
        return view('tag.id.showTag', compact('tag')); 
    }

    public function updateTag(Request $request, $tid) {
        $tag = Tag::where('id', $tid)->first();
        $tag->title = $request->title;
        
        $tag->save();

        return redirect()->route('showTag', [$tag->id])
        ->with('message', 'Atualizado com sucesso!');
    }

    public function deleteTag(Request $request, $tid) {
        $tag = Tag::where('id', $tid)->delete();
        return redirect()->intended('/tag')
        ->with('message', 'Deletado com sucesso!');
    }

    public function createTag(Request $request) {
        if ($request->method() === 'GET'){
        return view('tag.createtag.createTag');
        } else {
            $request->validate([
                'title' => 'required|string|max:100',
                
            ]);

            $tag = Tag::create([
                'title' => $request->title,
                ]);

            return redirect()->intended('/tag')->with('success', 'Tag registrada com sucesso');
        }
    }

    public function editTag() {
        return view('tag.id.edit.editTag');
    }
}
