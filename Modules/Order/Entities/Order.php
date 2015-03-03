<?php

namespace Modules\Order\Entities;

class Order extends \Basemodel
{

	protected $fillable = array('title', 'content', 'category_id', 'file');

	protected $table = 'orders';

	public $rules = array(
		'title' => 'required',
		'content' => 'required'
	);

	public function user()
	{
		return $this->belongsTo('users', 'user_id');
	}

}