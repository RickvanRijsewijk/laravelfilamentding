<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        @foreach ($categories as $category)
            <div class="card mb-3">
                <div class="card-header">
                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#category-{{ $category->id }}">
                        {{ $category->name }}
                    </button>
                </div>
                <div id="category-{{ $category->id }}" class="collapse">
                    <div class="card-body">
                        @foreach ($category->articles as $article)
                            <h5>{{ $article->title }}</h5>
                            <p>{{ $article->content }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>