<?php

use Modules\Panel\Entities\Panel;
use Modules\People\Entities\People;
use Modules\Category\Entities\Category;
use \Redirect, \Input, \Sentry;

class LandingComposer
{

    public function compose($view)
    {

        $panels = Panel::leftJoin('categories', 'panels.category_id', '=', 'categories.id')->get();
        $view->with('panels', $panels);

        $peopleMain = People::take(3)->skip(0)->get();
        $view->with('peopleMain', $peopleMain);

        $peopleRest = People::take(1000)->skip(3)->get();
        $view->with('peopleRest', $peopleRest);

        $panelsCategories = Category::where('parent', 15)->orderBy('weight')->get();
        $view->with('panelsCategories', $panelsCategories);

        return Response::json(array('success' => true), 200);
    }



}