<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Corp\Repositories\ArticlesRepository;
use Corp\Repositories\PortfoliosRepository;

class ArticlesController extends SiteController
{

    public function __construct( PortfoliosRepository $p_rep, ArticlesRepository $a_rep) {
        parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

        $this->bar = 'right';
        $this->template = env('THEME').'.articles';

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
        $articles = $this->getArticles();
        $content = view(env('THEME').'.articles_content')->with('articles', $articles)->render();
        $this->vars = array_add($this->vars, 'content', $content);


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
}

