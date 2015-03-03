<?php

namespace Modules\Site\Entities;

class Site extends \Basemodel
{

    protected $fillable = array('name', 'sub_domain');

    protected $table = 'sites';

    public $rules = array(
        'name' => 'required',
    );

}