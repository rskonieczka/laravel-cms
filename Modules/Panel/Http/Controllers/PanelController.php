<?php

namespace Modules\Panel\Http\Controllers;

use Illuminate\Support\Facades\View;
Use App\Controllers\Admin\AdminController;
Use Modules\Panel\Entities\Panel;
Use Modules\Category\Entities\Category;
Use Redirect, Input, Validator;

class PanelController extends AdminController
{
    private $panel;

    public function __construct(Panel $panel)
    {
        parent::__construct();
        $this->panel = $panel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('panel::index');
    }

    public function getDatatable(){
        $post = $this->panel->leftJoin('categories','panels.category_id','=','categories.id')
            ->select(array('panels.id', 'categories.name AS category_name', 'panels.title', 'panels.created_at'));
        return \Datatables::of($post)
            ->edit_column('category_name', function($row) {
                if(!empty($row->category_name))
                    return "{$row->category_name}";
                else
                    return "-";
            })
            ->add_column('operations', '<a class="btn btn-sm btn-flat btn-info" href="{{ URL::route( \'admin.panel.edit\', array($id)) }}">edytuj</a>
                            <a data-method="delete" data-confirm="Czy napewno usunąć panel?" class="btn btn-sm btn-flat btn-danger" href="{{ URL::route( \'admin.panel.destroy\', array( $id )) }}">Usuń</a>
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
        $categories = Category::all();
        $select = array( 0 => '-' );
        $select = $select + $categories->lists('name','id');

        return View::make('panel::create')->with('select', $select );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), $this->panel->rules);
        if ($validator->fails()) {
            return Redirect::route('admin.panel.create')
                ->withErrors($validator)->withInput();
        } else {

            $data = array(
                'title' => Input::get('title'),
                'content' => Input::get('content'),
                'category_id' => Input::get('category_id'),
                'photo' => $this->uploadFile()
            );
            $panel = $this->panel->create($data);
            $panel->save();
            return Redirect::route('admin.panel.index')->with('message', 'Dodano nowy panel ' . $panel->name);
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
        $categories = Category::all();
        $select = array( 0 => '-' );
        $select = $select + $categories->lists('name','id');

        $panel = $this->panel->find($id);
        return View::make('panel::edit')->with('panel', $panel)->with('select', $select);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $validator = Validator::make(Input::all(), $this->panel->rules);
        if ($validator->fails()) {
            return Redirect::route('admin.panel.edit')
                ->withErrors($validator);
        } else {

            $panel = $this->panel->find($id);
            $panel->title = Input::get('title');
            $panel->content = Input::get('content');
            $panel->category_id = Input::get('category_id');
            $panel->photo = $this->uploadFile($panel->photo);
            $panel->save();

            return Redirect::route('admin.post.index')->with('message', 'Edytowano panel - ' . $panel->title);

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
        $panel = $this->panel->find($id);
        $panel->delete();
        return Redirect::route('admin.panel.index')->with('message', 'Usunięto panel ' . $panel->name);
    }


    private function uploadFile($oldPhoto = false){
        $destinationPath = public_path().'/uploads/panels';
        $file = \Input::file('photo');
        if(!isset($file))
            return $oldPhoto;

        if ($file->isValid()) {
            $filename = str_random(12);
            $extension = $file->getClientOriginalExtension();
            $upload_success = $file->move($destinationPath, $filename . '.' . $extension);

            if ($upload_success) {
                return $filename . '.' . $extension;
            } else {
                return false;
            }
        }else{
            Redirect::route('admin.post.edit')
                ->withErrors('Nieporawny rozmiar lub format zdjęcia');
            return false;
        }
    }


}