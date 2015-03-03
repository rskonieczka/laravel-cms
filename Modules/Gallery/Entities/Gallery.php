<?php

namespace Modules\Gallery\Entities;

class Gallery extends \Basemodel
{
    protected $fillable = ['title', 'category_id', 'key'];

    protected $table = 'galleries';

    public $rules = array(
        'title' => 'required',
        'key' => 'required',
        'category_id' => 'required'
    );

    public function media()
    {
        return $this->belongsToMany('Modules\Media\Entities\Media', 'galleries_media', 'gallery_id', 'media_id')->withPivot('weight', 'link', 'title', 'content')->orderBy('weight');
    }
}