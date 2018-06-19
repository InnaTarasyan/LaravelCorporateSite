<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Corp\Repositories\PortfoliosRepository;

class PortfolioController extends SiteController
{

    public function __construct( PortfoliosRepository $p_rep ) {
        parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

        $this->template = env('THEME').'.portfolios';
        $this->p_rep = $p_rep;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->title = 'Портфолио';
        $this->keywords = 'Портфолио';
        $this->meta_desc = 'Портфолио';

        $portfolios = $this->getPortfolios();

        $content = view(env('THEME').'.portfolios_content')->with('portfolios', $portfolios)->render();
        $this->vars = array_add($this->vars, 'content', $content);


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
    public function show($alias = FALSE)
    {
        $portfolio = $this->p_rep->one($alias);

        if(isset($portfolio->id)) {
            $this->title = $portfolio->title;
            $this->keywords = $portfolio->keywords;
            $this->meta_desc  = $portfolio->meta_desc;
        }

        $portfolios = $this->getPortfolios(config('settings.other_portfolios'), FALSE);
        $content = view(env('THEME').'.portfolio_content')->with(['portfolio' => $portfolio, 'portfolios' => $portfolios])->render();
        $this->vars = array_add($this->vars,'content',$content);

        return $this->renderOutput();

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

    public function getPortfolios($take = FALSE, $paginate = TRUE){
        $portfolios = $this->p_rep->get(['title', 'text', 'customer', 'alias', 'img', 'created_at', 'filter_alias'], $take, $paginate);
        if($portfolios){
            $portfolios->load('filter');
        }
        return $portfolios;
    }
}
