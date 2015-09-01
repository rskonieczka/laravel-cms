<?php

namespace Modules\Category\Entities;

Use Modules\Site\Entities\Site as Site;
use App\Models\Traits\SearchableTrait;

Use Url;

class Category extends \Basemodel
{
    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'texts.title' => 10,
            'texts.content' => 10,
            'knowledge.title' => 10,
            'knowledge.content' => 10,
            'knowledge.causes' => 1,
            'knowledge.prevention' => 1,
            'knowledge.repair' => 1,
            'posts.title' => 10,
            'posts.content' => 10
        ],
        'joins' => [
            'texts' => ['categories.id','texts.category_id'],
            'knowledge' => ['categories.id','knowledge.category_id'],
            'posts' => ['categories.id','posts.category_id'],
        ],
    ];


    protected $fillable = array('name', 'parent', 'slug', 'weight', 'template_file', 'hide', 'site_id', 'lang', 'device');

    protected $table = 'categories';

    private $site;

    public $rules = array(
        'name' => 'required',                        // just a normal required validation
        'slug' => 'required',
        'template_file' => 'required',
        'weight' => 'required',
        'parent' => 'required',
        'lang' => 'required',
    );

    public function texts()
    {
        return $this->hasMany('Modules\Text\Entities\Text');
    }

    public function knowledge()
    {
        return $this->hasMany('Modules\Knowledge\Entities\Knowledge');
    }

    public function posts()
    {
        return $this->hasMany('Modules\Post\Entities\Post');
    }


    public function parent()
    {
        return $this->belongsTo($this->table, 'parent');
    }

    public function site()
    {
        return $this->belongsTo('Site');
    }

    public function children()
    {
        return $this->hasMany($this->table, 'parent');
    }

    public function getNestable()
    {
        $sites = Site::all();
        $nestables = array();
        foreach($sites as $site){
            foreach(\Config::get('app.langs') as $k2 => $n2){
                $categories = $this->where('site_id', $site->id)->where('lang', $n2)->orderBy('weight')->get();
                $nestables[$site->id][$n2]['site'] = $site;
                $nestables[$site->id][$n2]['nestable'] = $this->buildMenu($categories);
            }
        }
        return $nestables;
    }

    public function getForTexts()
    {
        $sites = Site::all();
        $nestables = array();
        foreach($sites as $site){
            foreach(\Config::get('app.langs') as $k2 => $n2){
                $categories = $this->where('site_id', $site->id)->where('lang', $n2)->orderBy('weight')->get();
                $nestables[$site->id][$n2]['site'] = $site;
                $nestables[$site->id][$n2]['nestable'] = $this->buildMenuTexts($categories);
            }
        }
        return $nestables;
    }

    public function groups()
    {
        return $this->belongsToMany('Modules\User\Entities\Group', 'categories_groups', 'category_id', 'group_id');
    }

    public function buildMenu($menu, $parentid = 0, $slug = '')
    {
        $result = null;
        foreach ($menu as $item)
            if ($item->parent == $parentid) {
                $result .= "<li class='dd-item nested-list-item' data-order='{$item->order}' data-id='{$item->id}'>
      <div class='dd-handle dd3-handle'>
        <span class='glyphicon glyphicon-move'></span>
      </div>";
                $url = \URL::to($slug . $item->slug);
                $result .= "<div class='dd3-content'>{$item->name}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><a href='{$url}'><i>{$slug}{$item->slug}</i></a></small>
        <div class='pull-right'>
          <label data-idd='{$item->id}'>
            <input type=\"checkbox\" class=\"flat-red\" " . (($item->hide) ? "checked" : "") . " /> Ukryj
        </label>
          <a class=\"btn btn-sm btn-flat btn-info\" href='" . URL::route('admin.category.edit', array($item->id)) . "'>edytuj</a>
          <a data-method=\"delete\" data-confirm=\"Czy napewno usunąć kategorię?\"  href='" . URL::route('admin.category.destroy', array($item->id)) . "' class='btn btn-sm btn-flat btn-danger' rel='{$item->id}'>usuń</a>
        </div>
      </div>" . $this->buildMenu($menu, $item->id, $item->slug) . "</li>";
            }
        return $result ? "\n<ol class=\"dd-list\">\n$result</ol>\n" : null;
    }

    public function buildMenuTexts($menu, $parentid = 0, $slug = '')
    {
        $result = null;
        foreach ($menu as $item)
            if ($item->parent == $parentid) {
                $result .= "<li>";
                $url = \URL::to("/admin/text/" . $item->id);
                $result .= "<a href='".$url."'>{$item->name} <small style='color:#bbb;'><i>{$item->slug}</i></small></a>" . $this->buildMenuTexts($menu, $item->id, $item->slug) . "</li>";
            }
        return $result ? "\n<ul class='custom-list'>\n$result</ul>\n" : null;
    }



}