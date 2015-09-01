<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Support\Facades\View;
Use App\Controllers\Admin\AdminController;
Use Modules\Category\Entities\Category;
Use Modules\Site\Entities\Site;
Use Redirect, Input, Validator;

class CategoryController extends AdminController
{

    private $category;
    private $site;

    public function __construct(Category $category, Site $site)
    {
        parent::__construct();
        $this->category = $category;
        $this->site = $site;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $nestable = $this->category->getNestable();
        return View::make('category::index')->with('nestable', $nestable);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $cat = array();
        $categories = $this->category->where('parent', 0)->orderBy('site_id', 'asc')->orderBy('lang', 'asc')->orderBy('weight', 'asc')->get()->toArray();
        foreach ($categories as $category) {
            $site = $this->site->where('id', $category['site_id'])->first()->toArray();
            $cat[$category['id']] = $site['name'] . ' -> ' . $category['lang'] . ' - ' . $category['name'];
            $childs = $this->category->where('parent', $category['id'])->get()->toArray();
            if (!empty($childs)) {
                foreach ($childs as $k => $child) {
                    $cat[$child['id']] = $site['name'] . ' -> ' . $category['lang'] . '- ' . $category['name'] . ' - ' . $child['name'];
                    $childss = $this->category->where('parent', $child['id'])->get()->toArray();
                    if (!empty($childss)) {
                        foreach ($childss as $k => $child2) {
                            $cat[$child2['id']] = $site['name'] . ' -> ' . $category['lang'] . '- ' . $category['name'] . ' - '.$child['name'].' - ' . $child2['name'];
                        }
                    }
                }
            }
        }
        $select = array( 0 => '-' );
        $select = array_merge($select, $cat);

        $sites = $this->site->all();
        $site_select = $sites->lists('name', 'id');

        $templates = templatesList();

        $user_groups = \Sentry::findAllGroups();

        return View::make('category::create')
            ->with('select', $select)
            ->with('templates', $templates)
            ->with('user_groups', $user_groups)
            ->with('site_select', $site_select);
    }

    public function postUnhide($id = null)
    {
        if (\Request::ajax()) {
            if ($id) {
                $category = $this->category->find($id);
                $category->hide = 0;
                $category->save();
            }
        }
    }

    public function postHide($id = null)
    {
        if (\Request::ajax()) {
            if ($id) {
                $category = $this->category->find($id);
                $category->hide = 1;
                $category->save();
            }
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), $this->category->rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::route('admin.category.create')
                ->withErrors($validator)->withInput();
        } else {
            $data = array(
                'name' => Input::get('name'),
                'slug' => Input::get('slug'),
                'weight' => Input::get('weight'),
                'parent' => Input::get('parent'),
                'site_id' => Input::get('site_id'),
                'lang' => Input::get('lang'),
                'device' => Input::get('device'),
                'template_file' => Input::get('template_file'),
            );
            $category = $this->category->create($data);
            $category->save();

            $category_group = array();
            if(Input::get('groups')){
                foreach(Input::get('groups') as $group_id => $value){
                    $category_group[] = array(
                        'category_id' => $category->id,
                        'group_id' => $group_id
                    );
                }
            }
            $category->groups()->sync($category_group);
            $category->push();

            return Redirect::route('admin.category.index')->with('message', 'Dodano nową kategorię ' . $category->name);
        }
    }

    /**
     * @return string
     */
    public function postChangeorder()
    {
        $source = e(Input::get('source'));
        $destination = e(Input::get('destination', 0));
        $item = $this->category->find($source);
        $item->parent = $destination;
        $item->save();
        $ordering = json_decode(Input::get('order'));
        $rootOrdering = json_decode(Input::get('rootOrder'));
        if ($ordering) {
            foreach ($ordering as $order => $item_id) {
                if ($itemToOrder = $this->category->find($item_id)) {
                    $itemToOrder->weight = $order;
                    $itemToOrder->save();
                }
            }
        } else {
            foreach ($rootOrdering as $order => $item_id) {
                if ($itemToOrder = $this->category->find($item_id)) {
                    $itemToOrder->weight = $order;
                    $itemToOrder->save();
                }
            }
        }
        return 'ok';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {

        $cat = array();
        $categories = $this->category->where('id', '!=', $id)->where('parent', 0)->orderBy('site_id', 'asc')->orderBy('lang', 'asc')->orderBy('weight', 'asc')->get()->toArray();
        foreach ($categories as $category) {
            $site = $this->site->where('id', $category['site_id'])->first()->toArray();
            $cat[$category['id']] = $site['name'] . ' -> ' . $category['lang'] . ' - ' . $category['name'];
            $childs = $this->category->where('parent', $category['id'])->get()->toArray();
            if (!empty($childs)) {
                foreach ($childs as $k => $child) {
                    $cat[$child['id']] = $site['name'] . ' -> ' . $category['lang'] . '- ' . $category['name'] . ' - ' . $child['name'];
                    $childss = $this->category->where('parent', $child['id'])->get()->toArray();
                    if (!empty($childss)) {
                        foreach ($childss as $k => $child2) {
                            $cat[$child2['id']] = $site['name'] . ' -> ' . $category['lang'] . '- ' . $category['name'] . ' - '.$child['name'].' - ' . $child2['name'];
                        }
                    }
                }
            }
        }
        $select = array( 0 => '-' );
        $select = array_merge($select, $cat);

        $sites = $this->site->all();
        $site_select = $sites->lists('name', 'id');

        $category = $this->category->find($id);
        $user_groups = \Sentry::findAllGroups();

        $templates = templatesList();
        return View::make('category::edit')
            ->with('category', $category)
            ->with('select', $select)
            ->with('site_select', $site_select)
            ->with('user_groups', $user_groups)
            ->with('templates', $templates);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $validator = Validator::make(Input::all(), $this->category->rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::route('admin.category.edit')
                ->withErrors($validator);
        } else {
            $category = $this->category->find($id);
            $category->name = Input::get('name');
            $category->slug = Input::get('slug');
            $category->weight = Input::get('weight');
            $category->parent = Input::get('parent');
            $category->site_id = Input::get('site_id');
            $category->lang = Input::get('lang');
            $category->device = Input::get('device');
            $category->template_file = Input::get('template_file');
            $category->save();

            $category_group = array();
            if(Input::get('groups')){
                foreach(Input::get('groups') as $group_id => $value){
                    $category_group[] = array(
                        'category_id' => $category->id,
                        'group_id' => $group_id
                    );
                }
            }
            $category->groups()->sync($category_group);
            $category->push();

            return Redirect::route('admin.category.index')->with('message', 'Edytowano kategorię - ' . $category->name);

        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->category->find($id);
        $category->delete();
        return Redirect::route('admin.category.index')->with('message', 'Usunięto kategorię ' . $category->name);
    }

}
