<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = ['title', 'content', 'preview', 'meta_description',
        'meta_keywords', 'category_id', 'comments_enable', 'public'];

    public static function createPrev($request)
    {

        if ($request->hasFile('preview')) //определение, загружался ли файл в запросе
        {
            $date = date('d.m.Y'); //определение текущей даты
            $root = __DIR__ . '/../public/images/'; //корневая папка для загрузки картинок
            if (!file_exists($root . $date)) {
                mkdir($root . $date);
            } // если папка с датой не существует, то создаем ее
            $fileName = $request->file('preview')->getClientOriginalName();//определяем имя файла
            $request->file('preview')->move($root . $date, $fileName); //перемещаем файл в папку
            $all = $request->all(); //в переменой $all будет массив, который содержит все введенные данные в форме
            $all['preview'] = "/images/" . $date . "/" . $fileName;// меняем значение preview на нашу ссылку
            Article::create($all); //сохраняем массив в базу
        } else {
            Article::create($request->all()); // если картинка не передана, то сохраняем запрос, как есть.
        }
    }

    public static function updatePrev(Request $request, $id)
    {
        $article = Article::find($id);
        if ($request->hasFile('preview')) //Проверяем была ли передана картинка, ведь статья может быть и без картинки.
        {
            $date = date('d.m.Y'); //определение текущей даты
            $root = __DIR__ . '/../public/images/'; //корневая папка для загрузки картинок
            if (!file_exists($root . $date)) {
                mkdir($root . $date);
            } // если папка с датой не существует, то создаем ее
            $fileName = $request->file('preview')->getClientOriginalName();//определяем имя файла
            $request->file('preview')->move($root . $date, $fileName); //перемещаем файл в папку
            $all = $request->all(); //в переменой $all будет массив, который содержит все введенные данные в форме
            $all['preview'] = "/images/" . $date . "/" . $fileName;// меняем значение preview на нашу ссылку
            $article->update($all);
        } else {
            $article->update($request->all());
        }
    }

    public function delPrev($id)
    {
        $article = Article::find($id);
        $root = $_SERVER['DOCUMENT_ROOT'];
        if (!empty($article->preview)) {
            unlink($root . $article->preview); //удаляем превьюшку
        }
    }
}
