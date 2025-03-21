<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $categories = Category::with('articles')->get();
        return view('components.mainheader', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->category_id = $request->category_id;
        $article->save();

        return redirect()->route('articles.show', $article->slug);
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('articles.show', compact('article'));
    }

    public function someMethod()
    {
        $articles = Article::with('category')->get()->groupBy('category.name');
        return view('your-view', compact('articles'));
    }

    public function getArticlesByCategory($category_id)
    {
        $articles = Article::where('category_id', $category_id)->get();
        return response()->json($articles);
    }
}
