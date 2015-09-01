<?php

use Modules\Product\Entities\Product;
use Modules\Category\Entities\Category;

class ProductslistComposer
{

    private $site_id;

    public function compose($view)
    {
        $currentRoute = Route::current();
        $params = $currentRoute->parameters();

        $category = Category::where('id', $params['id'])->first();
        $this->site_id = $category->site_id;

        $products = Product::select(['products.name','products.id'])
            ->leftJoin('products_category','products_category.product_id','=','products.id')
            ->where('products_category.category_id', $category->id)->with('gallery')->paginate(6);

        $view->with('products', $products);

        $productNavbar = $this->buildProductsNavbar($category);
        $view->with('productNavbar', $productNavbar);
    }


    private function buildProductsNavbar($category)
    {
        $categories = Category::where('parent', $this->getParentId($category))
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