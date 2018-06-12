<div class="widget-first widget recent-posts">
    <h3>{{Lang::get('ru.latest_projects')}}</h3>
    <div class="recent-post group">
        @if($portfolios)
            @foreach($portfolios as $portfolio)
                <div class="hentry-post group">
                    <div class="thumb-img"><img style="width: 55px" src="{{ asset(env('THEME')) }}/images/projects/{{$portfolio->img->mini}}" alt="{{ $portfolio->title }}" title="{{ $portfolio->title }}" /></div>
                    <div class="text">
                        <a href="{{route('portfolios.show', ['alias' => $portfolio->alias])}}" title="{{ $portfolio->title }}!" class="title">{{ $portfolio->title }}</a>
                        <p>{!! str_limit($portfolio->text, 130) !!}</p>
                        <a class="read-more" href="{{route('portfolios.show', ['alias' => $portfolio->filter_alias])}}">&rarr; {{ Lang::get('ru.read_more') }}</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<div class="widget-last widget recent-comments">
    <h3>{{Lang::get('ru.latest_comments')}}</h3>
    <div class="recent-post recent-comments group">
        @if($comments)
            @foreach($comments as $comment)
                <div class="the-post group">
                    <div class="avatar">
                        <img alt="" src="{{ asset(env('THEME')) }}/images/avatar/unknow55.png" class="avatar" />
                    </div>
                    <span class="author"><strong><a href="mailto:no-email@i-am-anonymous.not"></a></strong> in</span>
                    <a class="title" href="article.html">Nice &amp; Clean. The best for your blog!</a>
                    <p class="comment">
                        hi <a class="goto" href="article.html">&#187;</a>
                    </p>
                </div>
            @endforeach
        @endif
    </div>
</div>
