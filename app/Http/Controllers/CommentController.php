<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = Comment::create([
            'user_id' => auth()->id(), 
            'article_id' => $request->input('article_id'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('articles.show', ['id' => $request->input('article_id')])
                         ->with('success', 'Comment added successfully');
    }

    // Other methods like edit, update, destroy can be added as needed
}
