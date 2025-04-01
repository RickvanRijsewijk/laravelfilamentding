<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUas | {{ $article->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.7;
            color: #333;
            background-color: #f8f9fa;
        }

        .article-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
        }

        .article-header {
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #e9ecef;
        }

        .article-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #212529;
            margin-bottom: 0.75rem;
        }

        .article-meta {
            font-size: 0.95rem;
            color: #6c757d;
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .article-meta i {
            margin-right: 0.5rem;
        }

        .article-meta-item {
            margin-right: 1.5rem;
        }

        .article-category {
            display: inline-block;
            background-color: #e9ecef;
            color: #495057;
            padding: 0.25rem 0.75rem;
            border-radius: 30px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .article-content {
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .article-content p {
            margin-bottom: 1.5rem;
        }

        .article-content img {
            max-width: 100%;
            height: auto;
            margin: 1.5rem 0;
            border-radius: 5px;
        }

        .article-content h2,
        .article-content h3 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .article-content h2 {
            font-size: 1.8rem;
        }

        .article-content h3 {
            font-size: 1.5rem;
        }

        .article-footer {
            margin-top: 3rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e9ecef;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .back-btn:hover {
            background-color: #5a6268;
            color: white;
        }

        .back-btn i {
            margin-right: 0.5rem;
        }

        .load-more-btn {
            display: block;
            width: 100%;
            margin-top: 2rem;
            background-color: #007bff;
            color: white;
            padding: 0.75rem;
            text-align: center;
            border-radius: 5px;
            font-size: 1.1rem;
        }

        .load-more-btn:hover {
            background-color: #0056b3;
            cursor: pointer;
        }

        .other-articles {
            margin-top: 3rem;
        }

        .article-item {
            margin-bottom: 2rem;
        }
    </style>
</head>

<body>
    <x-mainheader />
    <div class="container mt-5 mb-5">
        <div class="article-container">
            <div class="article-header">
                <h1 class="article-title">{{ $article->title }}</h1>
                <div class="article-meta">
                    @if($article->created_at)
                    <div class="article-meta-item">
                        <i class="far fa-calendar-alt"></i> {{ $article->created_at->format('F j, Y') }}
                    </div>
                    @endif

                    @if($article->category)
                    <div class="article-meta-item">
                        <span class="article-category">
                            <i class="fas fa-folder"></i> {{ $article->category->name }}
                        </span>
                    </div>
                    @endif
                </div>
            </div>

            <div class="article-content">
                {!! $article->content !!}
            </div>

            <div class="article-footer">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('home') }}" class="btn back-btn">
                        <i class="fas fa-home"></i> Back to Home
                    </a>
                    @if($article->category)
                    <button id="loadArticlesBtn" class="btn btn-outline-secondary load-more-btn w-50"
                        data-category-id="{{ $article->category->id }}">
                        <i class="fas fa-folder"></i> Meer in {{ $article->category->name }}
                    </button>
                    @endif
                </div>
            </div>



            <div id="otherArticles" class="other-articles" style="display:none;">
                <!-- Other articles will be loaded here -->
            </div>
        </div>
    </div>
    <x-footer />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#loadArticlesBtn').on('click', function() {
            var categoryId = $(this).data('category-id');
            var otherArticles = $('#otherArticles');

            $(this).hide();
            $.ajax({
                url: '/articles/category/' + categoryId,
                method: 'GET',
                success: function(response) {
                    otherArticles.empty();
                    otherArticles.show(); // Show the container before appending

                    response.forEach(function(article, index) {
                        var shortContent = article.content.length > 150 ?
                            article.content.substring(0, 150) + '...' :
                            article.content;

                        var articleItem = $('<div class="article-item"></div>').hide();
                        articleItem.append('<h2>' + article.title + '</h2>');
                        articleItem.append('<p>' + shortContent + '</p>');
                        articleItem.append('<a href="/articles/' + article.slug + '">Lees meer</a>');

                        otherArticles.append(articleItem);

                        // Animate each item with a delay
                        articleItem.delay(200 * index).queue(function(next) {
                            $(this).addClass('animate__animated animate__fadeInUp').show('slow');
                            next();
                        });
                    });
                },
                error: function(error) {
                    console.error("Error fetching articles:", error);
                }
            });
        });
    });
    </script>
</body>

</html>