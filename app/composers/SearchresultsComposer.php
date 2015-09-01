<?php

use Modules\Category\Entities\Category;
use Modules\Site\Entities\Site;
use Modules\Product\Entities\Product;
use Modules\Text\Entities\Text;
use Modules\Knowledge\Entities\Knowledge;
use Modules\Post\Entities\Post;
use Modules\Kontaktperson\Entities\Kontaktperson;

class SearchresultsComposer
{

    private $types;
    private $results;
    /**
     * @var Text
     */
    private $text;
    /**
     * @var Knowledge
     */
    private $knowledge;
    /**
     * @var Post
     */
    private $post;
    private $product;
    private $category;
    private $siteId;
    /**
     * @var Kontaktperson
     */
    private $kontaktperson;

    public function __construct(Text $text, Knowledge $knowledge, Post $post, Product $product, Category $category, Kontaktperson $kontaktperson)
    {
        $this->type = \Input::get('type');
        $this->text = $text;
        $this->knowledge = $knowledge;
        $this->post = $post;
        $this->product = $product;
        $this->category = $category;
        $this->kontaktperson = $kontaktperson;
        $this->getSiteId();
    }

    public function getSiteId()
    {
        $site =  Site::where('domain', \Request::getHost())->first();
        $this->siteId = $site->id;
    }

    public function compose($view)
    {
        $this->fireSearch();
        $types = $this->getSiteTypes($this->siteId);
        $this->prepareResults($types);
        $view->with('list', $this->results)->with('query', \Input::get('query'));
    }

    private function fireSearch()
    {
        $lang = \App::getLocale();

        $types = $this->getSiteTypes($this->siteId);
        foreach($types as $type){
            if($type == "text"){
                $this->results[$type] = $this->{$type}
                    ->search(\Input::get('query'), false, true, $this->siteId, \Input::get('d'), $lang )->with('categories')
                    ->get();
            }else{
                $this->results[$type] = $this->{$type}->search(\Input::get('query'), false, true, $this->siteId, false, $lang, true)
                    ->get();
            }
        }


    }

    private function getSiteTypes($siteId)
    {
        if($siteId == 2){
            $types = [
                'product',
                'text',
                'kontaktperson'
            ];
        }else{
            $types = [
                'knowledge',
                'post',
                'text',
                'kontaktperson'
            ];
        }

        return $types;
    }

    private function prepareResults($types)
    {
        foreach($types as $type){
            foreach($this->results[$type] as $result){
                $result->link = $this->{$type}->getUrl($result->id);
            }
        }
    }

}