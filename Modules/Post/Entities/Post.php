<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Builder;
use Nicolaslopezj\Searchable\SearchableTrait;

class Post extends \Basemodel
{
    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'posts.title' => 10,
            'posts.content' => 10
        ],
        'joins' => [
            'categories' => ['categories.id','posts.category_id']
        ],
    ];

    protected $fillable = array('title', 'content', 'category_id', 'photo', 'tags', 'badges', 'parameters');

    protected $table = 'posts';

    public $rules = array(
        'title' => 'required',
        'content' => 'required'
    );

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

        if ( ! $search)
        {
            return $q;
        }

        $search = mb_strtolower(trim($search));
        $words = explode(' ', $search);

        $selects = [];
        $this->search_bindings = [];
        $relevance_count = 0;

        foreach ($this->getColumns() as $column => $relevance)
        {
            $relevance_count += $relevance;
            $queries = $this->getSearchQueriesForColumn($query, $column, $relevance, $words);

            if ( $entireText === true )
            {
                $queries[] = $this->getSearchQuery($query, $column, $relevance, [$search], 30, '', '%');
            }

            foreach ($queries as $select)
            {
                $selects[] = $select;
            }
        }

        $this->addSelectsToQuery($query, $selects);
        $this->filterQueryWithRelevance($query, $selects, $threshold ?: ($relevance_count / 4));

        $this->makeGroupBy($query);

        $this->addBindingsToQuery($query, $this->search_bindings);

        $this->mergeQueries($query, $q);

        return $q;
    }

    public function category()
    {
        return $this->belongsTo('Modules\Category\Entities\Category', 'category_id');
    }

    public function categories()
    {
        return $this->category();
    }

    public function getUrl($id){
        $post = $this->where('id', $id)->first();
        return trans('routes.home_news_event').$id.'/'.\Slugify::slugify($post->title);
    }

}