<?php

use Modules\Post\Entities\Post;
use Modules\Category\Entities\Category;

class NewssingleComposer {

    public function compose($view)
    {
        $currentRoute = Route::current();
        $params = $currentRoute->parameters();

        $post = Post::where('id', $params['id'])->first();
        $view->with('post', $post);
        $posts = Post::select(['posts.id', 'posts.title', 'posts.content', 'posts.photo'])
            ->leftJoin('categories','categories.id','=','posts.category_id')
            ->where('categories.lang', \App::getLocale())
            ->where('posts.id', '!=', $params['id'])
            ->orderBy('posts.created_at', 'desc')->take(8)->get();

        $view->with('posts', $posts);
    }

}