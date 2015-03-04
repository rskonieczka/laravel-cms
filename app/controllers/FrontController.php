<?php

namespace App\Controllers;

use Modules\Post\Entities\Post;
use Modules\Gallery\Entities\Gallery;
Use Modules\Site\Entities\Site;
Use Modules\Category\Entities\Category;
Use Modules\Text\Entities\Text;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use View, Response;

class FrontController extends \BaseController
{

    private $theme;

    private $slug;
    private $category;
    private $site_id;

    public function __construct()
    {
        $this->getCurrentSite();
        View::addLocation(app('path') . '/themes/' . $this->theme);
        View::addNamespace('theme', app('path') . '/themes/' . $this->theme);
    }

    public function index($slug = false, $id = false)
    {
        $this->slug = $slug;
        $this->getFromSlug();
        $this->getTexts();
        $this->getPosts();
        $this->buildMainNavbar();
        $this->getCategoryComposer();
        $this->bindLayoutComposers();
        $this->getGalleries();


        if (\Request::ajax() && \Request::root() !== 'http://landing.local') {
            return (String)View::make("theme::templates.ajax")
                ->with('category', $this->category);
        }
        return View::make("theme::templates.{$this->category->template_file}")
            ->with('category', $this->category);
    }

    private function getCategoryComposer()
    {
        $composerName = ucfirst($this->category->template_file) . 'Composer';

        if (\File::exists(app_path() . '/composers/' . $composerName . '.php')) {
            View::composer("theme::templates.{$this->category->template_file}", $composerName);
        }
    }

    private function bindLayoutComposers()
    {
        View::composer('theme::includes.mainfooter', function ($view) {
            $footerPosts = Post::orderBy('created_at', 'desc')->take(8)->get();
            $view->with('footerPosts', $footerPosts);
        });
    }

    private function getFromSlug()
    {
        if (!$this->slug)
            $this->slug = '/';

        $this->category = Category::where(array('slug' => $this->slug, 'site_id' => $this->site_id))->firstOrFail();

    }

    private function getTexts()
    {
        $categoryTexts = Text::where('category_id', $this->category->id)->orderBy('weight')->get();
        $this->category->texts = new \stdClass();
        foreach ($categoryTexts as $text) {
            $key = $text->key;
            $this->category->texts->$key = $text;
        }

    }

    private function getGalleries()
    {
        $categoryGalleries = Gallery::where('category_id', $this->category->id)->orderBy('created_at')->get();
        $this->category->galleries = new \stdClass();
        foreach ($categoryGalleries as $gallery) {
            $key = $gallery->key;
            $this->category->galleries->$key = $gallery->media;
        }
    }

    private function getPosts()
    {
        $this->category->posts = Post::where('category_id', $this->category->id)->orderBy('created_at', 'desc')->get();
    }

    private function getCurrentSite()
    {
        $site = Site::where('domain', \Request::getHost())->first();
        if (!isset($site)) {
            $site = Site::first();
        }
        $this->site_id = $site->id;
        $this->theme = $site->theme;
    }

    private function buildMainNavbar()
    {
        $categories = Category::where('parent', 0)
            ->where(array('hide' => 0, 'site_id' => $this->site_id))
            ->orderBy('weight')->get();
        foreach ($categories as $category) {
            $category->childs = Category::where('parent', $category->id)->orderBy('weight')->get();
        }
        $this->category->navbar = $categories;
    }

    public function showError()
    {
        return Response::view('theme::errors.missing', array(), 404);
    }

    public function sendEmail()
    {
        $data = array(
            'name' => \Input::get('field.Name.required.text'),
            'email' => \Input::get('field.Email.required.email'),
            'state' => \Input::get('field.State.required.text'),
            'text' => \Input::get('field.Message.required.unknown')
        );
        \Mail::send('emails.contactform', $data, function ($message) {
            $message->to('mjedrasz@gmail.com', 'Michal Jedraszczyk')
                ->subject('contact form');
        });
    }

}
