<?php

namespace Modules\Knowledge\Entities;

use App\Models\Traits\SearchableTrait;

class Knowledge extends \Basemodel
{
    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'knowledge.title' => 10,
            'knowledge.content' => 10,
            'knowledge.causes' => 1,
            'knowledge.prevention' => 1,
            'knowledge.repair' => 1
        ],
        'joins' => [
            'categories' => ['categories.id','knowledge.category_id']
        ],
    ];

    protected $fillable = array('title', 'content', 'causes', 'prevention', 'repair', 'movie', 'category_id');

    protected $table = 'knowledge';

    public $rules = array(
        'title' => 'required',
        'content' => 'required',
        'causes' => 'required',
        'prevention' => 'required',
        'repair' => 'required'
    );

    public function category()
    {
        return $this->belongsTo('Modules\Category\Entities\Category', 'category_id');
    }

    public function categories()
    {
        return $this->category();
    }

    public function media()
    {
        return $this->belongsToMany('Modules\Media\Entities\Media', 'knowledge_media', 'knowledge_id', 'media_id')->withPivot('weight', 'title')->orderBy('weight');
    }

    public function getUrl($id){
        $knowledge = $this->where('id', $id)->first();
        return $knowledge->category->slug.'/'.$id.'/'.\Slugify::slugify($knowledge->title);
    }

}