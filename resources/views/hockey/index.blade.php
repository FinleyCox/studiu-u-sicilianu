<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ice Hockey Blog - Finley Cox</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/landing.css') }}" rel="stylesheet">
    <style>
        .blog-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 2rem;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 700;
        }
        .post-item {
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid var(--card-border);
        }
        .post-title a {
            color: var(--text-color);
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: 700;
        }
        .post-title a:hover {
            color: var(--primary-color);
        }
        .post-date {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
        .post-excerpt {
            color: #444;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="blog-container">
        <a href="{{ route('landing') }}" class="back-link">&larr; Back to Profile</a>

        <h1 class="mb-5">Ice Hockey Blog</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @forelse ($articles as $article)
            <div class="post-item">
                <div class="post-date text-muted text-sm mb-2">
                    {{ $article->created_at->format('Y.m.d') }}
                </div>
                <h2 class="post-title mb-2">
                    <a href="{{ route('hockey.show', $article) }}">
                        {{ $article->title }}
                    </a>
                </h2>
                <div class="post-excerpt text-secondary">
                    {{ $article->excerpt }}
                </div>
            </div>
        @empty
            <p>No articles yet.</p>
        @endforelse

        {{ $articles->links('pagination::bootstrap-5') }}
    </div>
</body>
</html>
