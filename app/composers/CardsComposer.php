<?php

use Modules\Product\Entities\Product;
use Modules\Category\Entities\Category;

class CardsComposer
{

    private $site_id;
    private $depth = 1;

    public function compose($view)
    {
        $currentRoute = Route::current();
        $params = $currentRoute->parameters();

        $category = Category::where('id', $params['id'])->first();
        $products = Product::leftJoin('products_category','products.id','=','products_category.product_id')
            ->where('products_category.category_id', $category->id)
            ->orderBy('products.name')
            ->get();

        if(\App::getLocale() != 'pl')
            $langPrefix = \App::getLocale().'_';
        else
            $langPrefix = '';

        //dd($this->getDepth($params['id']));
        $view->with('docsCategory', $category);
        $view->with('moveMobile', $this->getDepth($params['id']).'00%');
        $view->with('products', $products);
        $view->with('langPrefix', $langPrefix);
    }

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

}