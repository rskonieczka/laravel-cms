<?php

namespace App\Controllers;

use Modules\Post\Entities\Post;
use Modules\Gallery\Entities\Gallery;
Use Modules\Site\Entities\Site;
Use Modules\Category\Entities\Category;
Use Modules\Text\Entities\Text;
Use Modules\Knowledge\Entities\Knowledge;
use Modules\Product\Entities\Product;
use View, Response, Slugify, Route;

class FrontController extends \Controller
{
    private $theme;
    private $slug;
    private $category;
    private $site_id;
    private $crumbsParent = 0;

    public function __construct()
    {
        $this->getCurrentSite();
        View::addLocation(app('path') . '/themes/' . $this->theme);
        View::addNamespace('theme', app('path') . '/themes/' . $this->theme);
    }

    private function getAsseticKey(){
        if(!\File::exists(base_path().'/.assetic')){
            \File::put(base_path().'/.assetic', str_random(5));
        }
        $key = \File::get(base_path().'/.assetic');

        return $key;
    }

    private function checkRedirect($key){
        $routes = array(
            'karty-techniczne-i-bezpieczenstwa' => 'dokument/26/szpachlowki',
            'technical-and-safety-data-sheets' => 'document/450/putties',
            'technical-and-safety-data-sheets-ru' => 'document/450/putties',
            'dokumentacja' => 'document/26/szpachlowki',
        );
        if(isset($routes[$key]) && !empty($routes[$key])){
            return \Redirect::to($routes[$key]);
        }
        return false;
    }

    private function loadPage()
    {
        $this->getFromSlug();
        $this->getTexts();
        $this->getPosts();
        $this->getAsseticKey();
        $this->buildMainNavbar();
        $this->buildSubNavbar();
        $this->cardsSubnavbar();
        $this->getCategoryComposer();
        $this->bindLayoutComposers();
        $this->getGalleries();
        $this->getCrumbs();
        $this->getAsseticKey();
    }

    public function index($slug = false, $id = false)
    {
        $this->slug = $slug;
        if($res = $this->checkRedirect($slug)){
            return $res;
        }
        $this->loadPage();
        $currentFullLang = \App::getLocale();
        $currentFullLang = trans('common.navbar_' . $currentFullLang . '_long');

        $this->category->template_file = str_replace($this->theme . '.', '', $this->category->template_file);

        $depthMobile = $this->getDepth($this->category->id);

        if(\App::getLocale() != 'pl')
            $langPrefix = \App::getLocale().'/';
        else
            $langPrefix = '';

        return View::make("theme::templates.{$this->category->template_file}")
            ->with('category', $this->category)->with('currentFullLang', $currentFullLang)->with('assetVersion', $this->getAsseticKey())
            ->with('moveMobile', $depthMobile.'00%')->with('metaTitle', $this->category->name)->with('langPrefix', $langPrefix);
    }

    private function getCategoryComposer()
    {
        $this->category->template_file = str_replace($this->theme . '.', '', $this->category->template_file);
        $composerName = str_replace('.', '', $this->category->template_file);
        $composerName = ucfirst($composerName) . 'Composer';

        if (\File::exists(app_path() . '/composers/' . $composerName . '.php')) {
            View::composer("theme::templates.{$this->category->template_file}", $composerName);
        }
    }

    private function bindLayoutComposers()
    {
        View::composer('theme::includes.mainfooter', function ($view) {
            $footerPosts = Post::orderBy('created_at', 'desc')->take(8)->get();
            $view->with('footerPosts', $footerPosts);
        });
    }

    private function getFromSlug()
    {
        if (!$this->slug)
            $this->slug = '/';

        $this->category = Category::where(array('slug' => $this->slug, 'site_id' => $this->site_id, 'lang' => \App::getLocale()))->firstOrFail();
        $this->checkRightToView();
    }

    private function getCrumbs()
    {
        $crumbs[] = $this->bulidCrumbs();
        if ($this->category->parent != 0) {
            foreach ($this->getRecursiveCrumbs($this->category->parent) as $recursive) {
                if (is_array($recursive)) {
                    $crumbs = array_merge($crumbs, $recursive);
                }
            }
        }
        $crumbs[] = "<li><a href='" . \URL::to(\Lang::get('interface.homesite_link')) . "'>" . \Lang::get('interface.homesite') . "</a></li>";
        $crumbs = array_reverse($crumbs);
        $crumbs = implode(" ", $crumbs);
        $this->category->breadcrumbs = "<ol class='breadcrumb'>{$crumbs}</ol>";
    }

    private function bulidCrumbs()
    {
        $currentRoute = Route::current();
        $params = $currentRoute->parameters();

        if ($this->category->template_file == "news.single") {
            $post = Post::where('id', $params['id'])->first();
            return "<li>" . $post->title . "</li>";
        } elseif ($this->category->template_file == "knowledge") {
            $knowledge = Knowledge::where('id', $params['id'])->first();
            return "<li>" . $knowledge->title . "</li>";
        }elseif ($this->category->template_file == "products.list") {
            $category = Category::where('id', $params['id'])->first();
            return "<li>" . $category->name . "</li>";
        } elseif ($this->category->template_file == "products.single") {
            $product = Product::select(['products.name','products.id', 'categories.name as category_name'
                , 'categories.id as category_id', 'categories.slug', 'categories.parent as parent_id'])
                ->leftJoin('products_category','products_category.product_id','=','products.id')
                ->leftJoin('categories','categories.id','=','products_category.category_id')
                ->where('products.id', $params['id'])->with('gallery')->first();
            if($product->parent_id != 0){
                $this->crumbsParent = $product->parent_id;
            }
            return "<li><a href='" . \URL::to(\Lang::get('routes.professional_products').$product->category_id.'/'.$product->slug) . "'>" .$product->category_name. "</a></li><li>" . $product->name . "</li>";
        } else {
            return "<li>" . $this->category->name . "</li>";
        }
    }

    private function getRecursiveCrumbs($categoryId)
    {
        $category = Category::where('id', $categoryId)->first();
        $categoryArr[] = "<li><a href='".\URL::to($category->slug)."'>{$category->name}</a></li>";

        if ($category->parent != 0) {
            $category2 = Category::where('id', $category->parent)->first();
            $categoryArr[] = "<li><a href='".\URL::to($category2->slug)."'>{$category2->name}</a></li>";
        }
        return $categoryArr;
    }


    private function checkRightToView()
    {
        if ($this->category->groups->isEmpty())
            return true;

        $user = \Sentry::getUser();
        // Guest - not logged
        if (!$user) {
            return \App::abort(403, 'Unauthorized action.');
        }
        $user_groups = $user->groups->toArray();
        foreach ($user_groups as $group) {
            if (in_array($group['id'], $this->category->groups->lists('id')))
                return true;
        }
        return \App::abort(403, 'Unauthorized action.');
    }

    private function getTexts()
    {
        $categoryTexts = Text::where('category_id', $this->category->id)->orderBy('weight')->get();

        if ($categoryTexts->isEmpty()) {
            $this->category->texts = null;
            return false;
        }
        $this->category->texts = new \stdClass();
        foreach ($categoryTexts as $text) {
            $key = $text->key;
            $this->category->texts->$key = $text;
        }
    }

    private function getGalleries()
    {
        $categoryGalleries = Gallery::where('category_id', $this->category->id)->orderBy('created_at')->get();
        if ($categoryGalleries->isEmpty()) {
            $this->category->galleries = null;
            return false;
        }
        $this->category->galleries = new  \stdClass();
        foreach ($categoryGalleries as $gallery) {
            $key = $gallery->key;
            $this->category->galleries->$key = $gallery->media;
        }
    }

    private function getPosts()
    {
        $this->category->posts = Post::where('category_id', $this->category->id)->orderBy('created_at', 'desc')->get();
    }

    private function getCurrentSite()
    {
        $site = Site::where('domain', \Request::getHost())->first();
        if (!isset($site)) {
            $site = Site::first();
        }
        $this->site_id = $site->id;
        $this->theme = $site->theme;
    }

    protected function buildMainNavbar()
    {
        $navbar = $this->getNavbarItems(0);
        $this->category->navbar = $navbar;
    }

    private function getNavbarItems($parentId = 0)
    {
        if ($user = \Sentry::getUser()) {
            $userGroupsIds = $user->getGroups()->lists('id');
        } else {
            $userGroupsIds = array();
        }

        $categories = Category::leftJoin('categories_groups', 'categories.id', '=', 'categories_groups.category_id')
            ->where('categories.parent', $parentId)
            ->where(function ($query) use ($userGroupsIds) {
                $query->whereIn('categories_groups.group_id', $userGroupsIds)
                    ->orWhere('categories_groups.group_id', null);
            })
            ->where(array('categories.hide' => 0, 'categories.site_id' => $this->site_id, 'lang' => \App::getLocale()))
            ->select('categories.*')
            ->orderBy('categories.weight')->get();

        foreach ($categories as $category) {
            if (Category::where('parent', $category->id)->count() > 0) {
                $category->childs = $this->getNavbarItems($category->id);
            }else{
                $category->products = Product::leftJoin('products_category','products.id','=','products_category.product_id')
                    ->where('products_category.category_id', $category->id)->orderBy('products.name')->get();
            }
        }
        return $categories;
    }

    private $depth = 0;

    public function getDepth($findId = 0)
    {
        $category = Category::where('id', $findId)->first();
        if($category->parent != 0){
            $this->getParentToDepth($category->parent);
        }
        return $this->depth;
    }

    public function getParentToDepth($categoryId)
    {
        $this->depth = $this->depth + 1;
        $category = Category::where('id', $categoryId)->first();
        if($category->parent != 0){
            return $this->getParentToDepth($category->parent);
        }
    }

    private function getParentId()
    {
        if ($this->category->parent == 0) {
            return $this->category->id;
        } else {
            return $this->getNextParent($this->category->parent);
        }
    }

    private function getNextParent($parentId)
    {
        $category = Category::where('id', $parentId)
            ->where(array('hide' => 0, 'site_id' => $this->site_id, 'lang' => \App::getLocale()))->first();


		if(!$category)
			return $parentId;
		
        if ($category->parent) {
            return $this->getNextParent($category->parent);
        } else {
            return $category->id;
        }
    }

    private function buildSubNavbar()
    {
        //@todo dorobic do backendu budowanie sidebaru
        $categoryId = $this->getParentId();
        if($this->category->slug == 'dokument'){
            $categoryId = '22';
        }
        $categories = Category::where('parent', $categoryId)
            ->where(array('hide' => 0, 'site_id' => $this->site_id, 'lang' => \App::getLocale()))
            ->orderBy('weight')->get();

        foreach ($categories as $category) {
            $category->childs = Category::where('parent', $category->id)->orderBy('weight')->get();
            $knowledges = Knowledge::where('category_id', $category->id)->get();

            if (count($knowledges) > 0) {
                $category->knowledges = $knowledges;
            } else {
                $category->knowledges = null;
            }

            foreach ($category->childs as $category2) {
                $category2->childs = Category::where('parent', $category2->id)->orderBy('weight')->get();
            }

        }
        $this->category->subnavbar = $categories;
    }

    private function cardsSubnavbar()
    {
        //@todo dorobic do backendu budowanie sidebaru
        $categoryId = '22';
        $categories = Category::where('parent', $categoryId)
            ->where(array('hide' => 0, 'site_id' => $this->site_id, 'lang' => \App::getLocale()))
            ->orderBy('weight')->get();

        foreach ($categories as $category) {
            $category->childs = Category::where('parent', $category->id)->orderBy('weight')->get();
            $knowledges = Knowledge::where('category_id', $category->id)->get();

            if (count($knowledges) > 0) {
                $category->knowledges = $knowledges;
            } else {
                $category->knowledges = null;
            }

            foreach ($category->childs as $category2) {
                $category2->childs = Category::where('parent', $category2->id)->orderBy('weight')->get();
            }

        }
        $this->category->cardsSubnavbar = $categories;
    }

    public function showError()
    {
        return Response::view('theme::errors.missing', array(), 404);
    }

}
