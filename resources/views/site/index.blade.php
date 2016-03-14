@extends('site.main')
@section('content')
    @foreach($articles as $article)
        <h2><a href="{{action('FrontController@show',['id'=>$article->id])}}">{{$article->title}}</a></h2>
        <small>Дата статьи: {{$article->updated_at}}</small>
        <div>
            <img src="{{$article->preview}}">{{str_limit($article->content, 150)}}

        </div>
    @endforeach
@endsection

</body>
</html>