<?php

namespace Modules\People\Entities;

class People extends \Basemodel
{

    protected $fillable = array('name', 'desc', 'photo');

    protected $table = 'people';

    public $rules = array(
        'name' => 'required',
        'desc' => 'required',
        'photo' => 'required'
    );

}