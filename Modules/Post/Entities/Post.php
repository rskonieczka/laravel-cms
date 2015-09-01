<?php

namespace Modules\Post\Entities;

class Post extends \Basemodel
{

    protected $fillable = array('title', 'content', 'category_id', 'photo', 'tags', 'badges', 'parameters');

    protected $table = 'posts';

    public $rules = array(
        'title' => 'required',
        'content' => 'required'
    );

    public function category()
    {
        return $this->belongsTo('Modules\Category\Entities\Category', 'category_id');
    }

    public function categories()
    {
        return $this->category();
    }

    public function getUrl($id){
        $post = $this->where('id', $id)->first();
        return trans('routes.home_news_event').$id.'/'.\Slugify::slugify($post->title);
    }

}