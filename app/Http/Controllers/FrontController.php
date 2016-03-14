<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class FrontController extends Controller
{
    public function index()
    {
        $articles = Article::where('public', '=', 1)->get();
        $categories = Category::all();
        return view('site.index', ['articles' => $articles, 'categories' => $categories]);
    }

    public function show($id)
    {
        $article = Article::where('public', '=', 1)->find($id); //показываем статью если она опубликована
        $category = Category::where('id', '=', $article->category_id)->find($article->category_id);
        return view('site.show', ['article' => $article, 'category' => $category]);
    }
}
