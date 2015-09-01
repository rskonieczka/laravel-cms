<?php

use Modules\Knowledge\Entities\Knowledge;

class HomeComposer {

    public function compose($view)
    {
        $knowledges = Knowledge::orderBy('created_at', 'desc')->take(3)->get();
        $view->with('knowledges', $knowledges);
    }

}