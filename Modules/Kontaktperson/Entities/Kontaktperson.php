<?php

namespace Modules\Kontaktperson\Entities;

use App\Models\Traits\SearchableTrait;
use Illuminate\Database\Eloquent\Builder;

class Kontaktperson extends \Basemodel
{
    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'kontaktperson.name' => 1
        ],
        'joins' => [
            'categories' => ['categories.id','kontaktperson.category_id']
        ]
    ];

    protected $fillable = array('name', 'title', 'email', 'phone', 'section', 'category_id');

    protected $table = 'kontaktperson';

    public $rules = array(
        'name' => 'required',
    );

    public function category()
    {
        return $this->belongsTo('Modules\Category\Entities\Category', 'category_id');
    }

    public function categories()
    {
        return $this->category();
    }

    public function getUrl($id){
        $kontaktperson = $this->where('id', $id)->first();
        return $kontaktperson->category->slug.'/'.$id.'/'.\Slugify::slugify($kontaktperson->name);
    }

    public function scopeSearch(Builder $q, $search, $threshold = null, $entireText = false, $siteId = false, $device = false, $lang = false)
    {
        $query = clone $q;
        $query->select($this->getTable() . '.*');
        if($siteId !== false){
            $query->where('categories.site_id', $siteId);
        }
        if($lang !== false){
            $query->where('categories.lang', $lang);
        }
        if($device !== false){
            $query->where(function ($query) use ($device) {
                $query->where('categories.device', $device)
                    ->orWhere('categories.device', 'all');
            });
        }
        $this->makeJoins($query);

        $query->where(function ($query) use ($search) {
            $query->where('kontaktperson.name', 'LIKE', '%'.$search.'%')
                ->orWhere('kontaktperson.section', 'LIKE', '%'.$search.'%');
        });

        $this->mergeQueries($query, $q);

        return $q;
    }
}