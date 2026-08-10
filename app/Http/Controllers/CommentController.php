<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        if ($this->submittedTooQuickly($request)) {
            return back()
                ->withErrors(['body' => 'Please wait a moment before submitting.'])
                ->withInput();
        }

        $validated = $request->validate([
            'author_name' => 'required|string|max:100',
            'body' => 'required|string|min:2|max:2000',
            'website' => 'prohibited',
        ]);

        $article->comments()->create([
            'author_name' => strip_tags($validated['author_name']),
            'body' => strip_tags($validated['body']),
            'ip_address' => $request->ip(),
        ]);

        return redirect()
            ->route('hockey.show', $article)
            ->with('success', 'Comment posted!');
    }

    public function destroy(Comment $comment)
    {
        $article = $comment->article;

        $comment->delete();

        return redirect()
            ->route('hockey.show', $article)
            ->with('success', 'Comment deleted.');
    }

    private function submittedTooQuickly(Request $request): bool
    {
        $renderedAt = (int) $request->input('comment_form_rendered_at', 0);

        return $renderedAt > 0 && (now()->timestamp - $renderedAt) < 3;
    }
}
