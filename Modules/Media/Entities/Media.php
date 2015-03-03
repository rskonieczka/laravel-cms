<?php

namespace Modules\Media\Entities;


class Media extends \Basemodel
{
    protected $fillable = ['name', 'realname', 'type'];

    protected $table = 'media';

    public $rules = array(
        'name' => 'required',
        'realname' => 'required'
    );

    public function galleries() {
        return $this->belongsToMany('Gallery', 'galleries_media', 'gallery_id', 'media_id')->withPivot('weight', 'link', 'title', 'content');
    }

}