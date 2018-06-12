<?php

namespace Corp\Http\Controllers;

use Corp\Repositories\CommentsRepository;
use Illuminate\Http\Request;
use Corp\Repositories\ArticlesRepository;
use Corp\Repositories\PortfoliosRepository;

class ArticlesController extends SiteController
{

    public function __construct( PortfoliosRepository $p_rep, ArticlesRepository $a_rep, CommentsRepository $c_rep) {
        parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

        $this->bar = 'right';
        $this->template = env('THEME').'.articles';

        $this->p_rep = $p_rep;
        $this->a_rep = $a_rep;

        $this->c_rep = $c_rep;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->getArticles();
        $content = view(env('THEME').'.articles_content')->with('articles', $articles)->render();
        $this->vars = array_add($this->vars, 'content', $content);

        $comments = $this->getComments(config('settings.recent_comments'));
        $portfolios =  $this->getPortfolios(config('settings.recent_portfolios'));

        $this->contentRightBar =  view(env('THEME').'.articlesBar')->with([ 'comments' => $comments, 'portfolios' => $portfolios])->render();

        return $this->renderOutput();
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

    public function getArticles($alias = FALSE){
        $articles = $this->a_rep->get(['id', 'title', 'alias', 'img', 'created_at', 'desc', 'user_id', 'category_id'], FALSE, TRUE);
        if($articles){
           // $articles->load('user', 'category', 'comments');
        }
        return $articles;
    }

    public function getComments($take){
        $comments = $this->c_rep->get(['text', 'name', 'email', 'site', 'article_id', 'user_id' ], $take);
        return $comments;
    }

    public function getPortfolios($take){
        $portfolios = $this->p_rep->get(['title', 'text', 'customer', 'alias', 'img', 'filter_alias'], $take);
        return $portfolios;
    }
}

