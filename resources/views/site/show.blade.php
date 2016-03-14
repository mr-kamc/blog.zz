@extends('site.main')
@section('content')
    <h2>{{$article->title}}</h2>
    <small>Дата статьи: {{$article->updated_at}}</small>
    <div>
        {{$article->content}}
    </div>
    <div>
        @if ($category->title)
            {{$category->title}}
        @endif
    </div>
    @endsection

    </body>
    </html>
