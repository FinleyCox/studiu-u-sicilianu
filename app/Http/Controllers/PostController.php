<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|regex:/^[a-z0-9-]+$/',
            'date' => 'required|date',
            'excerpt' => 'required|string',
            'body' => 'required|string',
        ]);

        $content = "---
title: {$validated['title']}
slug: {$validated['slug']}
excerpt: {$validated['excerpt']}
date: {$validated['date']}
---

{$validated['body']}
";

        $filename = $validated['slug'] . '.md';
        $path = resource_path('posts/' . $filename);

        if (File::exists($path)) {
            return back()->with('error', 'A post with this slug already exists.');
        }

        File::put($path, $content);

        return redirect()->route('admin.blog.create')->with('success', 'Blog post created successfully!');
    }
}
