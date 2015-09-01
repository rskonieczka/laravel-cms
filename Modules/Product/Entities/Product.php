<?php

namespace Modules\Product\Entities;
use App\Models\Traits\SearchableTrait;

class Product extends \Basemodel
{

    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'products.name' => 50,
            'products.description' => 10,
            'products.voc' => 10,
            'products.brief' => 10,
            'products.table' => 10,
            'products.table_mobile' => 10
        ],
        'joins' => [
            'products_category' => ['products_category.product_id','products.id'],
            'categories' => ['products_category.category_id','categories.id']
        ],
    ];

    protected $fillable = array('novol_id', 'name', 'description', 'brief', 'tech_card', 'char_card', 'voc', 'special', 'table', 'table_mobile', 'icons');

    protected $table = 'products';

    public $rules = array(
        'name' => 'required'
    );

    public function category()
    {
        return $this->belongsToMany('Modules\Category\Entities\Category', 'products_category', 'product_id', 'category_id');
    }

    public function media()
    {
        return $this->belongsToMany('Modules\Media\Entities\Media', 'products_media', 'product_id', 'media_id')
            ->withPivot('weight', 'title', 'content')->orderBy('weight');
    }

    public function ghs()
    {
        return $this->belongsToMany('Modules\Media\Entities\Media', 'products_ghs', 'product_id', 'media_id')
            ->withPivot('weight', 'title')->orderBy('weight');
    }

    public function gallery()
    {
        return $this->belongsToMany('Modules\Media\Entities\Media', 'products_gallery', 'product_id', 'media_id')
            ->withPivot('weight')->orderBy('weight');
    }

    public function related()
    {
        return $this->belongsToMany('Modules\Product\Entities\Product', 'products_product', 'main_id', 'product_id');
    }

    public function getUrl($id){
        $product = $this->where('id', $id)->first();
        return trans('routes.product_list').$id.'/'.\Slugify::slugify($product->name);
    }

}