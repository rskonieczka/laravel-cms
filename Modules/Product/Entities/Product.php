<?php

namespace Modules\Product\Entities;

class Product extends \Basemodel
{

	protected $fillable = array('name', 'photo', 'desc', 'price', 'category_id');

	protected $table = 'products';

	public $rules = array(
		'name' => 'required',
		'photo' => 'mimes:jpeg,bmp,png,jpg',
		'price' => 'required|numeric',
		'category_id' => 'required|exists:categories,id'
	);

	public function category()
	{
		return $this->belongsTo('categories', 'category_id');
	}

}