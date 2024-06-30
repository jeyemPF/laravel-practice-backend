<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function store(Request $request)
    {
        $article = Article::create([
            'user_id' => auth()->id(), // Assuming authenticated user ID
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('articles.show', ['id' => $article->id])
                         ->with('success', 'Article created successfully');
    }

    // Other methods like edit, update, destroy can be added as needed

    
}
