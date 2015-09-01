<?php

namespace Modules\Text\Entities;
use App\Models\Traits\SearchableTrait;

class Text extends \Basemodel
{

    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'texts.title' => 10,
            'texts.content' => 10,
            'categories.site_id' => 1
        ],
        'joins' => [
            'categories' => ['categories.id','texts.category_id']
        ]
    ];

    protected $fillable = array('title', 'key', 'content', 'category_id', 'weight');

    protected $table = 'texts';

    public $rules = array(
        'title' => 'required',
        'key' => 'required',
        'weight' => 'required',
        'category_id' => 'required',
        'content' => 'required',
    );

    public function category()
    {
        return $this->belongsTo('Modules\Category\Entities\Category', 'category_id');
    }

    public function categories(){
        return $this->category();
    }

    public function getUrl($id){
        $knowledge = $this->where('id', $id)->first();
        if($knowledge->category->slug == "/")
            $knowledge->category->slug = \URL::to('/');

        return $this->getLang($knowledge->category->lang, $knowledge->category->slug);
    }

    private function getLang($lang, $slug){
        if($lang == "pl"){
            return $slug;
        }
        return $lang.'/'.$slug;
    }

}