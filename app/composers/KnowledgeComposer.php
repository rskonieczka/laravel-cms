<?php

use Modules\Knowledge\Entities\Knowledge;

class KnowledgeComposer {

    public function compose($view)
    {
        $currentRoute = Route::current();
        $params = $currentRoute->parameters();
        $knowledge = Knowledge::where('id', $params['id'])->first();
        $view->with('knowledge', $knowledge);
        $view->with('isKnowledge', true);
    }

}