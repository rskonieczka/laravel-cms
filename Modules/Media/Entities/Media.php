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


    public static function create(array $attributes) {
        $attributes = self::uploadFile($attributes['file'], $attributes['directory']);
        return parent::create($attributes);
    }

    private static function uploadFile($file, $directory = 'media') {
        $destinationPath = public_path() . '/uploads/'.$directory;
        if ($file->isValid()) {
            $realname = str_random(12);
            $name = $file->getClientOriginalName();
            $type = $file->getClientOriginalExtension();
            $upload_success = $file->move($destinationPath, $realname . '.' . $type);

            if ($upload_success) {
                return array(
                    'name' => $name,
                    'realname' => $realname.'.'.$type,
                    'type' => $type);
            }
        }
        return false;
    }

}