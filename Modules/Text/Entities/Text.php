<?php

namespace Modules\Text\Entities;

class Text extends \Basemodel
{

    protected $fillable = array('title', 'key', 'content', 'category_id', 'weight');

    protected $table = 'texts';

    public $rules = array(
        'title' => 'required',
        'key' => 'required',
        'weight' => 'required',
        'category_id' => 'required',
        'content' => 'required',
    );

    public function category()
    {
        return $this->belongsTo('category', 'category_id');
    }

}