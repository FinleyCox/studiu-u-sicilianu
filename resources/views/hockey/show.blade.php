<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }} - Finley Cox</title>
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
        .comments-section {
            margin-top: 4rem;
            border-top: 1px solid var(--card-border);
            padding-top: 2rem;
        }
        .comment-item {
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--card-border);
        }
        .comment-author {
            font-weight: 700;
        }
        .comment-date {
            color: #666;
            font-size: 0.85rem;
            margin-bottom: 0.5rem;
        }
        .comment-body {
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        .comment-form textarea, .comment-form input[type="text"] {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            box-sizing: border-box;
        }
        /* Honeypot: visually hidden from real users, left in the tab/DOM flow for bots that don't render CSS */
        .honeypot-field {
            position: absolute;
            left: -9999px;
            top: -9999px;
        }
        .alert {
            padding: 0.75rem 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
        .alert-success {
            background: #d1e7dd;
            color: #0f5132;
        }
        .alert-danger {
            background: #f8d7da;
            color: #842029;
        }
    </style>
</head>
<body>
    <div class="blog-container">
        <a href="{{ route('hockey.index') }}" class="back-link">&larr; Back to Blog List</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <article>
            <div class="article-header">
                <h1 class="article-title">{{ $article->title }}</h1>
                <div class="article-date">
                    {{ $article->created_at->format('Y.m.d') }}
                </div>
                @if (auth()->user()?->is_admin)
                    <div class="mt-2">
                        <a href="{{ route('admin.hockey.edit', $article) }}">Edit this article</a>
                    </div>
                @endif
            </div>

            <div class="article-content">
                {!! Str::markdown($article->body, ['html_input' => 'strip', 'allow_unsafe_links' => false]) !!}
            </div>
        </article>

        <section class="comments-section">
            <h2>Comments ({{ $article->comments->count() }})</h2>

            @forelse ($article->comments as $comment)
                <div class="comment-item">
                    <div class="comment-date">
                        <span class="comment-author">{{ $comment->author_name }}</span>
                        &middot; {{ $comment->created_at->format('Y.m.d H:i') }}
                    </div>
                    <div class="comment-body">{{ $comment->body }}</div>

                    @if (auth()->user()?->is_admin)
                        <form action="{{ route('admin.hockey.comments.destroy', $comment) }}" method="POST" onsubmit="return confirm('Delete this comment?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    @endif
                </div>
            @empty
                <p>No comments yet. Be the first to comment!</p>
            @endforelse

            <h3 class="mt-4">Leave a comment</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="comment-form" action="{{ route('hockey.comments.store', $article) }}" method="POST">
                @csrf

                <label for="author_name">Name</label>
                <input type="text" id="author_name" name="author_name" maxlength="100" required value="{{ old('author_name') }}">

                <label for="body">Comment</label>
                <textarea id="body" name="body" rows="4" maxlength="2000" required>{{ old('body') }}</textarea>

                {{-- Honeypot field: real visitors never see or fill this in --}}
                <div class="honeypot-field" aria-hidden="true">
                    <label for="website">Website</label>
                    <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                </div>

                <input type="hidden" name="comment_form_rendered_at" value="{{ now()->timestamp }}">

                <button type="submit">Post Comment</button>
            </form>
        </section>
    </div>
</body>
</html>
