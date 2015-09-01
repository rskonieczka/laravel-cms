<?php

namespace Modules\Text\Http\Controllers;

use Illuminate\Support\Facades\View;
Use App\Controllers\Admin\AdminController;
use Modules\Site\Entities\Site;
Use Modules\Text\Entities\Text;
Use Modules\Category\Entities\Category;
Use Redirect, Input, Validator;


class TextController extends AdminController
{

    private $text;
    private $category;
    /**
     * @var Site
     */
    private $site;

    public function __construct(Text $text, Category $category, Site $site){
        $this->text = $text;
        $this->category = $category;
        $this->site = $site;
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($categoryId = false)
    {
        $categories = $this->category->getForTexts();
        $view = View::make('text::index')->with('categoryId', $categoryId)->with('categories', $categories);
        if($categoryId){
            $category = $this->category->find($categoryId)->first();
            $view->with('lang', $category->lang);
        }
        return $view;
    }

    public function getDatatable($categoryId = false){
        $Text = $this->text
            ->select(array('texts.id', 'categories.name AS category_name', 'texts.title', 'texts.key', 'texts.weight', 'texts.created_at'))
            ->leftJoin('categories','texts.category_id','=','categories.id');
        if($categoryId)
            $Text->where('texts.category_id', $categoryId);

        return \Datatables::of($Text)
            ->edit_column('category_name', function($row) {
                if(!empty($row->category_name))
                    return "{$row->category_name}";
                else
                    return "-";
            })
            ->add_column('operations', '<a class="btn btn-sm btn-flat btn-info" href="{{ URL::route( \'admin.text.edit\', array($id)) }}">edytuj</a>
                            <a data-method="delete" data-confirm="Czy napewno usunąć kategorię?" class="btn btn-sm btn-flat btn-danger" href="{{ URL::route( \'admin.text.destroy\', array( $id )) }}">Usuń</a>
                        ')
            ->make();


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($categoryId = false)
    {

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
        $select = array(0 => '-');
        $select = $select + $cat;

        return View::make('text::create')->with('select', $select );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), $this->text->rules);
        if ($validator->fails()) {
            return Redirect::route('admin.text.create')
                ->withErrors($validator)->withInput();
        } else {

            $data = array(
                'title' => Input::get('title'),
                'key' => Input::get('key'),
                'content' => Input::get('content'),
                'weight' => Input::get('weight'),
                'category_id' => Input::get('category_id'),
            );
            $text = $this->text->create($data);
            $text->save();
            return Redirect::route('admin.text.index')->with('message', 'Dodano nowy tekst ' . $text->title);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
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
        $select = array(0 => '-');
        $select = $select + $cat;

        $text = $this->text->find($id);
        return View::make('text::edit')->with('text', $text)->with('select', $select);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $validator = Validator::make(Input::all(), $this->text->rules);
        if ($validator->fails()) {
            return Redirect::route('admin.text.edit')
                ->withErrors($validator);
        } else {
            $text = $this->text->find($id);
            $text->title = Input::get('title');
            $text->key = Input::get('key');
            $text->content = Input::get('content');
            $text->weight = Input::get('weight');
            $text->category_id = Input::get('category_id');
            $text->save();
            return Redirect::route('admin.text.index')->with('message', 'Edytowano tekst - ' . $text->title);
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
        $text = $this->text->find($id);
        $text->delete();
        return Redirect::route('admin.text.index')->with('message', 'Usunięto tekst ' . $text->name);
    }


}
