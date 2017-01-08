@extends('layouts.article')

@section('title', 'Page Title')


@section('content')
<div class="ui grid grid-with-margin">
  <div class="ui container text">
    <div class="column text">
      @if($article)
      <article class="ui segment">

        <header>
          <h1>{{ $article->title }}</h1>
          <h2>{{ $article->subtitle }}</h2>
          <h3>{{ $article->author_name }} {{ $article->published_at->diffForHumans()}}</h3>
        </header>

        <div class="article-content">
          <img class="ui fluid image" src="{{(!empty($article->article_image))? url(config('blogger.filemanager.upload_path').'/'.$article->article_image): url('images/placeholder.gif')}}" alt="picture">
          {!!html_entity_decode($article->html_content)!!}
        </div>

        <footer>
          disqus
        </footer>

      </article>
      @endif
    </div><!--end of column-->
  </div><!--end of container-->
</div><!--end of grid stackable-->
@endsection
