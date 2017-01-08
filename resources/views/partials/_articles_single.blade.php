<div class="ui grid grid-with-margin">
<div class="ui container text">
  <div class="column">
    @foreach($articles as $article)
      <div class="ui card blogger-card fluid teal">
        <div class="content">

          <div class="right floated meta">{{ $article->published_at->diffForHumans()}}</div>
          <a href=""><img class="ui avatar mini image" src="{{(!empty($article->author->avatar))? url('images/avatars/'.$article->author->avatar) : url('images/avatars/avatar_default.png')}}"> {{$article->author_name}} {{ $article->author->job}}</a>

        </div>

        <div class="content">
          <div class="ui fluid image">
                @if(Auth::check())
                <a class="ui right  teal corner label favorite" href="javascript:void(0)" data-id="{{ $article->id }}" data-content="Add to favorites" data-variation="inverted">
                  <i class="{{($article->isFavorited())? 'yellow active ': 'white '}}star icon"></i>
                </a>
                @endif
                <a href="{{url('/blog/'.$article->slug)}}">
                  <img class="ui fluid image lazy hoverable " data-original="{{(!empty($article->article_image))? url(config('blogger.filemanager.upload_path').'/'.$article->article_image): url('images/placeholder.gif')}}"
                  src="images/placeholder.gif" height="480" width="640" alt="picture">
                  <noscript>
                    <img class="ui fluid image hoverable" height="480" width="640" src="{{(!empty($article->article_image))? url(config('blogger.filemanager.upload_path').'/'.$article->article_image): url('images/placeholder.gif')}}">
                  </noscript>
                </a>
        </div>
        <h3><a href="{{url('/blog/'.$article->slug)}}">{{$article->title}}</a></h3>
      </div>
        <div class="extra content">
          <i class="share icon"></i> Share via:
          @include('partials._share_buttons')
        </div>
    </div>

    @endforeach
    <div class="ui card blogger-card fluid no-box-shadow text-center">
      {{ $articles->links() }}
    </div>

    <div class="ui card blogger-card fluid ">
      <div class="ui content text-center brand-teal">
      @include('partials._subscribe')
      </div>
    </div>
  </div>

</div>
</div>
