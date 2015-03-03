<?php

namespace Modules\Panel\Entities;

class Panel extends \Basemodel
{

    protected $fillable = array('title', 'content', 'category_id', 'photo');

    protected $table = 'panels';

    public $rules = array(
        'title' => 'required',
        'content' => 'required'
    );

    public function category()
    {
        return $this->belongsTo('categories', 'category_id');
    }

}