<?php

namespace Modules\Presscenter\Entities;

class Presscenter extends \Basemodel
{

	protected $fillable = array('title', 'content', 'category_id', 'file');

	protected $table = 'presscenter';

	public $rules = array(
		'title' => 'required',
		'content' => 'required'
	);

	public function category()
	{
		return $this->belongsTo('categories', 'category_id');
	}

}