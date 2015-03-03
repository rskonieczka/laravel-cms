<?php

namespace Modules\Category\Entities;

Use Modules\Site\Entities\Site as Site;
Use Url;

class Category extends \Basemodel
{

    protected $fillable = array('name', 'parent', 'slug', 'weight', 'template_file', 'hide', 'site_id');

    protected $table = 'categories';

    private $site;

    public $rules = array(
        'name' => 'required',                        // just a normal required validation
        'slug' => 'required',
        'template_file' => 'required',
        'weight' => 'required',
        'parent' => 'required',
    );

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
            $categories = $this->where('site_id', $site->id)->orderBy('weight')->get();
            $nestables[$site->id]['site'] = $site;
            $nestables[$site->id]['nestable'] = $this->buildMenu($categories);
        }
        return $nestables;
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



}