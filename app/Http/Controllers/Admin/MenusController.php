<?php

namespace Corp\Http\Controllers\Admin;

use Corp\Repositories\ArticlesRepository;
use Corp\Repositories\MenusRepository;
use Corp\Repositories\PortfoliosRepository;
use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Category;
use Corp\Http\Requests\MenusRequest;


class MenusController extends AdminController
{
    private  $m_rep;
    public function __construct(MenusRepository $m_rep, ArticlesRepository $a_rep, PortfoliosRepository $p_rep){
        parent::__construct();

        $this->m_rep = $m_rep;
        $this->a_rep = $a_rep;
        $this->p_rep = $p_rep;
        $this->template = env('THEME').'.admin.menus';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->title = 'Редактирование Меню!';

        $menus = $this->getMenus();

        $this->content = view(env('THEME').'.admin.menus_content')
            ->with(['menus' => $menus])->render();
        $this->vars = array_add($this->vars, 'content', $this->content);

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->title = 'Новый пункт меню!';
        $tmp = $menus = $this->getMenus()->roots();
        $menus = $tmp->reduce(function ($returnMenus, $menu){
            $returnMenus[$menu->id] = $menu->title;
            return $returnMenus;
        }, ['0' => 'Родительский пункт меню']);

        $categories = Category::select(['id', 'title', 'alias', 'parent_id'])->get();

        $list = array();
        $list = array_add($list, '0', 'Не используется!');
        $list = array_add($list, 'parent', 'Раздел Блог!');

        foreach ($categories as $category){
            if($category->parent_id == 0){
                $list[$category->title] = array();
            } else {
                $list[$categories->where('id', $category->parent_id)->first()->title][$category->alias] = $category->title;
            }
        }

        $articles = $this->getArticles();
        $articles = $articles->reduce(function ($returnArticles, $article){
            $returnArticles[$article->alias] = $article->title;
            return $returnArticles;
        }, ['0' => 'Не используется!']);

        $filters = $this->getFilters();
        $filters = $filters->reduce(function ($returnFilters, $filter){
            $returnFilters[$filter->alias] = $filter->title;
            return $returnFilters;
        }, ['0' => 'Не используется', 'parent' => 'Раздел Портфолио']);

        $portfolios = $this->getPortfolios();
        $portfolios = $portfolios->reduce(function ($returnPortfolios, $portfolio){
            $returnPortfolios[$portfolio->alias] = $portfolio->title;
            return $returnPortfolios;
        }, ['0' => 'Не используется!']);

        $this->content =  view(env('THEME').'.admin.menus_create_content')
            ->with(['menus' => $menus, 'categories' => $list, 'articles' => $articles, 'filters' => $filters, 'portfolios' => $portfolios])->render();
        $this->vars = array_add($this->vars, 'content', $this->content);
        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenusRequest $request)
    {
        $result = $this->m_rep->addMenu($request);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('/admin')->with($result);
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
    public function edit(\Corp\Menu $menu)
    {
        $this->title = 'Редактирование ссылки - '.$menu->title;
        $type = FALSE;
        $option = FALSE;

        $route = app('router')->getRoutes()->match(app('request')->create($menu->path));
        $aliasRoute = $route->getName();
        $parameters = $route->parameters();

        if($aliasRoute == 'articles.index' || $aliasRoute == 'articlesCat'){
            $type = 'blogLink';
            $option = isset($parameters['cat_alias']) ? $parameters['cat_alias'] : 'parent';
        } else if($aliasRoute == 'articles.show'){
            $type = 'blogLink';
            $option = isset($parameters['alias']) ? $parameters['alias'] : '';
        } else if($aliasRoute == 'portfolios.index'){
            $type = 'portfolioLink';
            $option = 'parent';
        } else if($aliasRoute == 'portfolios.show'){
            $type = 'portfolioLink';
            $option =  isset($parameters['alias']) ? $parameters['alias'] : '';
        } else {
            $type = 'customLink';
        }



        $tmp = $menus = $this->getMenus()->roots();
        $menus = $tmp->reduce(function ($returnMenus, $menu){
            $returnMenus[$menu->id] = $menu->title;
            return $returnMenus;
        }, ['0' => 'Родительский пункт меню']);

        $categories = Category::select(['id', 'title', 'alias', 'parent_id'])->get();

        $list = array();
        $list = array_add($list, '0', 'Не используется!');
        $list = array_add($list, 'parent', 'Раздел Блог!');

        foreach ($categories as $category){
            if($category->parent_id == 0){
                $list[$category->title] = array();
            } else {
                $list[$categories->where('id', $category->parent_id)->first()->title][$category->alias] = $category->title;
            }
        }

        $articles = $this->getArticles();
        $articles = $articles->reduce(function ($returnArticles, $article){
            $returnArticles[$article->alias] = $article->title;
            return $returnArticles;
        }, ['0' => 'Не используется!']);

        $filters = $this->getFilters();
        $filters = $filters->reduce(function ($returnFilters, $filter){
            $returnFilters[$filter->alias] = $filter->title;
            return $returnFilters;
        }, ['0' => 'Не используется', 'parent' => 'Раздел Портфолио']);

        $portfolios = $this->getPortfolios();
        $portfolios = $portfolios->reduce(function ($returnPortfolios, $portfolio){
            $returnPortfolios[$portfolio->alias] = $portfolio->title;
            return $returnPortfolios;
        }, ['0' => 'Не используется!']);

        $this->content =  view(env('THEME').'.admin.menus_create_content')
            ->with([
                'menu' => $menu,
                'type' => $type,
                'option' => $option,
                'menus' => $menus,
                'categories' => $list,
                'articles' => $articles,
                'filters' => $filters,
                'portfolios' => $portfolios])
            ->render();
        $this->vars = array_add($this->vars, 'content', $this->content);
        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \Corp\Menu $menu)
    {
        $result = $this->m_rep->updateMenu($request, $menu);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('/admin')->with($result);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\Corp\Menu $menu)
    {
        $result = $this->m_rep->deleteMenu($menu);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('/admin')->with($result);
    }

    public function getMenus()
    {
       $menus =  $this->m_rep->get();
       if($menus->isEmpty()){
           return FALSE;
       }
       else {
           return \Menu::make('forAdminMenus', function ($menu) use ($menus) {
               foreach ($menus  as $value){
                   if($value->parent == 0){
                       $menu->add($value->title, $value->path)->id($value->id);
                   } else {
                      if($menu->find($value->parent)){
                          $menu->find($value->parent)->add($value->title, $value->path)->id($value->id);
                      }
                   }
               }
           });
       }
    }

    public function getArticles()
    {
        return $this->a_rep->get(['id', 'title', 'alias']);
    }

    public function getFilters()
    {
        return \Corp\Filter::select('id', 'title', 'alias')->get();
    }

    public function getPortfolios()
    {
        return $this->p_rep->get(['id', 'alias', 'title']);
    }
}
