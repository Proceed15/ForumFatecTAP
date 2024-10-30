<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Post;
use App\Models\Category;

class TopicController extends Controller
{
    public function listAllTopics(Request $request) {
        $topic = Topic::all();
        return view('topic.listAllTopics', compact('topics')); 
    }

    public function showTopic(Request $request, $tid) {
        $topic = Topic::findOrFail($tid);
        return view('topic.id.showTopic', compact('topic')); 
    }

    public function updateTopic(Request $request, $tid) {
        $topic = Topic::where('id', $tid)->first();
        $topic->title = $request->title;
        $topic->description = $request->description;
        $topic->image = $request->image;
        $topic->status = $request->status;
        $topic->save();

        return redirect()->route('showTopic', [$topic->id])
        ->with('message', 'Atualizado com sucesso!');
    }

    public function deleteTopic(Request $request, $tid) {
        $topic = Topic::where('id', $tid)->delete();
        return redirect()->intended('/topic')
        ->with('message', 'Deletado com sucesso!');
    }

    public function createTopic(Request $request) {
        $categories = Category::all();
        if ($request->method() === 'GET') {
            return view('topic.createtopic.createTopic');
        } else {
            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'image' => 'required|string',
                'status' => 'required|int',
                'category' => 'required',
            ]);
    
            $topic = Topic::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'category_id' => $request->category
            ]);
    
            
            // $post = new Post([
            //     'image' => $request->image
            // ]);
    
            // $topic->post()->save($post);
    
            return redirect()->intended('/topic', ['categories' => $categories])->with('success', 'Topic registrada com sucesso');
        }
    }

    public function editTopic() {
        return view('topic.id.edit.editTopic');
    }
}
