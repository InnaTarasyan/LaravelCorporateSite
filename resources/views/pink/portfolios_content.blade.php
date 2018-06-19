<!-- START CONTENT -->
<div id="content-page" class="content group">
    <div class="hentry group">

        <div id="portfolio" class="portfolio-big-image">

            @if($portfolios)
                @foreach($portfolios as $portfolio)
                    <div class="hentry work group">
                        <div class="work-thumbnail">
                            <div class="nozoom">
                                <img src="{{ asset(env('THEME')) }}/images/projects/{{ $portfolio->img->max }}" alt="{{$portfolio->title}}" title="{{$portfolio->title}}" />
                                <div class="overlay">
                                    <a class="overlay_img" href="{{ asset(env('THEME')) }}/images/projects/{{ $portfolio->img->max }}" rel="lightbox" title="{{$portfolio->title}}"></a>
                                    <a class="overlay_project" href="{{ route('portfolios.show', ['alias' => $portfolio->alias]) }}"></a>
                                    <span class="overlay_title">{{$portfolio->title}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="work-description">
                            <h3>{{$portfolio->title}}</h3>
                            <p>{{$portfolio->text}}</p>
                            <div class="clear"></div>
                            <div class="work-skillsdate">
                                <p class="skills"><span class="label"> {{Lang::get('ru.skills')}}:</span> {{$portfolio->filter->title}}</p>
                                <p class="workdate"><span class="label">{{Lang::get('ru.customer')}}:</span>{{ $portfolio->customer }}</p>

                                @if($portfolio->created_at)
                                    <p class="workdate"><span class="label">{{Lang::get('ru.year')}}:</span>{{$portfolio->created_at->format('Y')}}</p>

                                @endif
                            </div>
                            <a class="read-more" href="{{ route('portfolios.show', ['alias' => $portfolio->alias]) }}">{{Lang::get('ru.view_project')}}</a>
                        </div>
                        <div class="clear"></div>
                    </div>
                @endforeach
            @endif

        </div>
        <div class="clear"></div>
    </div>

    <div class="general-pagination group">

        @if($portfolios->lastPage() > 1)

            @if($portfolios->currentPage() !== 1)
                <a href="{{ $portfolios->url(($portfolios->currentPage() - 1)) }}">{!! Lang::get('pagination.previous') !!} </a>
            @endif

            @for($i = 1; $i <= $portfolios->lastPage(); $i++)
                @if($portfolios->currentPage() == $i)
                    <a class="selected disabled">{{ $i }}</a>
                @else
                    <a href="{{ $portfolios->url($i) }}">{{ $i }}</a>
                @endif
            @endfor

            @if($portfolios->currentPage() !== $portfolios->lastPage())
                <a href="{{ $portfolios->url(($portfolios->currentPage() + 1)) }}">{!! Lang::get('pagination.next') !!} </a>
            @endif


        @endif
    </div>

    <!-- START COMMENTS -->
    <div id="comments">
    </div>
    <!-- END COMMENTS -->
</div>
<!-- END CONTENT -->