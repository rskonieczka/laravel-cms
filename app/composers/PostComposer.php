<?php

use Modules\Post\Entities\Post;

class PostComposer {

    public function compose($view)
    {
        $currentRoute = Route::current();
        $params = $currentRoute->parameters();

        $post = Post::where('id', $params['id'])->first();
        $view->with('post', $post);

        $posts = Post::where('id', '!=', $params['id'])->orderBy('created_at', 'desc')->take(8)->get();
        $view->with('posts', $posts);
    }

}