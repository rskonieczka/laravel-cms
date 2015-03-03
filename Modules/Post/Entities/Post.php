<?php

namespace Modules\Post\Entities;

class Post extends \Basemodel
{

    protected $fillable = array('title', 'content', 'category_id', 'photo');

    protected $table = 'posts';

    public $rules = array(
        'title' => 'required',
        'content' => 'required'
    );

    public function category()
    {
        return $this->belongsTo('categories', 'category_id');
    }

}