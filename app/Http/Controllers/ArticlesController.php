<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.articles', ['articles' => $articles]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', ['categories' => $categories]);
    }

    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::all();
        return view('admin.articles.edit', ['article' => $article, 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        Article::createPrev($request);
        return back()->with('message', 'Статья добавлена');
    }

    public function update(Request $request, $id)
    {
        Article::updatePrev($request, $id);
        return back()->with('message', 'Статья изменена');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delPrev($id);
        $article->delete();
        return back()->with('message', 'Статья удалена');
    }
}
