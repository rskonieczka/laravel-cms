<?php

namespace Modules\Text\Http\Controllers;

use Illuminate\Support\Facades\View;
Use App\Controllers\Admin\AdminController;
Use Modules\Text\Entities\Text;
Use Modules\Category\Entities\Category;
Use Redirect, Input, Validator;


class TextController extends AdminController
{

    private $text;
    private $category;

    public function __construct(Text $text, Category $category){
        $this->text = $text;
        $this->category = $category;
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('text::index');
    }

    public function getDatatable(){
        $Text = $this->text
            ->select(array('texts.id', 'categories.name AS category_name', 'texts.title', 'texts.key', 'texts.weight', 'texts.created_at'))
            ->leftJoin('categories','texts.category_id','=','categories.id');
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
    public function create()
    {
        $categories = $this->category->all();
        $select = array( 0 => '-' );
        $select = $select + $categories->lists('name','id');

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
        $categories = $this->category->all();
        $select = array( 0 => '-' );
        $select = $select + $categories->lists('name','id');

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
