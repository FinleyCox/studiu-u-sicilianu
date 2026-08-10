<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hockey Blog Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { padding: 20px; background-color: #f8f9fa; }
        .container { max-width: 800px; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Edit Hockey Blog Article</h1>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-secondary btn-sm">Logout</button>
            </form>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.hockey.update', $article) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $article->title) }}" maxlength="255" required>
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug (URL friendly)</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $article->slug) }}" maxlength="255" required>
            </div>

            <div class="mb-3">
                <label for="excerpt" class="form-label">Excerpt</label>
                <textarea class="form-control" id="excerpt" name="excerpt" rows="3" maxlength="500" required>{{ old('excerpt', $article->excerpt) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body (Markdown)</label>
                <textarea class="form-control" id="body" name="body" rows="15" maxlength="20000" required>{{ old('body', $article->body) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Article</button>
            <a href="{{ route('hockey.show', $article) }}" class="btn btn-secondary ms-2">View Article</a>
        </form>
    </div>
</body>
</html>
