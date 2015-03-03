<?php

use Modules\Panel\Entities\Panel as Panel;
use Modules\Category\Entities\Category as Category;

class PanelsComposer {

    public function compose($view)
    {
        /*$currentRoute = Route::current();
        $params = $currentRoute->parameters();*/

        $panels = Panel::leftJoin('categories','panels.category_id','=','categories.id')->get();
        $view->with('panels', $panels);

        $panelsCategories = Category::where('parent', 15)->orderBy('weight')->get();
        $view->with('panelsCategories', $panelsCategories);
    }

}