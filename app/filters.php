<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Knowledge\Entities\Knowledge;
use Modules\Category\Entities\Category;

App::error(function (ModelNotFoundException $e) {
    if ($e->getModel() === 'Modules\Category\Entities\Category') {
        return View::make('404');
    }
});


/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function ($request) {
    //
});


App::after(function ($request, $response) {
    //
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/
Route::filter('knowledge', function()
{
    $currentRoute = Route::current();
    $params = $currentRoute->parameters();
    if (!isset($params['id']))
    {
        $category = Category::where(['slug' => $params['slug'], 'lang' => App::getLocale()])->first();
        $knowledge = Knowledge::where('category_id', $category->id)->orderBy('created_at', 'asc')->first();
        if(count($knowledge) == 0){
            return \Redirect::to(trans('common.lang_prefix'));
        }
        $title = \Slugify::slugify($knowledge->title);
        return \Redirect::to(trans('common.lang_prefix').$category->slug.'/'.$knowledge->id.'/'.$title);
        //Slugify::slugify($news->title)
    }
});

Route::filter('auth.login', function () {
    $user = Sentry::getUser();
    if (!$user) {
        return Redirect::route('auth.login');
    } elseif (!$user->hasAnyAccess(['backend'])) {
        return \App::abort(403, 'Unauthorized action.');
    }

});

/*Route::filter('auth.checkout', function () {
    $user = Sentry::getUser()->hasAnyAccess(['backend']);
    if ($user) {
        return Redirect::route('admin.dashboard.view');
    }
});*/

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function () {
    if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function () {
    if (Session::token() !== Input::get('_token')) {
        throw new Illuminate\Session\TokenMismatchException;
    }
});

