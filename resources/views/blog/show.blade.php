<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - Finley Cox</title>
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
        .article-header {
            margin-bottom: 3rem;
            text-align: center;
        }
        .article-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        .article-date {
            color: #666;
        }
        .article-content {
            line-height: 1.8;
            font-size: 1.1rem;
        }
        .article-content h1, .article-content h2, .article-content h3 {
            margin-top: 2rem;
            margin-bottom: 1rem;
        }
        .article-content p {
            margin-bottom: 1.5rem;
        }
        .article-content pre {
            background: #f4f4f4;
            padding: 1rem;
            border-radius: 4px;
            overflow-x: auto;
        }
        @media (prefers-color-scheme: dark) {
            .article-content pre {
                background: #2d2d2d;
            }
        }
    </style>
</head>
<body>
    <div class="blog-container">
        <a href="{{ route('blog.index') }}" class="back-link">&larr; Back to Blog List</a>
        
        <article>
            <div class="article-header">
                <h1 class="article-title">{{ $post->title }}</h1>
                <div class="article-date">
                    {{ \Carbon\Carbon::parse($post->date)->format('Y.m.d') }}
                </div>
            </div>

            <div class="article-content">
                {!! Str::markdown($post->body) !!}
            </div>
        </article>
    </div>
</body>
</html>
