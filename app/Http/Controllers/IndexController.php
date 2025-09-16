<?php

namespace Corp\Http\Controllers;

use Corp\Repositories\ArticlesRepository;
use Corp\Repositories\PortfoliosRepository;
use Corp\Repositories\SlidersRepository;
use Illuminate\Http\Request;

use Config;


class IndexController extends SiteController
{
    public function __construct(SlidersRepository $s_rep, PortfoliosRepository $p_rep, ArticlesRepository $a_rep) {
       parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

       $this->bar = 'right';
       $this->template = env('THEME').'.index';

       $this->s_rep = $s_rep;
       $this->p_rep = $p_rep;
       $this->a_rep = $a_rep;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio = $this->getPortfolio();

        $sliderItems = $this->getSliders();

        $slider = view(env('THEME').'.slider')->with('sliders', $sliderItems)->render();
        $this->vars = array_add($this->vars, 'slider', $slider);

        $content = view(env('THEME').'.content')->with('portfolios', $portfolio)->render();
        $this->vars = array_add($this->vars, 'content', $content);

        $articles = $this->getArticles();
        $this->contentRightBar = view(env('THEME').'.indexBar')->with('articles', $articles)->render();

        $this->title = 'Home';
        $this->keywords = 'Home';
        $this->meta_desc = 'Home';

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getSliders(){
       $sliders = $this->s_rep->get();

        if($sliders === false || $sliders->isEmpty()) {
            return FALSE;
        }

        $sliders->transform(function($item,$key) {
            $item->img = Config::get('settings.slider_path').'/'.$item->img;
            return $item;
        });

        return $sliders;
    }

    protected function getPortfolio(){
        $portfolio = $this->p_rep->get('*', Config::get('settings.home_port_count'));
        return $portfolio;
    }

    public function getArticles(){
        $articles = $this->a_rep->get(['title', 'created_at', 'img', 'alias'], Config::get('settings.home_articles_count'));
        return $articles;
    }
}
