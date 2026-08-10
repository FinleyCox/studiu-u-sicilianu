<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);

        return view('hockey.index', [
            'articles' => $articles,
        ]);
    }

    public function show(Article $article)
    {
        $article->load(['comments' => fn ($query) => $query->oldest()]);

        return view('hockey.show', [
            'article' => $article,
        ]);
    }

    public function create()
    {
        return view('admin.hockey.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|regex:/^[a-z0-9-]+$/|unique:articles,slug',
            'excerpt' => 'required|string|max:500',
            'body' => 'required|string|max:20000',
        ]);

        $article = Article::create($validated);

        return redirect()
            ->route('hockey.show', $article)
            ->with('success', 'Article published successfully!');
    }

    public function edit(Article $article)
    {
        return view('admin.hockey.edit', [
            'article' => $article,
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|regex:/^[a-z0-9-]+$/|unique:articles,slug,' . $article->id,
            'excerpt' => 'required|string|max:500',
            'body' => 'required|string|max:20000',
        ]);

        $article->update($validated);

        return redirect()
            ->route('hockey.show', $article)
            ->with('success', 'Article updated successfully!');
    }
}
