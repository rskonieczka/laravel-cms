<?php

use Modules\Product\Entities\Product;
use Modules\Category\Entities\Category;

class ProductssingleComposer
{

    private $site_id;
    private $depth = 1;

    public function compose($view)
    {
        $currentRoute = Route::current();
        $params = $currentRoute->parameters();

        $product = Product::where('id', $params['id'])->first();
        $this->site_id = $product->category->first()->site_id;
        $view->with('product', $product);
		$view->with('productCategory', $product->category->first()->id);

        if(\App::getLocale() != 'pl')
            $langPrefix = \App::getLocale().'_';
        else
            $langPrefix = '';

        $productNavbar = $this->buildProductsNavbar($product);
        $view->with('moveMobile', $this->getDepth($product->category->first()->id).'00%');
        $view->with('productNavbar', $productNavbar);
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


    private function buildProductsNavbar($product)
    {
        $categories = Category::where('parent', $this->getParentId($product->category->first()))
            ->where(array('hide' => 0, 'site_id' => $this->site_id, 'lang' => \App::getLocale()))
            ->orderBy('weight')->get();
        foreach ($categories as $category) {
            $category->childs = Category::where('parent', $category->id)->orderBy('weight')->get();
            $category->products = Product::leftJoin('products_category','products.id','=','products_category.product_id')
                ->where('products_category.category_id', $category->id)->orderBy('products.name')->get();
            foreach($category->childs as $child){
                $child->products = Product::leftJoin('products_category','products.id','=','products_category.product_id')
                    ->where('products_category.category_id', $child->id)->orderBy('products.name')->get();
            }
        }
        return $categories;
    }

    private function getParentId($category)
    {
        if ($category->parent == 0) {
            return $category->id;
        } else {
            return $this->getNextParent($category->parent);
        }
    }

    private function getNextParent($parentId)
    {
        $category = Category::where('id', $parentId)
            ->where(array('hide' => 0, 'site_id' => $this->site_id, 'lang' => \App::getLocale()))->first();

        if ($category->parent) {
            return $this->getNextParent($category->parent);
        } else {
            return $category->id;
        }
    }

}